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

    private const MOCK_CREATE_CONVERSION_REQUEST_FIXED_SELL = [
        "sell" => [
            "currency" => "GBP",
            "amount" => 500
        ],
        "buy" => [
            "currency" => "EUR"
        ],
        "termAgreement" => true,
        "fixedSide" => "Sell"
    ];

    private const MOCK_CONVERSION = [
        "id" => "con_01FCTS1XMKH9FF43CAFA4CXT3P",
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
                ],
                "platform" => [
                    "amount" => 5,
                    "ryftFee" => [
                        "amount" => 2
                    ]
                ]
            ]
        ],
        "rate" => 1.247,
        "status" => "Settled",
        "reason" => "Converting GBP takings to pay USD suppliers",
        "estimatedSettlementDate" => "2024-03-15",
        "settledTimestamp" => 1470989600,
        "createdBy" => [
            "id" => "ac_b83f2653-06d7-44a9-a548-5825e8186004",
            "name" => "Acme Corp"
        ],
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_IN_PROGRESS_CONVERSION = [
        "id" => "con_01FCTS1XMKH9FF43CAFA4CXT3P",
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
        "paginationToken" => "con_01FCTS1XMKH9FF43CAFA4CXT3P"
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
                ],
                "platform" => [
                    "amount" => 5,
                    "ryftFee" => [
                        "amount" => 2
                    ]
                ]
            ]
        ],
        "rate" => 1.247,
        "estimatedSettlementDate" => "2024-03-15"
    ];

    public static function getCreateConversionRequest(): array
    {
        return self::MOCK_CREATE_CONVERSION_REQUEST;
    }

    public static function getCreateConversionRequestFixedSell(): array
    {
        return self::MOCK_CREATE_CONVERSION_REQUEST_FIXED_SELL;
    }

    public static function getConversion(): array
    {
        return self::MOCK_CONVERSION;
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
}
