<?php

namespace Ryft\Tests\Api\PlatformFees;

use PHPUnit\Framework\TestCase;
use Ryft\Api\PlatformFees\PlatformFeesClient;
use Ryft\HttpInterface;

final class PlatformFeesClientTest extends TestCase
{
    public function testList(): void
    {
        $platformFees = MockData::getPlatformFeeList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PlatformFeesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/platform-fees", [])
            ->willReturn($platformFees);

        $resp = $client->list();
        $this->assertEquals($platformFees, $resp);
    }

    public function testListWithParams(): void
    {
        $platformFees = MockData::getPlatformFeeList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PlatformFeesClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 50
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/platform-fees", $expectedParams)
            ->willReturn($platformFees);

        $resp = $client->list(true, 50);
        $this->assertEquals($platformFees, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $platformFees = MockData::getPlatformFeeList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PlatformFeesClient($httpClient);
        $expectedParams = [
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/platform-fees", $expectedParams)
            ->willReturn($platformFees);

        $resp = $client->list(null, 25);
        $this->assertEquals($platformFees, $resp);
    }

    public function testGet(): void
    {
        $platformFeeId = "pf_01FCTS1XMKH9FF43CAFA4CXT3P";
        $platformFee = MockData::getPlatformFee();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PlatformFeesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/platform-fees/" . $platformFeeId)
            ->willReturn($platformFee);

        $resp = $client->get($platformFeeId);
        $this->assertEquals($platformFee, $resp);
    }

    public function testGetRefunds(): void
    {
        $platformFeeId = "pf_01FCTS1XMKH9FF43CAFA4CXT3P";
        $platformFeeRefunds = MockData::getPlatformFeeRefunds();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PlatformFeesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/platform-fees/" . $platformFeeId . "/refunds")
            ->willReturn($platformFeeRefunds);

        $resp = $client->getRefunds($platformFeeId);
        $this->assertEquals($platformFeeRefunds, $resp);
    }
}
