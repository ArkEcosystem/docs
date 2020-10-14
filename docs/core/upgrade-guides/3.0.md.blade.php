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

### Step 1. Create Database Migration Script

Create a database migration script by copying the script provided below. We'll name the script `v3-migrations.sql`

```
nano v3-migrations.sql
```

Paste the following script into your `v3-migrations.sql` file and save the file (can press the copy icon on the right of the script below to copy the content of the block).

```sql
SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

DROP TABLE IF EXISTS public.migrations;

CREATE TABLE public.migrations (
    id integer NOT NULL,
    "timestamp" bigint NOT NULL,
    name character varying NOT NULL
);

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);

COPY public.migrations (id, "timestamp", name) FROM stdin;
1	180305100000	CreateWalletsTable20180305100000
2	180305200000	CreateRoundsTable20180305200000
3	180305300000	CreateBlocksTable20180305300000
4	180305400000	CreateTransactionsTable20180305400000
5	181129400000	AddBlockIdIndexToTransactionsTable20181129400000
6	181204100000	AddGeneratorPublicKeyIndexToBlocksTable20181204100000
7	181204200000	AddTimestampIndexToBlocksTable20181204200000
8	181204300000	AddSenderPublicKeyIndexToTransactionsTable20181204300000
9	181204400000	AddRecipientIdIndexToTransactionsTable20181204400000
10	190307000000	DropWalletsTable20190307000000
11	190606000000	AddBlockIdForeignKeyOnTransactionsTable20190606000000
12	190619000000	DropIdColumnFromRoundsTable20190619000000
13	190626000000	EnforceChainedBlocks20190626000000
14	190718000000	CheckPreviousBlockAddSchema20190718000000
15	190803000000	AddTypeGroupColumnToTransactionsTable20190803000000
16	190806000000	AddNonceColumnToTransactionsTable20190806000000
17	190905000000	ChangeSetRowNonceToUseMaxNonce20190905000000
18	190917000000	AddAssetColumnToTransactionsTable20190917000000
19	191003000000	MigrateVendorFieldHex20191003000000
20	191008000000	AddTypeIndexToTransactionsTable20191008000000
21	200304000000	AddTypeGroupIndexToTransactionsTable20200304000000
22	200317000000	AddBlocksAndTransactionsIndexes20200317000000
\.


SELECT pg_catalog.setval('public.migrations_id_seq', 22, true);


ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT "PK_8c82d7f526340ab734260ea46be" PRIMARY KEY (id);

```

### Step 2. Create iptables Script
Core now uses three different ports for p2p: for **devnet** they are **4002**, **4012**, and **4022**. We are providing you a script to create some specific rules on these ports to prevent abuse.
**Please ensure that you are allowing tcp traffic to these ports.**

Create an iptables script by copying the script provided below. We'll name the script `v3-iptables.sh`

```
nano v3-iptables.sh
```

Paste the following script into your `v3-iptables.sh` file and save the file (can press the copy icon on the right of the script below to copy the content of the block).

```bash
#!/usr/bin/env bash
#mainnet_ports P2P_GLOBAL=4001,P2P_BLOCKS=4011,P2P_TX=4021 / devnet_ports P2P_GLOBAL=4002,P2P_BLOCKS=4012,P2P_TX=4022 / testnet_ports P2P_GLOBAL=4000,P2P_BLOCKS=4010,P2P_TX=4020
P2P_GLOBAL=4000
P2P_GLOBAL_CONN=10
CONNPS=10
BURST=30
P2P_BLOCKS=4010
P2P_TX=4020
TXCONNPS=10
TXBURST=50

#Initialize p2p limiter
start_limit() {

table=$(sudo iptables -nL P2P_LIMIT 2> /dev/null)
myip=$(ifconfig `ip route | grep default | head -1 | sed 's/\(.*dev \)\([a-z0-9]*\)\(.*\)/\2/g'` | grep -oE "\b([0-9]{1,3}\.){3}[0-9]{1,3}\b" | head -1)

if [[ $table ]]; then
        #P2P_GLOBAL limits
        sudo iptables -F P2P_LIMIT
        sudo iptables -A P2P_LIMIT -p tcp --syn -m connlimit --connlimit-above ${P2P_GLOBAL_CONN} --connlimit-mask 32 -j REJECT --reject-with tcp-reset
        sudo iptables -A P2P_LIMIT -m hashlimit --hashlimit-mode srcip --hashlimit-upto ${CONNPS}/sec --hashlimit-burst ${BURST} --hashlimit-name core_p2p_limit -j ACCEPT
        sudo iptables -A P2P_LIMIT -p tcp -j REJECT --reject-with tcp-reset
        #P2P_BLOCKS limits
        sudo iptables -F P2P_BLOCKS
        sudo iptables -A P2P_BLOCKS -p tcp --syn -m connlimit --connlimit-above ${P2P_GLOBAL_CONN} --connlimit-mask 32 -j REJECT --reject-with tcp-reset
        sudo iptables -A P2P_BLOCKS -m state --state NEW,ESTABLISHED,RELATED -m recent --set
        sudo iptables -A P2P_BLOCKS -m state --state NEW,ESTABLISHED,RELATED -m recent --update --seconds 8 --hitcount 2 -j DROP
        #P2P_TX limits
        sudo iptables -F P2P_TX
        sudo iptables -A P2P_TX -p tcp --syn -m connlimit --connlimit-above ${P2P_GLOBAL_CONN} --connlimit-mask 32 -j REJECT --reject-with tcp-reset
        sudo iptables -A P2P_TX -m hashlimit --hashlimit-mode srcip --hashlimit-upto ${TXCONNPS}/sec --hashlimit-burst ${TXBURST} --hashlimit-name core_tx_limit -j ACCEPT
        sudo iptables -A P2P_TX -p tcp -j REJECT --reject-with tcp-reset
        echo "Connection Limits exist, resetting rules"

else
        echo "Applying Connection Limits"
        #P2P_GLOBAL limits
        sudo iptables -N P2P_LIMIT
        sudo iptables -I INPUT -p tcp -d $myip --dport ${P2P_GLOBAL} -j P2P_LIMIT
        sudo iptables -A P2P_LIMIT -p tcp --syn -m connlimit --connlimit-above ${P2P_GLOBAL_CONN} --connlimit-mask 32 -j REJECT --reject-with tcp-reset
        sudo iptables -A P2P_LIMIT -m hashlimit --hashlimit-mode srcip --hashlimit-upto ${CONNPS}/sec --hashlimit-burst ${BURST} --hashlimit-name core_p2p_limit -j ACCEPT
        sudo iptables -A P2P_LIMIT -p tcp -j REJECT --reject-with tcp-reset
        #P2P_BLOCKS limits
        sudo iptables -N P2P_BLOCKS
        sudo iptables -I INPUT -p tcp -d $myip --dport ${P2P_BLOCKS} -j P2P_BLOCKS
        sudo iptables -A P2P_BLOCKS -p tcp --syn -m connlimit --connlimit-above ${P2P_GLOBAL_CONN} --connlimit-mask 32 -j REJECT --reject-with tcp-reset
        sudo iptables -A P2P_BLOCKS -m state --state NEW,ESTABLISHED,RELATED -m recent --set
        sudo iptables -A P2P_BLOCKS -m state --state NEW,ESTABLISHED,RELATED -m recent --update --seconds 8 --hitcount 2 -j DROP
        #P2P_TX limits
        sudo iptables -N P2P_TX
        sudo iptables -I INPUT -p tcp -d $myip --dport ${P2P_TX} -m conntrack --ctstate NEW -j P2P_TX
        sudo iptables -A P2P_TX -p tcp --syn -m connlimit --connlimit-above ${P2P_GLOBAL_CONN} --connlimit-mask 32 -j REJECT --reject-with tcp-reset
        sudo iptables -A P2P_TX -m hashlimit --hashlimit-mode srcip --hashlimit-upto ${TXCONNPS}/sec --hashlimit-burst ${TXBURST} --hashlimit-name core_tx_limit -j ACCEPT
        sudo iptables -A P2P_TX -p tcp -j REJECT --reject-with tcp-reset

fi
}

#Stop limit
stop_limit() {

table=$(sudo iptables -nL P2P_LIMIT 2> /dev/null)
myip=$(ifconfig `ip route | grep default | head -1 | sed 's/\(.*dev \)\([a-z0-9]*\)\(.*\)/\2/g'` | grep -oE "\b([0-9]{1,3}\.){3}[0-9]{1,3}\b" | head -1)

if [[ $table ]]; then
        #P2P_GLOBAL limits
        sudo iptables -F P2P_LIMIT
        sudo iptables -D INPUT -p tcp -d $myip --dport ${P2P_GLOBAL} -j P2P_LIMIT > /dev/null 2>&1
        sudo iptables -X P2P_LIMIT
        #P2P_BLOCKS limits
        sudo iptables -F P2P_BLOCKS
        sudo iptables -D INPUT -p tcp -d $myip --dport ${P2P_BLOCKS} -j P2P_BLOCKS > /dev/null 2>&1
        sudo iptables -X P2P_BLOCKS
        #P2P_TX limits
        sudo iptables -F P2P_TX
        sudo iptables -D INPUT -p tcp -d $myip --dport ${P2P_TX} -m conntrack --ctstate NEW -j P2P_TX
        sudo iptables -X P2P_TX
        echo "Removed Connection Limits!"
fi
}

case "$1" in
    start)   start_limit ;;
    stop)    stop_limit;;
    restart) stop_limit; start_limit ;;
    *) echo "usage: $0 start|stop|restart" >&2
       exit 1
       ;;
esac
```

## Start the IP Tables Script

To start the IP Tables script, you can run the following command.
```
bash v3-iptables.sh start
````

### Step 3. Update & Start Core

<x-alert type="danger">
**WARNING:** The commands below will remove and reset your configuration files in `~/.config/ark-core/devnet`. 
**Please backup any configuation files that you may need later such as your `delegate.json`, `plugin.js` & `.env` files.**
</x-alert>
First, make sure that in your current directory you have the **database migration script** (where you created the v3-migrations.sql file). 

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

> **Backup your delegate.json file if applicable with the command below:**
```
cp ~/.config/ark-core/devnet/delegates.json ~/delegate.json.backup
```

```
rm -rf ~/.config/ark-core/ && ark config:publish --token=ark --network=devnet --reset
```
> **Copy over backup delegate.json file if applicable with the command below:*
```
cp ~/delegate.json.backup ~/.config/ark-core/devnet/delegates.json
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

### Troubleshoot

If you run into any issues during the upgrade process (after you start the node process), please run the following command (and start the node process after):
```
yarn global upgrade
```

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
