<?php

namespace Ryft\Tests\Api\InPersonLocations;

final class MockData
{
    private const MOCK_LOCATION = [
        "id" => "iploc_01FCTS1XMKH9FF43CAFA4CXT3P",
        "type" => "InPersonLocation",
        "name" => "Main Store London",
        "address" => [
            "lineOne" => "123 High Street",
            "lineTwo" => null,
            "city" => "London",
            "country" => "GB",
            "postalCode" => "SW1A 1AA",
            "region" => null
        ],
        "geoCoordinates" => [
            "latitude" => 51.5074,
            "longitude" => -0.1278
        ],
        "metadata" => [
            "storeCode" => "LON001"
        ],
        "createdTimestamp" => 1621234567,
        "lastUpdatedTimestamp" => 1621234567
    ];

    private const MOCK_LOCATION_LIST = [
        "items" => [
            self::MOCK_LOCATION
        ],
        "paginationToken" => null
    ];

    private const MOCK_DELETED_RESPONSE = [
        "id" => "iploc_01FCTS1XMKH9FF43CAFA4CXT3P",
        "deleted" => true
    ];

    public static function getLocation(): array
    {
        return self::MOCK_LOCATION;
    }

    public static function getLocationList(): array
    {
        return self::MOCK_LOCATION_LIST;
    }

    public static function getDeletedResponse(): array
    {
        return self::MOCK_DELETED_RESPONSE;
    }

    public static function getCreateRequest(): array
    {
        return [
            "name" => "Main Store London",
            "address" => [
                "lineOne" => "123 High Street",
                "lineTwo" => null,
                "city" => "London",
                "country" => "GB",
                "postalCode" => "SW1A 1AA",
                "region" => null
            ],
            "geoCoordinates" => [
                "latitude" => 51.5074,
                "longitude" => -0.1278
            ],
            "metadata" => [
                "storeCode" => "LON001"
            ]
        ];
    }

    public static function getUpdateRequest(): array
    {
        return [
            "name" => "Updated Store Name",
            "metadata" => [
                "storeCode" => "LON002"
            ]
        ];
    }
}
