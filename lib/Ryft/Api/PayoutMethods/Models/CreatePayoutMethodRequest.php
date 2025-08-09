<?php

namespace Ryft\Api\PayoutMethods\Models;

final class CreatePayoutMethodRequest
{
    private $type = null;
    private $displayName = null;
    private $currency = null;
    private $country = null;
    private $bankAccount = null;

    public function __construct(array $data = [])
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['displayName'])) {
            $this->displayName = $data['displayName'];
        }
        if (isset($data['currency'])) {
            $this->currency = $data['currency'];
        }
        if (isset($data['country'])) {
            $this->country = $data['country'];
        }
        if (isset($data['bankAccount'])) {
            $this->bankAccount = $data['bankAccount'];
        }
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
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

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;
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
