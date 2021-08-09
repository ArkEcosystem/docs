---
title: Development Setup - Using the Core Tester CLI
---

# Using The Core-Tester-CLI (ADN | Devnet)

Core-Tester-CLI  is a plugin that was developed to help create, send and debug official supported transaction types and blocks from the CLI. The plugin can be found in the [official Core TX tester repository](https://github.com/ArkEcosystem/core-tx-tester). To send one or more transactions, you simply run the commands and adjust the parameters. By default the Tester-CLI is predefined to work with local Testnet environment (identities, delegates, passwords and a default connection to a localhost Core node running Testnet network).

<x-alert type="info">
Default options can be changed, by using the correct CLI command parameters (use `--help` command to learn more). The CLI interface can also be used to build and send transactions to public networks, by specifying node ip (**`--host`**) and port (**`--portAPI`**) parameters. See the examples under each commands documentation.
</x-alert>

In the next sections we will learn more about the basic commands of the Tester-CLI.

## Prerequisites

Make sure your development environment is setup and built with `yarn setup`and that your local Testnet is running with `yarn full:testnet.`For instructions how to do this follow this link:

<livewire:page-reference path="/docs/core/getting-started/development-setup/spinning-up-first-testnet" />

## Tester-CLI Commands

Let's jump to the `core-tester-cli` inside the ARK Core repository. The plugin can be found in the `core/packages/core-tester-cli` folder. Tester-CLI has four basic commands available:

* **help** - display detailed help information about a specific command
* **debug** - debug blocks and transactions and identities
* **send** - create and send transactions
* **make** - create wallets/identities and blocks

Let's look at each command and their options.

### 1. Help Command

We will learn the help command first, as it is a very important tool that enables us to learn the next commands. We will execute the `help` command with the `core-tester-cli` in the following way:

`./bin/run --help`

This will display the initial help screen and list all the possible available commands.

<x-alert type="info">
To learn more about a specific command or subcommand we can use the command name combined with the **--help** parameter. For example, to display more information about the `send:transfer` command we can run `$&gt;**./bin/run send:transfer --help`**
</x-alert>

This will display more detailed information about the specific command and what parameters are available.

#### Examples

Take a few moments and play around with the `help` command. Try the following ones:

```bash
./bin/run send --help               #this will display basic send help
./bin/run send:transfer --help      #this will display detailed help for send:transfer
./bin/run make --help
./bin/run make:wallets --help
```

Now, that you are familiar with the `help` command and its usage, let's take a look at other available commands and how we can use them.

### 2. Send Command

The send commands enables us to create and send transactions of various types to a core node of our choosing. By default this is a local Testnet node, but we can specify other nodes by setting the `--host` and `--portAPI` parameter. For more information about the `send` command run the following:

`./bin/run --help send`

There are a few subcommands available, related to various types of supported transactions (see the list below). After running, we can see the following console output.

```bash
Send transactions of various types

USAGE
    $ ark-tester send:COMMAND

    COMMANDS
    send:delegate-registration          create multiple delegates
    send:htlc-claim                     create multiple htlc claim transactions
    send:htlc-lock                      create multiple htlc lock transactions
    send:htlc-refund                    create multiple htlc refund transactions
    send:ipfs                           create multiple ipfs transactions
    send:multi-payment                  create wallets with multi signature
    send:multi-signature-registration   create wallets with multi signature
    send:second-signature-registration  create wallets with second signature
    send:transfer                       send multiple transactions
    send:vote                           create multiple votes for a delegate
```

All of the `send` commands have a subset of options. To explore more around them, please check `--help` for each of the subcommands.

<x-alert type="danger">
By default all **send** commands have probing enabled. This means that we check if the wallet exists and if funds where received. To skip probing  use the **--skipProbing** option.
</x-alert>

#### Examples

```bash
./bin/run send:transfer
./bin/run send:transfer --passphrase="measure blue volcano month orphan only cupboard found laugh peasant drama monitor" --number=2
./bin/run send:transfer --recipient="AH8nsXJzfakM7xvTVCFpFGYUha7qNHnZLy" --passphrase="measure blue volcano month orphan only cupboard found laugh peasant drama monitor" --number=2
./bin/run send:transfer --skipProbing --recipient="AH8nsXJzfakM7xvTVCFpFGYUha7qNHnZLy" --passphrase="measure blue volcano month orphan only cupboard found laugh peasant drama monitor" --number=2
```

### 3. Make Command

Make commands enables us to create new wallets/identities or blocks.  For more information about the `make` command and the possible parameters run the following:

`./bin/run --help` make

After running, we can see the following console output:

```bash
Make new identities or blocks

USAGE
    $ ark-tester make:COMMAND

COMMANDS
    make:block    create new blocks
    make:wallets  create new wallets
```

All of the `make` commands have a subset of options. To explore more around them, please check `--help` for each of the subcommands.

#### Examples

```bash
# Block generation examples
# --------------------------
./bin/run make:block
./bin/run make:block --previousBlock="{"height": 50, "id": "123", "idHex": "7b"}"
./bin/run make:block --transactions=5

# Wallet generation examples
# --------------------------
./bin/run make:wallets
./bin/run make:wallets --quantity=1
./bin/run make:wallets --quantity=1 --copy
./bin/run make:wallets --quantity=1 --write
```

### 4. Debug Command

This command is used to debug raw blocks and transactions. It also gives us options to serialize/deserialize raw data from defined HEX payloads, extract identities the input and perform basic crypto verification (signature validation). For more information about the `debug` command run the following:

`./bin/run --help debug`

After running, we can see the following console output:

```bash
Debug blocks and transactions

USAGE
    $ ark-tester debug:COMMAND

COMMANDS
    debug:deserialize              Deserialize the given HEX
    debug:identity                 Get identities from the given input
    debug:serialize                Serialize the given JSON
    debug:verify                   Verify the given HEX
    debug:verify-second-signature  Verify a second signature of a transaction
```

We can also run `--help` command for any of the subcommands, for example `./bin/run --help debug:serialize` to display more detailed information about command parameters.

#### Examples

```bash
./bin/run debug:deserialize  --type="transaction" --copy --data="ff02170100000000000a0000000000000003287bfebba4c7881a0509717e71b34b63f31e40021c321f89ae04f84be6d6ac3780969800000000000000ab9041000000000000000017ee6703c6780c881f672256c08e5444930f2a8c149c637acdb299a575ec8ea762230904ff352dae7c486777790664a2d99ee43fbbaf2c40948dbcc829ad723e920ac91d91a928d1eb5500ca9aa6cfb8b376e743b8"
./bin/run debug:identity --type="publicKey" --copy --data="03287bfebba4c7881a0509717e71b34b63f31e40021c321f89ae04f84be6d6ac37"
./bin/run debug:identity --type="passphrase" --copy --data="enter vessel fashion moon relax inmate net spare game silk hello anger"
```
