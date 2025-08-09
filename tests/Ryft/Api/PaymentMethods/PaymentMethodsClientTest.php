<?php

namespace Ryft\Tests\Api\PaymentMethods;

use PHPUnit\Framework\TestCase;
use Ryft\Api\PaymentMethods\PaymentMethodsClient;
use Ryft\Api\PaymentMethods\Models\UpdatePaymentMethodRequest;
use Ryft\HttpInterface;

final class PaymentMethodsClientTest extends TestCase
{
    public function testGet(): void
    {
        $paymentMethodId = "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $paymentMethod = MockData::getPaymentMethod();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/payment-methods/" . $paymentMethodId)
            ->willReturn($paymentMethod);

        $resp = $client->get($paymentMethodId);
        $this->assertEquals($paymentMethod, $resp);
    }

    public function testUpdate(): void
    {
        $paymentMethodId = "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $paymentMethod = MockData::getPaymentMethod();
        $req = new UpdatePaymentMethodRequest(MockData::getUpdateRequest());
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/payment-methods/" . $paymentMethodId, null, $req)
            ->willReturn($paymentMethod);

        $resp = $client->update($paymentMethodId, $req);
        $this->assertEquals($paymentMethod, $resp);
    }

    public function testUpdateWithEmptyRequest(): void
    {
        $paymentMethodId = "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $paymentMethod = MockData::getPaymentMethod();
        $req = new UpdatePaymentMethodRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/payment-methods/" . $paymentMethodId, null, $req)
            ->willReturn($paymentMethod);

        $resp = $client->update($paymentMethodId, $req);
        $this->assertEquals($paymentMethod, $resp);
    }

    public function testDelete(): void
    {
        $expected = MockData::getDeleteResponse();
        $paymentMethodId = "pmt_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new PaymentMethodsClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/payment-methods/" . $paymentMethodId)
            ->willReturn($expected);

        $resp = $client->delete($paymentMethodId);
        $this->assertEquals($expected, $resp);
    }
}
