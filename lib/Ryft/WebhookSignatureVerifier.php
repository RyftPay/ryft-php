<?php

namespace Ryft;

final class WebhookSignatureVerifier implements WebhookSignatureVerifierInterface
{
    public function isValid(string $secret, string $signature, string $payload): bool
    {
        return $this->hmacSha256($secret, $payload) === $signature;
    }

    private function hmacSha256(string $secret, string $payload): string
    {
        $hash = hash_hmac('sha256', $payload, $secret, false);
        return $hash;
    }
}
