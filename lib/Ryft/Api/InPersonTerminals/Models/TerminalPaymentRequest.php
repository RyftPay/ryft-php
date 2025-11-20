<?php

namespace Ryft\Api\InPersonTerminals\Models;

use Ryft\Api\AbstractRequest;

final class TerminalPaymentRequest extends AbstractRequest
{
    private $amounts = null;
    private $currency = null;
    private $paymentSession = null;
    private $settings = null;

    public function __construct(array $data = [])
    {
        if (isset($data['amounts'])) {
            $this->amounts = $data['amounts'];
        }
        if (isset($data['currency'])) {
            $this->currency = $data['currency'];
        }
        if (isset($data['paymentSession'])) {
            $this->paymentSession = $data['paymentSession'];
        }
        if (isset($data['settings'])) {
            $this->settings = $data['settings'];
        }
    }

    public function getAmounts(): ?array
    {
        return $this->amounts;
    }

    public function setAmounts(?array $amounts): self
    {
        $this->amounts = $amounts;
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

    public function getPaymentSession(): ?array
    {
        return $this->paymentSession;
    }

    public function setPaymentSession(?array $paymentSession): self
    {
        $this->paymentSession = $paymentSession;
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
            'amounts' => $this->amounts,
            'currency' => $this->currency,
            'paymentSession' => $this->paymentSession,
            'settings' => $this->settings
        ];
    }
}
