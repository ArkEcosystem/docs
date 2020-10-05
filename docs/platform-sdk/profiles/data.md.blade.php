---
title: Data
---

# Data

<x-alert type="info">
These methods are accessible through `env.data()`, `profile.data()` and `wallet.data()` which expose a `DataRepository` instance.
</x-alert>

### Get a list of all data with key and value

```typescript
profile.data().all();
```

### Get a list of all data keys

```typescript
profile.data().keys();
```

### Get a list of all data values

```typescript
profile.data().values();
```

### Get the value for the given key

```typescript
profile.data().get("theme");
```

### Set the value for the given key

```typescript
profile.data().set("theme", "dark");
```

### Check if a data for the given key exists

```typescript
profile.data().has("theme");
```

### Check if a data for the given key is missing

```typescript
profile.data().missing("theme");
```

### Forget the value for the given key

```typescript
profile.data().forget("theme");
```

### Forget all data (Use with caution!)

```typescript
profile.data().flush();
```

### Take a snapshot of the current data (Use with caution!)

```typescript
profile.data().snapshot();
```

### Restore a previously taken snapshot (Use with caution!)

```typescript
profile.data().restore();
```
