---
title: Examples
---

# Examples

## Initialization

```go
package main

import (
    crypto "github.com/ARKEcosystem/go-crypto/crypto"
)
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/go/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase \(from which the private key is generated\). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```go
transaction := crypto.BuildTransfer(
  "address",
  uint64(amount),
  "Hello World",
  "top secret",
  "second top secret",
  )

>>> *Transaction
```

### Serialize \(AIP11\)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```go
serialized := crypto.SerializeTransaction(transaction)

>>> *Transaction
```

### Deserialize \(AIP11\)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```go
transaction := crypto.DeserializeTransaction(serialized)

>>> *Transaction
```

## Message

The crypto SDK not only supporgo transactions but can also work with other arbitrary data \(expressed as strings\).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```go
message, _ := crypto.SignMessage("Hello World", "top secret")

>>> *Message, error
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```go
message, _ := crypto.SignMessage("Hello World", "top secret")
ok, err := message.Verify()

>>> *Message, error
```

## Identities

> The identities class allows for the creation and inspection of keypairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```go
address, _ := crypto.AddressFromPassphrase("this is a top secret passphrase")

>>> string, error
```

### Derive the Address from a Public Key

```go
publicKey, _ := crypto.PublicKeyFromPassphrase("this is a top secret passphrase")
address := publicKey.ToAddress()

>>> *PublicKey, error
```

### Derive the Address from a Private Key

```go
privateKey, _ := crypto.PrivateKeyFromPassphrase("this is a top secret passphrase")

fmt.Println(privateKey.ToAddress())

>>> *PrivateKey, error
```

### Validate an Address

```go
fmt.Println(crypto.ValidateAddress("validAddress"))

>>> bool, error
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrego

### Derive the Private Key from a Passphrase

```go
privateKey, _ := crypto.PrivateKeyFromPassphrase("this is a top secret passphrase")

>>> *PrivateKey, error
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```go
privateKey, _ := crypto.PrivateKeyFromHex("validHexString")

>>> *PrivateKey, error
```

### Derive the Private Key from a WIF

```go
This function has not been implemented in this library.
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objecgo to validate the authenticity.

### Derive the Public Key from a Passphrase

```go
publicKey, _ := crypto.PublicKeyFromPassphrase("this is a top secret passphrase")

>>> *PublicKey, error
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```go
publicKey, _ := crypto.PublicKeyFromHex("validHexString")

>>> *PublicKey, error
```

### Validate a Public Key

```go
This function has not been implemented in this client library.
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```go
privateKey, _ := crypto.PrivateKeyFromPassphrase("this is a top secret passphrase")

>>> *PrivateKey, error
```
