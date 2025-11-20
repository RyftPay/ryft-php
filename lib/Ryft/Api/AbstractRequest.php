<?php

namespace Ryft\Api;

abstract class AbstractRequest implements \JsonSerializable
{
    /**
     * @description Return an array representation of the request
     *
     * @return array
     */
    abstract function toArray(): array;

    /**
     * @description Return a json serializable representation of the request
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
