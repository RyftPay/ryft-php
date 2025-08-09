<?php

namespace Ryft\Api\PaymentSessions;

use Ryft\Api\PaymentSessions\Models\CreatePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\UpdatePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\AttemptPaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\ContinuePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\CapturePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\RefundPaymentSessionRequest;

final class PaymentSessionsClient implements PaymentSessionsInterface
{
    private $httpClient;
    private $basePath = '/payment-sessions';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(CreatePaymentSessionRequest $req, ?string $account = null): array
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

    public function update(string $id, UpdatePaymentSessionRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id, null, $req, $account);
    }

    public function attemptPayment(AttemptPaymentSessionRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/attempt-payment', null, $req, $account);
    }

    public function continuePayment(ContinuePaymentSessionRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/continue-payment', null, $req, $account);
    }

    public function listTransactions(
        string $id,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array {
        $params = [];
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }

        return $this->httpClient->request('GET', $this->basePath . '/' . $id . '/transactions', $params, null, $account);
    }

    public function getTransaction(string $id, string $transactionId, ?string $account = null): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id . '/transactions/' . $transactionId, [], null, $account);
    }

    public function capture(string $id, CapturePaymentSessionRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/captures', null, $req, $account);
    }

    public function void(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/voids', [], null, $account);
    }

    public function refund(string $id, RefundPaymentSessionRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/refunds', null, $req, $account);
    }
}
