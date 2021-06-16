---
title: Services - Validation
---

# Validation

More often than not you will have the need to validate some data that is passed to your plugin, like configuration or data that should be persisted where an invalid format could have serious consequences.

The default validator that ships with Core implements [@hapi/joi](https://github.com/hapijs/joi) under the hood to provide an easy to use syntax for building validation schemas.

## Prerequisites

Before we start, we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app, Container, Services } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.
* The `Container` import refers to a namespace that contains all of the container specific entities like binding symbols and interfaces.
* The `Services` import refers to a namespace that contains all of the core services. This generally will only be needed for type hints as Core is responsible for service creation and maintenance.

## Usage

### Get an instance of the Validator

```typescript
const validator: Services.Validation.ValidationService = app
    .get<Services.Validation.ValidationService>(Container.Identifiers.ValidationService)
```

### Run the validator's rules against its data

```typescript
validator.validate({ username: "johndoe" }, Joi.object({ username: Joi.string() }));
```

### Determine if the data passes the validation rules

```typescript
validator.passes();
```

### Determine if the data fails the validation rules

```typescript
validator.fails();
```

### Get the failed validation rules

```typescript
validator.failed();
```

### Get all of the validation error messages

```typescript
validator.errors();
```

### Returns the data which was valid

```typescript
validator.valid();
```

### Returns the data which was invalid

```typescript
validator.invalid();
```

### Get the data under validation

```typescript
validator.attributes();
```

## Extending

As explained in a previous article it is possible to extend Core services due to the fact that a Manager pattern is used. Lets go over a quick example of how you could implement your own validator.

### Implementing the Driver

Implementing a new driver is as simple as importing the validator contract that needs to be satisfied and implement the methods specified in it.

<x-alert type="info">
In this example we will use [Joi](https://github.com/hapijs/joi) which is a developer experienced focus validation library.
</x-alert>

```typescript
import { Contracts } from "@arkecosystem/core-kernel";

export class MemoryValidator implements Contracts.Validation.Validator {
    private data: JsonObject;
    private resultValue: JsonObject | undefined;
    private resultError: ValidationErrorItem[] | undefined;

    public validate(data: JsonObject, schema: object): void {
        this.data = data;

        const { error, value } = (schema as AnySchema).validate(this.data);

        this.resultValue = error ? undefined : value;

        if (error) {
            this.resultError = error.details;
        }
    }

    public passes(): boolean {
        return !this.resultError;
    }

    public fails(): boolean {
        return !this.passes();
    }

    public failed(): Record<string, string[]> {
        return this.groupErrors("type");
    }

    public errors(): Record<string, string[]> {
        return this.groupErrors("message");
    }

    public valid(): JsonObject {
        return this.resultValue;
    }

    public invalid(): JsonObject {
        const errors: JsonObject = {};

        for (const error of this.resultError) {
            errors[error.context.key] = error.context.value;
        }

        return errors;
    }

    public attributes(): JsonObject {
        return this.data;
    }

    private groupErrors(attribute: string): Record<string, string[]> {
        const errors: Record<string, string[]> = {};

        for (const error of this.resultError) {
            const errorKey: string | number = error.path[0];

            if (!Array.isArray(errors[errorKey])) {
                errors[errorKey] = [];
            }

            errors[errorKey].push(error[attribute]);
        }

        return errors;
    }
```

### Implementing the service provider

Now that we have implemented our memory driver for the validation service we can create a service provider to register it.

```typescript
import { Container, Contracts, Providers, Services } from "@arkecosystem/core-kernel";

export class ServiceProvider extends Providers.ServiceProvider {
    public async register(): Promise<void> {
        const validationManager: Services.Validation.ValidationManager = this.app.get<Services.Validation.ValidationManager>(
            Container.Identifiers.ValidationManager,
        );

        await validationManager.extend("memory", async () =>
            this.app.resolve<Contracts.Validation.ValidationManager>(MemoryValidator).make(this.config().all()),
        );

        validationManager.setDefaultDriver("memory");
    }
}
```

1. We retrieve an instance of the validation manager that is responsible for managing validation drivers.
2. We call the `extend` method with an asynchronous function which is responsible for creating the validator instance.
3. We call the `setDefaultDriver` method which will tell Core to use `memory` as the new default validator.

> If you do not call `setDefaultDriver` you'll need to manually retrieve the memory store cache instance via `app.get<ValidationManager>(ValidationManager).driver("memory")`.
