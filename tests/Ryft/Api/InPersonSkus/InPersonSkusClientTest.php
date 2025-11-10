<?php

namespace Ryft\Tests\Api\InPersonSkus;

use PHPUnit\Framework\TestCase;
use Ryft\Api\InPersonSkus\InPersonSkusClient;
use Ryft\HttpInterface;

final class InPersonSkusClientTest extends TestCase
{
    public function testList(): void
    {
        $country = "EU";
        $skus = MockData::getSkuList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonSkusClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/skus", ["country" => $country], null, null)
            ->willReturn($skus);

        $resp = $client->list($country);
        $this->assertEquals($skus, $resp);
    }

    public function testListWithAllParams(): void
    {
        $country = "EU";
        $skus = MockData::getSkuList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonSkusClient($httpClient);
        $expectedParams = [
            'country' => $country,
            'limit' => 25,
            'startsAfter' => 'ipsku_123',
            'productId' => 'ippd_456'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/skus", $expectedParams, null, null)
            ->willReturn($skus);

        $resp = $client->list($country, 25, 'ipsku_123', 'ippd_456');
        $this->assertEquals($skus, $resp);
    }

    public function testGet(): void
    {
        $skuId = "ipsku_01FCTS1XMKH9FF43CAFA4CXT3P";
        $sku = MockData::getSku();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonSkusClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/skus/" . $skuId, [], null, null)
            ->willReturn($sku);

        $resp = $client->get($skuId);
        $this->assertEquals($sku, $resp);
    }
}
