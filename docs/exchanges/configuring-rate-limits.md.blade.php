---
title: Configuring Rate Limits
---

# Configuring Rate Limits

ARK Core is mainly used in the context of public services, providing desktop wallets with the necessary endpoints to function. Since they serve anonymous users and to protect against DDoS attacks, ARK Core nodes have strict rate limits. Enterprise users \(such as exchanges\) might encounter a problem creating large batches of transactions and broadcasting them. The rate limit can be configured in multiple ways to solve these problems.

## Exceeding the Rate Limit <a id="exceeding-the-rate-limit"></a>

By default, rate limits are enabled on ARK Core nodes. When the rate limit is exceeded; a `429` HTTP status is returned.

## Configuring the Rate Limit <a id="configuring-the-rate-limit"></a>

The default way to configure the node's rate limit is by editing the .env file found at `~/.config/ark-core/{network}/.env`. Two keys interest us here:

### file: ~/.config/ark-core/{network}/.env <a id="file-config-ark-core-network-env"></a>

```javascript
CORE_API_RATE_LIMIT=true
CORE_API_RATE_LIMIT_USER_LIMIT=300
```

Setting `CORE_API_RATE_LIMIT` to false will globally disable all rate limits. For internal use this is secure. More fine-grained control may be exerted by using `CORE_API_RATE_LIMIT_USER_LIMIT`, which uses IP addresses to assign rate limits. The unit is `requests/minute`.

## Configuration Through a Plugin <a id="configuration-through-a-plugin"></a>

Lower access to the rate limiting can be obtained by writing a plugin at `~/.config/ark-core/{network}/plugin.js`. We can define custom behavior and [monkey patch](https://en.wikipedia.org/wiki/Monkey_patch) the ARK Core rate limiter.

```javascript
"@arkecosystem/core-api": {
    enabled: !process.env.CORE_API_DISABLED,
    host: process.env.CORE_API_HOST || "0.0.0.0",
    port: process.env.CORE_API_PORT || 4003,
    whitelist: ["*"],
}
```

The `whitelist` option may be used to allow specific IP addresses to access the RPC service, which by default is only accessible by requests originating from `localhost`.

Cache timeouts can be disabled, which is especially useful on resource-strained machines running heavy queries, such as walking the chain block by block.

## Further Reference <a id="further-reference"></a>

ARK Core uses the [hapi](https://hapijs.com/) framework for its API internals and more specifically [hapi-rate-limit](https://github.com/wraithgar/hapi-rate-limit). This ratelimiter can be configured by setting/altering [core-api](https://github.com/ARKEcosystem/core/tree/develop/packages/core-api/src/defaults.js#L48-L56).

```javascript
rateLimit: {
    enabled: !process.env.CORE_API_RATE_LIMIT,
    pathLimit: false,
    userLimit: process.env.CORE_API_RATE_LIMIT_USER_LIMIT || 300,
    userCache: {
        expiresIn: process.env.CORE_API_RATE_LIMIT_USER_EXPIRES || 60000,
    },
    ipWhitelist: ["127.0.0.1", "::ffff:127.0.0.1"],
},
```

Here, `pathLimit` can be used to limit the total requests per path per given period, or set it to `false` to disable it. By default `pathLimits` are disabled.
