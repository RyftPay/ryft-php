<?php

namespace Ryft\Api\ApplePay\Models;

final class RegisterApplePayDomainRequest
{
    private $domainName;

    public function __construct(array $data = [])
    {
        if (isset($data['domainName'])) {
            $this->domainName = $data['domainName'];
        }
    }

    public function getDomainName(): string
    {
        return $this->domainName;
    }

    public function setDomainName(string $domainName): self
    {
        $this->domainName = $domainName;
        return $this;
    }
}
