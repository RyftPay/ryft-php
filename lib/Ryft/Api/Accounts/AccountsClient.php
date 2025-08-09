<?php

namespace Ryft\Api\Accounts;

use Ryft\Api\Accounts\Models\CreateSubAccountRequest;
use Ryft\Api\Accounts\Models\CreateAuthLinkRequest;
use Ryft\Api\Accounts\Models\CreateManualPayoutRequest;
use Ryft\Api\Accounts\Models\UpdateSubAccountRequest;
use Ryft\HttpInterface;

final class AccountsClient implements AccountsInterface
{
    private $httpClient;
    private $basePath = '/accounts';

    public function __construct(HttpInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(CreateSubAccountRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id);
    }

    public function update(string $id, UpdateSubAccountRequest $req): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id, null, $req);
    }

    public function verify(string $id): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/verify');
    }

    public function createPayout(string $id, CreateManualPayoutRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/payouts', null, $req);
    }

    public function listPayouts(
        string $id,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?int $startTimestamp = null,
        ?int $endTimestamp = null
    ): array {
        $params = [];
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }
        if ($startTimestamp !== null) {
            $params['startTimestamp'] = $startTimestamp;
        }
        if ($endTimestamp !== null) {
            $params['endTimestamp'] = $endTimestamp;
        }

        return $this->httpClient->request('GET', $this->basePath . '/' . $id . '/payouts', $params);
    }

    public function getPayout(string $id, string $payoutId): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id . '/payouts/' . $payoutId);
    }

    public function createAuthLink(CreateAuthLinkRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/authorize', null, $req);
    }
}
