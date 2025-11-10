<?php

namespace Ryft\Tests\Api\InPersonSkus;

final class MockData
{
    private const MOCK_SKU = [
        "id" => "ipsku_01FCTS1XMKH9FF43CAFA4CXT3P",
        "type" => "InPersonSku",
        "productId" => "ippd_01FCTS1XMKH9FF43CAFA4CXT3P",
        "country" => "EU",
        "price" => [
            "amount" => 5000,
            "currency" => "GBP"
        ],
        "createdTimestamp" => 1621234567
    ];

    private const MOCK_SKU_LIST = [
        "data" => [
            self::MOCK_SKU
        ],
        "hasMore" => false,
        "lastId" => "ipsku_01FCTS1XMKH9FF43CAFA4CXT3P"
    ];

    public static function getSku(): array
    {
        return self::MOCK_SKU;
    }

    public static function getSkuList(): array
    {
        return self::MOCK_SKU_LIST;
    }
}
