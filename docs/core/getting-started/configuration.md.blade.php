---
title: Configuration
---

# Configuration

ARK Core provides a wide variety of ways to configure how it behaves, what plugins are used, who is forging and more. Each option is documented, so head over to the [ARK Core repository](https://github.com/ArkEcosystem/core/) and dive in. All of this configuration can be found in the `app.js`, `delegates.json` and `peers.json` files of the respective network you are using.

## Service Configuration

Services are the building blocks that make up all of the internals of Core that make it possible for it to do what it does. Think of things like logging, caching, events and task scheduling; all of those are necessary for Core to function but they aren't plugins so how do we configure them?

```javascript
module.exports = {
    services: {
        log: {
            levels: {
                console: process.env.CORE_LOG_LEVEL || "emergency",
                file: process.env.CORE_LOG_LEVEL_FILE || "emergency",
            },
            fileRotator: {
                interval: "1d",
            },
        },
    }
};
```

As you can see the configuration format is quite simple. We have a `services` key that serves as a namespace for all of our service specific configuration. Then we can see the `log` key, internally the log service will look for this key and use its value to configure things like log rotations and what severity messages go to which output stream.

## Plugin Configuration

Plugins are packages that expose services which expand or alter what Core is capable of doing, by default there are a few required plugins like the a database driver, transaction pool, peer communication and consensus.

```javascript
module.exports = {
    plugins: [{
        package: "@arkecosystem/core-state"
    },
    {
        package: "@arkecosystem/core-database"
    },
    {
        package: "@arkecosystem/core-transaction-pool"
    },
    {
        package: "@arkecosystem/core-p2p",
        options: {
            minimumNetworkReach: 5,
        }
    },
    {
        package: "@arkecosystem/core-blockchain"
    }]
};
```

Again the configuration is quite simple. We have a `plugins` key that serves as a namespace for all of our plugin specific configuration. Then we see a list of objects that all contain `package` key and an optional `options` key.

The `package` key will be used by Core to decide what package should be loaded, this can be either an npm package name or path to a local package. The `options` key will be used to configure the services that are provided by the plugin.

## Delegate Configuration

The delegate configuration is responsible for providing the information that is necessary to know who should be forging on a server. This can either be a list of plaintext bip39 passphrases or a bip38 encrypted passphrase that is protected with a password.

## Peer Configuration

The peer configuration is responsible for providing the information that is necessary to know who the seeds are so that we can retrieve a list of peers from them and start communicating with the network. By default it ships with a list of seeds and an additional list of sources on GitHub which is loaded when Core starts.

## Environment Configuration

Sometimes it can be beneficial or even necessary to have different configuration values per environment you are working with. An example would be where you are testing a new feature to improve database query or caching performance, in those cases you don't want to be bound to the settings of the production network but run with your own values and modifications.

```ini
LOG_LEVEL=emergency
LOG_LEVEL_FILE=emergency

DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=ark_mainnet
DB_USERNAME=ark
DB_PASSWORD=password

P2P_HOST=0.0.0.0
P2P_PORT=4000

WEBHOOKS_HOST=0.0.0.0
WEBHOOKS_PORT=4004

API_HOST=0.0.0.0
API_PORT=4003
```

Those are just a few of the possible environment variables, check the [Environment Variables](/docs/core/configuration/environment-variables) to get a full list of available environment variables and make sure to check out [dotenv](https://github.com/ArkEcosystem/utils/blob/master/src/dot-env.ts) and [sindresorhus/env-paths](https://github.com/sindresorhus/env-paths) to get a better understanding of what is happening under the hood.

> Your changes to the `.env` file should not be committed to your git repository, since each server could require a different environment configuration.
