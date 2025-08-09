<?php

namespace Ryft\Api\Events;

interface EventsInterface
{
    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $account = null
    ): array;

    public function get(string $id, ?string $account = null): array;
}
