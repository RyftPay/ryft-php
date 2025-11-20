<?php

namespace Ryft\Tests;

use PHPUnit\Framework\TestCase;
use Ryft\Api\AbstractRequest;
use Ryft\CurlClient;
use Ryft\HttpClient;

class HttpClientTest extends TestCase
{
    public function testHandlesArrayableRequest(): void
    {
        $httpClient = new HttpClient('', '');

        $arrayableRequest = $this->createMock(AbstractRequest::class);

        $arrayableRequest->expects($this->once())
            ->method('toArray')
            ->willReturn(['foo' => 'bar']);

        $curl = $this->createMock(CurlClient::class);
        $httpClient->setCurl($curl);

        $curl->expects($this->once())
            ->method('getInfo')
            ->willReturn(200);

        $curl->expects($this->once())
            ->method('exec')
            ->willReturn('{"test":"worked"}');

        $httpClient->request('POST', '/', [], $arrayableRequest);
    }

    public function testHandlesArrayRequest(): void
    {
        $httpClient = new HttpClient('', '');

        $curl = $this->createMock(CurlClient::class);
        $httpClient->setCurl($curl);

        $curl->expects($this->once())
            ->method('getInfo')
            ->willReturn(200);

        $curl->expects($this->once())
            ->method('exec')
            ->willReturn('{"test":"worked"}');

        $httpClient->request('POST', '/', [], ['Test' => 'worked']);
    }
}
