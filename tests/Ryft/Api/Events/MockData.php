<?php

namespace Ryft\Tests\Api\Events;

final class MockData
{
    private const MOCK_EVENT = [
        "id" => "evt_123",
        "type" => "PaymentSession.captured",
        "accountId" => "acc_123",
        "createdTimestamp" => 123456,
        "data" => [
            "paymentSessionId" => "pay_123",
            "amount" => 123,
            "currency" => "GBP",
            "status" => "captured"
        ]
    ];

    private const MOCK_EVENT_LIST = [
        "items" => [
            self::MOCK_EVENT
        ]
    ];

    public static function getEvent(): array
    {
        return self::MOCK_EVENT;
    }

    public static function getEventList(): array
    {
        return self::MOCK_EVENT_LIST;
    }
}
