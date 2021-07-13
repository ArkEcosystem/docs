---
title: Development Setup - Spinning up your first Testnet
---

# Spinning Up Your First Testnet (ADN | Devnet)

## Step 1: Start Docker Testnet Database

You already generated docker files during the [development environment setup](/docs/core/getting-started/development-setup/linux-macos#step-7-setting-up-the-development-database) (if not please run the following commands as specified [here](/docs/core/getting-started/development-setup/linux-macos#step-71-database-setup-using-docker)).

```bash
cd core/docker/development/testnet #testnet docker folder
docker-compose up -d postgres #start postgres testnet container
```

## Step 2: Testnet Network Boot

Let's jump to the `core/packages/core` and start our first testnet with the commands below:

<x-alert type="info">
Please make sure you have already run the build command `yarn setup` from **`core`** root folder.
</x-alert>

```bash
cd core/packages/core
yarn full:testnet #run the testnet blockchain on your local computer
```

After executing the `yarn full:testnet` command you should see something like this in your command prompt:

```bash
yarn run v1.22.10
$ cross-env CORE_PATH_CONFIG=./bin/config/testnet yarn ark core:run --networkStart --env=test
$ node ./bin/run core:run --networkStart --env=test
The jemalloc library was not found on your system. It is recommended to install it for better memory management. Falling back to the system default...
[2021-07-07 13:42:17.512] INFO : Connecting to database: ark_testnet
[2021-07-07 13:42:18.109] INFO : P2P Server started at http://127.0.0.1:4000
[2021-07-07 13:42:18.110] INFO : Starting Blockchain Manager
[2021-07-07 13:42:18.115] INFO : Verifying database integrity
[2021-07-07 13:42:18.149] INFO : Verified database integrity
[2021-07-07 13:42:18.159] INFO : Last block in database: 892
[2021-07-07 13:42:18.160] INFO : State Generation - Step 1 of 26: Block Rewards
[2021-07-07 13:42:18.169] INFO : State Generation - Step 2 of 26: Fees & Nonces
...
```

This means that you core node is now running and simulating a blockchain on your local computer.

## Step 3: Your First API Call

With our testnet up and running, the first thing we need to do is connect to it. All interactions between ARK Nodes and the outside world happen through the Public API, which is a [REST API facilitating different](/docs/api/) actions on the blockchain.

It is possible to interact with a node directly through HTTP without using any programming language at all. By default, the Public API for testnet opens a connection on your local machine at `http://0.0.0.0:4003/api`. We can check out newly forged [blocks](http://0.0.0.0:4003/api/blocks) in our browser with a running testnet. You should see a response showing you all the (empty) blocks your testnet forgers have recently created.

Let's try to retrieve the latest block and supply by calling  the [GET api/blockchain](/docs/api/public-rest-api/endpoints/blockchain/) endpoint with `curl`.  Run the following request from console via `curl` command or via browser.

**Request:**

```curl
curl http://127.0.0.1:4003/api/blockchain
```

We should get the following **response**:

```javascript
{
    "data": {
        "block": {
            "height": 145,
            "id": "17498538834395765847"
        },
        "supply": "12500000000000000"
    }
}
```

Your core server is now running and responding to your requests. Look at the [Public REST API](/docs/api/) and play with some requests so you get a better feel for how things run. Try some of the following endpoints:

1. [Retrieve Node Configuration](/docs/api/public-rest-api/endpoints/node#retrieve-the-configuration)
2. [Retrieve The Cryptography Configuration](/docs/api/public-rest-api/endpoints/node#retrieve-the-cryptography-configuration)
3. [List All Transactions](/docs/api/public-rest-api/endpoints/transactions#list-all-transactions)
4. [Explore more endpoints](/docs/api/)

<x-alert type="info">
To **create a simple transaction and post it to the local running blockchain** use the **core-tester-cli** package (link below). **Core-Tester** provides set of instructions on how to run commands for creating and sending transactions across any ARK Core network from the CLI interface.
</x-alert>

<livewire:page-reference path="/docs/core/getting-started/development-setup/using-the-core-tester-cli" />
