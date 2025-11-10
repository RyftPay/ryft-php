<?php

namespace Ryft\Api\InPersonSkus;

interface InPersonSkusInterface
{
    public function list(
        string $country,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $productId = null
    ): array;

    public function get(string $id): array;
}
