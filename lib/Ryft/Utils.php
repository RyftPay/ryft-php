<?php

namespace Ryft;

use InvalidArgumentException;

class Utils
{
    private const LIVE_URL = 'https://api.ryftpay.com/v1';
    private const SANDBOX_URL = 'https://sandbox-api.ryftpay.com/v1';

    private const SANDBOX_PREFIX = 'sk_sandbox';
    private const LIVE_PREFIX = 'sk_';

    public static function determineBaseUrl(string $secretKey): string
    {
        if (strncmp($secretKey, self::SANDBOX_PREFIX, strlen(self::SANDBOX_PREFIX)) === 0) {
            return self::SANDBOX_URL;
        }

        if (strncmp($secretKey, self::LIVE_PREFIX, strlen(self::LIVE_PREFIX)) === 0) {
            return self::LIVE_URL;
        }

        throw new InvalidArgumentException("Invalid secret key: expected prefix 'sk_'");
    }
}
