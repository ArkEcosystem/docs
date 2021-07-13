---
title: API Documentation
---

# API Documentation

## ArkEcosystem.Crypto.Configuration.Configuration

### `get_value()`

```elixir
def get_value(key, bucket \\ :ark_config)
```

Get the value of the given configuration key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | key | Yes | Configuration key |
| string | bucket | No | ... |

#### Return Value

`?`

### `set_value()`

```elixir
def set_value(key, value, bucket \\ :ark_config)
```

Set the value of the given configuration key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | key | Yes | Configuration key |
| string | value | Yes | New value |
| string | bucket | No | ... |

#### Return Value

`?`

## ArkEcosystem.Crypto.Configuration.Fee

### `get()`

```elixir
def get(type) when is_integer(type)
def get(type) when is_atom(type)
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Type.t() | type | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`?`

### `set()`

```elixir
def set(type, fee)
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Type.t() | type | Yes | Transaction_type for which we wish to set a fee |
| integer | fee | Yes | Fee for a given transaction type |

#### Return Value

`?`

## ArkEcosystem.Crypto.Configuration.Network

### `version()`

```elixir
def version()
```

Get the version of the network.

#### Return Value

`?`

### `set()`

```elixir
def set(network)
```

Set what network you want to use in the crypto library.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | network | Yes | Testnet, Devnet, Mainnet |

#### Return Value

`?`

### `get()`

```elixir
def get()
```

Get settings for a selected network, default network is mainnet.

#### Return Value

`?`

## ArkEcosystem.Crypto.Identities.Address

### `from_public_key()`

```elixir
def from_public_key(public_key, network \\ nil)
```

Derive the address from the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | public_key | Yes | Public key |
| ? | network | No | Version of the network |

#### Return Value

`string`

### `from_private_key()`

```elixir
def from_private_key(private_key, network \\ nil)
```

Derive the address from the given private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | private_key | Yes | Private key |
| ? | network | No | Version of the network |

#### Return Value

`?`

### `from_passphrase()`

```elixir
def from_passphrase(passphrase, network \\ nil)
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | passphrase | Yes | Passphrase |
| ? | network | No | Version of the network |

#### Return Value

`string`

### `validate()`

```elixir
def validate(address, network \\ nil)
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | address | Yes | Address |
| ? | network | No | Version of the network |

#### Return Value

`bool`

## ArkEcosystem.Crypto.Identities.PrivateKey

### `from_passphrase()`

```elixir
def from_passphrase(passphrase)
```

Derive the private key for the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`?`

### `from_hex()`

```elixir
def from_hex(private_key)
```

Create a private key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | private_key | Yes | Private key |

#### Return Value

`EcPrivateKey`

### `sign()`

```elixir
def sign(message, passphrase)
```

Sign the private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | message | Yes | Message |
| string | passphrase | No | Passphrase |

#### Return Value

`?`

## ArkEcosystem.Crypto.Identities.PublicKey

### `from_passphrase()`

```elixir
def from_passphrase(passphrase)
```

Derive the public from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`?`

### `from_hex()`

```elixir
def from_hex(public_key)
```

Create a public key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | public_key | Yes | Public key |

#### Return Value

`EcPublicKey`

### `from_private_key()`

```elixir
def from_private_key(private_key)
```

Create a public key instance from a private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | private_key | Yes | Private key |

#### Return Value

`?`

### `verify()`

```elixir
def verify(message, signature, public_key)
```

Verify the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | message | Yes | Message |
| string | signature | Yes | Signature |
| string | public key | Yes | Public key |

#### Return Value

`?`

## ArkEcosystem.Crypto.Identities.WIF

### `from_passphrase()`

```elixir
def from_passphrase(passphrase, network \\ nil) do
```

Derive the WIF from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | passphrase | Yes | Passphrase |
| ? | network | No | Network WIF |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Builder

### `build_transfer()`

```elixir
def build_transfer(recipient_id, amount, vendor_field, passphrase, second_passphrase \\ nil)
```

Builds a transaction for a transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | recipient_id | Yes | Recipient identifier |
| integer | amount | Yes | Transaction amount |
| string | vendor_field | Yes | Transaction vendorfield |
| string | passphrase | Yes | Passphrase |
| string | second_passphrase | No | Second passphrase |

#### Return Value

`?`

### `build_vote()`

```elixir
def build_vote(votes, passphrase, second_passphrase \\ nil)
```

Builds a transaction for a vote registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Enum.List | votes | Yes | Votes |
| string | passphrase | Yes | passphrase |
| string | second_passphrase | No | second passphrase |

#### Return Value

`?`

### `build_second_signature_registration()`

```elixir
def build_second_signature_registration(passphrase, second_passphrase \\ nil)
```

Builds a transaction for a second signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |
| string | second_passphrase | No | Second passphrase |

#### Return Value

`?`

### `build_delegate_registration()`

```elixir
def build_delegate_registration(username, passphrase, second_passphrase \\ nil)
```

Builds a transaction for a delegate registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | username | Yes | Delegate username |
| string | passphrase | Yes | Passphrase |
| string | second_passphrase | No | Second passphrase |

#### Return Value

`?`

### `build_multi_signature_registration()`

```elixir
def build_multi_signature_registration(min, lifetime, keysgroup, passphrase, second_passphrase \\ nil)
```

Builds a transaction for a multi signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| integer | min | Yes | Transaction minimum required signatures |
| integer | lifetime | Yes | Transaction lifetime |
| ? | keysgroup | Yes | Transaction keysgroup |
| string | passphrase | Yes | Passphrase |
| string | second_passphrase | No | Second passphrase |

#### Return Value

`?`

### `build_ipfs()`

```elixir
def build_ipfs()
```

To Implement.

### `build_timelock_transfer()`

```elixir
def build_timelock_transfer()
```

To Implement.

### `build_multi_payment()`

```elixir
def build_multi_payment()
```

To Implement.

### `build_delegate_resignation()`

```elixir
def build_delegate_resignation()
```

To Implement.

## ArkEcosystem.Crypto.Transactions.Deserializers.DelegateRegistration

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "delegate registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.DelegateResignation

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "delegate resignation" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.IPFS

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "ipfs" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.MultiPayment

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "multi payment" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.MultiSignatureRegistration

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "multi signature registration" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.SecondSignatureRegistration

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "second signature" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.TimelockTransfer

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "timelock transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.Transfer

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "transfer" data.

#### Parameters

v

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.Vote

### `deserialize()`

```elixir
def deserialize(data)
```

Handle the deserialization of "vote" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | ... |

#### Return Value

`object`

## ArkEcosystem.Crypto.Transactions.Serializers.DelegateRegistration

### `serialize()`

```elixir
def serialize(bytes, transaction)
```

Handle the serialization of "delegate registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.DelegateResignation

### `serialize()`

```elixir
def serialize(bytes, _transaction)
```

Handle the serialization of "delegate resignation" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | _transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.IPFS

### `serialize()`

```elixir
def serialize(bytes, transaction)
```

Handle the serialization of "IPFS" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | transaction | Yes | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.MultiPayment

### `serialize()`

```elixir
def serialize(bytes, transaction)
```

Handle the serialization of "multi payment" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.MultiSignatureRegistration

### `serialize()`

```elixir
def serialize(bytes, transaction)
```

Handle the serialization of "multi signature registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.SecondSignatureRegistration

### `serialize()`

```elixir
def serialize(bytes, transaction)
```

Handle the serialization of "second signature registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.TimelockTransfer

### `serialize()`

```elixir
def serialize(bytes, transaction)
```

Handle the serialization of "timelock transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.Transfer

### `serialize()`

```elixir
def serialize(bytes, transaction)
```

Handle the serialization of "transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.Vote

### `serialize()`

```elixir
def serialize(bytes, transaction)
```

Handle the serialization of "vote" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |
| ? | transaction | Yes | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Deserializer

### `deserialize()`

```elixir
def deserialize(%{serialized: serialized}) when is_bitstring(serialized)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | serialized | Yes | Serialized |

#### Return Value

`?`

### `parse_signatures()`

```elixir
def parse_signatures(data)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | data | Yes | ... |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializer

### `serialize()` (transaction, object)

```elixir
def serialize(transaction, %{underscore: underscore}) when is_map(transaction)
```

Perform AIP11 compliant serialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |
| Map | underscore | Yes | ... |

#### Return Value

`?`

### `serialize()` (transaction)

```elixir
def serialize(transaction) when is_map(transaction)
```

Perform AIP11 compliant serialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Transaction

### `get_id()`

```elixir
def get_id(transaction)
```

Convert the byte representation to a unique identifier.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`string`

### `sign_transaction()`

```elixir
def sign_transaction(transaction, passphrase, second_passphrase \\ nil) when is_map(transaction)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |
| string | passphrase | Yes | Passphrase |
| string | second_passphrase | No | Second passphrase |

#### Return Value

`?`

### `sign()`

```elixir
def sign(transaction, passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |
| string | passphrase | Yes | Passphrase |

#### Return Value

`?`

### `second_sign()` (transaction, nil)

```elixir
def second_sign(transaction, nil)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |
| ? | nil | No | ... |

#### Return Value

`?`

### `second_sign()` (transaction, second_passphrase)

```elixir
def second_sign(transaction, second_passphrase)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |
| string | second_passphrase | Yes | Second passphrase |

#### Return Value

`?`

### `verify()`

```elixir
def verify(transaction)
```

Verify the transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

### `second_verify()`

```elixir
def second_verify(transaction, second_public_key)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | transaction | Yes | Transaction |
| string | second_public_key | Yes | Second public key |

#### Return Value

`?`

### `to_bytes()`

```elixir
def to_bytes(transaction, skip_signature \\ true, skip_second_signature \\ true)
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | transaction | Yes | Transaction |
| string | skip_signature | No | Skip first signature |
| string | skip_second_signature | No | Skip second signature |

#### Return Value

`?`

### `to_params()`

```elixir
def to_params(transaction) when is_map(transaction)
```

Convert the transaction to its params representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

### `to_json()`

```elixir
def to_json(transaction) when is_map(transaction)
```

Convert the transaction to its JSON representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

### `serialize()`

```elixir
def serialize(transaction) when is_map(transaction)
```

Perform AIP11 compliant serialization

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

### `deserialize()` (transaction)

```elixir
def serialize(transaction) when is_map(transaction)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

### `deserialize()` (serialized)

```elixir
def deserialize(serialized) when is_bitstring(serialized)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | serialized | Yes | Serialized |

#### Return Value

`?`

### `deserialize()` (object)

```elixir
def deserialize(%{serialized: serialized}) when is_bitstring(serialized)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | serialized | Yes | Serialized |

#### Return Value

`?`

## ArkEcosystem.Crypto.Utils.Message

### `sign()`

```elixir
def sign(message, passphrase)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String.t() | message | Yes | Message |
| String.t() | passphrase | Yes | Passphrase |

#### Return Value

`Map.t()`

### `verify()`

```elixir
def verify(message, signature, public_key)
```

Verify the message contents

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String.t() | message | Yes | Message |
| String.t() | signature | Yes | Signature |
| String.t() | public_key | Yes | Public key |

#### Return Value

`Boolean.t()`

### `to_params()`

```elixir
def to_params(message, signature, public_key)
```

Convert the message to its params representation

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String.t() | message | Yes | Message |
| String.t() | signature | Yes | Signature |
| String.t() | public_key | Yes | Public key |

#### Return Value

`?`

### `to_json()`

```elixir
def to_json(message, signature, public_key)
```

Convert the message to its JSON representation

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String.t() | message | Yes | Message |
| String.t() | signature | Yes | Signature |
| String.t() | public_key | Yes | Public key |

#### Return Value

`?`

## ArkEcosystem.Crypto.Utils.Slot

### `get_time()`

```elixir
def get_time
```

Get the time diff between now and network start.

#### Return Value

`?`

### `get_epoch()`

```elixir
def get_epoch
```

Get the network start epoch.

#### Return Value

`?`s
