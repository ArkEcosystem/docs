---
title: Core Run Modes
---

# Core Run Modes

## Available Running Modes

Core Server can be run in the following general modes:

* **Relay Mode** - listens to blockchain traffic, replicates and validates block data
* **Forger Mode** - creates new blocks and broadcasts them via relay nodes to the p2p network
* **Relay and Forger Mode** - both run under a single process

### How To Start a Node?

If you want to start a node which consists of a `relay` and `forger` process you can use any of the following commands \(inside `packages/core`\).

* `yarn start:mainnet` =&gt; `packages/core/bin/config/networks/mainnet`
* `yarn start:devnet` =&gt; `packages/core/bin/config/networks/devnet`
* `yarn start:testnet` =&gt; `packages/core/bin/config/networks/testnet`

### How To Start a Relay?

If you want to start a `relay` you can use any of the following commands \(inside `packages/core`\).

* `yarn relay:mainnet` =&gt; `packages/core/bin/config/networks/mainnet`
* `yarn relay:devnet` =&gt; `packages/core/bin/config/networks/devnet`
* `yarn relay:testnet` =&gt; `packages/core/bin/config/networks/testnet`

### How To Star a Forger? 

If you want to start a `forger`, you can use any of the following commands \(inside `packages/core`\).

* `yarn forger:mainnet` =&gt; `packages/core/bin/config/networks/mainnet`
* `yarn forger:devnet` =&gt; `packages/core/bin/config/networks/devnet`
* `yarn forger:testnet` =&gt; `packages/core/bin/config/networks/testnet`

## Core Boot Process

Command, `yarn full:testnet`, is where the magic happens. Let us do a quick walkthrough of what happens when this command is run:

1.The `full:testnet` command is run within `core`, which as of the time of writing executes the following command in `npm`: `cross-env CORE_PATH_CONFIG=./bin/config/testnet CORE_ENV=test yarn ark core:run --networkStart`

2. As seen in the previous step, the `./bin/run` file is called with the `core:run` command. That command looks like this:

<x-alert type="success">
Take a look at the following pieces of code to get a better understand of what commands are executed under the hood and what flags can be used to manipulate behaviour and pass in data.

1. [core:run](https://github.com/ARKEcosystem/core/blob/develop/packages/core/src/commands/core/run.ts)
2. [BaseCommand](https://github.com/ARKEcosystem/core/blob/develop/packages/core/src/commands/command.ts#L20-L61)
</x-alert>

3. Based on the command config and the options passed by the `full:testnet` command as seen in the links above, we can see that the network sets the `config` directory to `bin/config/testnet` and the `networkStart` option to `true`, which starts our testnet from scratch with a new genesis block.


```typescript
import { app } from "@arkecosystem/core-container";
import { CommandFlags } from "../../types";
import { BaseCommand } from "../command";

export class RunCommand extends BaseCommand {
    public static description: string = "Run the core (without pm2)";

    public static flags: CommandFlags = {
        ...BaseCommand.flagsNetwork,
        ...BaseCommand.flagsBehaviour,
        ...BaseCommand.flagsForger,
    };

    public async run(): Promise<void> {
        const { flags } = await this.parseWithNetwork(RunCommand);

        await this.buildApplication(app, flags, {
            options: {
                "@arkecosystem/core-p2p": this.buildPeerOptions(flags),
                "@arkecosystem/core-blockchain": {
                    networkStart: flags.networkStart,
                },
                "@arkecosystem/core-forger": await this.buildBIP38(flags),
            },
        });
    }
}
```


4. We are going to take a brief look at the `setup` method, found in the `core-container` package:


```typescript
public async setUp(version: string, variables: any, options: any = {}) {
    // Register any exit signal handling
    this.registerExitHandler(["SIGINT", "exit"]);

    // Set options and variables
    this.options = options;
    this.variables = variables;

    this.setVersion(version);

    // Register the environment variables
    const environment = new Environment(variables);
    environment.setUp();

    // Mainly used for testing environments!
    if (options.skipPlugins) {
        this.isReady = true;
        return;
    }

    // Setup the configuration
    this.config = await configManager.setUp(variables);

    // Setup the plugins
    this.plugins = new PluginRegistrar(this, options);
    await this.plugins.setUp();

    this.isReady = true;
}
```


5. After setting up environment variables based on the passed-in configuration, all Core plugins are loaded using the `options` key of the second argument to `container.setUp`. You can find the enabled plugins in the `plugins.js` file located in the `core` package at `bin/config/testnet`.

This last step is where the meat-and-potatoes of ARK Core is loaded. During this step, the Postgres database is set up, all ARK-specific tables and fields are migrated, the genesis block is created, 51 forging delegates are created and set up to forge blocks — all the blockchain goodness you would expect from of a fully-formed testnet.

A full walkthrough of the node setUp process will be accessible in the Guidebook shortly, and further posts in the tutorials will guide you through some of the most common functions you will want to perform with your testnet. However, by following the steps above, you will be up and running with your very own network.

## Debugging

It is possible to run a variation of these commands that enables the [Node debugger](https://nodejs.org/api/debugger.html):

* `yarn debug:start`
* `yarn debug:relay`
* `yarn debug:forger`

A good introduction about how to use the debugger is the [guide to debugging of Node.js](https://nodejs.org/en/docs/guides/debugging-getting-started/).

## Testing

Every package that is developed should provide tests to guarantee it gives the expected behaviour.

Our tool of choice for tests is [Jest](https://facebook.github.io/jest/) by Facebook which provides us with the ability to add custom matchers, snapshot testing and parallelizes our test runs.

All packages have a `yarn test` command which you should run before sending a PR or pushing to GitHub to make sure all tests are passing. You could use `yarn test:watch` to listen to changes on the files and run the tests automatically.

Additionally, we provide a variant \(`yarn test:debug`\) that enables the [Node debugger](https://nodejs.org/api/debugger.html).

With theory covered let's start our first local Testnet as shown below.
