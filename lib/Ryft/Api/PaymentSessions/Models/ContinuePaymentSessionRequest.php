<?php

namespace Ryft\Api\PaymentSessions\Models;

use Ryft\Api\AbstractRequest;
use Ryft\Arrayable;

final class ContinuePaymentSessionRequest extends AbstractRequest implements Arrayable
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

    public function toArray(): array
    {
        return [
            'clientSecret' => $this->clientSecret,
            'threeDs' => $this->threeDs,
        ];
    }
}
