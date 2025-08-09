<?php

namespace Ryft\Tests\Api\Files;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Files\Models\CreateFileRequest;

final class CreateFileRequestTest extends TestCase
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

    public function testConstructorWithData(): void
    {
        $data = [
            'filePath' => $this->tempFilePath,
            'category' => 'Evidence',
            'metadata' => ['key' => 'value']
        ];

        $request = new CreateFileRequest($data);

        $this->assertEquals($this->tempFilePath, $request->getFilePath());
        $this->assertEquals('Evidence', $request->getCategory());
        $this->assertEquals(['key' => 'value'], $request->getMetadata());
    }

    public function testConstructorWithEmptyData(): void
    {
        $request = new CreateFileRequest();

        $this->assertNull($request->getFilePath());
        $this->assertNull($request->getCategory());
        $this->assertNull($request->getMetadata());
    }

    public function testGetMimeTypePdf(): void
    {
        $request = new CreateFileRequest(['filePath' => 'test.pdf']);
        $this->assertEquals('application/pdf', $request->getMimeType());
    }

    public function testGetMimeTypePng(): void
    {
        $request = new CreateFileRequest(['filePath' => 'test.png']);
        $this->assertEquals('image/png', $request->getMimeType());
    }

    public function testGetMimeTypeJpg(): void
    {
        $request = new CreateFileRequest(['filePath' => 'test.jpg']);
        $this->assertEquals('image/jpeg', $request->getMimeType());
    }

    public function testGetMimeTypeJpeg(): void
    {
        $request = new CreateFileRequest(['filePath' => 'test.jpeg']);
        $this->assertEquals('image/jpeg', $request->getMimeType());
    }

    public function testGetMimeTypeUnsupported(): void
    {
        $request = new CreateFileRequest(['filePath' => 'test.txt']);
        $this->assertNull($request->getMimeType());
    }

    public function testGetMimeTypeNoFilePath(): void
    {
        $request = new CreateFileRequest();
        $this->assertNull($request->getMimeType());
    }

    public function testGetFileName(): void
    {
        $request = new CreateFileRequest(['filePath' => '/path/to/test.pdf']);
        $this->assertEquals('test.pdf', $request->getFileName());
    }

    public function testGetFileNameNoFilePath(): void
    {
        $request = new CreateFileRequest();
        $this->assertNull($request->getFileName());
    }

    public function testValidateFileSuccess(): void
    {
        $request = new CreateFileRequest(
            [
            'filePath' => $this->tempFilePath,
            'category' => 'Evidence'
            ]
        );

        // test should pass if no exception is thrown
        $request->validateFile();
        $this->assertTrue(true);
    }

    public function testValidateFileNoFilePath(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('File path is required');

        $request = new CreateFileRequest();
        $request->validateFile();
    }

    public function testValidateFileDoesNotExist(): void
    {
        $nonExistentFile = '/path/that/does/not/exist.pdf';

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('File does not exist: ' . $nonExistentFile);

        $request = new CreateFileRequest(['filePath' => $nonExistentFile]);
        $request->validateFile();
    }

    public function testValidateFileNotReadable(): void
    {
        $unreadableFile = tempnam(sys_get_temp_dir(), 'unreadable') . '.pdf';
        file_put_contents($unreadableFile, 'test');
        chmod($unreadableFile, 0000);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('File is not readable: ' . $unreadableFile);

        try {
            $request = new CreateFileRequest(['filePath' => $unreadableFile]);
            $request->validateFile();
        } finally {
            chmod($unreadableFile, 0644);
            unlink($unreadableFile);
        }
    }

    public function testValidateFileUnsupportedType(): void
    {
        $txtFile = tempnam(sys_get_temp_dir(), 'test') . '.txt';
        file_put_contents($txtFile, 'test content');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unsupported file type: txt');

        try {
            $request = new CreateFileRequest(['filePath' => $txtFile]);
            $request->validateFile();
        } finally {
            unlink($txtFile);
        }
    }

    public function testSetters(): void
    {
        $request = new CreateFileRequest();

        $request->setFilePath($this->tempFilePath);
        $request->setCategory('Evidence');
        $request->setMetadata(['key' => 'value']);

        $this->assertEquals($this->tempFilePath, $request->getFilePath());
        $this->assertEquals('Evidence', $request->getCategory());
        $this->assertEquals(['key' => 'value'], $request->getMetadata());
    }
}
