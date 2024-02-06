---
title: Architecture - Application Lifecycle
---

# Application Lifecycle

In order to be a productive developer with any application you need to feel confident in your understanding about how it is bootstrapped and how its internals work to avoid common pitfalls. Without confidence in the tools you're working with you won't be productive. To give you the required confidence, this document will provide you with a high-level overview about how Core is bootstrapped and what tasks it performs when it starts.

## Foundation

The foundation of Core consists of a handful of services that are necessary to provide a smooth developer experience. The first thing that happens when you start an instance of Core is that so called `bootstrappers` are executed in a specific order to register container bindings and services.

```typescript
-> RegisterErrorHandler
    -> RegisterBaseConfiguration
        -> RegisterBaseBindings
            -> RegisterBaseNamespace
                -> RegisterBasePaths
                    -> LoadEnvironmentVariables
                        -> LoadConfiguration
                            -> LoadCryptography
                                -> WatchConfiguration
                                    -> RegisterBaseServiceProviders
                                        -> LoadServiceProviders
```

1. We register an error handler which will help us to output better errors than what node.js provides out of the box.
2. We register the configuration service that will hold all of the configuration that is used across the application.
3. We register all of the base configuration like the token and network name.
4. We register a namespace that will be used for paths and environment variables to avoid naming collisions.
5. We register all of the system paths that are used for things like like logs, database stores or temporary files.
6. We load the environment variables in preparation for loading the application configuration.
7. We load the application configuration from a previously specified directory.
8. We load the cryptography configuration that matches the network specified during application launch.
9. We start a watcher that will reload Core if there are any changes to the configuration. **(this can be configured to not start)**
10. We register all of the base services like caching, queues and validation.
11. We load the service providers of all registered plugins, validate their configuration and store them for later use.

<x-alert type="info">
If there are any errors during the bootstrap process of the foundation the process will be terminated.
</x-alert>

## Application

The application part of the bootstrap process is a lot shorter than the foundational process as the majority of tasks have already been taken care of. All that is left is to register and boot the plugins that were previously loaded, again their service providers will serve as the entry point to this task.

```typescript
-> RegisterServiceProviders
    -> BootServiceProviders
```

1. We call the `register` method on all of the previously loaded plugins.
2. We call the `boot` method on all of the previously loaded plugins.

> If a plugin is marked as required through its service provider the process will be terminated if any errors are encountered.

## Service Providers

Service providers are the building blocks that are responsible for composing Core; we'll go into more details about them in later articles. In order to take full advantage.
