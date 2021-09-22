---
title: Services - Triggers
---

# Triggers

Triggers allow you to overwrite specific functionality of Core which would otherwise be hard to modify and require you to touch the internals. Triggers are simply names that are associated with a function that Core will call when a trigger is fired.

We ship with a few default triggers like `validateBlock`, `validateTransaction` and `acceptPeer`. If you are running a fork or working on a bridgechain and plan to overwrite them you should stick around as we go into more details.

## Prerequisites

Before we start, we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app, Container, Services } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.
* The `Container` import refers to a namespace that contains all of the container specific entities like binding symbols and interfaces.
* The `Services` import refers to a namespace that contains all of the core services. This generally will only be needed for type hints as Core is responsible for service creation and maintenance.

## Architecture

The Trigger service consists of two entities - the **Triggers** and **Action** class. The **Triggers** class is responsible for storing all triggers associated with their action. The **Action** class is responsible for storing all information about an action, like what function and hooks should be executed.

When you call a Trigger it will tell its associated Action to execute and return the output of it for further processing by the application. If you don't need the return value you can simple call a Trigger and ignore its return value.

## Creating A Trigger

Creating a trigger is as simple as passing in a name and a function to the `bind` method. The given function will be called when a trigger with the given name is requested.

```typescript
app
    .get<Services.Triggers.TriggerService>(Container.Identifiers.TriggerService)
    .bind("log", (message: string) => console.log(message));
```

## Triggering An Action

Calling a trigger is just as simple as creating it, simply pass in the name of the trigger to the `call` method together with any arguments that should be passed to it.

```typescript
app
    .get<Services.Triggers.TriggerService>(Container.Identifiers.TriggerService)
    .call("log", "Hello World");
```

## Hooking Into An Action

Sometimes it might be necessary to perform some tasks before or after an action is executed and also handle the case of a failure. There are 3 methods available that allow you to specify functions that should be called `before`, on `error` and `after` an action has been executed.

### The `before` hook

The `before` hook is executed before an action is executed. **This will always be executed.**

```typescript
app
    .get<Services.Triggers.TriggerService>(Container.Identifiers.TriggerService)
    .bind("log", (message: string) => console.log(message))
    .before(() => console.log("I am running before the action!"));
```

### The `error` hook

The `error` hook is executed when an exception is caught while the action is executed. **This will only be executed if the action itself does not handle the exception.**

```typescript
app
    .get<Services.Triggers.TriggerService>(Container.Identifiers.TriggerService)
    .bind("log", (message: string) => console.log(message))
    .error(() => console.log("I am running if the action encounters an error!"));
```

### The `after` hook

The `after` hook is executed after an action has been executed. **This will always be executed, even if any errors are encountered.**

```typescript
app
    .get<Services.Triggers.TriggerService>(Container.Identifiers.TriggerService)
    .bind("log", (message: string) => console.log(message))
    .after(() => console.log("I am running after the action!"));
```
