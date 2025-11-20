<?php

namespace Ryft\Tests\Api\InPersonProducts;

final class MockData
{
    private const MOCK_PRODUCT = [
        "id" => "ippd_01FCTS1XMKH9FF43CAFA4CXT3P",
        "name" => "BBPOS WisePad 3",
        "status" => "Available",
        "description" => "Compact card reader with contactless support",
        "details" => [
            "battery" => "5150mAh",
            "cardReaders" => "Chip & PIN | Contactless"
        ],
        "createdTimestamp" => 1621234567,
        "lastUpdatedTimestamp" => 1621234567
    ];

    private const MOCK_PRODUCT_LIST = [
        "items" => [
            self::MOCK_PRODUCT
        ],
        "paginationToken" => null
    ];

    public static function getProduct(): array
    {
        return self::MOCK_PRODUCT;
    }

    public static function getProductList(): array
    {
        return self::MOCK_PRODUCT_LIST;
    }
}
