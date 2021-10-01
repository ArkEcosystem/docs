---
title: Upgrade Guides - Core v2.7 to v3.0 - JSON-RPC
---

# v3.0 Upgrade Guide - JSON-RPC

<x-alert type="danger">
**WARNING:** Upgrading a complex software project always comes at the risk of breaking something, so make sure you have a backup.
</x-alert>

## Performing the Upgrade

```shell
exchange-json-rpc update --force --restart
```

### Reporting Problems

If you happen to experience any issues please [open an issue](https://github.com/ArkEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it and info about your environment.

## Related ARK Core API changes

### `POST /search` endpoints removed

All `POST /search` endpoints have been removed, in favor of using the main index endpoint (for example `GET /transactions`) with url parameters. All the main index endpoints have been improved to allow searching (see below API improvements).

### Standardized wallet response format

Now wallet endpoints return wallet object following this format :

```json
{
    "address",
    "publicKey",
    "balance",
    "nonce",
    "attributes": {
        "delegate": {
            "username",
            "resigned", // this attribute will only be set if delegate is resigned
            // other delegate attributes
        },
        "vote",
        "secondPublicKey",
        "multiSignature",
    }
}
```

As a result, to get wallets based on a specific attribute, we have to use the full attribute path, for example :

`GET /wallets?attributes.delegate.username=mydelegate`

**Note that `isDelegate` does not exist anymore in the wallet response** : in order to check if the wallet is a delegate, you should check the existence of `attributes.delegate` and that `attributes.delegate.resigned` is either non-existent or false.

### `addresses` parameter was removed

`addresses` was a parameter used to search for multiple addresses at the same time. Now with the improvements in api, this special parameter is not needed anymore as we can simply use the `address` parameter like this for example :

`GET /transactions?address=AXGc1bvU3g3rHmx9WVkUUHLA6gbzh8La7V,AVLPrtx669XgvervE6A594poB613HG3mSM`

### API improvements

#### Filter by any field returned in the API response

Let’s take an example, say we `GET /delegates` and we get this entry in the response :

```json
{
    "username": "protokol1",
    "address": "ATKegnoyu9Fkej5FxiJ3biup8xv8zM34M3",
    "publicKey": "033f6d89ad9f3e6dfb8cfb4f2d7fca7adeb6db15c282c113d0452238293bb50046",
    "votes": "302776200010000",
    "rank": 1,
    "isResigned": false,
    "blocks": {
        "produced": 13886,
        "last": {
            "id": "9630922981846498992",
            "height": 1150380,
            "timestamp": {
                "epoch": 112045656,
                "unix": 1602146856,
                "human": "2020-10-08T08:47:36.000Z"
            }
        }
    },
    "production": {
        "approval": 2.42
    },
    "forged": {
        "fees": "10000000",
        "rewards": "2777200000000",
        "total": "2777210000000"
    }
}
```

By just looking at the response we can create an API query that filters by any field, like :

`GET /delegates?isResigned=true`

`GET /delegates?blocks.produced=13886`

We can still combine (AND) different fields :

`GET /delegates?isResigned=true&blocks.produced=0`

#### Filter by a set of values for one field (OR)

Following the same example, we can also specify a set of values (OR) for one field using comma-separated values :

`GET /delegates?username=protokol1,protokol2`

And we can still combine with other fields (AND) :

`GET /delegates?username=protokol1,protokol2&isResigned=false`

#### Order by any field

Additionally, we can order by any field by using the `orderBy` parameter :

`GET /delegates?orderBy=rank:desc`

The format is `field:asc|desc` depending on whether you want to order ascending or descending.

We can combine this with the filters :

`GET /delegates?isResigned=false&orderBy=rank:asc`
