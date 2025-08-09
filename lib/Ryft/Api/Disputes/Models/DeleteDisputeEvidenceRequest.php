<?php

namespace Ryft\Api\Disputes\Models;

final class DeleteDisputeEvidenceRequest
{
    private $text = null;
    private $files = null;

    public function __construct(array $data = [])
    {
        if (isset($data['text'])) {
            $this->text = $data['text'];
        }
        if (isset($data['files'])) {
            $this->files = $data['files'];
        }
    }

    public function getText(): ?array
    {
        return $this->text;
    }

    public function setText(?array $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getFiles(): ?array
    {
        return $this->files;
    }

    public function setFiles(?array $files): self
    {
        $this->files = $files;
        return $this;
    }
}
