<?php

namespace Ryft\Api\BalanceTransactions;

interface BalanceTransactionsInterface
{
    public function list(
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $payoutId = null,
        ?string $account = null
    ): array;
}

