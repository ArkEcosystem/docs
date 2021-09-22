---
title: Services - Cache
---

# Cache

Core ships with a cache abstraction that makes it easy to switch from an in-memory cache to a redis-based one. The default driver that is shipped provides an in-memory cache but using your own cache driver is just as easy.

## Prerequisites

Before we start, we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app, Container, Services } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.
* The `Container` import refers to a namespace that contains all of the container specific entities like binding symbols and interfaces.
* The `Services` import refers to a namespace that contains all of the core services. This generally will only be needed for type hints as Core is responsible for service creation and maintenance.

## Cache Usage

### Create an instance

```typescript
const cacheStore: CacheStore<string, string> = app.get<CacheStore<string, string>>(Container.Identifiers.CacheFactory)()
```

### Get all of the items in the cache

```typescript
cacheStore.all();
```

### Get the keys of the cache items

```typescript
cacheStore.keys();
```

### Get the values of the cache items

```typescript
cacheStore.values();
```

### Retrieve an item from the cache by key

```typescript
cacheStore.get("key");
```

### Retrieve multiple items from the cache by key

```typescript
cacheStore.getMany(["key1", "key2"]);
```

### Store an item in the cache for a given number of seconds

```typescript
cacheStore.put("key", "value", 60);
```

### Store multiple items in the cache for a given number of seconds

```typescript
cacheStore.putMany(["value1", "value2"], 60);
```

### Determine if an item exists in the cache

```typescript
cacheStore.has("key");
```

### Determine multiple items exist in the cache

```typescript
cacheStore.hasMany(["key1", "key2"]);
```

### Determine if an item doesn't exist in the cache

```typescript
cacheStore.missing("key");
```

### Determine multiple items don't exist in the cache

```typescript
cacheStore.missingMany(["key1", "key2"]);
```

### Store an item in the cache indefinitely

```typescript
cacheStore.forever("key", "value");
```

### Store multiple items in the cache indefinitely

```typescript
cacheStore.foreverMany(["value1", "value2"]);
```

### Remove an item from the cache

```typescript
cacheStore.forget("key");
```

### Remove multiple items from the cache

```typescript
cacheStore.forgetMany(["key1", "key2"]);
```

### Remove all items from the cache

```typescript
cacheStore.flush();
```

## Extending

As explained in a previous article, it is possible to extend Core services due to the fact that a Manager pattern is used. Lets go over a quick example of how you could implement your own cache store.

### Implementing the Driver

Implementing a new driver is as simple as importing the cache store contract that needs to be satisfied and implement the methods specified in it.

```typescript
import { Contracts } from "@arkecosystem/core-kernel";

export class MemoryCacheStore<K, T> implements Contracts.Cache.CacheStore<K, T> {
    private readonly store: Map<K, T> = new Map<K, T>();

    public async make(): Promise<CacheStore<K, T>> {
        return this;
    }

    public async all(): Promise<Array<[K, T]>> {
        return Array.from(this.store.entries());
    }

    public async keys(): Promise<K[]> {
        return Array.from(this.store.keys());
    }

    public async values(): Promise<T[]> {
        return Array.from(this.store.values());
    }

    public async get(key: K): Promise<T | undefined> {
        return this.store.get(key);
    }

    public async getMany(keys: K[]): Promise<Array<T | undefined>> {
        return keys.map((key: K) => this.store.get(key));
    }

    public async put(key: K, value: T, seconds?: number): Promise<boolean> {
        this.store.set(key, value);

        return this.has(key);
    }

    public async putMany(values: Array<[K, T]>, seconds?: number): Promise<boolean[]> {
        return Promise.all(values.map(async (value: [K, T]) => this.put(value[0], value[1])));
    }

    public async has(key: K): Promise<boolean> {
        return this.store.has(key);
    }

    public async hasMany(keys: K[]): Promise<boolean[]> {
        return Promise.all(keys.map(async (key: K) => this.has(key)));
    }

    public async missing(key: K): Promise<boolean> {
        return !this.store.has(key);
    }

    public async missingMany(keys: K[]): Promise<boolean[]> {
        return Promise.all([...keys].map(async (key: K) => this.missing(key)));
    }

    public async forever(key: K, value: T): Promise<boolean> {
        // This in-memory store doesn't offer any persistence.
    }

    public async foreverMany(values: Array<[K, T]>): Promise<boolean[]> {
        // This in-memory store doesn't offer any persistence.
    }

    public async forget(key: K): Promise<boolean> {
        this.store.delete(key);

        return this.missing(key);
    }

    public async forgetMany(keys: K[]): Promise<boolean[]> {
        return Promise.all(keys.map(async (key: K) => this.forget(key)));
    }

    public async flush(): Promise<boolean> {
        this.store.clear();

        return this.store.size === 0;
    }

    public async getPrefix(): Promise<string> {
        // This in-memory store doesn't offer any persistence.
    }
}
```

### Implementing the service provider

Now that we have implemented our memory driver for the cache service, we can create a service provider to register it.

```typescript
import { Container, Contracts, Providers, Services } from "@arkecosystem/core-kernel";

export class ServiceProvider extends Providers.ServiceProvider {
    public async register(): Promise<void> {
        const cacheManager: Services.Cache.CacheManager = this.app.get<Services.Cache.CacheManager>(
            Container.Identifiers.CacheManager,
        );

        await cacheManager.extend("memory", MemoryCacheStore);
    }
}
```

1. We retrieve an instance of the cache manager that is responsible for managing cache drivers.
2. We call the `extend` method with an asynchronous function which is responsible for creating the cache store instance.
