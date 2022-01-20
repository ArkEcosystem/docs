---
title: Getting Started - Production Setup
---

# Nodem Production Setup

<!--
TODO: Describe manual setup w/PHP + nginx + PostgreSQL (https://laravel.com/docs/8.x/deployment)?

TODO: user setup/configuration pages
-->

This section will guide developers through the steps necessary to set up Nodem in a production environment
and requires a separate Core Server. This process is relatively similar to Laravel Forge's [development setup.](https://forge.laravel.com) You should be familiar with using PHP, Composer, and PostgreSQL or MySQL. 

<x-alert type="info">
Be sure to review Nodem's [additional tooling requirements](/docs/nodem/getting-started/requirements) and its [technology stack](/docs/nodem/overview/stack) before proceeding.
</x-alert>

## 1) Clone the Repository and Install Dependencies

Start by cloning the Nodem repo and then installing the dependencies.

```bash
git clone https://github.com/ArkEcosystem/nodem.git
cd nodem
composer install --no-dev
```

## 2) Configure the Environment

Next is to configure your `.env`.

> We advise using Redis for cache and queues.

Copy the example `.env` file and generate a key using the following commands:

```bash
cp .env.example .env
php artisan key:generate
```

Adjust the `APP_URL` variable in your `.env` file to reflect the host address (_i.e., the server's IP address where Nodem runs_).

```
APP_URL=http://127.0.0.1
```

## 3) Install Nodem

Install Nodem via the PHP Artisan command below:

```bash
php artisan nodem:install
```

<x-alert type="success">
This step will also guide you in generating the invitation code needed to create your first account (owner).
</x-alert>

## 4) Prepare the Application

Now symlink the storage directory and start Horizon.

```bash
php artisan storage:link
php artisan horizon
```

<x-alert type="warning">
Nodem communicates with your Core Server using the Manager API!<br>Learn how to install and configure the `core-manager` plugin [here.](/docs/nodem/getting-started/core)
</x-alert>
