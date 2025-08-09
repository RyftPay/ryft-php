<?php

namespace Ryft\Tests;

use PHPUnit\Framework\TestCase;
use Ryft\Utils;

class UtilsTest extends TestCase
{
    public function testDetermineBaseUrlWithLiveKey(): void
    {
        $liveKey = 'sk_live_1234567890abcdef';
        $expectedUrl = 'https://api.ryftpay.com/v1';
        $this->assertEquals($expectedUrl, Utils::determineBaseUrl($liveKey));
    }

    public function testDetermineBaseUrlWithSandboxKey(): void
    {
        $sandboxKey = 'sk_test_1234567890abcdef';
        $expectedUrl = 'https://sandbox-api.ryftpay.com/v1';
        $this->assertEquals($expectedUrl, Utils::determineBaseUrl($sandboxKey));
    }

    public function testDetermineBaseUrlWithRandomKey(): void
    {
        $randomKey = 'anything_else';
        $expectedUrl = 'https://sandbox-api.ryftpay.com/v1';
        $this->assertEquals($expectedUrl, Utils::determineBaseUrl($randomKey));
    }
}
