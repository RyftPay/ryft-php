<?php

namespace Ryft\Api\Disputes;

use Ryft\Api\Disputes\Models\AddDisputeEvidenceRequest;
use Ryft\Api\Disputes\Models\DeleteDisputeEvidenceRequest;

interface DisputesInterface
{
    public function list(
        ?int $startTimestamp = null,
        ?int $endTimestamp = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array;

    public function get(string $id): array;

    public function accept(string $id): array;

    public function challenge(string $id): array;

    public function addEvidence(string $id, AddDisputeEvidenceRequest $req): array;

    public function deleteEvidence(string $id, DeleteDisputeEvidenceRequest $req): array;
}
