<?php

namespace Ryft\Api\PaymentSessions\Models;

final class UpdatePaymentSessionRequest
{
    private $amount = null;
    private $customerEmail = null;
    private $platformFee = null;
    private $splits = null;
    private $metadata = null;
    private $captureFlow = null;
    private $shippingDetails = null;
    private $orderDetails = null;
    private $paymentSettings = null;

    public function __construct(array $data = [])
    {
        if (isset($data['amount'])) {
            $this->amount = $data['amount'];
        }
        if (isset($data['customerEmail'])) {
            $this->customerEmail = $data['customerEmail'];
        }
        if (isset($data['platformFee'])) {
            $this->platformFee = $data['platformFee'];
        }
        if (isset($data['splits'])) {
            $this->splits = $data['splits'];
        }
        if (isset($data['metadata'])) {
            $this->metadata = $data['metadata'];
        }
        if (isset($data['captureFlow'])) {
            $this->captureFlow = $data['captureFlow'];
        }
        if (isset($data['shippingDetails'])) {
            $this->shippingDetails = $data['shippingDetails'];
        }
        if (isset($data['orderDetails'])) {
            $this->orderDetails = $data['orderDetails'];
        }
        if (isset($data['paymentSettings'])) {
            $this->paymentSettings = $data['paymentSettings'];
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

    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }

    public function setCustomerEmail(?string $customerEmail): self
    {
        $this->customerEmail = $customerEmail;
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

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(?array $metadata): self
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function getCaptureFlow(): ?string
    {
        return $this->captureFlow;
    }

    public function setCaptureFlow(?string $captureFlow): self
    {
        $this->captureFlow = $captureFlow;
        return $this;
    }

    public function getShippingDetails(): ?array
    {
        return $this->shippingDetails;
    }

    public function setShippingDetails(?array $shippingDetails): self
    {
        $this->shippingDetails = $shippingDetails;
        return $this;
    }

    public function getOrderDetails(): ?array
    {
        return $this->orderDetails;
    }

    public function setOrderDetails(?array $orderDetails): self
    {
        $this->orderDetails = $orderDetails;
        return $this;
    }

    public function getPaymentSettings(): ?array
    {
        return $this->paymentSettings;
    }

    public function setPaymentSettings(?array $paymentSettings): self
    {
        $this->paymentSettings = $paymentSettings;
        return $this;
    }
}
