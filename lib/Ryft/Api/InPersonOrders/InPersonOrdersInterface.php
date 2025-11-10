<?php

namespace Ryft\Api\InPersonOrders;

interface InPersonOrdersInterface
{
    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array;

    public function get(string $id, ?string $account = null): array;
}
