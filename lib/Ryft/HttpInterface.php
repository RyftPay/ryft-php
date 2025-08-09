<?php

namespace Ryft;

interface HttpInterface
{
    public function request(string $method, string $path, ?array $params = null, $body = null, ?string $account = null): array;

    public function uploadFile(string $path, string $postData, string $boundary, ?string $account = null): array;
}
