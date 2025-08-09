<?php

namespace Ryft\Api\ApplePay;

use Ryft\Api\ApplePay\Models\CreateApplePaySession;
use Ryft\Api\ApplePay\Models\RegisterApplePayDomainRequest;

interface ApplePayInterface
{
    public function registerDomain(RegisterApplePayDomainRequest $req, ?string $account = null): array;

    public function listDomains(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array;

    public function getDomain(string $domain, ?string $account = null): array;

    public function deleteDomain(string $domain, ?string $account = null): array;

    public function createSession(CreateApplePaySession $data, ?string $account = null): array;
}
