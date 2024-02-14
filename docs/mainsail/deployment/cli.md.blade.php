---
title: Deployment - Mainsail CLI Commands
---

# Mainsail CLI Commands

Mainsail comes packaged with a robust command line interface (CLI) which is an essential tool that enables any node operator to update, manage, or monitor their node installation without the need for external programs.

View the installed version of Core and a list of available CLI commands by typing the following in your terminal:

```shell
mainsail
```

## Core

This series will describe the `core` process commands. The 'core' process will run Mainsail node a single process. You can start the core process with the following command:

```shell
mainsail core:start --token=ark --network=testnet
```

- Run `mainsail core:status --token=ark --network=testnet` to ensure that the core to check the status of your process.

You can view your `core` process logs with the following command:

```shell
mainsail core:log --token=ark --network=testnet
```

- Check the logs to ensure that the process has started correctly

<x-alert type="info">
If your `core` process isn't running, then an error should be displayed. You can check the status of your `core` process with `mainsail core:status --token=ark --network=testnet`
</x-alert>

You can restart your `core` process with the following command:

```shell
mainsail core:restart --token=ark --network=testnet
```

- Check your `core` logs to ensure that the process has restarted successfully

You can stop your `core` process with the following command.

```shell
mainsail core:stop --token=ark --network=testnet
```

You can run the `core` process in foreground with the following command

```shell
mainsail core:run --token=ark --network=testnet
```

- Exit the process and ensure that it has stopped from running with `mainsail core:stop --token=ark --network=testnet`