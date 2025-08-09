<?php

namespace Ryft\Api\Accounts\Models;

final class CreateManualPayoutRequest
{
    private $amount;
    private $currency;
    private $payoutMethodId;
    private $metadata = null;

    public function __construct(array $data = [])
    {
        if (isset($data['amount'])) {
            $this->amount = $data['amount'];
        }
        if (isset($data['currency'])) {
            $this->currency = $data['currency'];
        }
        if (isset($data['payoutMethodId'])) {
            $this->payoutMethodId = $data['payoutMethodId'];
        }
        if (isset($data['metadata'])) {
            $this->metadata = $data['metadata'];
        }
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getPayoutMethodId(): string
    {
        return $this->payoutMethodId;
    }

    public function setPayoutMethodId(string $payoutMethodId): self
    {
        $this->payoutMethodId = $payoutMethodId;
        return $this;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(?array $metadata): self
    {
        $this->metadata = $metadata;
        return $this;
    }
}
