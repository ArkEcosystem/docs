---
title: Blocks
---

# Blocks

Blocks are added every eight seconds to the blockchain by a Delegate Node. Due to network/technical errors, a Delegate might miss a block. The time between two blocks is then 16 seconds, as the round continues to the next Delegate.

All state changes to the blockchain are in the form of blocks; they contain a set of transactions and metadata. A block is rejected if one or more of the transactions is invalid; or if the metadata is invalid. Thus a block returned from the Public API is always valid.

## Endpoints

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/blocks/all.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/blocks/first.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/blocks/last.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/blocks/show.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/blocks/transactions.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/blocks/search.json" />
