---
title: node-fetch
---

# node-fetch

This is an HTTP Client for the Platform SDK. The implementation makes use of [node-fetch](https://github.com/node-fetch/node-fetch) and adheres to the contracts laid out in the [specification](/docs/payvo-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/ArkEcosystem/platform-sdk/tree/master/packages/platform-sdk-http-node-fetch" />

## Installation

```bash
yarn add @payvo/sdk-http-node-fetch
```

## Usage

```typescript
import { Environment } from "@payvo/sdk-profiles";
import { Request } from "@payvo/sdk-http-node-fetch";

new Environment({ httpClient: new Request() });
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ark.io](mailto:security@ark.io). All security vulnerabilities will be promptly addressed.
