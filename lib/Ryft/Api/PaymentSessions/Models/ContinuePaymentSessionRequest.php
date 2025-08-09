<?php

namespace Ryft\Api\PaymentSessions\Models;

final class ContinuePaymentSessionRequest
{
    private $clientSecret = null;
    private $threeDs = null;

    public function __construct(array $data = [])
    {
        if (isset($data['clientSecret'])) {
            $this->clientSecret = $data['clientSecret'];
        }
        if (isset($data['threeDs'])) {
            $this->threeDs = $data['threeDs'];
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

    public function getThreeDs(): ?array
    {
        return $this->threeDs;
    }

    public function setThreeDs(?array $threeDs): self
    {
        $this->threeDs = $threeDs;
        return $this;
    }
}
