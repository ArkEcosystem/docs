---
title: Release Guides - v2.4
---

# v2.4

ARK `v2.4` is a minor update but not backward compatible with `v2.3.X`. This update replaces the current API based communication with WebSockets which means peers on versions before `v2.4.0` will not be able to communicate.

* **Upgrade time**: low - upgrading to `v2.4` only requires minimal configuration changes.
* **Complexity**: high - P2P communication was rewritten and `@arkecosystem/crypto` exports were modified.
* **Risk**: high - `v2.4` is not backward compatible with `v2.3` and includes breaking changes for P2P communication.

## Migrating from v2.3 to v2.4

Upgrading from `v2.3` to `v2.4` is fairly straightforward if you follow the instructions. Even though we try to ensure backward compatibility (BC) as much as possible, sometimes it is not possible or very complicated to avoid it and still create a good solution to a problem.

WARNING

Upgrading a complex software project always comes at the risk of breaking something, so make sure you have a backup.

### Notes

After upgrading you should check whether your application still works as expected and no plugins are broken. See the following notes on which changes to consider when upgrading from one version to another.

### Upgrade Steps

Be sure to complete all of the following steps before you continue to upgrade with the `ark update` command to the latest version.

#### Step 1. Add `core-state` Package

1. Open `~/.config/ark-core/mainnet/plugins.js`
2. Locate the `@arkecosystem/core-database-postgres` entry.
3. Add this package addition line before it (see below):
4. Save the changes. Your configuration file should look like this:

#### Step 2. Add `core-wallet-api` Package

!WARNING

It's especially important to register this plugin as this is what the Desktop and Mobile wallet will use to communicate with nodes.

1. Open `~/.config/ark-core/mainnet/plugins.js`
2. Locate the `@arkecosystem/core-blockchain` entry.
3. Add this package addition line after it (see below):
4. Save the changes. Your configuration file should look like this:
5. If you are using default firewall don't forget to open port `4040` to make `core-wallet-api` accessible to wallets.

TIP

You can check your ufw rules by running `sudo ufw status`

#### Step 3. Update `core-p2p` Configuration

1. Open `~/.config/ark-core/mainnet/plugins.js`
2. Locate the `@arkecosystem/core-p2p` entry and replace the block like shown below.

   **Old**

   **New**

3. If you have a `whitelist` property in the `core-p2p` entry, make sure to remove this too. Starting with v2.4 this property will filter out any peers that don't match the whitelist.
4. Save the changes.

#### Step 4. Update `core-forger` Configuration

1. Open `~/.config/ark-core/mainnet/plugins.js`
2. Locate the `@arkecosystem/core-forger` entry and replace the block like shown below.

   **Old**

   **New**

3. Save the changes.

#### Step 5. Update `core-json-rpc` to `core-exchange-json-rpc`

WARNING

This only applies if you have the JSON-RPC registered in your `plugins.js` file, otherwise skip this section.

#### Step 6. Running the Update Command via the `ark` CLI

Do not run any of the mentioned commands with `sudo` unless explicitly stated.

Make sure that all previous steps were successfully completed before running the `ark update` command via the cli.

**To update to v2.4 run the following command:**

This section addresses developers and lists notable changes during this version upgrade. For more details make sure you checkout the [CHANGELOG](https://github.com/ArkEcosystem/core/blob/master/CHANGELOG.md) document. The following breaking changes where introduced in v2.4:

### Fee Statistics Removed from `node/configuration` Endpoint <a id="_1-fee-statistics-removed-from-node-configuration-endpoint"></a>

The fee statistic are no longer included in the response of the `node/configuration` endpoint. They can be retrieved through a new dedicated endpoint instead, `node/fees`. More information on that endpoint can be found [here](/docs/api/public-rest-api/endpoints/transactions).

## Reporting Problems

If you happen to experience any issues please [open an issue](https://github.com/ArkEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it and info about your environment.
