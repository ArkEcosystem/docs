---
title: Examples
---

# Examples

## Initialization

```typescript
const { crypto } = require("@arkecosystem/crypto");

// Throughout this document, the keys object used is:
const keys = crypto.getKeys("this is a top-secret passphrase");
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/ts/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase \(from which the private key is generated\). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```typescript
const { Transaction } = require("@arkecosystem/crypto").models;

const transaction = {
  type: 0,
  amount: 1000,
  fee: 2000,
  recipientId: "validRecipientId",
  timestamp: 121212,
  asset: {},
  senderPublicKey: "validPublicKey"
};

crypto.sign(transaction, keys);

>>> TBuilder
```

### Serialize \(AIP11\)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```typescript
const { Transaction } = require("@arkecosystem/crypto").models;
const serialized = Transaction.serialize(transaction).toString("hex");

>>> string
```

### Deserialize \(AIP11\)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```typescript
const { Transaction } = require("@arkecosystem/crypto").models;
const deserialized = Transaction.deserialize(serialized);

>>> ITransaction
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data \(expressed as strings\).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```typescript
const message = "Arbitrary entry of data";
const hash = utils.sha256(message);
const signature = crypto.signHash(hash, keys);

const signed = {
  message,
  hash,
  signature
};

>>> IMessage
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```typescript
crypto.verifyHash(
  signed.hash,
  signed.signature,
  "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b"
);

>>> boolean
```

## Identities

> The identities class allows for the creation and inspection of keypairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.address.fromPassphrase("this is a top secret passphrase");

>>> string
```

### Derive the Address from a Public Key

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.address.fromPublicKey(
  "validPublicKey"
);

>>> string
```

### Derive the Address from a Private Key

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.address.fromPrivateKey(
  "validPrivateKey"
);

>>> string
```

### Validate an Address

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.address.validate("validAddress");

>>> boolean
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.privateKey.fromPassphrase("this is a top secret passphrase");

>>> string
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```typescript
This function has not been implemented in this client library.
```

### Derive the Private Key from a WIF

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.privateKey.fromWIF(
  "validWif"
);

>>> string
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.publicKey.fromPassphrase("this is a top secret passphrase");

>>> string
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```typescript
This function has not been implemented in this client library.
```

### Validate a Public Key

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.publicKey.validate(
  "validPublicKey"
);

>>> boolean
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```typescript
const { identities } = require("@arkecosystem/crypto");
identities.wif.fromPassphrase("this is a top secret passphrase");

>>> string
```
