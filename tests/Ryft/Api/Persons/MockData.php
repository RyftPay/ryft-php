<?php

namespace Ryft\Tests\Api\Persons;

final class MockData
{
    private const MOCK_PERSON = [
        "id" => "per_01G0EYVFR02KBBVE2YWQ8AKMGJ",
        "firstName" => "Fred",
        "middleNames" => "David",
        "lastName" => "Jones",
        "email" => "fred.jones@example.com",
        "dateOfBirth" => "1990-01-20",
        "countryOfBirth" => "GB",
        "gender" => "Male",
        "nationalities" => [
            "GB"
        ],
        "address" => [
            "lineOne" => "string",
            "lineTwo" => "string",
            "city" => "string",
            "country" => "GB",
            "postalCode" => "string",
            "region" => "string"
        ],
        "phoneNumber" => "string",
        "businessRoles" => [
            "BusinessContact",
            "Director"
        ],
        "verification" => [
            "status" => "Required",
            "requiredFields" => [
                [
                    "name" => "string"
                ]
            ],
            "requiredDocuments" => [
                [
                    "category" => "ProofOfIdentity",
                    "types" => [
                        "BankStatement"
                    ],
                    "quantity" => 1
                ]
            ],
            "errors" => [
                [
                    "code" => "InvalidDocument",
                    "id" => "string",
                    "description" => "string"
                ]
            ]
        ],
        "documents" => [
            [
                "type" => "BankStatement",
                "category" => "ProofOfIdentity",
                "front" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "back" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "status" => "Pending",
                "invalidReason" => "Document has expired",
                "country" => "GB",
                "assignedTimestamp" => 1470989538,
                "lastUpdatedTimestamp" => 1470989538
            ]
        ],
        "metadata" => [
            "accountId" => "1"
        ],
        "createdTimestamp" => 1470989538,
        "lastUpdatedTimestamp" => 1470989538
    ];

    private const MOCK_PERSON_LIST = [
        "items" => [
            self::MOCK_PERSON
        ]
    ];

    private const MOCK_CREATE_REQUEST = [
        "firstName" => "Fred",
        "middleNames" => "David",
        "lastName" => "Jones",
        "email" => "fred.jones@example.com",
        "dateOfBirth" => "1990-01-20",
        "countryOfBirth" => "GB",
        "gender" => "Male",
        "nationalities" => [
            "GB"
        ],
        "address" => [
            "lineOne" => "string",
            "lineTwo" => "string",
            "city" => "string",
            "country" => "GB",
            "postalCode" => "string",
            "region" => "string"
        ],
        "phoneNumber" => "string",
        "businessRoles" => [
            "BusinessContact",
            "Director"
        ],
        "documents" => [
            [
                "type" => "BankStatement",
                "front" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "back" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "country" => "GB"
            ]
        ],
        "metadata" => [
            "accountId" => "1"
        ]
    ];

    private const MOCK_UPDATE_REQUEST = [
        "firstName" => "Fred",
        "middleNames" => "David",
        "lastName" => "Jones",
        "email" => "fred.jones@example.com",
        "dateOfBirth" => "1990-01-20",
        "countryOfBirth" => "GB",
        "gender" => "Male",
        "nationalities" => [
            "GB"
        ],
        "address" => [
            "lineOne" => "string",
            "lineTwo" => "string",
            "city" => "string",
            "country" => "GB",
            "postalCode" => "string",
            "region" => "string"
        ],
        "phoneNumber" => "+447900000000",
        "businessRoles" => [
            "BusinessContact",
            "Director"
        ],
        "documents" => [
            [
                "type" => "BankStatement",
                "front" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "back" => "fl_01G0EYVFR02KBBVE2YWQ8AKMGJ",
                "country" => "GB"
            ]
        ],
        "metadata" => [
            "accountId" => "1"
        ]
    ];

    private const MOCK_DELETE_RESPONSE = [
        "id" => "per_01G0EYVFR02KBBVE2YWQ8AKMGJ"
    ];

    public static function getPerson(): array
    {
        return self::MOCK_PERSON;
    }

    public static function getPersonList(): array
    {
        return self::MOCK_PERSON_LIST;
    }

    public static function getCreateRequest(): array
    {
        return self::MOCK_CREATE_REQUEST;
    }

    public static function getUpdateRequest(): array
    {
        return self::MOCK_UPDATE_REQUEST;
    }

    public static function getDeleteResponse(): array
    {
        return self::MOCK_DELETE_RESPONSE;
    }
}
