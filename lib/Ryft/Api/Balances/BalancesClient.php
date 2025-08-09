<?php

namespace Ryft\Api\Balances;

use Ryft\HttpInterface;

final class BalancesClient implements BalancesInterface
{
    private $httpClient;
    private $basePath = '/balances';

    public function __construct(HttpInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list(string $currency, ?string $account = null): array {
        $params = [
            'currency' => $currency,
        ];
        return $this->httpClient->request('GET', $this->basePath, $params, null, $account);
    }
}
