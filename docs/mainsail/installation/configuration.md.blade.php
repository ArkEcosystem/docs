---
title: Installation - Configuring Mainsail
---

# Configuring Mainsail

Mainsail provides a wide variety of ways to configure how it behaves, what plugins are used, who is forging and more. Each option is documented, so head over to the [Mainsail repository](https://github.com/ArkEcosystem/mainsail) and [Mainsail Network Config repository](https://github.com/ArkEcosystem/mainsail-network-config/tree/main/testnet/mainsail). All of this configuration can be found in the `app.json`, `crypto.json`, `validators.json` and `peers.json` files of the respective network you are using.

## Plugins Configuration

Plugins are packages that expose services which expand or alter what Mainsail node is capable of doing, by default there are a few required plugins like the a database driver, transaction pool, peer communication and consensus.

```json
{
    "plugins": [
        {
            "package": "@mainsail/validation"
        },
        {
            "package": "@mainsail/crypto-config"
        },
        {
            "package": "@mainsail/crypto-validation"
        },
        {
            "package": "@mainsail/crypto-hash-bcrypto"
        },
        {
            "package": "@mainsail/crypto-signature-schnorr-secp256k1"
        },
        {
            "package": "@mainsail/crypto-key-pair-ecdsa"
        },
        {
            "package": "@mainsail/crypto-consensus-bls12-381"
        },
        {
            "package": "@mainsail/crypto-address-base58"
        },
        {
            "package": "@mainsail/crypto-wif"
        },
        {
            "package": "@mainsail/serializer"
        },
        {
            "package": "@mainsail/p2p"
        },
        {
            "package": "@mainsail/api-transaction-pool"
        },
        {
            "package": "@mainsail/processor"
        },
        {
            "package": "@mainsail/validator-set-static"
        },
        {
            "package": "@mainsail/validator"
        },
        {
            "package": "@mainsail/proposer"
        },
        {
            "package": "@mainsail/consensus"
        },
        {
            "package": "@mainsail/webhooks"
        },
        {
            "package": "@mainsail/bootstrap"
        }
    ]
}
```

Again the configuration is quite simple. We have a `plugins` key that serves as a namespace for all of our plugin specific configuration, for each process type. Then we see a list of objects that all contain `package` key and an optional `options` key.

The `package` key is used by Mainsail to decide what package should be loaded, this can be either an npm package name or path to a local package.

### Plugin options

The `options` key is used to configure the services that are provided by the plugin. Provided options are merged with default package configuration that is loaded from "default.ts" file inside the package.

Keys that are type of object will be merged with default configuration. String, number, boolean and array keys, will replace default configuration key.

```json
{
    "package": "@mainsail/logger-pino",
    "options": {
        "fileRotator": {
            "interval": "2d"
        }
    }
},
```

## Validator Configuration

The validator configuration is responsible for providing the information that is necessary to know who should be forging on a server. This can either be a list of plaintext bip39 passphrases or a bip38 encrypted passphrase that is protected with a password. Configuration is stored inside `validators.json` file.

```json
{
    "secrets": [
        "validator mnemonic"
    ]
}
```

## Peer Configuration

The peer configuration is responsible for providing the information that is necessary to know who the seeds are so that we can retrieve a list of peers from them and start communicating with the network. By default it ships with a list of seeds and an additional list of sources on GitHub which is loaded when Core starts. Configuration is stored in `peers.json` file.

## Environment Configuration

Sometimes it can be beneficial or even necessary to have different configuration values per environment you are working with. An example would be where you are testing a new feature to improve database query or caching performance, in those cases you don't want to be bound to the settings of the production network but run with your own values and modifications.

```ini
CORE_LOG_LEVEL=info
CORE_LOG_LEVEL_FILE=debug

CORE_P2P_HOST=0.0.0.0
CORE_P2P_PORT=4000

CORE_API_HOST=0.0.0.0
CORE_API_PORT=4003

CORE_WEBHOOKS_HOST=0.0.0.0
CORE_WEBHOOKS_PORT=4004
```

<x-alert type="warning">
Your changes to the `.env` file should not be committed to your git repository, since each server could require a different environment configuration.
</x-alert>

Those are just a few of the possible environment variables, check the [Environment Variables](/docs/mainsail/installation/variables) to get a full list of available environment variables and make sure to check out [dotenv](https://github.com/ArkEcosystem/mainsail/blob/develop/packages/utils/source/dot-env.ts) and [sindresorhus/env-paths](https://github.com/sindresorhus/env-paths) to get a better understanding of what is happening under the hood.

> Your changes to the `.env` file should not be committed to your git repository, since each server could require a different environment configuration.
