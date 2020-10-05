---
title: How To Listen To Core Events
---

# How To Listen To Core Events

Effective integrations in your backend can be achieved using events, similar to how webhooks work. An event emitter will inform you about any events that could require actions to be performed like missing a block, saving you from repeatedly querying the API.

## Emitting Events

Emitting events is pretty straightforward. Just resolve the `event-emitter` from `@arkecosystem/core-container` and call the `emit` method with a name and data to be emitted.

```javascript
const container = require("@arkecosystem/core-container");
const emitter = container.resolvePlugin("event-emitter");

emitter.emit("block.forged", {
  id: "fake-id",
  generatorPublicKey: "fake-generator-public-key",
  amount: 10
});
```


## Listening to Events

Listening to events is as straightforward as emitting them. Just resolve the `event-emitter` from `@arkecosystem/core-container` and call the `on` method with a name and then process the incoming data.

```javascript
const container = require("@arkecosystem/core-container");
const emitter = container.resolvePlugin("event-emitter");

emitter.on("block.forged", block => {
  if (block.generatorPublicKey === "fake-generator-public-key") {
    console.log(`You just forged a block for ${block.amount} ARK`);
  }
});
```

You can also check the source code of our `core-emitter` package here:

<livewire:embed-link url="https://github.com/ArkEcosystem/core/blob/13d7f83e0de8c24a685fa961d380986217353a23/packages/core-event-emitter/src/index.ts\#L12" caption="core-emitter source code" />

## Available Core Events

Enter the **event name** from table below to listen to Core blockchain events. For example:


```typescript
emitter.on("block.forged", block => { ... }
```


| Event **Name** | Description |
| :--- | :--- |
| block.applied | Emitted when a block is applied to the Node and all including transactions are applied to wallets. |
| block.disregarded | Fires when a block is disregarded. |
| block.forged | When a Delegate Node has created a new block. |
| block.received | Fires when a block is incoming. |
| block.reverted | Due to data corruption or other reasons, a Node might revert its state until it reaches a valid state. Blocks -including their transactions- are reverted from wallets. |
| delegate.registered | Fires when a new delegate has been registered. |
| delegate.resigned | This event will be emitted when a wallet resigns as a Delegate, and the transaction has been processed. |
| forger.failed | Emitted when the `forger` module fails to forge a new block. |
| forger.missing | This event will be emitted when the `forger` is missing a block. |
| forger.started | When the `forger` module has started, this event is emitted. |
| peer.added | This event will be emitted when a peer is added to the list of accepted peers. |
| peer.removed | This event will be emitted when a peer is removed to the list of accepted peers. |
| round.applied | This event will be emitted when a new round is applied. |
| round.created | This event will be emitted when a new round is created to the rounds table. |
| round.missed | This event will be emitted when a round is missed for a delegate. |
| stateBuilder.finished | This event fires when blockchain validation and state building has been finished.  |
| state.starting | This event fires when state building is starting. |
| state.started | This event fires when state builder has started. |
| transaction.applied | This event will be emitted when a transaction is applied to a wallet. |
| transaction.expired | After a transaction has expired and is removed from the transaction pool, the `transactionGuard` emits this event. |
| transaction.forged | This event will be emitted when a transaction is included in a block and thus has been forged. |
| transaction.pool.added | Fires when transactions are added to the transaction pool. |
| transaction.pool.rejected | Fires when transactions are rejected and not added to the transaction pool. |
| transaction.pool.removed | Fires when a transaction is removed from the transaction pool by its ID. |
| transaction.reverted | This event will be emitted when a transaction is reverted from a wallet. Often fired in conjunction with `block.reverted`. |
| wallet.vote | This event occurs when a wallet/address has voted for a delegate. |
| wallet.unvote | This event occurs when a wallet/address has un-voted a delegate. |
