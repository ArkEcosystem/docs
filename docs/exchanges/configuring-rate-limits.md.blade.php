---
title: Configuring Rate Limits
---

# Configuring Rate Limits

ARK Core is mainly used in the context of public services, providing desktop wallets with the necessary endpoints to function. Since they serve anonymous users and to protect against DDoS attacks, ARK Core nodes have strict rate limits. Enterprise users (such as exchanges) might encounter a problem creating large batches of transactions and broadcasting them. The rate limit can be configured in multiple ways to solve these problems.

## Exceeding the Rate Limit <a id="exceeding-the-rate-limit"></a>

By default, rate limits are enabled on ARK Core nodes. When the rate limit is exceeded; a `429` HTTP status is returned.

## Configuring the Rate Limit <a id="configuring-the-rate-limit"></a>

You can fine tune or completely disable the node's rate limit by editing the .env file found at `~/.config/ark-core/{network}/.env`. Find most important parameters below:

### file: ~/.config/ark-core/{network}/.env <a id="file-config-ark-core-network-env"></a>

```javascript
CORE_API_RATE_LIMIT_DISABLED=true
CORE_API_RATE_LIMIT_USER_LIMIT=300
CORE_API_RATE_LIMIT_WHITELIST=127.0.0.1,192.168.1.1,172.31.255.1
```

Setting `CORE_API_RATE_LIMIT_DISABLED=true` will globally disable all rate limits. For internal use this is safe. More fine-grained control may be exerted by using `CORE_API_RATE_LIMIT_USER_LIMIT`, which uses IP addresses to assign rate limits. The unit is `requests/minute` (default: 100 requests/per minute/per IP).
Excluding certain IP addresses from rate limiting can be achieved by setting `CORE_API_RATE_LIMIT_WHITELIST=` followed by comma separated list of IP addresses (default: 172.0.0.1).

## Use case 1: Disable Rate Limits  <a id="disable-rate-limits"></a>

<x-alert type="warning">
**WARNING:** Make sure API is accessible only to your internal network and not visible to the outside world.
</x-alert>

```javascript
CORE_API_RATE_LIMIT_DISABLED=true
```

## Use case 2: White Listing  <a id="white-listing"></a>

<x-alert type="info">
**INFO:** Instead of globally disabling rate limits it is possible to exclude certain IP addresses from rate limits and raise the global limits.
</x-alert>

```javascript
CORE_API_RATE_LIMIT_WHITELIST=127.0.0.1,192.168.1.1,172.31.255.1
CORE_API_RATE_LIMIT_USER_LIMIT=300
```
