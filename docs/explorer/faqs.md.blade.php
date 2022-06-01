---
title: Troubleshooting
---

# Explorer Troubleshooting

![](/storage/docs/docs/explorer/assets/explorer-troubleshooting.png)

***You may run in to some issues when attempting to set up an instance of Explorer 4.0 for the first time. For your convenience, the answers to some frequently asked questions (FAQs) as well as some helpful information related to the functioning of Explorer appear below.***

<x-alert type="info">
Should none of the points listed below resolve your problem, please [contact us directly](https://ark.dev/contact) and fill out the form describing your issue to the best of your ability so that we can address it accordingly.
</x-alert>

## FAQs

**My sender and recipient wallets show mixed devnet/mainnet values** or **A 404 Error appears when navigating to the wallet.**

Make sure that `EXPLORER_NETWORK=` is set to the relevant value *(either `development` or `production`).*

---

**I updated my `.env` file but the changes do not reflect.**

You will need to run `php artisan config:cache` to clear the cache, followed by `php artisan horizon:terminate` to restart horizon to fetch the new values.

---

**I get a 500 Error when navigating to the Explorer.**

Check your logs by navigating to `storage/logs/laravel.log` and reviewing the information contained therein. This should tell you more about the exact nature of the problem and give you some indication as to how to solve it.

---

**Running `php artisan key:generate` results in an error.**

Explorer makes use of two databases, one of which is a local database for forging statistics where **SQLite** is the default setting. As such, you will need to generate a database by entering `touch database/database.sqlite`. If preferred, you may use **PostgreSQL** instead. For more information on how to set up a PostgreSQL database, click [here.](https://www.postgresql.org/docs/current/sql-createdatabase.html)

---

**The data I expected to see fails to load** or **I see stale data when navigating to Explorer.**

Ensure that you execute `php artisan explorer:cache-development-data` so that all the required data for Explorer is loaded.

---

**When attempting to view the Delegate Monitor, an error message appears.**

In a production environment, you will need to run `php artisan explorer:cache-delegate-wallets` in order to cache delegate usernames and assign them to wallets, and `php artisan explorer:cache-delegate-resignation-ids` to cache IDs related to resignation transactions - ensure that you execute both of these commands in order to avoid errors pertaining to the Delegate Monitor.

---

**How can I conduct a preliminary check when preparing Explorer for production?**

Before attempting to set up your web server, check that Explorer is working correctly by running `php artisan serve --host 0.0.0.0.` This will make it available on the server’s IP via port `8000`, meaning you can connect directly to it by entering `http://<your-server-ip>:8000` in your browser. If Explorer runs as intended, then any further issues that may occur will relate to your web server rather than something else in your configuration.

---

**Where can I find information regarding commands for a production environment?**

Click [here](https://github.com/ArkEcosystem/explorer/blob/develop/app/Console/Kernel.php) to view the `Kernel.php` file that contains all commands as well as how frequently they run. You can use these to ensure that your caches remain up to date.

---

**I have adjusted the parameters for my Core database but cannot get Explorer to work.**

You will need to set up a **Core database** before attempting to set up Explorer. Please follow the [Core Setup](/docs/explorer/setup/core) guide before proceeding further with your installation.

Alternatively, you may use **dummy data** for testing purposes by following the [Generate Placeholder Data](/docs/explorer/setup/development/#generate-placeholder-data-only-for-local-testing) section of the [Development Setup](/docs/explorer/setup/development) documentation.

---
