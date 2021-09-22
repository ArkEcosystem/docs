---
title: Development - Launching a Block Explorer
---

# Launching a Block Explorer

## Introduction

This short guide will help you setup a local blockchain explorer. This will enable you to browse and search your **local Testnet** (or any other ARK based) blockchain from a web application (exactly the same as in our official [Blockchain Explorer](https://explorer.ark.io)).

<x-alert type="info">
Blockchain Explorer communicates with the local Core node via the [Public REST API interface](/docs/api/), so make sure it is enabled (default value is **enabled**).
</x-alert>

For **production** deployment and customization options head over here:

<livewire:page-reference path="/docs/explorer/running-your-own-explorer" />

## STEP 1: Clone Official Explorer Repository

```bash
git clone https://github.com/arkecosystem/explorer
cd explorer
```

## STEP 2: Install Package Dependencies

From the `explorer` root folder run`yarn install` command. This will build and install the required modules and packages.

## STEP 3: Run Your Local Explorer

There are several run modes available for the Explorer package. You can run it as official Mainnet or Devnet explorer, or have it run as a simple local express server, it is up to your needs.

<x-alert type="info">
More detailed information about all possible running modes can be found in the [Explorer Documentation](/docs/explorer/running-your-own-explorer) section.
</x-alert>

For our simple task of viewing, browsing and searching the local Testnet blockchain, all we need to do is run the following command from the Explorer root folder:

```bash
yarn serve:testnet
```

This command will start the Explorer in dev mode and it will search for a localhost core node, that should be running on `127.0.0.1:4003` by default.

After running `yarn serve:testnet` command, you should see the following:

```bash
DONE  Compiled successfully in 11030ms

No type errors found
Version: typescript 3.6.3
Time: 6973ms

    App running at:
        - Local:   http://localhost:8080/
        - Network: http://192.168.0.178:8080/

    Note that the development build is not optimized.
    To create a production build, run yarn build.
```

Head over to [http://localhost:8080/](http://localhost:8080/) to view contents of local running blockchain with Testnet environment setup.
