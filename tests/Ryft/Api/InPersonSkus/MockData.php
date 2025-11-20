<?php

namespace Ryft\Tests\Api\InPersonSkus;

final class MockData
{
    private const MOCK_SKU = [
        "id" => "ipsku_01FCTS1XMKH9FF43CAFA4CXT3P",
        "name" => "BBPOS WisePad 3 (EU)",
        "productId" => "ippd_01FCTS1XMKH9FF43CAFA4CXT3P",
        "country" => "GB",
        "totalAmount" => 5000,
        "currency" => "GBP",
        "status" => "Available",
        "createdTimestamp" => 1621234567,
        "lastUpdatedTimestamp" => 1621234567
    ];

    private const MOCK_SKU_LIST = [
        "items" => [
            self::MOCK_SKU
        ],
        "paginationToken" => null
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
