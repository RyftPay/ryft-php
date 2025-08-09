<?php

namespace Ryft\Api\Persons\Models;

final class UpdatePersonRequest
{
    private $firstName = null;
    private $middleNames = null;
    private $lastName = null;
    private $email = null;
    private $dateOfBirth = null;
    private $countryOfBirth = null;
    private $gender = null;
    private $nationalities = null;
    private $address = null;
    private $phoneNumber = null;
    private $businessRoles = null;
    private $documents = null;
    private $metadata = null;

    public function __construct(array $data = [])
    {
        if (isset($data['firstName'])) {
            $this->firstName = $data['firstName'];
        }
        if (isset($data['middleNames'])) {
            $this->middleNames = $data['middleNames'];
        }
        if (isset($data['lastName'])) {
            $this->lastName = $data['lastName'];
        }
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['dateOfBirth'])) {
            $this->dateOfBirth = $data['dateOfBirth'];
        }
        if (isset($data['countryOfBirth'])) {
            $this->countryOfBirth = $data['countryOfBirth'];
        }
        if (isset($data['gender'])) {
            $this->gender = $data['gender'];
        }
        if (isset($data['nationalities'])) {
            $this->nationalities = $data['nationalities'];
        }
        if (isset($data['address'])) {
            $this->address = $data['address'];
        }
        if (isset($data['phoneNumber'])) {
            $this->phoneNumber = $data['phoneNumber'];
        }
        if (isset($data['businessRoles'])) {
            $this->businessRoles = $data['businessRoles'];
        }
        if (isset($data['documents'])) {
            $this->documents = $data['documents'];
        }
        if (isset($data['metadata'])) {
            $this->metadata = $data['metadata'];
        }
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

    public function getMiddleNames(): ?string
    {
        return $this->middleNames;
    }

    public function setMiddleNames(?string $middleNames): self
    {
        $this->middleNames = $middleNames;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?string $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getCountryOfBirth(): ?string
    {
        return $this->countryOfBirth;
    }

    public function setCountryOfBirth(?string $countryOfBirth): self
    {
        $this->countryOfBirth = $countryOfBirth;
        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getNationalities(): ?array
    {
        return $this->nationalities;
    }

    public function setNationalities(?array $nationalities): self
    {
        $this->nationalities = $nationalities;
        return $this;
    }

    public function getAddress(): ?array
    {
        return $this->address;
    }

    public function setAddress(?array $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getBusinessRoles(): ?array
    {
        return $this->businessRoles;
    }

    public function setBusinessRoles(?array $businessRoles): self
    {
        $this->businessRoles = $businessRoles;
        return $this;
    }

    public function getDocuments(): ?array
    {
        return $this->documents;
    }

    public function setDocuments(?array $documents): self
    {
        $this->documents = $documents;
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
