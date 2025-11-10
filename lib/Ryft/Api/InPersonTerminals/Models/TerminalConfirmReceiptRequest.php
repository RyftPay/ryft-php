<?php

namespace Ryft\Api\InPersonTerminals\Models;

use Ryft\Api\AbstractRequest;

final class TerminalConfirmReceiptRequest extends AbstractRequest
{
    private $customerCopy = null;
    private $merchantCopy = null;

    public function __construct(array $data = [])
    {
        if (isset($data['customerCopy'])) {
            $this->customerCopy = $data['customerCopy'];
        }
        if (isset($data['merchantCopy'])) {
            $this->merchantCopy = $data['merchantCopy'];
        }
    }

    public function getCustomerCopy(): ?array
    {
        return $this->customerCopy;
    }

    public function setCustomerCopy(?array $customerCopy): self
    {
        $this->customerCopy = $customerCopy;
        return $this;
    }

    public function getMerchantCopy(): ?array
    {
        return $this->merchantCopy;
    }

    public function setMerchantCopy(?array $merchantCopy): self
    {
        $this->merchantCopy = $merchantCopy;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'customerCopy' => $this->customerCopy,
            'merchantCopy' => $this->merchantCopy
        ];
    }
}
