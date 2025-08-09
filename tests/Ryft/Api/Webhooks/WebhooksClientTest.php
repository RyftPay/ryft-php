<?php

namespace Ryft\Tests\Api\Webhooks;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Webhooks\WebhooksClient;
use Ryft\Api\Webhooks\Models\CreateWebhookRequest;
use Ryft\Api\Webhooks\Models\UpdateWebhookRequest;
use Ryft\HttpInterface;

final class WebhooksClientTest extends TestCase
{
    public function testCreate(): void
    {
        $webhook = MockData::getWebhook();
        $req = new CreateWebhookRequest(MockData::getCreateWebhookRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new WebhooksClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/webhooks", null, $req)
            ->willReturn($webhook);

        $resp = $client->create($req);
        $this->assertEquals($webhook, $resp);
    }

    public function testCreateWithEmptyRequest(): void
    {
        $webhook = MockData::getWebhook();
        $req = new CreateWebhookRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new WebhooksClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/webhooks", null, $req)
            ->willReturn($webhook);

        $resp = $client->create($req);
        $this->assertEquals($webhook, $resp);
    }

    public function testList(): void
    {
        $webhooks = MockData::getWebhookList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new WebhooksClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/webhooks")
            ->willReturn($webhooks);

        $resp = $client->list();
        $this->assertEquals($webhooks, $resp);
    }

    public function testGet(): void
    {
        $webhookId = "wh_31fba123-0fef-41d6-92ad-fd7089f49f8a";
        $webhook = MockData::getWebhookWithoutSecret();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new WebhooksClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/webhooks/" . $webhookId)
            ->willReturn($webhook);

        $resp = $client->get($webhookId);
        $this->assertEquals($webhook, $resp);
    }

    public function testUpdate(): void
    {
        $webhookId = "wh_31fba123-0fef-41d6-92ad-fd7089f49f8a";
        $webhook = MockData::getWebhookWithoutSecret();
        $req = new UpdateWebhookRequest(MockData::getUpdateWebhookRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new WebhooksClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/webhooks/" . $webhookId, null, $req)
            ->willReturn($webhook);

        $resp = $client->update($webhookId, $req);
        $this->assertEquals($webhook, $resp);
    }

    public function testUpdateWithEmptyRequest(): void
    {
        $webhookId = "wh_31fba123-0fef-41d6-92ad-fd7089f49f8a";
        $webhook = MockData::getWebhookWithoutSecret();
        $req = new UpdateWebhookRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new WebhooksClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/webhooks/" . $webhookId, null, $req)
            ->willReturn($webhook);

        $resp = $client->update($webhookId, $req);
        $this->assertEquals($webhook, $resp);
    }

    public function testDelete(): void
    {
        $webhookId = "wh_31fba123-0fef-41d6-92ad-fd7089f49f8a";
        $webhook = MockData::getWebhookWithoutSecret();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new WebhooksClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/webhooks/" . $webhookId)
            ->willReturn($webhook);

        $resp = $client->delete($webhookId);
        $this->assertEquals($webhook, $resp);
    }
}
