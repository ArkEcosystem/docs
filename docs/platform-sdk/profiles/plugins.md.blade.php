---
title: Plugins
---

# Plugins

<x-alert type="info">
These methods are accessible through `profile.plugins()` which exposes a `PluginRepository` instance.
</x-alert>

### Get a list of all plugins

```typescript
profile.plugins().all();
```

### Register a new plugin for the given data

```typescript
profile.plugins().push({ id: 123, name: "@hello/world" });
```

### Find the plugin for the given ID

```typescript
profile.plugins().findById(123);
```

### Forget the plugin for the given ID

```typescript
profile.plugins().forget(123);
```

### Forget all plugins (Use with caution!)

```typescript
profile.plugins().flush();
```

## Blacklist

<x-alert type="info">
These methods are accessible through `profile.plugins().blacklist()` which exposes a `Set<number>` instance. The `Set` instance is a native [Set](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Set) as opposed to a `DataRepository`.
</x-alert>

### Add a plugin to the blacklist

```typescript
profile.plugins().blacklist().add(123);
```

### Remove a plugin from the blacklist

```typescript
profile.plugins().blacklist().delete(123);
```

## Registry

<x-alert type="info">
These methods are accessible through `profile.plugins().registry()` which exposes a `PluginRegistry` instance.
</x-alert>

### Get a list of plugins from the MarketSquare API

```typescript
profile.plugins().registry().all();
```

### Get aa specific plugin from the MarketSquare API

```typescript
profile.plugins().registry().findById(123);
```
