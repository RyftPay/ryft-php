<?php

namespace Ryft\Tests\Api\Transfers;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Transfers\TransfersClient;
use Ryft\Api\Transfers\Models\CreateTransferRequest;
use Ryft\HttpInterface;

final class TransfersClientTest extends TestCase
{
    public function testTransferSendMoney(): void
    {
        $transfer = MockData::getTransfer();
        $req = new CreateTransferRequest(MockData::getCreateTransferRequestSendMoney());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new TransfersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/transfers", null, $req)
            ->willReturn($transfer);

        $resp = $client->transfer($req);
        $this->assertNotNull($resp);
        $this->assertEquals($transfer, $resp);
    }

    public function testTransferPullMoney(): void
    {
        $transfer = MockData::getTransfer();
        $req = new CreateTransferRequest(MockData::getCreateTransferRequestPullMoney());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new TransfersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/transfers", null, $req)
            ->willReturn($transfer);

        $resp = $client->transfer($req);
        $this->assertEquals($transfer, $resp);
    }

    public function testTransferWithEmptyRequest(): void
    {
        $transfer = MockData::getTransfer();
        $req = new CreateTransferRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new TransfersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/transfers", null, $req)
            ->willReturn($transfer);

        $resp = $client->transfer($req);
        $this->assertEquals($transfer, $resp);
    }

    public function testList(): void
    {
        $transfers = MockData::getTransferList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new TransfersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/transfers", [])
            ->willReturn($transfers);

        $resp = $client->list();
        $this->assertEquals($transfers, $resp);
    }

    public function testListWithParams(): void
    {
        $transfers = MockData::getTransferList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new TransfersClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/transfers", $expectedParams)
            ->willReturn($transfers);

        $resp = $client->list(true, 50, 'abc123');
        $this->assertEquals($transfers, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $transfers = MockData::getTransferList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new TransfersClient($httpClient);
        $expectedParams = [
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/transfers", $expectedParams)
            ->willReturn($transfers);

        $resp = $client->list(null, 25);
        $this->assertEquals($transfers, $resp);
    }

    public function testGet(): void
    {
        $transferId = "tfr_01FCTS1XMKH9FF43CAFA4CXT3P";
        $transfer = MockData::getTransfer();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new TransfersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/transfers/" . $transferId)
            ->willReturn($transfer);

        $resp = $client->get($transferId);
        $this->assertEquals($transfer, $resp);
    }
}
