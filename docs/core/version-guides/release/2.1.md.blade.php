---
title: Releases - v2.1
---

# v2.1

ARK `v2.1` is a minor update, backward compatible with `v2.0.X`. This update introduces a complete rewrite to [TypeScript](https://www.typescriptlang.org/), which allows for static type-checking along with the latest ECMAScript features. TypeScript is also a much stricter language than JavaScript and lets us spot mistakes that could otherwise go unnoticed. It is more convenient to use and allows for quicker error debugging. For core developers, very little has changed as the syntax is almost the same as JavaScript (Typescript is a superset of JavaScript).

TypeScript makes perfect sense for growing projects that need to scale and have a variety of contributing developers. With this update, we lay the foundation for more technical changes.

We recommend staying on the latest version of ARK; however, this upgrade does not break any APIs, thus `v2.0` nodes are still able to join the network. Development on `v2.0` has ceased in favor of the newer Typescript version.

* **Upgrade time**: low - upgrading to `v2.1` does not break any APIs and can be performed incrementally in the network.
* **Complexity**: low - the internal blockchain representation is not altered.
* **Risk**: low - `v2.1` is backward compatible with `v2.0`; thus a downgrade is possible at any moment.

## Breaking Changes <a id="breaking-changes"></a>

Plugins relying on the core-APIs may need to be refactored to TypeScript, and cannot rely on the same modules anymore. The [changelog](https://github.com/ARKEcosystem/core/blob/master/CHANGELOG.md) contains all changes and references to each commit.

## New Features <a id="upgrading"></a>

`v2.1` does not include any breaking API changes or new features, but is mainly focussed on fixing technical debt, increasing our future development velocity and improving code organization.

### TypeScript

The major change in `v2.1` is a full migration to TypeScript, a typed flavor of JavaScript better suited for larger codebases. Older plugins may need to be rewritten, but TypeScript now provides a smoother development experience for core and community developers. Plugin writers do not need to fear another migration, TypeScript will be used for the foreseeable future.

### Debranding

BridgeChains and private chains reusing the ARK codebase previously had to debrand the codebase themselves, meaning they had to remove mentions of `ARK` from their configuration files and other hardcoded locations. `v2.1` is blockchain-brand agnostic. In general, all variables are named the same, except that the ARK has been removed from the name.

For example:

has now been renamed to

in `~/.ark/.env` and other files. We have also made editing these easier by collapsing different configuration files into a single network config.

### Comprehensive Variable Changelist

The following variables were renamed/added to the configuration of a network. The changes can be found in your `~/.ark/.env` and `plugins.js` file.

Note:

* If the second or third column is left empty, the configuration variable must be directly edited in the plugins.js configuration file, instead of being obtained from the `env.process`.
* `core-transaction-pool-mem` was renamed to `core-transaction-pool`.
* The `dynamicFees` key was added to `core-transaction-pool`, which must be configured in the plugins.js file.

| Variable | v2.0.19 | v2.1 | default |
| :--- | :--- | :--- | :--- |
| core-logger-winston.transports.console.options.level | ARK_LOG_LEVEL | CORE_LOG_LEVEL | 'debug' |
| core-logger-winston.transports.dailyRotate.options.level | ARK_LOG_LEVEL | CORE_LOG_LEVEL | 'debug' |
| core-database-postgres.connection.host | ARK_DB_HOST | CORE_DB_HOST | 'localhost' |
| core-database-postgres.connection.port | ARK_DB_PORT | CORE_DB_PORT | 5432 |
| core-database-postgres.connection.database | ARK_DB_DATABASE | CORE_DB_DATABASE | ${process.env.CORE_TOKEN}_${process.env.CORE_NETWORK_NAME} |
| core-database-postgres.connection.user | ARK_DB_USERNAME | CORE_DB_USERNAME | 'ark' |
| core-database-postgres.connection.password | ARK_DB_PASSWORD | CORE_DB_PASSWORD | 'password' |
| core-transaction-pool.enabled | ARK_TRANSACTION_POOL_DISABLED | CORE_TRANSACTION_POOL_DISABLED | true |
| core-transaction-pool. enabled | ARK_TRANSACTION_POOL_MAX_PER_SENDER | CORE_TRANSACTION_POOL_MAX_PER_SENDER | 300 |
| core-transaction-pool.allowedSenders |  |  | \[\] |
| core-p2p.host | ARK_P2P_HOST | CORE_P2P_HOST | "0.0.0.0" |
| core-p2p.port | ARK_P2P_PORT | CORE_P2P_PORT | 4001 |
| core-blockchain.fastRebuild |  |  | false |
| core-api.enabled | ARK_API_DISABLED | CORE_API_DISABLED | true |
| core-api.host | ARK_API_HOST | CORE_API_HOST | "0.0.0.0" |
| core-api.port | ARK_API_PORT | CORE_API_PORT | 4003 |
| core-api.whitelist |  |  | ['\*'] |
| core-webhooks.enabled | ARK_WEBHOOKS_ENABLED | CORE_WEBHOOKS_ENABLED | false |
| core-webhooks.server.enabled | ARK_WEBHOOKS_API_ENABLED | CORE_WEBHOOKS_API_ENABLED | false |
| core-webhooks.server.host | ARK_WEBHOOKS_HOST | CORE_WEBHOOKS_HOST | '0.0.0.0' |
| core-webhooks.server.port | ARK_WEBHOOKS_PORT | CORE_WEBHOOKS_PORT | 4004 |
| core-webhooks.server.whitelist |  |  | ["127.0.0.1", "::ffff:127.0.0.1"] |
| core-graphql.enabled | ARK_GRAPHQL_ENABLED | CORE_GRAPHQL_ENABLED | false |
| core-graphql.host | ARK_GRAPHQL_HOST | CORE_GRAPHQL_HOST | '0.0.0.0' |
| core-graphql.port | ARK_GRAPHQL_PORT | CORE_GRAPHQL_PORT | 4005 |
{{-- | core-forger.hosts |  |  | [http://127.0.0.1:${process.env.CORE_P2P_PORT || 4001}] | --}}
| core-json-rpc.enabled | ARK_JSON_RPC_ENABLED | CORE_JSON_RPC_ENABLED | false |
| core-json-rpc.host | ARK_JSON_RPC_HOST | CORE_JSON_RPC_HOST | '0.0.0.0' |
| core-json-rpc.port | ARK_JSON_RPC_PORT | CORE_JSON_RPC_PORT | 8080 |
| core-json-rpc.allowRemote |  |  | false |
| core-json-rpc.whitelist |  |  | ["127.0.0.1", "::ffff:127.0.0.1"] |
| ~/.ark/.env | ARK_NETWORK_NAME | CORE_NETWORK_NAME | 'ark' |
| ~/.ark/.env |  | CORE_TOKEN | Ѧ |
