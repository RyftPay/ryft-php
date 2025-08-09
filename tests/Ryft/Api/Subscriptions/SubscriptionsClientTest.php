<?php

namespace Ryft\Tests\Api\Subscriptions;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Subscriptions\SubscriptionsClient;
use Ryft\Api\Subscriptions\Models\CreateSubscriptionRequest;
use Ryft\Api\Subscriptions\Models\UpdateSubscriptionRequest;
use Ryft\Api\Subscriptions\Models\PauseSubscriptionRequest;
use Ryft\HttpInterface;

final class SubscriptionsClientTest extends TestCase
{
    public function testCreate(): void
    {
        $subscription = MockData::getSubscription();
        $req = new CreateSubscriptionRequest(MockData::getCreateSubscriptionRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/subscriptions", null, $req)
            ->willReturn($subscription);

        $resp = $client->create($req);
        $this->assertEquals($subscription, $resp);
    }

    public function testCreateWithEmptyRequest(): void
    {
        $subscription = MockData::getSubscription();
        $req = new CreateSubscriptionRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/subscriptions", null, $req)
            ->willReturn($subscription);

        $resp = $client->create($req);
        $this->assertEquals($subscription, $resp);
    }

    public function testList(): void
    {
        $subscriptions = MockData::getSubscriptionList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/subscriptions", [])
            ->willReturn($subscriptions);

        $resp = $client->list();
        $this->assertEquals($subscriptions, $resp);
    }

    public function testListWithParams(): void
    {
        $subscriptions = MockData::getSubscriptionList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);
        $expectedParams = [
            'startTimestamp' => 1000000,
            'endTimestamp' => 2000000,
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/subscriptions", $expectedParams)
            ->willReturn($subscriptions);

        $resp = $client->list(1000000, 2000000, true, 50, 'abc123');
        $this->assertEquals($subscriptions, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $subscriptions = MockData::getSubscriptionList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);
        $expectedParams = [
            'ascending' => false,
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/subscriptions", $expectedParams)
            ->willReturn($subscriptions);

        $resp = $client->list(null, null, false, 25);
        $this->assertEquals($subscriptions, $resp);
    }

    public function testGet(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $subscription = MockData::getSubscription();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/subscriptions/" . $subscriptionId)
            ->willReturn($subscription);

        $resp = $client->get($subscriptionId);
        $this->assertEquals($subscription, $resp);
    }

    public function testUpdate(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $subscription = MockData::getSubscription();
        $req = new UpdateSubscriptionRequest(MockData::getUpdateSubscriptionRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/subscriptions/" . $subscriptionId, null, $req)
            ->willReturn($subscription);

        $resp = $client->update($subscriptionId, $req);
        $this->assertEquals($subscription, $resp);
    }

    public function testUpdateWithEmptyRequest(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $subscription = MockData::getSubscription();
        $req = new UpdateSubscriptionRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/subscriptions/" . $subscriptionId, null, $req)
            ->willReturn($subscription);

        $resp = $client->update($subscriptionId, $req);
        $this->assertNotNull($resp);
        $this->assertEquals($subscription, $resp);
    }

    public function testPause(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $subscription = MockData::getSubscription();
        $req = new PauseSubscriptionRequest(MockData::getPauseRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/subscriptions/" . $subscriptionId . "/pause", null, $req)
            ->willReturn($subscription);

        $resp = $client->pause($subscriptionId, $req);
        $this->assertEquals($subscription, $resp);
    }

    public function testPauseWithoutRequest(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $subscription = MockData::getSubscription();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/subscriptions/" . $subscriptionId . "/pause", null, null)
            ->willReturn($subscription);

        $resp = $client->pause($subscriptionId);
        $this->assertEquals($subscription, $resp);
    }

    public function testResume(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $subscription = MockData::getSubscription();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/subscriptions/" . $subscriptionId . "/resume")
            ->willReturn($subscription);

        $resp = $client->resume($subscriptionId);
        $this->assertEquals($subscription, $resp);
    }

    public function testCancel(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $subscription = MockData::getSubscription();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/subscriptions/" . $subscriptionId)
            ->willReturn($subscription);

        $resp = $client->cancel($subscriptionId);
        $this->assertEquals($subscription, $resp);
    }

    public function testGetPaymentSessions(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $subscription = MockData::getPaymentSessions();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/subscriptions/" . $subscriptionId . "/payment-sessions", [])
            ->willReturn($subscription);

        $resp = $client->getPaymentSessions($subscriptionId);
        $this->assertEquals($subscription, $resp);
    }

    public function testGetPaymentSessionsWithParams(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $paymentSessions = MockData::getPaymentSessions();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);
        $expectedParams = [
            'startTimestamp' => 1000000,
            'endTimestamp' => 2000000,
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/subscriptions/" . $subscriptionId . "/payment-sessions", $expectedParams)
            ->willReturn($paymentSessions);

        $resp = $client->getPaymentSessions($subscriptionId, 1000000, 2000000, true, 50, 'abc123');
        $this->assertEquals($paymentSessions, $resp);
    }

    public function testGetPaymentSessionsWithPartialParams(): void
    {
        $subscriptionId = "sub_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $paymentSessions = MockData::getPaymentSessions();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new SubscriptionsClient($httpClient);
        $expectedParams = [
            'limit' => 10
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/subscriptions/" . $subscriptionId . "/payment-sessions", $expectedParams)
            ->willReturn($paymentSessions);

        $resp = $client->getPaymentSessions($subscriptionId, null, null, null, 10);
        $this->assertEquals($paymentSessions, $resp);
    }
}
