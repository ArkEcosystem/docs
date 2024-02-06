---
title: Installation - Docker Setup on Linux macOS
---

# Docker Setup on Linux and macOS

How To Set Up Docker Development Environment On Unix Based Operating Systems.

## Introduction

Docker is the de facto industry standard for packaging applications into a container. By doing so, all dependencies, such as the language run-times, operating system, and libraries are combined with the product.

<x-alert type="info">
This guide is for setting up the development environment with Docker. If you are looking for ARK Core Production ready Docker images, they are now available at [Docker Hub](https://hub.docker.com/r/arkecosystem/core), but are not meant to be used for development purposes.
</x-alert>

## Step 1: Clone Core Repository

Let's clone our `core` repository and run the initial `yarn setup` command. We will also checkout the latest `develop` branch.

`yarn setup` command leverages [Lerna](https://github.com/lerna/lerna) to clean, bootstrap and build the core packages (including transpiling typescript). For mode information look into core's `package.json` file in the root folder.

```bash
git clone https://github.com/arkecosystem/core
cd core
git checkout develop

yarn setup  #run Lerna to clean, bootstrap and build the core packages
```

## Step 2: Generate the Docker Configurations

ARK Core includes several `Dockerfile` and `docker-compose.yml` templates to ease development. They can be used to generate different configurations, depending on the network and token.

For instance, you could use this command (to be run from `core` root folder):

```bash
yarn docker ark
```

This command creates a new directory (`docker`) that contains 1 folder per network. You can read more about generating of Docker configurations [here](/docs/core/installation/source#step-71-database-setup-using-docker).

<x-alert type="info">
Once your basic docker configurations are generated, you can select one of the two available **approaches** on how to best utilize the most fitting docker development setup.
</x-alert>

In the next sections we will explain two approaches on how you can setup you development environment with docker:

1. [Run a PostgreSQL container while using NodeJS from your local environment](#approach-1-containerize-only-the-persistent-store)
2. [Run a PostgreSQL container, build and run ARK-Core using a mounted volume](#approach-2-serve-core-node-and-postgres-as-a-collection-of-containers)

## Approach 1: Containerize Only the Persistent Store

**This approach runs a PostgreSQL container while using NodeJS from your local environment.** This configuration is well suited when you are not developing ARK Core, but instead working with the API. By tearing down the PostgreSQL container, you reset the Nodes blockchain.

<x-alert type="warning">
PostgreSQL is run in a separate container and its port gets mapped to your localhost, so you should **NOT** have PostgreSQL running locally.
</x-alert>

```bash
cd docker/development/$NETWORK     # (NETWORK = testnet || devnet)
docker-compose up postgres
```

To run the Postgres container in the [background](https://docs.docker.com/engine/reference/run/) execute the following command:

```bash
docker-compose up -d postgres
```

_In case you need to start with a clean Database:_

```bash
docker-compose down -v
docker-compose up -d postgres
```

## Approach 2: Serve Core Node and Postgres as a Collection of Containers

**This approach runs a PostgreSQL container, builds and runs ARK-Core using a mounted volume.** When a container is built, all files are copied inside the container. It cannot interact with the host's filesystem unless a directory is specifically [mounted](https://docs.docker.com/storage/volumes/) during container start. This configuration works well when developing ARK Core itself, as you do not need to rebuild the container to test your changes.

<x-alert type="success">
Along with PostgreSQL container, now you also have a NodeJS container which mounts your local ark-core git folder inside the container and installs all NPM prerequisites.
</x-alert>

```bash
cd docker/development/$NETWORK      # (NETWORK = testnet || devnet)
```

```bash
docker-compose up -d
```

_Check if yarn setup is complete:_

```bash
docker logs ark-$NETWORK-core -f
```

_You can now enter your ark-core container and use NodeJS in a Docker container (Linux environment)._

```bash
docker exec -it ark-$NETWORK-core bash
```

_Start core using following commands:_

```bash
cd packages/core

yarn full:testnet

// or

yarn relay:devnet
```

_Need to start everything from scratch and make sure there are no remaining cached containers, images or volumes left? Just use the **purge_all.sh** script._

<x-alert type="warning">
Development files/presets are not Production ready. Official Production ARK-Core Docker images are now available at [Docker Hub](https://hub.docker.com/r/arkecosystem/core).
</x-alert>

## Start core and play with Public API

You can jump to Spinning Up Your First Testnet Section here and test your local Core Server, by following the link below:

<livewire:page-reference path="/docs/core/development/testnet" />
