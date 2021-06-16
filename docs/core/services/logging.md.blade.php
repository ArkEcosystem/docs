---
title: Services - Logging
---

# Logging

When working with any application, the necessity for logging is there and nothing is worse then missing or bad logging. Core provides developers with the ability to specify what should be logged and if necessary, to create their own logger for things like remote log storage.

> The default logger that ships with ARK Core is an implementation of [pino](https://github.com/pinojs/pino) with support for console and file streams.

## Prerequisites

Before we start, we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.

## Usage

The application logger is accessible through the `log` property of the `app` instance. The logger contract that is provided by ARK Core follows the log levels defined in the [RFC 5424 specification](https://tools.ietf.org/html/rfc5424).

### Get an instance of the Logger

```typescript
const logger: Contracts.Kernel.Log.Logger = app.get<Contracts.Kernel.Log.Logger>(Container.Identifiers.LogService)
```

### Logging an `emergency` message

```typescript
logger.emergency('Hello World');
```

### Logging an `alert` message

```typescript
logger.alert('Hello World');
```

### Logging a `critical` message

```typescript
logger.critical('Hello World');
```

### Logging an `error` message

```typescript
logger.error('Hello World');
```

### Logging a `warning` message

```typescript
logger.warning('Hello World');
```

### Logging a `notice` message

```typescript
logger.notice('Hello World');
```

### Logging an `info` message

```typescript
logger.info('Hello World');
```

### Logging a `debug` message

```typescript
logger.debug('Hello World');
```

## Extending

As explained in a previous article, it is possible to extend Core services due to the fact that a Manager pattern is used. Lets go over a quick example of how you could implement your own logger.

### Implementing the Driver

Implementing a new driver is as simple as importing the logger contract that needs to be satisfied and implement the methods specified in it.

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

### Implementing the service provider

Now that we have implemented our console driver for the log service, we can create a service provider to register it.

```typescript
import { Container, Contracts, Providers, Services } from "@arkecosystem/core-kernel";

export class ServiceProvider extends Providers.ServiceProvider {
    public async register(): Promise<void> {
        const logManager: Services.Log.LogManager = this.app.get<Services.Log.LogManager>(
            Container.Identifiers.LogManager,
        );

        await logManager.extend("console", async () =>
            this.app.resolve<Contracts.Log.Logger>(ConsoleLogger).make(this.config().all()),
        );

        logManager.setDefaultDriver("console");
    }
}
```

1. We retrieve an instance of the log manager that is responsible for managing log drivers.
2. We call the `extend` method with an asynchronous function which is responsible for creating the logger instance.
3. We call the `setDefaultDriver` method which will tell Core to use `console` as the new default logger.

> If you do not call `setDefaultDriver` you'll need to manually retrieve the console logger instance via `app.get<LogManager>(LogManager).driver("console")`.
