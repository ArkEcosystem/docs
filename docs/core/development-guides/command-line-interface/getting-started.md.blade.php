---
title: CLI Guide - Getting Started
---

# Getting Started

<!-- markdownlint-disable -->

## Available Commands

### help

You might be used to tab completion, which the ARK CLI does support. Using this command ARK CLI but does show you instructions.

#### Usage

```bash
ark help
```

### config:cli

Configure the CLI

#### Usage

```bash
ark config:cli
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --token | the name of the token that should be used | :x: |
| --channel | the npm registry channel that should be used | :x: |

#### Examples

#### Use the "mine" token for configuration

```bash
ark config:cli --token="mine"
```

#### Switch to the Next Channel

```bash
ark config:cli --channel="next"
```

### config:database

Configure the database

#### Usage

```bash
ark config:database
```

> Omitting all flags will start the configuration in an interactive mode.

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --host | the host of the database | :x: |
| --port | the port of the database | :x: |
| --database | the name of the database that should be used | :x: |
| --username | the name of the database user | :x: |
| --password | the password for the database that should be used | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

```bash
ark config:database --host=localhost --port=5432 --database=ark_mainnet --username=ark --password=password
```

### config:forger

Configure the forging delegate

#### Usage

```bash
ark config:forger
```

> Omitting all flags will start the configuration in an interactive mode.

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --bip39 | the plain text bip39 passphrase | :x: |
| --password | the password for the encrypted bip38 | :x: |
| --method | the configuration method to use (bip38 or bip39) | :x: |
| --skipValidation | skip bip39 mnemonic validation | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Configure a Delegate Using an Encrypted BIP38

```bash
ark config:forger --method=bip38 --bip39="..." --password="..."
```

#### Configure a Delegate Using a BIP39 Passphrase

```bash
ark config:forger --method=bip39 --bip39="..."
```

### config:forger:bip38

Configure a delegate using an encrypted BIP38

#### Usage

```bash
ark config:forger:bip38
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --bip39 | the plain text bip39 passphrase | :white_check_mark: |
| --password | the password for the encrypted bip38 | :white_check_mark: |
| --skipValidation | skip bip39 mnemonic validation | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

```bash
ark config:forger:bip38 --bip38="..." --password="..."
```

### config:forger:bip39

Configure a delegate using a BIP39 passphrase

#### Usage

```bash
ark config:forger:bip39
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --bip39 | the plain text bip39 passphrase | :white_check_mark: |
| --skipValidation | skip bip39 mnemonic validation | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

```bash
ark config:forger:bip39 --bip39="..."
```

### config:publish

Publish the configuration

#### Usage

```bash
ark config:publish
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Publish the Configuration

```bash
ark config:publish
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --reset | overwrite existing configuration | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Reset the Configuration for the Mainnet Network

```bash
ark config:publish --network=mainnet --reset
```

### core:log

Show the core log

#### Usage

```bash
ark core:log
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --error | only show error output | :x: |
| --lines | number of lines to output | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

```bash
ark core:log
```

### core:restart

Restart the core

#### Usage

```bash
ark core:restart
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Restart the Core

```bash
ark core:restart
```

### core:start

Start the core

#### Usage

```bash
ark core:start
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --bip39 | the plain text bip39 passphrase | :x: |
| --bip38 | the encrypted bip38 | :x: |
| --password | the password for the encrypted bip38 | :x: |
| --[no-]daemon | start the process as a pm2 daemon | :x: |
| --disableDiscovery | permanently disable any peer discovery | :x: |
| --ignoreMinimumNetworkReach | ignore the minimum network reach on start | :x: |
| --launchMode | the mode the relay will be launched in (seed only at the moment) | :x: |
| --networkStart | indicate that this is the first start of seeds | :x: |
| --skipDiscovery | skip the initial peer discovery | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Run Core With a Daemon

```bash
ark core:start
```

#### Run Core as Genesis

```bash
ark core:start --networkStart
```

#### Disable Any Discovery by Other Peers

```bash
ark core:start --disableDiscovery
```

#### Skip the Initial Discovery

```bash
ark core:start --skipDiscovery
```

#### Ignore the Minimum Network Reach

```bash
ark core:start --ignoreMinimumNetworkReach
```

#### Start a Seed

```bash
ark core:start --launchMode=seed
```

#### Run Core Without a Daemon

```bash
ark core:start --no-daemon
```

or use the following command, which supports the same set of flags.:

```bash
ark core:run
```

### core:status

Display core status

#### Usage

```bash
ark core:status
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --token | the name of the token that should be used | :x: |

### core:stop

Stop the core

#### Usage

```bash
ark core:stop
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --daemon | stop the process or pm2 daemon | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Stop the Core

```bash
ark core:stop
```

#### Stop the Core Daemon

```bash
ark core:stop --daemon
```

### env:get

Get the value of an environment variable

#### Usage

```bash
ark env:get --key=KEY
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |
| --key | the key of which the value should be retrieved | :white_checkmark: |

#### Examples

#### Get the Log Level

```bash
ark env:get --key=CORE_LOG_LEVEL
```

### env:list

List all environment variables

#### Usage

```bash
ark env:list
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### List All Environment Variables

```bash
ark env:list
```

### env:paths

Get all of the environment paths

#### Usage

```bash
ark env:paths
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### List All Environment Paths

```bash
ark env:paths
```

### env:set

Set the value of an environment variable

#### Usage

```bash
ark env:set --key=KEY --value=VALUE
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |
| --key | the key of the value that should be updated | :white_checkmark: |
| --value | the new value of the key that should be updated | :white_checkmark: |

#### Examples

#### Set the Log Level

```bash
ark env:set --key=CORE_LOG_LEVEL --value=info
```

### forger:log

Show the forger log

#### Usage

```bash
ark forger:log
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --error | only show error output | :x: |
| --lines | number of lines to output | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

```bash
ark forger:log
```

### forger:restart

Restart the forger

#### Usage

```bash
ark forger:restart
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Restart the Forger

```bash
ark forger:restart
```

### forger:start

Start the forger

#### Usage

```bash
ark forger:start
```

or the equivalent, without invoking pm2:

```bash
ark forger:run
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --bip39 | the plain text bip39 passphrase | :x: |
| --bip38 | the encrypted bip38 | :x: |
| --password | the password for the encrypted bip38 | :x: |
| --[no-]daemon | start the process as a pm2 daemon | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Run a Forger With a bip39 Passphrase

```bash
ark forger:start --bip39="..."
```

#### Run a Forger With an Encrypted bip38

```bash
ark forger:start --bip38="..." --password="..."
```

#### Run a Forger Without a Daemon

```bash
ark forger:start --no-daemon
```

### forger:status

Display forger status

#### Usage

```bash
ark forger:status
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --token | the name of the token that should be used | :x: |

### forger:stop

Stop the forger

#### Usage

```bash
ark forger:stop
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --daemon | stop the process or pm2 daemon | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Stop the Forger

```bash
ark forger:stop
```

#### Stop the Forger Daemon

```bash
ark forger:stop --daemon
```

### forger:status

Show the forger status.

#### Usage

```bash
ark forger:status
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Example

```bash
ark forger:status
```

### relay:log

Show the relay log

#### Usage

```bash
ark relay:log
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --error | only show error output | :x: |
| --lines | number of lines to output | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

```bash
ark relay:log
```

### relay:restart

Restart the relay

#### Usage

```bash
ark relay:restart
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Restart the Relay

```bash
ark relay:restart
```

### relay:start

Start the relay

#### Usage

```bash
ark relay:start
```

or the equivalent without using pm2:

```bash
ark relay:run
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --[no-]daemon | start the process as a pm2 daemon | :x: |
| --disableDiscovery | permanently disable any peer discovery | :x: |
| --ignoreMinimumNetworkReach | ignore the minimum network reach on start | :x: |
| --launchMode=launchMode | the mode the relay will be launched in (seed only at the moment) | :x: |
| --networkStart | indicate that this is the first start of seeds | :x: |
| --skipDiscovery | skip the initial peer discovery | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Run a Relay With a pm2 Daemon

```bash
ark relay:start --network=mainnet
```

#### Run a Genesis Relay

```bash
ark relay:start --networkStart
```

#### Disable Any Discovery by Other Peers

```bash
ark relay:start --disableDiscovery
```

#### Skip the Initial Discovery

```bash
ark relay:start --skipDiscovery
```

#### Ignore the Minimum Network Reach

```bash
ark relay:start --ignoreMinimumNetworkReach
```

#### Start a Seed

```bash
ark relay:start --launchMode=seed
```

#### Run a Relay Without a Daemon

```bash
ark relay:start --no-daemon
```

### relay:status

Display relay status

#### Usage

```bash
ark relay:status
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --token | the name of the token that should be used | :x: |

### relay:stop

Stop the relay

#### Usage

```bash
ark relay:stop
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --daemon | stop the process or pm2 daemon | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

#### Examples

#### Stop the Relay

```bash
ark relay:stop
```

#### Stop the Relay Daemon

```bash
ark relay:stop --daemon
```

### top

List all core daemons

#### Usage

```bash
ark top
```

#### Examples

#### List All Core Daemons

```bash
ark top
```

### snapshot:dump

Create a dump of the database

#### Usage

```bash
ark snapshot:dump
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --start | [default: -1] start network height to export | :x: |
| --end | [default: -1] end network height to export | :x: |
| --skipCompression | skip gzip compression | :x: |
| --codec | codec name | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

### snapshot:restore

Restore the database from a dump

#### Usage

```bash
ark snapshot:restore
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --verify | signature verification | :x: |
| --truncate | truncate database before rollback | :x: |
| --blocks | blocks to append to, correlates to folder name | |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

### snapshot:rollback

Roll back the database to a specific height or by a specified number of blocks

#### Usage

```bash
ark snapshot:rollback
```

#### Flags

<x-alert type="warning">
Either `height` or `number` has to be provided.
</x-alert>

| Name | Description | Required |
| :--- | :--- | :---: |
| --height | block network height number to roll back to | :ballot_box_with_check: |
| --number | number of blocks to roll back | :ballot_box_with_check: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

### snapshot:truncate

Truncate the database

#### Usage

```bash
ark snapshot:truncate
```

| Name | Description | Required |
| :--- | :--- | :---: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

### snapshot:verify

Verify snapshot

#### Usage

```bash
ark snapshot:verify
```

#### Flags

| Name | Description | Required |
| :--- | :--- | :---: |
| --blocks | snapshot folder name | :x: |
| --network | the name of the network that should be used | :x: |
| --token | the name of the token that should be used | :x: |

### plugin:install

Install a plugin from an npm package name, git repository url or local file.

#### Usage

```bash
ark plugin:install {npm|git|file}
```

##### NPM

```bash
ark plugin:install @vendor/pkg
```

##### Git

```bash
ark plugin:install git@github.com:vendor/pkg.git
```

##### Usage

```bash
ark plugin:install /path/to/some/vendor/pkg.tar.gz
```

### plugin:update

Update a plugin based on its name. If the name contains a scope like `@arkecosystem` than this scope needs to be included.

#### Usage

```bash
ark plugin:update {package}
```

### plugin:remove

Remove a plugin based on its name. If the name contains a scope like `@arkecosystem` than this scope needs to be included.

#### Usage

```bash
ark plugin:remove {package}
```

<!-- markdownlint-enable -->
