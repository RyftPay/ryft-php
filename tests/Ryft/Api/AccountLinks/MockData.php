<?php

namespace Ryft\Tests\Api\AccountLinks;

final class MockData
{
    private const MOCK_TEMPORARY_ACCOUNT_LINK = [
        "url" => "https://sandbox-dash.ryftpay.com",
        "createdTimestamp" => 1234567890,
        "expiresTimestamp" => 1234567890,
    ];

    public static function getTemporaryAccountLink(): array
    {
        return self::MOCK_TEMPORARY_ACCOUNT_LINK;
    }
}
