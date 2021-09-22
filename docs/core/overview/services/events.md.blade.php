---
title: Services - Events
---

# Events

Events play an essential role in being able to develop reactive plugins that act when state changes occur in Core (block received, transaction forged, etc).

The event dispatcher implementation that ships with Core supports both synchronous and asynchronous execution of event listeners. As always, you should think carefully about when to use an event listener as they are a great way of decoupling certain aspects of your application but can end up hogging resources.

## Prerequisites

Before we start, we need to inject the EventDispatcher service into our class so we can use events.

```typescript
@Container.inject(Container.Identifiers.EventDispatcherService)
private readonly events!: Contracts.Kernel.EventDispatcher;
```

## Registering Events & Listeners

### Register a listener with the dispatcher

```typescript
this.events.listen("firstEvent", ({ name, data }) => console.log(name, data.message));
```

### Register many listeners with the dispatcher

```typescript
this.events.listenMany([
    ["firstEvent", listenerFunction],
    ["secondEvent", listenerFunction]
]);
```

### Register a one-time listener with the dispatcher

```typescript
this.events.listenOnce("firstEvent", () => console.log("Hello World"));
```

### Remove a listener from the dispatcher

```typescript
this.events.forget("firstEvent", listenerFunction);
```

### Remove many listeners from the dispatcher

```typescript
this.events.forgetMany(["firstEvent", "secondEvent"]);

this.events.forgetMany([
    ["firstEvent", listenerFunction],
    ["secondEvent", listenerFunction]
]);
```

### Remove all listeners from the dispatcher

```typescript
this.events.flush();
```

### Get all of the listeners for a given event name

```typescript
this.events.getListeners("firstEvent");
```

### Determine if a given event has listeners

```typescript
this.events.hasListeners("firstEvent");
```

## Dispatching Events

### Fire an event and call the listeners in asynchronous order

```typescript
await this.events.dispatch("firstEvent", "Hello World");
```

### Fire an event and call the listeners in sequential order

```typescript
await this.events.dispatchSeq("firstEvent", "Hello World");
```

### Fire an event and call the listeners in synchronous order

```typescript
this.events.dispatchSync("firstEvent", "Hello World");
```

### Fire many events and call the listeners in asynchronous order

```typescript
await this.events.dispatchMany([
    ["firstEvent", "Hello World"],
    ["secondEvent", "Hello World"]
]);
```

### Fire many events and call the listeners in sequential order

```typescript
await this.events.dispatchManySeq([
    ["firstEvent", "Hello World"],
    ["secondEvent", "Hello World"]
]);
```

### Fire many events and call the listeners in synchronous order

```typescript
this.events.dispatchManySync([[
    ["firstEvent", "Hello World"],
    ["secondEvent", "Hello World"]
]]);
```
