<?php

namespace Ryft\Api\Files;

use Ryft\Api\Files\Models\CreateFileRequest;

interface FilesInterface
{
    public function list(
        ?string $category = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id, ?string $account = null): array;

    public function create(CreateFileRequest $req, ?string $account = null): array;
}
