<?php

namespace Ryft\Tests\Api\AccountLinks;

use PHPUnit\Framework\TestCase;
use Ryft\Api\AccountLinks\AccountLinksClient;
use Ryft\Api\AccountLinks\Models\CreateAccountLinkRequest;
use Ryft\HttpInterface;

final class AccountLinksClientTest extends TestCase
{
    public function testGenerateTemporaryAccountLink(): void
    {
        $accountLink = MockData::getTemporaryAccountLink();
        $httpClient = $this->createMock(HttpInterface::class);
        $client = new AccountLinksClient($httpClient);
        $req = new CreateAccountLinkRequest();

        $httpClient->expects($this->any())
            ->method("request")
            ->with('POST', "/account-links", null, $req)
            ->willReturn($accountLink);

        $resp = $client->generateTemporaryAccountLink($req);
        $this->assertEquals($accountLink, $resp);
    }
}
