<?php

namespace Ryft\Tests\Api\Accounts;

final class MockData
{
    private const MOCK_ACCOUNT = [
        "id" => "ac_b83f2653-06d7-44a9-a548-5825e8186004",
        "type" => "Standard",
        "status" => "ActionRequired",
        "actionsRequired" => [
            ["action" => "PayoutDetailsRequired", "description" => "string"],
        ],
        "frozen" => false,
        "email" => "user@example.com",
        "onboardingFlow" => "Hosted",
        "entityType" => "Business",
        "business" => [
            "name" => "string",
            "type" => "Corporation",
            "registrationNumber" => "12345678",
            "registrationDate" => "1990-01-20",
            "registeredAddress" => [
                "lineOne" => "string",
                "lineTwo" => "string",
                "city" => "string",
                "country" => "GB",
                "postalCode" => "string",
                "region" => "string",
            ],
            "contactEmail" => "contact@test.com",
            "phoneNumber" => "+447900000000",
            "tradingName" => "string",
            "tradingAddress" => [
                "lineOne" => "string",
                "lineTwo" => "string",
                "city" => "string",
                "country" => "GB",
                "postalCode" => "string",
                "region" => "string",
            ],
            "tradingCountries" => ["GB"],
            "websiteUrl" => "https://www.example.com",
            "documents" => [
                [
                    "type" => "BankStatement",
                    "category" => "ProofOfIdentity",
                    "front" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                    "back" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                    "status" => "Pending",
                    "invalidReason" => "Document has expired",
                    "country" => "GB",
                    "assignedTimestamp" => 1470989538,
                    "lastUpdatedTimestamp" => 1470989538,
                ],
            ],
        ],
        "individual" => [
            "firstName" => "Fred",
            "middleNames" => "David",
            "lastName" => "Jones",
            "email" => "fred.jones@example.com",
            "dateOfBirth" => "1990-01-20",
            "countryOfBirth" => "GB",
            "gender" => "Male",
            "nationalities" => ["GB"],
            "address" => [
                "lineOne" => "string",
                "lineTwo" => "string",
                "city" => "string",
                "country" => "GB",
                "postalCode" => "string",
                "region" => "string",
            ],
            "phoneNumber" => "+447900000000",
            "documents" => [
                [
                    "type" => "BankStatement",
                    "category" => "ProofOfIdentity",
                    "front" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                    "back" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                    "status" => "Pending",
                    "invalidReason" => "Document has expired",
                    "country" => "GB",
                    "assignedTimestamp" => 1470989538,
                    "lastUpdatedTimestamp" => 1470989538,
                ],
            ],
        ],
        "verification" => [
            "status" => "Required",
            "requiredFields" => [["name" => "string"]],
            "requiredDocuments" => [
                [
                    "category" => "ProofOfIdentity",
                    "types" => ["BankStatement"],
                    "quantity" => 1,
                ],
            ],
            "errors" => [
                [
                    "code" => "InvalidDocument",
                    "id" => "string",
                    "description" => "string",
                ],
            ],
            "persons" => [
                "status" => "Required",
                "required" => [["role" => "Director", "quantity" => 1]],
            ],
        ],
        "metadata" => ["accountId" => "1"],
        "settings" => ["payouts" => ["schedule" => ["type" => "Automatic"]]],
        "capabilities" => [
            "visaPayments" => [
                "status" => "Enabled",
                "requested" => true,
                "requiredFields" => [["name" => "entityType"]],
                "disabledReason" => "string",
                "requestedTimestamp" => 1470989538,
                "lastUpdatedTimestamp" => 1470989538,
            ],
            "mastercardPayments" => [
                "status" => "Enabled",
                "requested" => true,
                "requiredFields" => [["name" => "entityType"]],
                "disabledReason" => "string",
                "requestedTimestamp" => 1470989538,
                "lastUpdatedTimestamp" => 1470989538,
            ],
            "amexPayments" => [
                "status" => "Enabled",
                "requested" => true,
                "requiredFields" => [["name" => "entityType"]],
                "disabledReason" => "string",
                "requestedTimestamp" => 1470989538,
                "lastUpdatedTimestamp" => 1470989538,
            ],
        ],
        "termsOfService" => [
            "acceptance" => [
                "ipAddress" => "127.0.0.1",
                "userAgent" =>
                    "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36",
                "when" => 1697557453,
            ],
        ],
        "createdTimestamp" => 1470989538,
    ];


    private const MOCK_PAYOUT = [
        "id" => "po_01FJ1H0023R1AHM77YQ75RMKE7",
        "paymentsTakenDate" => "2021-10-14",
        "paymentsTakenDateFrom" => "2021-10-14",
        "paymentsTakenDateTo" => "2021-10-14",
        "amount" => 9750,
        "currency" => "GBP",
        "status" => "Completed",
        "scheduleType" => "Automatic",
        "payoutMethod" => [
            "id" => "pm_01FCTS1XMKH9FF43CAFA4CXT3P",
            "bankAccount" => [
                "bankIdType" => "SortCode",
                "bankId" => "string",
                "bankName" => "string",
                "accountNumberType" => "UnitedKingdom",
                "last4" => "string"
            ]
        ],
        "failureReason" => "InvalidPayoutMethod",
        "payoutCalculation" => [
            "paymentsCapturedAmount" => 10000,
            "paymentsRefundedAmount" => 50,
            "paymentsSplitAmount" => 10000,
            "paymentsSplitRefundedAmount" => 50,
            "splitPaymentsAmount" => 10000,
            "splitPaymentsRefundedAmount" => 50,
            "platformFeesCollectedAmount" => 0,
            "platformFeesRefundedAmount" => 0,
            "platformFeesPaidAmount" => 100,
            "processingFeesPaidAmount" => 100,
            "chargebacksAmount" => 100,
            "chargebackReversalsAmount" => 100,
            "platformChargebacksAmount" => 100,
            "platformChargebackReversalsAmount" => 100,
            "transferredInAmount" => 100,
            "transferredOutAmount" => 100,
            "payoutAmount" => 9750,
            "currency" => "GBP",
            "numberOfPaymentsCaptured" => 100,
            "numberOfPaymentsRefunded" => 1,
            "numberOfPaymentsSplit" => 100,
            "numberOfPaymentsSplitRefunded" => 1,
            "numberOfSplitPayments" => 100,
            "numberOfSplitPaymentsRefunded" => 1,
            "numberOfPlatformFeesCollected" => 0,
            "numberOfPlatformFeesRefunded" => 0,
            "numberOfChargebacks" => 0,
            "numberOfChargebackReversals" => 0,
            "numberOfPlatformChargebacks" => 0,
            "numberOfPlatformChargebackReversals" => 0,
            "numberOfTransfersIn" => 0,
            "numberOfTransfersOut" => 0,
            "numberOfCustomers" => 74,
            "numberOfNewCustomers" => 50
        ],
        "scheme" => "Ach",
        "createdTimestamp" => 1631696701,
        "scheduledTimestamp" => 1631696701,
        "completedTimestamp" => 1631696701,
        "metadata" => [
            "orderId" => "1",
            "customerId" => "123"
        ]
    ];

    private const MOCK_AUTH_LINK = [
        "createdTimestamp" => 1631696701,
        "expiresTimestamp" => 1631703901,
        "url" => "https://sandbox-dash.ryftpay.com/signin?atl=123",
    ];

    public static function getAccount(): array
    {
        return self::MOCK_ACCOUNT;
    }

    public static function getPayout(): array
    {
        return self::MOCK_PAYOUT;
    }

    public static function getAuthLink(): array
    {
        return self::MOCK_AUTH_LINK;
    }
}
