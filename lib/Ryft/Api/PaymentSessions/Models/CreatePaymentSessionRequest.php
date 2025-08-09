<?php

namespace Ryft\Api\PaymentSessions\Models;

final class CreatePaymentSessionRequest
{
    private $amount = null;
    private $currency = null;
    private $customerEmail = null;
    private $customerDetails = null;
    private $platformFee = null;
    private $splits = null;
    private $captureFlow = null;
    private $paymentType = null;
    private $entryMode = null;
    private $previousPayment = null;
    private $rebillingDetail = null;
    private $verifyAccount = null;
    private $shippingDetails = null;
    private $orderDetails = null;
    private $statementDescriptor = null;
    private $metadata = null;
    private $returnUrl = null;
    private $attemptPayment = null;
    private $paymentSettings = null;

    public function __construct(array $data = [])
    {
        if (isset($data['amount'])) {
            $this->amount = $data['amount'];
        }
        if (isset($data['currency'])) {
            $this->currency = $data['currency'];
        }
        if (isset($data['customerEmail'])) {
            $this->customerEmail = $data['customerEmail'];
        }
        if (isset($data['customerDetails'])) {
            $this->customerDetails = $data['customerDetails'];
        }
        if (isset($data['platformFee'])) {
            $this->platformFee = $data['platformFee'];
        }
        if (isset($data['splits'])) {
            $this->splits = $data['splits'];
        }
        if (isset($data['captureFlow'])) {
            $this->captureFlow = $data['captureFlow'];
        }
        if (isset($data['paymentType'])) {
            $this->paymentType = $data['paymentType'];
        }
        if (isset($data['entryMode'])) {
            $this->entryMode = $data['entryMode'];
        }
        if (isset($data['previousPayment'])) {
            $this->previousPayment = $data['previousPayment'];
        }
        if (isset($data['rebillingDetail'])) {
            $this->rebillingDetail = $data['rebillingDetail'];
        }
        if (isset($data['verifyAccount'])) {
            $this->verifyAccount = $data['verifyAccount'];
        }
        if (isset($data['shippingDetails'])) {
            $this->shippingDetails = $data['shippingDetails'];
        }
        if (isset($data['orderDetails'])) {
            $this->orderDetails = $data['orderDetails'];
        }
        if (isset($data['statementDescriptor'])) {
            $this->statementDescriptor = $data['statementDescriptor'];
        }
        if (isset($data['metadata'])) {
            $this->metadata = $data['metadata'];
        }
        if (isset($data['returnUrl'])) {
            $this->returnUrl = $data['returnUrl'];
        }
        if (isset($data['attemptPayment'])) {
            $this->attemptPayment = $data['attemptPayment'];
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

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;
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

    public function getCustomerDetails(): ?array
    {
        return $this->customerDetails;
    }

    public function setCustomerDetails(?array $customerDetails): self
    {
        $this->customerDetails = $customerDetails;
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

    public function getCaptureFlow(): ?string
    {
        return $this->captureFlow;
    }

    public function setCaptureFlow(?string $captureFlow): self
    {
        $this->captureFlow = $captureFlow;
        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function setPaymentType(?string $paymentType): self
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    public function getEntryMode(): ?string
    {
        return $this->entryMode;
    }

    public function setEntryMode(?string $entryMode): self
    {
        $this->entryMode = $entryMode;
        return $this;
    }

    public function getPreviousPayment(): ?array
    {
        return $this->previousPayment;
    }

    public function setPreviousPayment(?array $previousPayment): self
    {
        $this->previousPayment = $previousPayment;
        return $this;
    }

    public function getRebillingDetail(): ?array
    {
        return $this->rebillingDetail;
    }

    public function setRebillingDetail(?array $rebillingDetail): self
    {
        $this->rebillingDetail = $rebillingDetail;
        return $this;
    }

    public function getVerifyAccount(): ?bool
    {
        return $this->verifyAccount;
    }

    public function setVerifyAccount(?bool $verifyAccount): self
    {
        $this->verifyAccount = $verifyAccount;
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

    public function getStatementDescriptor(): ?array
    {
        return $this->statementDescriptor;
    }

    public function setStatementDescriptor(?array $statementDescriptor): self
    {
        $this->statementDescriptor = $statementDescriptor;
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

    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }

    public function setReturnUrl(?string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    public function getAttemptPayment(): ?array
    {
        return $this->attemptPayment;
    }

    public function setAttemptPayment(?array $attemptPayment): self
    {
        $this->attemptPayment = $attemptPayment;
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
