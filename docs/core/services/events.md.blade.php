---
title: Events
---

# Events

Events play an essential role in being able to develop reactive plugins that act when state changes occur in Core \(block received, transaction forged, etc\).

The event dispatcher implementation that ships with Core supports both synchronous and asynchronous execution of event listeners. As always, you should think carefully about when to use an event listener as they are a great way of decoupling certain aspects of your application but can end up hogging resources.

## Prerequisites

Before we start, we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.

## Registering Events & Listeners

### Register a listener with the dispatcher

```typescript
app.events.listen("firstEvent", ({ name, data }) => console.log(name, data.message));
```

### Register many listeners with the dispatcher

```typescript
app.events.listenMany([
    ["firstEvent", listenerFunction],
    ["secondEvent", listenerFunction]
]);
```

### Register a one-time listener with the dispatcher

```typescript
app.events.listenOnce("firstEvent", () => console.log("Hello World"));
```

### Remove a listener from the dispatcher

```typescript
app.events.forget("firstEvent", listenerFunction);
```

### Remove many listeners from the dispatcher

```typescript
app.events.forgetMany(["firstEvent", "secondEvent"]);

app.events.forgetMany([
    ["firstEvent", listenerFunction],
    ["secondEvent", listenerFunction]
]);
```

### Remove all listeners from the dispatcher

```typescript
app.events.flush();
```

### Get all of the listeners for a given event name

```typescript
app.events.getListeners("firstEvent");
```

### Determine if a given event has listeners

```typescript
app.events.hasListeners("firstEvent");
```

## Dispatching Events

### Fire an event and call the listeners in asynchronous order

```typescript
await app.events.dispatch("firstEvent", "Hello World");
```

### Fire an event and call the listeners in sequential order

```typescript
await app.events.dispatchSeq("firstEvent", "Hello World");
```

### Fire an event and call the listeners in synchronous order

```typescript
app.events.dispatchSync("firstEvent", "Hello World");
```

### Fire many events and call the listeners in asynchronous order

```typescript
await app.events.dispatchMany([
    ["firstEvent", "Hello World"],
    ["secondEvent", "Hello World"]
]);
```

### Fire many events and call the listeners in sequential order

```typescript
await app.events.dispatchManySeq([
    ["firstEvent", "Hello World"],
    ["secondEvent", "Hello World"]
]);
```

### Fire many events and call the listeners in synchronous order

```typescript
app.events.dispatchManySync([[
    ["firstEvent", "Hello World"],
    ["secondEvent", "Hello World"]
]]);
```
