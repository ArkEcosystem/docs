---
title: How To Deploy Blockchain Explorer?
---

# How To Deploy Blockchain Explorer?

Deploying the Explorer requires a few things to guarantee smooth operation. If you don't want to deal with all of the deployment hassle we would recommend to use [Laravel Forge](https://forge.laravel.com/) and [Laravel Envoyer](https://envoyer.io/) or [Laravel Vapor](https://vapor.laravel.com/) if you prefer to go serverless and forget about scaling.

## Core

The recommended setup would be that you run a Core instance behind a Firewall with remote access to your database with a read-only user. This instance should have all public services like APIs and Webhooks disabled to reduce the load on it as much as possible. Its sole job should be to sync data and leave as much resources as possible to PostgreSQL.

We recommend that this instance has at a bare-minimum 8GB of RAM and 4 CPU Cores. This is the absolute bare-minimum but for smooth operations that are able to handle all of the data aggregation and computations that are performed we recommend at least 16GB of RAM and 8 CPU Cores. The ideal setup would be an instance that has 32GB of RAM and 16 CPU Cores which will leave Explorer and Core with more than enough room for spikes in resource consumption. Also, make sure that you configure your PostgreSQL accordingly to the resources available on your machine. You can use a tool like [PGTune](https://pgtune.leopard.in.ua/#/) to get a better idea of what settings would be appropriate.

If you would want to further improve the stability and performance of your setup you could run a separate database server that can only be accessed by Core and Explorer instead of running the database and Core on the same server. Keep in mind that you should keep your Core and Database server in the same geo location to avoid high latency which could cause delayed I/O operations.

## Installation

> Before continuing with this guide: You will need access to the database of a core instance. The credentials can be specified in the `.env` file under `EXPLORER_DB_*`.

### Clone

Before getting started you'll have to clone the repository and install the composer and yarn dependencies. The yarn dependencies are needed for the `@arkecosystem/crypto` package which is used to derive multi-signature addresses.

```bash
git clone https://github.com/ArkEcosystem/explorer.ark.io.git explorer
cd explorer
composer install
yarn install
```

### Preparing Application

Next up is preparing the application by copying all necessary files, generating an application key and migrating the database.

```bash
cp .env.prod .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh
php artisan storage:link
```

### Configuring Environment

Finally you'll need to open the `.env` file and edit the following variables. *You should leave all other variables at their defaults.*

```ini
APP_NAME="Your Explorer Title"
APP_URL=http://your-domain.com

EXPLORER_NETWORK=production
EXPLORER_DB_HOST=YOUR_CORE_DATABASE_IP_ADDRESS
EXPLORER_DB_PORT=YOUR_CORE_DATABASE_PORT
EXPLORER_DB_DATABASE=YOUR_CORE_DATABASE
EXPLORER_DB_USERNAME=YOUR_CORE_DATABASE_USERNAME
EXPLORER_DB_PASSWORD=YOUR_CORE_DATABASE_PASSWORD

; You can find out the path by running "which node" and then use the output.
EXPLORER_NODEJS=/path/to/your/nodejs/installation
```

> We do recommend to set `PDO_ATTR_PERSISTENT` to `true` (which is the default) to make use of persistent PostgreSQL connections. This greatly increases the execution time of database queries on pages that execute a lot of queries because the server won't have to establish a new connection for every query. Keep in mind that this requires more resources to keep up the connections but ultimately yields a smoother experienced.

### Cronjobs

Explorer performs a lot of tasks in the background. These tasks are executed on a specific schedule and require the task scheduler to be set up. Take a look at the official [Starting The Scheduler](https://laravel.com/docs/8.x/scheduling#starting-the-scheduler) guide by [Laravel](https://laravel.com/).

> If you are using Laravel Forge you can create this through their "Scheduler" UI.

### Daemons

Explorer performs a lot of tasks in the background. These tasks are executed on a specific schedule and require the task scheduler to be set up. Take a look at the official [Starting The Scheduler](https://laravel.com/docs/8.x/scheduling#starting-the-scheduler) guide by [Spatie](https://laravel.com/).

#### Starting Horizon

Take a look at the official [Deploying Horizon](https://laravel.com/docs/8.x/horizon#deploying-horizon) guide by [Laravel](https://laravel.com/).

> If you are using Laravel Forge you can create this through their "Daemons" UI.

#### Starting Short Schedule

Take a look at the official [Deploying Short Schedule](https://github.com/spatie/laravel-short-schedule#installation) guide by [Laravel](https://spatie.be/).

> If you are using Laravel Forge you can create this through their "Daemons" UI.

### Caching

Now that the task scheduler and Horizon are running you'll need to run the below commands in order to cache all of the data that is required for the Explorer to function.

```bash
php artisan explorer:cache-network-status
php artisan explorer:cache-network-aggregates
php artisan explorer:cache-last-blocks
php artisan explorer:cache-fees
php artisan explorer:cache-prices
php artisan explorer:cache-delegate-aggregates
php artisan explorer:cache-delegate-performance
php artisan explorer:cache-delegate-productivity
php artisan explorer:cache-delegate-resignation-ids
php artisan explorer:cache-delegate-usernames
php artisan explorer:cache-delegate-wallets
php artisan explorer:cache-delegates-with-voters
php artisan explorer:cache-multi-signature-addresses
```

## Updates

When updating the Explorer there are a few things to keep in mind. All of them should be executed in the specified order to avoid unexpected issues. You shouldn't run any commands besides those when updating to ensure that the update is completed as fast as possible to reduce potential downtime.

### Restart Horizon

```bash
php artisan horizon:purge
php artisan horizon:terminate
```

### Clear Cache

```bash
php artisan responsecache:clear
php artisan view:clear
```

### Cache Configuration

```bash
php artisan config:cache
```

### Cache Routes

```bash
php artisan route:cache
```
