---
title: Delegates
---

# Delegates

Delegates are regular wallets \(addresses\) which have registered themselves eligible to become a Delegate by a [registration transaction](/docs/core/transactions/transaction-types/delegate-registration). If a Delegate is amongst the top 51 highest voted \(by staked ARK\), it may run a forging Node, which produces a block per round, awarding the Delegate two ARK + the transaction fees.

Genesis Delegates are the initial, virtualized Delegates. They were not registered nor voted in, and in the ARK `mainnet` has been replaced by actual Delegates a long time ago.

## Endpoints

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/delegates/all.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/delegates/show.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/delegates/voters.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/delegates/blocks.json" />
