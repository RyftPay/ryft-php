<?php

namespace Ryft\Tests\Api\Webhooks;

final class MockData
{
    private const MOCK_CREATE_WEBHOOK_REQUEST = [
        "url" => "https://example-endpoint.com/webhook",
        "active" => true,
        "eventTypes" => [
            "PaymentSession.captured",
            "PaymentSession.refunded"
        ]
    ];

    private const MOCK_UPDATE_WEBHOOK_REQUEST = [
        "url" => "https://example-endpoint.com/webhook",
        "active" => true,
        "eventTypes" => [
            "PaymentSession.captured",
            "PaymentSession.refunded"
        ]
    ];

    private const MOCK_WEBHOOK = [
        "secret" => "whs_0f6b1b5a-aef0-4011-978b-19fd4a4d46ea",
        "id" => "wh_31fba123-0fef-41d6-92ad-fd7089f49f8a",
        "active" => true,
        "eventTypes" => [
            "PaymentSession.captured",
            "PaymentSession.refunded"
        ],
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_WEBHOOK_WITHOUT_SECRET = [
        "id" => "wh_31fba123-0fef-41d6-92ad-fd7089f49f8a",
        "active" => true,
        "eventTypes" => [
            "PaymentSession.captured",
            "PaymentSession.refunded"
        ],
        "createdTimestamp" => 1470989538
    ];

    private const MOCK_WEBHOOK_LIST = [
        "items" => [
            self::MOCK_WEBHOOK_WITHOUT_SECRET
        ]
    ];

    private const MOCK_DELETE_RESPONSE = [
        "id" => "wh_31fba123-0fef-41d6-92ad-fd7089f49f8a"
    ];

    public static function getCreateWebhookRequest(): array
    {
        return self::MOCK_CREATE_WEBHOOK_REQUEST;
    }

    public static function getUpdateWebhookRequest(): array
    {
        return self::MOCK_UPDATE_WEBHOOK_REQUEST;
    }

    public static function getWebhook(): array
    {
        return self::MOCK_WEBHOOK;
    }

    public static function getWebhookWithoutSecret(): array
    {
        return self::MOCK_WEBHOOK_WITHOUT_SECRET;
    }

    public static function getWebhookList(): array
    {
        return self::MOCK_WEBHOOK_LIST;
    }

    public static function getDeleteResponse(): array
    {
        return self::MOCK_DELETE_RESPONSE;
    }
}
