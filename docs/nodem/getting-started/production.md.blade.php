---
title: Getting Started - Production Setup
---

# Nodem Production Setup

This section will guide developers through the steps necessary to set up Nodem in a production environment and requires a separate Core server that is also [configured](/docs/nodem/getting-started/core) to use the Manager API. This process is relatively similar to Laravel Forge's [development setup.](https://forge.laravel.com) You should be familiar with using PHP, Composer, and PostgreSQL.

## Requirements

Nodem uses a modified LEPP stack consisting of:

* Linux [(Ubuntu >=20.04)](https://ubuntu.com/download/server)
* [Nginx](https://www.nginx.com/resources/wiki/start/topics/tutorials/install)
* [PostgreSQL](http://www.postgresql.org)
* [PHP 8](https://www.php.net/releases/8.0)
* [Redis](https://redis.io)
* [Composer](https://getcomposer.org), and
* [Yarn](https://classic.yarnpkg.com)

Alternatively, [Laravel Forge](https://forge.laravel.com) subscribers can save a lot of time by creating a preconfigured environment that supports Nodem.

## Manual Environment Setup

Before installing Nodem, you must first prepare your server with all the necessary [requirements](#requirements).

<x-alert type="success">
If you're using Forge, provision your new Nodem server and proceed to the [Nodem Installation](#nodem-installation) section.
</x-alert>

### 1) Update Your System

```shell
sudo apt update
sudo apt upgrade
```

### 2) Add Your User Account

Choose whichever username you prefer, `ark` is just used as an example.

```shell
sudo adduser ark
sudo usermod -a -G sudo ark
sudo su - ark
```

### 3) Install System Packages

```shell
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php
```

```shell
sudo apt install php8.0-fpm php8.0-common php8.0-curl php8.0-dom php8.0-pgsql php8.0-mbstring php8.0-intl php8.0-gd php8.0-imagick php8.0-bcmath php8.0-soap php8.0-zip
```

```shell
sudo apt-get install php8.0-sqlite
```

#### Redis

```shell
sudo apt-get install redis-server
sudo apt-get install php8.0-redis
```

#### PostgreSQL

```shell
sudo apt install postgresql
```

Be sure to create and configure a database for Nodem. You'll need to enter these values later in your `.env` file. You can use whatever values you'd like; the ones below are just examples.

```shell
# $ psql postgres
CREATE DATABASE nodem;
CREATE USER ark WITH PASSWORD 'password';
postgres=# GRANT ALL PRIVILEGES ON DATABASE nodem TO ark;
```

#### Nginx

```shell
sudo apt install nginx
```

<details><summary>Nginx Example Configuration</summary>

```shell
sudo nano /etc/nginx/sites-available/default
```

```shell
server {
    listen 80;
    listen [::]:80;
    server_name <your APP_URL>;
    root home/<your $USER>/nodem/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

```shell
sudo systemctl reload nginx
```

</details>

#### PHP

```shell
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

## Nodem Installation

Once your environment is prepared with all of the necessary [requirements](#requirements), it's time to proceed with installing Nodem.

### 1) Clone the Repository and Install Dependencies

Start by cloning the Nodem repo and then installing the dependencies via Composer.

```bash
git clone https://github.com/ArkEcosystem/nodem.git
cd nodem
composer install --no-dev
```

### 2) Configure the Environment

Next, copy and configure the example `.env` file, and generate a key using the following:

```shell
cp .env.example .env
```

<details><summary>set these <code>.env</code> vars</summary>

```shell
nano .env
```

```shell
APP_URL=http://<your nodem host ip or url>
...
# These were set when you configured your Nodem db
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
...
CACHE_DRIVER=redis
QUEUE_DRIVER=redis
...
DEBUGBAR_ENABLED=false
RESPONSE_CACHE_ENABLED=false
```

</details>

```shell
php artisan key:generate
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

<x-alert type="success">
Your Nodem instance is now up and running 🎉<br>Head on over to your Nodem instance's registration page and enter the invite code and username created during the [previous](#3-install-nodem) step to explore your deployment!
</x-alert>

<x-alert type="warning">
Nodem communicates with your Core Server using the Manager API. You'll need to have the `core-manager` plugin [configured](/docs/nodem/getting-started/core) on your Core instance before you can import it to Nodem.
</x-alert>
