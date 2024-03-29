---
title: Deployment - Mainsail CLI Commands
---

# Mainsail CLI Commands

Mainsail comes packaged with a robust command line interface (CLI) which is an essential tool that enables any node operator to update, manage, or monitor their node installation without the need for external programs.

View the installed version of Core and a list of available CLI commands by typing the following in your terminal:

```shell
mainsail
```

## Deploy

Before you can start using the `core` process, you need to deploy the configuration. You can deploy the configuration with the following command, if you want to join Mainsail official testnet:

```shell
mainsail config:publish --network=testnet --reset
```

If you want to join official Mainsail testnet use following command:

```shell
 mainsail config:publish:custom --app=https://raw.githubusercontent.com/ArkEcosystem/mainsail-network-config/main/testnet/mainsail/app.json --crypto=https://raw.githubusercontent.com/ArkEcosystem/mainsail-network-config/main/testnet/mainsail/crypto.json --peers=https://raw.githubusercontent.com/ArkEcosystem/mainsail-network-config/main/testnet/mainsail/peers.json --reset 
```

## Configure validator

You can set your node as a validator with the following command. This command will ask you for a validator mnemonic and will enable forging on your node. Validator should be registered on the network using the **validator registration transaction**, before you can start forging. Use the same mnemonic you used to register your validator's BLS12-381 public key.

```shell
mainsail config:forger:bip39
```

## Core

This series will describe the `core` process commands. The 'core' process will run Mainsail node a single process. You can start the core process with the following command:

```shell
mainsail core:start
```

- Run `mainsail core:status` to ensure that the core to check the status of your process.

You can view your `core` process logs with the following command:

```shell
mainsail core:log
```

- Check the logs to ensure that the process has started correctly

<x-alert type="info">
If your `core` process isn't running, then an error should be displayed. You can check the status of your `core` process with `mainsail core:status`
</x-alert>

You can restart your `core` process with the following command:

```shell
mainsail core:restart
```

- Check your `core` logs to ensure that the process has restarted successfully

You can stop your `core` process with the following command.

```shell
mainsail core:stop
```

You can run the `core` process in foreground with the following command

```shell
mainsail core:run
```

- Exit the process and ensure that it has stopped from running with `mainsail core:stop`
