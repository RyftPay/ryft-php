<?php

namespace Ryft\Api\PaymentMethods;

use Ryft\Api\PaymentMethods\Models\UpdatePaymentMethodRequest;

interface PaymentMethodsInterface
{
    public function get(string $id): array;

    public function update(string $id, UpdatePaymentMethodRequest $req): array;

    public function delete(string $id): array;
}
