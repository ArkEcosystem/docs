---
title: Examples
---

# Examples

## Initialization

```swift
import ArkBuilder
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/swift/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase (from which the private key is generated). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```swift
// Creating a transaction automatically signs it with the provides passphrase(s)
let transfer = ARKBuilder.buildTransfer(
    "secret passphrase",
    secondPassphrase: nil,
    to: "DBk4cPYpqp7EBcvkstVDpyX7RQJNHxpMg8",
    amount: 10000000,
    vendorField: "this is a tx from Swift")

print(type(of: transfer))

>>> ArkTransaction
```

### Serialize (AIP11)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```swift
let serialized = ARKSerializer.serialize(transaction: transaction)

print(type(of: serialized))

>>> String
```

### Deserialize (AIP11)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```swift
let deserialized = ARKDeserializer.deserialize(serialized: serialized)

print(type(of: deserialized))

>>> ArkTransaction
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data (expressed as strings).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```swift
let message = ARKMessage.sign(message: "Hello World", passphrase: "this is a top secret passphrase")

print(type(of: message))

>>> ArkMessage?
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```swift
let message = ARKMessage(publicKey: "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
                         signature: "304402200fb4adddd1f1d652b544ea6ab62828a0a65b712ed447e2538db0caebfa68929e02205ecb2e1c63b29879c2ecf1255db506d671c8b3fa6017f67cfd1bf07e6edd1cc8",
                         message: "Hello World")

print(type(of: message.verify()))

>>> Bool
```

## Identities

> The identities class allows for the creation and inspection of keyPairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```swift
let address = ARKAddress.from(passphrase: "this is a top secret passphrase")

print(type(of: address))

>>> String
```

### Derive the Address from a Public Key

```swift
let address = ARKAddress.from(publicKey: "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192")

print(type(of: address))

>>> String
```

### Derive the Address from a Private Key

```swift
let address = ARKAddress.from(privateKey: ARKPrivateKey.from(hex: "d8839c2432bfd0a67ef10a804ba991eabba19f154a3d707917681d45822a5712"))

print(type(of: address))

>>> String
```

### Validate an Address

```swift
let address = ARKAddress.validate(address: "D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib")

print(type(of: address))

>>> Bool
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```swift
let privateKey = ARKPrivateKey.from(passphrase: "this is a top secret passphrase")

print(type(of: privateKey))

>>> PrivateKey
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```swift
let privateKey = ARKPrivateKey.from(hex: "d8839c2432bfd0a67ef10a804ba991eabba19f154a3d707917681d45822a5712")

print(type(of: privateKey))

>>> PrivateKey
```

### Derive the Private Key from a WIF

```swift
This function has not been implemented in this client library.
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```swift
let publicKey = ARKPublicKey.from(passphrase: "this is a top secret passphrase")

print(type(of: publicKey))

>>> PublicKey
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```swift
let publicKey = ARKPublicKey.from(hex: "d8839c2432bfd0a67ef10a804ba991eabba19f154a3d707917681d45822a5712")

print(type(of: publicKey))

>>> PublicKey
```

### Validate a Public Key

```swift
This function has not been implemented in this client library.
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```swift
let wif = WIF.from(passphrase: "this is a top secret passphrase")

print(type(of: wif))

>>> String
```
