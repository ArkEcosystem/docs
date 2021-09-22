---
title: Development - Creating Event Emitters
---

# Creating Event Emitters

Effective integrations in your backend can be achieved using events, similar to how webhooks work. An event emitter will inform you about any events that could require actions to be performed like missing a block, saving you from repeatedly querying the API.

## Emitting Events

Emitting events is pretty straightforward. Just inject the `EventDispatcherService` :

```typescript
@Container.inject(Container.Identifiers.EventDispatcherService)
private readonly events!: Contracts.Kernel.EventDispatcher;
```

And call the `dispatch` method with a name and data to be emitted :

```typescript
this.events.dispatch("block.forged", {
  id: "fake-id",
  generatorPublicKey: "fake-generator-public-key",
  amount: 10
});
```

## Listening to Events

Listening to events is as straightforward as emitting them. Just inject the `EventDispatcherService` :

```typescript
@Container.inject(Container.Identifiers.EventDispatcherService)
private readonly events!: Contracts.Kernel.EventDispatcher;
```

And call the `listen` method with a name and then process the incoming data:

```typescript
this.events.listen("block.forged", block => {
  if (block.generatorPublicKey === "fake-generator-public-key") {
    console.log(`You just forged a block for ${block.amount} ARK`);
  }
});
```

## Available Core Events

Have a look at the events in the core kernel enums:

<livewire:embed-link url="https://github.com/ArkEcosystem/core/blob/develop/packages/core-kernel/src/enums/events.ts" caption="core kernel event enums" />
