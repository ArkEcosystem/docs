---
title: API Documentation
---

# API Documentation

## configuration::fees

### `get()`

```rust
pub fn get(transaction_type: TransactionType)
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| TransactionType | transaction_type | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`u64`

### `set()`

```rust
pub fn set(transaction_type: TransactionType, value: u64)
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| TransactionType | transaction_type | Yes | Transaction type for which we wish to set a fee |
| u64 | value | Yes | Fee for a given transaction type |

#### Return Value

`Void`

## configuration::network

### `set()`

```rust
pub fn set(network: Network)
```

Set what network you want to use in the crypto library.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Network | network | Yes | Testnet, Devnet, Mainnet |

#### Return Value

`Void`

### `get()`

```rust
pub fn get()
```

Get settings for a selected network, default network is mainnet.

#### Return Value

`Network`

## enums::networks::Network

### `epoch()` str

```rust
pub fn epoch(&self)
```

Get the epoch time of the Network.

#### Return Value

`&'static str`

### `version()`

```rust
pub fn version(&self)
```

Get the version of the Network.

#### Return Value

`u8`

### `epoch()` u8

```rust
pub fn epoch(&self)
```

Get the epoch time of the Network.

#### Return Value

`u8`

## enums::transaction_types::TransactionType

### `fee()`

```rust
pub fn fee(self)
```

Get the fee for a certain type of transaction.

#### Return Value

`u64`

## identities::address

### `from_public_key()`

```rust
pub fn from_public_key(public_key: &PublicKey, network_version: Option<u8>)
```

Derive the address from the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &PublicKey | public_key | Yes | Public key |
| Option | network_version | No | Version of the network |

#### Return Value

`String`

### `from_private_key()`

```rust
pub fn from_private_key(private_key: &PrivateKey, network_version: Option<u8>)
```

Derive the address from the given private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &PrivateKey | private_key | Yes | Private key |
| Option | network_version | No | Version of the network |

#### Return Value

`String`

### `from_passphrase()`

```rust
pub fn from_passphrase(passphrase: &str, network_version: Option<u8>)
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |
| Option | network | No | Version of the network |

#### Return Value

`Result<String, Error>`

### `validate()`

```rust
pub fn validate(address: &str, network_version: Option<u8>)
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | address | Yes | Address |
| Option | network | No | Version of the network |

#### Return Value

`bool`

## identities::private_key

### `from_passphrase()`

```rust
pub fn from_passphrase(passphrase: &str)
```

Derive the private key for the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |

#### Return Value

`Result<PrivateKey, Error>`

### `from_hex()`

```rust
pub fn from_hex(private_key: &str)
```

Create a private key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | private_key | Yes | Private key |

#### Return Value

`Result<PrivateKey, Error>`

### `sign()`

```rust
pub fn sign(bytes: &[u8], passphrase: &str)
```

Sign the private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &[u8] | bytes | Yes | ... |
| &str | passphrase | Yes | Passphrase |

#### Return Value

`String`

## identities::public_key

### `from_passphrase()`

```rust
pub fn from_passphrase(passphrase: &str)
```

Derive the public from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |

#### Return Value

`Result<PublicKey, Error>`

### `from_hex()`

```rust
pub fn from_hex(public_key: &str)
```

Create a public key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | public_key | Yes | Public key |

#### Return Value

`Result<PublicKey, Error>`

### `from_private_key()`

```rust
pub fn from_private_key(private_key: &private_key::PrivateKey)
```

Create a public key instance from a private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &private_key::PrivateKey | private_key | Yes | Private key |

#### Return Value

`PublicKey`

## identities::wif

### `from_passphrase()`

```rust
pub fn from_passphrase(passphrase: &str)
```

Derive the WIF from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |

#### Return Value

`String`

## transactions::builder

### `build_transfer()`

```rust
pub fn build_transfer(
    passphrase: &str,
    second_passphrase: Option<&str>,
    recipient_id: &str,
    amount: u64,
    vendor_field: &str,
)
```

Builds a transaction for a transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |
| &str | second_passphrase | No | Second passphrase |
| &str | recipient_id | Yes | Recipient identifier |
| u64 | amount | Yes | Transaction amount |
| &str | vendor_field | Yes | Transaction vendorfield |

#### Return Value

`Result<Transaction, failure::Error>`

### `build_vote()`

```rust
pub fn build_vote(
    passphrase: &str,
    second_passphrase: Option<&str>,
    votes: Vec<String>,
)
```

Builds a transaction for a vote registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |
| Option&lt;&str&gt; | second_passphrase | No | Second passphrase |
| Vec | votes | Yes | Votes |

#### Return Value

`Result<Transaction, failure::Error>`

### `build_second_signature_registration()`

```rust
pub fn build_second_signature_registration(
    passphrase: &str,
    second_passphrase: &str,
)
```

Builds a transaction for a second signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |
| Option&lt;&str&gt; | second_passphrase | No | Second passphrase |

#### Return Value

`Result<Transaction, failure::Error>`

### `build_delegate_registration()`

```rust
pub fn build_delegate_registration(
    passphrase: &str,
    second_passphrase: Option<&str>,
    username: &str,
)
```

Builds a transaction for a delegate registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |
| Option&lt;&str&gt; | second_passphrase | No | Second passphrase |
| &str | username | Yes | Delegate username |

#### Return Value

`Result<Transaction, failure::Error>`

### `build_multi_signature_registration()`

```rust
pub fn build_multi_signature_registration(
    passphrase: &str,
    second_passphrase: Option<&str>,
    min: u8,
    lifetime: u8,
    keysgroup: Vec<String>,
)
```

Builds a transaction for a multi signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | passphrase | Yes | Passphrase |
| Option&lt;&str&gt; | second_passphrase | No | Second passphrase |
| u8 | min | Yes | Minimum required signatures |
| u8 | lifetime | Yes | Transaction lifetime |
| Vec | keysgroup | Yes | Transaction keysgroup |

#### Return Value

`Result<Transaction, failure::Error>`

## transactions::deserializers

### `deserialize()`

```rust
pub fn deserialize(serialized: &str)
```

Handle the deserialization of data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | serialized | Yes | Serialized |

#### Return Value

\`Transaction

## transactions::serializer

### `serialize()`

```rust
pub fn serialize(transaction: &Transaction)
```

Handle the serialization of data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &Transaction | transaction | Yes | Transaction |

#### Return Value

`String`

## transactions::transaction::Transaction

### `get_id()`

```rust
pub fn get_id(&self)
```

Convert the byte representation to a unique identifier.

#### Return Value

`String`

### `sign()`

```rust
pub fn sign(&mut self, passphrase: &str)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &mut | self | Yes | ... |
| &str | passphrase | Yes | Passphrase |

#### Return Value

`&Self`

### `second_sign()`

```rust
pub fn second_sign(&mut self, passphrase: &str)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &mut | self | Yes | ... |
| &str | passphrase | Yes | Second passphrase |

#### Return Value

`&Self`

### `verify()`

```rust
pub fn verify(&self)
```

Verify the transaction.

#### Return Value

`bool`

### `second_verify()`

```rust
pub fn second_verify(&self, sender_public_key: &str)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | sender_public_key | Yes | Second public key |

#### Return Value

`bool`

### `to_bytes()`

```rust
pub fn to_bytes(&self, skip_signature: bool, skip_second_signature: bool)
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| bool | skip_signature | Yes | Skip first signature |
| bool | skip_second_signature | Yes | Skip second signature |

#### Return Value

`Vec<u8>`

### `to_params()`

```rust
pub fn to_params(&self)
```

Convert the transaction to its params representation.

#### Return Value

`Result<serde_json::Value, serde_json::Error>`

### `to_json()`

```rust
pub fn to_json(&self)
```

Convert the transaction to its JSON representation.

#### Return Value

`Result<String, serde_json::Error>`

## utils::message::Message

### `new()`

```rust
pub fn new(public_key: &str, signature: &str, message: &str)
```

Instantiate new Message.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | public_key | Yes | Public key |
| &str | signature | Yes | Signature |
| &str | message | Yes | Message |

#### Return Value

`Message`

### `sign()`

```rust
pub fn sign(message: &str, passphrase: &str)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | message | Yes | Message |
| &str | passphrase | Yes | Passphrase |

#### Return Value

`Message`

### `verify()`

```rust
pub fn verify(&self)
```

Verify the message contents

#### Return Value

`bool`

### `to_json()`

```rust
pub fn to_json(&self)
```

Convert the message to its JSON representation

#### Return Value

`Result<String, serde_json::Error>`

### `to_map()`

```rust
pub fn to_map(&self)
```

Convert the message to its JSON representation

#### Return Value

`Result<Value, serde_json::Error>`

## utils::mod

### `str_from_hex()`

```rust
pub fn str_from_hex(string: &str)
```

Convert the given string from its hex representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | string | Yes | String |

#### Return Value

`Result<String, failure::Error>`

### `str_to_hex()`

```rust
pub fn str_to_hex(string: &str)
```

Convert the given string to its hex representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | string | Yes | String |

#### Return Value

`String`

## utils::slot

### `get_time()`

```rust
pub fn get_time()
```

Get the time diff between now and network start.

#### Return Value

`u32`

### `get_epoch()`

```rust
pub fn get_epoch()
```

Get the network start epoch.

#### Return Value

`u32`
