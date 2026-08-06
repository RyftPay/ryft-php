<?php

namespace Ryft\Api\Conversions\Models;

use Ryft\Api\AbstractRequest;

final class CreateConversionRequest extends AbstractRequest
{
    private $sell;
    private $buy;
    private $termAgreement;
    private $fixedSide;
    private $reason;

    public function __construct(array $data = [])
    {
        $this->sell = $data['sell'] ?? null;
        $this->buy = $data['buy'] ?? null;
        $this->termAgreement = $data['termAgreement'] ?? null;
        $this->fixedSide = $data['fixedSide'] ?? null;
        $this->reason = $data['reason'] ?? null;
    }

    public function getSell(): ?array
    {
        return $this->sell;
    }

    public function setSell(?array $sell): void
    {
        $this->sell = $sell;
    }

    public function getBuy(): ?array
    {
        return $this->buy;
    }

    public function setBuy(?array $buy): void
    {
        $this->buy = $buy;
    }

    public function getTermAgreement(): ?bool
    {
        return $this->termAgreement;
    }

    public function setTermAgreement(?bool $termAgreement): void
    {
        $this->termAgreement = $termAgreement;
    }

    public function getFixedSide(): ?string
    {
        return $this->fixedSide;
    }

    public function setFixedSide(?string $fixedSide): void
    {
        $this->fixedSide = $fixedSide;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    public function toArray(): array
    {
        return [
            'sell' => $this->sell,
            'buy' => $this->buy,
            'termAgreement' => $this->termAgreement,
            'fixedSide' => $this->fixedSide,
            'reason' => $this->reason
        ];
    }
}
