<?php

namespace Ryft\Api\Accounts;

use Ryft\Api\Accounts\Models\CreateSubAccountRequest;
use Ryft\Api\Accounts\Models\CreateAuthLinkRequest;
use Ryft\Api\Accounts\Models\CreateManualPayoutRequest;
use Ryft\Api\Accounts\Models\UpdateSubAccountRequest;

interface AccountsInterface
{
    public function create(CreateSubAccountRequest $req): array;

    public function get(string $id): array;

    public function update(string $id, UpdateSubAccountRequest $req): array;

    public function verify(string $id): array;

    public function createPayout(string $id, CreateManualPayoutRequest $req): array;

    public function listPayouts(
        string $id,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?int $startTimestamp = null,
        ?int $endTimestamp = null
    ): array;

    public function getPayout(string $id, string $payoutId): array;

    public function createAuthLink(CreateAuthLinkRequest $req): array;
}
