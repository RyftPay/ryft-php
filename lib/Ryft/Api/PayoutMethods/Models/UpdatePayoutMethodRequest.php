<?php

namespace Ryft\Api\PayoutMethods\Models;

final class UpdatePayoutMethodRequest
{
    private $displayName = null;
    private $bankAccount = null;

    public function __construct(array $data = [])
    {
        if (isset($data['displayName'])) {
            $this->displayName = $data['displayName'];
        }
        if (isset($data['bankAccount'])) {
            $this->bankAccount = $data['bankAccount'];
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
}
