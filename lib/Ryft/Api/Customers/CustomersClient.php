<?php

namespace Ryft\Api\Customers;

use Ryft\Api\Customers\Models\CreateCustomerRequest;
use Ryft\Api\Customers\Models\UpdateCustomerRequest;

final class CustomersClient implements CustomersInterface
{
    private $httpClient;
    private $basePath = '/customers';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(CreateCustomerRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req);
    }

    public function list(
        ?string $email = null,
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array {
        $params = [];
        if ($email !== null) {
            $params['email'] = $email;
        }
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

        return $this->httpClient->request('GET', $this->basePath, $params);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id);
    }

    public function update(string $id, UpdateCustomerRequest $req): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id, null, $req);
    }

    public function delete(string $id): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id);
    }

    public function getPaymentMethods(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id . '/payment-methods');
    }
}
