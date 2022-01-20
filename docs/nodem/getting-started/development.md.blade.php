---
title: Getting Started - Development Setup
---

# Nodem Development Setup

This section will guide developers through the steps necessary to set up Nodem in a development environment and does _not_ require a separate Core Server. You should be familiar with using PHP, Composer, Valet, and PostgreSQL or MySQL.

<x-alert type="info">
Be sure to review Nodem's [additional tooling requirements](/docs/nodem/getting-started/requirements) and its [technology stack](/docs/nodem/overview/stack) before proceeding.
</x-alert>

<x-alert type="info">
The following instructions use Valet. Setup using [Homestead](https://laravel.com/docs/8.x/homestead) is possible but not covered in this documentation.
</x-alert>

## 1) Clone the Repository and Install Dependencies

Start by cloning the Nodem repo and then installing the dependencies.

```bash
git clone https://github.com/ArkEcosystem/nodem.git
cd nodem

composer install -ignore-platform-reqs
yarn install
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

```bash
APP_URL=http://127.0.0.1
```

## 3) Prepare the Application

Now symlink the storage directory and begin the database migrations using the following commands:

```bash
php artisan storage:link
composer db:dev # or composer db:bare
```

## 4) Launch Nodem

Finally, launch the Nodem development instance using the `yarn` and `valet` commands as seen below:

```bash
yarn run watch
valet link nodem
```

<x-alert type="success">
You can now navigate to `nodem.test` in your browser to see Nodem in action!
</x-alert>
