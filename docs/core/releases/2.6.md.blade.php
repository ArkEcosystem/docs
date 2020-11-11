---
title: v2.6
---

# v2.6

ARK `v2.6` is a minor update but **not backward compatible with `v2.5.x`**.

**Release information:**

* **Upgrade time**: low - upgrading to `v2.6` only requires minimal configuration changes.
* **Complexity**: **high** - AIP11 and AIP18 were implemented which bring various cryptography changes after a milestone is reached.
* **Risk**: high - `v2.6` is not backward compatible with `v2.5` and as it includes cryptography and P2P changes that will result in communication with nodes below 2.6.0 to fail.

## What’s new in Core v2.6

So what’s new? Well, quite a lot actually… In the most exciting feature-packed release since Core v2.0, we’re introducing:

### New Features:

* \*\*\*\* **Generic Transaction Interface \(GTI\)** — Developers can use the GTI to create custom transaction types tailored to their exact needs using custom logic. An alternative to smart contracts, the GTI on ARK Core gives developers an incredibly simple way to build their own applications f ARK’s blockchain technology — simple, clean and very effective.
* \*\*\*\* **Nonces for Transactions** - We’ve added nonces for transactions, which means adding a sequential number to transactions to make them unique. This helps mitigate the risk of replay attacks and makes the blockchain even more secure.

### **New Transaction Types:**

* **Multipayments** — You can now save time, effort and transaction fees when sending ARK to multiple addresses using the Multipayments feature in ARK Desktop Wallet. Add up to 64 addresses that you want to send to, customize the amount and send just one transaction, all in a few seconds.
* **IPFS** — With the IPFS feature now enabled, you’ll be able to save an IPFS compliant hash for data saved on an IPFS solution.
* **Multisignatures** — By utilizing Schnorr Signature Schema we’ve reintroduced Multisignatures. This means you can set up a Multisignature wallet where transactions from the wallet must be authorized by a minimum number of participants that you choose while registering it for the first time.
* **Business Registrations** — Any business can now register on-chain and when they become verified, get all of the benefits that are coming in the following months including Deployer, Marketplace and much more!
* **Bridgechain Registration** — Bridgechains running on ARK can now officially register on-chain \(Business Registration is required beforehand\). By registering, bridgechains become a registered member of the ARK Ecosystem. In the future, this registration will enable bridgechains to benefit from inclusion in new initiatives, programs and more.
* **Delegate Resignation** — With the new Delegate resignation transaction type, Delegates who wish to retire can send a “Kill Command” to stop the Delegate from being able to receive new votes. By implementing this new feature, we’ve created a much more simple and efficient way of retiring a delegate.

### Finished AIP proposals:

This update introduces implementations of the following ARK Improvement Proposals:

* [AIP-11 Upgrade of Transaction Protocol](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md)
* [AIP-18 Multisignature protocol](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-18.md)
* [AIP-29  Generic Transaction Interface](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md)
* [AIP-102 Magistrate Transaction Types](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-102.md)
* \[Devnet only\] [AIP-103 Hash Timelock Contracts \(will be only available on \#devnet, as still EXPERIMENTAL\)](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-103.md)

By adding all these helpful new features, with Core v2.6 we’re making everything from sending payments to resigning a Delegate better, easier, faster and much more streamlined.  [For more detailed information see the release tag.](https://github.com/ArkEcosystem/core/releases/tag/2.6.0)

## Migrating from v2.5 to v2.6 <a id="migrating-from-v2-5-to-v2-6"></a>

Upgrading from `v2.5` to `v2.6` is fairly straightforward if you follow the instructions. Even though we try to ensure backward compatibility \(BC\) as much as possible, sometimes it is not possible or very complicated to avoid it and still create a good solution to a problem.

<x-alert type="danger">
**WARNING: Upgrading a complex software project always comes at the risk of breaking something, so make sure you have a backup.**
</x-alert>

### Notes <a id="notes"></a>

After upgrading you should check whether your application still works as expected and no plugins are broken. See the following notes on which changes to consider when upgrading from one version to another.

## Upgrade Steps

<x-alert type="danger">
**WARNING:** Do NOT run any of the mentioned commands with **sudo** unless explicitly stated.
</x-alert>

### Prerequisites

Check what node version you have currently installed by running `node -v` . **If this shows a version below 12, you will have to update this before proceeding with the installation**. To do this, run the following commands:

```bash
sudo sed -i s/node_10/node_12/ /etc/apt/sources.list.d/nodesource.list
sudo sed -i s/node_11/node_12/ /etc/apt/sources.list.d/nodesource.list
sudo apt-get update && sudo apt-get upgrade

yarn global upgrade
```

When this is finished, you should see version 12 installed when you run `node -v` again!

Additionally, we changed from the default gclib garbage collector to [jemalloc](http://jemalloc.net) as it has shown to reduce the memory footprint of Core. You will have to install this by running the following command:

```bash
sudo apt-get install -y libjemalloc-dev
```

### Step 1. Add `core-magistrate-transactions` Package:

1. Open `~/.config/ark-core/mainnet/plugins.js`
2. Locate the `@arkecosystem/core-database-postgres` entry.
3. Add this package addition line **before it** \(see below\):

```javascript
   "@arkecosystem/core-magistrate-transactions": {}, // Add this line before it
   ```

4. Save the changes. Your configuration file should look like this:

```javascript
   module.exports = {
       "@arkecosystem/core-event-emitter": {},
       "@arkecosystem/core-logger-pino": {},
       "@arkecosystem/core-state": {},
       "@arkecosystem/core-magistrate-transactions": {}, //this line was added
       "@arkecosystem/core-database-postgres": {},
       ...
       ...
       ...
   }
   ```

###  **Step 2. Updating ARK Core from v2.5.x to v2.6**

1. To update to v2.6 run the following command \(wait for it to complete\):

```bash
ark update --no-restart
```

#### For more information about using the ARK CLI interface go[ here.](/docs/core/command-line-interface-cli/getting-started) <a id="step-1-add-core-magistrate-transactions-package"></a>

2. The above command will keep the node processes running. After it has completed, you will have to make sure to delete the processes from pm2 to make it properly report the memory and cpu statistics based on jemalloc. You can do this by running:

```bash
pm2 delete all
```

Aferwards you will have to start your core processes again. This can be done by running `ark core:start` \(for the combined core process\), or by running `ark relay:start` if you only run a relay.

<x-alert type="info">
After restarting, your node will first execute migrations to get the database ready for v2.6. Please be aware that this can take upward of 30 minutes to complete depending on your server specs.
</x-alert>

### Reporting Problems

If you happen to experience any issues please [open an issue](https://github.com/ARKEcosystem/core/issues/new?template=Bug_report) with a detailed description of the problem, steps to reproduce it and info about your environment.
