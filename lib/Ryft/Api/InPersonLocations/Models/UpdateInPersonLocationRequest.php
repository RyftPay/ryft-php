<?php

namespace Ryft\Api\InPersonLocations\Models;

use Ryft\Api\AbstractRequest;

final class UpdateInPersonLocationRequest extends AbstractRequest
{
    private $name = null;
    private $metadata = null;

    public function __construct(array $data = [])
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
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
            'metadata' => $this->metadata
        ];
    }
}
