---
title: Getting Started
---

# Getting Started

## Disclaimer

The purpose of this application is to serve as a server for SDKs to ensure compliance with `@arkecosystem/crypto`, this means there can be many breaking changes without any notice.

<x-alert type="danger">
**We strongly advise against using this for anything but SDK compliance testing and no support is offered if you do so.**
</x-alert>

## Installation

```bash
yarn global add @arkecosystem/crypto-json-rpc
```

## Usage

```bash
$ crypto-json-rpc
A JSON-RPC 2.0 specification compliant server to interact with ARK Cryptography.

VERSION
  @arkecosystem/crypto-json-rpc/0.2.0 darwin-x64 node-v10.15.3

USAGE
  $ crypto-json-rpc [COMMAND]

COMMANDS
  autocomplete  display autocomplete installation instructions
  command
  commands      list all the commands
  help          display help for crypto-json-rpc
  log           Show the log
  restart       Restart the JSON-RPC
  run           Run the JSON-RPC (without pm2)
  start         Start the JSON-RPC
  status        Show the JSON-RPC status
  stop          Stop the JSON-RPC
  update        Update the crypto-json-rpc installation
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ark.io](mailto:security@ark.io). All security vulnerabilities will be promptly addressed.
