# Ryft PHP

[![build](https://github.com/RyftPay/ryft-php/actions/workflows/build-and-test.yml/badge.svg)](https://github.com/RyftPay/ryft-php/actions/workflows/build-and-test.yml)
[![PHP version](https://badge.fury.io/ph/ryftpay%2Fryft-php.svg)](https://badge.fury.io/ph/ryftpay%2Fryft-php)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

## Installation

```sh
# with composer
composer install ryftpay/ryft-php
```

## Usage
    
The SDK must be configured with your account's secret key, available in the Ryft Dashboard. The SDK will automatically determine the environment based on the provided key. For example, `sk_sandbox...` will point to `sandbox`, while `sk_live` will point to `production`.

### Importing the SDK

You can access the SDK and all of the methods and types by importing it as follows:

```php
<?php
use Ryft\Ryft;
```

### Initialising with a secret key

You can pass your secret key via the `Config` in the SDK constructor. For example: 

```php
<?php
$ryft = new Ryft('sk_sandbox_);
```

### Initialising with environment variables

You can set the following environment variable, and the SDK will automatically pick it up:

* `RYFT_SECRET_KEY`

> [!NOTE]
> If you use env variables you don't have to pass your secret key to the config. This is handled for you

## Basic Example

```php
<?php

use Ryft\Ryft;

$ryft = new Ryft('sk_sandbox_....');

$response = $ryft->accounts->list();

print_r($response);
```
