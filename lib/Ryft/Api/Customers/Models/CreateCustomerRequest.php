<?php

namespace Ryft\Api\Customers\Models;

final class CreateCustomerRequest
{
    private $email = null;
    private $firstName = null;
    private $lastName = null;
    private $homePhoneNumber = null;
    private $mobilePhoneNumber = null;
    private $metadata = null;

    public function __construct(array $data = [])
    {
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['firstName'])) {
            $this->firstName = $data['firstName'];
        }
        if (isset($data['lastName'])) {
            $this->lastName = $data['lastName'];
        }
        if (isset($data['homePhoneNumber'])) {
            $this->homePhoneNumber = $data['homePhoneNumber'];
        }
        if (isset($data['mobilePhoneNumber'])) {
            $this->mobilePhoneNumber = $data['mobilePhoneNumber'];
        }
        if (isset($data['metadata'])) {
            $this->metadata = $data['metadata'];
        }
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getHomePhoneNumber(): ?string
    {
        return $this->homePhoneNumber;
    }

    public function setHomePhoneNumber(?string $homePhoneNumber): self
    {
        $this->homePhoneNumber = $homePhoneNumber;
        return $this;
    }

    public function getMobilePhoneNumber(): ?string
    {
        return $this->mobilePhoneNumber;
    }

    public function setMobilePhoneNumber(?string $mobilePhoneNumber): self
    {
        $this->mobilePhoneNumber = $mobilePhoneNumber;
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
}