---
title: Wallets
---

# Wallets

<x-alert type="info">
These methods are accessible through `profile.wallets()` which exposes a `WalletRepository` instance.
</x-alert>

### Get a list of all wallets with key and value

```typescript
profile.wallets().all();
```

### Get a list of all wallet keys

```typescript
profile.wallets().keys();
```

### Get a list of all wallet values

```typescript
profile.wallets().values();
```

### Create a new wallet from a mnemonic, coin implementation and network

```typescript
await profile.wallets().importByMnemonic("this is a top secret passphrase", "ARK", "devnet");
```

### Create a new wallet from an address, coin implementation and network

```typescript
await profile.wallets().importByAddress("D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib", "ARK", "devnet");
```

### Create a new wallet from an address, coin implementation, network and ledger account index

```typescript
await profile.wallets().importByAddressWithLedgerIndex("D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib", "ARK", "devnet", 0);
```

### Create a new wallet from an address, coin implementation, network and BIP38 password

```typescript
await profile.wallets().importByMnemonicWithEncryption("this is a top secret passphrase", "ARK", "devnet", "password");
```

### Find the wallet by the given ID

```typescript
profile.wallets().findById("D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib");
```

### Find the wallet for the given address

```typescript
profile.wallets().findByAddress("D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib");
```

### Find the wallet for the given public key

```typescript
profile.wallets().findByPublicKey("034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192");
```

### Find all wallets that use the given coin

```typescript
profile.wallets().findByCoin("ARK");
```

### Forget the wallet for the given ID

```typescript
profile.wallets().forget("D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib");
```

### Forget all wallets (Use with caution!)

```typescript
profile.wallets().flush();
```

## API Calls

### List all transactions that a wallet has sent or received

```typescript
await wallet.transactions();
```

### List all transactions that a wallet has sent

```typescript
await wallet.sentTransactions();
```

### List all transactions that a wallet received

```typescript
await wallet.receivedTransactions();
```

### Get information about a wallet from the network

```typescript
await wallet.wallet("username");
```

### Get a list of wallets from the network that match the given criteria

```typescript
await wallet.wallets({ ... });
```

### Get information about a delegate from the network

```typescript
await wallet.delegate("username");
```

### Get a list of delegates from the network that match the given criteria

```typescript
await wallet.delegates({ ... });
```

### List all votes that a wallet casted

```typescript
await wallet.votes();
```

### List all voters that a wallet has

```typescript
await wallet.voters();
```

### Check if the peer is syncing

```typescript
await wallet.client().syncing();
```

### Broadcast all of the given transactions

```typescript
await wallet.client().broadcast([transaction, transaction, transaction]);
```

## Transactions

### Create a new transfer transaction

```typescript
await wallet.transaction().signTransfer(input, options);
```

### Create a new second signature transaction

```typescript
await wallet.transaction().signSecondSignature(input, options);
```

### Create a new delegate registration transaction

```typescript
await wallet.transaction().signDelegateRegistration(input, options);
```

### Create a new vote transaction

```typescript
await wallet.transaction().signVote(input, options);
```

### Create a new multi signature transaction

```typescript
await wallet.transaction().signMultiSignature(input, options);
```

### Create a new ipfs transaction

```typescript
await wallet.transaction().signIpfs(input, options);
```

### Create a new multi payment transaction

```typescript
await wallet.transaction().signMultiPayment(input, options);
```

### Create a new delegate resignation transaction

```typescript
await wallet.transaction().signDelegateResignation(input, options);
```

### Create a new htlc lock transaction

```typescript
await wallet.transaction().signHtlcLock(input, options);
```

### Create a new htlc claim transaction

```typescript
await wallet.transaction().signHtlcClaim(input, options);
```

### Create a new htlc refund transaction

```typescript
await wallet.transaction().signHtlcRefund(input, options);
```

##  Messages

### Sign a new message

```typescript
await wallet.message().sign(input);
```

### Verify an existing message

```typescript
await wallet.message().verify(input);
```

## Ledger

### Get the version from ledger

```typescript
await wallet.ledger().getVersion();
```

### Get a public key from ledger

```typescript
await wallet.ledger().getPublicKey(path);
```

### Sign a transaction with ledger

```typescript
await wallet.ledger().signTransaction(path, payload);
```

### Sign a message with ledger

```typescript
await wallet.ledger().signMessage(path, payload);
```

## Links

### Get an explorer link for a block

```typescript
await wallet.link().block(id);
```

### Get an explorer link for a transaction

```typescript
await wallet.link().transaction(id);
```

### Get an explorer link for a wallet

```typescript
await wallet.link().wallet(id);
```
