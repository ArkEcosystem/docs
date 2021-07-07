---
title: ky
---

# ky

This is an HTTP Client for the Platform SDK. The implementation makes use of [ky](https://github.com/sindresorhus/ky) and adheres to the contracts laid out in the [specification](/docs/payvo-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/PayvoHQ/sdk/tree/master/packages/sdk-http-ky" />

## Installation

```bash
yarn add @payvo/sdk-http-ky
```

## Usage

```typescript
import { Environment } from "@payvo/sdk-profiles";
import { Request } from "@payvo/sdk-http-ky";

new Environment({ httpClient: new Request() });
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ark.io](mailto:security@ark.io). All security vulnerabilities will be promptly addressed.
