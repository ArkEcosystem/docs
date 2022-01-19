---
title: Getting Started - Production Setup
---

# Nodem Production Setup

<!--
This needs to be split up in a few sections or pages, as there’s two main things you will need to do:
- setting up Nodem on a server, and
- installing the core-manager plugin on the servers you want to have added to it.
Setting up nodem will need two sections:
- one for development, and
- one for production

Production setup:
Here the main setup should refer to laravel forge (https://forge.laravel.com/) where the setup is pretty similar to the development one.
The only difference will be that you set your .env variables to production and to a different url.
There should also be a manual setup, where we have to explain how to set it up on a bare server with PHP + nginx + postgresql (see https://laravel.com/docs/8.x/deployment).
Setup doc should only cover the initial setup, then link to the next document for setting up their first user and how they can add others to it.
-->

This section will guide developers through the steps necessary to setup Nodem in a production environment. Developers should be familiar with using PHP, Composer, and PostgreSQL or MySQL.

<x-alert type="info">
Review additional tooling requirements **[here](/docs/nodem/getting-started/requirements)**, or the Nodem Technology Stack **[here](/docs/nodem/overview/stack)**.
</x-alert>

## 1) Clone the Repository and Install Dependencies

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

Adjust the `APP_URL` variable in your `.env` file to reflect the host address (_e.g the IP address of the server where Nodem runs_).

```
APP_URL=http://127.0.0.1
```

## 3) Prepare the Application

This will guide you in generating the invitation code that you need to create your first account (owner).

Install Nodem via the PHP Artisan command below.

```bash
php artisan nodem:install
```

Now symlink the storage directory and start Horizon.

```bash
php artisan storage:link
php artisan horizon
```
