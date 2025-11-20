<?php

namespace Ryft\Api\InPersonLocations\Models;

use Ryft\Api\AbstractRequest;

final class CreateInPersonLocationRequest extends AbstractRequest
{
    private $name = null;
    private $address = null;
    private $geoCoordinates = null;
    private $metadata = null;

    public function __construct(array $data = [])
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['address'])) {
            $this->address = $data['address'];
        }
        if (isset($data['geoCoordinates'])) {
            $this->geoCoordinates = $data['geoCoordinates'];
        }
        if (isset($data['metadata'])) {
            $this->metadata = $data['metadata'];
        }
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

    public function getAddress(): ?array
    {
        return $this->address;
    }

    public function setAddress(?array $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getGeoCoordinates(): ?array
    {
        return $this->geoCoordinates;
    }

    public function setGeoCoordinates(?array $geoCoordinates): self
    {
        $this->geoCoordinates = $geoCoordinates;
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
            'name' => $this->name,
            'address' => $this->address,
            'geoCoordinates' => $this->geoCoordinates,
            'metadata' => $this->metadata
        ];
    }
}
