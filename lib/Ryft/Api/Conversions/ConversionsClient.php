<?php

namespace Ryft\Api\Conversions;

use Ryft\Api\Conversions\Models\CreateConversionRequest;
use Ryft\HttpInterface;

final class ConversionsClient implements ConversionsInterface
{
    private $httpClient;
    private $basePath = '/conversions';

    public function __construct(HttpInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(CreateConversionRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req, $account);
    }

    public function list(
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array {
        $params = [];
        if ($startTimestamp !== null) {
            $params['startTimestamp'] = $startTimestamp;
        }
        if ($endTimestamp !== null) {
            $params['endTimestamp'] = $endTimestamp;
        }
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

    public function getRate(
        string $sellCurrency,
        string $buyCurrency,
        int $amount,
        ?string $account = null
    ): array {
        $params = [
            'sellCurrency' => $sellCurrency,
            'buyCurrency' => $buyCurrency,
            'amount' => $amount,
        ];

        return $this->httpClient->request('GET', $this->basePath . '/rate', $params, null, $account);
    }
}
