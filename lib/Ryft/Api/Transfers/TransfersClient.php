<?php

namespace Ryft\Api\Transfers;

use Ryft\Api\Transfers\Models\CreateTransferRequest;

final class TransfersClient implements TransfersInterface
{
    private $httpClient;
    private $basePath = '/transfers';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function transfer(CreateTransferRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req);
    }

    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array {
        $params = [];
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }

        return $this->httpClient->request('GET', $this->basePath, $params);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id);
    }
}
