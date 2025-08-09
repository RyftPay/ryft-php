<?php

namespace Ryft\Tests\Api\Persons;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Persons\PersonsClient;
use Ryft\Api\Persons\Models\CreatePersonRequest;
use Ryft\Api\Persons\Models\UpdatePersonRequest;
use Ryft\HttpInterface;

final class PersonsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $accountId = "acc_123456";
        $person = MockData::getPerson();
        $req = new CreatePersonRequest(MockData::getCreateRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accountId . "/persons", null, $req)
            ->willReturn($person);

        $resp = $client->create($accountId, $req);
        $this->assertEquals($person, $resp);
    }

    public function testCreateWithEmptyRequest(): void
    {
        $accountId = "acc_123456";
        $person = MockData::getPerson();
        $req = new CreatePersonRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accountId . "/persons", null, $req)
            ->willReturn(MockData::getPerson());

        $resp = $client->create($accountId, $req);
        $this->assertEquals($person, $resp);
    }

    public function testList(): void
    {
        $accountId = "acc_123456";
        $persons = MockData::getPersonList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/persons", [])
            ->willReturn($persons);

        $resp = $client->list($accountId);
        $this->assertNotNull($resp);
        $this->assertEquals($persons, $resp);
    }

    public function testListWithParams(): void
    {
        $accountId = "acc_123456";
        $persons = MockData::getPersonList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/persons", $expectedParams)
            ->willReturn($persons);

        $resp = $client->list($accountId, true, 50, 'abc123');
        $this->assertEquals($persons, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $accountId = "acc_123456";
        $persons = MockData::getPersonList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);
        $expectedParams = [
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/persons", $expectedParams)
            ->willReturn($persons);

        $resp = $client->list($accountId, null, 25);
        $this->assertEquals($persons, $resp);
    }

    public function testGet(): void
    {
        $accountId = "acc_123456";
        $personId = "per_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $person = MockData::getPerson();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/persons/" . $personId)
            ->willReturn($person);

        $resp = $client->get($accountId, $personId);
        $this->assertEquals($person, $resp);
    }

    public function testUpdate(): void
    {
        $accountId = "acc_123456";
        $personId = "per_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $person = MockData::getPerson();
        $req = new UpdatePersonRequest(MockData::getUpdateRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/accounts/" . $accountId . "/persons/" . $personId, null, $req)
            ->willReturn($person);

        $resp = $client->update($accountId, $personId, $req);
        $this->assertEquals($person, $resp);
    }

    public function testUpdateWithEmptyRequest(): void
    {
        $accountId = "acc_123456";
        $personId = "per_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $person = MockData::getPerson();
        $req = new UpdatePersonRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/accounts/" . $accountId . "/persons/" . $personId, null, $req)
            ->willReturn($person);

        $resp = $client->update($accountId, $personId, $req);
        $this->assertNotNull($resp);
    }

    public function testDelete(): void
    {
        $accountId = "acc_123456";
        $personId = "per_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $deletedResponse = MockData::getDeleteResponse();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PersonsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/accounts/" . $accountId . "/persons/" . $personId)
            ->willReturn($deletedResponse);

        $resp = $client->delete($accountId, $personId);
        $this->assertEquals($deletedResponse, $resp);
    }
}
