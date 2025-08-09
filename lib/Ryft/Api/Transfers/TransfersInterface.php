<?php

namespace Ryft\Api\Transfers;

use Ryft\Api\Transfers\Models\CreateTransferRequest;

interface TransfersInterface
{
    public function transfer(CreateTransferRequest $req): array;

    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id): array;
}
