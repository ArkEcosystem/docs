---
title: Examples
---

# Examples

<x-alert type="danger">
WARNING! This package is deprecated and is no longer maintained and supported.
</x-alert>

## Initialization

```csharp
using ARKEcosystem.Crypto;
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/csharp/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase (from which the private key is generated). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```csharp
var transaction = Crypto.Builder.Transfer.Create(
  "validAddress",
  1000,
  "This is a transaction from .NET",
  "This is a top secret passphrase"
);

>>> Transaction
```

### Serialize (AIP11)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```csharp
var transaction = new Serializer(transactionObject).Serialize();

>>> byte[]
```

### Deserialize (AIP11)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```csharp
var transaction = new Deserializer(serializedTransaction).Deserialize();

>>> Transaction
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data (expressed as strings).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```csharp
var message = Message.Sign("Hello World", "passphrase");

>>> Message
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```csharp
var message = Message.Sign("Hello World", "passphrase");
Console.WriteLine(message.Verify());

>>> bool
```

## Identities

> The identities class allows for the creation and inspection of keyPairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```csharp
Identities.Address.FromPassphrase('this is a top secret passphrase');

>>> string
```

### Derive the Address from a Public Key

```csharp
Identities.Address.FromPublicKey('validPublicKey');

>>> string
```

### Derive the Address from a Private Key

```csharp
Identities.Address.FromPrivateKey('validPrivateKey');

>>> string
```

### Validate an Address

```csharp
Identities.Address.Validate('validAddress');

>>> bool
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```csharp
Identities.PrivateKey.FromPassphrase('this is a top secret passphrase');

>>> Key
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```csharp
Identities.PrivateKey.FromHex('validHexString');

>>> Key
```

### Derive the Private Key from a WIF

```csharp
This function has not been implemented in this client library.
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```csharp
Identities.PublicKey.FromPassphrase('this is a top secret passphrase');

>>> PubKey
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```csharp
Identities.PublicKey.FromHex('validHexString');

>>> PubKey
```

### Validate a Public Key

```csharp
This function has not been implemented in this client library.
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```csharp
Identities.WIF.FromPassphrase('this is a top secret passphrase')

>>> string
```
