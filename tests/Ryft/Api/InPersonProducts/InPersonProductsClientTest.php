<?php

namespace Ryft\Tests\Api\InPersonProducts;

use PHPUnit\Framework\TestCase;
use Ryft\Api\InPersonProducts\InPersonProductsClient;
use Ryft\HttpInterface;

final class InPersonProductsClientTest extends TestCase
{
    public function testList(): void
    {
        $products = MockData::getProductList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonProductsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/products", [], null, null)
            ->willReturn($products);

        $resp = $client->list();
        $this->assertEquals($products, $resp);
    }

    public function testListWithParams(): void
    {
        $products = MockData::getProductList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonProductsClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 25,
            'startsAfter' => 'ippd_123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/products", $expectedParams, null, null)
            ->willReturn($products);

        $resp = $client->list(true, 25, 'ippd_123');
        $this->assertEquals($products, $resp);
    }

    public function testGet(): void
    {
        $productId = "ippd_01FCTS1XMKH9FF43CAFA4CXT3P";
        $product = MockData::getProduct();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonProductsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/products/" . $productId, [], null, null)
            ->willReturn($product);

        $resp = $client->get($productId);
        $this->assertEquals($product, $resp);
    }
}
