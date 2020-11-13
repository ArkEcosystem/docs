---
title: Getting Started
---

# Getting Started

The Manager API allows you to gather common node information, access logs, control running processes and handle ledger snapshots on demand.
Requests should contain valid JSON RPC 2.0 data which are transformed over HTTP / HTTPS protocol using GET method.

<x-alert type="warning">
All HTTP requests have to be sent with the `Content-Type: application/vnd.api+json` header. If the header is not present, it will result in malformed responses or request rejections.
</x-alert>

## Installation

The Manager API comes by default with an installation of core. In case you don't have it installed, you can add it manually by running `yarn global add @arkecosystem/core-manager`.

## Alias

`manager`

## Configuration

The Manager API comes with default configuration. Additionally you can customize API specific settings in .env or app.json file.

<x-alert type="warning">
We strongly recommend setting basic authentication using Argon2Id hashing method with custom secret and using HTTPS access only.
</x-alert>

### Argon2Id Authentication

It is recommend to make configuration changes for defining user access and IP whitelisting within your app.json file.

```javascript
{
    "package": "@arkecosystem/core-manager",
    "options": {
        "plugins": {
            "whitelist": ["127.0.0.1"],
            "basicAuthentication": {
                "enabled": true,
                "secret": "secret",
                "users": [
                     {
                         "username": "username",
                         "password": "$argon2id$v=19$m=4096,t=3,p=1$NiGA5Cy5vFWTxhBaZMG/3Q$TwEFlzTuIB0fDy+qozEas+GzEiBcLRkm5F+/ClVRCDY"
                     }
                ]
            }
        }
    }
}
```

The `whitelist` property is an `Array` consisting of IP addresses that you allow to make connections to the manager API.
By default, only local access to the webhook API is allowed. This means that if you want to expose your webhook API to the outside, you'll need to explicitely add the IP addresses that you will use to this list \(recommended approach\).
It is also possible to use wildcards to indicate a range of IPs \(e.g. `"12.34.56.*"`\) or even to allow everyone \(e.g. `"*"`\) \(not recommended\).

### Token authentication

Alternatively instead basic authentication, token authentication can be enabled (not recommend).

```javascript
{
    "package": "@arkecosystem/core-manager",
    "options": {
        "plugins": {
            "whitelist": ["127.0.0.1"],
            "tokenAuthentication": {
                "enabled": true,
                "token": "secret_token"
            }
        }
    }
}
```

Include Authorization header into request with content: Bearer <secret_token>.

### Environment variables

It is recommended to make configuration changes to these options by working with your `.env` file and the corresponding variables:

| Variable | Description | Type | Default |
| :--- | :--- | :---: | :---: |
| CORE\_MONITOR\_DISABLED | Enables or disabled the manager API plugin | boolean | `false` |
| CORE\_MONITOR\_HOST | The host to expose the API on | string | `"0.0.0.0"` |
| CORE\_MONITOR\_PORT | The API port on which the plugin will listen | integer | `4005` |
| CORE\_MONITOR\_SSL | Enables or disabled the manager API plugin using SSL. | boolean | `false` |
| CORE\_MONITOR\_SSL\_HOST | The host to expose the HTTPS API on | string | `"0.0.0.0"` |
| CORE\_MONITOR\_SSL\_PORT | The host to expose the HTTPS API on | port | `8445` |
| CORE\_MONITOR\_SSL\_KEY | Determines where SSL key is located. | port | `8445` |
| CORE\_MONITOR\_SSL\_CERT | Determines where SSL certificate is located. | port | `8445` |


## Requirements

Manager API obtains some of the required data from running core or relay and forger process.
Be aware that HTTP server is running on node instance and that all processes are run with ark [process_name]":start option.
This way the process is run as Pm2 process, which is necessary, because Pm2 IPC is used for getting some data required by manager API.

## Final checks

After making changes to the manager API configuration, you will need to restart your manager process for the changes to take effect.
If you want to check whether your manager API is running, you should pay attention to the startup messages in the logs of your relay.
It will print a line similar to ` INFO : Public JSON-RPC API (HTTP) Server started at http://0.0.0.0:4005` when it has successfully started the manager API.

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ark.io](mailto:security@ark.io). All security vulnerabilities will be promptly addressed.
