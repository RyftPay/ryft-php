<?php

namespace Ryft\Api\AccountLinks\Models;

use Ryft\Api\AbstractRequest;
use Ryft\Arrayable;

final class CreateAccountLinkRequest extends AbstractRequest implements Arrayable
{
    private $accountId;
    private $redirectUrl;

    public function __construct(array $data = [])
    {
        if (isset($data['accountId'])) {
            $this->accountId = $data['accountId'];
        }
        if (isset($data['redirectUrl'])) {
            $this->redirectUrl = $data['redirectUrl'];
        }
    }

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    public function setRedirectUrl(string $redirectUrl): self
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'accountId' => $this->accountId,
            'redirectUrl' => $this->redirectUrl
        ];
    }
}
