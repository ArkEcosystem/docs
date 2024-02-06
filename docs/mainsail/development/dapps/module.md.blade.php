---
title: Development - Creating a dApp Module
---

# Creating a dApp Module

## Step 1: Prepare Your Local Development Environment

Many components are required to have a proper environment setup for the development of your ARK Core module. You can view instructions on how to setup your development environment here:

<livewire:page-reference path="/docs/core/installation/intro" />

## Step 2: Create A New Module From A Template

<x-alert type="info">
GitHub learning repository has [a starter module template project available](https://github.com/learn-ark/dapp-core-module-template/tree/develop). You can create a new module by creating [a new GitHub repository](https://github.com/new) and selecting the correct template: **learn-ark/dapp-core-module-template.**
</x-alert>

<livewire:embed-link url="https://github.com/learn-ark/dapp-core-module-template/tree/develop" caption="dApp Core Module Starter Template" />

After your repository has been created, you can add it as a submodule within the `core/plugins` folder and start changing the defaults.

```bash
cd plugins/
git submodule add -f https://github.com/your-username/your-core-plugin-repo-name
```

### 1.1 Module Configuration

We need to make some changes to the project first. Make sure to modify the default names for the files:

* [package.json](https://github.com/learn-ark/dapp-core-module-template/blob/develop/package.json) (model name, dependencies and other npm fields)
* [src/defaults.ts](https://github.com/learn-ark/dapp-core-module-template/blob/develop/src/defaults.ts) (settings)
* [src/index.ts](https://github.com/learn-ark/dapp-core-module-template/blob/develop/src/index.ts) (exports)
* [src/service-provider.ts](https://github.com/learn-ark/dapp-core-module-template/blob/develop/src/service-provider.ts) (registration logic)

The name of our module is **@vendorname/your-dapp-name**. Make sure to change the name in your **package.json** accordingly. It is recommended to scope your packages with a prefix like `@your-vendor/` to distinguish it from other **npm** packages. Check [https://docs.npmjs.com/misc/scope](https://docs.npmjs.com/misc/scope) for more information.

### 1.2 Adding Module Dependencies

If your package relies on any dependencies you should install them via [lerna add](https://github.com/lerna/lerna/tree/master/commands/add) the plugin you are developing.

```bash
lerna add dependency-name --scope=@vendor/demo-plugin --dev
```

Once everything is set up and configured, we can move on to developing the plugin.

## Step 3: Module Registration Within Network Configuration

<x-alert type="info">
In order to make sure that your plugin is registered and loaded when **Core Node starts**, you will need to modify the **`app.json`** file related to the current [network run mode](/docs/core/deployment/modes).
</x-alert>

Since, we are running a [local development environment](/docs/core/development/explorer), we will need to edit the Testnet configuration folder (`core/packages/core/bin/config/testnet/app.json`) and add our **module name** to the list of loaded modules. This is also a good place to set up the module's default properties, defined in the **`default.ts`** file in our module's root folder.

`app.json`

```javascript
module.exports = {
    "core": {
        "plugins": [
            // Order is IMPORTANT!
            // Modules are loaded in the same order as they are listed
            {
                "package": "@arkecosystem/core-logger-pino"
            },
            {
                "package": "@arkecosystem/core-state"
            },
            {
                "package": "@arkecosystem/core-database"
            },
            {
                "package": "@arkecosystem/core-transactions"
            },
            ...
            ... // other core plugins and their settings
            ...
            {
                "package": "@your-vendor/your-module-name-from-package",
                "options": {
                    // Here we can overwrite the module properties that are defined in defaults.ts file
                    enabled: true,
                    host: "0.0.0.0",
                    port: 8081,
                    ...
                    ...
                }
            }
        ]
    }
};

```

<x-alert type="warning">
Make sure to run **yarn setup** from the **core** root folder when you change or add code to **core/plugins.** This command takes a long time, just let it finish.
</x-alert>

After **yarn setup** completes you should see the following output:

```bash
lerna success - @arkecosystem/core-api
lerna success - @arkecosystem/core-blockchain
lerna success - @arkecosystem/core-cli
lerna success - @arkecosystem/core-database
lerna success - @arkecosystem/core-forger
lerna success - @arkecosystem/core-kernel
lerna success - @arkecosystem/core-logger-pino
lerna success - @vendorname/dappname # Your Module
```

Every plugin that is being registered in this file will be automatically **loaded one after another** to guarantee that all required data is available, so make sure your custom modules are placed in the right spot.

## Step 4: Running Your dApp

Start local blockchain with Testnet running on your developer computer. Follow steps defined in here:

<livewire:page-reference path="/docs/core/development/testnet" />

If you already have compiled and running core, just go to `core/packages/core` and run the `yarn full:testnet` command.

**After the local Testnet starts, the log should show that dApp Module was loaded and run**. Console output should look like this (if you haven't changed the source code from the template):

```bash
[2020-10-22 11:13:27.161] INFO : Loading dApp
[2020-10-22 11:13:27.161] INFO : Booting of dApp
```

<x-alert type="success">
**Congratulations**. Your first distributed blockchain application is loaded, running and compatible with any ARK Core based blockchain.
</x-alert>

Feel free to look at other Core packages that expose important Core Platform building blocks to work with. Your newly developed classes can extend this class and gain access to:

* wallets and state
* transaction pool
* blockchain protocol
* events
* database
* api
* logger
* **well...actually any core-module :)**
