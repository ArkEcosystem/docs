---
title: Examples
---

# Examples

## Initialization

```elixir
alias ARKEcosystem.Crypto.Transactions.Transaction
alias ARKEcosystem.Crypto.Transactions.Builder
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/elixir/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase \(from which the private key is generated\). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```elixir
alias ARKEcosystem.Crypto.Transactions.Transaction
alias ARKEcosystem.Crypto.Transactions.Builder

transaction = Builder.build_transfer(
    "validAddress",
    100_000_000,
    "This is a transaction from Elixir"
)

IO.puts Transaction.sign_transaction(transaction, passphrase, secondPassphrase)

>>> Transaction
```

### Serialize \(AIP11\)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```elixir
alias ARKEcosystem.Crypto.Transactions.Serializer

serialized = Serializer.serialize(transaction, %{underscore: true})

>>> string
```

### Deserialize \(AIP11\)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```elixir
alias ARKEcosystem.Crypto.Transactions.Deserializer

transaction = Deserializer.deserialize(serialized_transaction)

>>> ArkTransaction
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data \(expressed as strings\).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```elixir
alias ARKEcosystem.Crypto.Utils.Message

message = Message.sign("Hello World", "passphrase")

>>> Map.t()
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```elixir
alias ARKEcosystem.Crypto.Utils.Message

message = Message.sign("Hello World", "passphrase")

IO.puts Message.verify(message.message, message.signature, message.publicKey)

>>> Boolean.t()
```

## Identities

> The identities class allows for the creation and inspection of keyPairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```elixir
ARKEcosystem.Crypto.Identities.Address.from_passphrase('this is a top secret passphrase')

>>> string
```

### Derive the Address from a Public Key

```elixir
ARKEcosystem.Crypto.Identities.Address.from_public_key('validPublicKey')

>>> string
```

### Derive the Address from a Private Key

```elixir
ARKEcosystem.Crypto.Identities.Address.from_private_key('validPrivateKey')

>>> string
```

### Validate an Address

```elixir
ARKEcosystem.Crypto.Identities.Address.validate('validAddress')

>>> bool
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```elixir
ARKEcosystem.Crypto.Identities.PrivateKey.from_passphrase('this is a top secret passphrase')

>>> EcPrivateKey
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```elixir
ARKEcosystem.Crypto.Identities.PrivateKey.from_hex('validHexString')

>>> EcPrivateKey
```

### Derive the Private Key from a WIF

```elixir
This function has not been implemented in this client library.
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```elixir
ARKEcosystem.Crypto.Identities.PublicKey.from_passphrase('this is a top secret passphrase')

>>> EcPublicKey
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```elixir
ARKEcosystem.Crypto.Identities.PublicKey.from_hex('validHexString')

>>> EcPublicKey
```

### Validate a Public Key

```elixir
This function has not been implemented in this client library.
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```elixir
ARKEcosystem.Crypto.Identities.WIF.from_passphrase('this is a top secret passphrase')

>>> string
```
