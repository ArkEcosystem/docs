---
title: Core 3.0
---

ARK `v3.0` is a major update **not backward compatible with `v2.7.x`**.

**Release information:**

* **Upgrade time**: medium - upgrading to `v3.0` requires configuration changes and a database migration.
* **Complexity**: **high**
* **Risk**: high - `v3.0` is not backward compatible with `v2.7`.

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

### Step 1. Remove `app.js` from your configuration folder

Locate `app.js` in your configuration folder (for devnet it could be `~/.config/ark-core/devnet`). Remove the file.

###  Step 2. Migrate `plugins.js` to `app.json`

Copy over the `app.json` file from core repository : 

[https://raw.githubusercontent.com/ArkEcosystem/core/develop/packages/core/bin/config/devnet/app.json](https://raw.githubusercontent.com/ArkEcosystem/core/develop/packages/core/bin/config/devnet/app.json)

Into your config folder (same folder as in step 1).

Migrate the config you have in your `plugins.js` into the `app.json` file : for this you can specify for each package the config in the `options` field, for example :

```
{
    "package": "@arkecosystem/core-p2p",
    "options": {
        "minimumNetworkReach": 10
    }
},
```

Careful, you have a few spots where you can put your options : the main ones are `core`, `relay` and `forger`. As you guessed this is where to specify the options when running full node, only relay, or only forger.

### Step 3. Firewall settings / iptables

Core now uses three different ports for p2p : for devnet they are 4002, 4012, and 4022. We are providing you a script to create some specific rules on these ports to prevent abuse, but **for now just be sure that you are allowing tcp traffic to these ports**.

### Step 4. Update core

First, make sure that in your current directory you have the file `v3-migrations.sql`.

Run these commands (adapt the `psql` one with your user and database):

```
pm2 stop all && ark snapshot:rollback --height=5635000
psql -U ark -h 127.0.0.1 -d ark_devnet -f v3-migrations.sql
ark update && pm2 start all
```

On core startup a database migration will be running : expect 10/15 minutes for it to complete.

Then run the iptables script : `v3-iptables.sh`.

### Reporting Problems <a id="reporting-problems"></a>

If you happen to experience any issues please [open an issue](https://github.com/ARKEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it and info about your environment.
