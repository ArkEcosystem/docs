---
title: Services - Pipeline
---

# Pipeline

Pipelines are an implementation of the pipeline pattern. It allows you to easily compose sequential stages by chaining stages. The implementation consists of 2 parts, the Pipeline and Stage(s).

In this article we'll look into what they do, how to use them, what ups and downs there are and what the recommended way to use them is to get the most out of your pipeline and stages for your use-cases.

<x-alert type="info">
All stage functions and stage handlers can be synchronous and asynchronous. By default, we recommend to use the **process** method to process all stages sequentially with async/await. If you wish to process all stages synchronously then you can use the **processSync** method.
</x-alert>

## Prerequisites

Before we start, we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app, Container, Services } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.
* The `Container` import refers to a namespace that contains all of the container specific entities like binding symbols and interfaces.
* The `Services` import refers to a namespace that contains all of the core services. This generally will only be needed for type hints as Core is responsible for service creation and maintenance.

## Creating a Pipeline

When you have the need for a new pipeline, you'll need to resolve it through the application in order to ensure that it has all of the required dependencies for it to function injected into it.

```typescript
const pipeline: Pipeline = app.get<PipelineFactory>(Container.Identifiers.PipelineFactory)();
```

## **Stage Functions**

The first way is to use functions that serve as stages. This is a more JavaScript way of doing things but won't give you full access to the application and its bindings.

```typescript
import { Services } from "@arkecosystem/core-kernel";

const removeDash = async (payload: string) => payload.replace("_", "");
const removeUnderscore = async (payload: string) => payload.replace("-", " ");

console.log(
    await pipeline
        .pipe(removeDash)
        .pipe(removeUnderscore)
        .process("_Hello-World")
); // Hello World
```

## Stage Handlers

The second way is to use class-based handlers. The implementation of those handlers is up to for the most part but there are 2 ways to implement and use them.

### Container Resolution

If your stage handler needs full access to the application, you should resolve it through the container which will give you full access to the application and its bindings. This is the recommended approach for handlers that work with application internals as you'll be able to make use of dependency injection.

```typescript
import { Container } from "@arkecosystem/core-kernel";

@Container.injectable()
class RemoveDash implements Stage {
    async process(payload: string) {
        return payload.replace("_", "");
    }
}

@Container.injectable()
class RemoveUnderscore implements Stage {
    async process(payload: string) {
        return payload.replace("-", " ");
    }
}

console.log(
    await pipeline
        .pipe(app.resolve(RemoveDash))
        .pipe(app.resolve(RemoveUnderscore))
        .process("_Hello-World")
); // Hello World
```

### Class Instantiation

If your stage handler is fairly simple and doesn't need access to any application bindings, you can use a simple ES6 class, instantiate it and pass the instance to the pipeline. The advantage of this approach is that you are in full of control of the class instantiation and instance management.

```typescript
class RemoveDash implements Stage {
    async process(payload: string) {
        return payload.replace("_", "");
    }
}

class RemoveUnderscore implements Stage {
    async process(payload: string) {
        return payload.replace("-", " ");
    }
}

console.log(
    await pipeline
        .pipe(new RemoveDash())
        .pipe(new RemoveUnderscore())
        .process("_Hello-World")
); // Hello World
```
