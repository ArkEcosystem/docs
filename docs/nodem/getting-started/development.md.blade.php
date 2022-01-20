---
title: Getting Started - Development Setup
---

# Nodem Development Setup

This section aims to give an overview of the requirements needed to run Nodem locally for development purposes.

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

Next is to configure your `.env`.

Copy the example `.env` file and generate an application key using the following commands:

```bash
cp .env.example .env
php artisan key:generate
```

Afterwards, adjust the `.env` file to your setup. Make sure to create a database for your Nodem instance and provide the credentials in your `.env`. Note that it is advised to make use of Redis as `CACHE_DRIVER` and `QUEUE_DRIVER`.

Please note that by default the Nodem application enforces 2FA for every user. As this can be annoying during development, you can disable it by setting `TWO_FACTOR_ENABLED=false`. This should only be used in a development environment.

### 3) Prepare the Application

There are two presets available for Nodem for development purposes:

- Running `composer db:dev` will give you dummy data for servers, users, invites and notifications. This is advised if you want to see at a glance what Nodem has to offer. Note that the seeded servers are not possible to connect to, so certain states will not be available with this preset because of the connection issues.
- Running `composer db:bare` will only give you the bare minimum to run nodem, e.g. user accounts and permissions. This will not include any servers, meaning you will have to add a server manually to see what Nodem has to offer. This is advised when working with Nodem in addition to an actual Core instance running the Core-manager plugin.

To finish it up, make sure to symlink storage, start horizon and link the application to Valet:

```bash
php artisan storage:link
valet link nodem

php artisan horizon
```

When you are making changes to the UI, don't forget to run `yarn watch` in addition to the above.

### 4) Launch Nodem

If everything went well, you should now be able to visit `nodem.test` in your browser and be greeting by the Nodem sign in screen. You can log in with the default seeded account: username `nodem` and password `password`.

