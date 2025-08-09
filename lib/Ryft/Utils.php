<?php

namespace Ryft;

class Utils
{
    private const LIVE_URL = 'https://api.ryftpay.com/v1';
    private const SANDBOX_URL = 'https://sandbox-api.ryftpay.com/v1';
    private const KEY_QUERY = 'sk_live';

    public static function determineBaseUrl(string $secretKey): string
    {
        if (substr($secretKey, 0, strlen(self::KEY_QUERY)) == self::KEY_QUERY) {
            return self::LIVE_URL;
        }
        return self::SANDBOX_URL;
    }
}
