---
title: How To Deploy Blockchain Explorer For Development?
---

# How To Deploy Blockchain Explorer For Development?

Currently the instructions are for Valet

```bash
git clone https://github.com/ArkEcosystem/explorer.git
cd explorer
composer install
yarn install

cp .env.example .env
php artisan key:generate
php artisan migrate:fresh
## You can run these commands to create a core database with fake data (change EXPLORER_DB_DATABASE to your actual database name))
# php artisan migrate --path=tests/migrations --database=explorer
# composer play
php artisan storage:link
yarn run watch

valet link explorer
```

*Important:* You will need access to a Core Postgres database, or use the commented lines above to fill it with dummy data. The details can be specified in the `.env` file under `EXPLORER_DB_*`.

## Caching

Before access the Explorer you'll need to cache data that is accessed a lot. Run `php artisan horizon` and then `php artisan explorer:cache-development-data` and wait until it has finished.

Afterwards, you can navigate to `explorer.test` in your browser to see it in action.

## Delegate Performance

Missed blocks are stored in an additional database to calculate performance metrics for delegates. These values are based on the performance of the past 30 days max, and will need to be generated the first time the explorer is run to fill the void of the past 30 days. This can be done by running `php artisan explorer:forging-stats-build --days=30`. Note that this may take a while to run, but after the initial 30 days are stored the new values will be appended to it through scheduled jobs.

## Votereport

The votereport text file is generated through the `explorer:generate-vote-report` command, which runs every 5 minutes by default. This job requires the existence of `jq`, so make sure to install that if it's not available in your environment.
