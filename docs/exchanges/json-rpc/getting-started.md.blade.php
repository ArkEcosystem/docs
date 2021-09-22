---
title: Getting Started
---

# Getting Started

<x-alert type="info">
The Exchange JSON-RPC is only maintained for exchanges, as the name suggests. **We do not offer any support or guidance unless you are an Exchange in which case you most likely will already be in touch with us.**
</x-alert>

## Installation via Yarn

```bash
yarn global add @arkecosystem/exchange-json-rpc-cli
```

## Usage instructions

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

| Flag                 | Description                                                                  | Default                    | Required |
| :------------------- | :--------------------------------------------------------------------------- | :------------------------- | :------- |
| `--[no-]allowRemote` | allow remote connections which are filtered by a whitelist                   | n/a                        | No       |
| `--network=`         | the name of the network that should be used                                  | mainnet                    | No       |
| `--token=`           | the name of the token that should be used                                    | ark                        | No       |
| `--host=`            | the host that should be used to expose the RPC                               | 0.0.0.0                    | No       |
| `--port=`            | the port that should be used to expose the RPC                               | 8008                       | No       |
| `--peer=`            | the peer you want to use for communication, defaults to random network peers | n/a                        | No       |
| `--whitelist=`       | a comma separated list of IPs that can access the RPC                        | 127.0.0.1,::ffff:127.0.0.1 | No       |

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

| Flag     | Description                | Default | Required |
| :------- | :------------------------- | :------ | :------- |
| `--kill` | kill the process or daemon | n/a     | No       |

### `run`

> Run the JSON-RPC without pm2 **(exits on CTRL+C)**

```bash
exchange-json-rpc run
```

| Flag                 | Description                                                                  | Default                    | Required |
| :------------------- | :--------------------------------------------------------------------------- | :------------------------- | :------- |
| `--[no-]allowRemote` | allow remote connections which are filtered by a whitelist                   | n/a                        | No       |
| `--network=`         | the name of the network that should be used                                  | mainnet                    | No       |
| `--token=`           | the name of the token that should be used                                    | ark                        | No       |
| `--host=`            | the host that should be used to expose the RPC                               | 0.0.0.0                    | No       |
| `--port=`            | the port that should be used to expose the RPC                               | 8008                       | No       |
| `--peer=`            | the peer you want to use for communication, defaults to random network peers | n/a                        | No       |
| `--whitelist=`       | a comma separated list of IPs that can access the RPC                        | 127.0.0.1,::ffff:127.0.0.1 | No       |

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

| Flag       | Description             | Default | Required |
| :--------- | :---------------------- | :------ | :------- |
| `--error=` | only show error output  | n/a     | No       |
| `--lines=` | number of lines to tail | 15      | No       |

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ark.io](mailto:security@ark.io). All security vulnerabilities will be promptly addressed.
