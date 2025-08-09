<?php

namespace Ryft\Tests\Api\Transfers;

final class MockData
{
    private const MOCK_CREATE_TRANSFER_REQUEST_SEND_MONEY = [
        "amount" => 1500,
        "currency" => "GBP",
        "destination" => [
            "accountId" => "ac_3fe8398f-8cdb-43a3-9be2-806c4f84c327"
        ],
        "reason" => "Money owed from payments on 2012-01-30"
    ];

    private const MOCK_CREATE_TRANSFER_REQUEST_PULL_MONEY = [
        "amount" => 1500,
        "currency" => "GBP",
        "source" => [
            "accountId" => "ac_3fe8398f-8cdb-43a3-9be2-806c4f84c327"
        ],
        "reason" => "Dispute Fees"
    ];

    private const MOCK_TRANSFER = [
        "id" => "tfr_01FCTS1XMKH9FF43CAFA4CXT3P",
        "status" => "Pending",
        "amount" => 0,
        "currency" => "GBP",
        "reason" => "Covering dispute fees of £25 from 25th October",
        "source" => [
            "accountId" => "ac_3fe8398f-8cdb-43a3-9be2-806c4f84c327"
        ],
        "destination" => [
            "accountId" => "ac_3fe8398f-8cdb-43a3-9be2-806c4f84c327"
        ],
        "errors" => [
            [
                "code" => "string",
                "description" => "string"
            ]
        ],
        "metadata" => [
            "orderId" => "1",
            "customerId" => "123"
        ],
        "createdTimestamp" => 1470989538,
        "lastUpdatedTimestamp" => 1470989538
    ];

    private const MOCK_TRANSFER_LIST = [
        "items" => [
            self::MOCK_TRANSFER
        ]
    ];

    public static function getCreateTransferRequestSendMoney(): array
    {
        return self::MOCK_CREATE_TRANSFER_REQUEST_SEND_MONEY;
    }

    public static function getCreateTransferRequestPullMoney(): array
    {
        return self::MOCK_CREATE_TRANSFER_REQUEST_PULL_MONEY;
    }

    public static function getTransfer(): array
    {
        return self::MOCK_TRANSFER;
    }

    public static function getTransferList(): array
    {
        return self::MOCK_TRANSFER_LIST;
    }
}
