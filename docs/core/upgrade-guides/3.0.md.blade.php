---
title: Core 2.7 to 3.0
---
# 3.0

ARK `v3.0` is a major update **not backward compatible with `v2.7.x`**.

**Release information:**

* **Upgrade time**: ***medium*** - upgrading to `v3.0` requires configuration changes and a database migration.
* **Complexity**: ***high***
* **Risk**: ***high*** - `v3.0` is not backward compatible with `v2.7`.

## Upgrade Steps

<x-alert type="danger">
**WARNING:** Do NOT run any of the mentioned commands with **sudo** unless explicitly stated.
</x-alert>

### Prerequisites

Check what node version you have currently installed by running `node -v` . **If this shows a version below 12, you will have to update this before proceeding with the installation**. 

To do this, run the following commands:

```bash
sudo sed -i s/node_10/node_12/ /etc/apt/sources.list.d/nodesource.list
sudo sed -i s/node_11/node_12/ /etc/apt/sources.list.d/nodesource.list
sudo apt-get update && sudo apt-get upgrade

yarn global upgrade
```

When this is finished, you should see version 12 installed when you run `node -v` again!

### Step 1. Database Migration Script

Use `wget` to fetch the `v3-migrations.sql` script.

```
wget -N https://dsnapshots.ark.io/v3-migrations.sql
```

### Step 2. iptables Script

Core now uses three different ports for p2p: for **devnet** they are **4002**, **4012**, and **4022**. We are providing you a script to create some specific rules on these ports to prevent abuse.
**Please ensure that you are allowing tcp traffic to these ports.**

Use `wget` to fetch the `v3-iptables.sh` script.

```
wget -N https://dsnapshots.ark.io/v3-iptables.sh
```

### Start the IP Tables Script

To start the IP Tables script, you can run the following command.
```
bash v3-iptables.sh start
````

### Step 3. Update & Start Core

<x-alert type="danger">
**WARNING:** The commands below will remove and reset your configuration files in `~/.config/ark-core/devnet`. 
**Please backup any configuation files that you may need later such as your `delegate.json`, `plugin.js` & `.env` files.**
</x-alert>
First, make sure that in your current directory you have the **database migration script** (where you created the `v3-migrations.sql` file). 

Run these commands (adapt the `psql` command with your user and database, default DB password is `password`):

```
pm2 stop all && ark snapshot:rollback --height=5635000
```
```
psql -U ark -h 127.0.0.1 -d ark_devnet -f v3-migrations.sql
```
```
ark update 
```

> *Backup your delegate.json file if applicable with the command below:*
```
cp ~/.config/ark-core/devnet/delegates.json ~/delegate.json.backup
```

```
rm -rf ~/.config/ark-core/ && ark config:publish --token=ark --network=devnet --reset
```

> *Copy over backup delegate.json file if applicable with the command below:*
```
cp ~/delegate.json.backup ~/.config/ark-core/devnet/delegates.json
```

```
yarn global upgrade
```
```
pm2 start all
```
<x-alert type=warning>
In your logs you may see repeat messages about connecting to your database such as `Connecting to database: ark_devnet`. This is due to the database migration and can take up to 1 hour to complete depending on your server hardware.
</x-alert>

<x-alert type=info>
Each runmode (`core`, `relay`, & `forger`) now contains their own configuration for plugins. This configuration file can be located here: `~/.config/ark-core/devnet/app.json`
</x-alert>

### Reporting Problems

If you happen to experience any issues please [open an issue](https://github.com/ARKEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it and info about your environment.

## API changes

### `POST /search` endpoints removed

All `POST /search` endpoints have been removed, in favor of using the main index endpoint (for example `GET /transactions`) with url parameters. All the main index endpoints have been improved to allow searching (see below API improvements).

### Standardized wallet response format

Now wallet endpoints return wallet object following this format :

```json
{
    "address",
    "publicKey",
    "balance",
    "nonce",
    "attributes": {
        "delegate": {
            "username",
            "resigned", // this attribute will only be set if delegate is resigned
            // other delegate attributes
        },
        "vote",
        "secondPublicKey",
        "multiSignature",
    }
}
```

As a result, to get wallets based on a specific attribute, we have to use the full attribute path, for example :

`GET /wallets?attributes.delegate.username=mydelegate`

**Note that `isDelegate` does not exist anymore in the wallet response** : in order to check if the wallet is a delegate, you should check the existence of `attributes.delegate` and that `attributes.delegate.resigned` is either non-existent or false.

### `addresses` parameter was removed

`addresses` was a parameter used to search for multiple addresses at the same time. Now with the improvements in api, this special parameter is not needed anymore as we can simply use the `address` parameter like this for example :

`GET /transactions?address=AXGc1bvU3g3rHmx9WVkUUHLA6gbzh8La7V,AVLPrtx669XgvervE6A594poB613HG3mSM`

### API improvements

#### Filter by any field returned in the API response

Let’s take an example, say we `GET /delegates` and we get this entry in the response :

```json
{
    "username": "protokol1",
    "address": "ATKegnoyu9Fkej5FxiJ3biup8xv8zM34M3",
    "publicKey": "033f6d89ad9f3e6dfb8cfb4f2d7fca7adeb6db15c282c113d0452238293bb50046",
    "votes": "302776200010000",
    "rank": 1,
    "isResigned": false,
    "blocks": {
        "produced": 13886,
        "last": {
            "id": "9630922981846498992",
            "height": 1150380,
            "timestamp": {
                "epoch": 112045656,
                "unix": 1602146856,
                "human": "2020-10-08T08:47:36.000Z"
            }
        }
    },
    "production": {
        "approval": 2.42
    },
    "forged": {
        "fees": "10000000",
        "rewards": "2777200000000",
        "total": "2777210000000"
    }
}
```

By just looking at the response we can create an API query that filters by any field, like :

`GET /delegates?isResigned=true`

`GET /delegates?blocks.produced=13886`

We can still combine (AND) different fields :

`GET /delegates?isResigned=true&blocks.produced=0`

#### Filter by a set of values for one field (OR)

Following the same example, we can also specify a set of values (OR) for one field using comma-separated values :

`GET /delegates?username=protokol1,protokol2`

And we can still combine with other fields (AND) :

`GET /delegates?username=protokol1,protokol2&isResigned=false`

#### Order by any field

Additionally, we can order by any field by using the `orderBy` parameter :

`GET /delegates?orderBy=rank:desc`

The format is `field:asc|desc` depending on whether you want to order ascending or descending.

We can combine this with the filters :

`GET /delegates?isResigned=false&orderBy=rank:asc`
