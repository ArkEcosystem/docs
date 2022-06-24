---
title: fetch
---

# fetch

This is an HTTP Client for the Platform SDK. The implementation makes use of [cross-fetch](https://github.com/lquixada/cross-fetch) and adheres to the contracts laid out in the [specification](/docs/platform-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/ArdentHQ/platform-sdk/tree/master/packages/fetch" />

## Installation

```bash
yarn add @ardenthq/sdk-fetch
```

## Usage

```typescript
import { Environment } from "@ardenthq/sdk-profiles";
import { Request } from "@ardenthq/sdk-fetch";

new Environment({ httpClient: new Request() });
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ardenthq.com](mailto:security@ardenthq.com). All security vulnerabilities will be promptly addressed.
