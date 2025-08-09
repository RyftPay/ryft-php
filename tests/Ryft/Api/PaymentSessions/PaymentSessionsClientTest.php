<?php

namespace Ryft\Tests\Api\PaymentSessions;

use PHPUnit\Framework\TestCase;
use Ryft\Api\PaymentSessions\PaymentSessionsClient;
use Ryft\Api\PaymentSessions\Models\CreatePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\UpdatePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\AttemptPaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\ContinuePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\CapturePaymentSessionRequest;
use Ryft\Api\PaymentSessions\Models\RefundPaymentSessionRequest;
use Ryft\HttpInterface;

final class PaymentSessionsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $payment = MockData::getPaymentSession();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);
        $req = new CreatePaymentSessionRequest(MockData::getCreateRequest());

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/payment-sessions", null, $req, null)
            ->willReturn($payment);

        $resp = $client->create($req);
        $this->assertEquals($payment, $resp);
    }

    public function testCreateWithAccount(): void
    {
        $payment = MockData::getPaymentSession();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);
        $req = new CreatePaymentSessionRequest(MockData::getCreateRequest());
        $accountId = "acc_123";

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/payment-sessions", null, $req, $accountId)
            ->willReturn($payment);

        $resp = $client->create($req, $accountId);
        $this->assertEquals($payment, $resp);
    }

    public function testList(): void
    {
        $payments = MockData::getPaymentSessionList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/payment-sessions", [], null, null)
            ->willReturn($payments);

        $resp = $client->list();
        $this->assertEquals($payments, $resp);
    }

    public function testListWithParams(): void
    {
        $payments = MockData::getPaymentSessionList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);
        $expectedParams = [
            'startTimestamp' => 1000,
            'endTimestamp' => 2000,
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/payment-sessions", $expectedParams, null, "acc_123")
            ->willReturn($payments);

        $resp = $client->list(1000, 2000, true, 50, 'abc123', 'acc_123');
        $this->assertEquals($payments, $resp);
    }

    public function testGet(): void
    {
        $paymentSessionId = "ps_01FCTS1XMKH9FF43CAFA4CXT3P";
        $payment = MockData::getPaymentSession();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/payment-sessions/" . $paymentSessionId, [], null, null)
            ->willReturn($payment);

        $resp = $client->get($paymentSessionId);
        $this->assertEquals($payment, $resp);
    }

    public function testUpdate(): void
    {
        $payment = MockData::getPaymentSession();
        $paymentSessionId = "ps_01FCTS1XMKH9FF43CAFA4CXT3P";
        $req = new UpdatePaymentSessionRequest(MockData::getUpdateRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/payment-sessions/" . $paymentSessionId, null, $req, null)
            ->willReturn($payment);

        $resp = $client->update($paymentSessionId, $req);
        $this->assertEquals($payment, $resp);
    }

    public function testAttemptPayment(): void
    {
        $payment = MockData::getPaymentSession();
        $req = new AttemptPaymentSessionRequest(MockData::getAttemptPaymentRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/payment-sessions/attempt-payment", null, $req, null)
            ->willReturn($payment);

        $resp = $client->attemptPayment($req);
        $this->assertEquals($payment, $resp);
    }

    public function testContinuePayment(): void
    {
        $payment = MockData::getPaymentSession();
        $req = new ContinuePaymentSessionRequest(MockData::getContinuePaymentRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/payment-sessions/continue-payment", null, $req, null)
            ->willReturn($payment);

        $resp = $client->continuePayment($req);
        $this->assertEquals($payment, $resp);
    }

    public function testListTransactions(): void
    {
        $txs = MockData::getTransactionList();
        $paymentSessionId = "ps_01FCTS1XMKH9FF43CAFA4CXT3P";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/payment-sessions/" . $paymentSessionId . "/transactions", [], null, null)
            ->willReturn($txs);

        $resp = $client->listTransactions($paymentSessionId);
        $this->assertEquals($txs, $resp);
    }

    public function testListTransactionsWithParams(): void
    {
        $txs = MockData::getTransactionList();
        $paymentSessionId = "ps_01FCTS1XMKH9FF43CAFA4CXT3P";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 25,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/payment-sessions/" . $paymentSessionId . "/transactions", $expectedParams, null, "acc_123")
            ->willReturn($txs);

        $resp = $client->listTransactions($paymentSessionId, true, 25, 'abc123', 'acc_123');
        $this->assertEquals($txs, $resp);
    }

    public function testGetTransaction(): void
    {
        $tx = MockData::getTransaction();
        $paymentSessionId = "ps_01FCTS1XMKH9FF43CAFA4CXT3P";
        $transactionId = "txn_01FCTS1XMKH9FF43CAFA4CXT3P";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/payment-sessions/" . $paymentSessionId . "/transactions/" . $transactionId, [], null, null)
            ->willReturn($tx);

        $resp = $client->getTransaction($paymentSessionId, $transactionId);
        $this->assertNotNull($resp);
        $this->assertEquals($tx, $resp);
    }

    public function testCapture(): void
    {
        $tx = MockData::getTransaction();
        $paymentSessionId = "ps_01FCTS1XMKH9FF43CAFA4CXT3P";
        $req = new CapturePaymentSessionRequest(MockData::getCaptureRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/payment-sessions/" . $paymentSessionId . "/captures", null, $req, null)
            ->willReturn($tx);

        $resp = $client->capture($paymentSessionId, $req);
        $this->assertEquals($tx, $resp);
    }

    public function testVoid(): void
    {
        $tx = MockData::getTransaction();
        $paymentSessionId = "ps_01FCTS1XMKH9FF43CAFA4CXT3P";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/payment-sessions/" . $paymentSessionId . "/voids", [], null, null)
            ->willReturn($tx);

        $resp = $client->void($paymentSessionId);
        $this->assertEquals($tx, $resp);
    }

    public function testRefund(): void
    {
        $tx = MockData::getTransaction();
        $paymentSessionId = "ps_01FCTS1XMKH9FF43CAFA4CXT3P";
        $req = new RefundPaymentSessionRequest(MockData::getRefundRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentSessionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/payment-sessions/" . $paymentSessionId . "/refunds", null, $req, null)
            ->willReturn($tx);

        $resp = $client->refund($paymentSessionId, $req);
        $this->assertNotNull($resp);
    }
}
