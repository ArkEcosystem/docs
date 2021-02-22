---
title: Set up a Development Environment
excerpt: This tutorial will walk you through the installation of all the required packages to set up a development environment before then deploying our own local blockchain powered by ARK Core technology. 
number: 1
---
# Set up a Development Environment

## **How Does ARK Messenger Work?**

Before we dive in, it would be beneficial to understand how the ARK Messenger works!

The ARK Messenger is comprised of two major components: \(1\) _**the client**_; and \(2\) _**the bridgechain**_.

* The _client_ is the front-end application that you interact with as a user. It handles all user input and processes all incoming and outgoing data to the network.
* The _bridgechain_ is the blockchain component of the application. It acts as a decentralized database

If you would like to review the code for both components, they are listed below for your convenience:

* [Client Codebase](https://github.com/ArkEcosystem/poc-ark-messenger)
* [Bridgechain Codebase](https://github.com/ArkEcosystem/poc-ark-messenger-core)

The ARK Messenger application works with channels. A channel can consist of any number of participants. When a user creates a new channel, a new channel ID and password is generated. The password can then be shared with other users so that they can join the channel and send messages.

Messages sent to the channel are encrypted and decrypted using the channel’s password as the seed. All sensitive data is handled by the user’s local client and no unencrypted data is ever broadcasted. ARK Messenger runs on its own bridgechain with a customized network and node configuration. It also makes use of a custom transaction built with the _Generic Transaction Interface \(GTI\)_ to handle the processing of the chat messages.

> _**Try out ARK Messenger at**_ [_**https://ARKmessenger.io**_](https://arkmessenger.io/)

Now that we have a foundation of what the ARK Messenger is, we are ready to start building. Let us review how to set up a development environment.

## **Setting up a development environment**
The documentation within [Core](/docs/core/how-to-guides/setting-up-your-development-environment/intro) is an ideal way for developers to go through the processes for setting up a development environment. We recommend Linux \(_\*.deb based_\) operating system as the default environment. We officially recommend and support **Ubuntu** operating system.

You can also set up your development environment using a Docker on [macOS/Linux Docker](/docs/core/how-to-guides/setting-up-your-development-environment/docker) or a [Docker on Windows](/docs/core/how-to-guides/setting-up-your-development-environment/windows).

### Step 1: User setup

Once you have your environment up and running using the links above, we can create a new user `ark` and add this user to the sudoers group \(allowing root execution if needed\).

If you are running on a fresh cloud box/vps, like for example[ DigitalOcean](https://cloud.digitalocean.com/), then create a user with the following commands below:

```bash
sudo adduser ark
sudo usermod -aG sudo ark

#login as ark user
sudo su ark
```

### Step 2: Install Git Source Control System

As the most popular version control software in existence, Git is a staple of many developer workflows, and ARK is no exception. Downloading Git will allow you to clone the latest version of ARK Core. Download it by entering the following command:

```bash
sudo apt-get install -y git curl apt-transport-https update-notifier
```

### Step 3: Install Node.js Runtime

As ARK Core is written exclusively in [Node.js](https://nodejs.org/), the server-side framework for JavaScript and Typescript, installing Node.js is a necessity for core development. The code below installs Node.js from the source.

```bash
sudo wget --quiet -O - https://deb.nodesource.com/gpgkey/nodesource.gpg.key | sudo apt-key add -
(echo "deb https://deb.nodesource.com/node_12.x $(lsb_release -s -c) main" | sudo tee /etc/apt/sources.list.d/nodesource.list)
sudo apt-get update
sudo apt-get install nodejs -y
```

### **Step 4: Install Yarn Package Manager**

Yarn is a package manager that seeks to build upon the foundation of Node’s npm. Although yarn is not a strict requirement, in many cases it works faster and more elegantly than npm. Most ARK developers use yarn, and as such, you will see yarn commands often used throughout our documentation.

```bash
curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
(echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list)
sudo apt-get update
sudo apt-get install -y yarn
```

### Step 5: Install Dependencies

Dependencies are needed for `core` to be compiled, run and controlled while living inside your Linux based environment. The command below installs some of those needed dependencies that are used by core or related scripts.

```bash
sudo apt-get install build-essential libcairo2-dev pkg-config libtool autoconf automake python libpq-dev jq -y
```

### Step 6: Clone The Core Repository

Let’s clone our `core` repository and run the initial `yarn setup` command. We will also check out the latest `develop` branch.

`yarn setup` command leverages [Lerna](https://github.com/lerna/lerna) to clean, bootstrap and build the core packages \(including transpiling typescript\). For more information look into Core's `package.json` file in the root folder.

```bash
git clone https://github.com/arkecosystem/core
cd core
git checkout develop

#run Lerna to clean, bootstrap and build the core packages
yarn setup
```

### Step 7: Setting Up The Development Database

ARK Core stores all the blockchain data in a [PostgreSQL](https://www.postgresql.org/) database. You have two options on how to set up your development database.

> Follow **Step 7.1** if you are working locally on your developer computer and have docker environment in place, otherwise follow **Step 7.2** \(for example if you are running on a cloud based Ubuntu instance or prefer native database install\).

### Step 7.1 Database Setup Using Docker

If you are already using `Docker` and have `docker-compose` installed, then you can generate docker files from the command line, with the `yarn docker ark` command where `ark` is the name of the `network` for which you want to generate docker files. For now, let's stick with `ark` as the default name of the network.

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

If you don’t want to install and run Docker on your local computer you can still install the PostgreSQL database natively on your running operating system. For \*.deb based Linux systems the commands are the following:

```bash
sudo apt-get install postgresql postgresql-contrib -y
sudo -i -u postgres psql -c "CREATE USER ark  WITH PASSWORD 'password' CREATEDB;"
sudo -i -u postgres psql -c "CREATE DATABASE ark_testnet WITH OWNER ark;"
sudo -i -u postgres psql -c "CREATE DATABASE ark_devnet WITH OWNER ark;"
```

The commands above install the PostgreSQL database locally and create databases for running testnet and devnet networks with user `ark` as the database owner. If you have skipped the Step 1: User setup, you have to change `ark` user to your development username, usually, the logged-in username.

### Run Above Commands Together In One Setup Script

While the above steps are helpful for getting acquainted with ARK Core, some developers may opt to run the above commands together in one setup script. First, create user ARK with a default password `password`. This will make it easier for us to work with default settings.

```bash
#!/usr/bin/env bash
sudo adduser ark
sudo usermod -aG sudo ark

#login as ark user
sudo su - ark
```

After creating and logging under `ark` user, you can execute the following script to install development tools and dependencies from [Technology Stack](https://blog.ark.io/technology-stack). If your default user isn't `ark`, you should copy and modify the script source below \(database section\).

```bash
bash <(curl -s https://raw.githubusercontent.com/learn-ark/bash-helper-scripts/master/dev-setup.sh)
```

## Create and deploy a bridgechain locally with a custom network configuration

For the last part of this tutorial, we will be creating and deploying a bridgechain with a custom network configuration.

To accomplish this, we will be using the documentation found at the ARK [Deployer Hub](/docs/deployer/). Once you have followed the steps outlined there, you will have successfully created and deployed your bridgechain.

By using a bridgechain, a lot of options to customize the network will open up. Here’s a summary of some of the parameters that ARK Messenger uses:

> Ticker: Պ
> Token: MSN
> Block time: 4 seconds
> Forgers: 11
> p2p port: 11002
> API port: 11003
> Webhook port: 11004

But most importantly, a bridgechain allows you to run a network with your own custom transactions.

## Next Steps

Our next tutorial will cover the development of a custom transaction, testing that transaction on our bridgechain, and developing the client which will serve as the front-end application.

If you become stuck at any point make sure to consult our documents on our [Core Developer Docs](/docs/core/how-to-guides/setting-up-your-development-environment/intro). In addition, our team and developers are active on [Slack](https://ark.io/slack) so do not hesitate to reach out to us!
