<?php

namespace Ryft\Api\InPersonTerminals;

use Ryft\Api\InPersonTerminals\Models\CreateTerminalRequest;
use Ryft\Api\InPersonTerminals\Models\UpdateTerminalRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalPaymentRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalRefundRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalConfirmReceiptRequest;

final class InPersonTerminalsClient implements InPersonTerminalsInterface
{
    private $httpClient;
    private $basePath = '/in-person/terminals';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(CreateTerminalRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req, $account);
    }

    public function list(
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

        return $this->httpClient->request('GET', $this->basePath, $params, null, $account);
    }

    public function get(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id, [], null, $account);
    }

    public function update(string $id, UpdateTerminalRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id, null, $req, $account);
    }

    public function delete(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id, [], null, $account);
    }

    public function initiatePayment(string $id, TerminalPaymentRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/payment', null, $req, $account);
    }

    public function initiateRefund(string $id, TerminalRefundRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/refund', null, $req, $account);
    }

    public function cancelAction(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/cancel-action', [], null, $account);
    }

    public function confirmReceipt(string $id, TerminalConfirmReceiptRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request(
            'POST',
            $this->basePath . '/' . $id . '/confirm-receipt',
            null,
            $req,
            $account
        );
    }
}
