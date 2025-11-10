<?php

namespace Ryft\Tests\Api\InPersonOrders;

final class MockData
{
    private const MOCK_ORDER = [
        "id" => "ipord_01FCTS1XMKH9FF43CAFA4CXT3P",
        "type" => "InPersonOrder",
        "status" => "Completed",
        "skuId" => "ipsku_01FCTS1XMKH9FF43CAFA4CXT3P",
        "quantity" => 2,
        "totalPrice" => [
            "amount" => 10000,
            "currency" => "GBP"
        ],
        "shippingAddress" => [
            "line1" => "123 Main St",
            "city" => "London",
            "country" => "GB",
            "postalCode" => "SW1A 1AA"
        ],
        "createdTimestamp" => 1621234567,
        "lastUpdatedTimestamp" => 1621234567
    ];

    private const MOCK_ORDER_LIST = [
        "data" => [
            self::MOCK_ORDER
        ],
        "hasMore" => false,
        "lastId" => "ipord_01FCTS1XMKH9FF43CAFA4CXT3P"
    ];

    public static function getOrder(): array
    {
        return self::MOCK_ORDER;
    }

    public static function getOrderList(): array
    {
        return self::MOCK_ORDER_LIST;
    }
}
