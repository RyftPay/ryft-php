<?php

namespace Ryft\Api\InPersonLocations;

use Ryft\Api\InPersonLocations\Models\CreateInPersonLocationRequest;
use Ryft\Api\InPersonLocations\Models\UpdateInPersonLocationRequest;

interface InPersonLocationsInterface
{
    public function create(CreateInPersonLocationRequest $req, ?string $account = null): array;

    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array;

    public function get(string $id, ?string $account = null): array;

    public function update(string $id, UpdateInPersonLocationRequest $req, ?string $account = null): array;

    public function delete(string $id, ?string $account = null): array;
}
