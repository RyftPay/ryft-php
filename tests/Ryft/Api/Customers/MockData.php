<?php

namespace Ryft\Tests\Api\Customers;

class MockData
{
    private const MOCK_CUSTOMER = [
        "id" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ",
        "email" => "example@example.com",
        "firstName" => "Jeff",
        "lastName" => "Bridges",
        "homePhoneNumber" => "+447900000000",
        "mobilePhoneNumber" => "+447900000000",
        "defaultPaymentMethod" => "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ",
        "metadata" => [
            "customerId" => "1",
            "registeredTimestamp" => "123"
        ],
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_CUSTOMER_LIST = [
        "data" => [
            [
                "id" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "email" => "example@example.com",
                "firstName" => "Jeff",
                "lastName" => "Bridges",
                "homePhoneNumber" => "+447900000000",
                "mobilePhoneNumber" => "+447900000000",
                "metadata" => [
                    "customerId" => "1",
                    "registeredTimestamp" => "123"
                ],
                "createdTimestamp" => 1470989538
            ],
            [
                "id" => "cus_01G0EYVFR02KBBVE2YWQ8AKMG2",
                "email" => "fred.jones@example.com",
                "firstName" => "Fred",
                "lastName" => "Jones",
                "homePhoneNumber" => "+447900000001",
                "mobilePhoneNumber" => "+447900000001",
                "metadata" => [
                    "customerId" => "2"
                ],
                "createdTimestamp" => 1470989600
            ]
        ],
        "hasMore" => false,
        "total" => 2
    ];

    private const MOCK_PAYMENT_METHODS = [
        "data" => [
            [
                "id" => "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "type" => "Card",
                "card" => [
                    "scheme" => "Mastercard",
                    "last4" => "4242",
                    "expiryMonth" => "10",
                    "expiryYear" => "2024"
                ],
                "billingAddress" => [
                    "firstName" => "Jeff",
                    "lastName" => "Bridges",
                    "lineOne" => "123 Test Street",
                    "lineTwo" => "Apt 1",
                    "city" => "London",
                    "country" => "GB",
                    "postalCode" => "SW1A 1AA",
                    "region" => "London"
                ],
                "checks" => [
                    "avsResponseCode" => "Y",
                    "cvvResponseCode" => "M"
                ],
                "customerId" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "createdTimestamp" => 1470989538
            ]
        ],
        "hasMore" => false,
        "total" => 1
    ];

    private const MOCK_DELETE_RESPONSE = [
        "id" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ"
    ];

    public static function getCustomer(): array
    {
        return self::MOCK_CUSTOMER;
    }

    public static function getCustomerList(): array
    {
        return self::MOCK_CUSTOMER_LIST;
    }

    public static function getPaymentMethods(): array
    {
        return self::MOCK_PAYMENT_METHODS;
    }

    public static function getMockDeleteResponse(): array
    {
        return self::MOCK_DELETE_RESPONSE;
    }
}
