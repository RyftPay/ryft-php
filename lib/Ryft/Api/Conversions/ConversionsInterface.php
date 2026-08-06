<?php

namespace Ryft\Api\Conversions;

use Ryft\Api\Conversions\Models\CreateConversionRequest;

interface ConversionsInterface
{
    public function create(CreateConversionRequest $req, ?string $account = null): array;

    public function list(
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array;

    public function get(string $id, ?string $account = null): array;

    public function getRate(
        string $sellCurrency,
        string $buyCurrency,
        int $amount,
        ?string $account = null
    ): array;
}
