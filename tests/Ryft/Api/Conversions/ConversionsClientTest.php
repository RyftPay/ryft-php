<?php

namespace Ryft\Tests\Api\Conversions;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Conversions\ConversionsClient;
use Ryft\Api\Conversions\Models\CreateConversionRequest;
use Ryft\HttpInterface;

final class ConversionsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $conversion = MockData::getInProgressConversion();
        $req = new CreateConversionRequest(MockData::getCreateConversionRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/conversions", null, $req, null)
            ->willReturn($conversion);

        $resp = $client->create($req);
        $this->assertEquals($conversion, $resp);
    }

    public function testCreateWithAccount(): void
    {
        $conversion = MockData::getInProgressConversion();
        $req = new CreateConversionRequest(MockData::getCreateConversionRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);
        $accountId = "acc_123";

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/conversions", null, $req, $accountId)
            ->willReturn($conversion);

        $resp = $client->create($req, $accountId);
        $this->assertEquals($conversion, $resp);
    }

    public function testCreateWithEmptyRequest(): void
    {
        $conversion = MockData::getInProgressConversion();
        $req = new CreateConversionRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/conversions", null, $req, null)
            ->willReturn($conversion);

        $resp = $client->create($req);
        $this->assertEquals($conversion, $resp);
    }

    public function testList(): void
    {
        $conversions = MockData::getConversionList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions", [], null, null)
            ->willReturn($conversions);

        $resp = $client->list();
        $this->assertEquals($conversions, $resp);
    }

    public function testListWithParams(): void
    {
        $conversions = MockData::getConversionList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);
        $expectedParams = [
            'startTimestamp' => 1631696701,
            'endTimestamp' => 1631696705,
            'ascending' => false,
            'limit' => 2,
            'startsAfter' => 'cv_01FCTS1XMKH9FF43CAFA4CXT3P'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions", $expectedParams, null, "acc_123")
            ->willReturn($conversions);

        $resp = $client->list(
            1631696701,
            1631696705,
            false,
            2,
            'cv_01FCTS1XMKH9FF43CAFA4CXT3P',
            'acc_123'
        );
        $this->assertEquals($conversions, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $conversions = MockData::getConversionList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);
        $expectedParams = [
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions", $expectedParams, null, null)
            ->willReturn($conversions);

        $resp = $client->list(null, null, null, 25);
        $this->assertEquals($conversions, $resp);
    }

    public function testGet(): void
    {
        $conversionId = "cv_01FCTS1XMKH9FF43CAFA4CXT3P";
        $conversion = MockData::getConversion();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions/" . $conversionId, [], null, null)
            ->willReturn($conversion);

        $resp = $client->get($conversionId);
        $this->assertEquals($conversion, $resp);
    }

    public function testGetWithSellSideFees(): void
    {
        $conversionId = "cv_01FCTS1XMKH9FF43CAFA4CXT3Q";
        $conversion = MockData::getConversionWithSellSideFees();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions/" . $conversionId, [], null, null)
            ->willReturn($conversion);

        $resp = $client->get($conversionId);
        $this->assertEquals($conversion, $resp);
    }

    public function testGetWithAccount(): void
    {
        $conversionId = "cv_01FCTS1XMKH9FF43CAFA4CXT3P";
        $conversion = MockData::getConversion();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);
        $accountId = "acc_123";

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions/" . $conversionId, [], null, $accountId)
            ->willReturn($conversion);

        $resp = $client->get($conversionId, $accountId);
        $this->assertEquals($conversion, $resp);
    }

    public function testGetRate(): void
    {
        $rate = MockData::getConversionRate();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);
        $expectedParams = [
            'sellCurrency' => 'GBP',
            'buyCurrency' => 'USD',
            'amount' => 1000
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions/rate", $expectedParams, null, null)
            ->willReturn($rate);

        $resp = $client->getRate('GBP', 'USD', 1000);
        $this->assertEquals($rate, $resp);
    }

    public function testGetRateWithSellSideFees(): void
    {
        $rate = MockData::getConversionRateWithSellSideFees();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);
        $expectedParams = [
            'sellCurrency' => 'GBP',
            'buyCurrency' => 'USD',
            'amount' => 1000
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions/rate", $expectedParams, null, null)
            ->willReturn($rate);

        $resp = $client->getRate('GBP', 'USD', 1000);
        $this->assertEquals($rate, $resp);
    }

    public function testGetRateWithAccount(): void
    {
        $rate = MockData::getConversionRate();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ConversionsClient($httpClient);
        $accountId = "acc_123";
        $expectedParams = [
            'sellCurrency' => 'GBP',
            'buyCurrency' => 'USD',
            'amount' => 1000
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/conversions/rate", $expectedParams, null, $accountId)
            ->willReturn($rate);

        $resp = $client->getRate('GBP', 'USD', 1000, $accountId);
        $this->assertEquals($rate, $resp);
    }
}
