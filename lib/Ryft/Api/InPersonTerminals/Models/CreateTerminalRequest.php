<?php

namespace Ryft\Api\InPersonTerminals\Models;

use Ryft\Api\AbstractRequest;

final class CreateTerminalRequest extends AbstractRequest
{
    private $serialNumber = null;
    private $locationId = null;
    private $name = null;
    private $metadata = null;

    public function __construct(array $data = [])
    {
        if (isset($data['serialNumber'])) {
            $this->serialNumber = $data['serialNumber'];
        }
        if (isset($data['locationId'])) {
            $this->locationId = $data['locationId'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['metadata'])) {
            $this->metadata = $data['metadata'];
        }
    }

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(?string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;
        return $this;
    }

    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    public function setLocationId(?string $locationId): self
    {
        $this->locationId = $locationId;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
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

    public function toArray(): array
    {
        return [
            'serialNumber' => $this->serialNumber,
            'locationId' => $this->locationId,
            'name' => $this->name,
            'metadata' => $this->metadata
        ];
    }
}
