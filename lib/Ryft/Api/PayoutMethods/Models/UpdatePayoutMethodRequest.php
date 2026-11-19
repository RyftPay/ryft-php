<?php

namespace Ryft\Api\PayoutMethods\Models;

use Ryft\Api\AbstractRequest;

final class UpdatePayoutMethodRequest extends AbstractRequest
{
    private $displayName = null;
    private $bankAccount = null;
    private $default = null;

    public function __construct(array $data = [])
    {
        if (isset($data['displayName'])) {
            $this->displayName = $data['displayName'];
        }
        if (isset($data['bankAccount'])) {
            $this->bankAccount = $data['bankAccount'];
        }
        if (isset($data['default'])) {
            $this->default = $data['default'];
        }
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function getBankAccount(): ?array
    {
        return $this->bankAccount;
    }

    public function setBankAccount(?array $bankAccount): self
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    public function getDefault(): ?bool
    {
        return $this->default;
    }

    public function setDefault(?bool $default): self
    {
        $this->default = $default;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'displayName' => $this->displayName,
            'bankAccount' => $this->bankAccount,
            'default' => $this->default
        ];
    }
}
