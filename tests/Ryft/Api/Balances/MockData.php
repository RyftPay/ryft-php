<?php

namespace Ryft\Tests\Api\Balances;

final class MockData
{
    private const MOCK_BALANCE = [
        "currency" => "GBP",
        "pending" => [
            "amount" => 500
        ],
        "cleared" => [
            "amount" => 500
        ],
        "available" => [
            "amount" => 500
        ],
        "lastUpdatedTimestamp" =>1470989538
    ];

    private const MOCK_BALANCES = [
        "items" => [
            self::MOCK_BALANCE
        ]
    ];

    public static function getBalances(): array
    {
        return self::MOCK_BALANCES;
    }
}

