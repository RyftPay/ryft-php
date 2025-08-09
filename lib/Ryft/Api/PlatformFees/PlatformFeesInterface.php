<?php

namespace Ryft\Api\PlatformFees;

interface PlatformFeesInterface
{
    public function list(?bool $ascending = null, ?int $limit = null): array;

    public function get(string $id): array;

    public function getRefunds(string $id): array;
}
