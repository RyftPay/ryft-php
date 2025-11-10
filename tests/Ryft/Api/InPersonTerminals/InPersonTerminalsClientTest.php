<?php

namespace Ryft\Tests\Api\InPersonTerminals;

use PHPUnit\Framework\TestCase;
use Ryft\Api\InPersonTerminals\InPersonTerminalsClient;
use Ryft\Api\InPersonTerminals\Models\CreateTerminalRequest;
use Ryft\Api\InPersonTerminals\Models\UpdateTerminalRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalPaymentRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalRefundRequest;
use Ryft\Api\InPersonTerminals\Models\TerminalConfirmReceiptRequest;
use Ryft\HttpInterface;

final class InPersonTerminalsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $terminal = MockData::getTerminal();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);
        $req = new CreateTerminalRequest(MockData::getCreateRequest());

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/in-person/terminals", null, $req, null)
            ->willReturn($terminal);

        $resp = $client->create($req);
        $this->assertEquals($terminal, $resp);
    }

    public function testList(): void
    {
        $terminals = MockData::getTerminalList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/terminals", [], null, null)
            ->willReturn($terminals);

        $resp = $client->list();
        $this->assertEquals($terminals, $resp);
    }

    public function testListWithParams(): void
    {
        $terminals = MockData::getTerminalList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);
        $expectedParams = [
            'ascending' => true,
            'limit' => 25,
            'startsAfter' => 'tml_123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/terminals", $expectedParams, null, "acc_123")
            ->willReturn($terminals);

        $resp = $client->list(true, 25, 'tml_123', 'acc_123');
        $this->assertEquals($terminals, $resp);
    }

    public function testGet(): void
    {
        $terminalId = "tml_01FCTS1XMKH9FF43CAFA4CXT3P";
        $terminal = MockData::getTerminal();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/in-person/terminals/" . $terminalId, [], null, null)
            ->willReturn($terminal);

        $resp = $client->get($terminalId);
        $this->assertEquals($terminal, $resp);
    }

    public function testUpdate(): void
    {
        $terminal = MockData::getTerminal();
        $terminalId = "tml_01FCTS1XMKH9FF43CAFA4CXT3P";
        $req = new UpdateTerminalRequest(MockData::getUpdateRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/in-person/terminals/" . $terminalId, null, $req, null)
            ->willReturn($terminal);

        $resp = $client->update($terminalId, $req);
        $this->assertEquals($terminal, $resp);
    }

    public function testDelete(): void
    {
        $deleted = MockData::getDeletedResponse();
        $terminalId = "tml_01FCTS1XMKH9FF43CAFA4CXT3P";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/in-person/terminals/" . $terminalId, [], null, null)
            ->willReturn($deleted);

        $resp = $client->delete($terminalId);
        $this->assertEquals($deleted, $resp);
    }

    public function testInitiatePayment(): void
    {
        $response = MockData::getActionResponse();
        $terminalId = "tml_01FCTS1XMKH9FF43CAFA4CXT3P";
        $req = new TerminalPaymentRequest(MockData::getPaymentRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/in-person/terminals/" . $terminalId . "/payment", null, $req, null)
            ->willReturn($response);

        $resp = $client->initiatePayment($terminalId, $req);
        $this->assertEquals($response, $resp);
    }

    public function testInitiateRefund(): void
    {
        $response = MockData::getActionResponse();
        $terminalId = "tml_01FCTS1XMKH9FF43CAFA4CXT3P";
        $req = new TerminalRefundRequest(MockData::getRefundRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/in-person/terminals/" . $terminalId . "/refund", null, $req, null)
            ->willReturn($response);

        $resp = $client->initiateRefund($terminalId, $req);
        $this->assertEquals($response, $resp);
    }

    public function testCancelAction(): void
    {
        $response = MockData::getActionResponse();
        $terminalId = "tml_01FCTS1XMKH9FF43CAFA4CXT3P";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/in-person/terminals/" . $terminalId . "/cancel-action", [], null, null)
            ->willReturn($response);

        $resp = $client->cancelAction($terminalId);
        $this->assertEquals($response, $resp);
    }

    public function testConfirmReceipt(): void
    {
        $response = MockData::getActionResponse();
        $terminalId = "tml_01FCTS1XMKH9FF43CAFA4CXT3P";
        $req = new TerminalConfirmReceiptRequest(MockData::getConfirmReceiptRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new InPersonTerminalsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/in-person/terminals/" . $terminalId . "/confirm-receipt", null, $req, null)
            ->willReturn($response);

        $resp = $client->confirmReceipt($terminalId, $req);
        $this->assertEquals($response, $resp);
    }
}
