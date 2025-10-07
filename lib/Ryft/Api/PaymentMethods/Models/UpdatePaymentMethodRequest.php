<?php

namespace Ryft\Api\PaymentMethods\Models;

use Ryft\Api\AbstractRequest;

final class UpdatePaymentMethodRequest extends AbstractRequest
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

    public function toArray(): array
    {
        return [
            'billingAddress' => $this->billingAddress
        ];
    }
}
