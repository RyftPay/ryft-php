# Changelog

## 2.1.0

This release includes support for our new Conversions API
 - create, retrieve and list conversions, and fetch indicative conversion rates

## 2.0.1

This release fixes base URL detection so production keys route to the live API
 - production keys (`sk_...`) previously routed to the sandbox environment
 - invalid keys (no `sk_` prefix) now throw an `InvalidArgumentException`

## 2.0.0

This release drops support for PHP 7 (now end-of-life)
 - the minimum supported PHP version is now 8.0

## 1.1.0

This release includes support for our new InPerson and Terminal APIs
 - see https://github.com/RyftPay/ryft-php/pull/3 for changes

Useful docs:
 - https://developer.ryftpay.com/docs/integrate/in-person/
 - https://api-reference.ryftpay.com/#tag/In-Person-Products
 - https://api-reference.ryftpay.com/#tag/In-Person-SKUs
 - https://api-reference.ryftpay.com/#tag/In-Person-Orders
 - https://api-reference.ryftpay.com/#tag/In-Person-Locations
 - https://api-reference.ryftpay.com/#tag/In-Person-Terminals

## 1.0.1

This release includes a fix for ensuring all requests are correctly serialized
 - see https://github.com/RyftPay/ryft-php/pull/1

## 1.0.0

Initial Release!
