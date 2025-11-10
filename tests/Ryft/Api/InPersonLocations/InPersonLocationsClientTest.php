<?php

namespace Ryft\Tests\Api\InPersonLocations;

use PHPUnit\Framework\TestCase;
use Ryft\Api\InPersonLocations\InPersonLocationsClient;
use Ryft\Api\InPersonLocations\Models\CreateInPersonLocationRequest;
use Ryft\Api\InPersonLocations\Models\UpdateInPersonLocationRequest;
use Ryft\HttpInterface;

final class InPersonLocationsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $location = MockData::getLocation();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonLocationsClient($httpClient);
        $req = new CreateInPersonLocationRequest(MockData::getCreateRequest());

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/in-person/locations", null, $req, null)
            ->willReturn($location);

        $resp = $client->create($req);
        $this->assertEquals($location, $resp);
    }

    public function testCreateWithAccount(): void
    {
        $location = MockData::getLocation();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonLocationsClient($httpClient);
        $req = new CreateInPersonLocationRequest(MockData::getCreateRequest());
        $accountId = "acc_123";

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/in-person/locations", null, $req, $accountId)
            ->willReturn($location);

        $resp = $client->create($req, $accountId);
        $this->assertEquals($location, $resp);
    }

    public function testList(): void
    {
        $locations = MockData::getLocationList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonLocationsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/locations", [], null, null)
            ->willReturn($locations);

        $resp = $client->list();
        $this->assertEquals($locations, $resp);
    }

    public function testListWithParams(): void
    {
        $locations = MockData::getLocationList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonLocationsClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 25,
            'startsAfter' => 'iploc_123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/locations", $expectedParams, null, "acc_123")
            ->willReturn($locations);

        $resp = $client->list(true, 25, 'iploc_123', 'acc_123');
        $this->assertEquals($locations, $resp);
    }

    public function testGet(): void
    {
        $locationId = "iploc_01FCTS1XMKH9FF43CAFA4CXT3P";
        $location = MockData::getLocation();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonLocationsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/locations/" . $locationId, [], null, null)
            ->willReturn($location);

        $resp = $client->get($locationId);
        $this->assertEquals($location, $resp);
    }

    public function testUpdate(): void
    {
        $location = MockData::getLocation();
        $locationId = "iploc_01FCTS1XMKH9FF43CAFA4CXT3P";
        $req = new UpdateInPersonLocationRequest(MockData::getUpdateRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonLocationsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/in-person/locations/" . $locationId, null, $req, null)
            ->willReturn($location);

        $resp = $client->update($locationId, $req);
        $this->assertEquals($location, $resp);
    }

    public function testDelete(): void
    {
        $deleted = MockData::getDeletedResponse();
        $locationId = "iploc_01FCTS1XMKH9FF43CAFA4CXT3P";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonLocationsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/in-person/locations/" . $locationId, [], null, null)
            ->willReturn($deleted);

        $resp = $client->delete($locationId);
        $this->assertEquals($deleted, $resp);
    }
}
