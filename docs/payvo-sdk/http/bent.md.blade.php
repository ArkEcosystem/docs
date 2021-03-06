---
title: bent
---

# bent

This is an HTTP Client for the Platform SDK. The implementation makes use of [bent](https://github.com/mikeal/bent) and adheres to the contracts laid out in the [specification](/docs/payvo-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/PayvoHQ/sdk/tree/master/packages/sdk-http-bent" />

## Installation

```bash
yarn add @payvo/sdk-http-bent
```

## Usage

```typescript
import { Environment } from "@payvo/sdk-profiles";
import { Request } from "@payvo/sdk-http-bent";

new Environment({ httpClient: new Request() });
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ark.io](mailto:security@ark.io). All security vulnerabilities will be promptly addressed.
