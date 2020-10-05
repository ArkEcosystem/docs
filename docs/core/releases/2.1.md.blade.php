---
title: v2.1
---

# v2.1

ARK `v2.1` is a minor update, backward compatible with `v2.0.X`. This update introduces a complete rewrite to [TypeScript](https://www.typescriptlang.org/), which allows for static type-checking along with the latest ECMAScript features. TypeScript is also a much stricter language than JavaScript and lets us spot mistakes that could otherwise go unnoticed. It is more convenient to use and allows for quicker error debugging. For core developers, very little has changed as the syntax is almost the same as JavaScript \(Typescript is a superset of JavaScript\).

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
| core-logger-winston.transports.console.options.level | ARK\_LOG\_LEVEL | CORE\_LOG\_LEVEL | 'debug' |
| core-logger-winston.transports.dailyRotate.options.level | ARK\_LOG\_LEVEL | CORE\_LOG\_LEVEL | 'debug' |
| core-database-postgres.connection.host | ARK\_DB\_HOST | CORE\_DB\_HOST | 'localhost' |
| core-database-postgres.connection.port | ARK\_DB\_PORT | CORE\_DB\_PORT | 5432 |
| core-database-postgres.connection.database | ARK\_DB\_DATABASE | CORE\_DB\_DATABASE | ${process.env.CORE\_TOKEN}\_${process.env.CORE\_NETWORK\_NAME} |
| core-database-postgres.connection.user | ARK\_DB\_USERNAME | CORE\_DB\_USERNAME | 'ark' |
| core-database-postgres.connection.password | ARK\_DB\_PASSWORD | CORE\_DB\_PASSWORD | 'password' |
| core-transaction-pool.enabled | ARK\_TRANSACTION\_POOL\_DISABLED | CORE\_TRANSACTION\_POOL\_DISABLED | true |
| core-transaction-pool. enabled | ARK\_TRANSACTION\_POOL\_MAX\_PER\_SENDER | CORE\_TRANSACTION\_POOL\_MAX\_PER\_SENDER | 300 |
| core-transaction-pool.allowedSenders |  |  | \[\] |
| core-p2p.host | ARK\_P2P\_HOST | CORE\_P2P\_HOST | "0.0.0.0" |
| core-p2p.port | ARK\_P2P\_PORT | CORE\_P2P\_PORT | 4001 |
| core-blockchain.fastRebuild |  |  | false |
| core-api.enabled | ARK\_API\_DISABLED | CORE\_API\_DISABLED | true |
| core-api.host | ARK\_API\_HOST | CORE\_API\_HOST | "0.0.0.0" |
| core-api.port | ARK\_API\_PORT | CORE\_API\_PORT | 4003 |
| core-api.whitelist |  |  | \['\*'\] |
| core-webhooks.enabled | ARK\_WEBHOOKS\_ENABLED | CORE\_WEBHOOKS\_ENABLED | false |
| core-webhooks.server.enabled | ARK\_WEBHOOKS\_API\_ENABLED | CORE\_WEBHOOKS\_API\_ENABLED | false |
| core-webhooks.server.host | ARK\_WEBHOOKS\_HOST | CORE\_WEBHOOKS\_HOST | '0.0.0.0' |
| core-webhooks.server.port | ARK\_WEBHOOKS\_PORT | CORE\_WEBHOOKS\_PORT | 4004 |
| core-webhooks.server.whitelist |  |  | \["127.0.0.1", "::ffff:127.0.0.1"\] |
| core-graphql.enabled | ARK\_GRAPHQL\_ENABLED | CORE\_GRAPHQL\_ENABLED | false |
| core-graphql.host | ARK\_GRAPHQL\_HOST | CORE\_GRAPHQL\_HOST | '0.0.0.0' |
| core-graphql.port | ARK\_GRAPHQL\_PORT | CORE\_GRAPHQL\_PORT | 4005 |
| core-forger.hosts |  |  | \[`http://127.0.0.1:${process.env.CORE_P2P_PORT|| 4001}`\] |
| core-json-rpc.enabled | ARK\_JSON\_RPC\_ENABLED | CORE\_JSON\_RPC\_ENABLED | false |
| core-json-rpc.host | ARK\_JSON\_RPC\_HOST | CORE\_JSON\_RPC\_HOST | '0.0.0.0' |
| core-json-rpc.port | ARK\_JSON\_RPC\_PORT | CORE\_JSON\_RPC\_PORT | 8080 |
| core-json-rpc.allowRemote |  |  | false |
| core-json-rpc.whitelist |  |  | \["127.0.0.1", "::ffff:127.0.0.1"\] |
| ~/.ark/.env | ARK\_NETWORK\_NAME | CORE\_NETWORK\_NAME | 'ark' |
| ~/.ark/.env |  | CORE\_TOKEN | Ѧ |
