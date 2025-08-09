<?php

namespace Ryft\Api\Subscriptions;

use Ryft\Api\Subscriptions\Models\CreateSubscriptionRequest;
use Ryft\Api\Subscriptions\Models\UpdateSubscriptionRequest;
use Ryft\Api\Subscriptions\Models\PauseSubscriptionRequest;

final class SubscriptionsClient implements SubscriptionsInterface
{
    private $httpClient;
    private $basePath = '/subscriptions';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(CreateSubscriptionRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req);
    }

    public function list(
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array {
        $params = [];
        if ($startTimestamp !== null) {
            $params['startTimestamp'] = $startTimestamp;
        }
        if ($endTimestamp !== null) {
            $params['endTimestamp'] = $endTimestamp;
        }
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }

        return $this->httpClient->request('GET', $this->basePath, $params);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id);
    }

    public function update(string $id, UpdateSubscriptionRequest $req): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id, null, $req);
    }

    public function pause(string $id, ?PauseSubscriptionRequest $req = null): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id . '/pause', null, $req);
    }

    public function resume(string $id): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id . '/resume');
    }

    public function cancel(string $id): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id);
    }

    public function getPaymentSessions(
        string $id,
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array {
        $params = [];
        if ($startTimestamp !== null) {
            $params['startTimestamp'] = $startTimestamp;
        }
        if ($endTimestamp !== null) {
            $params['endTimestamp'] = $endTimestamp;
        }
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }

        return $this->httpClient->request('GET', $this->basePath . '/' . $id . '/payment-sessions', $params);
    }
}
