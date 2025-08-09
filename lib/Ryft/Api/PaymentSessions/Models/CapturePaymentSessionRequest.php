<?php

namespace Ryft\Api\PaymentSessions\Models;

final class CapturePaymentSessionRequest
{
    private $amount = null;
    private $captureType = null;
    private $platformFee = null;
    private $splits = null;
    private $settings = null;

    public function __construct(array $data = [])
    {
        if (isset($data['amount'])) {
            $this->amount = $data['amount'];
        }
        if (isset($data['captureType'])) {
            $this->captureType = $data['captureType'];
        }
        if (isset($data['platformFee'])) {
            $this->platformFee = $data['platformFee'];
        }
        if (isset($data['splits'])) {
            $this->splits = $data['splits'];
        }
        if (isset($data['settings'])) {
            $this->settings = $data['settings'];
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

    public function getCaptureType(): ?string
    {
        return $this->captureType;
    }

    public function setCaptureType(?string $captureType): self
    {
        $this->captureType = $captureType;
        return $this;
    }

    public function getPlatformFee(): ?int
    {
        return $this->platformFee;
    }

    public function setPlatformFee(?int $platformFee): self
    {
        $this->platformFee = $platformFee;
        return $this;
    }

    public function getSplits(): ?array
    {
        return $this->splits;
    }

    public function setSplits(?array $splits): self
    {
        $this->splits = $splits;
        return $this;
    }

    public function getSettings(): ?array
    {
        return $this->settings;
    }

    public function setSettings(?array $settings): self
    {
        $this->settings = $settings;
        return $this;
    }
}
