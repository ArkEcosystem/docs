---
title: Services - Mixins
---

# Mixins

A big flaw of inheritance in the world of OOP is that it is limited to one level. This means you cannot extend more than a single class which can get messy quickly as you end up with large classes that have multiple responsibilities.

TypeScript has something called mixins. They act somewhat like traits in PHP, with the major difference being that under the hood they extend an object and return that. The result of that is rather than simply adding some methods, a completely new object is created that contains the old and new methods.

Mixins are a powerful tool to make use of composition over inheritance but they should be used with caution, as with everything, or you'll end up with the same issues that come with the excessive use of inheritance.

## Prerequisites

Before we start we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.

## Mixins Usage

```typescript
import { app } from "@arkecosystem/core-kernel";

// Class we will extend through a mixin
class Block {}

// Function that serves as mixin
function Timestamped<TBase extends Constructor>(Base: TBase) {
    return class extends Base {
        timestamp = new Date("2019-09-01");
    };
}

// Types
type AnyFunction<T = any> = (...input: any[]) => T;
type Mixin<T extends AnyFunction> = InstanceType<ReturnType<T>>;
type TTimestamped = Mixin<typeof Timestamped>;
type MixinBlock = TTimestamped & Block;

// Register the Mixin
app
    .get<Services.Mixin.MixinService>(Container.Identifiers.MixinService)
    .set("timestamped", Timestamped);

// Apply the mixin
const block: MixinBlock = new (
    app
    .get<Services.Mixin.MixinService>(Container.Identifiers.MixinService)
    .apply<MixinBlock>("timestamped", Block)
)();

// Ensure the mixin did its job
console.log(block.timestamp === new Date("2019-09-01"));
```
