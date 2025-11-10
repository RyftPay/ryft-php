<?php

namespace Ryft\Tests\Api\InPersonProducts;

final class MockData
{
    private const MOCK_PRODUCT = [
        "id" => "ippd_01FCTS1XMKH9FF43CAFA4CXT3P",
        "type" => "InPersonProduct",
        "name" => "BBPOS WisePad 3",
        "description" => "Compact card reader with contactless support",
        "createdTimestamp" => 1621234567
    ];

    private const MOCK_PRODUCT_LIST = [
        "data" => [
            self::MOCK_PRODUCT
        ],
        "hasMore" => false,
        "lastId" => "ippd_01FCTS1XMKH9FF43CAFA4CXT3P"
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
