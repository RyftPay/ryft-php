<?php

namespace Ryft\Tests\Api\InPersonTerminals;

final class MockData
{
    private const MOCK_TERMINAL = [
        "id" => "tml_01FCTS1XMKH9FF43CAFA4CXT3P",
        "type" => "InPersonTerminal",
        "serialNumber" => "WP3-12345678",
        "locationId" => "iploc_01FCTS1XMKH9FF43CAFA4CXT3P",
        "name" => "Terminal 1",
        "status" => "Active",
        "metadata" => [
            "deviceType" => "WisePad3"
        ],
        "createdTimestamp" => 1621234567,
        "lastUpdatedTimestamp" => 1621234567
    ];

    private const MOCK_TERMINAL_LIST = [
        "data" => [
            self::MOCK_TERMINAL
        ],
        "hasMore" => false,
        "lastId" => "tml_01FCTS1XMKH9FF43CAFA4CXT3P"
    ];

    private const MOCK_DELETED_RESPONSE = [
        "id" => "tml_01FCTS1XMKH9FF43CAFA4CXT3P",
        "deleted" => true
    ];

    private const MOCK_ACTION_RESPONSE = [
        "id" => "tml_01FCTS1XMKH9FF43CAFA4CXT3P",
        "status" => "Processing"
    ];

    public static function getTerminal(): array
    {
        return self::MOCK_TERMINAL;
    }

    public static function getTerminalList(): array
    {
        return self::MOCK_TERMINAL_LIST;
    }

    public static function getDeletedResponse(): array
    {
        return self::MOCK_DELETED_RESPONSE;
    }

    public static function getActionResponse(): array
    {
        return self::MOCK_ACTION_RESPONSE;
    }

    public static function getCreateRequest(): array
    {
        return [
            "serialNumber" => "WP3-12345678",
            "locationId" => "iploc_01FCTS1XMKH9FF43CAFA4CXT3P",
            "name" => "Terminal 1",
            "metadata" => [
                "deviceType" => "WisePad3"
            ]
        ];
    }

    public static function getUpdateRequest(): array
    {
        return [
            "locationId" => "iploc_99FCTS1XMKH9FF43CAFA4CXT3P",
            "name" => "Updated Terminal Name",
            "metadata" => [
                "deviceType" => "WisePad3"
            ]
        ];
    }

    public static function getPaymentRequest(): array
    {
        return [
            "amounts" => [
                "requested" => 1000
            ],
            "currency" => "GBP",
            "paymentSession" => [
                "id" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P"
            ],
            "settings" => [
                "skipReceipt" => false
            ]
        ];
    }

    public static function getRefundRequest(): array
    {
        return [
            "paymentSession" => [
                "id" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P"
            ],
            "amount" => 500,
            "refundPlatformFee" => false,
            "settings" => [
                "skipReceipt" => false
            ]
        ];
    }

    public static function getConfirmReceiptRequest(): array
    {
        return [
            "customerCopy" => [
                "status" => "Succeeded"
            ]
        ];
    }
}
