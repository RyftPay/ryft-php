<?php

namespace Ryft;

class CurlClient
{
    private $handle;

    public function init(?string $url): void
    {
        $this->handle = curl_init($url);
    }

    public function setOption($option, $value): void
    {
        curl_setopt($this->handle, $option, $value);
    }

    public function exec()
    {
        return curl_exec($this->handle);
    }

    public function close()
    {
        curl_close($this->handle);
    }

    public function getInfo(?int $option = null)
    {
        return curl_getinfo($this->handle, $option);
    }
}