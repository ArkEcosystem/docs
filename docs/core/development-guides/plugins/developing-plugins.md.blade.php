---
title: Plugins Guide - Developing Plugins
---

# Plugin Development

Simple overview of proper structure; e.g. have a plugin.ts file that only registers / deregisters the plugin and calls for example startServer that will handle the rest. So you end up with a server.ts file, folder structure for api endpoints, things like that.

## Introduction

Plugins are a way off adding functionality to Core or altering existing behaviors. They can be anything from adding a new API endpoint, error trackers to new transaction types to expand on the capabilities of your blockchain.

This guide will walk you through the process of understanding how plugins are build, discovered and distributed for use by end-users and developers.

## Discovery

When Core starts it will look at the `app.json` configuration for a key called `plugins`. This key contains a list of plugins with their package name and options that should be used to configure and run it. Let's have a look at the default `app.js` that ships with Core to understand what is happening.

```typescript
module.exports = {
    plugins: [
        {
            package: "@arkecosystem/core-transactions",
        },
        {
            package: "@arkecosystem/core-state",
        },
        {
            package: "@arkecosystem/core-database",
        },
        {
            package: "@arkecosystem/core-database-postgres",
            options: {
                connection: {
                    host: process.env.CORE_DB_HOST,
                    port: process.env.CORE_DB_PORT,
                    database: process.env.CORE_DB_DATABASE,
                    user: process.env.CORE_DB_USERNAME,
                    password: process.env.CORE_DB_PASSWORD,
                },
            },
        },
        {
            package: "@arkecosystem/core-transaction-pool",
        },
        {
            package: "@arkecosystem/core-p2p",
        },
        {
            package: "@arkecosystem/core-blockchain",
        },
        {
            package: "@arkecosystem/core-api",
        },
        {
            package: "@arkecosystem/core-webhooks",
        },
        {
            package: "@arkecosystem/core-forger",
        },
        {
            package: "@arkecosystem/core-snapshots",
        },
    ],
};
```

Based on this configuration the plugins will be registered and booted in the following order from top to bottom.

```bash
-> @arkecosystem/core-transactions
    -> @arkecosystem/core-state
        -> @arkecosystem/core-database
            -> @arkecosystem/core-database-postgres
                -> @arkecosystem/core-transaction-pool
                    -> @arkecosystem/core-p2p
                        -> @arkecosystem/core-blockchain
                            -> @arkecosystem/core-api
                                -> @arkecosystem/core-webhooks
                                    -> @arkecosystem/core-forger
                                        -> @arkecosystem/core-snapshots
```

Internally the discovery and integration into Core of any plugin consists of five steps.

1. The service provider is loaded and stored in-memory.
2. The package manifest is loaded from the `package.json` file and stored in-memory.
3. The plugin configuration and defaults are loaded through the service provider.
4. The plugins `register` method is executed to prepare for the booting process.
5. The plugins `boot` method is executed and the plugin becomes active.

As you have probably figured out by now, the whole lifecycle of a plugin revolves around [service providers](/docs/core/architecture/service-provider) about which we've talked in earlier documents when looking at the architecture of Core.

## Service Providers

[Service providers](/docs/core/architecture/service-provider) are the building blocks that are responsible for composing Core. The sole responsibility of a service provider is to create bindings in the service container and manage inform Core about what should happen with your plugin at certain points of the application lifecycle.

A service provider always contains 3 methods: `register`, `boot` and `dispose`. To learn more about the structure and purpose of service providers, check out [their documentation](/docs/core/architecture/service-provider).

## Naming Conventions

If you've ever gone through the source code of Core you will notice a recurring pattern of the same method names and naming conventions. If you work with classes that can `get` and `set` values you will generally find methods named like `get`, `set`, `has`, `forget` and `flush`. Those method names are tried to be kept more closely to human language and use less technical terms; for example you would ask someone to forget about an appointment, not delete an appointment.

When naming classes and methods you should always encapsulate the provided functionality in a short and easy to remember name and be consistent with it across your project. Having methods named `has`, `exists` or `contains` across a project results in degraded developer experience as the cognitive load is increased by having to remember those different method names even though they all perform the same tasks. **JavaScript standard libraries already have inconsistent naming so we shouldn't add to that by using different or complex names across our project.**

## Structure

Core isn't very opinionated when it comes to the structure of plugins. The only requirement is that your plugin exports a class called `ServiceProvider` which serves as the entry point to your plugin which Core will use to register and expose it.

The structure of plugins in general is up to the developer but Core itself tries to stick to consistent structures across all plugins so that working with them is easier by always knowing what structures you can expect and where to find files. Let's look at the basic structure of something like an HTTP server as Core contains quite a few of them across different plugins.

```bash
index.ts
service-provider.ts
./server
    index.ts
    ./blocks
        controller.ts
        index.ts
        methods.ts
        routes.ts
        schema.ts
        transformer.ts
```

1. The `index.ts` file is responsible for exporting the `ServiceProvider` and whatever else things need to be exported like interfaces.
2. The `service-provider.ts` file exports the `ServiceProvider` that is used by Core to register and expose the plugin.
3. The `server/index.js` file exports a function that will start a server. It will be imported by the `service-provider.ts` file and create some container bindings in preparation of starting the server.
4. The `server/blocks/index.ts` file is responsible for registering the module, in this case `block` with the hapi.js server.
5. The `server/blocks/controller.ts` file exports a class that contains methods that will be used as request handlers by hapi.js. **We use a controller to make use of dependency injection which will grant us easy access to all container bindings.**
6. The `server/blocks/methods.ts` file exports [server methods](https://hapi.dev/api/?v=18.4.0#server.methods) which can be used by handlers exposed through the controller. Those methods come with built-in caching provided by hapi.js.
7. The `server/blocks/routes.ts` file registers routes with the hapi.js server. Those routes are simply paths that are associated with a handler from the controller.
8. The `server/blocks/schema.ts` file exports [joi](https://github.com/hapijs/joi) schemas that are used to validate the data of incoming requests, think query parameters and form parameters that need to be present in a specific format.
9. The `server/blocks/transformer.ts` file exports a single function that is responsible for transforming the data, in this case a `block`, into an easy to work with format. It's easier to work with something like a unix timestamp instead of having to work with a genesis timestamp and having to calculate offsets on the client side.

// TBD: add links to plugin development series on medium once ready

> If you are working on a monolithic plugin which behavior can't be broken down into smaller entities that compose the full functionality than something like [Domain-driven design](https://en.wikipedia.org/wiki/Domain-driven_design) might be the better choice for an easier to maintain codebase.

## Generators

// TBD: add yeoman generator instructions once it is implemented

## Distribution

There are several ways of distributing Core plugins but the recommended way is to publish your plugin to the [npm registry](https://www.npmjs.com/) through the [npm](https://docs.npmjs.com/cli/publish) or [yarn](https://yarnpkg.com/lang/en/docs/publishing-a-package/) command line interfaces that are available for macOS, linux and windows.

// TBD: add on-chain instructions once it is implemented
