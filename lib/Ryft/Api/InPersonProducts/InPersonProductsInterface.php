<?php

namespace Ryft\Api\InPersonProducts;

interface InPersonProductsInterface
{
    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id): array;
}
