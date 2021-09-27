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
