<?php

namespace Ryft\Tests\Api\ApplePay;

use PHPUnit\Framework\TestCase;
use Ryft\Api\ApplePay\ApplePayClient;
use Ryft\Api\ApplePay\Models\CreateApplePaySession;
use Ryft\Api\ApplePay\Models\RegisterApplePayDomainRequest;
use Ryft\HttpInterface;

final class ApplePayClientTest extends TestCase
{
    public function testRegisterDomain(): void
    {
        $applePay = MockData::getMockApplePay();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ApplePayClient($httpClient);
        $req = new RegisterApplePayDomainRequest();

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/apple-pay/web-domains", null, $req)
            ->willReturn($applePay);

        $resp = $client->registerDomain($req);
        $this->assertEquals($applePay, $resp);
    }

    public function testListDomains(): void
    {
        $applePay = MockData::getMockApplePay();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ApplePayClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/apple-pay/web-domains")
            ->willReturn($applePay);

        $resp = $client->listDomains();
        $this->assertEquals($applePay, $resp);
    }

    public function testListDomainsWithParams(): void
    {
        $applePay = MockData::getMockApplePay();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ApplePayClient($httpClient);
        $params = ["ascending" => true, "limit" => 50, "startsAfter" => "abc"];

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/apple-pay/web-domains", $params)
            ->willReturn($applePay);

        $resp = $client->listDomains(true, 50, "abc");
        $this->assertEquals($applePay, $resp);
    }

    public function testGetDomain(): void
    {
        $applePay = MockData::getMockApplePay();
        $domain = "example.com";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ApplePayClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('GET', "/apple-pay/web-domains/" . $domain)
            ->willReturn($applePay);

        $resp = $client->getDomain($domain);
        $this->assertEquals($applePay, $resp);
    }

    public function testDeleteDomain(): void
    {
        $expected = MockData::getMockDeleteResponse();
        $domain = "example.com";
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ApplePayClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('DELETE', "/apple-pay/web-domains/" . $domain)
            ->willReturn($expected);

        $resp = $client->deleteDomain($domain);
        $this->assertEquals($expected, $resp);
    }

    public function testCreateSession(): void
    {
        $applePaySession = MockData::getMockApplePayWebSession();
        $req = new CreateApplePaySession();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new ApplePayClient($httpClient);

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/apple-pay/sessions", null, $req)
            ->willReturn($applePaySession);

        $resp = $client->createSession($req);
        $this->assertEquals($applePaySession, $resp);
    }
}
