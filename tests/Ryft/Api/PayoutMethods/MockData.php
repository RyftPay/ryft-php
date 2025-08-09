<?php

namespace Ryft\Tests\Api\PayoutMethods;

final class MockData
{
    private const MOCK_PAYOUT_METHOD = [
        "id" => "pm_01G0EYVFR02KBBVE2YWQ8AKMGJ",
        "type" => "BankAccount",
        "displayName" => "Main Business Account",
        "status" => "Valid",
        "currency" => "GBP",
        "country" => "GB",
        "bankAccount" => [
            "bankIdType" => "SortCode",
            "bankId" => "123456",
            "bankName" => "Test Bank",
            "accountNumberType" => "UnitedKingdom",
            "last4" => "5678",
            "address" => [
                "lineOne" => "123 Street",
                "lineTwo" => "Suite 10",
                "city" => "Manchester",
                "country" => "GB",
                "postalCode" => "M1 1AA",
                "region" => "England"
            ]
        ],
        "createdTimestamp" => 1470989538,
        "lastUpdatedTimestamp" => 1470989538
    ];

    private const MOCK_PAYOUT_METHOD_LIST = [
        "items" => [
            self::MOCK_PAYOUT_METHOD
        ]
    ];

    private const MOCK_CREATE_REQUEST_GBP = [
        "type" => "BankAccount",
        "currency" => "GBP",
        "country" => "GB",
        "bankAccount" => [
            "bankIdType" => "SortCode",
            "bankId" => "123456",
            "accountNumberType" => "UnitedKingdom",
            "accountNumber" => "12345678",
            "address" => [
                "lineOne" => "123 Street",
                "city" => "Manchester",
                "country" => "GB",
                "postalCode" => "M1 1AA"
            ]
        ]
    ];

    private const MOCK_CREATE_REQUEST_EUR = [
        "type" => "BankAccount",
        "currency" => "EUR",
        "country" => "IE",
        "bankAccount" => [
            "accountNumberType" => "Iban",
            "accountNumber" => "IE64IRCE92050112345678",
            "address" => [
                "lineOne" => "123 Street",
                "city" => "Dublin",
                "country" => "IE",
                "postalCode" => "DO1 1AA"
            ]
        ]
    ];

    private const MOCK_CREATE_REQUEST_USD = [
        "type" => "BankAccount",
        "currency" => "USD",
        "country" => "US",
        "bankAccount" => [
            "bankIdType" => "RoutingNumber",
            "bankId" => "026014928",
            "accountNumberType" => "UnitedStates",
            "accountNumber" => "253368194864",
            "address" => [
                "lineOne" => "123 Street",
                "city" => "Beverly Hills",
                "country" => "US",
                "postalCode" => "90210",
                "region" => "CA"
            ]
        ]
    ];

    private const MOCK_UPDATE_REQUEST = [
        "displayName" => "Updated Business Account",
        "bankAccount" => [
            "bankIdType" => "SortCode",
            "bankId" => "654321",
            "accountNumberType" => "UnitedKingdom",
            "accountNumber" => "87654321",
            "address" => [
                "lineOne" => "456 New Street",
                "lineTwo" => "Floor 2",
                "city" => "London",
                "country" => "GB",
                "postalCode" => "SW1A 1AA",
                "region" => "England"
            ]
        ]
    ];

    private const MOCK_DELETE_RESPONSE = [
        "id" => "pm_01G0EYVFR02KBBVE2YWQ8AKMGJ"
    ];

    public static function getPayoutMethod(): array
    {
        return self::MOCK_PAYOUT_METHOD;
    }

    public static function getPayoutMethodList(): array
    {
        return self::MOCK_PAYOUT_METHOD_LIST;
    }

    public static function getCreateRequestGBP(): array
    {
        return self::MOCK_CREATE_REQUEST_GBP;
    }

    public static function getCreateRequestEUR(): array
    {
        return self::MOCK_CREATE_REQUEST_EUR;
    }

    public static function getCreateRequestUSD(): array
    {
        return self::MOCK_CREATE_REQUEST_USD;
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
