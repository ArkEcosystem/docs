---
title: How To Deploy Blockchain Explorer For Development
---

# How To Deploy Blockchain Explorer For Development

This page will guide developers through the process of setting up and deploying an Explorer development instance.

Developers should be familiar with configuring and handling databases and be comfortable developing in PHP and Laravel environments. In particular, working knowledge of PHP 8, Composer, and Valet are highly recommended.

<x-alert type="info">
Explorer relies on two separate databases. A Core database serves data to the Explorer, and the other database is for local storage of additional data (e.g. forging statistics).
</x-alert>

## Prerequisites

* PHP 8 - [https://www.php.net/manual/install.php](https://www.php.net/manual/install.php)
* Composer - [https://getcomposer.org/download](https://getcomposer.org/download)
* Yarn - [https://classic.yarnpkg.com/docs/install](https://classic.yarnpkg.com/docs/install)

## Setup

The following instructions demonstrate setup and configuration using [Valet](https://laravel.com/docs/8.x/valet).

```bash
git clone https://github.com/ArkEcosystem/explorer.git
cd explorer

composer install --ignore-platform-reqs --optimize-autoloader
yarn

cp .env.example .env
php artisan key:generate
php artisan migrate:fresh

## Use the following two commands to generate placeholder data.
## This is as an alternative to using a Core Node database.
## The 'EXPLORER_DB_*' variable must match the exact name of your database.
## placeholder data commands:
# - php artisan migrate --path=tests/migrations --database=explorer
# - composer play

php artisan storage:link
yarn watch

valet link explorer
```

<x-alert type="danger">
**IMPORTANT**: You'll need access to a Core Postgres database to successfully launch an Explorer instance. Alternatively, the `test/migrations` and `composer play` commands commented above may be utilized to produce placeholder data. This detail must be specified using the `EXPLORER_DB_*` variable of your `.env` file.
</x-alert>

## Caching

Before accessing the Explorer you'll need to cache data that is accessed a lot. Run `php artisan horizon` and then `php artisan explorer:cache-development-data` and wait until it has finished.

Afterward, you can navigate to `explorer.test` in your browser to see it in action.

## Delegate Performance

Missed blocks are stored in an additional database to calculate performance metrics for delegates. These values represent performance from the past 30 days. Generate them the first time you run the Explorer by executing `php artisan explorer:forging-stats-build --days=30`. While this calculation may initially take a while to run, new values get appended through scheduled jobs after storing the initial 30 days.

## Vote Report

The vote report text file gets created using the `explorer:generate-vote-report` command, which runs every 5 minutes by default. This job requires the existence of `jq`, so make sure to install that if it's not available in your environment.
