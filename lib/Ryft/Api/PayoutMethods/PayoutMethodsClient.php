<?php

namespace Ryft\Api\PayoutMethods;

use Ryft\Api\PayoutMethods\Models\CreatePayoutMethodRequest;
use Ryft\Api\PayoutMethods\Models\UpdatePayoutMethodRequest;

final class PayoutMethodsClient implements PayoutMethodsInterface
{
    private $httpClient;
    private $basePath = '/accounts';
    private $payoutMethodsPath = '/payout-methods';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(string $id, CreatePayoutMethodRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . $this->payoutMethodsPath, null, $req);
    }

    public function list(
        string $id,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
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

        return $this->httpClient->request('GET', $this->basePath . '/' . $id . $this->payoutMethodsPath, $params);
    }

    public function get(string $id, string $payoutMethodId): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id . $this->payoutMethodsPath . '/' . $payoutMethodId);
    }

    public function update(string $id, string $payoutMethodId, UpdatePayoutMethodRequest $req): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id . $this->payoutMethodsPath . '/' . $payoutMethodId, null, $req);
    }

    public function delete(string $id, string $payoutMethodId): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id . $this->payoutMethodsPath . '/' . $payoutMethodId);
    }
}
