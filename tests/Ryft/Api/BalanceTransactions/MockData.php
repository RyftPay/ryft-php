<?php

namespace Ryft\Tests\Api\BalanceTransactions;

final class MockData
{
    private const MOCK_BALANCE_TX = [
        "id" => "bltxn_01FCTS1XMKH9FF43CAFA4CXT3P",
        "type" => "TransactionCapture",
        "amount" => 575,
        "currency" => "GBP",
        "description" => null,
        "feeTotal" => 5,
        "net" => 572,
        "status" => "Available",
        "origin" => [
        "id" => "txn_01FCTS1XMKH9FF43CAFA4CXT3P_01FCTS1XMKH9FF43CAFA4CXT3P",
            "amount" => 575,
            "accountId" => null
        ],
        "availableAt" => 1631696701,
        "createdTimestamp" => 1631696701,
        "lastUpdatedTimestamp" => 1631696701
    ];

    private const MOCK_BALANCE_TXS = [
        "items" => [
            self::MOCK_BALANCE_TX,
            "paginationToken" => "bltxn_01FCTS1XMKH9FF43CAFA4CXT3P"
        ]
    ];

    public static function getBalanceTransactions(): array
    {
        return self::MOCK_BALANCE_TXS;
    }
}
