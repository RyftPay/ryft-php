<?php

namespace Ryft\Tests\Api\PayoutMethods;

use PHPUnit\Framework\TestCase;
use Ryft\Api\PayoutMethods\PayoutMethodsClient;
use Ryft\Api\PayoutMethods\Models\CreatePayoutMethodRequest;
use Ryft\Api\PayoutMethods\Models\UpdatePayoutMethodRequest;
use Ryft\HttpInterface;

final class PayoutMethodsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $payoutMethod = MockData::getPayoutMethod();
        $accountId = "acc_123";
        $req = new CreatePayoutMethodRequest(MockData::getCreateRequestGBP());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accountId . "/payout-methods", null, $req)
            ->willReturn($payoutMethod);

        $resp = $client->create($accountId, $req);
        $this->assertEquals($payoutMethod, $resp);
    }

    public function testCreateEUR(): void
    {
        $payoutMethod = MockData::getPayoutMethod();
        $accountId = "acc_123";
        $req = new CreatePayoutMethodRequest(MockData::getCreateRequestEUR());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accountId . "/payout-methods", null, $req)
            ->willReturn($payoutMethod);

        $resp = $client->create($accountId, $req);
        $this->assertEquals($payoutMethod, $resp);
    }

    public function testCreateUSD(): void
    {
        $payoutMethod = MockData::getPayoutMethod();
        $accountId = "acc_123";
        $req = new CreatePayoutMethodRequest(MockData::getCreateRequestUSD());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accountId . "/payout-methods", null, $req)
            ->willReturn($payoutMethod);

        $resp = $client->create($accountId, $req);
        $this->assertEquals($payoutMethod, $resp);
    }

    public function testList(): void
    {
        $payoutMethods = MockData::getPayoutMethodList();
        $accountId = "acc_123";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/payout-methods", [])
            ->willReturn($payoutMethods);

        $resp = $client->list($accountId);
        $this->assertEquals($payoutMethods, $resp);
    }

    public function testListWithParams(): void
    {
        $payoutMethods = MockData::getPayoutMethodList();
        $accountId = "acc_123";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/payout-methods", $expectedParams)
            ->willReturn($payoutMethods);

        $resp = $client->list($accountId, true, 50, 'abc123');
        $this->assertEquals($payoutMethods, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $payoutMethods = MockData::getPayoutMethodList();
        $accountId = "acc_123";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);
        $expectedParams = [
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/payout-methods", $expectedParams)
            ->willReturn($payoutMethods);

        $resp = $client->list($accountId, null, 25);
        $this->assertEquals($payoutMethods, $resp);
    }

    public function testGet(): void
    {
        $payoutMethod = MockData::getPayoutMethod();
        $accountId = "acc_123";
        $payoutMethodId = "pm_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/payout-methods/" . $payoutMethodId)
            ->willReturn($payoutMethod);

        $resp = $client->get($accountId, $payoutMethodId);
        $this->assertEquals($payoutMethod, $resp);
    }

    public function testUpdate(): void
    {
        $payoutMethod = MockData::getPayoutMethod();
        $accountId = "acc_123";
        $payoutMethodId = "pm_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $req = new UpdatePayoutMethodRequest(MockData::getUpdateRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/accounts/" . $accountId . "/payout-methods/" . $payoutMethodId, null, $req)
            ->willReturn($payoutMethod);

        $resp = $client->update($accountId, $payoutMethodId, $req);
        $this->assertEquals($payoutMethod, $resp);
    }

    public function testUpdateWithEmptyRequest(): void
    {
        $payoutMethod = MockData::getPayoutMethod();
        $accountId = "acc_123";
        $payoutMethodId = "pm_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $req = new UpdatePayoutMethodRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/accounts/" . $accountId . "/payout-methods/" . $payoutMethodId, null, $req)
            ->willReturn($payoutMethod);

        $resp = $client->update($accountId, $payoutMethodId, $req);
        $this->assertEquals($payoutMethod, $resp);
    }

    public function testDelete(): void
    {
        $expected = MockData::getDeleteResponse();
        $accountId = "acc_123";
        $payoutMethodId = "pm_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/accounts/" . $accountId . "/payout-methods/" . $payoutMethodId)
            ->willReturn($expected);

        $resp = $client->delete($accountId, $payoutMethodId);
        $this->assertEquals($expected, $resp);
    }
}
