<?php

namespace Ryft\Tests\Api\Customers;

use PHPUnit\Framework\TestCase;
use Ryft\Api\Customers\CustomersClient;
use Ryft\Api\Customers\Models\CreateCustomerRequest;
use Ryft\Api\Customers\Models\UpdateCustomerRequest;
use Ryft\HttpInterface;

class CustomersClientTest extends TestCase
{
    public function testCreate(): void
    {
        $customer = MockData::getCustomer();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new CustomersClient($httpClient);
        $req = new CreateCustomerRequest();

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/customers", null, $req)
            ->willReturn($customer);

        $resp = $client->create($req);
        $this->assertEquals($customer, $resp);
    }

    public function testList(): void
    {
        $customers = MockData::getCustomerList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new CustomersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/customers", [])
            ->willReturn($customers);

        $resp = $client->list();
        $this->assertEquals($customers, $resp);
    }

    public function testListWithParams(): void
    {
        $customers = MockData::getCustomerList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new CustomersClient($httpClient);
        $expectedParams = [
            'email' => 'test@example.com',
            'startTimestamp' => 1000,
            'endTimestamp' => 2000,
            'ascending' => true,
            'limit' => 50,
            'startsAfter' => 'abc123'
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/customers", $expectedParams)
            ->willReturn($customers);

        $resp = $client->list('test@example.com', 1000, 2000, true, 50, 'abc123');
        $this->assertEquals($customers, $resp);
    }

    public function testListWithPartialParams(): void
    {
        $customers = MockData::getCustomerList();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new CustomersClient($httpClient);
        $expectedParams = [
            'email' => 'test@example.com',
            'limit' => 25
        ];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/customers", $expectedParams)
            ->willReturn($customers);

        $resp = $client->list('test@example.com', null, null, null, 25);
        $this->assertEquals($customers, $resp);
    }

    public function testGet(): void
    {
        $customerId = "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $customer = MockData::getCustomer();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new CustomersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/customers/" . $customerId)
            ->willReturn($customer);

        $resp = $client->get($customerId);
        $this->assertEquals($customer, $resp);
    }

    public function testUpdate(): void
    {
        $customerId = "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $customer = MockData::getCustomer();
        $req = new UpdateCustomerRequest();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new CustomersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('PATCH', "/customers/" . $customerId, null, $req)
            ->willReturn($customer);

        $resp = $client->update($customerId, $req);
        $this->assertEquals($customer, $resp);
    }

    public function testDelete(): void
    {
        $expected = MockData::getMockDeleteResponse();
        $customerId = "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new CustomersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/customers/" . $customerId)
            ->willReturn($expected);

        $resp = $client->delete($customerId);
        $this->assertEquals($expected, $resp);
    }

    public function testGetPaymentMethods(): void
    {
        $paymentMethods = MockData::getPaymentMethods();
        $customerId = "cus_01G0EYVFR02KBBVE2YWQ8AKMGJ";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new CustomersClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/customers/" . $customerId . "/payment-methods")
            ->willReturn($paymentMethods);

        $resp = $client->getPaymentMethods($customerId);
        $this->assertEquals($paymentMethods, $resp);
    }
}
