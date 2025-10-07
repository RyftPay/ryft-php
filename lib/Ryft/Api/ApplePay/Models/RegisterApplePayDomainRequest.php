<?php

namespace Ryft\Api\ApplePay\Models;

use Ryft\Api\AbstractRequest;
use Ryft\Arrayable;

final class RegisterApplePayDomainRequest extends AbstractRequest implements Arrayable
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

    public function toArray(): array
    {
        return [
            'domainName' => $this->domainName,
        ];
    }
}
