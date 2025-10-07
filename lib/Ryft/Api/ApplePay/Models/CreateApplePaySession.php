<?php

namespace Ryft\Api\ApplePay\Models;

use Ryft\Api\AbstractRequest;
use Ryft\Arrayable;

final class CreateApplePaySession extends AbstractRequest implements Arrayable
{
    private $displayName;
    private $domainName;

    public function __construct(array $data = [])
    {
        if (isset($data['displayName'])) {
            $this->displayName = $data['displayName'];
        }
        if (isset($data['domainName'])) {
            $this->domainName = $data['domainName'];
        }
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName): self
    {
        $this->displayName = $displayName;
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

    public function toArray(): array
    {
        return [
            'displayName' => $this->displayName,
            'domainName' => $this->domainName
        ];
    }
}
