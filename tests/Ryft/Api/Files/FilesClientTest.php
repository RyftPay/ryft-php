<?php

namespace Ryft\Tests\Api\Files;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Files\FilesClient;
use Ryft\Api\Files\Models\CreateFileRequest;
use Ryft\HttpInterface;

final class FilesClientTest extends TestCase
{
    private $tempFilePath;

    protected function setUp(): void
    {
        parent::setUp();
        // temporary test file
        $this->tempFilePath = tempnam(sys_get_temp_dir(), 'test_file') . '.pdf';
        file_put_contents($this->tempFilePath, 'test content');
    }

    protected function tearDown(): void
    {
        // remove temporary file
        if (file_exists($this->tempFilePath)) {
            unlink($this->tempFilePath);
        }
        parent::tearDown();
    }

    public function testList(): void
    {
        $files = MockData::getFileList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/files", [])
            ->willReturn($files);

        $resp = $client->list();
        $this->assertEquals($files, $resp);
    }

    public function testListWithParams(): void
    {
        $files = MockData::getFileList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);
        $expectedParams = [
            'category' => 'Evidence',
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/files", $expectedParams)
            ->willReturn($files);

        $resp = $client->list('Evidence', true, 50, 'abc123');
        $this->assertEquals($files, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $files = MockData::getFileList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);
        $expectedParams = [
            'category' => 'Evidence',
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/files", $expectedParams)
            ->willReturn($files);

        $resp = $client->list('Evidence', null, 25);
        $this->assertEquals($files, $resp);
    }

    public function testGet(): void
    {
        $file = MockData::getFile();
        $fileId = "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/files/" . $fileId, null, null, null)
            ->willReturn($file);

        $resp = $client->get($fileId);
        $this->assertEquals($file, $resp);
    }

    public function testGetWithAccount(): void
    {
        $file = MockData::getFile();
        $fileId = "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $account = "acc_123456";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/files/" . $fileId, null, null, $account)
            ->willReturn($file);

        $resp = $client->get($fileId, $account);
        $this->assertEquals($file, $resp);
    }

    public function testCreate(): void
    {
        $file = MockData::getFile();
        $req = new CreateFileRequest([
            'filePath' => $this->tempFilePath,
            'category' => 'Evidence'
        ]);
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("uploadFile")
            ->with('/files', $this->isType('string'), $this->isType('string'), null)
            ->willReturn($file);

        $resp = $client->create($req);
        $this->assertEquals($file, $resp);
    }

    public function testCreateWithAccount(): void
    {
        $file = MockData::getFile();
        $req = new CreateFileRequest([
            'filePath' => $this->tempFilePath,
            'category' => 'Evidence'
        ]);
        $account = "acc_123456";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("uploadFile")
            ->with('/files', $this->isType('string'), $this->isType('string'), $account)
            ->willReturn($file);

        $resp = $client->create($req, $account);
        $this->assertEquals($file, $resp);
    }

    public function testCreateWithInvalidFile(): void
    {
        $req = new CreateFileRequest([
            'filePath' => '/non/existent/file.pdf',
            'category' => 'Evidence'
        ]);
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('File does not exist: /non/existent/file.pdf');

        $client->create($req);
    }

    public function testCreateWithUnsupportedFileType(): void
    {
        $txtFile = tempnam(sys_get_temp_dir(), 'test') . '.txt';
        file_put_contents($txtFile, 'test content');

        try {
            $req = new CreateFileRequest([
                'filePath' => $txtFile,
                'category' => 'Evidence'
            ]);
            $httpClient = $this->createMock(HttpInterface::class);
            $client = new FilesClient($httpClient);

            $this->expectException(\InvalidArgumentException::class);
            $this->expectExceptionMessage('Unsupported file type: txt');

            $client->create($req);
        } finally {
            // Clean up
            unlink($txtFile);
        }
    }

    public function testCreateWithNoFilePath(): void
    {
        $req = new CreateFileRequest([
            'category' => 'Evidence'
        ]);
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new FilesClient($httpClient);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('File path is required');

        $client->create($req);
    }
}
