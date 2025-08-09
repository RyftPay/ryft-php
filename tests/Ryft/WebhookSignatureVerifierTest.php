<?php

namespace Ryft\Tests;

use PHPUnit\Framework\TestCase;
use Ryft\WebhookSignatureVerifier;

class WebhookSignatureVerifierTest extends TestCase
{
    private $verifier;

    protected function setUp(): void
    {
        $this->verifier = new WebhookSignatureVerifier();
    }

    public function testIsValidShouldReturnFalseWhenSignatureIsInvalid(): void
    {
        $payload = '{"amount": 500, "currency": "GBP"}';
        $secretKey = 'abcdef4455';
        $signature = '12443c521a6900579d09b1b29cf17b679f7745eb32a8018e46f44bb27103f864';

        $result = $this->verifier->isValid($secretKey, $signature, $payload);

        $this->assertFalse($result);
    }

    public function testIsValidShouldReturnTrueWhenSignatureIsValid(): void
    {
        $payload = '{"amount": 500, "currency": "GBP"}';
        $secretKey = 'abcdef4455';
        $signature = '12443c521a6900579d09b1b29cf17b679f7745eb32a8018e46f44bb27103f865';

        $result = $this->verifier->isValid($secretKey, $signature, $payload);

        $this->assertTrue($result);
    }
}
