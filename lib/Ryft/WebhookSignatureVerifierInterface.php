<?php

namespace Ryft;

interface WebhookSignatureVerifierInterface
{
    public function isValid(string $secret, string $signature, string $payload): bool;
}
