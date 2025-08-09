<?php

namespace Ryft\Api\Disputes;

use Ryft\Api\Disputes\Models\AddDisputeEvidenceRequest;
use Ryft\Api\Disputes\Models\DeleteDisputeEvidenceRequest;

final class DisputesClient implements DisputesInterface
{
    private $httpClient;
    private $basePath = '/disputes';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list(
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array {
        $params = [];
        if ($startTimestamp !== null) {
            $params['startTimestamp'] = $startTimestamp;
        }
        if ($endTimestamp !== null) {
            $params['endTimestamp'] = $endTimestamp;
        }
        if ($ascending !== null) {
            $params['ascending'] = $ascending;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($startsAfter !== null) {
            $params['startsAfter'] = $startsAfter;
        }

        return $this->httpClient->request('GET', $this->basePath, $params);
    }

    public function get(string $id): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id);
    }

    public function accept(string $id): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/accept');
    }

    public function challenge(string $id): array
    {
        return $this->httpClient->request('POST', $this->basePath . '/' . $id . '/challenge');
    }

    public function addEvidence(string $id, AddDisputeEvidenceRequest $req): array
    {
        return $this->httpClient->request('PATCH', $this->basePath . '/' . $id . '/evidence', null, $req);
    }

    public function deleteEvidence(string $id, DeleteDisputeEvidenceRequest $req): array
    {
        return $this->httpClient->request('DELETE', $this->basePath . '/' . $id . '/evidence', null, $req);
    }
}
