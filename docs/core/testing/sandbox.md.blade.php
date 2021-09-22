---
title: Testing - Sandbox
---

# Sandbox

The Sandbox is a new helper that ensures a unique environment for every test by generating a temporary network and crypto configuration. Doing this ensures that tests are more resilient by not relying on real production configurations which can change at any time.

The more important change with this is that you are working with a real instance of the application, not a cached instance that is shared through abusing the node module cache. This was a common pain point and could result in state being shared that you didn't want to be shared. This was also the cause why tests had to rely so heavily on mocks because you wouldn't have full access to the application and container.

## Creating the Sandbox

The creation of the Sandbox for your tests is the first step. This will give you a new instance of the application without modifying or starting them. This means that you start with a clean slate for every test and need to create the necessary bindings yourself. The result of this is a minimal test setup and reducing the possible points of failure by not registering things that are not needed for a test.

```typescript
import { Sandbox } from "@arkecosystem/core-test-framework";

const sandbox: Sandbox = new Sandbox();
```

Now that you've created the Sandbox, you can access the application through the `sandbox.app` property. This is a bare-bones application without any bindings or plugins.

### Core Configuration

After you've created the sandbox you have the ability to pass in a configuration for the Core instance. Usually you can skip this step but if you for example want to use your Bridgechain configuration you can do this before booting it.

```typescript
sandbox.withCoreOptions({
    flags?: {
        token: string;
        network: string;
        env?: string;
        paths?: Paths;
    };
    plugins?: {
        options?: Record<string, Record<string, any>>;
    };
    peers?: {};
    delegates?: {};
    environment?: {};
    app?: {};
});
```

### Crypto Configuration

The same way you might need a custom Core configuration you might need a custom Crypto configuration. It's as easy as for Core, simply pass in the configuration that should be used.

```typescript
sandbox.withCryptoOptions({
    flags: {
        network: string;
        premine: string;
        delegates: number;
        blocktime: number;
        maxTxPerBlock: number;
        maxBlockPayload: number;
        rewardHeight: number;
        rewardAmount: number;
        pubKeyHash: number;
        wif: number;
        token: string;
        symbol: string;
        explorer: string;
        distribute: boolean;
    };
    exceptions?: Types.JsonObject;
    genesisBlock?: Types.JsonObject;
    milestones?: Types.JsonObject;
    network?: Types.JsonObject;
});
```

<x-alert type="info">
If your tests don't really on a specific configuration you can skip this step and let it generate a temporary configuration which will be removed after the tests have finished.
</x-alert>

## Booting the Sandbox

After the Sandbox has been created, you'll need to boot it to finish the setup of the application. For that, you'll use the `boot` method which exposes the `app` argument which will be the object you'll interact with the most.

```typescript
await sandbox.boot(async ({ app }) => {
    await app.bootstrap({
        // Application configuration you wish to use.
    });

    // Do anything you want to do before starting the application.

    await app.boot();
});
```

After this has finished running you'll have a full application instance with all bindings you would expect. You can work with it the same way you work with the application inside of plugins you develop.

### Manually Registering Service Providers

When writes integration tests you will eventually run into an issue with code coverage collection. This happens because a Core instance is started from the `dist` folder where the JavaScript files reside.

In order to collect code coverage for your package you will need to manually register it from the `src` folder so that the coverage can be collected from the TypeScript files.

```typescript
await sandbox.boot(async ({ app }) => {
    await app.bootstrap({
        // Application configuration you wish to use.
    });

    sandbox.registerServiceProvider({
        name: "@arkecosystem/core-api",
        path: resolve(__dirname, "../../../../packages/core-api"),
        klass: ServiceProvider,
    });

    await app.boot();
});
```

<x-alert type="info">
You will only need this for integration tests as functional tests to not produce any coverage and unit tests work directly with the TypeScript files which means code coverage will be generated.
</x-alert>

## Disposing the Sandbox

After your tests pass, you'll obviously need to dispose of the sandbox to not pollute the local filesystem or have any relics that could interfere with future test runs. Disposing of the sandbox only requires a single line to remove  all temporary files and terminate all connections and servers.

```typescript
await sandbox.dispose();
```
