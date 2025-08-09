<?php

namespace Ryft\Api\PaymentSessions\Models;

final class AttemptPaymentSessionRequest
{
    private $clientSecret = null;
    private $paymentMethodType = null;
    private $cardDetails = null;
    private $walletDetails = null;
    private $paymentMethod = null;
    private $paymentMethodOptions = null;
    private $billingAddress = null;
    private $customerDetails = null;
    private $shippingDetails = null;
    private $threeDsRequestDetails = null;

    public function __construct(array $data = [])
    {
        if (isset($data['clientSecret'])) {
            $this->clientSecret = $data['clientSecret'];
        }
        if (isset($data['paymentMethodType'])) {
            $this->paymentMethodType = $data['paymentMethodType'];
        }
        if (isset($data['cardDetails'])) {
            $this->cardDetails = $data['cardDetails'];
        }
        if (isset($data['walletDetails'])) {
            $this->walletDetails = $data['walletDetails'];
        }
        if (isset($data['paymentMethod'])) {
            $this->paymentMethod = $data['paymentMethod'];
        }
        if (isset($data['paymentMethodOptions'])) {
            $this->paymentMethodOptions = $data['paymentMethodOptions'];
        }
        if (isset($data['billingAddress'])) {
            $this->billingAddress = $data['billingAddress'];
        }
        if (isset($data['customerDetails'])) {
            $this->customerDetails = $data['customerDetails'];
        }
        if (isset($data['shippingDetails'])) {
            $this->shippingDetails = $data['shippingDetails'];
        }
        if (isset($data['threeDsRequestDetails'])) {
            $this->threeDsRequestDetails = $data['threeDsRequestDetails'];
        }
    }

    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }

    public function setClientSecret(?string $clientSecret): self
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    public function getPaymentMethodType(): ?string
    {
        return $this->paymentMethodType;
    }

    public function setPaymentMethodType(?string $paymentMethodType): self
    {
        $this->paymentMethodType = $paymentMethodType;
        return $this;
    }

    public function getCardDetails(): ?array
    {
        return $this->cardDetails;
    }

    public function setCardDetails(?array $cardDetails): self
    {
        $this->cardDetails = $cardDetails;
        return $this;
    }

    public function getWalletDetails(): ?array
    {
        return $this->walletDetails;
    }

    public function setWalletDetails(?array $walletDetails): self
    {
        $this->walletDetails = $walletDetails;
        return $this;
    }

    public function getPaymentMethod(): ?array
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?array $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getPaymentMethodOptions(): ?array
    {
        return $this->paymentMethodOptions;
    }

    public function setPaymentMethodOptions(?array $paymentMethodOptions): self
    {
        $this->paymentMethodOptions = $paymentMethodOptions;
        return $this;
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

    public function getCustomerDetails(): ?array
    {
        return $this->customerDetails;
    }

    public function setCustomerDetails(?array $customerDetails): self
    {
        $this->customerDetails = $customerDetails;
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

    public function getThreeDsRequestDetails(): ?array
    {
        return $this->threeDsRequestDetails;
    }

    public function setThreeDsRequestDetails(?array $threeDsRequestDetails): self
    {
        $this->threeDsRequestDetails = $threeDsRequestDetails;
        return $this;
    }
}
