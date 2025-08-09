<?php

namespace Ryft\Api\Payouts;

use Ryft\Api\Payouts\Models\CreatePayoutRequest;

interface PayoutsInterface
{
    public function create(string $id, CreatePayoutRequest $req): array;

    public function list(
        string $id,
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id, string $payoutId): array;
}
