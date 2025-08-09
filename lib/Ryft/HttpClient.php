<?php

namespace Ryft;

use Ryft\Exceptions\RyftException;

final class HttpClient implements HttpInterface
{
    private $privateKey;
    private $headers;
    private $baseUrl;

    public function __construct(string $baseUrl, string $privateKey)
    {
        $this->baseUrl = $baseUrl;
        $this->privateKey = $privateKey;
        $this->headers = [
            'Authorization: ' . $this->privateKey,
            'Content-Type: application/json',
            'Accept: application/json',
            'User-Agent: ' . Version::SDK_NAME . '/' . Version::SDK_VERSION,
            'ryft-sdk-name: ' . Version::SDK_NAME,
            'ryft-sdk-version: ' . Version::SDK_VERSION,
        ];
    }

    public function request(string $method, string $path, ?array $params = null, $body = null, ?string $account = null): array
    {
        switch ($method) {
            case 'GET':
                return $this->doGet($path, $params, $account);
            case 'POST':
                return $this->doPost($path, $body, $account);
            case 'PATCH':
                return $this->doPatch($path, $body, $account);
            case 'DELETE':
                return $this->doDelete($path, $account);
            default:
                throw new \InvalidArgumentException('Invalid HTTP method: ' . $method);
        }
    }

    private function doGet(string $path, ?array $params = [], ?string $account = null): array
    {
        if (!empty($params)) {
            $path .= '?' . http_build_query($params);
        }
        return $this->doRequest('GET', $path, null, $account);
    }

    private function doPost(string $path, ?array $body = null, ?string $account = null)
    {
        return $this->doRequest('POST', $path, $body, $account);
    }

    private function doPatch(string $path, ?array $body = null, ?string $account = null)
    {
        return $this->doRequest('PATCH', $path, $body, $account);
    }

    private function doDelete(string $path, ?array $body = null, ?string $account = null): array
    {
        return $this->doRequest('DELETE', $path, $body, $account);
    }

    /**
     * @throws RyftException
     */
    private function doRequest(string $method, string $path, ?array $body = null, ?string $account = null): array
    {
        $url = $this->baseUrl . $path;

        $headers = $this->headers;
        if ($account !== null) {
            $headers[] = 'Account: ' . $account;
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($body !== null) {
            $jsonBody = json_encode($body);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);
        }

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $data = json_decode($response, true);

        if ($statusCode < 200 || $statusCode > 299) {
            throw new RyftException(
                $data['requestId'] ?? '',
                $statusCode,
                $data['status'] ?? '',
                $data['errors'] ?? [],
                $data['message'] ?? 'Unknown error'
            );
        }

        curl_close($ch);

        return $data;
    }

    public function uploadFile(string $path, string $postData, string $boundary, ?string $account = null): array
    {
        $url = $this->baseUrl . $path;

        $headers = [
            'Authorization: ' . $this->privateKey,
            'Content-Type: multipart/form-data; boundary=' . $boundary,
            'User-Agent: ' . Version::SDK_NAME . '/' . Version::SDK_VERSION,
            'ryft-sdk-name: ' . Version::SDK_NAME,
            'ryft-sdk-version: ' . Version::SDK_VERSION,
        ];

        if ($account !== null) {
            $headers[] = 'Account: ' . $account;
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($statusCode === 415) {
            curl_close($ch);
            throw new RyftException(
                '',
                415,
                'Unsupported Media Type',
                [['message' => 'Unsupported file type', 'code' => 'bad_request']],
                'Unsupported file type'
            );
        }

        $data = json_decode($response, true);

        if ($statusCode < 200 || $statusCode > 299) {
            curl_close($ch);
            throw new RyftException(
                $data['requestId'] ?? '',
                $statusCode,
                $data['status'] ?? '',
                $data['errors'] ?? [],
                $data['message'] ?? 'Unknown error'
            );
        }

        curl_close($ch);

        return $data;
    }
}
