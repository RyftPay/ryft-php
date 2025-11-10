<?php

namespace Ryft\Api\InPersonSkus;

final class InPersonSkusClient implements InPersonSkusInterface
{
    private $httpClient;
    private $basePath = '/in-person/skus';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list(
        string $country,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $productId = null
    ): array {
        $params = [
            'country' => $country,
        ];
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }
        if ($productId !== null) {
            $params['productId'] = $productId;
        }

        return $this->httpClient->request('GET', $this->basePath, $params, null, null);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id, [], null, null);
    }
}
