<?php

namespace Ryft\Api\AccountLinks;

use Ryft\Api\AccountLinks\Models\CreateAccountLinkRequest;
use Ryft\HttpInterface;

final class AccountLinksClient implements AccountLinksInterface
{
    private $httpClient;
    private $basePath = '/account-links';

    public function __construct(HttpInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function generateTemporaryAccountLink(CreateAccountLinkRequest $req): array
    {
        return $this->httpClient->request('POST', $this->basePath, null, $req);
    }
}
