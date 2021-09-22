---
title: Running and Managing Core Processes
---

# Running and Managing Core Processes

## Checking for Running Processes

Now that installation is complete and the genesis node has rebooted, let's perform some basic checks.

1. Check `http://GENESIS_NODE_IP:4103/` in your browser to confirm any kind of server response for the Core Public API.
2. Reconnect to your genesis node's console. You will have been ejected due to the server restart.
3. Type:

```bash
pm2 status
```

This will show you an ASCII panel with your processes, versions, and statuses which should be showing `online`.

1. Type:

```bash
pm2 logs bridgechain-relay
```

Replace `bridgechain` with your chain name. You should see a flow of data corresponding to the relay receiving new blocks according to your preconfigured blocktime. 5. Type:

```bash
pm2 logs bridgechain-forger
```

Replace `bridgechain` with your chain name. You should see a stream of data corresponding to your genesis delegates processing new blocks and transactions. Remember, all your genesis delegates are virtualized on your one genesis node. If you were to view the `bridgechain-forger` logs while logged into a live delegate server, it would only show logs for that one live delegate. 6. Check `http://GENESIS_NODE_IP:4200/` to confirm a fully functional Explorer website. The explorer provides the user with critical data such as viewing the latest transactions and blocks, searching for wallet addresses and transactions, viewing wallet address rankings, and monitoring delegates for visibility on network state.

## Managing Processes and Core

When making changes to your bridgechain installation in the future, you may need to stop, start, or restart certain processes as well as observe logs. Replace `bridgechain` at the start of each command with the name you are using for your bridgechain. All CLI commands are to be ran in lowercase.

### Relay Management

* To **start** your bridgechain relay process type:

```bash
bridgechain relay:start
```

* To **stop** your bridgechain relay process type:

```bash
bridgechain relay:stop
```

* To **restart** your bridgechain relay process type:

```bash
bridgechain relay:restart
```

* To observe **logs** of your bridgechain relay process type:

```bash
bridgechain relay:log
```

### Forger Management

* To **start** your bridgechain forger process type:

```bash
bridgechain forger:start
```

* To **stop** your bridgechain forger process type:

```bash
bridgechain forger:stop
```

* To **restart** your bridgechain forger process type:

```bash
bridgechain forger:restart
```

* To observe **logs** of your bridgechain forger process type:

```bash
bridgechain forger:log
```

* To **configure** your bridgechain forger process type:

```bash
bridgechain config:forger
```

### Explorer Management

* To **stop** your explorer process type:

```bash
pm2 stop explorer
```

* To **start** your explorer process type:

```bash
pm2 start explorer
```

* To **restart** your explorer process type:

```bash
pm2 restart explorer
```

### PM2 Management

Managing your installation with pm2 is also an option:

```bash
pm2 stop all #stop all pm2 processes
pm2 start all  #start all pm2 processes
pm2 restart all #restart all pm2 processes
```

> The Core CLI is also used to manage snapshots, update installations, and more. Consult [Core CLI Documentation](/docs/core/deployment/cli) for more information. Take note that Core CLI does not manage the Explorer process.
