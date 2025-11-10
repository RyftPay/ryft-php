<?php

namespace Ryft\Api\InPersonTerminals\Models;

use Ryft\Api\AbstractRequest;

final class TerminalRefundRequest extends AbstractRequest
{
    private $paymentSession = null;
    private $amount = null;
    private $refundPlatformFee = null;
    private $settings = null;

    public function __construct(array $data = [])
    {
        if (isset($data['paymentSession'])) {
            $this->paymentSession = $data['paymentSession'];
        }
        if (isset($data['amount'])) {
            $this->amount = $data['amount'];
        }
        if (isset($data['refundPlatformFee'])) {
            $this->refundPlatformFee = $data['refundPlatformFee'];
        }
        if (isset($data['settings'])) {
            $this->settings = $data['settings'];
        }
    }

    public function getPaymentSession(): ?array
    {
        return $this->paymentSession;
    }

    public function setPaymentSession(?array $paymentSession): self
    {
        $this->paymentSession = $paymentSession;
        return $this;
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

    public function getRefundPlatformFee(): ?bool
    {
        return $this->refundPlatformFee;
    }

    public function setRefundPlatformFee(?bool $refundPlatformFee): self
    {
        $this->refundPlatformFee = $refundPlatformFee;
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

    public function toArray(): array
    {
        return [
            'paymentSession' => $this->paymentSession,
            'amount' => $this->amount,
            'refundPlatformFee' => $this->refundPlatformFee,
            'settings' => $this->settings
        ];
    }
}
