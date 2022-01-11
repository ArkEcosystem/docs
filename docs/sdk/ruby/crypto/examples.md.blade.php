---
title: Examples
---

# Examples

## Initialization

```ruby
require 'arkecosystem/crypto'

transaction = ArkEcosystem::Crypto::Transactions::Builder::Transfer.new()
  .set_recipient_id('validAddress')
  .set_amount(1 * 10 ** 8)
  .set_vendor_field('This is a transaction from Ruby')
  .sign('This is a top secret passphrase')
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/ruby/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase (from which the private key is generated). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```ruby
transaction = ArkEcosystem::Crypto::Transactions::Builder::Transfer.new()
  .set_recipient_id('validAddress')
  .set_amount(1 * 10 ** 8)
  .set_vendor_field('This is a transaction from Ruby')
  .sign('This is a top secret passphrase')

print transaction.class

>>> ???
```

### Serialize (AIP11)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```ruby
serializer = ArkEcosystem::Crypto::Transactions::Serializer.new(transaction)

print serializer.class

>>> ???
```

### Deserialize (AIP11)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```ruby
deserializer = ArkEcosystem::Crypto::Transactions::Deserializer.new(serialized_transaction)

print deserializer.class

>>> ???
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data (expressed as strings).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```ruby
message = ArkEcosystem::Crypto::Utils::Message.sign('Hello World', 'this is a top secret passphrase')

print message.class

>>> ???
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```ruby
message = ArkEcosystem::Crypto::Utils::Message.new(
  publickey: 'validPublicKey',
  signature: 'validSignature',
  message: 'Hello World'
)

print message.class

>>> ???
```

## Identities

> The identities class allows for the creation and inspection of keyPairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```ruby
address = ArkEcosystem::Crypto::Identities::Address.from_passphrase('this is a top secret passphrase')

print address.class

>>> ???
```

### Derive the Address from a Public Key

```ruby
address = ArkEcosystem::Crypto::Identities::Address.from_public_key('validPublicKey')

print address.class

>>> ???
```

### Derive the Address from a Private Key

```ruby
address = ArkEcosystem::Crypto::Identities::Address.from_private_key('validPrivateKey')

print address.class

>>> ???
```

### Validate an Address

```ruby
address = ArkEcosystem::Crypto::Identities::Address.validate('validAddress')

print address.class

>>> ???
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```ruby
privateKey = ArkEcosystem::Crypto::Identities::PrivateKey.from_passphrase('this is a top secret passphrase')

print privateKey.class

>>> ???
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```ruby
privateKey = ArkEcosystem::Crypto::Identities::PrivateKey.from_hex('validHexString')

print privateKey.class

>>> ???
```

### Derive the Private Key from a WIF

```ruby
This function has not been implemented in this client library.
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```ruby
publicKey = ArkEcosystem::Crypto::Identities::PublicKey.from_passphrase('this is a top secret passphrase')

print publicKey.class

>>> ???
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```ruby
publicKey = ArkEcosystem::Crypto::Identities::PublicKey.from_hex('validHexString')

print publicKey.class

>>> ???
```

### Validate a Public Key

```ruby
This function has not been implemented in this client library.
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```ruby
wif = ArkEcosystem::Crypto::Identities::WIF.from_passphrase('this is a top secret passphrase')

print wif.class

>>> ???
```
