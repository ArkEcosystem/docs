---
title: Upgrade Guides - Core 3.13.0 to Node.js 24
---

# Upgrading from Core 3.13.0

Core `<version>` is a maintenance release that makes Core run on **Node.js 24** and current Ubuntu LTS releases. This guide is for nodes that run Core 3.13.0 and were set up with the [install script](/docs/core/installation/script), which usually means Ubuntu 18.04 - 22.04 with Node.js 16.

<x-alert type="info">
This is **not** a hard fork. It changes no consensus rules, milestones or network configuration, and nodes on 3.13.0 and `<version>` run side by side on the same network. You can upgrade at your own pace.
</x-alert>

## What Changed

* Core requires **Node.js 24.22.1 or newer**, and refuses to install on older versions.
* The install script now installs **PostgreSQL 18** and **PM2 7**, and supports **Ubuntu 22.04, 24.04 and 26.04** only.
* `ark relay:share` has been removed. It relied on an ngrok agent that no longer works for free accounts. If you need a tunnel, run a current ngrok agent yourself, for example `ngrok http 4003`.
* Dependencies have been updated. Nothing changes in how you configure or run Core.

## Why `ark update` Doesn't Work

`ark update` can't upgrade to this release:

* `<version>` is published under the `<tag>` npm tag, not `latest`. `ark update` only checks `latest`, so on a 3.13.0 node it reports that you are up to date.
* Even if it found the release, it couldn't run: `<version>` needs Node.js 24, while Core 3.13.0 and its native modules only run on the Node.js version they were built for.

So the upgrade is a deliberate, manual step. And because the new Node.js and PostgreSQL versions can't run 3.13.0, **don't upgrade the server that is currently forging**. Pick one of the approaches below.

## Choose Your Approach

### Recommended: Set Up a New Server

The most straightforward way is to set up a new server with Ubuntu 24.04 or 26.04, install Core with the regular [installation instructions](/docs/core/installation/script), and move over once it's ready. With the install script this takes minimal effort, and you don't have to upgrade Ubuntu, Node.js and PostgreSQL on a running server.

You can get the new server's database in two ways:

* **Copy the database** from your current node with [`ark-db-sync.sh`](/docs/core/deployment/snapshots#sharing-a-database-between-servers). This is the fastest option, and works from a 3.13.0 node.
* **Sync from 0.** This takes a long time, but you can start it well in advance and keep forging on your current server in the meantime.

Follow [Moving to a New Server](#moving-to-a-new-server) below.

### Alternative: Upgrade Your Existing Servers

If you'd rather keep your existing servers, upgrade your **backup (relay) server first**. Once it runs `<version>` and is synced, forge on it temporarily while you upgrade your main forger. Follow [Upgrading in Place](#upgrading-in-place) below.

<x-alert type="danger">
Never forge with the same delegate on two servers at the same time. Always stop the forger on one server **before** you start it on the other, or your node can cause a fork and get banned by its peers.
</x-alert>

## Check Your Server

Run these on each server you plan to upgrade.

### Ubuntu Version

```bash
lsb_release -ds
```

| Ubuntu | What to do |
| :----- | :--------- |
| **18.04 / 20.04** | Can't run Node.js 24. Upgrade Ubuntu first, one LTS release at a time, or set up a new server |
| **22.04** | Can run `<version>`, but its standard support ends in **May 2027**. We recommend upgrading to 24.04 or 26.04 while you're at it |
| **24.04 / 26.04** | Ready. Continue with [Node.js](#step-2-nodejs) |

### Node.js Version and Manager

```bash
node --version
which -a node
```

The install script installs Node.js from the NodeSource repository into `/usr/bin/node`. If `which` shows a path in your home directory, such as `~/.nvm`, `~/.fnm`, `~/.volta` or `~/.local/share/fnm`, or `/usr/local/bin/node` (used by `n`), Node.js was installed with a version manager. We cover that in [Step 2](#step-2-nodejs).

### Disk Space

The database is the largest part of a node: around **50GB on mainnet** and **45GB on devnet**. Upgrading PostgreSQL copies the database, so you need at least that much free space again, and some extra for the Ubuntu upgrades. Check the size of your database and the free space:

```bash
sudo -u postgres psql -c "SELECT datname, pg_size_pretty(pg_database_size(datname)) FROM pg_database;"
df -h /var/lib/postgresql
```

<x-alert type="warning">
If the free space is less than the size of your database plus 10GB, don't start the upgrade. Increase the disk first, or set up a new server instead.
</x-alert>

### Backups

Before you change anything, make a backup of your Core configuration. It contains your `.env` and, on a forger, your delegate's (encrypted) passphrase in `delegates.json`:

```bash
tar -czf ~/ark-core-config-backup.tar.gz -C ~/.config ark-core
```

Copy this file somewhere off the server. If your provider offers server snapshots, take one now as well, so you can roll back the whole server if an upgrade fails.

## Upgrading in Place

Upgrade in this order. Each step depends on the one before it.

1. Ubuntu, up to 24.04 or 26.04
2. Node.js 24
3. Yarn, PM2 and build tools
4. PostgreSQL 18
5. Core `<version>`

Start with your backup server. Stop Core before you begin, and stop the PM2 daemon, as it runs on the old Node.js version:

```bash
pm2 stop all
pm2 kill
```

### Step 1: Ubuntu

Skip this step if you are already on 24.04 or 26.04.

Ubuntu upgrades one LTS release at a time: 18.04 → 20.04 → 22.04 → 24.04 → 26.04. We recommend going at least to 24.04, and not stopping at 22.04.

For each release, first install all updates for the current one and reboot:

```bash
sudo apt-get update
sudo apt-get dist-upgrade -y
sudo apt-get install -y update-manager-core
sudo reboot
```

Then start the upgrade to the next LTS release:

```bash
sudo do-release-upgrade
```

Answer the questions, and reboot when it's done. When it asks whether to **remove obsolete packages**, answer **No**: your current PostgreSQL version counts as obsolete while its repository is disabled, and you need it in [Step 4](#step-4-postgresql) to upgrade the database. Check the new version with `lsb_release -ds`, and repeat until you reach your target release.

<x-alert type="warning">
Run the upgrade in `screen` or `tmux`, or from your provider's web console, so a dropped SSH connection doesn't interrupt it. If you changed the SSH port, `do-release-upgrade` may start a backup SSH server on port `1022`. You don't have to open that port as long as your connection stays up.
</x-alert>

<x-alert type="info">
During each upgrade the NodeSource, Yarn and PostgreSQL apt repositories are disabled. The next steps add them again for your new release. The upgrade to 26.04 is only offered once its first point release (26.04.1) is out.
</x-alert>

### Step 2: Node.js

Remove Node.js versions installed by a version manager, so they don't shadow the system version. The install script does the same:

```bash
sudo rm -rf /usr/local/{lib/node{,/.npm,_modules},bin,share/man}/{npm*,node*,man1/node*}
rm -rf ~/{.npm,.nvm,.fnm,.volta}
```

If you used a version manager, also remove its lines from `~/.bashrc` (or `~/.profile`), for example the ones that mention `NVM_DIR`, `fnm` or `VOLTA_HOME`, then log out and back in.

Install Node.js 24 from the NodeSource repository. This replaces the old Node.js 16 repository:

```bash
echo -e "Package: nodejs\nPin: origin deb.nodesource.com\nPin-Priority: 999" | sudo tee /etc/apt/preferences.d/nodesource
curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor | sudo tee /usr/share/keyrings/nodesource.gpg > /dev/null
echo "deb [signed-by=/usr/share/keyrings/nodesource.gpg] https://deb.nodesource.com/node_24.x nodistro main" | sudo tee /etc/apt/sources.list.d/nodesource.list
sudo apt-get update
sudo apt-get install -y nodejs
```

Check that the right version is used:

```bash
hash -r
which node
node --version
```

`which node` should print `/usr/bin/node`, and `node --version` should be `v24.22.1` or newer.

### Step 3: Yarn, PM2 and Build Tools

Re-add the Yarn repository, which the Ubuntu upgrade disabled, and install the build tools Core needs to compile its native modules on Node.js 24:

```bash
curl -fsSL https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | sudo tee /usr/share/keyrings/yarnkey.gpg > /dev/null
echo "deb [signed-by=/usr/share/keyrings/yarnkey.gpg] https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list
sudo apt-get update
sudo apt-get install -y yarn build-essential python-is-python3 python3-setuptools pkg-config libtool autoconf automake libpq-dev jq libjemalloc-dev
```

Install PM2 7 and the log rotation module again:

```bash
sudo yarn global add pm2@7
pm2 install pm2-logrotate
pm2 set pm2-logrotate:max_size 500M
pm2 set pm2-logrotate:compress true
pm2 set pm2-logrotate:retain 7
```

The old install script installed `ntp`. The new one uses `systemd-timesyncd`, which comes with Ubuntu. Switch over, so only one service manages the clock:

```bash
sudo apt-get purge -y ntp ntpsec
sudo apt-get install -y systemd-timesyncd
sudo timedatectl set-ntp on
timedatectl
```

`timedatectl` should show `System clock synchronized: yes` after a minute.

### Step 4: PostgreSQL

<x-alert type="warning">
Upgrading the database needs the binaries of **both** your current PostgreSQL version and PostgreSQL 18. If your current version was removed during the Ubuntu upgrade, your data is still on disk, but nothing can read it until that version is installed again. Check this first:

```bash
pg_lsclusters
```

If your cluster shows as `down` and doesn't start, add the PostgreSQL repository and run `apt-get update` with the first three commands below, then install your old version again, for example `sudo apt-get install -y postgresql-14`. If that version is no longer available for your Ubuntu release, you can't upgrade this database in place: [move to a new server](#moving-to-a-new-server) and copy the database from another node, or sync from 0.
</x-alert>

Add the PostgreSQL repository for your new Ubuntu release and install PostgreSQL 18:

```bash
curl -fsSL https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | sudo tee /usr/share/keyrings/pgdg.gpg > /dev/null
echo "deb [signed-by=/usr/share/keyrings/pgdg.gpg] https://apt.postgresql.org/pub/repos/apt $(. /etc/os-release && echo "$VERSION_CODENAME")-pgdg main" | sudo tee /etc/apt/sources.list.d/pgdg.list
sudo apt-get update
sudo apt-get install -y postgresql-18
```

Installing PostgreSQL 18 creates a new, empty cluster next to your existing one. List the clusters:

```bash
pg_lsclusters
```

```bash
Ver Cluster Port Status Owner    Data directory              Log file
14  main    5432 online postgres /var/lib/postgresql/14/main /var/log/postgresql/postgresql-14-main.log
18  main    5433 online postgres /var/lib/postgresql/18/main /var/log/postgresql/postgresql-18-main.log
```

Your data is in the old cluster on port `5432`, version 14 in this example. Replace `14` in the commands below with your version.

<x-alert type="info">
If the list shows more than one old cluster, for example because the Ubuntu upgrade installed its own PostgreSQL version, check which one holds your database with `sudo -u postgres psql -p <port> -l`. Only upgrade that one.
</x-alert>

Remove the empty 18 cluster, then upgrade the old cluster to 18:

```bash
sudo pg_dropcluster 18 main --stop
sudo pg_upgradecluster -v 18 -m upgrade 14 main
```

`-m upgrade` uses `pg_upgrade`, which copies the data files directly. Don't use the default dump method: Core's database has checks that fail when rows are loaded back in a different order. The copy takes a while on mainnet. When it's done, the new 18 cluster runs on port `5432` and the old one is stopped on port `5433`:

```bash
pg_lsclusters
sudo -u postgres psql -c "SELECT version();"
```

Keep the old cluster until Core runs fine on the new one. Then remove it, together with the old PostgreSQL packages, to free up the disk space:

```bash
sudo pg_dropcluster 14 main
sudo apt-get purge -y postgresql-14 postgresql-client-14
```

<x-alert type="warning">
Not enough space for a copy? `pg_upgradecluster -m link` uses hard links instead and needs hardly any extra space, but once you start the new cluster you can no longer go back to the old one. Only use it with a recent backup or server snapshot.
</x-alert>

### Step 5: Core

Install all remaining system updates first:

```bash
sudo apt-get update
sudo apt-get dist-upgrade -y
```

Remove the old Core version and install `<version>`. A clean install makes sure all native modules are built for Node.js 24. Your configuration in `~/.config/ark-core` and your database are not touched:

```bash
yarn global remove @arkecosystem/core
yarn cache clean
yarn global add @arkecosystem/core@<tag>
```

Make sure the `ark` command still comes from Yarn's global folder and shows the new version:

```bash
grep -q 'yarn global bin' ~/.bashrc || echo 'export PATH=$(yarn global bin):$PATH' >> ~/.bashrc
exec bash
ark version
```

Then start the relay and watch the logs:

```bash
ark relay:start
pm2 logs
```

Your node should connect to its peers and continue syncing from where it stopped. Once it's synced, save the PM2 process list, so it's restored after a reboot:

```bash
pm2 save --force
```

## Switching the Forger

Once your backup server runs `<version>` and is fully synced, move forging to it. The order is important.

On the backup server, configure your delegate if you haven't already. Use the same BIP38 password or passphrase as on your forger:

```bash
ark config:forger
```

On your **current forger**, stop forging and remove the process, so PM2 doesn't start it again on a reboot:

```bash
ark forger:stop
pm2 delete ark-forger
pm2 save --force
```

Only then start forging on the backup server:

```bash
ark forger:start
pm2 save --force
```

Check the logs and an explorer to confirm that your delegate forges its blocks. Now upgrade your main forger with the steps in [Upgrading in Place](#upgrading-in-place). When it's synced, switch back in the same way: stop the forger on the backup server first, then start it on the main forger.

<x-alert type="info">
The PM2 process name depends on your network and token. Use `pm2 list` to see the names on your server.
</x-alert>

## Moving to a New Server

1. Set up a new server with Ubuntu 24.04 or 26.04 and install Core with the [install script](/docs/core/installation/script). Choose the same network as your current node and configure the database. Check that `ark version` shows `<version>`.
2. [Secure the new server](/docs/core/security/intro).
3. Get the database onto the new server. Either let it sync from 0, or copy it from your current node with [`ark-db-sync.sh`](/docs/core/deployment/snapshots#sharing-a-database-between-servers). The script runs on your current 3.13.0 node, needs `rsync` on both servers, and can dump while Core keeps running:

   ```bash
   ./ark-db-sync.sh push --to ark@<new-server-ip>
   ```

4. Start the relay on the new server with `ark relay:start`, and let it sync to the current height.
5. If you made changes to `app.json` or `.env` on your current node, apply them on the new server. Don't copy the `.env` file as a whole, as the database credentials can be different.
6. If this server will forge, [switch the forger](#switching-the-forger) as described above: run `ark config:forger` on the new server, stop the forger on the old server, then start it on the new server.
7. Update anything that points to your old server's IP address, such as DNS records or API clients. Keep the old server around for a few days until you're sure everything works, then shut it down.

## Troubleshooting

### `ark` Still Shows 3.13.0

Check where the `ark` command comes from with `which -a ark`. If there's more than one, remove the old installation, or make sure `$(yarn global bin)` comes first in your `PATH`.

### Building Native Modules Fails

Check that `node --version` is 24.22.1 or newer and that the build tools from [Step 3](#step-3-yarn-pm2-and-build-tools) are installed, then run `yarn global add @arkecosystem/core@<tag>` again.

### `permission denied for schema public`

Since PostgreSQL 15, only the owner of a database can create tables in it by default. Make your Core database user the owner of the database and its `public` schema, replacing `ark` and `ark_mainnet` with your own values:

```bash
sudo -u postgres psql -c "ALTER DATABASE ark_mainnet OWNER TO ark;"
sudo -u postgres psql -d ark_mainnet -c "ALTER SCHEMA public OWNER TO ark;"
```

### `pg_upgrade` Reports Different Data Checksum Settings

PostgreSQL 18 enables data checksums by default, while older clusters usually don't have them. A current `postgresql-common` takes care of this when it creates the new cluster. Update it from the PostgreSQL repository and run `pg_upgradecluster` again:

```bash
sudo apt-get install -y postgresql-common
```

### Reporting Problems

If you run into other issues, please [open an issue](https://github.com/ArkEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, the steps you took, your Ubuntu, Node.js and PostgreSQL versions, and the relevant logs.
