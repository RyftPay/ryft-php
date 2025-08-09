<?php

namespace Ryft\Api\Subscriptions\Models;

final class CreateSubscriptionRequest
{
    private $customer;
    private $price;
    private $paymentMethod;
    private $description;
    private $billingCycleTimestamp;
    private $metadata;
    private $shippingDetails;
    private $paymentSettings;

    public function __construct(array $data = [])
    {
        $this->customer = $data['customer'] ?? null;
        $this->price = $data['price'] ?? null;
        $this->paymentMethod = $data['paymentMethod'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->billingCycleTimestamp = $data['billingCycleTimestamp'] ?? null;
        $this->metadata = $data['metadata'] ?? null;
        $this->shippingDetails = $data['shippingDetails'] ?? null;
        $this->paymentSettings = $data['paymentSettings'] ?? null;
    }

    public function getCustomer(): ?array
    {
        return $this->customer;
    }

    public function setCustomer(?array $customer): void
    {
        $this->customer = $customer;
    }

    public function getPrice(): ?array
    {
        return $this->price;
    }

    public function setPrice(?array $price): void
    {
        $this->price = $price;
    }

    public function getPaymentMethod(): ?array
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?array $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getBillingCycleTimestamp(): ?int
    {
        return $this->billingCycleTimestamp;
    }

    public function setBillingCycleTimestamp(?int $billingCycleTimestamp): void
    {
        $this->billingCycleTimestamp = $billingCycleTimestamp;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(?array $metadata): void
    {
        $this->metadata = $metadata;
    }

    public function getShippingDetails(): ?array
    {
        return $this->shippingDetails;
    }

    public function setShippingDetails(?array $shippingDetails): void
    {
        $this->shippingDetails = $shippingDetails;
    }

    public function getPaymentSettings(): ?array
    {
        return $this->paymentSettings;
    }

    public function setPaymentSettings(?array $paymentSettings): void
    {
        $this->paymentSettings = $paymentSettings;
    }
}
