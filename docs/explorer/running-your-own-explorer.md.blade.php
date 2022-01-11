---
title: How To Deploy Blockchain Explorer
---

# How To Deploy Blockchain Explorer

Deploying the Explorer requires a few things to guarantee smooth operation. If you don't want to deal with all of the deployment hassles, we would recommend using [Laravel Forge](https://forge.laravel.com/) and [Laravel Envoyer](https://envoyer.io/) or [Laravel Vapor](https://vapor.laravel.com/) if you prefer to go serverless and forget about scaling.

## Core

It's best to set up a Core instance behind a Firewall with remote access to your database with a read-only user where all public services, like APIs and Webhooks, are disabled to reduce unnecessary overhead. In the case of serving Explorer data, a Core instance's sole job should be to sync data, preserving computational resources for PostgreSQL.

## Explorer Databases

Explorer relies on two separate databases. A Core database serves data to the Explorer, and the other database is for local storage of additional data (e.g. forging statistics). To improve the stability and performance of your setup, you could optionally run a separate database server that can only be accessed by Core and Explorer instead of running the database and Core on the same server.

<x-alert type="info">
Keep Core and Database servers in the same geo locations to avoid high latency and delayed I/O operations.
</x-alert>

## Requirements

| Specifications | RAM       | CPUs      | Information |
| :------------- | :-------: | :-------: | :-- |
| Minimum        | **8GB**   | **4**     | The absolute bare minimum. |
| Recommended    | **16GB**    | **8**     | Ensures smooth and effective data aggregation and computation. |
| Ideal          | **32GB**    | **16**    | Provides Explorer and Core with ample room for spikes in resource consumption. |

<x-alert type="info">
Make sure to configure PostgreSQL according to your machine's available resources. Tools like [PGTune](https://pgtune.leopard.in.ua/#/) provide a good idea of which settings would be appropriate.
</x-alert>

## Installation

> Before continuing with this guide: You'll need access to your Core instance's database. Your credentials must be specified using the `EXPLORER_DB_*` variable of your `.env` file.

### Clone

Before getting started, you'll have to clone the repository and install the composer and yarn dependencies. The `yarn` dependencies are needed for the `@arkecosystem/crypto` package and are used to derive multi-signature addresses.

```bash
git clone https://github.com/ArkEcosystem/explorer.git
cd explorer

composer install
yarn
```

### Preparing Application

Next up is preparing the application by copying all necessary files, generating an application key, and migrating the database.

```bash
cp .env.prod .env
php artisan key:generate

# Setup a PSQL database locally, then run
php artisan migrate:fresh
php artisan storage:link
```

### Configuring Environment

Finally, you'll need to open the `.env` file and edit the following variables. _You should leave all other variables at their defaults._

```ini
APP_NAME="Your Explorer Title"
APP_URL=http://your-domain.com

EXPLORER_NETWORK=production
EXPLORER_DB_HOST=YOUR_CORE_DATABASE_IP_ADDRESS
EXPLORER_DB_PORT=YOUR_CORE_DATABASE_PORT
EXPLORER_DB_DATABASE=YOUR_CORE_DATABASE
EXPLORER_DB_USERNAME=YOUR_CORE_DATABASE_USERNAME
EXPLORER_DB_PASSWORD=YOUR_CORE_DATABASE_PASSWORD
```

> We do recommend setting `PDO_ATTR_PERSISTENT` to `true` (the default) to enable persistent PostgreSQL connections. Using persistent connections greatly increases the execution time of database queries on pages that execute lots of queries because the server won't need to establish a new connection for every query. Note that this also requires more resources to keep up the connections but ultimately yields a smoother experienced.

### Cronjobs

Explorer performs a lot of tasks in the background. These tasks are executed on a specific schedule and require setting up the task scheduler. Take a look at the official [Starting The Scheduler](https://laravel.com/docs/8.x/scheduling#starting-the-scheduler) guide by [Laravel](https://laravel.com/).

> If using Laravel Forge, you can create this through their "Scheduler" UI.

Important to note is that the Explorer caches views, so it's advised to clear the cache periodically as these can amount to a lot of files over time due to the dynamic nature of the Explorer page contents. You can do this by setting up a nightly cronjob that runs `php artisan view:clear` to clear the view cache of any obsolete view files.

#### Starting Horizon

Take a look at the official [Deploying Horizon](https://laravel.com/docs/8.x/horizon#deploying-horizon) guide by [Laravel](https://laravel.com).

> If using Laravel Forge, you can create this through their "Daemons" UI.

#### Starting Short Schedule

Take a look at the official [Deploying Short Schedule](https://github.com/spatie/laravel-short-schedule#installation) guide by [Laravel](https://spatie.be).

> If using Laravel Forge, you can create this through their "Daemons" UI.

### Caching

Now that the task scheduler and Horizon are running, you'll need to run the following commands to cache all of the data required for the Explorer to function.

```bash
php artisan explorer:cache-network-aggregates
php artisan explorer:cache-fees
php artisan explorer:cache-transactions
php artisan explorer:cache-prices
php artisan explorer:cache-currencies-data
php artisan explorer:cache-currencies-history --no-delay
php artisan explorer:cache-delegate-aggregates
php artisan explorer:cache-delegate-performance
php artisan explorer:cache-delegate-productivity
php artisan explorer:cache-delegate-resignation-ids
php artisan explorer:cache-delegate-usernames
php artisan explorer:cache-delegate-wallets
php artisan explorer:cache-delegates-with-voters
php artisan explorer:cache-delegate-voter-counts
php artisan explorer:cache-multi-signature-addresses
```

### Delegate Performance

Missed blocks are stored in an additional database to calculate performance metrics for delegates. These values represent performance from the past 30 days. Generate them the first time you run the Explorer by executing `php artisan explorer:forging-stats-build --days=30`. While this calculation may initially take a while to run, new values get appended through scheduled jobs after storing the initial 30 days.

### Vote Report

The vote report text file gets created using the `explorer:generate-vote-report` command, which runs every 5 minutes by default. This job requires the existence of `jq`, so make sure to install that if it's not available in your environment.

## Updates

Do not enter any additional commands when updating the Explorer. Instead, execute all commands precisely and in the specified order to avoid unexpected issues and reduce potential downtime.

### Clear Cache

```bash
php artisan responsecache:clear
php artisan view:clear
php artisan config:clear
```

### Restart Horizon

```bash
php artisan horizon:purge
php artisan horizon:terminate
```

### Cache Configuration

```bash
php artisan config:cache
```

### Cache Routes

```bash
php artisan route:cache
```
