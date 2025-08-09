<?php

namespace Ryft\Api\Webhooks;

use Ryft\Api\Webhooks\Models\CreateWebhookRequest;
use Ryft\Api\Webhooks\Models\UpdateWebhookRequest;

interface WebhooksInterface
{
    public function create(CreateWebhookRequest $req): array;

    public function list(): array;

    public function get(string $id): array;

    public function update(string $id, UpdateWebhookRequest $req): array;

    public function delete(string $id): array;
}
