<?php

namespace Ryft\Api\Persons;

use Ryft\Api\Persons\Models\CreatePersonRequest;
use Ryft\Api\Persons\Models\UpdatePersonRequest;

interface PersonsInterface
{
    public function create(string $id, CreatePersonRequest $req): array;

    public function list(
        string $id,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id, string $personId): array;

    public function update(string $id, string $personId, UpdatePersonRequest $req): array;

    public function delete(string $id, string $personId): array;
}
