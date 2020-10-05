---
title: Contacts
---

# Contacts

<x-alert type="info">
These methods are accessible through `profile.contacts()` which exposes a `ContactRepository` instance.
</x-alert>

### Get a list of all contacts with key and value

```typescript
profile.contacts().all();
```

### Get a list of all wallet keys

```typescript
profile.contacts().keys();
```

### Get a list of all wallet values

```typescript
profile.contacts().values();
```

### Create a new contact for the given data

```typescript
profile.contacts().create({
    name: "Jane Doe",
    addresses: [{ coin: "Ethereum", network: "testnet", address: "TESTNET-ADDRESS" }],
    starred: true,
});
```

### Find the contact for the given ID

```typescript
profile.contacts().findById("D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib");
```

### Find the contact for the given address

```typescript
profile.contacts().findByAddress("D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib");
```

### Find all contacts for the given coin

```typescript
profile.contacts().findByCoin("ARK");
```

### Find the contact for the given address

```typescript
profile.contacts().findByNetwork("devnet");
```

### Forget the contact for the given ID

```typescript
profile.contacts().forget("uuid");
```

### Forget all contacts (Use with caution!)

```typescript
profile.contacts().flush();
```
