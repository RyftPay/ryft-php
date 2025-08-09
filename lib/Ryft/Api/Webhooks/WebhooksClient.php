<?php

namespace Ryft\Api\Webhooks;

use Ryft\Api\Webhooks\Models\CreateWebhookRequest;
use Ryft\Api\Webhooks\Models\UpdateWebhookRequest;

final class WebhooksClient implements WebhooksInterface
{
    private $httpClient;
    private $basePath = '/webhooks';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(CreateWebhookRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req);
    }

    public function list(): array
    {
        return $this->httpClient->request('GET', $this->basePath);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id);
    }

    public function update(string $id, UpdateWebhookRequest $req): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id, null, $req);
    }

    public function delete(string $id): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id);
    }
}
