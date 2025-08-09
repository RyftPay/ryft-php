<?php

namespace Ryft\Api\Balances;

interface BalancesInterface
{
    public function list(string $currency, ?string $account = null): array;
}
