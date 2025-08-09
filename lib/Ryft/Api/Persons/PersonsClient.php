<?php

namespace Ryft\Api\Persons;

use Ryft\Api\Persons\Models\CreatePersonRequest;
use Ryft\Api\Persons\Models\UpdatePersonRequest;

final class PersonsClient implements PersonsInterface
{
    private $httpClient;
    private $basePath = '/accounts';
    private $personsPath = '/persons';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(string $id, CreatePersonRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . $this->personsPath, null, $req);
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

        return $this->httpClient->request('GET', $this->basePath . '/' . $id . $this->personsPath, $params);
    }

    public function get(string $id, string $personId): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id . $this->personsPath . '/' . $personId);
    }

    public function update(string $id, string $personId, UpdatePersonRequest $req): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id . $this->personsPath . '/' . $personId, null, $req);
    }

    public function delete(string $id, string $personId): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id . $this->personsPath . '/' . $personId);
    }
}
