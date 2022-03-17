---
title: Setup - Production
---

# Production Setup

![](/storage/docs/docs/explorer/assets/setup/production-setup.png)

***The following information will provide all the details necessary to set up an instance of Explorer for production. Before embarking on the installation process, you will need to acquire or gain access to a Virtual Private Server (VPS). In addition, you will need to install several different components and packages onto your server before cloning the Explorer repository and installing the required dependencies. See the requirements below and ensure that you have everything ready before proceeding further.***

<x-alert type="info">
Explorer 4.0 requires *two separate databases*, namely a **Core database** that serves data to the Explorer, and another for local storage of additional data (such as forging statistics, for instance).
</x-alert>

## Requirements

**Hardware** - As aforementioned, you will need to acquire a VPS in order to install Explorer for production. Take note of the requirements specified below and ensure that your VPS is capable of running Explorer.

| Specifications | RAM       | CPUs      | Information |
| :------------- | :-------: | :-------: | :-- |
| Minimum        | **8GB**   | **4**     | The absolute bare minimum |
| Recommended    | **16GB**  | **8**     | Ensures smooth and effective data aggregation and computation |
| Ideal          | **32GB**  | **16**    | Provides Explorer and Core with ample room for spikes in resource consumption |

<x-alert type="info">
If you do not want to deal with the complexities of deployment, we recommend using [Laravel Forge](https://forge.laravel.com/) and [Laravel Envoyer](https://envoyer.io/) or [Laravel Vapor](https://vapor.laravel.com/) if you prefer to go serverless and forget about scaling. Note that you will need to pay for these services, so take this into account before investigating further.
</x-alert>

**Software** - You will need to install several items onto your VPS in order for Explorer to work correctly. As such, you will need to install **everything** listed under [Server Requirements](https://laravel.com/docs/8.x/deployment#server-requirements) in the official Laravel documentation - note that you will require at least [PHP 8.0](https://www.php.net/manual/install.php) and that all extensions you install will need to align with this.

In addition, you will also need to install the following items:

- [Composer](https://getcomposer.org/download) (minimum version 2)
- [GNU Multiple Precision](https://www.php.net/manual/en/gmp.installation.php) *(PHP Extension)*
- [Internationalization Functions](https://www.php.net/manual/en/intl.installation.php) *(PHP Extension)*
- [Nginx](https://nginx.org/en/download.html)
- [Node.js](https://nodejs.org/en/download/)
- [PostgreSQL](https://www.postgresql.org/download/) (minimum version 12)
- [Redis](https://redis.io/download)
- [SQLite](https://www.sqlite.org/download.html)
- [Supervisor](https://laravel.com/docs/9.x/horizon#installing-supervisor)
- [Yarn](https://classic.yarnpkg.com/docs/install) (latest 1.x release, *not* version 2)

<x-alert type="hint">
Explorer 4.0 requires PHP 8.0 in order to run. When installing extensions, ensure that you select the appropriate version before doing so. For everything else, you should install the latest versions to avoid any unnecessary issues.
</x-alert>

## Setup

The following instructions will guide you through the setup and configuration process for a VPS. Take care to ensure that you have satisfied all the abovelisted requirements and reviewed the additional points before continuing.

---

### Acquire Files

**Clone the Repository** - To begin, enter the following command to clone the Explorer repository and wait for it to copy all the necessary files onto your VPS.

```bash
git clone https://github.com/ArkEcosystem/explorer.git
```

---

**Install Dependencies** - `cd` into your Explorer folder and run the relevant commands to install the necessary Composer and Yarn dependencies. Bear in mind that this process may take several minutes to complete depending on your location and/or internet connection.

```bash
cd explorer
composer install --ignore-platform-reqs --optimize-autoloader --no-dev
yarn
```

---

### Prepare the Application

**Generate the Environment** - Run the following command to create a copy of the default environment variables for Explorer. This will generate a `.env` file containing some of the necessary data you will require for your production instance. Naturally you will need to configure some parameters in accordance with your unique setup, but we will cover this in [Adjust Environment Variables.](https://docs.ihost.org/docs/explorer/setup/production/#adjust-environment-variables)

```bash
cp .env.example .env
```

---

**Create a Database** - As previously stated, Explorer requires two databases, one of which is a local database for forging statistics. By default, the `.env` file is configured to use SQlite via the `DB_CONNECTION=sqlite` setting. As such, the default database name it will look for is `database.sqlite`, so create the necessary file by running `touch database/database.sqlite`.

<x-alert type="hint">
While SQLite will work, it is also possible to use PostgreSQL. To learn more about how to set up a PostgreSQL database, click [here.](https://www.postgresql.org/docs/current/sql-createdatabase.html)
</x-alert>

---

### Adjust Environment Variables

**Configure the Environment** - You will then need to `nano` into your `.env` file and edit the parameters so that it uses both of your databases. With regards to your local database, if you created a `database.sqlite` file, there is no need to make any further adjustments since the default value is `DB_CONNECTION=sqlite`. However, if you set up a database using PostgreSQL, you will need to alter the parameters accordingly:

```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=<your-database-name>
DB_USERNAME=<your-username>
DB_PASSWORD=<your-password>
```

The next step involves setting the parameters for your core database - if you have not yet set up a core database, please follow the [Core Setup](https://docs.ihost.org/docs/explorer/setup/core) guide before proceeding further.

You will need to fill in the necessary details for either a local connection or a PostgreSQL database. Regardless of which applies to your installation, you will use the exact same environment variables but enter in any values that apply to your particular database.

```ini
EXPLORER_NETWORK=production
EXPLORER_DB_HOST=127.0.0.1 for local, or an ip address for remote
EXPLORER_DB_PORT=5432
EXPLORER_DB_DATABASE=<your-database-name>
EXPLORER_DB_USERNAME=<your-username>
EXPLORER_DB_PASSWORD=<your-password>
```

In addition to the above, ensure that you set the following parameters as specified:

```ini
APP_ENV=production
APP_DEBUG=false
```

<x-alert type="hint">
For more information about the function of the `APP_DEBUG=` parameter, please review the [Debug Mode](https://laravel.com/docs/8.x/deployment#debug-mode) section of the official Laravel documentation.
</x-alert>

Finally, change these from the default `file` parameter:

```ini
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
```

---

### Finalize Explorer Setup

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

**Start Horizon** - Having set up your databases, run the following command to start Horizon. Then run the second command to cache all the required data for Explorer. Note that you should only execute the second command on the initial setup and rely on the scheduled jobs located in the `Kernel.php` file (located [here](https://github.com/ArkEcosystem/explorer/blob/master/app/Console/Kernel.php)) thereafter.

```bash
php artisan horizon
php artisan explorer:cache-development-data
```

<x-alert type="hint">
For more information about Horizon, please review the section on [Running Horizon](https://laravel.com/docs/8.x/horizon#running-horizon) in the official Laravel documentation. Note that you will need to have [Supervisor](https://laravel.com/docs/9.x/horizon#installing-supervisor) installed and configured in order for Horizon to work as intended, otherwise errors will result.
</x-alert>

### Delegate Performance

An additional database stores missed blocks in order to derive performance metrics for delegates. These values represent the average performance levels based on data from the past 30 days. To generate them for the first time you run Explorer, execute the command `php artisan explorer:forging-stats-build --days=30`.

<x-alert type="info">
The initial calculation may take a while to run, but scheduled jobs append new values once storage of the initial 30 days has taken place.
</x-alert>

### Vote Report

You can create a vote report text file by executing the `explorer:generate-vote-report` command. By default, this process runs every 5 minutes.

---

### Conducting a Preliminary Check

Before attempting to setup Nginx, check that Explorer is working correctly by running `php artisan serve --host 0.0.0.0`. This will make it available on the server's IP via port `8000`, meaning you can connect directly to it by entering `http://<your-server-ip>:8000` in your browser. If Explorer runs as intended, then any further issues that may occur will relate to Nginx rather than something else in your configuration.

---

### Configure Your Web Server

The final step in the Production setup entails configuring your web server for Explorer. As such, we use and recommend [Nginx](https://www.nginx.com) - follow the example under [Server Configuration](https://laravel.com/docs/8.x/deployment#nginx) in the official Laravel documentation to set up Nginx.

![](/storage/docs/docs/explorer/assets/setup/production-setup-nginx.png)

Once you have completed the setup, you can navigate to your Explorer by entering in `http://<your-server-ip>`. Alternatively, if you set up a domain, navigate to `http://<your-domain-name>` and view your instance of Explorer there.

<x-alert type="info">
You can also configure your web server using [Apache](https://www.apache.org/) instead. However, the guide and process for this is not covered in our documentation. Consult the relevant resources if you wish to use Apache for your setup.
</x-alert>
