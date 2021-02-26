---
title: Core V3 Server Setup
---

# Core V3 Server Setup (devnet)

<x-alert type="danger">
This guide is ONLY for users who are creating a new server for Core V3 installation. If your server was previously operational on devnet with Core 2.7, then please follow this upgrade guide
</x-alert>
<livewire:page-reference path="/docs/core/upgrade-guides/3.0" />


## Preparation
To start with the ARK Core install process, we recommend that you start with a clean server having at least the following minimum requirements.

### Minimum Requirements for Running Relay Node

* Ubuntu 18.x / 20.x.
* 1 CPU \(if you are going to run a Forger at least 2 dedicated CPUs\).
* 2–4 GB RAM \(if you are going to run a Forger at least 8GB RAM\).
* minimum 40 GB, recommended 60 GB drive \(we strongly recommend running it on SSD drive as there are a lot of read and write operations to the DB\).

## Guide for Setting Up a V3 Relay Node

For those who are familiar with Linux and ARK, running these commands will install and initialize ARK Core. Login to your newly created server and run these commands in sequence:

```
adduser ark
```

```
usermod -aG sudo ark
```

```
su ark
```

```
cd ~
```

```
bash <(curl -s https://raw.githubusercontent.com/ArkEcosystem/core/develop/install.sh)
```
(When prompted, select the **devnet** network)
<x-alert type="warning">
When configuring your database, if you have set a custom **database username, password or database name** then please make a note of them as we will need to update the `.env` file with your database details
</x-alert>

```
ark config:cli --channel=next
```

```
rm -rf ~/.config/ark-core/ && ark config:publish --token=ark --network=devnet --reset
```

<x-alert type="info">
If you used a non-default database configuration, you now need to add your database configuration to your `.env` file. If you used the default database configuration you can skip this step and start your relay.
</x-alert>

You can edit your `.env` with the following command:

```
nano ~/.config/ark-core/devnet/.env
```

Add the following details with your username, password and database to the bottom of your `.env` file and then save.

```
CORE_DB_USERNAME=yourUser
CORE_DB_PASSWORD=yourPassword
CORE_DB_DATABASE=yourDatabaseName
```

Start your 3.0 relay with the following command: 

```
ark relay:start
```

Check your logs with `ark relay:log` and your node should now be syncing. 
