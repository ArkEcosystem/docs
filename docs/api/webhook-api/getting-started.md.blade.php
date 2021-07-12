---
title: Getting Started
---

# Getting Started

The webhooks API allows you to register a webhook in a specific node, which will send a payload to a predefined target when certain conditions are met. Webhooks ensure that you do not need to poll the public API periodically and are a robust way to stay up-to-date with the blockchain state.

<x-alert type="warning">
All HTTP requests have to be sent with the `Content-Type: application/json` header. If the header is not present, it will result in malformed responses or request rejections.
</x-alert>

## Installation

The webhooks API comes by default with an installation of core. In case you don't have it installed, you can add it manually by running `yarn global add @arkecosystem/core-webhooks`.

## Alias

`webhooks`

## Configuration

The webhooks API requires the following configuration in your `app.json` file. Make sure to have this configuration listed after `@arkecosystem/core-blockchain`.

```javascript
{
    "package": "@arkecosystem/core-webhooks"
},
```

It is recommended to make configuration changes to these options by working with your `.env` file and the corresponding variables:

| Variable | Description | Type | Default |
| :--- | :--- | :---: | :---: |
| CORE_WEBHOOKS_ENABLED | Enables or disabled the webhook API plugin | boolean | `false` |
| CORE_WEBHOOKS_HOST | The host to expose the API on | string | `"0.0.0.0"` |
| CORE_WEBHOOKS_PORT | The API port on which the plugin will listen | integer | `4004` |

The `whitelist` property can be changed directly in the `app.json` file and is an `Array` consisting of IP addresses that you allow to make connections to the webhook API. By default, only local access to the webhook API is allowed. This means that if you want to expose your webhook API to the outside, you'll need to explicitly add the IP addresses that you will use to this list (recommended approach). It is also possible to use wildcards to indicate a range of IPs (e.g. `"12.34.56.*"`) or even to allow everyone (e.g. `"*"`) (not recommended).

```javascript
{
    "package": "@arkecosystem/core-webhooks",
    "options": {
        "whitelist": ["127.0.0.1", "::ffff:127.0.0.1"]
    }
},
```

**Remember that there is no further authentication on the webhooks API itself, meaning that everyone that can access it can add, edit and delete your webhooks.**

**Note**: due to the way the `CORE_WEBHOOKS_ENABLED` check is implemented, you will need to remove the entry from your `.env` file if you want to disabled it. Setting the property to `CORE_WEBHOOKS_ENABLED=false` will not disable the webhooks API.

## Final Checks

After making changes to the webhooks API configuration, you will need to restart your relay process for the changes to take effect. If you want to check whether your webhook API is running, you should pay attention to the startup messages in the logs of your relay. It will print a line similar to `INFO : Webhook API Server running at: http://0.0.0.0:4004` when it has successfully started the webhooks API. When you see `INFO : Webhooks are disabled` it means the webhooks API is currently disabled.
