---
title: Development - Creating CLI Commands
---

# Creating CLI Commands

With the release of Core 3.0 we've introduced a new pluggable CLI. It enables developers to implement their own commands or replace existing ones with their own implementations. In this guide we'll run you through the steps that are needed to get your plugin that provides your commands up developed and published on NPM.

## Prerequisites

This guide assumes that you're already familiar with how to setup Core for development so we'll skip that part, if you're not familiar with it you should read our guide before going any further. You'll also need to be familiar with the basics of [TypeScript](https://www.typescriptlang.org/) and how to build projects with it.

## The Command

The command we'll build in this guide is a command to share your local development relay with others through [ngrok](https://ngrok.com/). Below you can find the command that we'll break down from top to bottom and eventually package all of it into a plugin that we'll publish on NPM.

```typescript
import { Commands, Container } from "@arkecosystem/core-cli";
import Joi from "@hapi/joi";
import ngrok from "ngrok";

@Container.injectable()
export class Command extends Commands.Command {
    /**
     * The console command signature.
     *
     * @type {string}
     * @memberof Command
     */
    public signature: string = "relay:share";

    /**
     * The console command description.
     *
     * @type {string}
     * @memberof Command
     */
    public description: string = "Share the Relay via ngrok.";

    /**
     * Configure the console command.
     *
     * @returns {void}
     * @memberof Command
     */
    public configure(): void {
        this.definition
            .setFlag("proto", "Choose one of the available protocols (http|tcp|tls).", Joi.string().default("http"))
            .setFlag("addr", "Port or network address.", Joi.string().default(4003))
            .setFlag("auth", "HTTP basic authentication for tunnel.", Joi.string())
            .setFlag("subdomain", "Reserved tunnel name https://core.ngrok.io.", Joi.string())
            .setFlag("authtoken", "Your authtoken from ngrok.com.", Joi.string())
            .setFlag("region", "Choose one of the ngrok regions (us|eu|au|ap).", Joi.string().default("eu"));
    }

    /**
     * Execute the console command.
     *
     * @returns {Promise<void>}
     * @memberof Command
     */
    public async execute(): Promise<void> {
        const url: string = await ngrok.connect({
            proto: this.getFlag("proto"),
            addr: this.getFlag("addr"),
            auth: this.getFlag("auth"),
            subdomain: this.getFlag("subdomain"),
            authtoken: this.getFlag("authtoken"),
            region: this.getFlag("region"),
        });

        this.components.info(`Public access to your API: ${url}`);
    }
}
```

### Signature

The signature of a command is what the user will type to execute the command. When you for example run `ark relay:start` you are executing a command with the signature `relay:start`. You should always namespace your commands unless it is a standalone command without any relationship to anything specific, like listing all processes is the `top` command without any prefix because it isn't specifically related to a single thing.

#### Description

The description of a command is what the user will see if they use either the CLI help or specifically the Command help. Keep it short and concise so the user knows what he can expect from your command.

#### Configure

The `configure` method of a command is where you prepare everything that is required for your command to function. Generally this will only be the registration of arguments and flags but if necessary you could also register things like file paths in this method. Keep in mind that this method has no access to the parsed arguments and flags as you've just registered them, they will be parsed later.

#### Execute

The `execute` method of a command is where all of your business logic is executed. This method will be called last after the command has been configured, arguments have been parsed and interactions have been performed. This method can't return any values as they will not be used and would violate the void return assumption that is made.

### Publishing to NPM

Now that your command is ready you need to publish it on [npm](http://npmjs.org/) so that other people can install it. Before publishing the package to npm you'll need to make sure that you've changed all information to match yours, like name description, author and version. Once that is done you can simply run [npm publish](https://docs.npmjs.com/cli/publish) and see it published on the npm registry within a few seconds.

### Installing from NPM

You can install plugin via CLI command. Replace @vendor/package with your package name and --network with desired network configuration.

```shell
ark plugin:install @vendor/package --network=testnet
```

<x-alert type="info">
Private NPM repository location like (Verdaccio)[https://verdaccio.org/] can be used and set via CORE_NPM_REGISTRY env variable.
</x-alert>

Plugins are installed on default `data` location inside `/plugins` folder. You can check default location with:

```shell
ark env:variables
```

Check if installed plugin is successfully recognized and loaded.

```shell
ark help --network=testnet
```

<x-alert type="info">
To successfully load CLI plugin you need to provide --network flag, since plugins are installed for each network (testnet, devnet, mainnet) separately.

Optionally you can also define custom data path using CORE_PATH_DATA env variable.
</x-alert>

### Run installed plugin

After successful plugin installation it is time to run plugin.

```shell
ark relay:share --network=testnet
```
