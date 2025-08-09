<?php

namespace Ryft\Tests\Api\PaymentMethods;

final class MockData
{
    private const MOCK_PAYMENT_METHOD = [
        "id" => "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ",
        "type" => "Card",
        "card" => [
            "scheme" => "Mastercard",
            "last4" => "4242",
            "expiryMonth" => "10",
            "expiryYear" => "2024"
        ],
        "billingAddress" => [
            "firstName" => "John",
            "lastName" => "Doe",
            "lineOne" => "123 Main Street",
            "lineTwo" => "Apt 4B",
            "city" => "London",
            "country" => "GB",
            "postalCode" => "SW1A 1AA",
            "region" => "England"
        ],
        "checks" => [
            "avsResponseCode" => "Y",
            "cvvResponseCode" => "M"
        ],
        "customerId" => "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ",
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_UPDATE_REQUEST = [
        "billingAddress" => [
            "firstName" => "Jane",
            "lastName" => "Smith",
            "lineOne" => "456 Oak Street",
            "lineTwo" => "Suite 10",
            "city" => "Manchester",
            "country" => "GB",
            "postalCode" => "M1 1AA",
            "region" => "England"
        ]
    ];

    private const MOCK_DELETE_RESPONSE = [
        "id" => "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ"
    ];

    public static function getPaymentMethod(): array
    {
        return self::MOCK_PAYMENT_METHOD;
    }

    public static function getUpdateRequest(): array
    {
        return self::MOCK_UPDATE_REQUEST;
    }

    public static function getDeleteResponse(): array
    {
        return self::MOCK_DELETE_RESPONSE;
    }
}
