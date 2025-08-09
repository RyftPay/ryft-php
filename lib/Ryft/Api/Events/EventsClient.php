<?php

namespace Ryft\Api\Events;

final class EventsClient implements EventsInterface
{
    private $httpClient;
    private $basePath = '/events';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $account = null
    ): array {
        $params = [];
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }

        return $this->httpClient->request('GET', $this->basePath, $params, null, $account);
    }

    public function get(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id, [], null, $account);
    }
}
