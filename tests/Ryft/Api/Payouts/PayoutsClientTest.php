<?php

namespace Ryft\Tests\Api\Payouts;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Payouts\PayoutsClient;
use Ryft\Api\Payouts\Models\CreatePayoutRequest;
use Ryft\HttpInterface;

final class PayoutsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $payout = MockData::getPayout();
        $accountId = "acc_123";
        $req = new CreatePayoutRequest(MockData::getCreateRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accountId . "/payouts", null, $req)
            ->willReturn($payout);

        $resp = $client->create($accountId, $req);
        $this->assertEquals($payout, $resp);
    }

    public function testCreateWithEmptyRequest(): void
    {
        $payout = MockData::getPayout();
        $accountId = "acc_123";
        $req = new CreatePayoutRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accountId . "/payouts", null, $req)
            ->willReturn($payout);

        $resp = $client->create($accountId, $req);
        $this->assertEquals($payout, $resp);
    }

    public function testList(): void
    {
        $payouts = MockData::getPayoutList();
        $accountId = "acc_123";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/payouts", [])
            ->willReturn($payouts);

        $resp = $client->list($accountId);
        $this->assertEquals($payouts, $resp);
    }

    public function testListWithParams(): void
    {
        $payouts = MockData::getPayoutList();
        $accountId = "acc_123";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutsClient($httpClient);
        $expectedParams = [
            'startTimestamp' => 1000,
            'endTimestamp' => 2000,
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/payouts", $expectedParams)
            ->willReturn($payouts);

        $resp = $client->list($accountId, 1000, 2000, true, 50, 'abc123');
        $this->assertEquals($payouts, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $payouts = MockData::getPayoutList();
        $accountId = "acc_123";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutsClient($httpClient);
        $expectedParams = [
            'startTimestamp' => 1000,
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/payouts", $expectedParams)
            ->willReturn($payouts);

        $resp = $client->list($accountId, 1000, null, null, 25);
        $this->assertEquals($payouts, $resp);
    }

    public function testGet(): void
    {
        $payout = MockData::getPayout();
        $accountId = "acc_123";
        $payoutId = "po_01FJ1H0023R1AHM77YQ75RMKE7";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PayoutsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accountId . "/payouts/" . $payoutId)
            ->willReturn($payout);

        $resp = $client->get($accountId, $payoutId);
        $this->assertEquals($payout, $resp);
    }
}
