---
title: Getting Started
---

# Getting Started

The Elasticsearch plugin allows you to run an Elasticsearch instance

> All HTTP requests have to be sent with the `Content-Type: application/json` header. If the header is not present, it will result in malformed responses or request rejections.

## Installation

The plugin can be installed by running `yarn global add @arkecosystem/core-elasticsearch`. Make sure to have [Elasticsearch](https://www.elastic.co/guide/en/elasticsearch/reference/current/install-elasticsearch.html) installed too, before moving on to configuring the plugin.

## Alias

`elasticsearch`

## Configuration

The Elasticsearch plugin requires the following configuration in your `plugins.js` file. Make sure to have this configuration listed after `@arkecosystem/core-blockchain`.

```javascript
'@arkecosystem/core-elasticsearch': {
  server: {
    host: process.env.CORE_ES_SERVER_HOST || '0.0.0.0',
    port: process.env.CORE_ES_PORT || 4007,
    whitelist: ['127.0.0.1', '::ffff:127.0.0.1', '192.168.*']
  },
  client: {
    host: process.env.CORE_ES_CLIENT_HOST ||"localhost:9200",
    log: process.env.CORE_ES_LOG ||"info"
  },
  chunkSize: process.env.CORE_ES_CHUNK || 5000
},
```

It is recommended to make configuration changes to these options by working with your `.env` file and the corresponding variables:

| Variable | Description | Type | Default |
| :--- | :--- | :---: | :---: |
| CORE\_ES\_SERVER\_HOST | The host to expose the api on | string | `"0.0.0.0"` |
| CORE\_ES\_PORT | The port on which the Elasticsearch plugin will listen | integer | `4007` |
| CORE\_ES\_CLIENT\_HOST | The host on which the Elasticsearch client is running | string | `"0.0.0.0"` |
| CORE\_ES\_LOG | The loglevel used to log plugin messages on | string | `"info"` |
| CORE\_ES\_CHUNK | The chunk sizes used by Elasticsearch for indexing | integer | `5000` |

The `whitelist` property can be changed directly in the `plugins.js` file and is an `Array` consisting of IP addresses that you allow to make connections to the Elasticsearch API. By default, only local access to the Elasticsearch API is allowed. This means that if you want to expose your Elasticsearch API to the outside, you'll need to explicitely add the IP addresses that you will use to this list \(recommended approach\). It is also possible to use wildcards to indicate a range of IPs \(e.g. `"12.34.56.*"`\) or even to allow everyone \(e.g. `"*"`\) \(not recommended\).

## Final Checks

After making changes to the Elasticsearch configuration, you will need to restart your relay process for the changes to take effect. If you want to check whether your Elasticsearch instance is running, you should pay attention to the startup messages in the logs of your relay. It will print a line similar to `INFO : [ES] Initialising Blocks` when it has successfully started the plugin, after which it will start indexing.
