---
title: Getting Started - Core Configuration
---

# Core Server Configuration

Nodem communicates with your Core server using the [Manager API](/docs/api/manager-api/getting-started). This RPC interface allows you to gather performance information, control node processes, and access logs remotely, all with the added benefit of increased security since repeated direct access to your server is no longer necessary.

This page will provide a brief overview of:

* what the [Manager API Plugin](#the-core-manager-plugin) is;
* how to [install](#installation) it, and
* some common [configurations](#configuration), including how to extend server [logging](#logging) to the Manager API

## The Core Manager Plugin

The Manager API is enabled by installing the `core-manager` plugin to your new or existing Core Node. This plugin is what provides the RPC interface for remote interaction.

## Installation

From your Core server's CLI, install the `core-manager` plugin using the following command:

```bash
ark plugin:install @arkecosystem/core-manager
```

Once the installation process has finished, you may proceed with _configuring_ the `core-manager`  plugin.

## Configuration

The Core Manager plugin does not have a default configuration. You may set parameters manually using your Core instance's `app.json` and `.env` files, or you can establish a basic configuration using an interactive process offered by the `ark manager:config` command.

<x-alert type="info">
For more information on all available configuration options, please visit the [Core Manager API's](/docs/api/manager-api/getting-started#configuration) documentation.
</x-alert>

Launch the interactive process by executing the following command:

```bash
ark manager:config
```

**Host** - This sets the `CORE_MANAGER_HOST` `.env` variable and represents the host IP to which the Manager API should be exposed. The default value is `0.0.0.0`.

```shell
? What host do you want to use? … 0.0.0.0
```

**Port** - This sets the `CORE_MANAGER_PORT` `.env` variable and represents the API port on which the Manager API plugin will listen. The default value is `4005`.

```shell
? What port do you want to use? … 4005
```

**Whitelist** - This sets the `"whitelist"` array property of your `app.json` file and represents the list of IP addresses permitted to access the Manager API. Use the `*` symbol to denote an IP range (`12.34.56.*"`) or as a wildcard to allow all IP addresses (`*`).

<x-alert type="danger">
Note that allowing access by all IP addresses is heavily discouraged. You should restrict access to your server's Manager API only to those for whom you wish to permit access.
</x-alert>

```shell
? Which IPs can be whitelisted? Separate values with a comma. Enter * for all. … *
```

**Authentication** - This sets the `"basic/tokenAuthentication"` property of your `app.json` file and defines how users will be permitted to access your server's Manager API. These values are user-provided (i.e., you manually create, record, and enter them), and you will later use these to add your server to Nodem.

<x-alert type="danger">
**These values are important!**<br>Passwords, for instance, are hashed and will not be recoverable once entered.<br>Make sure to write these values down and keep them safe!
</x-alert>

```shell
? Which authentication system do you want to use? › - Use arrow-keys. Return to submit.
    None
    Token
❯   Basic
```

**Basic** _(Recommended)_ - `Basic` is a traditional username and password. This is the preferred method for permitting Manager API access.

```shell
✔ Enter username: … test
✔ Enter password: … ****
? Can you confirm? › (y/N)
```

**Token** _(Discouraged)_ - `Token` is a traditional access key consisting of a random string of characters. This method is discouraged as they are easier to compromise.

<x-alert type="danger">
Access tokens are stored in plain text. If compromised, it must be replaced anywhere it's used, and each team member must update their credentials accordingly.
</x-alert>

```shell
✔ Enter authentication token: … ********************
? Can you confirm? › (y/N)
```

When satisfied with your entries, enter `y` to commit your configuration changes.

```shell
✔ What host do you want to use? … 0.0.0.0
✔ What port do you want to use? … 4005
✔ Which IPs can be whitelisted? Separate values with a comma. Enter * for all. … *
✔ Which authentication system do you want to use? › Basic
✔ Enter username: … test
✔ Enter password: … ****
✔ Can you confirm? … yes
```

Once the process is complete, your new settings will be reflected in your server's `.env` file and your server's `app.json` file as exampled below.

```json
{
    ...
    "manager": {
        "plugins": [
            {
                "package": "@arkecosystem/core-logger-pino"
            },
            {
                "package": "@arkecosystem/core-database"
            },
            {
                "package": "@arkecosystem/core-snapshots"
            },
            {
                "package": "@arkecosystem/core-manager",
                "options": {
                    "plugins": {
            "basicAuthentication": {
                "enabled": true,
                "secret": "secret",
                "users": [
                    {
                        "username": "test",
                        "password": "$argon2id$v=19$m=4096,t=3,p=1$NiGA5Cy5vFWTxhBaZMG/3Q$TwEFlzTuIB0fDy+qozEas+GzEiBcLRkm5F+/ClVRCDY"
                    }
                ]
            }
                        },
                        "whitelist": [
                            "*"
                        ]
                    }
                }
            }
        ]
    }
}

```

### Logging

Before Nodem can access and provide logging features, you must first extend process logging to your server's Manager API.

To extend logging functionality, add `core-manager` to the desired process(es) in your `app.json` file. You may add `core-manager` to either the `Relay` and/or `Forger` process for individual logging or the `Core` process for combined logs.

You must add the `core-manager` plugin to the `plugins` property of the desired process(es) directly below the `core-logger-pino` object. You can do this using your server's CLI (e.g., `sudo nano .config/ark-core/devnet/app.json`).

Below is an example of adding `core-manager` to the `Forger` process to extend logging.

**Before**:

```json
{
    ...
    "forger": {
        "plugins": [
            {
                "package": "@arkecosystem/core-logger-pino"
            },
            {
                "package": "@arkecosystem/core-transactions"
            },
            {
                "package": "@arkecosystem/core-magistrate-transactions"
            },
            {
                "package": "@arkecosystem/core-forger"
            }
        ]
    },
    ...
}
```

**After**:

```json
{
    ...
    "forger": {
        "plugins": [
            {
                "package": "@arkecosystem/core-logger-pino"
            },
            {
                "package": "@arkecosystem/core-manager"
            },
            {
                "package": "@arkecosystem/core-transactions"
            },
            {
                "package": "@arkecosystem/core-magistrate-transactions"
            },
            {
                "package": "@arkecosystem/core-forger"
            }
        ]
    },
    ...
}
```

<x-alert type="info">
Don't forget to visit the [Core Manager API](/docs/api/manager-api/getting-started#configuration) documentation for more information on all available configuration options.
</x-alert>
