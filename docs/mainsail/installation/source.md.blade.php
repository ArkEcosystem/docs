---
title: Installation - Installing from Source
---

# Installing from Source

A step-by-step guide on how to prepare a fully-functional **Production** environment from source.

<x-alert type="success">
If you plan on using Mainsail for testing or development, consider setting up a **Development** environment by [Using the Install Script](/docs/mainsail/installation/script).
</x-alert>

---

<x-alert type="success">
If you don't have access to a Linux box you can quickly setup one on [DigitalOcean](https://cloud.digitalocean.com) by using this **$100** referral link: [Referral Link](https://m.do.co/c/09d061526b12).
</x-alert>

## Introduction

This guide will take you through the basic steps of setting up a development environment from scratch on a fresh Linux (\*.deb based) box. We officially recommend and support **Ubuntu** operating system.

## Step 1: User setup

We will create a new user `ark` and add this user to the `sudoers` group (allowing root execution if needed). You can skip this step as a developer and continue to next steps below.

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
(echo "deb https://deb.nodesource.com/node_14.x $(lsb_release -s -c) main" | sudo tee /etc/apt/sources.list.d/nodesource.list)
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

`yarn setup` command leverages [Lerna](https://github.com/lerna/lerna) to clean, bootstrap and build the core packages (including transpiling typescript). For mode information look into core's `package.json` file in the root folder.

```bash
git clone https://github.com/arkecosystem/core
cd core
git checkout develop
yarn setup  #run Lerna to clean, bootstrap and build the core packages
```
