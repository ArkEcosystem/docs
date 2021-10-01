---
title: Upgrade Guides - Core v2.7 to v3.0 - Docker
---

# v3.0 Upgrade Guide - Docker

ARK `v3.0` is a major update **not backward compatible with `v2.7`**.

| Concern       | Difficulty    | Description                                                                                                                   |
| :-----------: | :-----------: | :---------------------------------------------------------------------------------------------------------------------------- |
| Time          | **HIGH**      | upgrading to `v3.0` requires new configuration files and database migrations.                                                 |
| Complexity    | **HIGH**      | a full overhaul of the internals and plugin system, which makes previous modifications incompatible.                          |
| Risk          | **HIGH**      | `v3.0` is not backward compatible with `v2.x` releases as it includes a full overhaul of the internals and a new P2P server.  |

## Upgrade Steps

Upgrading from `v2.7` to `v3.0` is relatively straightforward if you follow the instructions. Even though we try to ensure backward compatibility (BC) as much as possible, sometimes it is not possible or very complicated to avoid it and still create an excellent solution to a problem.

<x-alert type="danger">
**DANGER:** Upgrading a complex software project always comes at the risk of breaking something, so make sure you have a backup.
</x-alert>

### Step 1. Getting the Needed Files

```shell
mkdir ~/mainnet &&
cd ~/mainnet &&
curl -sOJ https://raw.githubusercontent.com/ArkEcosystem/core/master/docker/production/mainnet/docker-compose.yml &&
curl -sOJ https://raw.githubusercontent.com/ArkEcosystem/core/master/docker/production/mainnet/mainnet.env &&
curl -sOJ https://snapshots.ark.io/v3-migrations.sql
```

### Step 2. Performing the Upgrade

```shell
cd ~/mainnet 
```

Stop & Remove current ARK Core container only (preserving the DB container):

```shell
docker-compose rm -s -v -f core
```

Remove the old ARK Core Docker image:

```shell
docker rmi arkecosystem/core
```

Apply the DB migration SQL script(adapt the `psql` command with your user and database):

```shell
docker cp v3-migrations.sql postgres-mainnet:/tmp
docker exec -it postgres-mainnet psql -U node -d core_mainnet -f /tmp/v3-migrations.sql
```

Start the new ARK Core container:

```shell
docker-compose up -d core
```

<x-alert type="warning">
In your logs, you may see repeat messages about connecting to your database, such as `Connecting to database: ark_mainnet`. This is due to the database migration and can take up to 1 hour to complete depending on your server hardware.
</x-alert>

<x-alert type="info">
Each run-mode (`core`, `relay`, and `forger`) now contains its own configuration for plugins. This configuration file can be located here: `~/.config/ark-core/mainnet/app.json`.
</x-alert>

### Reporting Problems

If you happen to experience any issues, please [open an issue](https://github.com/ArkEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it, and info about your environment.

## API Changes

### 'POST /search' Endpoints Removed

All `POST /search` endpoints have been removed in favor of using the main index endpoint with URL parameters (e.g. `GET /transactions`). All main index endpoints have been improved to allow searching (see the API improvements below).

### Standardized Wallet Response Format

Wallet endpoints now return a wallet object following this format:

```json
{
    "address",
    "publicKey",
    "balance",
    "nonce",
    "attributes": {
        "delegate": {
            "username",
            "resigned",  // this attribute will only be set if the delegate has resigned
            // other delegate attributes
        },
        "vote",
        "secondPublicKey",
        "multiSignature",
    }
}
```

As a result, getting wallets based on a specific attribute requires using the full attribute path.

`GET /wallets?attributes.delegate.username=mydelegate`

<x-alert type="info">
**Note:** `isDelegate` no longer exists in the wallet response**. To determine if the wallet is a delegate, check for the existence of `attributes.delegate` and that `attributes.delegate.resigned` is either non-existent or false.
</x-alert>

### 'addresses' Parameter Removed

The `addresses` parameter was previously used to search for multiple addresses at the same time. This parameter is now deprecated in favor of using the `address` parameter.

`GET /transactions?address=AXGc1bvU3g3rHmx9WVkUUHLA6gbzh8La7V,AVLPrtx669XgvervE6A594poB613HG3mSM`

## API improvements

### Filter by Any Field

You can now filter by any field returned in the API response.

For example, `GET /delegates` now returns:

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

By examining the above response, we find that API queries allow filtering by any field.

For example:

* `GET /delegates?isResigned=true`
* `GET /delegates?blocks.produced=13886`

### Combining Different Fields

We also see that combining different fields (AND) is permitted.

`GET /delegates?isResigned=true&blocks.produced=0`

### Filtering By a Set of Values

Filtering by a set of comma-separated values for one field (OR) is also permitted.

`GET /delegates?username=protokol1,protokol2`

### Chaining Multiple Fields

We can also chain multiple fields.

`GET /delegates?username=protokol1,protokol2&isResigned=false`

### 'orderBy' Any Field

Additionally, we can order any field using the `orderBy` parameter.

`GET /delegates?orderBy=rank:desc`

<x-alert type="info">
The format is `field:asc|desc` depending on whether you want to order by ascending or descending.
</x-alert>

### Combining Filters

Finally, we can combine all of the previously discussed filters in one call.

`GET /delegates?isResigned=false&orderBy=rank:asc`
