---
title: Installation - Installing from Source
---

# Installing from Source

A step-by-step guide on how to prepare a fully-functional environment from source.

---

<x-alert type="success">
If you don't have access to a Linux box you can quickly setup one on [DigitalOcean](https://cloud.digitalocean.com) by using this **$200** referral link: [Referral Link](https://m.do.co/c/09d061526b12).
</x-alert>

## Introduction

This guide will take you through the basic steps of setting up a development environment from scratch on a fresh Linux (\*.deb based) box. We officially recommend and support **Ubuntu** operating system.

## Step 1: User setup

We will create a new user `mainsail` and add this user to the `sudoers` group (allowing root execution if needed). You can skip this step as a developer and continue to next steps below.

If you are running on a fresh cloud box, like for example [DigitalOcean](https://cloud.digitalocean.com/), then create a user with the following commands below.

```bash
# Create the user (example: 'mainsail')
sudo adduser mainsail
sudo usermod -aG sudo mainsail

# Login as the newly user
sudo su - mainsail
```

## Step 2: Update the System

Before we start, we need to make sure that the system is up to date. This can be done by running the following commands.

```bash
sudo apt-get update
sudo apt-get upgrade -y
```

## Step 3: Install Git Source Control System

As the most popular version control software in existence, Git is a staple of many developer workflows, and ARK is no exception. Downloading Git will allow you to clone the latest version of ARK Core.

```bash
sudo apt-get install -y git curl apt-transport-https
```

## Step 4: Install NVM & Node.js Runtime

Mainsail is written exclusively in [Node.js](https://nodejs.org/), the server-side framework for JavaScript, Typescript, installing Node.js is a necessity for core development. The code below installs [NVM - Node Version Manager](https://github.com/nvm-sh/nvm), which allows you to install and manage multiple versions of Node.js on the same system.

```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion
```

## Step 5: Install Node.js

Now that NVM is installed, you can install the latest version of Node.js. The following command will install the latest LTS version of Node.js.

```bash
nvm install --lts
```

## Step 6: Install PNPM Package Manager

[Pnpm](https://pnpm.io/) is a package manager for JavaScript, which is fast, disk space efficient, and optimized for monorepos. It uses hard links and symlinks to save one version of a module only ever once on a disk. This is especially useful for a monorepo like Mainsail.

```bash
npm install -g npm@latest
npm i -g pnpm
```

## Step 7: Install Dependencies

Dependencies are needed for `Mainsail` to be compiled, run and controlled while living inside you linux based environment. To command below installs some of those needed dependencies that are used by core or related scripts.

```bash
sudo apt-get install build-essential python-is-python3 libjemalloc-dev -yq
```

## Step 8: Clone The Core Repository

Let's clone our `core` repository and run the initial `pnpm run setup` command.

`pnpm run setup` command leverages [Lerna](https://github.com/lerna/lerna) to clean, bootstrap and build the core packages (including transpiling typescript). For mode information look into project `package.json` file in the root folder.

```bash
git clone https://github.com/arkecosystem/core
cd mainsail
git checkout main
git pull
pnpm run setup  #run Lerna to clean, bootstrap and build the core packages
```

## Step 9: Run local testnet network

Now that we have the core repository cloned and setup, we can run a local testnet network. Local testnet network is a local blockchain network that is used for development and testing purposes.
Local network will not be able to connect to the mainnet or devnet, but it will allow you to test your plugins and dApps in a controlled environment.

```bash
cd packages/core
pnpm run full:testnet
```