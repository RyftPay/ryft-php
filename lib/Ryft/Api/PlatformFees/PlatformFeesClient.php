<?php

namespace Ryft\Api\PlatformFees;

final class PlatformFeesClient implements PlatformFeesInterface
{
    private $httpClient;
    private $basePath = '/platform-fees';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list(?bool $ascending = null, ?int $limit = null): array
    {
        $params = [];
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }

        return $this->httpClient->request('GET', $this->basePath, $params);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id);
    }

    public function getRefunds(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id . '/refunds');
    }
}
