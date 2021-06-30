---
title: Development Setup - Node Running Modes
---

# Core Run Modes (ADN | Devnet)

## Available Running Modes

Core Server can be run in the following general modes:

* **Relay Mode** - listens to blockchain traffic, replicates and validates block data
* **Forger Mode** - creates new blocks and broadcasts them via relay nodes to the p2p network
* **Relay and Forger Mode** - both run under a single process

### How To Start a Node?

If you want to start a node which consists of a `relay` and `forger` process you can use any of the following commands \(inside `packages/core`\).

* `yarn core:mainnet` =&gt; `packages/core/bin/config/networks/mainnet`
* `yarn core:devnet` =&gt; `packages/core/bin/config/networks/devnet`
* `yarn core:testnet` =&gt; `packages/core/bin/config/networks/testnet`

### How To Start a Relay?

If you want to start a `relay` you can use any of the following commands \(inside `packages/core`\).

* `yarn relay:mainnet` =&gt; `packages/core/bin/config/networks/mainnet`
* `yarn relay:devnet` =&gt; `packages/core/bin/config/networks/devnet`
* `yarn relay:testnet` =&gt; `packages/core/bin/config/networks/testnet`

### How To Start a Forger?

If you want to start a `forger`, you can use any of the following commands \(inside `packages/core`\).

* `yarn forger:mainnet` =&gt; `packages/core/bin/config/networks/mainnet`
* `yarn forger:devnet` =&gt; `packages/core/bin/config/networks/devnet`
* `yarn forger:testnet` =&gt; `packages/core/bin/config/networks/testnet`

## Core Boot Process

Command, `yarn core:testnet`, is where the magic happens. Let us do a quick walkthrough of what happens when this command is run:

1. The `core:testnet` command is run within `core`, which as of the time of writing executes the following command in `npm`: `cross-env CORE_PATH_CONFIG=./bin/config/testnet CORE_ENV=test yarn ark core:run --networkStart`

2. As seen in the previous step, the `./bin/run` file is called with the `core:run` command. That command looks like this:

<x-alert type="success">
Take a look at the following pieces of code to get a better understand of what commands are executed under the hood and what flags can be used to manipulate behavior and pass in data.

1. [core:run](https://github.com/ArkEcosystem/core/blob/137608fffb5da584da0ff9399fde146a3ecc5c8e/packages/core/src/commands/core-run.ts)
2. [Command](https://github.com/ArkEcosystem/core/blob/49e89a8f8a0380d1de856b7671aad8a590b5fd61/packages/core-cli/src/commands/command.ts)
</x-alert>

3. Take a look on the command config and the options passed by the `core:run` command as seen in the links above.

```typescript
import { Commands, Container, Contracts, Utils } from "@arkecosystem/core-cli";
import { Networks } from "@arkecosystem/crypto";
import Joi from "joi";

import { buildBIP38 } from "../internal/crypto";

@Container.injectable()
export class Command extends Commands.Command {
    public signature: string = "core:run";

    public description: string = "Run the Core process in foreground. Exiting the process will stop it from running.";

    public configure(): void {
        this.definition
            .setFlag("token", "The name of the token.", Joi.string().default("ark"))
            .setFlag("network", "The name of the network.", Joi.string().valid(...Object.keys(Networks)))
            .setFlag("env", "", Joi.string().default("production"))
            .setFlag("networkStart", "Indicate that this is the first start of seeds.", Joi.boolean())
            .setFlag("disableDiscovery", "Permanently disable all peer discovery.", Joi.boolean())
            .setFlag("skipDiscovery", "Skip the initial peer discovery.", Joi.boolean())
            .setFlag("ignoreMinimumNetworkReach", "Ignore the minimum network reach on start.", Joi.boolean())
            .setFlag("launchMode", "The mode the relay will be launched in (seed only at the moment).", Joi.string())
            .setFlag("bip38", "", Joi.string())
            .setFlag("bip39", "A delegate plain text passphrase. Referred to as BIP39.", Joi.string())
            .setFlag("password", "A custom password that encrypts the BIP39. Referred to as BIP38.", Joi.string());
    }

    public async execute(): Promise<void> {
        const flags: Contracts.AnyObject = { ...this.getFlags() };
        flags.processType = "core";

        await Utils.buildApplication({
            flags,
            plugins: {
                "@arkecosystem/core-p2p": Utils.buildPeerFlags(flags),
                "@arkecosystem/core-blockchain": {
                    networkStart: flags.networkStart,
                },
                "@arkecosystem/core-forger": await buildBIP38(flags, this.app.getCorePath("config")),
            },
        });

        return new Promise(() => {});
    }
}
```

4. We are going to take a brief look at the `bootstrap` method, found in the `core-kernel` package:

```typescript
public async bootstrap(options: { flags: JsonObject; plugins?: JsonObject }): Promise<void> {
    this.bind<KeyValuePair>(Identifiers.ConfigFlags).toConstantValue(options.flags);
    this.bind<KeyValuePair>(Identifiers.ConfigPlugins).toConstantValue(options.plugins || {});

    await this.registerEventDispatcher();

    await this.bootstrapWith("app");
}

private async bootstrapWith(type: string): Promise<void> {
    const bootstrappers: Array<Constructor<Bootstrapper>> = Object.values(Bootstrappers[type]);
    const events: Contracts.Kernel.EventDispatcher = this.get(Identifiers.EventDispatcherService);

    for (const bootstrapper of bootstrappers) {
        events.dispatch(KernelEvent.Bootstrapping, { bootstrapper: bootstrapper.name });

        await this.resolve<Bootstrapper>(bootstrapper).bootstrap();

        events.dispatch(KernelEvent.Bootstrapped, { bootstrapper: bootstrapper.name });
    }
}
```

5. After setting up environment variables based on the passed-in configuration, all Core plugins are loaded using the `options` key. You can find the enabled plugins in the `plugins.json` file located in the `core` package at `bin/config/testnet`.

This last step is where the meat-and-potatoes of ARK Core is loaded. During this step, the Postgres database is set up, all ARK-specific tables and fields are migrated, the genesis block is created, 51 forging delegates are created and set up to forge blocks — all the blockchain goodness you would expect from of a fully-formed testnet.

A full walkthrough of the node setUp process will be accessible in the Guidebook shortly, and further posts in the tutorials will guide you through some of the most common functions you will want to perform with your testnet. However, by following the steps above, you will be up and running with your very own network.

## Debugging

It is possible to run a variation of these commands that enables the [Node debugger](https://nodejs.org/api/debugger.html):

* `yarn debug:core`
* `yarn debug:relay`
* `yarn debug:forger`

A good introduction about how to use the debugger is the [guide to debugging of Node.js](https://nodejs.org/en/docs/guides/debugging-getting-started/).

## Testing

Every package that is developed should provide tests to guarantee it gives the expected behavior.

Our tool of choice for tests is [Jest](https://facebook.github.io/jest/) by Facebook which provides us with the ability to add custom matchers, snapshot testing and parallelizes our test runs.

All packages have a `yarn test` command which you should run before sending a PR or pushing to GitHub to make sure all tests are passing. You could use `yarn test:watch` to listen to changes on the files and run the tests automatically.

Additionally, we provide a variant \(`yarn test:debug`\) that enables the [Node debugger](https://nodejs.org/api/debugger.html).

With theory covered let's start our first local Testnet as shown below.
