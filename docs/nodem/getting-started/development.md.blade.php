---
title: Getting Started - Development Setup
---

# Nodem Development Setup

<!--
This needs to be split up in a few sections or pages, as there’s two main things you will need to do:
- setting up Nodem on a server, and
- installing the core-manager plugin on the servers you want to have added to it.
Setting up nodem will need two sections:
- one for development, and
- one for production

Development setup:
see the nodem readme (https://github.com/arkecosystem/nodem).
Can be kept rather short, as it’s mostly an average laravel setup.
Mention prerequisites, setup commands and the other things in the readme.
-->

This section will guide developers through the steps necessary to setup Nodem in a development environment. Developers should be familiar with using PHP, Composer, Valet, and PostgreSQL or MySQL.

<x-alert type="info">
Review additional tooling requirements **[here](/docs/nodem/getting-started/requirements)**, or the Nodem Technology Stack **[here](/docs/nodem/overview/stack)**.
</x-alert>

<x-alert type="info">
The following instructions are for Valet. [Homestead](https://laravel.com/docs/8.x/homestead) may also be used; however, that process is not covered in this documentation.
</x-alert>

```bash
git clone https://github.com/ArkEcosystem/nodem.git
cd nodem
composer install
yarn install

cp .env.example .env
php artisan key:generate

> Make sure to adjust the `APP_URL` variable in your .env file to reflect the host, e.g the IP address of the server where Nodem runs

```
APP_URL=http://127.0.0.1
```

php artisan storage:link
composer db:dev # or composer db:bare
yarn run watch

valet link nodem
```

Afterwards, you can navigate to `nodem.test` in your browser to see it in action
