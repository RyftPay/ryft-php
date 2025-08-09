<?php

namespace Ryft\Api\PaymentMethods\Models;

final class UpdatePaymentMethodRequest
{
    private $billingAddress = null;

    public function __construct(array $data = [])
    {
        if (isset($data['billingAddress'])) {
            $this->billingAddress = $data['billingAddress'];
        }
    }

    public function getBillingAddress(): ?array
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?array $billingAddress): self
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }
}
