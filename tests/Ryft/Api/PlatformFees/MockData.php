<?php

namespace Ryft\Tests\Api\PlatformFees;

final class MockData
{
    private const MOCK_PLATFORM_FEE = [
        "id" => "pf_01FCTS1XMKH9FF43CAFA4CXT3P",
        "paymentSessionId" => "ps_01JJPPAZTNN38EMDJ72FASHE7R",
        "amount" => 40,
        "paymentAmount" => 450,
        "processingFee" => 7,
        "netAmount" => 33,
        "currency" => "GBP",
        "fromAccountId" => "ac_b83f2653-06d7-44a9-a548-5825e8186004",
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_PLATFORM_FEE_REFUND = [
        "id" => "fr_01FM9XMMV1MYDG6NGMHPDE065N_01FM9XNFXDYXAT0BJN5BBN794B",
        "platformFeeId" => "pf_01FM9XMMV1MYDG6NGMHPDE065N",
        "amount" => 5,
        "currency" => "GBP",
        "reason" => "Requested by the customer",
        "status" => "Pending",
        "createdTimestamp" => 1470989538,
        "lastUpdatedTimestamp" => 1470989538
    ];

    private const MOCK_PLATFORM_FEE_LIST = [
        "items" => [
            self::MOCK_PLATFORM_FEE
        ]
    ];

    private const MOCK_PLATFORM_FEE_REFUNDS = [
        "items" => [
            self::MOCK_PLATFORM_FEE_REFUND
        ]
    ];

    public static function getPlatformFee(): array
    {
        return self::MOCK_PLATFORM_FEE;
    }

    public static function getPlatformFeeList(): array
    {
        return self::MOCK_PLATFORM_FEE_LIST;
    }

    public static function getPlatformFeeRefund(): array
    {
        return self::MOCK_PLATFORM_FEE_REFUND;
    }

    public static function getPlatformFeeRefunds(): array
    {
        return self::MOCK_PLATFORM_FEE_REFUNDS;
    }
}
