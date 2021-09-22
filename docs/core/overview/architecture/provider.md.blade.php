---
title: Architecture - Service Provider
---

# Service Provider

Service providers are the building blocks that are responsible for composing Core. All of the internals are bootstrapped via service providers along with all plugins that you install. When you start Core, a lot of things are happening in the background, all of them are powered by service providers. So lets take a closer look at them.

## Writing a Service Provider

When you're developing a new plugin, the first thing you'll need to do is to write a service provider so that Core will be able to discover and register your plan. All service providers need to extend the `Support.ServiceProvider` which is an abstract class which provides some common basic functionality that is necessary for Core to do its job.

```typescript
import { Support } from "@arkecosystem/core-kernel";

export class ServiceProvider extends Support.ServiceProvider {
    public async register(): Promise<void> {
        console.log("Hey, I am preparing things!")
    }

    public async boot(): Promise<void> {
        console.log("Hey, I am starting things!")
    }

    public async dispose(): Promise<void> {
        console.log("Hey, I am stopping things!")
    }
}
```

### Registering a Service Provider

When registering a service provider, you should prepare everything that is needed for your plugin to function. This includes things like connections or the creation of servers. It's important to not start anything in this method so that other plugins can interact with your plugin before it is started.

Registering your service provider is as simple as adding `export * from "./service-provider";` to your `src/index.ts` file. Core will automatically grab the service provider and take care of any further tasks it has to perform to get your plugin up and running.

### Booting a Service Provider

When booting a service provider, you should establish all connections like with the database and start HTTP servers. Everything you initialize at this point of the lifecycle should later on be disposed of.

### Disposing a Service Provider

When disposing of a service provider, you should terminate all kinds of connections like database, cache store or running HTTP servers. It is recommended to also remove all container bindings if your plugin is transient to avoid collisions with container bindings that were created by a previous session.

<x-alert type="info">
It's important to terminate and destroy everything you started or created during the lifetime of your plugin to avoid the possibility of data corruption of your own or the data in core. This can result in a node no longer being able to operate and needing to perform a sync from 0 which takes several hours.
</x-alert>

## Deferring a Service Provider

If you wish to defer the booting of your plugin, you have 2 methods available to do so, `bootWhen` and `disposeWhen`.

Those methods do exactly what their names say, they determine when a plugin should be enabled or disabled. When the `bootWhen` returns `true` , it signals to Core that it should call the `boot` method. The inverse is that when the `disposeWhen` method returns `true` , it should call the `dispose` method.

> The `boot` and `dispose` methods are only called if their respective state is not already satisfied. This means `boot` won't be called if `boot` is already booted, the same goes for `dispose`, if it is already disposed then it won't be called.

It's important to note that the `bootWhen` and `disposeWhen` methods are called every time a block is received. If you rely on some of the data in the last received block, you should ensure to retrieve it from the state store and perform your checks.

### Example of deferred booting

If you want to defer the booting of your service provider until some condition is fulfilled, you can use the `bootWhen` method. In the below example, we simply wait for the `@arkecosystem/core-database` service provider to be booted before booting our own service provider.

```typescript
import { Support } from "@arkecosystem/core-kernel";

export class ServiceProvider extends Support.ServiceProvider {
    public async bootWhen(serviceProvider?: string): Promise<boolean> {
        return serviceProvider === "@arkecosystem/core-database";
    }
}
```
