<?php

namespace Ryft\Api\Transfers\Models;

final class CreateTransferRequest
{
    private $amount;
    private $currency;
    private $source;
    private $destination;
    private $reason;
    private $metadata;

    public function __construct(array $data = [])
    {
        $this->amount = $data['amount'] ?? null;
        $this->currency = $data['currency'] ?? null;
        $this->source = $data['source'] ?? null;
        $this->destination = $data['destination'] ?? null;
        $this->reason = $data['reason'] ?? null;
        $this->metadata = $data['metadata'] ?? null;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    public function getSource(): ?array
    {
        return $this->source;
    }

    public function setSource(?array $source): void
    {
        $this->source = $source;
    }

    public function getDestination(): ?array
    {
        return $this->destination;
    }

    public function setDestination(?array $destination): void
    {
        $this->destination = $destination;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(?array $metadata): void
    {
        $this->metadata = $metadata;
    }
}
