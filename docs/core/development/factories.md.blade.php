---
title: Development - Creating Factories
---

# Creating Factories

Factories provide an easy way of generating all kinds of entities with different states. The goal of Factories is to make it easier to write and maintain tests that have the need for fixtures.

## Creating the Factory Builder

The FactoryBuilder is the entry point for all interactions with factories that you create. It is the place where you store your factories so that they can be used throughout your test suite. New factories are created with a state of `default` . Other states can be added after the initial creation.

```typescript
import { FactoryBuilder } from "@packages/core-test-framework";

const builder: FactoryBuilder = new FactoryBuilder();
```

## Creating a Factory

A Factory is responsible for creating a random entity inside of your tests. Those entities will be random by default but you have the ability to modify them or alter the way they are generated completely.

```typescript
import { Identities } from "@arkecosystem/crypto";
import { generateMnemonic } from "bip39";

builder.set("Wallet", () => {
    const passphrase: string = generateMnemonic();

    const { publicKey, privateKey } = Identities.Keys.fromPassphrase(passphrase);

    return {
        publicKey,
        privateKey,
        address: Identities.Address.fromPassphrase(passphrase),
        wif: Identities.WIF.fromPassphrase(passphrase),
        passphrase,
    };
});
```

### Creating entities with a deterministic outcome

Sometimes you might have the need for an entity that always returns the same output. You can achieve this by respecting the `options` argument that is passed in, which could contain a passphrase for example.

```typescript
import { Identities } from "@arkecosystem/crypto";

builder.set("Wallet", (previous, options) => {
    const passphrase: string = options.passphrase;

    const { publicKey, privateKey } = Identities.Keys.fromPassphrase(passphrase);

    return {
        publicKey,
        privateKey,
        address: Identities.Address.fromPassphrase(passphrase),
        wif: Identities.WIF.fromPassphrase(passphrase),
        passphrase,
    };
});
```

### Altering an entity after creation

If you need to perform any tasks after an entity has been created, you can use the `afterMaking` method and pass in a method that should be called. The method will receive a single argument which is the newly generated entity after all modifiers have been applied to it.

```typescript
builder
    .get("Wallet")
    .afterMaking(entity => (entity.hooked = true));
```

## Creating a Factory State

In certain scenarios you might need multiple versions of the same entity with slight differences. States can be used to achieve this by adding additional or altering the existing data.

```typescript
import { generateMnemonic } from "bip39";

builder.get("Wallet").state("secondPassphrase", () => {
    return {
        secondPassphrase: generateMnemonic(),
    };
});
```

### Altering an entity after state creation

If you need to perform any tasks after an entity with a specific state has been created, you can use the `afterMakingState` method and pass in a method that should be called. The method will receive a single argument which is the newly generated entity after all modifiers have been applied to it.

```typescript
builder
    .get("Wallet")
    .afterMakingState("secondPassphrase", entity => (entity.hooked = true));
```

## Generating an Entity through a Factory

After you've created and registered your factory, you can go ahead and generate an entity with the following snippet. It will create a single entity that, if you need more you can pass in any number as the first argument and it will generate as many entities as specified, applying all modifiers on the way.

```typescript
builder.get("Wallet").make();
```
