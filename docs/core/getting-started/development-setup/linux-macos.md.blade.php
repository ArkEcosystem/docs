---
title: Development Setup - Linux and macOS
---

# Linux and macOS (ADN | Devnet)

A Step-By-Step Guide on How To Prepare a Fully Functional Development Environment

----

<x-alert type="info">
If you don't have access to a Linux box you can quickly setup one on [DigitalOcean](https://cloud.digitalocean.com) by using this **100$** referral link: [Referral Link](https://m.do.co/c/09d061526b12).
</x-alert>

## Introduction

This guide will take you through the basic steps of setting up a development environment from scratch on a fresh Linux \(\*.deb based\) box. We officially recommend and support **Ubuntu** operating system.

## Step 1: User setup

We will create a new user `ark` and add this user to the `sudoers` group \(allowing root execution if needed\). You can skip this step as a developer and continue to next steps below.

If you are running on a fresh cloud box, like for example [DigitalOcean](https://cloud.digitalocean.com/), then create a user with the following commands below.

```bash
# Create the user (example: 'ark')
sudo adduser ark
sudo usermod -aG sudo ark

# Login as the newly user
sudo su - ark
```

## Step 2: Install Git Source Control System

As the most popular version control software in existence, Git is a staple of many developer workflows, and ARK is no exception. Downloading Git will allow you to clone the latest version of ARK Core.

```bash
sudo apt-get install -y git curl apt-transport-https update-notifier
```

## Step 3: Install Node.js Runtime

As ARK Core is written exclusively in [Node.js](https://nodejs.org/), the server-side framework for JavaScript, Typescript, installing Node.js is a necessity for core development. The code below installs Node.js from source.

```bash
sudo wget --quiet -O - https://deb.nodesource.com/gpgkey/nodesource.gpg.key | sudo apt-key add -
(echo "deb https://deb.nodesource.com/node_11.x $(lsb_release -s -c) main" | sudo tee /etc/apt/sources.list.d/nodesource.list)
sudo apt-get update
sudo apt-get install nodejs -y
```

## Step 4: Install Yarn Package Manager

[Yarn](https://yarnpkg.com/) is a package manager that seeks to build upon the foundation of Node's npm. Although yarn is not a strict requirement, in many cases it works faster and more elegantly than npm. Most ARK developers use yarn, and as such, you will see yarn commands often used throughout our documentation.

```bash
curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
(echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list)
sudo apt-get update
sudo apt-get install -y yarn
```

## Step 5: Install Dependencies

Dependencies are needed for `core` to be compiled, run and controlled while living inside you linux based environment. To command below installs some of those needed dependencies that are used by core or related scripts.

```bash
sudo apt-get install build-essential libcairo2-dev pkg-config libtool autoconf automake python libpq-dev jq -y
```

## Step 6: Clone The Core Repository

Let's clone our `core` repository and run the initial `yarn setup` command. We will also checkout the latest `develop` branch.

`yarn setup` command leverages [Lerna](https://github.com/lerna/lerna) to clean, bootstrap and build the core packages \(including transpiling typescript\). For mode information look into core's `package.json` file in the root folder.

```bash
git clone https://github.com/arkecosystem/core
cd core
git checkout develop
yarn setup  #run Lerna to clean, bootstrap and build the core packages
```

## Step 7: Setting Up The Development Database

ARK Core stores all the blockchain data in a [PostgreSQL](https://www.postgresql.org/) database. You have two options on how to setup your development database.

<x-alert type="info">
Follow **Step 7.1** if you are working locally on your developer computer and have docker environment in place, otherwise follow **Step 7.2** \(for example if you are running on a cloud based Ubuntu instance or prefer native database install\).
</x-alert>

### Step 7.1 Database Setup Using Docker

If you are already using `Docker` and  have  `docker-compose` installed, then you can generate docker files from the command line, with the `yarn docker ark` command where \(ark is the name of the `network` for which you want to generate docker files\). For now let's stick with `ark` as the default name of the network.

Executing the command `yarn docker ark` in the root folder of the previously cloned repository, like this:

```bash
cd core  #root folder of the cloned repository
yarn docker ark
```

will generate the following docker files inside our `core/docker` folder \(see folder tree below\):

```bash
#core/docker tree in the cloned repository folder
├── development
│   ├── devnet
│   │   ├── Dockerfile
│   │   ├── docker-compose.yml
│   │   ├── entrypoint.sh
│   │   ├── purge_all.sh
│   │   └── restore.sh
│   ├── mainnet
│   │   └── docker-compose.yml
│   ├── testnet #this is the folder where we will start our PostgreSQL testnet DB
│   │   ├── Dockerfile
│   │   ├── docker-compose.yml
│   │   ├── entrypoint.sh
│   │   ├── purge_all.sh
│   │   └── restore.sh
│   └── unitnet
│       ├── docker-compose.yml
│       └── purge.sh
└── production
...
```

To start the PostgreSQL docker container we must go into the corresponding folder and run the `docker-compose` command. For testnet we need to run the following:

```bash
cd core/docker/development/testnet
docker-compose up postgres #postgres is the name of the PostgreSQL container
```

The `docker-compose up postgres` will start PostgresSQL container and expose it to our core via standard PostgreSQL port 5432.

### Step 7.2 Installing Postgres Database System-Wide

If you don't want to install and run docker on your local computer you can still install PostgreSQL database natively on your running operating system. For \*.deb based Linux systems the commands are the following:

```bash
sudo apt-get install postgresql postgresql-contrib -y
sudo -i -u postgres psql -c "CREATE USER ark  WITH PASSWORD 'password' CREATEDB;"
sudo -i -u postgres psql -c "CREATE DATABASE ark_testnet WITH OWNER ark;"
sudo -i -u postgres psql -c "CREATE DATABASE ark_devnet WITH OWNER ark;"
```

The commands above install PostgreSQL database locally and create databases for running testnet and devnet networks with user `ark` as the database owner. If you have skipped the Step 1: User setup, you have to change `ark` user to your development username, usually the logged in username.

## Start Core and Play With Public API

You can jump to Spinning Up Your First Testnet Section here and test your local Core Server, by following the link below:

<livewire:page-reference path="/docs/core/getting-started/development-setup/spinning-up-first-testnet" />
