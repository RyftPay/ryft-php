<?php

namespace Ryft\Api\PayoutMethods;

use Ryft\Api\PayoutMethods\Models\CreatePayoutMethodRequest;
use Ryft\Api\PayoutMethods\Models\UpdatePayoutMethodRequest;

interface PayoutMethodsInterface
{
    public function create(string $id, CreatePayoutMethodRequest $req): array;

    public function list(
        string $id,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id, string $payoutMethodId): array;

    public function update(string $id, string $payoutMethodId, UpdatePayoutMethodRequest $req): array;

    public function delete(string $id, string $payoutMethodId): array;
}
