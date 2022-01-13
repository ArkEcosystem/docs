---
title: fetch
---

# fetch

This is an HTTP Client for the Platform SDK. The implementation makes use of [cross-fetch](https://github.com/lquixada/cross-fetch) and adheres to the contracts laid out in the [specification](/docs/payvo-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/PayvoHQ/sdk/tree/master/packages/fetch" />

## Installation

```bash
yarn add @payvo/sdk-fetch
```

## Usage

```typescript
import { Environment } from "@payvo/sdk-profiles";
import { Request } from "@payvo/sdk-fetch";

new Environment({ httpClient: new Request() });
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@payvo.com](mailto:security@payvo.com). All security vulnerabilities will be promptly addressed.
