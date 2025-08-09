<?php

namespace Ryft\Api\Customers;

use Ryft\Api\Customers\Models\CreateCustomerRequest;
use Ryft\Api\Customers\Models\UpdateCustomerRequest;

interface CustomersInterface
{
    public function create(CreateCustomerRequest $req): array;

    public function list(
        ?string $email = null,
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id): array;

    public function update(string $id, UpdateCustomerRequest $req): array;

    public function delete(string $id): array;

    public function getPaymentMethods(string $id): array;
}
