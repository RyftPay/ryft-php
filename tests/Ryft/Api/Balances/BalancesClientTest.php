<?php

namespace Ryft\Tests\Api\Balances;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Balances\BalancesClient;
use Ryft\HttpInterface;

final class BalancesClientTest extends TestCase
{
    public function testList(): void
    {
        $currency = "GBP";
        $balances = MockData::getBalances();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new BalancesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with("GET", "/balances", ["currency" => $currency])
            ->willReturn($balances);

        $resp = $client->list($currency);
        $this->assertEquals($balances, $resp);
    }

    public function testListWithAccount(): void
    {
        $currency = "GBP";
        $account = "acc_123456";
        $balances = MockData::getBalances();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new BalancesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with("GET", "/balances", ["currency" => $currency])
            ->willReturn($balances);

        $resp = $client->list($currency, $account);
        $this->assertEquals($balances, $resp);
    }
}
