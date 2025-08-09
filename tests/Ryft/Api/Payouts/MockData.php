<?php

namespace Ryft\Tests\Api\Payouts;

final class MockData
{
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

    private const MOCK_PAYOUT_LIST = [
        "items" => [
            self::MOCK_PAYOUT
        ]
    ];

    private const MOCK_CREATE_REQUEST = [
        "amount" => 5000,
        "currency" => "GBP",
        "payoutMethodId" => "pm_01FCTS1XMKH9FF43CAFA4CXT3P",
        "metadata" => [
            "orderId" => "1",
            "customerId" => "123"
        ]
    ];

    public static function getPayout(): array
    {
        return self::MOCK_PAYOUT;
    }

    public static function getPayoutList(): array
    {
        return self::MOCK_PAYOUT_LIST;
    }

    public static function getCreateRequest(): array
    {
        return self::MOCK_CREATE_REQUEST;
    }
}
