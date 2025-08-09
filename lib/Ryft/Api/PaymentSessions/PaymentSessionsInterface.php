<?php

namespace Ryft\Api\PaymentSessions;

use Ryft\Api\PaymentSessions\Models\CreatePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\UpdatePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\AttemptPaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\ContinuePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\CapturePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\RefundPaymentSessionRequest;

interface PaymentSessionsInterface
{
    public function create(CreatePaymentSessionRequest $req, ?string $account = null): array;

    public function list(
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array;

    public function get(string $id, ?string $account = null): array;

    public function update(string $id, UpdatePaymentSessionRequest $req, ?string $account = null): array;

    public function attemptPayment(AttemptPaymentSessionRequest $req, ?string $account = null): array;

    public function continuePayment(ContinuePaymentSessionRequest $req, ?string $account = null): array;

    public function listTransactions(
        string $id,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array;

    public function getTransaction(string $id, string $transactionId, ?string $account = null): array;

    public function capture(string $id, CapturePaymentSessionRequest $req, ?string $account = null): array;

    public function void(string $id, ?string $account = null): array;

    public function refund(string $id, RefundPaymentSessionRequest $req, ?string $account = null): array;
}
