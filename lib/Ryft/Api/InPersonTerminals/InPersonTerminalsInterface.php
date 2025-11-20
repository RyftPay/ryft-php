<?php

namespace Ryft\Api\InPersonTerminals;

use Ryft\Api\InPersonTerminals\Models\CreateTerminalRequest;
use Ryft\Api\InPersonTerminals\Models\UpdateTerminalRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalPaymentRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalRefundRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalConfirmReceiptRequest;

interface InPersonTerminalsInterface
{
    public function create(CreateTerminalRequest $req, ?string $account = null): array;

    public function list(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array;

    public function get(string $id, ?string $account = null): array;

    public function update(string $id, UpdateTerminalRequest $req, ?string $account = null): array;

    public function delete(string $id, ?string $account = null): array;

    public function initiatePayment(string $id, TerminalPaymentRequest $req, ?string $account = null): array;

    public function initiateRefund(string $id, TerminalRefundRequest $req, ?string $account = null): array;

    public function cancelAction(string $id, ?string $account = null): array;

    public function confirmReceipt(string $id, TerminalConfirmReceiptRequest $req, ?string $account = null): array;
}
