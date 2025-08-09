<?php

namespace Ryft\Tests\Api\BalanceTransactions;

use PHPUnit\Framework\TestCase;
use Ryft\Api\BalanceTransactions\BalanceTransactionsClient;
use Ryft\HttpInterface;

final class BalanceTransactionsClientTest extends TestCase
{
    public function testList(): void
    {
        $balanceTransactions = MockData::getBalanceTransactions();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new BalanceTransactionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with("GET", "/balance-transactions", [])
            ->willReturn($balanceTransactions);

        $resp = $client->list();
        $this->assertEquals($balanceTransactions, $resp);
    }

    public function testListWithParams(): void
    {
        $balanceTransactions = MockData::getBalanceTransactions();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new BalanceTransactionsClient($httpClient);

        $expectedParams = [
            "limit" => 10,
            "startsAfter" => "test-starts-after",
            "payoutId" => "test-payout-id"
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with("GET", "/balance-transactions", $expectedParams)
            ->willReturn($balanceTransactions);

        $resp = $client->list(10, "test-starts-after", "test-payout-id", "acc_123456");
        $this->assertEquals($balanceTransactions, $resp);
    }
}
