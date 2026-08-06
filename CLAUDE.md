# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

Open-source PHP merchant SDK for the RyftPay REST API (`api.ryftpay.com` / `sandbox-api.ryftpay.com`), published as `ryftpay/ryft-php`. Zero runtime dependencies beyond `ext-curl`/`ext-json`; minimum PHP 8.0 (DEVELOPMENT.md's ">=7.1" is stale — 2.0.0 dropped PHP 7).

Sibling SDKs (`ryft-node`, `ryft-dotnet`, `ryft-python`, …) implement the same API surface. When adding an endpoint here, the matching merged PR in a sibling SDK is usually the best contract reference for paths, query params, and payload shapes.

## Commands

```bash
make install   # composer install
make test      # ./vendor/bin/phpunit tests
make lint      # phpcs PSR-12 check
make fmt       # phpcbf auto-fix formatting
```

Single test class or method:

```bash
./vendor/bin/phpunit tests/Ryft/Api/Transfers/TransfersClientTest.php
./vendor/bin/phpunit tests --filter testListWithParams
```

Tests are pure unit tests (mocked `HttpInterface`) — no network or credentials needed.

CI (`.github/workflows/build-and-test.yml`) runs `composer validate --strict` + phpunit across PHP 8.0–8.5. **CI does not lint**, and master has pre-existing phpcs violations (e.g. `Utils.php`, `PayoutMethodsClient.php`) — so run `make lint` but only fix violations in files you touched. No `composer.lock` is tracked; CI resolves dependencies fresh per PHP version.

## Architecture

Everything hangs off `Ryft\Ryft` ([lib/Ryft/Ryft.php](lib/Ryft/Ryft.php)): its constructor derives the base URL from the secret key prefix (`sk_sandbox_` → sandbox, `sk_` → production, via `Utils::determineBaseUrl`; falls back to the `RYFT_SECRET_KEY` env var), builds a single `HttpClient`, and exposes one public property per resource client (`$ryft->paymentSessions`, `$ryft->conversions`, …).

**Request flow**: resource client → `HttpClient::request(string $method, string $path, ?array $params, $body, ?string $account)` → cURL. GET `$params` become a query string; `$body` may be an `AbstractRequest` (auto-`toArray()`d) and is JSON-encoded **including nulls** (the API tolerates them); a non-null `$account` adds the `Account: <id>` header for sub-account calls. Non-2xx responses throw `RyftException`. Clients return decoded JSON as plain `array` — there are **no response models**, only request models.

**Per-resource layout** (`lib/Ryft/Api/{Resource}/`):
- `{Resource}Interface.php` — method signatures
- `{Resource}Client.php` — `final class`, implements the interface, holds `$basePath`
- `Models/*.php` — request objects extending `AbstractRequest`: array-data constructor with `?? null` defaults, getters/setters, explicit `toArray()`; nested API objects stay plain arrays

**Adding a new resource** (use `Conversions` or `PaymentSessions` as the template):
1. Create the interface, client, and any request models. Type-hint `HttpInterface` in the client constructor (the newer convention). List methods take optional args in API order and build `$params` with `if ($x !== null)` checks.
2. Wire into `Ryft.php` in three places (import, public property, constructor instantiation), keeping alphabetical order.
3. Tests in `tests/Ryft/Api/{Resource}/`: `{Resource}ClientTest.php` plus `MockData.php` (private const payloads + static getters). Each test mocks `HttpInterface` and asserts the exact `request()` call via `->with('METHOD', path, params, body, account)`.
4. PSR-4 autoload (`Ryft\` → `lib/Ryft`) picks up new namespaces — no composer.json change.

**Releases**: bump `Version.php` (`SDK_VERSION` is also sent in `User-Agent`/`ryft-sdk-*` headers) and add a `CHANGELOG.md` section in the existing style; recent PRs bump version in the feature PR itself.
