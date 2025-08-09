<?php

namespace Ryft;

use Ryft\Api\Accounts\AccountsClient;
use Ryft\Api\AccountLinks\AccountLinksClient;
use Ryft\Api\ApplePay\ApplePayClient;
use Ryft\Api\Balances\BalancesClient;
use Ryft\Api\BalanceTransactions\BalanceTransactionsClient;
use Ryft\Api\Customers\CustomersClient;
use Ryft\Api\Disputes\DisputesClient;
use Ryft\Api\Events\EventsClient;
use Ryft\Api\Files\FilesClient;
use Ryft\Api\PaymentMethods\PaymentMethodsClient;
use Ryft\Api\PaymentSessions\PaymentSessionsClient;
use Ryft\Api\Payouts\PayoutsClient;
use Ryft\Api\PayoutMethods\PayoutMethodsClient;
use Ryft\Api\Persons\PersonsClient;
use Ryft\Api\PlatformFees\PlatformFeesClient;
use Ryft\Api\Subscriptions\SubscriptionsClient;
use Ryft\Api\Transfers\TransfersClient;
use Ryft\Api\Webhooks\WebhooksClient;

final class Ryft
{
    private $baseUrl;

    public $accounts;
    public $applePay;
    public $accountLinks;
    public $balances;
    public $balanceTransactions;
    public $customers;
    public $disputes;
    public $events;
    public $files;
    public $payouts;
    public $payoutMethods;
    public $paymentMethods;
    public $paymentSessions;
    public $persons;
    public $platformFees;
    public $subscriptions;
    public $transfers;
    public $webhooks;

    public function __construct(?string $secretKey = null)
    {
        $key = $secretKey;
        if ($key === null) {
            $key = $_ENV['RYFT_SECRET_KEY'];
        }

        if (!$key) {
            throw new \InvalidArgumentException('Secret key is required');
        }

        $this->baseUrl = Utils::determineBaseUrl($key);

        $httpClient = new HttpClient($this->baseUrl, $key);

        $this->accounts = new AccountsClient($httpClient);
        $this->accountLinks = new AccountLinksClient($httpClient);
        $this->applePay = new ApplePayClient($httpClient);
        $this->balances = new BalancesClient($httpClient);
        $this->balanceTransactions = new BalanceTransactionsClient($httpClient);
        $this->customers = new CustomersClient($httpClient);
        $this->disputes = new DisputesClient($httpClient);
        $this->events = new EventsClient($httpClient);
        $this->files = new FilesClient($httpClient);
        $this->payouts = new PayoutsClient($httpClient);
        $this->payoutMethods = new PayoutMethodsClient($httpClient);
        $this->paymentMethods = new PaymentMethodsClient($httpClient);
        $this->paymentSessions = new PaymentSessionsClient($httpClient);
        $this->persons = new PersonsClient($httpClient);
        $this->platformFees = new PlatformFeesClient($httpClient);
        $this->subscriptions = new SubscriptionsClient($httpClient);
        $this->transfers = new TransfersClient($httpClient);
        $this->webhooks = new WebhooksClient($httpClient);
    }
}
