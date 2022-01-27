---
title: Getting Started - Production Setup
---

# Nodem Production Setup

<!--
TODO: Describe manual setup w/PHP + nginx + PostgreSQL (https://laravel.com/docs/8.x/deployment)?
-->

{{-- The application relies on the `cmd` function that is used to run a `ping` command on the terminal and extract the server response time, this function should work in most cases, but there are some considerations to take in mind:

* The `ping` command may not work in Windows-based servers
* Some servers may not have permission to run the PHP `cmd` function. --}}

This section will guide developers through the steps necessary to set up Nodem in a production environment and requires a separate Core Server. This process is relatively similar to Laravel Forge's [development setup.](https://forge.laravel.com) You should be familiar with using PHP, Composer, and PostgreSQL.

## Requirements

Make sure you have the following installed and ready to work with:

* [Git](https://git-scm.com/)
* [PHP 8](https://www.php.net/releases/8.0)
* [Composer](https://getcomposer.org)
* [PostgreSQL](http://www.postgresql.org)
* [Yarn](https://classic.yarnpkg.com)
* [Nginx](https://www.nginx.com/resources/wiki/start/topics/tutorials/install)
* [Redis](https://redis.io)

Alternatively, [Laravel Forge](https://forge.laravel.com) subscribers can save a lot of time by producing an environment preconfigured with all the necessary requirements to support a Nodem installation.

## Environment Setup

Before you install Nodem, you must first prepare your server with all of the necessary [requirements](#requirements).

<x-alert type="success">
If you're using Forge, provision your new Nodem server and proceed to the [Installation](#installation) section.
</x-alert>

## Installation

Once your environment is prepared with all of the necessary requirements, it's time to proceed

### 1) Clone the Repository and Install Dependencies

Start by cloning the Nodem repo and then installing the dependencies.

```bash
git clone https://github.com/ArkEcosystem/nodem.git
cd nodem
composer install --no-dev
```

### 2) Configure the Environment

Next is to configure your `.env`.

> We advise using Redis for cache and queues.

Copy the example `.env` file and generate a key using the following commands:

```bash
cp .env.example .env
php artisan key:generate
```

Adjust the `APP_URL` variable in your `.env` file to reflect the host address. i.e., the server's IP address where Nodem runs._

```bash
APP_URL=http://127.0.0.1
```

### 3) Install Nodem

Install Nodem via the PHP Artisan command below:

```bash
php artisan nodem:install
```

<x-alert type="success">
This step will also guide you in generating the invitation code needed to create your first account as the owner. You can find more information about this process [here.](/docs/nodem/usage/owner)
</x-alert>

### 4) Prepare the Application

Now symlink the storage directory and start Horizon.

```bash
php artisan storage:link
php artisan horizon
```

<x-alert type="warning">
Nodem communicates with your Core Server using the Manager API!<br>Learn how to install and configure the `core-manager` plugin [here.](/docs/nodem/getting-started/core)
</x-alert>
