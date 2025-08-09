<?php

namespace Ryft\Api\Subscriptions\Models;

final class PauseSubscriptionRequest
{
    private $reason;
    private $resumeTimestamp;
    private $unschedule;

    public function __construct(array $data = [])
    {
        $this->reason = $data['reason'] ?? null;
        $this->resumeTimestamp = $data['resumeTimestamp'] ?? null;
        $this->unschedule = $data['unschedule'] ?? null;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    public function getResumeTimestamp(): ?int
    {
        return $this->resumeTimestamp;
    }

    public function setResumeTimestamp(?int $resumeTimestamp): void
    {
        $this->resumeTimestamp = $resumeTimestamp;
    }

    public function getUnschedule(): ?bool
    {
        return $this->unschedule;
    }

    public function setUnschedule(?bool $unschedule): void
    {
        $this->unschedule = $unschedule;
    }
}
