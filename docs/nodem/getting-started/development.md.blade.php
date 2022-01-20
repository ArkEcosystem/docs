---
title: Getting Started - Development Setup
---

# Nodem Development Setup

This section aims to provide an overview of the requirements needed to run Nodem locally for development purposes.

## Requirements

Make sure you have the following installed and ready to work with:

* [Git](https://git-scm.com/)
* [PHP 8](https://www.php.net/releases/8.0/en.php)
* [Composer](https://getcomposer.org)
* [PostgreSQL](http://www.postgresql.org)
* [Yarn](https://classic.yarnpkg.com/en/)
* [Redis](https://redis.io/)
* [Valet](https://laravel.com/docs/master/valet) or [Homestead](https://laravel.com/docs/master/homestead)

## Frameworks

For Nodem, various frameworks are utilized with which you should make yourself familiar. These include:

* [Laravel](https://laravel.com/) - the main PHP framework used
* [Livewire](https://laravel-livewire.com/) - for dynamic interfaces with Laravel
* [AlpineJS](https://alpinejs.dev/) - since we cannot go without JS, this is used in the scenarios where we need local client interaction
* [TailwindCSS](https://tailwindcss.com/) - to make it all look pretty

## Setup

<x-alert type="info">
The following instructions are for [Valet](https://laravel.com/docs/master/valet). Setup using [Homestead](https://laravel.com/docs/master/homestead) is possible but not covered in this documentation.
</x-alert>

### 1) Clone the Repository and Install Dependencies

Start by cloning the Nodem repo and then installing the dependencies.

```bash
git clone https://github.com/ArkEcosystem/nodem.git
cd nodem

composer install --ignore-platform-reqs
yarn
```

### 2) Configure the Environment

Next is to configure your `.env` file.

Copy the example `.env` file and generate an application key using the following commands:

```bash
cp .env.example .env
php artisan key:generate
```

Afterward, adjust the `.env` file to your setup. Make sure to create a database for your Nodem instance and provide the credentials in your `.env`. Note that it is advised to use Redis as `CACHE_DRIVER` and `QUEUE_DRIVER`.

Nodem enforces 2FA for all users by default. You can disable 2FA by setting `TWO_FACTOR_ENABLED=false` in your `.env` file. Note that you should **only** use this in a development environment; **never** in production.

### 3) Prepare the Application

There are two presets available for Nodem for development purposes:

* Running `composer db:dev` will create placeholder data for servers, users, invites, and notifications. This is useful for demonstrating what Nodem has to offer. Note that connecting to seed servers is not possible using this preset, so certain states will not be available.
* Running `composer db:bare` produces the minimum configuration for running Nodem. e.g., user accounts and permissions. This setup doesn't include servers, so you will need to add a server manually to see the full extent of what Nodem has to offer. This is advised when working with an actual Core instance running the `core-manager` plugin.

To finish it up, make sure to symlink storage, start horizon and link the application to Valet:

```bash
php artisan storage:link
valet link nodem

php artisan horizon
```

When you are making changes to the UI, don't forget to run `yarn watch` in addition to the above.

### 4) Launch Nodem

If everything went well, you should now be able to visit `nodem.test` in your browser and be greeted by the Nodem sign-in screen. You can then log in with the default seeded account: username `nodem` and password `password`.
