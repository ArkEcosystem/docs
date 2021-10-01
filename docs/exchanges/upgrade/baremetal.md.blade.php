---
title: Upgrade Guides - Core v2.7 to v3.0 - BareMetal / VM
---

# v3.0 Upgrade Guide - BareMetal / VM

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

### Notes

After upgrading, check that your application still works as expected and that no plugins are broken. See the following notes on which changes to consider when upgrading from one version to another.

<x-alert type="danger">
**DANGER:** Do NOT run any of the mentioned commands with **sudo** unless explicitly stated.
</x-alert>

### Prerequisites

Check what node version you have currently installed by running `node -v`. **If this shows a version below 14, you will have to update this before proceeding with the installation**.

To do this, run the following commands:

```bash
sudo sed -i s/node_11/node_14/ /etc/apt/sources.list.d/nodesource.list
sudo sed -i s/node_12/node_14/ /etc/apt/sources.list.d/nodesource.list
sudo apt-get update && sudo apt-get upgrade
```

When finished, you should see version 14 installed when you run `node -v` again!

### Step 1: Database Migration Script

Use `wget` to fetch the `v3-migrations.sql` script.

```shell
wget -N https://snapshots.ark.io/v3-migrations.sql
```

### Step 2: Apply the iptables script

<x-alert type="warning">
**WARNING:** Using the iptables script is _highly recommended_. Don't skip this unless required by your system's architecture and/or you're aware of the security implications.
</x-alert>

The iptables script uses standard firewall tools to rate-limit certain connections.

Specifically:

* Parallel/simultaneous P2P connections are restricted to a total of _10 per IP address_; this number can be adjusted using the `P2P_GLOBAL_CONN` script variable.
* Global connections are limited to 4 _NEW_ connections per 30-second interval.

**Running the Script**:

Download and execute the iptables script using the following commands:

```shell
wget -N https://raw.githubusercontent.com/ArkEcosystem/core/master/scripts/v3-iptables.sh
bash ./v3-iptables.sh start
```

**Creating a cron job**:

Because the filtering initiated by the iptables script does not persist after a system reboot, you should also consider adding the script to a cron job.

1. edit the crontab file:

   ```shell
   crontab -e
   ```

2. add the following line to the end of the crontab file:

   ```shell
   @reboot bash ~/v3-iptables.sh start
   ```

3. save the changes and exit (e.g. `ctrl + x`).

4. apply the permissions:

   ```shell
   sudo bash -c "echo \"$USER ALL=(ALL) NOPASSWD:/sbin/iptables\" >> /etc/sudoers"
   ```

<x-alert type="warning">
Failing to apply permissions will prevent the iptables script from executing after a system reboot.
</x-alert>

### Step 3: Update & Start Core

<x-alert type="danger">
**DANGER:** The commands below will remove and reset your configuration files in `~/.config/ark-core/mainnet`.
</x-alert>

<x-alert type="danger">
**Please backup any configuration files you may need later, such as your `delegate.json`, `plugin.js` & `.env` files.**
</x-alert>

1. Ensure that the **database migration script** is in your current directory--where you created the `v3-migrations.sql` file.

2. Adapt the `psql` command with your user and database using the following commands:

    _(the default DB password is **`password`**)_

    ```shell
    pm2 stop all
    ```

    ```shell
    psql -U ark -h 127.0.0.1 -d ark_mainnet -f v3-migrations.sql
    ```

    ```shell
    ark update
    ```

3. If applicable*, backup the `delegate.json` file:

    ```shell
    cp ~/.config/ark-core/mainnet/delegates.json ~/delegate.json.backup
    ```

4. Publish the updated configuration:

    ```shell
    rm -rf ~/.config/ark-core/ && ark config:publish --token=ark --network=mainnet --reset
    ```

5. If applicable*, restore the backed-up `delegate.json` file:

    ```shell
    cp ~/delegate.json.backup ~/.config/ark-core/mainnet/delegates.json
    ```

6. If applicable*, re-apply any changes made to your `plugins.js` or `.env` files.

7. Upgrade yarn's global packages:

    ```shell
    yarn global upgrade
    ```

8. Start Core using pm2:

    ```shell
    pm2 start all
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
