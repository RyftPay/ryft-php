<?php

namespace Ryft\Tests\Api\Disputes;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Disputes\DisputesClient;
use Ryft\Api\Disputes\Models\AddDisputeEvidenceRequest;
use Ryft\Api\Disputes\Models\DeleteDisputeEvidenceRequest;
use Ryft\HttpInterface;

final class DisputesClientTest extends TestCase
{
    public function testList(): void
    {
        $disputes = MockData::getDisputeList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/disputes", [])
            ->willReturn($disputes);

        $resp = $client->list();
        $this->assertEquals($disputes, $resp);
    }

    public function testListWithParams(): void
    {
        $disputes = MockData::getDisputeList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);
        $expectedParams = [
            'startTimestamp' => 1000,
            'endTimestamp' => 2000,
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/disputes", $expectedParams)
            ->willReturn($disputes);

        $resp = $client->list(1000, 2000, true, 50, 'abc123');
        $this->assertEquals($disputes, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $disputes = MockData::getDisputeList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);
        $expectedParams = [
            'startTimestamp' => 1000,
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/disputes", $expectedParams)
            ->willReturn($disputes);

        $resp = $client->list(1000, null, null, 25);
        $this->assertEquals($disputes, $resp);
    }

    public function testGet(): void
    {
        $disputeId = "dsp_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $dispute = MockData::getDispute();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/disputes/" . $disputeId)
            ->willReturn($dispute);

        $resp = $client->get($disputeId);
        $this->assertEquals($dispute, $resp);
    }

    public function testAccept(): void
    {
        $disputeId = "dsp_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $dispute = MockData::getDispute();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/disputes/" . $disputeId . "/accept")
            ->willReturn($dispute);

        $resp = $client->accept($disputeId);
        $this->assertEquals($dispute, $resp);
    }

    public function testChallenge(): void
    {
        $disputeId = "dsp_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $dispute = MockData::getDispute();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/disputes/" . $disputeId . "/challenge")
            ->willReturn($dispute);

        $resp = $client->challenge($disputeId);
        $this->assertEquals($dispute, $resp);
    }

    public function testAddEvidence(): void
    {
        $disputeId = "dsp_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $dispute = MockData::getDispute();
        $req = new AddDisputeEvidenceRequest(MockData::getAddEvidenceRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/disputes/" . $disputeId . "/evidence", null, $req)
            ->willReturn($dispute);

        $resp = $client->addEvidence($disputeId, $req);
        $this->assertEquals($dispute, $resp);
    }

    public function testAddEvidenceWithEmptyRequest(): void
    {
        $disputeId = "dsp_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $dispute = MockData::getDispute();
        $req = new AddDisputeEvidenceRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/disputes/" . $disputeId . "/evidence", null, $req)
            ->willReturn($dispute);

        $resp = $client->addEvidence($disputeId, $req);
        $this->assertEquals($dispute, $resp);
    }

    public function testDeleteEvidence(): void
    {
        $disputeId = "dsp_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $dispute = MockData::getDispute();
        $req = new DeleteDisputeEvidenceRequest(MockData::getDeleteEvidenceRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/disputes/" . $disputeId . "/evidence", null, $req)
            ->willReturn($dispute);

        $resp = $client->deleteEvidence($disputeId, $req);
        $this->assertEquals($dispute, $resp);
    }

    public function testDeleteEvidenceWithEmptyRequest(): void
    {
        $disputeId = "dsp_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $dispute = MockData::getDispute();
        $req = new DeleteDisputeEvidenceRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new DisputesClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/disputes/" . $disputeId . "/evidence", null, $req)
            ->willReturn($dispute);

        $resp = $client->deleteEvidence($disputeId, $req);
        $this->assertEquals($dispute, $resp);
    }
}
