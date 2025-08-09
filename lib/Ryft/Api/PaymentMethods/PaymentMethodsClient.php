<?php

namespace Ryft\Api\PaymentMethods;

use Ryft\Api\PaymentMethods\Models\UpdatePaymentMethodRequest;

final class PaymentMethodsClient implements PaymentMethodsInterface
{
    private $httpClient;
    private $basePath = '/payment-methods';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id);
    }

    public function update(string $id, UpdatePaymentMethodRequest $req): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id, null, $req);
    }

    public function delete(string $id): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id);
    }
}
