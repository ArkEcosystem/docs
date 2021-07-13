---
title: Examples
---

# Examples

## Initialization

```rust
use arkecosystem_crypto::transactions::builder;
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/rust/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase (from which the private key is generated). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```rust
let transaction = builder::build_transfer(
    "this is a top secret passphrase",
    None,
    "validAddress",
    10_000_000,
    "This is a transaction from Rust",
).unwrap();

>>> Transaction
```

### Serialize (AIP11)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```rust
use arkecosystem_crypto::transactions;

println!("{:?}", transactions::serialize(&transaction));

>>> String
```

### Deserialize (AIP11)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```rust
use arkecosystem_crypto::transactions;

let transaction = transactions::deserialize(&serialized_transaction);

>>> Transaction
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data (expressed as strings).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```rust
use arkecosystem_crypto::utils::Message;

let message = Message::sign("Hello World", "this is a top secret passphrase");

>>> Message
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```rust
use arkecosystem_crypto::utils::Message;

let message = Message::new(
    "validPublicKey",
    "validSignature",
    "Hello World"
);

println!("Valid: {:?}", message.verify());


>>> Message
```

## Identities

> The identities class allows for the creation and inspection of keyPairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```rust
use arkecosystem_crypto::identities::address;

address::from_passphrase("this is a top secret passphrase", None);

>>> Result<String, Error>
```

### Derive the Address from a Public Key

```rust
use arkecosystem_crypto::identities::{address, public_key};

let public_key = public_key::from_hex("validPublicKey").unwrap();

address::from_public_key(&public_key, None);

>>> String
```

### Derive the Address from a Private Key

```rust
use arkecosystem_crypto::identities::{address, private_key};

let private_key = private_key::from_hex("validPrivateKey").unwrap();

address::from_private_key(&private_key, None);

>>> String
```

### Validate an Address

```rust
use arkecosystem_crypto::identities::address;

address::validate("validAddress", None);

>>> bool
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```rust
use arkecosystem_crypto::identities::private_key;

private_key::from_passphrase("this is a top secret passphrase").unwrap();

>>> Result<PrivateKey, Error>
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```rust
use arkecosystem_crypto::identities::private_key;

private_key::from_hex("validHexString").unwrap();

>>> Result<PrivateKey, Error>
```

### Derive the Private Key from a WIF

```rust
This function has not been implemented in this client library.
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```rust
use arkecosystem_crypto::identities::public_key;

public_key::from_passphrase("this is a top secret passphrase").unwrap();

>>> Result<PublicKey, Error>
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```rust
use arkecosystem_crypto::identities::public_key;

public_key::from_hex("validHexString").unwrap();

>>> Result<PublicKey, Error>
```

### Validate a Public Key

```rust
This function has not been implemented in this client library.
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```rust
use arkecosystem_crypto::identities::wif;

wif::from_passphrase("this is a top secret passphrase").unwrap();

>>> String
```
