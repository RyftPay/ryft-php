<?php

namespace Ryft\Api\BalanceTransactions;

use Ryft\HttpInterface;

final class BalanceTransactionsClient implements BalanceTransactionsInterface
{
    private $httpClient;
    private $basePath = '/balance-transactions';

    public function __construct(HttpInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list(
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $payoutId = null,
        ?string $account = null
    ): array {
        $params = [];
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }
        if ($payoutId !== null) {
            $params['payoutId'] = $payoutId;
        }
        return $this->httpClient->request('GET', $this->basePath, $params, null, $account);
    }
}

