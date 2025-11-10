<?php

namespace Ryft\Api\InPersonLocations;

use Ryft\Api\InPersonLocations\Models\CreateInPersonLocationRequest;
use Ryft\Api\InPersonLocations\Models\UpdateInPersonLocationRequest;

final class InPersonLocationsClient implements InPersonLocationsInterface
{
    private $httpClient;
    private $basePath = '/in-person/locations';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(CreateInPersonLocationRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req, $account);
    }

    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
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

        return $this->httpClient->request('GET', $this->basePath, $params, null, $account);
    }

    public function get(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id, [], null, $account);
    }

    public function update(string $id, UpdateInPersonLocationRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id, null, $req, $account);
    }

    public function delete(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id, [], null, $account);
    }
}
