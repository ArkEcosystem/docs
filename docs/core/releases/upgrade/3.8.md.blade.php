---
title: Upgrade Guides - Core 3.8.2
---

# v3.8.2 Upgrade Guide

The upgrade to Core 3.8.2 is as straightforward as running `ark update` to get on the latest version. However, Since PostgreSQL versions below 14 are performing poorly with custom query plans, we recommend upgrading to a newer PostgreSQL version

<x-alert type="info">
    The PostgreSQL pgrade is only needed if you are extensively using your Public API and running a version prior to PostgreSQL 14. If you are on Ubuntu version 22.x.x, you will have version 14 installed and you don't require to upgrade.
</x-alert>

> Upgrading a complex software project always comes at the risk of breaking something, so make sure you have a backup.

## Upgrade Steps

<x-alert type="warning">
    You need at least 60GB of free storage on your server before updating PostgreSQL. If you don't have the required space, you can also setup a new server instead and upgrade PostgreSQL before syncing core from 0, as that will require less disk space.
</x-alert>

The procedure below gives you the exact steps needed for the upgrade to the latest PostgreSQL version.

<x-alert type="info">
    These steps have only been tested on Ubuntu versions 18 and 20.
</x-alert>

**Stop Core and install latest PostgreSQL.**

```bash
pm2 stop all
curl -sL https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | sudo tee /usr/share/keyrings/pgdg.gpg >/dev/null
echo "deb [signed-by=/usr/share/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt $(grep DISTRIB_CODENAME /etc/lsb-release | cut -d'=' -f2)-pgdg main" | sudo tee /etc/apt/sources.list.d/pgdg.list
sudo apt-get update && sudo apt-get install postgresql -y
```

**Drop the default new PostgreSQL cluster created with the install and perform the upgrade process**

```bash
sudo pg_dropcluster --stop $(pg_lsclusters -h | awk 'NR==2' | awk '{print $1}') main
sudo pg_upgradecluster $(pg_lsclusters -h | awk '{print $1}') main
```

**Make sure you are able to list DBs**

```bash
PGUSER=$(grep CORE_DB_USER .config/ark-core/mainnet/.env | cut -d'=' -f2)
PGPASSWORD=$(grep CORE_DB_PASSWORD .config/ark-core/mainnet/.env | cut -d'=' -f2)
psql -l
```

- You should see your ARK DB.

**Remove the old PostgreSQL version and PG cluster**

```bash
sudo apt-get purge postgresql-contrib postgresql-$(pg_lsclusters -h | awk 'NR==1' | awk '{print $1}') -y
```

**Finally restart your new PostgreSQL and start Core**

```bash
sudo systemctl restart postgresql
pm2 start all
```

## Reporting Problems

If you happen to experience any issues please [open an issue](https://github.com/ArkEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it and info about your environment.
