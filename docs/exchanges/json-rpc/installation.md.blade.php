---
title: Getting Started
---

## Introduction

The JSON-RPC was created to aid organizations with the integration of ARK in their existing RPC based infrastructure. If you do not have any restrictions in your IT architecture, we recommend using the [Public API](/public/getting-started) over the JSON-RPC. All operations provided by the `JSON-RPC` can be performed using the public API.

> The majority of platforms utilizing Bitcoin use the `Bitcoind-RPC` server. To accommodate these services and make the integration of ARK as user-friendly as possible, it was our goal to develop a familiar process for use now, and in the future. The ARK RPC will minimize headaches and streamlines the addition process of ARK to existing architectures.

## Installation

```bash
yarn global add @arkecosystem/exchange-json-rpc-cli
```

## Usage

> All commands support a `-h` flag to show help for the specified command.

```bash
$ exchange-json-rpc
A JSON-RPC 2.0 specification compliant server for Exchanges to interact with the ARK Blockchain.

VERSION
  @arkecosystem/exchange-json-rpc-cli/1.0.0 darwin-x64 node-v10.16.0

USAGE
  $ exchange-json-rpc [COMMAND]

COMMANDS
  autocomplete  display autocomplete installation instructions
  command
  commands      list all the commands
  help          display help for exchange-json-rpc
  log           Show the log
  restart       Restart the JSON-RPC
  run           Run the JSON-RPC (without pm2)
  start         Start the JSON-RPC
  status        Show the JSON-RPC status
  stop          Stop the JSON-RPC
  update        Update the exchange-json-rpc installation
```

### `start`

> Start the JSON-RPC

```bash
exchange-json-rpc start
```

| Flag               | Description                                                                  | Default                    | Required |
| ------------------ | ---------------------------------------------------------------------------- | -------------------------- | -------- |
| --[no-]allowRemote | allow remote connections which are filtered by a whitelist                   | n/a                        | No       |
| --network=         | the name of the network that should be used                                  | mainnet                    | No       |
| --token=           | the name of the token that should be used                                    | ark                        | No       |
| --host=            | the host that should be used to expose the RPC                               | 0.0.0.0                    | No       |
| --port=            | the port that should be used to expose the RPC                               | 8008                       | No       |
| --peer=            | the peer you want to use for communication, defaults to random network peers | n/a                        | No       |
| --whitelist=       | a comma separated list of IPs that can access the RPC                        | 127.0.0.1,::ffff:127.0.0.1 | No       |

### `restart`

> Restart the JSON-RPC

```bash
exchange-json-rpc restart
```

### `stop`

> Stop the JSON-RPC

```bash
exchange-json-rpc stop
```

| Flag   | Description                | Default | Required |
| ------ | -------------------------- | ------- | -------- |
| --kill | kill the process or daemon | n/a     | No       |

### `run`

> Run the JSON-RPC without pm2 **(exits on CTRL+C)**

```bash
exchange-json-rpc run
```

| Flag               | Description                                                                  | Default                    | Required |
| ------------------ | ---------------------------------------------------------------------------- | -------------------------- | -------- |
| --[no-]allowRemote | allow remote connections which are filtered by a whitelist                   | n/a                        | No       |
| --network=         | the name of the network that should be used                                  | mainnet                    | No       |
| --token=           | the name of the token that should be used                                    | ark                        | No       |
| --host=            | the host that should be used to expose the RPC                               | 0.0.0.0                    | No       |
| --port=            | the port that should be used to expose the RPC                               | 8008                       | No       |
| --peer=            | the peer you want to use for communication, defaults to random network peers | n/a                        | No       |
| --whitelist=       | a comma separated list of IPs that can access the RPC                        | 127.0.0.1,::ffff:127.0.0.1 | No       |

### `status`

> Show the JSON-RPC status

```bash
exchange-json-rpc status
```

### `update`

> Update the JSON-RPC installation

```bash
exchange-json-rpc update
```

### `log`

> Show the log

```bash
exchange-json-rpc log
```

| Flag     | Description             | Default | Required |
| -------- | ----------------------- | ------- | -------- |
| --error= | only show error output  | n/a     | No       |
| --lines= | number of lines to tail | 15      | No       |
