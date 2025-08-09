<?php

namespace Ryft\Tests\Api\ApplePay;

final class MockData
{
    private const MOCK_APPLE_PAY = [
        "id" => "ap_1234567890",
        "domainName" => "example.com",
        "createdTimestamp" => 1631696701,
    ];

    private const MOCK_APPLE_PAY_WEB_SESSION = [
        "sessionObject" => "apple_pay_session",
    ];

    private const MOCK_DELETE_RESPONSE = [
        "id" => "ap_1234567890"
    ];

    public static function getMockApplePay(): array
    {
        return self::MOCK_APPLE_PAY;
    }

    public static function getMockApplePayWebSession(): array
    {
        return self::MOCK_APPLE_PAY_WEB_SESSION;
    }

    public static function getMockDeleteResponse(): array
    {
        return self::MOCK_DELETE_RESPONSE;
    }
}
