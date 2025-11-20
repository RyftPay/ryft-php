<?php

namespace Ryft\Tests\Api\InPersonOrders;

use PHPUnit\Framework\TestCase;
use Ryft\Api\InPersonOrders\InPersonOrdersClient;
use Ryft\HttpInterface;

final class InPersonOrdersClientTest extends TestCase
{
    public function testList(): void
    {
        $orders = MockData::getOrderList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonOrdersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/orders", [], null, null)
            ->willReturn($orders);

        $resp = $client->list();
        $this->assertEquals($orders, $resp);
    }

    public function testListWithParams(): void
    {
        $orders = MockData::getOrderList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonOrdersClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 25,
            'startsAfter' => 'ipord_123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/orders", $expectedParams, null, "acc_123")
            ->willReturn($orders);

        $resp = $client->list(true, 25, 'ipord_123', 'acc_123');
        $this->assertEquals($orders, $resp);
    }

    public function testGet(): void
    {
        $orderId = "ipord_01FCTS1XMKH9FF43CAFA4CXT3P";
        $order = MockData::getOrder();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonOrdersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/orders/" . $orderId, [], null, null)
            ->willReturn($order);

        $resp = $client->get($orderId);
        $this->assertEquals($order, $resp);
    }

    public function testGetWithAccount(): void
    {
        $orderId = "ipord_01FCTS1XMKH9FF43CAFA4CXT3P";
        $accountId = "acc_123456";
        $order = MockData::getOrder();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonOrdersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/orders/" . $orderId, [], null, $accountId)
            ->willReturn($order);

        $resp = $client->get($orderId, $accountId);
        $this->assertEquals($order, $resp);
    }
}
