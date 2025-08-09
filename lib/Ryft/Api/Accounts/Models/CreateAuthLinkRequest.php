<?php

namespace Ryft\Api\Accounts\Models;

final class CreateAuthLinkRequest
{
    private $email;
    private $redirectUrl;

    public function __construct(array $data = [])
    {
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['redirectUrl'])) {
            $this->redirectUrl = $data['redirectUrl'];
        }
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
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
}
