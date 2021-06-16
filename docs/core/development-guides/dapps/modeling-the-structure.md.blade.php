---
title: dApps Guide - Modeling the Structure
---

# Basic Module Structure

Modules are very simple to write. At their core they are an object with a register property, that is a function with the signature async function.

<x-alert type="success">
Everything we use inside ARK core is built with modules. To learn more about modules and their structure follow the source code of existing modules within core.
</x-alert>

<x-alert type="info">
GitHub learning repository has [a template project available](https://github.com/learn-ark/dapp-core-module-template). You can create a new module by creating [a new GitHub repository](https://github.com/new) and selecting the correct template: **learn-ark/dapp-core-module-template.**
</x-alert>

## Available Module Properties

This properties are set in the `plugin.ts` file in the root folder of you core module.

`plugin.ts`

```typescript
import { Container, Logger } from "@arkecosystem/core-interfaces";
import { defaults } from "./defaults";
import { DappManager } from "./manager";

export const plugin: Container.IPluginDescriptor = {
    pkg: require("../package.json"),
    defaults,
    alias: "dapp-core-template",
    async register(container: Container.IContainer, options) {
        if (!options.enabled) {
            container
                .resolvePlugin<Logger.ILogger>("logger")
                .info("dApp is enabled");

            return undefined;
        }

        container.resolvePlugin<Logger.ILogger>("logger").info("Starting dApp");
        const dappManager = new DappManager(); // creating instance of your dApp

        dappManager.start(options);

        return dappManager;
    },

    async deregister(container: Container.IContainer) {
        const dappManager = container.resolvePlugin("dapp-core-template");

        if (dappManager) {
            container
                .resolvePlugin<Logger.ILogger>("logger")
                .info("Stopping dApp");

            return dappManager.stop();
        }
    }
};
```

The following properties can be set:

### pkg

This property contains all the information about your plugin that is needed to register it like the name and version, usually this will be simply your `package.json` as it already has all of that information.

#### defaults

All of the settings that your plugin provides should come with a default value so the user needs to configure as little as possible. An exception to this rule would be things like addresses, public keys or passphrases as those are things the user should configure so he knows the values.

#### alias

In the above example you've probably noticed the `alias: "logger"` line. This serves as an alias to allow us quick access to the plugin via `container.resolvePlugin("logger")` instead of having to type the exact name of the logger we are using, e.g. `container.resolvePlugin("@arkecosystem/core-logger-pino")`.

<x-alert type="danger">
Aliases should be used with caution if you are using a lot of plugins as you might overwrite something that you did not intend to overwrite which can cause unwanted behaviors.
</x-alert>

#### extends

This property will be rarely used and only be seen in a few plugins like logger or database implementations. The `extends` property tells the container that we first need to load the plugin that was defined via the `extends` property before we can continue with registering our plugin.

Plugins that are loaded via `extends` usually don't do anything on their own as they just provide an abstract, a factory or interfaces that should be used by plugins that provide concrete implementations.

## Module Registration

Module needs to be registered in order to be picked up by the `core` engine. Looking at the source code above each core module must have **register** and **deregister**  methods implemented. This methods are called from the application container.

```typescript
async register(container: Container.IContainer, options) {
    if (!options.enabled) {
        container
            .resolvePlugin<Logger.ILogger>("logger")
            .info("dApp is enabled");
        return undefined;
    }

    container.resolvePlugin<Logger.ILogger>("logger").info("Starting dApp");
    const dappManager = new DappManager(); // creating instance of your dApp

    dappManager.start(options);

    return dappManager;
}
```

The **register** method accepts two parameters, **container** and **options**.

The **container** parameter is an instance of the application container to provide you easy access to other plugins like configuration or database connections.

The **options** parameter is whatever options the user passes to your plugin when registering.

**register** should be an async function that returns once your plugin has completed whatever steps are necessary for it to be ready. Alternatively your register plugin should throw an error if an error occurred while registering your plugin.

**Let's head over to the next section, where we will learn how to write our own dApp in a few minutes, just by following our dApp core module template repository.**
