<?php

namespace Ryft\Api\Webhooks\Models;

final class CreateWebhookRequest
{
    private $url;
    private $active;
    private $eventTypes;

    public function __construct(array $data = [])
    {
        $this->url = $data['url'] ?? null;
        $this->active = $data['active'] ?? null;
        $this->eventTypes = $data['eventTypes'] ?? null;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function getEventTypes(): ?array
    {
        return $this->eventTypes;
    }

    public function setEventTypes(?array $eventTypes): void
    {
        $this->eventTypes = $eventTypes;
    }
}
