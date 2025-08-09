<?php

namespace Ryft\Tests\Api\Accounts;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Accounts\AccountsClient;
use Ryft\Api\Accounts\Models\CreateAuthLinkRequest;
use Ryft\Api\Accounts\Models\CreateManualPayoutRequest;
use Ryft\Api\Accounts\Models\CreateSubAccountRequest;
use Ryft\Api\Accounts\Models\UpdateSubAccountRequest;
use Ryft\HttpInterface;

final class AccountsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $account = MockData::getAccount();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);
        $req = new CreateSubAccountRequest();

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts", null, $req)
            ->willReturn($account);

        $resp = $client->create($req);
        $this->assertEquals($account, $resp);
    }

    public function testGet(): void
    {
        $accId = "acc_123456";
        $account = MockData::getAccount();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accId)
            ->willReturn($account);

        $resp = $client->get($accId);
        $this->assertEquals($account, $resp);
    }

    public function testUpdate(): void
    {
        $accId = "acc_123456";
        $account = MockData::getAccount();
        $req = new UpdateSubAccountRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/accounts/" . $accId, null, $req)
            ->willReturn($account);

        $resp = $client->update($accId, $req);
        $this->assertEquals($account, $resp);
    }

    public function testVerify(): void
    {
        $accId = "acc_123456";
        $account = MockData::getAccount();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accId . "/verify")
            ->willReturn($account);

        $resp = $client->verify($accId);
        $this->assertEquals($account, $resp);
    }

    public function testCreatePayout(): void
    {
        $accId = "acc_123456";
        $account = MockData::getAccount();
        $req = new CreateManualPayoutRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/" . $accId . "/payouts", null, $req)
            ->willReturn($account);

        $resp = $client->createPayout($accId, $req);
        $this->assertEquals($account, $resp);
    }

    public function testListPayouts(): void
    {
        $accId = "acc_123456";
        $payout = MockData::getAccount();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accId . "/payouts")
            ->willReturn($payout);

        $resp = $client->listPayouts($accId);
        $this->assertEquals($payout, $resp);
    }

    public function testListPayoutsWithParams(): void
    {
        $payouts = MockData::getPayout();
        $accId = "acc_123456";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);
        $params = [true, 50, "abc", 100, 200];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accId . "/payouts")
            ->willReturn($payouts);

        $resp = $client->listPayouts($accId, true, 50, "abc", 100, 200, $params);
        $this->assertEquals($payouts, $resp);
    }

    public function testGetPayout(): void
    {
        $accId = "acc_123456";
        $payoutId = "pay_123456";
        $payout = MockData::getPayout();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/accounts/" . $accId . "/payouts/" . $payoutId)
            ->willReturn($payout);

        $resp = $client->getPayout($accId, $payoutId);
        $this->assertNotNull($resp);
    }

    public function testCreateAuthLink(): void
    {
        $account = MockData::getAccount();
        $req = new CreateAuthLinkRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/accounts/authorize")
            ->willReturn($account);

        $resp = $client->createAuthLink($req);
        $this->assertEquals($account, $resp);
    }
}
