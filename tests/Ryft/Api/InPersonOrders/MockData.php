<?php

namespace Ryft\Tests\Api\InPersonOrders;

final class MockData
{
    private const MOCK_ORDER = [
        "id" => "ipord_01FCTS1XMKH9FF43CAFA4CXT3P",
        "status" => "ReadyToShip",
        "totalAmount" => 10000,
        "taxAmount" => 1666,
        "currency" => "GBP",
        "items" => [[
            "id" => "ipsku_01FCTS1XMKH9FF43CAFA4CXT3P",
            "name" => "PAX A920 Pro",
            "totalAmountPerUnit" => 5000,
            "taxAmountPerUnit" => 833,
            "quantity" => 2
        ]],
        "customer" => [
            "email" => "customer@example.com",
            "firstName" => "John",
            "lastName" => "Doe"
        ],
        "shipping" => [
            "address" => [
                "lineOne" => "123 Main St",
                "lineTwo" => null,
                "city" => "London",
                "country" => "GB",
                "postalCode" => "SW1A 1AA",
                "region" => null
            ],
            "contact" => [
                "email" => "customer@example.com",
                "mobilePhoneNumber" => "+447900000000"
            ],
            "method" => null
        ],
        "metadata" => [
            "orderId" => "ORDER-123"
        ],
        "createdTimestamp" => 1621234567,
        "lastUpdatedTimestamp" => 1621234567
    ];

    private const MOCK_ORDER_LIST = [
        "items" => [
            self::MOCK_ORDER
        ],
        "paginationToken" => null
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
