<?php

namespace Ryft\Api\Files\Models;

final class CreateFileRequest
{
    private $filePath;
    private $category;
    private $metadata;

    private const SUPPORTED_MIME_TYPES = [
        'pdf' => 'application/pdf',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
    ];

    public function __construct(array $data = [])
    {
        $this->filePath = isset($data['filePath']) ? $data['filePath'] : null;
        $this->category = isset($data['category']) ? $data['category'] : null;
        $this->metadata = isset($data['metadata']) ? $data['metadata'] : null;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): void
    {
        $this->filePath = $filePath;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): void
    {
        $this->category = $category;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(?array $metadata): void
    {
        $this->metadata = $metadata;
    }

    public function getMimeType(): ?string
    {
        if (!$this->filePath) {
            return null;
        }

        $extension = strtolower(pathinfo($this->filePath, PATHINFO_EXTENSION));
        return isset(self::SUPPORTED_MIME_TYPES[$extension]) ? self::SUPPORTED_MIME_TYPES[$extension] : null;
    }

    public function getFileName(): ?string
    {
        if (!$this->filePath) {
            return null;
        }

        return basename($this->filePath);
    }

    public function validateFile(): void
    {
        if (!$this->filePath) {
            throw new \InvalidArgumentException('File path is required');
        }

        if (!file_exists($this->filePath)) {
            throw new \InvalidArgumentException('File does not exist: ' . $this->filePath);
        }

        if (!is_readable($this->filePath)) {
            throw new \InvalidArgumentException('File is not readable: ' . $this->filePath);
        }

        $mimeType = $this->getMimeType();
        if ($mimeType === null) {
            $extension = strtolower(pathinfo($this->filePath, PATHINFO_EXTENSION));
            throw new \InvalidArgumentException('Unsupported file type: ' . $extension);
        }
    }
}
