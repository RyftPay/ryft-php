<?php

namespace Ryft\Api\ApplePay\Models;

final class CreateApplePaySession
{
    private $displaName;
    private $domainName;

    public function __construct(array $data = [])
    {
        if (isset($data['displayName'])) {
            $this->displaName = $data['displayName'];
        }
        if (isset($data['domainName'])) {
            $this->domainName = $data['domainName'];
        }
    }

    public function getDisplayName(): string
    {
        return $this->displaName;
    }

    public function setDisplayName(string $displayName): self
    {
        $this->displaName = $displayName;
        return $this;
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
