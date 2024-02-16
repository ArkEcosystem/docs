---
title: Deployment - Mainsail CLI Commands
---

# Mainsail API - CLI Commands

Mainsail-API comes packaged with a robust command line interface (CLI) which is an essential tool that enables any node operator to update, manage, or monitor their node installation without the need for external programs.

View the installed version of Mainsail API and a list of available CLI commands by typing the following in your terminal:

```shell
mainsail-api
```

## Core

This series will describe the `api` process commands. The 'api' process will run Mainsail API node a single process. You can start the api process with the following command:

```shell
mainsail-api api:start
```

- Run `mainsail-api api:status` to ensure that the core to check the status of your process.

You can view your `api` process logs with the following command:

```shell
mainsail-api api:log
```

- Check the logs to ensure that the process has started correctly

<x-alert type="info">
If your `api` process isn't running, then an error should be displayed. You can check the status of your `api` process with `mainsail-api core:status`
</x-alert>

You can restart your `api` process with the following command:

```shell
mainsail-api api:restart
```

- Check your `api` logs to ensure that the process has restarted successfully

You can stop your `api` process with the following command.

```shell
mainsail-api api:stop
```

You can run the `api` process in foreground with the following command

```shell
mainsail-api api:run
```

- Exit the process and ensure that it has stopped from running with `mainsail-api api:stop`