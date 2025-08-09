<?php

namespace Ryft\Api\Files;

use Ryft\Api\Files\Models\CreateFileRequest;

final class FilesClient implements FilesInterface
{
    private $httpClient;
    private $basePath = '/files';

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list(
        ?string $category = null,
        ?bool $ascending = null,
        ?int $limit = null,
        ?string $startsAfter = null
    ): array {
        $params = [];
        if ($category !== null) {
            $params['category'] = $category;
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

    public function get(string $id, ?string $account = null): array
    {
        return $this->httpClient->request('GET', $this->basePath . '/' . $id, null, null, $account);
    }

    public function create(CreateFileRequest $req, ?string $account = null): array
    {
        $req->validateFile();

        $filePath = $req->getFilePath();
        $fileName = $req->getFileName();
        $mimeType = $req->getMimeType();
        $category = $req->getCategory();

        $boundary = '----FormBoundary' . uniqid();
        $postData = '';

        $fileContent = file_get_contents($filePath);
        $postData .= "--{$boundary}\r\n";
        $postData .= "Content-Disposition: form-data; name=\"file\"; filename=\"{$fileName}\"\r\n";
        $postData .= "Content-Type: {$mimeType}\r\n\r\n";
        $postData .= $fileContent . "\r\n";

        $postData .= "--{$boundary}\r\n";
        $postData .= "Content-Disposition: form-data; name=\"category\"\r\n\r\n";
        $postData .= $category . "\r\n";

        $postData .= "--{$boundary}--\r\n";

        return $this->httpClient->uploadFile($this->basePath, $postData, $boundary, $account);
    }
}
