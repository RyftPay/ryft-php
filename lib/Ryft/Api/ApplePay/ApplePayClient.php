<?php

namespace Ryft\Api\ApplePay;

use Ryft\Api\ApplePay\Models\CreateApplePaySession;
use Ryft\Api\ApplePay\Models\RegisterApplePayDomainRequest;

final class ApplePayClient implements ApplePayInterface
{
    private $httpClient;
    private $domainsPath = '/apple-pay/web-domains';
    private $sessionsPath = '/apple-pay/sessions';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function registerDomain(RegisterApplePayDomainRequest $req, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->domainsPath, null, $req, $account);
    }

    public function listDomains(
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null,
        ?string $account = null
    ): array {
        $params = [];
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }

        return $this->httpClient->request('GET', $this->domainsPath, $params, null, $account);
    }

    public function getDomain(string $domain, ?string $account = null): array
    {
        return $this->httpClient->request('GET', $this->domainsPath . '/' . $domain, null, null, $account);
    }

    public function deleteDomain(string $domain, ?string $account = null): array
    {
        return $this->httpClient->request('DELETE', $this->domainsPath . '/' . $domain, null, null, $account);
    }

    public function createSession(CreateApplePaySession $data, ?string $account = null): array
    {
        return $this->httpClient->request('POST', $this->sessionsPath, null, $data, $account);
    }
}
