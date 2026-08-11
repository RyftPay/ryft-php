<?php

namespace Ryft\Tests\Api\Conversions;

final class MockData
{
    private const MOCK_CREATE_CONVERSION_REQUEST = [
        "sell" => [
            "currency" => "GBP",
            "amount" => 500
        ],
        "buy" => [
            "currency" => "EUR"
        ],
        "termAgreement" => true,
        "reason" => "Paying EUR suppliers"
    ];

    private const MOCK_CONVERSION = [
        "id" => "cv_01FCTS1XMKH9FF43CAFA4CXT3P",
        "sell" => [
            "amount" => 1000,
            "currency" => "GBP"
        ],
        "buy" => [
            "amount" => 1247,
            "currency" => "USD",
            "fees" => [
                "ryft" => [
                    "amount" => 10
                ]
            ]
        ],
        "rate" => 1.247,
        "status" => "Settled",
        "reason" => "Converting GBP takings to pay USD suppliers",
        "estimatedSettlementDate" => "2024-03-15",
        "settledTimestamp" => 1470989600,
        "createdBy" => [
            "id" => "usr_01FCTS1XMKH9FF43CAFA4CXT3P",
            "name" => "John Smith"
        ],
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_CONVERSION_WITH_SELL_SIDE_FEES = [
        "id" => "cv_01FCTS1XMKH9FF43CAFA4CXT3Q",
        "sell" => [
            "amount" => 1000,
            "currency" => "GBP",
            "fees" => [
                "platform" => [
                    "amount" => 5,
                    "ryftFee" => [
                        "amount" => 2
                    ]
                ]
            ]
        ],
        "buy" => [
            "amount" => 1241,
            "currency" => "USD"
        ],
        "rate" => 1.247,
        "status" => "Settled",
        "reason" => "Converting GBP takings to pay USD suppliers",
        "estimatedSettlementDate" => "2024-03-15",
        "settledTimestamp" => 1470989600,
        "createdBy" => [
            "id" => "usr_01FCTS1XMKH9FF43CAFA4CXT3P",
            "name" => "John Smith"
        ],
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_IN_PROGRESS_CONVERSION = [
        "id" => "cv_01FCTS1XMKH9FF43CAFA4CXT3P",
        "sell" => [
            "amount" => 1000,
            "currency" => "GBP"
        ],
        "buy" => [
            "currency" => "USD"
        ],
        "status" => "InProgress",
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_CONVERSION_LIST = [
        "items" => [
            self::MOCK_CONVERSION
        ],
        "paginationToken" => "cv_01FCTS1XMKH9FF43CAFA4CXT3P"
    ];

    private const MOCK_CONVERSION_RATE = [
        "sell" => [
            "amount" => 1000,
            "currency" => "GBP"
        ],
        "buy" => [
            "amount" => 1247,
            "currency" => "USD",
            "fees" => [
                "ryft" => [
                    "amount" => 10
                ]
            ]
        ],
        "rate" => 1.247,
        "estimatedSettlementDate" => "2024-03-15"
    ];

    private const MOCK_CONVERSION_RATE_WITH_SELL_SIDE_FEES = [
        "sell" => [
            "amount" => 1000,
            "currency" => "GBP",
            "fees" => [
                "platform" => [
                    "amount" => 5,
                    "ryftFee" => [
                        "amount" => 2
                    ]
                ]
            ]
        ],
        "buy" => [
            "amount" => 1241,
            "currency" => "USD"
        ],
        "rate" => 1.247,
        "estimatedSettlementDate" => "2024-03-15"
    ];

    public static function getCreateConversionRequest(): array
    {
        return self::MOCK_CREATE_CONVERSION_REQUEST;
    }

    public static function getConversion(): array
    {
        return self::MOCK_CONVERSION;
    }

    public static function getConversionWithSellSideFees(): array
    {
        return self::MOCK_CONVERSION_WITH_SELL_SIDE_FEES;
    }

    public static function getInProgressConversion(): array
    {
        return self::MOCK_IN_PROGRESS_CONVERSION;
    }

    public static function getConversionList(): array
    {
        return self::MOCK_CONVERSION_LIST;
    }

    public static function getConversionRate(): array
    {
        return self::MOCK_CONVERSION_RATE;
    }

    public static function getConversionRateWithSellSideFees(): array
    {
        return self::MOCK_CONVERSION_RATE_WITH_SELL_SIDE_FEES;
    }
}
