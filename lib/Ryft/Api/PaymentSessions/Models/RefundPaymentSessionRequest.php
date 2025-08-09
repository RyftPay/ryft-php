<?php

namespace Ryft\Api\PaymentSessions\Models;

final class RefundPaymentSessionRequest
{
    private $amount = null;
    private $reason = null;
    private $refundPlatformFee = null;
    private $splits = null;
    private $captureTransaction = null;

    public function __construct(array $data = [])
    {
        if (isset($data['amount'])) {
            $this->amount = $data['amount'];
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['refundPlatformFee'])) {
            $this->refundPlatformFee = $data['refundPlatformFee'];
        }
        if (isset($data['splits'])) {
            $this->splits = $data['splits'];
        }
        if (isset($data['captureTransaction'])) {
            $this->captureTransaction = $data['captureTransaction'];
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

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->reason = $reason;
        return $this;
    }

    public function getRefundPlatformFee(): ?bool
    {
        return $this->refundPlatformFee;
    }

    public function setRefundPlatformFee(?bool $refundPlatformFee): self
    {
        $this->refundPlatformFee = $refundPlatformFee;
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

    public function getCaptureTransaction(): ?array
    {
        return $this->captureTransaction;
    }

    public function setCaptureTransaction(?array $captureTransaction): self
    {
        $this->captureTransaction = $captureTransaction;
        return $this;
    }
}
