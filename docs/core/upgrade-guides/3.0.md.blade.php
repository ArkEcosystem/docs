---
title: Core 2.7 to 3.0
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
    "package": "package-name",
    "options": {
        "yourConfigParameterFromPluginsJs": "yourValue"
    }
},
```

Careful, you have a few spots where you can put your options : the main ones are `core`, `relay` and `forger`. As you guessed this is where to specify the options when running full node, only relay, or only forger.

### Step 3. Firewall settings & IP Tables

Core now uses three different ports for p2p : for devnet they are 4002, 4012, and 4022. We are providing you a script to create some specific rules on these ports to prevent abuse, but **for now just be sure that you are allowing tcp traffic to these ports**.

### Step 4. Update core

First, make sure that in your current directory you have the database migration script (you can copy-paste it from the *Scripts* section below).
Name this script `v3-migrations.sql`.

Run these commands (adapt the `psql` one with your user and database):

```
pm2 stop all && ark snapshot:rollback --height=5635000
psql -U ark -h 127.0.0.1 -d ark_devnet -f v3-migrations.sql
ark update && pm2 start all
```

On core startup a database migration will be running : expect 10/15 minutes for it to complete.

Then run the iptables script (you can copy-paste it from the *Scripts* section below).

### Reporting Problems

If you happen to experience any issues please [open an issue](https://github.com/ARKEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it and info about your environment.

## Scripts

### Database migration script

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

### Iptables script

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
