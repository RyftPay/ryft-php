<?php

namespace Ryft\Tests\Api\PaymentSessions;

final class MockData
{
    private const MOCK_PAYMENT_SESSION = [
        "id" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P",
        "amount" => 500,
        "currency" => "GBP",
        "paymentType" => "Standard",
        "entryMode" => "Online",
        "customerEmail" => "example@mail.com",
        "customerDetails" => [
            "id" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ",
            "firstName" => "Fred",
            "lastName" => "Jones",
            "homePhoneNumber" => "+447900000000",
            "mobilePhoneNumber" => "+447900000000",
            "metadata" => [
                "customerId" => "123"
            ]
        ],
        "platformFee" => 50,
        "status" => "PendingPayment",
        "metadata" => [
            "orderNumber" => "123"
        ],
        "clientSecret" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P_secret_b83f2653-06d7-44a9-a548-5825e8186004",
        "captureFlow" => "Automatic",
        "createdTimestamp" => 1470989538,
        "lastUpdatedTimestamp" => 1470989538
    ];

    private const MOCK_PAYMENT_SESSION_LIST = [
        "items" => [
            self::MOCK_PAYMENT_SESSION
        ]
    ];

    private const MOCK_CREATE_REQUEST = [
        "amount" => 500,
        "currency" => "GBP",
        "customerEmail" => "example@mail.com",
        "customerDetails" => [
            "id" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ",
            "firstName" => "string",
            "lastName" => "string",
            "homePhoneNumber" => "+447900000000",
            "mobilePhoneNumber" => "+447900000000",
            "metadata" => [
                "customerId" => "123"
            ]
        ],
        "platformFee" => 50,
        "captureFlow" => "Automatic",
        "paymentType" => "Standard",
        "metadata" => [
            "orderId" => "1",
            "customerId" => "123"
        ]
    ];

    private const MOCK_UPDATE_REQUEST = [
        "amount" => 500,
        "customerEmail" => "example@mail.com",
        "platformFee" => 50,
        "metadata" => [
            "orderId" => "2"
        ],
        "captureFlow" => "Automatic"
    ];

    private const MOCK_ATTEMPT_PAYMENT_REQUEST = [
        "clientSecret" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P_secret_b83f2653-06d7-44a9-a548-5825e8186004",
        "cardDetails" => [
            "number" => "4444333322221111",
            "expiryMonth" => "10",
            "expiryYear" => "2024",
            "cvc" => "100"
        ],
        "shippingDetails" => [
            "address" => [
                "firstName" => "Fox",
                "lastName" => "Mulder",
                "lineOne" => "Stonehenge",
                "postalCode" => "SP4 7DE",
                "city" => "Salisbury",
                "country" => "GB"
            ],
            "phoneNumber" => "+447900000000"
        ]
    ];

    private const MOCK_CONTINUE_PAYMENT_REQUEST = [
        "clientSecret" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P_secret_b83f2653-06d7-44a9-a548-5825e8186004",
        "threeDs" => [
            "fingerprint" => "ewogICJ0aHJlZURTU2VydmVyVHJhbnNJRCI6ICI4ZjAxNzdhNC0yY2VkLTQ4NjUtODViNy1iYWQ5YmZhMzk4ZDIiLAogICJ0aHJlZERTQ29tcEluZCI6IlkiCn0="
        ]
    ];

    private const MOCK_CAPTURE_REQUEST = [
        "amount" => 250,
        "captureType" => "Final",
        "settings" => [
            "platform" => [
                "paymentFees" => [
                    "combined" => [
                        "bookTo" => "ac_3fe8398f-8cdb-43a3-9be2-806c4f84c327"
                    ]
                ]
            ]
        ],
    ];

    private const MOCK_REFUND_REQUEST = [
        "amount" => 250,
        "reason" => "Returned by customer"
    ];

    private const MOCK_TRANSACTION = [
        "id" => "txn_01FCTS1XMKH9FF43CAFA4CXT3P",
        "amount" => 500,
        "currency" => "GBP",
        "type" => "Capture",
        "status" => "Succeeded",
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_TRANSACTION_LIST = [
        "items" => [
            self::MOCK_TRANSACTION
        ]
    ];

    public static function getPaymentSession(): array
    {
        return self::MOCK_PAYMENT_SESSION;
    }

    public static function getPaymentSessionList(): array
    {
        return self::MOCK_PAYMENT_SESSION_LIST;
    }

    public static function getCreateRequest(): array
    {
        return self::MOCK_CREATE_REQUEST;
    }

    public static function getUpdateRequest(): array
    {
        return self::MOCK_UPDATE_REQUEST;
    }

    public static function getAttemptPaymentRequest(): array
    {
        return self::MOCK_ATTEMPT_PAYMENT_REQUEST;
    }

    public static function getContinuePaymentRequest(): array
    {
        return self::MOCK_CONTINUE_PAYMENT_REQUEST;
    }

    public static function getCaptureRequest(): array
    {
        return self::MOCK_CAPTURE_REQUEST;
    }

    public static function getRefundRequest(): array
    {
        return self::MOCK_REFUND_REQUEST;
    }

    public static function getTransaction(): array
    {
        return self::MOCK_TRANSACTION;
    }

    public static function getTransactionList(): array
    {
        return self::MOCK_TRANSACTION_LIST;
    }
}
