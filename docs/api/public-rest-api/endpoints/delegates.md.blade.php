---
title: Delegates
---

# Delegates

Delegates are regular wallets \(addresses\) which have registered themselves eligible to become a Delegate by a [registration transaction](https://github.com/ArkEcosystem/gitbooks-api/tree/9815499ca52e615b8de858160da915cd960e6ea3/introduction/ark/understanding-transactions-and-block-propagation.html#delegate-registration). If a Delegate is amongst the top 51 highest voted \(by staked ARK\), it may run a forging Node, which produces a block once every 6.8 minutes, awarding the Delegate two ARK + the transaction fees.

Genesis Delegates are the initial, virtualized Delegates. They were not registered nor voted in, and in the ARK `mainnet` has been replaced by actual Delegates a long time ago.

## Endpoints

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/delegates/all.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/delegates/show.json" />
