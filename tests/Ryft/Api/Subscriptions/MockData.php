<?php

namespace Ryft\Tests\Api\Subscriptions;

class MockData
{
    private const MOCK_CREATE_SUBSCRIPTION_REQUEST = [
        "customer" => [
            "id" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ"
        ],
        "price" => [
            "amount" => 5000,
            "currency" => "GBP",
            "interval" => [
                "unit" => "Months",
                "count" => 1,
                "times" => 12
            ]
        ],
        "paymentMethod" => [
            "id" => "pmt_01FCTS1XMKH9FF43CAFA4CXT3P"
        ],
        "description" => "Bob's monthly gym membership",
        "billingCycleTimestamp" => 1631703901,
        "metadata" => [
            "orderId" => "1",
            "customerId" => "123"
        ],
        "shippingDetails" => [
            "address" => [
                "firstName" => "Fox",
                "lastName" => "Mulder",
                "lineOne" => "Stonehenge",
                "postalCode" => "SP4 7DE",
                "city" => "Salisbury",
                "country" => "GB",
                "region" => "ENGLAND"
            ]
        ],
        "paymentSettings" => [
            "statementDescriptor" => [
                "descriptor" => "Ryft Ltd",
                "city" => "London"
            ]
        ]
    ];

    private const MOCK_UPDATE_SUBSCRIPTION_REQUEST = [
        "price" => [
            "amount" => 5000,
            "interval" => [
                "unit" => "Months",
                "count" => 1,
                "times" => 12
            ]
        ],
        "paymentMethod" => [
            "id" => "pmt_01FCTS1XMKH9FF43CAFA4CXT3P"
        ],
        "description" => "Bob's monthly gym membership",
        "billingCycleTimestamp" => 1631703901,
        "metadata" => [
            "orderId" => "1",
            "customerId" => "123"
        ],
        "shippingDetails" => [
            "address" => [
                "firstName" => "Fox",
                "lastName" => "Mulder",
                "lineOne" => "Stonehenge",
                "postalCode" => "SP4 7DE",
                "city" => "Salisbury",
                "country" => "GB",
                "region" => "ENGLAND"
            ]
        ],
        "paymentSettings" => [
            "statementDescriptor" => [
                "descriptor" => "Ryft Ltd",
                "city" => "London"
            ]
        ]
    ];

    private const MOCK_PAUSE_REQUEST = [
        "reason" => "Offering service for free to customer",
        "resumeTimestamp" => 1470989538,
        "unschedule" => true
    ];

    private const MOCK_SUBSCRIPTION = [
        "id" => "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ",
        "status" => "Pending",
        "description" => "Bob's monthly gym membership",
        "customer" => [
            "id" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ"
        ],
        "paymentMethod" => [
            "id" => "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ"
        ],
        "paymentSessions" => [
            "initial" => [
                "id" => "ps_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "clientSecret" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P_secret_b83f2653-06d7-44a9-a548-5825e8186004",
                "requiredAction" => [
                    "type" => "Redirect",
                    "url" => "https://ryftpay.com/3ds-auth"
                ]
            ],
            "latest" => [
                "id" => "ps_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "clientSecret" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P_secret_b83f2653-06d7-44a9-a548-5825e8186004",
                "requiredAction" => [
                    "type" => "Redirect",
                    "url" => "https://ryftpay.com/3ds-auth"
                ]
            ]
        ],
        "price" => [
            "amount" => 5000,
            "currency" => "GBP",
            "interval" => [
                "unit" => "Months",
                "count" => 1,
                "times" => 12
            ]
        ],
        "balance" => [
            "amount" => 5000
        ],
        "pausePaymentDetail" => [
            "reason" => "Offering service for free to customer",
            "resumeAtTimestamp" => 1470989538,
            "pausedAtTimestamp" => 1470989538
        ],
        "cancelDetail" => [
            "reason" => "Customer no longer wants to use the service",
            "cancelledAtTimestamp" => 1480989538
        ],
        "billingDetail" => [
            "totalCycles" => 12,
            "currentCycle" => 4,
            "currentCycleStartTimestamp" => 1480989538,
            "currentCycleEndTimestamp" => 1480989538,
            "billingCycleTimestamp" => 1480989538,
            "nextBillingTimestamp" => 1480989538,
            "failureDetail" => [
                "paymentAttempts" => 2,
                "lastPaymentError" => "insufficient_funds"
            ]
        ],
        "shippingDetails" => [
            "address" => [
                "firstName" => "Fox",
                "lastName" => "Mulder",
                "lineOne" => "Stonehenge",
                "postalCode" => "SP4 7DE",
                "city" => "Salisbury",
                "country" => "GB"
            ]
        ],
        "metadata" => [
            "myCustomerId" => "1"
        ],
        "paymentSettings" => [
            "statementDescriptor" => [
                "descriptor" => "Ryft Ltd",
                "city" => "London"
            ]
        ],
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_SUBSCRIPTION_LIST = [
        "items" => [
            self::MOCK_SUBSCRIPTION
        ]
    ];

    private const MOCK_PAYMENT_SESSIONS = [
        "items" => [
            [
                "id" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P",
                "amount" => 500,
                "currency" => "GBP",
                "paymentType" => "Standard",
                "entryMode" => "Online",
                "customerEmail" => "example@mail.com",
                "status" => "PendingPayment",
                "createdTimestamp" => 1470989538,
                "lastUpdatedTimestamp" => 1470989538
            ]
        ],
        "paginationToken" => "ps_01FCTS1XMKH9FF43CAFA4CXT3P"
    ];

    private const MOCK_DELETE_RESPONSE = [
        "id" => "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ"
    ];

    public static function getCreateSubscriptionRequest(): array
    {
        return self::MOCK_CREATE_SUBSCRIPTION_REQUEST;
    }

    public static function getUpdateSubscriptionRequest(): array
    {
        return self::MOCK_UPDATE_SUBSCRIPTION_REQUEST;
    }

    public static function getPauseRequest(): array
    {
        return self::MOCK_PAUSE_REQUEST;
    }

    public static function getSubscription(): array
    {
        return self::MOCK_SUBSCRIPTION;
    }

    public static function getSubscriptionList(): array
    {
        return self::MOCK_SUBSCRIPTION_LIST;
    }

    public static function getPaymentSessions(): array
    {
        return self::MOCK_PAYMENT_SESSIONS;
    }

    public static function getDeleteResponse(): array
    {
        return self::MOCK_DELETE_RESPONSE;
    }
}
