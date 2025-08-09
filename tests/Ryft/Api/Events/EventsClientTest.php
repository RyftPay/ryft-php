<?php

namespace Ryft\Tests\Api\Events;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Events\EventsClient;
use Ryft\HttpInterface;

final class EventsClientTest extends TestCase
{
    public function testList(): void
    {
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new EventsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/events", [], null, null)
            ->willReturn(MockData::getEventList());

        $resp = $client->list();
        $this->assertNotNull($resp);
    }

    public function testListWithParams(): void
    {
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new EventsClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 50
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/events", $expectedParams, null, "acc_123")
            ->willReturn(MockData::getEventList());

        $resp = $client->list(true, 50, "acc_123");
        $this->assertNotNull($resp);
    }

    public function testListWithPartialParams(): void
    {
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new EventsClient($httpClient);
        $expectedParams = [
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/events", $expectedParams, null, null)
            ->willReturn(MockData::getEventList());

        $resp = $client->list(null, 25);
        $this->assertNotNull($resp);
    }

    public function testGet(): void
    {
        $eventId = "evt_123";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new EventsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/events/" . $eventId, [], null, null)
            ->willReturn(MockData::getEvent());

        $resp = $client->get($eventId);
        $this->assertNotNull($resp);
    }

    public function testGetWithAccount(): void
    {
        $eventId = "evt_123";
        $accountId = "acc_123";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new EventsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/events/" . $eventId, [], null, $accountId)
            ->willReturn(MockData::getEvent());

        $resp = $client->get($eventId, $accountId);
        $this->assertNotNull($resp);
    }
}
