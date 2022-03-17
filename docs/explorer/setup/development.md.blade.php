---
title: Setup - Development
---

# Development Setup

![](/storage/docs/docs/explorer/assets/setup/development-setup.png)

***The following information will provide all the details necessary to set up an instance of Explorer for a development environment. Developers should ideally possess the requisite knowledge regarding the configuration and handling of databases as well as experience working in both PHP and Laravel environments. Further to this, a working knowledge of PHP 8, Composer, and Valet should make the setup process significantly easier.***

<x-alert type="info">
Explorer 4.0 requires *two separate databases*, namely a **Core database** that serves data to the Explorer, and another for local storage of additional data (such as forging statistics, for instance).
</x-alert>

## Requirements

In order to successfully carry out a development installation of Explorer, you will need to download and install the following before proceeding further:

- [Composer](https://getcomposer.org/download)
- [jq](https://stedolan.github.io/jq/download/)
- [PHP 8](https://www.php.net/manual/install.php)
- [Valet](https://laravel.com/docs/9.x/valet)
- [Yarn](https://classic.yarnpkg.com/docs/install)

## Setup

The following instructions will guide you through the setup and configuration process using [Valet](https://laravel.com/docs/9.x/valet). Other methods of installation will follow a similar approach, but some steps may not necessarily coincide with the instructions detailed here.

---

### Acquire Files

**Clone the Repository** - To begin, enter the following command to clone the Explorer repository and wait for it to copy all the necessary files onto your system.

```bash
git clone ssh://github.com/ArkEcosystem/explorer.git
```

---

**Install Dependencies** - `cd` into your Explorer folder and run the relevant commands to install the necessary Composer and Yarn dependencies. Bear in mind that this process may take several minutes to complete depending on your location and/or internet connection.

```bash
cd explorer
composer install --ignore-platform-reqs
yarn
```

---

### Prepare the Application

**Generate the Environment** - Run the following command to create a copy of the default environment variables for Explorer. This will generate a `.env` file containing some of the necessary data you will require for your development instance. Naturally you will need to configure some parameters in accordance with your unique setup, but we will cover this in [Adjust Environment Variables.](https://docs.ihost.org/docs/explorer/setup/development/#adjust-environment-variables)

```bash
cp .env.example .env
```

---

**Create a Database** - As mentioned earlier, Explorer requires two databases, one of which is a local database for forging statistics. By default, the `.env` file is configured to use SQlite via the `DB_CONNECTION=sqlite` setting. As such, the default database name it will look for is `database.sqlite`, so create the necessary file by running `touch database/database.sqlite`.

<x-alert type="hint">
While SQLite will work, it is also possible to use PostgreSQL. To learn more about how to set up a PostgreSQL database, click [here.](https://www.postgresql.org/docs/current/sql-createdatabase.html)
</x-alert>

---

### Adjust Environment Variables

**Configure the Environment** - You will then need to edit the parameters in your `.env` so that it uses both of your databases. With regards to your local database, if you created a `database.sqlite` file, there is no need to make any further adjustments since the default value is `DB_CONNECTION=sqlite`. However, if you set up a database using PostgreSQL, you will need to alter the parameters accordingly:

```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=<your-database-name>
DB_USERNAME=<your-username>
DB_PASSWORD=<your-password>
```

The next step involves setting the parameters for your core database. You will need to fill in the necessary details for either a local connection or a PostgreSQL database. Regardless of which applies to your installation, you will use the exact same environment variables but enter in any values that apply to your particular database.

```ini
EXPLORER_NETWORK=development
EXPLORER_DB_HOST=127.0.0.1 for local, or an ip address for remote
EXPLORER_DB_PORT=5432
EXPLORER_DB_DATABASE=<your-database-name>
EXPLORER_DB_USERNAME=<your-username>
EXPLORER_DB_PASSWORD=<your-password>
```

In addition to the above, ensure that the `CACHE_DRIVER=` is set to `redis` (the current default is `file`).

---

### Generate Placeholder Data (Only for Local Testing)

This section is only relevant if you wish to access local testing data. In other words, if your `.env` configuration points to a core node, ignore this section and complete your setup accordingly.

<x-alert type="warning">
Use the following two commands in order to generate placeholder data if you do not have access to a **Core Node Database**. Note that the `EXPLORER_DB_DATABASE=` variable must match the exact name of your database or your instance of Explorer will fail to run. Also note that you will need to set up a PostgreSQL database and adjust your `.env` to point to it.
</x-alert>

**Generate Placeholder Data** - *(Remember to only execute these commands if required)*.

```bash
php artisan migrate --path=tests/migrations --database=explorer
composer play
```

---

### Further Information Regarding Environment Variables

Explorer makes use of telescope, debugbar and response cache, each of which possesses its own `.env` variables to adjust during development. As such, you can enable or disable these according to your needs by modifying the following parameters:

```ini
TELESCOPE_ENABLED=false
DEBUGBAR_ENABLED=false
RESPONSE_CACHE_ENABLED=false
```

In addition to the above, several custom variables apply to Explorer. Naturally you may configure these according to your unique requirements. The following list outlines some of the more important aspects in greater detail.

**Custom Variables:**

<dl>
  <dt><code><strong>DARK_MODE_ENABLED=true</strong></code></dt>
  <dd>The default value for Dark Mode is set to <code>true</code> since Explorer 4.0 comes with a custom Dark Mode UI. However, if you wish to disable it, you can do so here.</dd>

  <dt><code><strong>EXPLORER_URI_PREFIX=ark</strong></code></dt>
  <dd>When making use of the QR code that generates on <strong>Wallet Detail</strong> pages, a URI will prefix it. As such, you may define which URI to use in order to make it compatible with other applications. The default value here is set to <code>ark</code> as this works with the ARK-branded wallet.</dd>

  <dt><code><strong>EXPLORER_NETWORK=development</strong></code></dt>
  <dd>The default for Explorer 4.0 is set to a development network. You may change this to a production environment by replacing <code>development</code> with <code>production</code> for instance. You might want to use custom environment variables, but only <code>development</code> and <code>production</code> exist by default. Should you require a custom network, you can inspect the available network variables in the <a href="https://github.com/ArkEcosystem/explorer/blob/develop/config/explorer.php#L14">configuration file</a>. You may then set these in your <code>.env</code> file, or you can adjust or extend the options therein.</dd>

  <dt><code><strong>EXPLORER_MARKET_DATA_PROVIDER_SERVICE=coingecko</strong></code></dt>
  <dd>Explorer makes use of <strong>coingecko</strong> to obtain its data. Should you wish to use a different market data provider, you may implement your own class and configure your <code>.env</code> file to use that instead. Bear in mind that that you will need to add your market data provider implementation in the code. You can view examples in the <code>app/Services/MarketDataProviders</code> folder along with the corresponding interface it must implement.</dd>
</dl>

---

### Complete the Setup

**Generate an Application Key** - Run the following command to set the `APP_KEY` value in your `.env` file.

```bash
php artisan key:generate
```

<x-alert type="warning">
If no database exists, running the `php artisan key:generate` command will result in an error.
</x-alert>

---

**Set up Your Local Database** - Run the following command to set up your local database to store delegate forging statistics.

```bash
php artisan migrate:fresh
```

---

**Start Horizon and Cache All Required Data** - Having set up your databases, run the first of the following commands to start Horizon. Then run the second command to cache all the required data for Explorer.

```bash
php artisan horizon
php artisan explorer:cache-development-data
```

---

**Create Symlink and Enable Hot Reloading** - Run the first of the following commands to create a symlink to your `public` folder. When this completes, execute the second command so that any changes you make to the UI will reflect during the development process.

```bash
php artisan storage:link
yarn watch
```

---

**Create Symbolic Link** - Finally, run this command to link Valet so that your instance of Explorer will appear in your browser.

```bash
valet link explorer
```

![](/storage/docs/docs/explorer/assets/setup/development-laravel-valet.png)

<x-alert type="success">
Having finalized this step, navigate to `explorer.test` in your browser. If everything went as intended, you should see all the relevant data clearly displayed on the UI.
</x-alert>

## Delegate Performance

An additional database stores missed blocks in order to derive performance metrics for delegates. These values represent the average performance levels based on data from the past 30 days. To generate them for the first time you run Explorer, execute the command `php artisan explorer:forging-stats-build --days=30`.

<x-alert type="info">
The initial calculation may take a while to run, but scheduled jobs append new values once storage of the initial 30 days has taken place.
</x-alert>

## Vote Report

You can create a vote report text file by executing the `explorer:generate-vote-report` command. By default, this process runs every 5 minutes.
