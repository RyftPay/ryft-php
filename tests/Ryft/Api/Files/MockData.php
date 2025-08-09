<?php

namespace Ryft\Tests\Api\Files;

final class MockData
{
    private const MOCK_CREATE_FILE_REQUEST = [
        "filePath" => "passport.pdf",
        "category" => "Evidence"
    ];

    private const MOCK_FILE = [
        "id" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
        "name" => "string",
        "type" => "Pdf",
        "category" => "Evidence",
        "metadata" => [
            "customerId" => "1",
            "registered" => "123"
        ],
        "createdTimestamp" => 1470989538,
        "lastUpdatedTimestamp" => 1470989538,
        "sizeInBytes" => 2048
    ];

    private const MOCK_FILE_LIST = [
        "items" => [
            self::MOCK_FILE
        ]
    ];

    public static function getCreateFileRequest(): array
    {
        return self::MOCK_CREATE_FILE_REQUEST;
    }

    public static function getFile(): array
    {
        return self::MOCK_FILE;
    }

    public static function getFileList(): array
    {
        return self::MOCK_FILE_LIST;
    }
}
