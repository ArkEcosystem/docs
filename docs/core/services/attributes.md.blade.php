---
title: Services - Attributes
---

# Attributes

Attributes are a simple way of storing meta attributes specific to an entity without having to modify the entity itself or creating a fork of core and adding new attributes all over the codebase.

At the core of it all is is a collection of indexes that are associated with a key. Those keys will be things like block, wallet or transaction to signal that this index will hold meta attributes for a block or wallet based on their primary key.

An index is a collection of keys that have any possible value assigned to them, that key could be a wallet address or block ID, which then get the result of some expensive calculations stored as a meta attribute so that they can be retrieved faster later on when needed.

## Architecture

The Attribute service is made up of 2 components that combined give you the ability to safely store attributes without setting unwanted properties and having to deal with resulting issues.

We will go from the highest entity to the lowest and break down what each of their responsibilities is and how they can be used to manage global and local attributes.

### AttributeSet

The AttributeSet serves as the safe-guard for an AttributeMap. It holds a list of attribute names that are allowed to be set on an AttributeMap. It itself serves no other purpose than holding attribute names after which it will be used by an AttributeMap.

### AttributeMap

The AttributeMap is at the heart of the attributes implementation. It is responsible for storing key-value pairs of attributes that are known to it and prevent setting unknown attributes. All attributes that it knows about come from an AttributeSet that is passed in on creation.

## Prerequisites

Before we start, we need to establish what a few recurring variables and imports in this document refer to when they are used.

```typescript
import { app, Container, Services } from "@arkecosystem/core-kernel";
```

* The `app` import refers to the application instance which grants access to the container, configurations, system information and more.
* The `Container` import refers to a namespace that contains all of the container specific entities like binding symbols and interfaces.
* The `Services` import refers to a namespace that contains all of the core services. This generally will only be needed for type hints as Core is responsible for service creation and maintenance.

<x-alert type="info">
In this article we will refer to an index or indices when we talk about attribute maps.
</x-alert>

## AttributeSet

### Creating an instance

```typescript
app.resolve(Services.Attributes.AttributeSet);
```

### Get all known attributes

```typescript
attributeSet.all();
```

### Set an attribute as known

```typescript
attributeSet.set("forgers");
```

### Forget a known attribute

```typescript
attributeSet.forget("forgers");
```

### Forget all known attributes

```typescript
attributeSet.flush("forgers");
```

### Check if an attribute is known

```typescript
attributeSet.has("forgers");
```

## AttributeMap

### Creating an instance

```typescript
new Services.Attributes.AttributeMap(attributeSet);
```

### Get the key-value pairs of all attributes

```typescript
attributeMap.all();
```

### Get the value of an attribute

```typescript
attributeMap.get<string[]>("forgers", []);
```

### Set the value of an attribute

```typescript
attributeMap.set<string[]>("forgers", []);
```

### Forget the value of an attribute

```typescript
attributeMap.forget("forgers");
```

### Check if an attribute exists

```typescript
attributeMap.has("forgers");
```

## Things To Keep In Mind

When you are storing some data that isn't tied to a specific entity, something like network statistics or summaries of some sorts you should bind an AttributeMap to the container with a unique identifier so that the whole application has access to that information.

When you are storing data that belongs to a specific entity you should create an AttributeMap that lives on that entity. Wallets for example have local AttributeMaps to avoid mixing up different states in the database, transaction pool and during round calculations.
