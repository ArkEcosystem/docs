---
title: Development Setup - Docker on Windows
---

# Docker on Windows (ADN | Devnet)

## Introduction

It's possible to use your favorite Windows IDE locally and build, test and run ARK Core in a native Linux environment. This can be done by using [Docker for Windows](https://docs.docker.com/docker-for-windows/).

## Step 1: Install Prerequisites

Follow your operating system instructions and install:

1. [Docker Desktop for Windows](https://docs.docker.com/docker-for-windows/install)
2. [Docker Compose](https://docs.docker.com/compose/install/)

## Step 2: Setup Docker Environment

### Step 2.1: Configure Shared Drives

Once you installed [Docker Desktop for Windows](https://docs.docker.com/docker-for-windows/install) you'll have to configure _**File Sharing**_ so your Linux container can mount ARK Core repository cloned locally on your Windows system. Make sure your **firewall** and **antivirus** are turned off or configured to allow the above operation. Follow [Docker Documentation](https://docs.docker.com/docker-for-windows/) - section **FILE SHARING**.

### Step 2.2: Setup Line Endings Style

<x-alert type="danger">
**IMPORTANT!** To avoid Windows and Unix format end of lines mess [EOL](https://en.wikipedia.org/wiki/Newline).
Prior to cloning ARK Core repository, enter the following code in your command prompt or PowerShell:

```bash
git config --global core.eol lf
git config --global core.autocrlf input
```

</x-alert>

Unless your IDE has a special setting to preserve Unix format EOL, every file you edit and save in Windows will be converted to Windows format i.e. it will be CRLF instead of LF.

<x-alert type="success">
**You must preserve Unix file format by all means as otherwise you'll face issues when running Core in your Docker container.**
</x-alert>

## Step 3: Clone ARK Core Repository

Clone official [ARK Core](https://github.com/ArkEcosystem/core.git) repository. Recommended branch to use for development is `develop`. Our example uses `D:\core` as a PATH where we checkout the core repo, so if you do not want to edit `docker-compose.yml`, you just go ahead and clone [ARK Core](https://github.com/ArkEcosystem/core.git) to the same path.

```bash
cd d:\
git clone https://github.com/ArkEcosystem/core
cd core
git checkout develop
```

## Step 4: Running Your Container

### Step 4.1: Clone [Core-Docker](https://github.com/ArkEcosystem/core-docker.git) Repository

```bash
cd d:\
git clone https://github.com/ArkEcosystem/core-docker
```

### Step 4.2: \[Optional\] Adjust ARK Core PATH

<x-alert type="info">
If you cloned ARK Core to any other PATH different than**`D:\core`** you'll have to edit `docker-compose.yml` to match the path:
</x-alert>

```bash
cd core-docker/windows
```

Open file `docker-compose.yml` and:

_Change line:_

```yaml
    volumes:
        - d:/core:/core
```

_To:_

```yaml
    volumes:
        - d:/your_local_path_to_checked_out_core_repo:/core
```

### Step 4.3: Starting Your Container

Open PowerShell as Administrator and enter the following code:

```bash
cd core-docker/windows
docker-compose up -d
```

Entering the container shell with the following command:

```bash
docker exec -it ark-testnet-core bash
```

**You can now build and run ARK Core from inside the container. Example:**

_Build:_

```bash
cd /core
yarn setup
```

_Run:_

```bash
cd /core/packages/core
yarn full:testnet
```

## Start Core and Play With Public API

You can jump to Spinning Up Your First Testnet Section here and test your local Core Server, by following the link below:

<livewire:page-reference path="/docs/core/getting-started/development-setup/spinning-up-first-testnet" />
