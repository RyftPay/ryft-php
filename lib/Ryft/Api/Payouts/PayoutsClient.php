<?php

namespace Ryft\Api\Payouts;

use Ryft\Api\Payouts\Models\CreatePayoutRequest;

final class PayoutsClient implements PayoutsInterface
{
    private $httpClient;
    private $basePath = '/accounts';
    private $payoutsPath = '/payouts';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(string $id, CreatePayoutRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . $this->payoutsPath, null, $req);
    }

    public function list(
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

        return $this->httpClient->request('GET', $this->basePath . '/' . $id . $this->payoutsPath, $params);
    }

    public function get(string $id, string $payoutId): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id . $this->payoutsPath . '/'. $payoutId);
    }
}
