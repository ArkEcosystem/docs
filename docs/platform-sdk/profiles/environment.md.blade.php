---
title: Environment
---

# Environment

### Create a new environment

```typescript
import { ARK } from "@arkecosystem/platform-sdk-ark";
import { Environment } from "@arkecosystem/platform-sdk-profiles";
import { Request } from "@arkecosystem/platform-sdk-http-bent";

new Environment({
    coins: { ARK },
    httpClient: new Request(),
    storage: "localstorage"
});
```

## Profiles

<x-alert type="info">
These methods are accessible through `env.profiles()` which exposes a `ProfileRepository` instance.
</x-alert>

### Get a list of all profiles

```typescript
env.profiles().all();
```

### Find the profile for the given ID

```typescript
env.profiles().findById("uuid");
```

### Create a new profile for the given name

```typescript
env.profiles().create("John Doe");
```

### Forget the profile for the given ID

```typescript
env.profiles().forget("uuid");
```
