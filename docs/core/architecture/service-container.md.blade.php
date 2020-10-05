---
title: Service Container
---

# Service Container

The ARK Core service container is responsible for managing bindings, dependencies and dependency injection. Our container of choice is [InversifyJS](https://github.com/inversify/InversifyJS/) which describes itself as `A powerful and lightweight inversion of control container for JavaScript & Node.js apps powered by TypeScript`.

An IoC container uses a class constructor to identify and inject its dependencies. InversifyJS has a friendly API and encourages the usage of the best OOP and IoC practices. The wide variety of features it provides combined with its strictness make it a perfect choice for Core where type safety is important.

## Binding

The service container provides various methods of binding values to the container, we'll only look at the most common ones. Check out the [InversifyJS Features and API](https://github.com/inversify/InversifyJS/#the-inversifyjs-features-and-api) to get a full overview of what it is capable of.

### Binding Constant Values

A constant value is any value that does not change after its creation. **It should be bound once to the container and not be changed.**

```typescript
import { app, Container, Contracts } from "@arkecosystem/core-kernel";

app
    .bind<Contracts.Kernel.Log.Logger>(Container.Identifiers.LogService)
    .toConstantValue(new ConsoleLogger());
```

### Binding Dynamic Values

A dynamic value is any value that is the result of meeting a condition to be created or calling another function and returning its value.

```typescript
import { app, Container, Contracts } from "@arkecosystem/core-kernel";

app
    .bind<Contracts.Kernel.Log.Logger>(Container.Identifiers.LogService)
    .toDynamicValue((context: interfaces.Context) => { return new ConsoleLogger(); });
```

> Dynamic value bindings are a good fit for the builder or any other creational patterns.

### Binding Contracts to Implementations

An implementation bound to a contract is useful in cases where you wish to make use of dependency injection. You'll bind your `ConsoleLogger` implementation to the `ILogger` contract and InversifyJS will take care of returning an instance of the `ConsoleLogger` implementation when the `ILogger` contract is resolved.

```typescript
import { app, Container, Contracts } from "@arkecosystem/core-kernel";

app
    .bind<Contracts.Kernel.Log.Logger>(Container.Identifiers.LogService)
    .to(ConsoleLogger);
```

## Resolving

Now that we know how to create bindings we also need a way of resolving them from the container, lets take a look at how we can do that.

### Resolving any bindings

The `get` method can be used to resolve any previously created binding from the container. If the binding with the given name doesn't exist an exception will be thrown.

```typescript
import { app, Container, Contracts } from "@arkecosystem/core-kernel";

app.get<Contracts.Kernel.Log.Logger>(Container.Identifiers.LogService);
```

### Resolving Contracts to Implementations

The `resolve` method can be used if you want to get an instance of a class that depends on dependency injection.

```typescript
import { app, Contracts } from "@arkecosystem/core-kernel";

app.resolve<Contracts.Kernel.Log.Logger>(ConsoleLogger);
```

> You should rarely find yourself calling this, if you do end up in a situation where you call it for basically everything you should rethink the architecture of you plugin and how you interact with the container.

## Full Documentation

You can find the full documentation in the [InversifyJS](https://github.com/inversify/InversifyJS) repository with dozens of guides and best practices for how to work with the container and how to avoid common pitfalls.
