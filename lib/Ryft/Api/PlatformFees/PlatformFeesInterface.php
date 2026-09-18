<?php

namespace Ryft\Api\PlatformFees;

interface PlatformFeesInterface
{
    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id): array;

    public function getRefunds(
        string $id,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;
}
