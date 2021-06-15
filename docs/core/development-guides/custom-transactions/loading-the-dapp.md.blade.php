---
title: Custom Transactions Guide - Loading the dApp
---

# Loading The dApp Within Core

We need to enable and load the plugin in the correct network and process configurations of our Core framework. To accomplish this we need to follow the next two steps:

## STEP 1: Load your dApp In The Corresponding Network Configurations

Go to: `core/packages/core/bin/testnet`

```bash
cd packages/core/bin/config/testnet
```

Locate file `app.json`. We will add our plugin name to the list of the loaded plugins. This means that core will pickup the plugin/dapp and load it for a specific network configuration. Add line `"@arkecosystem/custom-transactions": {}`: to the file `app.json` file, so it looks something like this:

```javascript
    ......
    "core": {
        "plugins": [
            ......
            {
                "package": "@arkecosystem/core-transactions"
            },
            {
                "package": "@arkecosystem/custom-transactions"
            },
            ......
        ],
    },
    "relay": {
        "plugins": [
            ......
            {
                "package": "@arkecosystem/core-transactions"
            },
            {
                "package": "@arkecosystem/custom-transactions"
            },
            ......
        ],
    }
    ......
```

Note that you will need to add the plugin under both `core` and `relay` keys, to have the custom transaction registered when you run a relay or a full node.

Repeat the process if needed for other network configurations (devnet, mainnet).

A fully working example is available for you to examine, learn and download here.

<livewire:embed-link url="https://github.com/learn-ark/dapp-custom-transaction-example" caption="Custom Transaction Example" />

Now, let's get the example running:

<livewire:page-reference path="/docs/core/development-guides/custom-transactions/running-the-example" />
