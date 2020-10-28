---
title: v3.0
---

# v3.0

ARK `v3.0` is a major update and **not backward compatible with `v2.7.x`**.

**Release information:**

* **Upgrade time**: high - upgrading to `v3.0` requires new configuration files and database migrations.
* **Complexity**: high - a full overhaul of the internals and plugin system which makes previous modifications incompatible.
* **Risk**: high - `v3.0` is not backward compatible with `v2.x` releases as it includes a full overhaul of the internals and new P2P server.

## Migrating from v2.7 to v3.0

Upgrading from `v2.7` to `v3.0` is fairly straightforward if you follow the instructions. Even though we try to ensure backward compatibility \(BC\) as much as possible, sometimes it is not possible or very complicated to avoid it and still create a good solution to a problem.

<x-alert type="danger">
**WARNING: Upgrading a complex software project always comes at the risk of breaking something, so make sure you have a backup.**
</x-alert>

### Notes

After upgrading you should check whether your application still works as expected and no plugins are broken. See the following notes on which changes to consider when upgrading from one version to another.

## Upgrade Steps

<x-alert type="danger">
**WARNING:** Do NOT run any of the mentioned commands with **sudo** unless explicitly stated.
</x-alert>

###  **Step 2. Updating ARK Core from v2.7.x to v3.0**

1. To update to v3.0 run the following command \(wait for it to complete\):

```bash
ark update
```

2. The above command will keep the node processes running. After it has completed, you will have to make sure to delete the processes from pm2. You can do this by running:

```bash
pm2 delete all
```

Aferwards you will have to start your core processes again. This can be done by running `ark core:start` \(for the combined core process\), or by running `ark relay:start` if you only run a relay.

<x-alert type="info">
After restarting, your node will first execute migrations to get the database ready for v3.0. Please be aware that this can take upward of 30 minutes to complete depending on your server specs.
</x-alert>

### Breaking Changes

- 2.0 plugins are incompatible with 3.0 plugins due to the vast amount of architectural changes of internals
- The `/v2` path segment in API URLs has been deprecated in 2.0 and removed in 3.0
- `SocketCluster` has been replaced with `@hapi/nes`
- `oclif` has been replaced with a custom CLI for greater control and extensibility of its behaviours

### Reporting Problems

If you happen to experience any issues please [open an issue](https://github.com/ARKEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it and info about your environment.
