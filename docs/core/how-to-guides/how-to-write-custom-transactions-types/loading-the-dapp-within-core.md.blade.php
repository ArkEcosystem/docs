---
title: Loading The dApp Within Core
---

# Loading The dApp Within Core

We need to enable and load the plugin in the correct network and process configurations of our Core framework. To accomplish this we need to follow the next two steps:

## STEP 1: Load your dApp In The Corresponding Network Configurations.

Go to: `core/packages/core/bin/testnet`

```bash
cd packages/core/bin/config/testnet
```

Locate file `plugins.js`. We will add our plugin name to the list of the loaded plugins. This means that core will pickup the plugin/dapp and load it for a specific network configuration. Add line `"@arkecosystem/custom-transactions": {}`: to the file `plugins.js` file, so it looks something like this:


```javascript
    ......
    "@arkecosystem/custom-transactions": {}, // LOADING THE PLUGIN - ORDER IS IMPORTANT
    "@arkecosystem/core-state": {},
    "@arkecosystem/core-database-postgres": {
        connection: {
            host: process.env.CORE_DB_HOST || "localhost",
            port: process.env.CORE_DB_PORT || 5432,
            database: process.env.CORE_DB_DATABASE || `${process.env.CORE_TOKEN}_${process.env.CORE_NETWORK_NAME}`,
            user: process.env.CORE_DB_USERNAME || process.env.CORE_TOKEN,
            password: process.env.CORE_DB_PASSWORD || "password",
        },
    },
    ......
```

<x-alert type="danger">
**Order of plugin/dapp loading is very important.** Since your plugin is adding new transaction types to the blockchain protocol, it **MUST** be registered before we load the  **@arkecosystem/core-state** module \(see example snippet above\).
</x-alert>

Repeat the process for other network configurations.

## STEP 2: Load your dApp With Separate Core Processes

In production environment we usually run two separate processes, one for a **relay** node and another one for **forger**. A relay node looks for the default **plugins.js** configuration and automatically loads the listed plugins \(see above\).

<x-alert type="danger">
To register the custom-transaction plugin for another processes, we **MUST** add it to the **app.js** file in the folder: **core/packages/core/bin/config/{network-name}/app.js.**
</x-alert>

 The file looks like this:


```javascript
module.exports = {
    cli: {
        core: {
            run: {
                plugins: {
                    include: [
                        "@arkecosystem/custom-transactions"
                    ],
                },
            },
        },
...... // More content
```

Add your plugin handle/name to all the include sections, so that the core will load the plugin when running other important processes.

Repeat the steps for other network configurations.

A fully working example is available for you to examine, learn and download here.

<livewire:embed-link url="https://github.com/learn-ark/dapp-custom-transaction-example" caption="Custom Transaction Example" />

Now, let's get the example running:

<livewire:page-reference path="/docs/core/how-to-guides/how-to-write-custom-transactions-types/example-walkthrough" />
