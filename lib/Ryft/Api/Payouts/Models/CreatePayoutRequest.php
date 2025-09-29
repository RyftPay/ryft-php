<?php

namespace Ryft\Api\Payouts\Models;

use Ryft\Arrayable;

final class CreatePayoutRequest implements Arrayable
{
    private $amount = null;
    private $currency = null;
    private $payoutMethodId = null;
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

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;
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

    public function getPayoutMethodId(): ?string
    {
        return $this->payoutMethodId;
    }

    public function setPayoutMethodId(?string $payoutMethodId): self
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

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'currency' => $this->currency,
            'payoutMethodId' => $this->payoutMethodId,
            'metadata' => $this->metadata
        ];
    }
}
