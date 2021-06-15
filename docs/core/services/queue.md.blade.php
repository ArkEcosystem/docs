---
title: Services - Queue
---

# Queue

Queues are an extremely powerful tool when you have thousands of tasks that could block the main thread for no reason, as they could be simply processed in the background.

The default driver that is shipped provides an in-memory queue that is capable of processing thousands of jobs but using your own cache driver is just as easy.

## Prerequisites

Before we start, we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app, Container, Services } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.
* The `Container` import refers to a namespace that contains all of the container specific entities like binding symbols and interfaces.
* The `Services` import refers to a namespace that contains all of the core services. This generally will only be needed for type hints as Core is responsible for service creation and maintenance.

## Queue Usage

### Create an instance

```typescript
const queue: Queue = app.get<QueueFactory>(Container.Identifiers.QueueFactory)();
```

### Start the queue

```typescript
queue.start();
```

### Stop the queue

```typescript
queue.stop();
```

### Pause the queue

```typescript
queue.pause();
```

### Resume the queue

```typescript
queue.resume();
```

### Clear the queue

```typescript
queue.clear();
```

### Push a new job onto the default queue

```typescript
queue.push(() => console.log("Hello World");
```

### Push a new job onto the default queue after a delay

```typescript
queue.later(60, () => console.log("Hello World"));
```

### Push an array of jobs onto the default queue

```typescript
queue.bulk([
    () => console.log("Hello World"),
    () => console.log("Hello World")
]);
```

### Get the size of the given queue

```typescript
queue.size();
```

## Extending

As explained in a previous article, it is possible to extend Core services due to the fact that a Manager pattern is used. Lets go over a quick example of how you could implement your own queue.

### Implementing the Driver

Implementing a new driver is as simple as importing the queue contract that needs to be satisfied and implement the methods specified in it.

<x-alert type="info">
In this example we will use [p-queue](https://github.com/sindresorhus/p-queue) which is a promise-based queue with concurrency control.
</x-alert>

```typescript
import { Contracts } from "@arkecosystem/core-kernel";

export class MemoryQueue implements Contracts.Queue.Queue {
    private readonly queue: PQueue = new PQueue({ autoStart: false });

    public async start(): Promise<void> {
        await this.queue.start();
    }

    public async stop(): Promise<void> {
        await this.queues.delete(queue);
    }

    public async pause(): Promise<void> {
        await this.queue.pause();
    }

    public async resume(): Promise<void> {
        await this.queue.resume();
    }

    public async clear(): Promise<void> {
        await this.queue.clear();
    }

    public async push<T = any>(fn: () => PromiseLike<T>): Promise<void> {
        this.queue.add(fn);
    }

    public async later<T>(delay: number, fn: () => PromiseLike<T>): Promise<void> {
        setTimeout(() => this.push(fn), delay);
    }

    public async bulk<T>(functions: (() => PromiseLike<T>)[]): Promise<void> {
        this.queue.addAll(functions);
    }

    public size(): number {
        return this.queue.size;
    }
}
```

### Implementing the service provider

Now that we have implemented our memory driver for the queue service we can create a service provider to register it.

```typescript
import { Container, Contracts, Providers, Services } from "@arkecosystem/core-kernel";

export class ServiceProvider extends Providers.ServiceProvider {
    public async register(): Promise<void> {
        const cacheManager: Services.Queue.QueueManager = this.app.get<Services.Queue.QueueManager>(
            Container.Identifiers.QueueManager,
        );

        await cacheManager.extend("memory", MemoryQueue);
    }
}
```

1. We retrieve an instance of the cache manager that is responsible for managing queue drivers.
2. We call the `extend` method with an asynchronous function which is responsible for creating the queue instance.
