<?php

namespace Ryft\Api\Accounts\Models;

final class UpdateSubAccountRequest
{
    private $entityType = null;
    private $business = null;
    private $individual = null;
    private $metadata = null;
    private $settings = null;
    private $termsOfService = null;

    public function __construct(array $data = [])
    {
        if (isset($data['entityType'])) {
            $this->entityType = $data['entityType'];
        }
        if (isset($data['business'])) {
            $this->business = $data['business'];
        }
        if (isset($data['individual'])) {
            $this->individual = $data['individual'];
        }
        if (isset($data['metadata'])) {
            $this->metadata = $data['metadata'];
        }
        if (isset($data['settings'])) {
            $this->settings = $data['settings'];
        }
        if (isset($data['termsOfService'])) {
            $this->termsOfService = $data['termsOfService'];
        }
    }

    public function getEntityType(): ?string
    {
        return $this->entityType;
    }

    public function setEntityType(?string $entityType): self
    {
        $this->entityType = $entityType;
        return $this;
    }

    public function getBusiness(): ?array
    {
        return $this->business;
    }

    public function setBusiness(?array $business): self
    {
        $this->business = $business;
        return $this;
    }

    public function getIndividual(): ?array
    {
        return $this->individual;
    }

    public function setIndividual(?array $individual): self
    {
        $this->individual = $individual;
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

    public function getSettings(): ?array
    {
        return $this->settings;
    }

    public function setSettings(?array $settings): self
    {
        $this->settings = $settings;
        return $this;
    }

    public function getTermsOfService(): ?bool
    {
        return $this->termsOfService;
    }

    public function setTermsOfService(?bool $termsOfService): self
    {
        $this->termsOfService = $termsOfService;
        return $this;
    }
}
