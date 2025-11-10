<?php

namespace Ryft\Api\InPersonOrders;

final class InPersonOrdersClient implements InPersonOrdersInterface
{
    private $httpClient;
    private $basePath = '/in-person/orders';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
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

        return $this->httpClient->request('GET', $this->basePath, $params, null, $account);
    }

    public function get(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id, [], null, $account);
    }
}
