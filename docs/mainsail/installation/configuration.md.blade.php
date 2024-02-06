---
title: Installation - Configuring Core
---

# Configuring Core

ARK Core provides a wide variety of ways to configure how it behaves, what plugins are used, who is forging and more. Each option is documented, so head over to the [ARK Core repository](https://github.com/ArkEcosystem/core/) and dive in. All of this configuration can be found in the `app.json`, `delegates.json` and `peers.json` files of the respective network you are using.

## Plugins Configuration

Plugins are packages that expose services which expand or alter what Core is capable of doing, by default there are a few required plugins like the a database driver, transaction pool, peer communication and consensus.

```json
{
    "core": {
        "plugins": [
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
            {
                "package": "@arkecosystem/core-magistrate-transactions"
            },
            {
                "package": "@arkecosystem/core-transaction-pool"
            },
            {
                "package": "@arkecosystem/core-p2p"
            },
            {
                "package": "@arkecosystem/core-blockchain"
            },
            {
                "package": "@arkecosystem/core-api"
            },
            {
                "package": "@arkecosystem/core-magistrate-api"
            },
            {
                "package": "@arkecosystem/core-webhooks"
            },
            {
                "package": "@arkecosystem/core-forger"
            }
        ]
    },
    "relay": {
        "plugins": [
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
            {
                "package": "@arkecosystem/core-magistrate-transactions"
            },
            {
                "package": "@arkecosystem/core-transaction-pool"
            },
            {
                "package": "@arkecosystem/core-p2p"
            },
            {
                "package": "@arkecosystem/core-blockchain"
            },
            {
                "package": "@arkecosystem/core-api"
            },
            {
                "package": "@arkecosystem/core-magistrate-api"
            },
            {
                "package": "@arkecosystem/core-webhooks"
            }
        ]
    },
    "forger": {
        "plugins": [
            {
                "package": "@arkecosystem/core-logger-pino"
            },
            {
                "package": "@arkecosystem/core-forger"
            }
        ]
    }
}
```

Again the configuration is quite simple. We have a `plugins` key that serves as a namespace for all of our plugin specific configuration, for each process type. Then we see a list of objects that all contain `package` key and an optional `options` key.

The `package` key is used by Core to decide what package should be loaded, this can be either an npm package name or path to a local package.

### Plugin options

The `options` key is used to configure the services that are provided by the plugin. Provided options are merged with default package configuration that is loaded from "default.ts" file inside the package.

Keys that are type of object will be merged with default configuration. String, number, boolean and array keys, will replace default configuration key.

```json
{
    "package": "@arkecosystem/core-logger-pino",
    "options": {
        "fileRotator": {
            "interval": "2d"
        }
    }
},
```

## Delegate Configuration

The delegate configuration is responsible for providing the information that is necessary to know who should be forging on a server. This can either be a list of plaintext bip39 passphrases or a bip38 encrypted passphrase that is protected with a password.

## Peer Configuration

The peer configuration is responsible for providing the information that is necessary to know who the seeds are so that we can retrieve a list of peers from them and start communicating with the network. By default it ships with a list of seeds and an additional list of sources on GitHub which is loaded when Core starts.

## Environment Configuration

Sometimes it can be beneficial or even necessary to have different configuration values per environment you are working with. An example would be where you are testing a new feature to improve database query or caching performance, in those cases you don't want to be bound to the settings of the production network but run with your own values and modifications.

```ini
LOG_LEVEL=debug
LOG_LEVEL_FILE=debug

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

<x-alert type="warning">
Your changes to the .env file should not be committed to your git repository, since each server could require a different environment configuration.
</x-alert>

Those are just a few of the possible environment variables, check the [Environment Variables](/docs/core/installation/variables) to get a full list of available environment variables and make sure to check out [dotenv](https://github.com/ArkEcosystem/utils/blob/master/src/dot-env.ts) and [sindresorhus/env-paths](https://github.com/sindresorhus/env-paths) to get a better understanding of what is happening under the hood.

> Your changes to the `.env` file should not be committed to your git repository, since each server could require a different environment configuration.
