<?php

namespace Ryft\Api\InPersonProducts;

final class InPersonProductsClient implements InPersonProductsInterface
{
    private $httpClient;
    private $basePath = '/in-person/products';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
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

        return $this->httpClient->request('GET', $this->basePath, $params, null, null);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id, [], null, null);
    }
}
