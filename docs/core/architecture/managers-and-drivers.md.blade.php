---
title: Managers and Drivers
---

# Managers and Drivers

ARK Core makes use of a variant of the Builder pattern, known as the Manager pattern, to provide a high degree of extensibility together with a delightful developer experience through expressive and simple to understand code to create your own set of drivers to alter how ARK Core behaves for certain features.

> Throughout this article we will reference the Builder pattern as Manager pattern as ARK Core internally uses the wording `Manager` for all the classes that manage the state of drivers.

### Manager

In simple terms a Manager is a class that _manages_ the state of the drivers for a specific feature. Think for example about a caching feature that needs to scale up as more data is stored. You might ship a default `ArrayDriver` driver which stores data in-memory and is sufficient for a few thousand sets of data but becomes slow over time.

What the Manager pattern allows you to do is to simply create a new driver, for example `RedisDriver`, based on a given implementation contract, register it with ARK Core and reap the benefits of increased performance.

**This is extremely useful for extending or altering how ARK Core behaves and what it is capable of doing, all done through the use of managers and drivers with a common public API.**

### Driver

A driver is an extension to how a Manager exposes and manages a feature. We could for example ship a `ConsoleLogger` but as our project grows we need file logging so we implement a `WinstonLogger`, but a few months later our project grew so much that we need remote log storage so we implement a `LogstashLogger`.

All of them are interchangeable as they have to satisfy the same implementation contract and pass the same test suite. The Manager pattern makes all of this possible and makes it as simple as possible to swap out critical parts to suite your specific use-case and needs.

## Creating a Manager

ARK Core comes with a variety of managers out of the box such as `CacheManager`, `LogManager` and `ValidationManager`. Lets learn how to create your own manager and how to register to expose it to other plugins.

We'll create the `LogManager` from scratch to have a real-world example. Lets set up some boilerplate and then we'll break it down step-by-step.

```typescript
import { Contracts, Support } from "@arkecosystem/core-kernel";
import { ConsoleLogger } from "./drivers";

export class LogManager extends Support.Manager<Contracts.Logger> {
    protected async createConsoleDriver(): Promise<Contracts.Logger> {
        return this.app.resolve(ConsoleLogger).make();
    }

    protected getDefaultDriver(): string {
        return "console";
    }
}
```

1. We create a new class which ideally should be named as `FeatureManager`, in this case the feature is `Log` which is responsible for all logging functionality so we name the class `LogManager`.
2. We extend the `Support.Manager` class an inherit all of its methods and let it know that is responsible for managing logger drivers by type hinting `Contracts.Logger`. You can take a look at [Support.Manager](managers-and-drivers.md) on GitHub to learn more about it.
3. We create a `createConsoleDriver` method which will be responsible for instantiating our console-specific driver implementation.
4. We create a `getDefaultDriver` method which in our case returns `console` as the desired default driver.

## Creating a Driver

Implementing a logger driver is as simple as implementing a manager. The logger contract that is provided by ARK Core follows the log levels defined in the [RFC 5424 specification](https://tools.ietf.org/html/rfc5424). Again we'll setup some boilerplate and then break it down.

```typescript
import { Contracts } from "@arkecosystem/core-kernel";

export class ConsoleLogger implements Contracts.Logger {
    protected logger: Console;

    public async make(): Promise<Contracts.Logger> {
        this.logger = console;

        return this;
    }

    public emergency(message: any): void {
        this.logger.error(message);
    }

    public alert(message: any): void {
        this.logger.error(message);
    }

    public critical(message: any): void {
        this.logger.error(message);
    }

    public error(message: any): void {
        this.logger.error(message);
    }

    public warning(message: any): void {
        this.logger.warn(message);
    }

    public notice(message: any): void {
        this.logger.info(message);
    }

    public info(message: any): void {
        this.logger.info(message);
    }

    public debug(message: any): void {
        this.logger.debug(message);
    }
}
```

1. We create a new class which ideally should be named as `ImplementationType`, in this case the implementation is `Console` and the type is `Logger`, which refers to the overall `Log` feature.
2. We implement the `Contracts.Logger` contract which defines what methods a logger needs to implement and expose. You can take a look at [Contracts.Logger](managers-and-drivers.md) on GitHub to learn more about it.
3. We create a `make` method which is called by the `LogManager` to do all of the setup that is needed to get the driver up and running.
4. We implement all of the method that are specified in `Contracts.Logger` to satisfy the contract and avoid issues with how it behaves.

## Using a Manager

The final step is to stitch together the manager and driver and bind it to the service container. We'll use a service provider for this, about which we've learned in a previous article.

```typescript
import { Container, Providers } from "@arkecosystem/core-kernel";
import { LogManager } from "./manager";

export class ServiceProvider extends Providers.ServiceProvider {
    public async register(): Promise<void> {
        this.app
            .bind<LogManager>(Container.Identifiers.LogManager)
            .to(LogManager)
            .inSingletonScope();

        await this.app
            .get<LogManager>(Container.Identifiers.LogManager)
            .boot();

        this.app
            .bind(Container.Identifiers.LogService)
            .toDynamicValue((context: interfaces.Context) =>
                context.container.get<LogManager>(Container.Identifiers.LogManager).driver(),
            );
    }
}
```

1. We create a new binding inside the service container by calling the `bind` method with `Container.Identifiers.LogManager` and the `to` method with `LogManager`. This will let the container know that we wish to receive an instance of `LogManager` when we later on call `get(Container.Identifiers.LogManager)`.
2. We resolve the `LogManager` from the service container via `Container.Identifiers.LogManager` and call the `boot` method to create an instance of the previously configured default driver, in our case the `ConsoleLogger`.
3. We create a new binding inside the service container by calling the `bind` method with `Container.Identifiers.LogService` and the `toDynamicValue` with a function call that will return an instance of the default driver that we instantiated in the previous step.

> It is important to use the container identifiers provided by `core-kernel` if you wish to extend or overwrite internal functionality. Symbols are unique and used to avoid name collisions, using the string value of a Symbol will result in duplicate bindings.
