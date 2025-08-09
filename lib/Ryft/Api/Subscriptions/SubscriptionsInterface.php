<?php

namespace Ryft\Api\Subscriptions;

use Ryft\Api\Subscriptions\Models\CreateSubscriptionRequest;
use Ryft\Api\Subscriptions\Models\UpdateSubscriptionRequest;
use Ryft\Api\Subscriptions\Models\PauseSubscriptionRequest;

interface SubscriptionsInterface
{
    public function create(CreateSubscriptionRequest $req): array;

    public function list(
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id): array;

    public function update(string $id, UpdateSubscriptionRequest $req): array;

    public function pause(string $id, ?PauseSubscriptionRequest $req = null): array;

    public function resume(string $id): array;

    public function cancel(string $id): array;

    public function getPaymentSessions(
        string $id,
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;
}
