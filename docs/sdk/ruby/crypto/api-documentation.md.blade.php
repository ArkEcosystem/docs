---
title: API Documentation
---

# API Documentation

## ArkEcosystem.Crypto.Configuration.Fee

### `get()`

```ruby
def self.get(type)
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ArkEcosystem::Crypto::Enums::Fees | type | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`?`

### `set()`

```ruby
def self.set(type, fee)
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ArkEcosystem::Crypto::Enums::Fees | type | Yes | Transaction type for which we wish to get a fee |
| Integer | fee | Yes | Fee for a given transaction type |

#### Return Value

`?`

## ArkEcosystem.Crypto.Configuration.Network

### `get()`

```ruby
def self.get
```

Get settings for a selected network, default network is mainnet.

#### Return Value

`?`

### `set()`

```ruby
def self.set(network)
```

Set settings for a selected network, default network is mainnet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | type | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`?`

## ArkEcosystem.Crypto.Identities.Address

### `from_public_key()`

```ruby
def self.from_public_key(public_key, network = nil)
```

Derive the address from the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | public\_key | Yes | Public key |
| string | network | No | Version of the network |

#### Return Value

`string`

### `from_private_key()`

```ruby
def self.from_private_key(private_key, network = nil)
```

Derive the address from the given private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | private\_key | Yes | Private key |
| string | network | No | Version of the network |

#### Return Value

`?`

### `from_passphrase()`

```ruby
def self.from_passphrase(passphrase, network = nil)
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |
| string | network | No | Version of the network |

#### Return Value

`string`

### `validate()`

```ruby
def self.validate(address)
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | address | Yes | Address |

#### Return Value

`bool`

## ArkEcosystem.Crypto.Identities.PrivateKey

### `from_passphrase()`

```ruby
def self.from_passphrase(passphrase)
```

Derive the private key for the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`?`

### `from_hex()`

```ruby
def self.from_hex(private_key)
```

Create a private key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | private\_key | Yes | Private key |

#### Return Value

`?`

## ArkEcosystem.Crypto.Identities.PublicKey

### `from_passphrase()`

```ruby
def self.from_passphrase(passphrase)
```

Derive the public from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`?`

### `from_hex()`

```ruby
def self.from_hex(public_key)
```

Create a public key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | public\_key | Yes | Public key |

#### Return Value

`?`

## ArkEcosystem.Crypto.Identities.WIF

### `from_passphrase()`

```ruby
def self.from_passphrase(passphrase, network = nil)
```

Derive the WIF from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |
| string | network | No | Network wif |

#### Return Value

`?`

## ArkEcosystem.Crypto.Networks.Devnet

### `epoch()`

```ruby
def self.epoch
```

Get the epoch time of the Network.

#### Return Value

`String`

### `version()`

```ruby
def self.version
```

Get the version of the Network.

#### Return Value

`Integer`

### `wif()`

```ruby
def self.wif
```

Get the WIF of the Network.

#### Return Value

`Integer`

## ArkEcosystem.Crypto.Networks.Mainnet

### `epoch()`

```ruby
def self.epoch
```

Get the epoch time of the Network.

#### Return Value

`String`

### `version()`

```ruby
def self.version
```

Get the version of the Network.

#### Return Value

`Integer`

### `wif()`

```ruby
def self.wif
```

Get the WIF of the Network.

#### Return Value

`Integer`

## ArkEcosystem.Crypto.Networks.Testnet

### `epoch()`

```ruby
def self.epoch
```

Get the epoch time of the Network.

#### Return Value

`String`

### `version()`

```ruby
def self.version
```

Get the version of the Network.

#### Return Value

`Integer`

### `wif()`

```ruby
def self.wif
```

Get the WIF of the Network.

#### Return Value

`Integer`

## ArkEcosystem.Crypto.Transactions.Builder.Base

### `sign()`

```ruby
def sign(passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | passphrase |

#### Return Value

`?`

### `sign_and_create_id()`

```ruby
def sign_and_create_id(passphrase)
```

Sign the transaction using the given passphrase and generate a valid id for it.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | passphrase |

#### Return Value

`?`

### `second_sign()`

```ruby
def second_sign(second_passphrase)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | passphrase |

#### Return Value

`?`

### `verify()`

```ruby
def verify
```

Verify the transaction with a public key.

#### Return Value

`?`

### `second_verify()`

```ruby
def second_verify(second_public_key)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | second\_public\_key | Yes | Second public key |

#### Return Value

`?`

### `to_params()`

```ruby
def to_params
```

Convert the transaction to its params representation.

#### Return Value

`?`

### `to_json()`

```ruby
def to_json
```

Convert the transaction to its JSON representation.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Builder.DelegateRegistration

### `def set_username()`

```ruby
def set_username(username)
```

Set the username to assign.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | username | Yes | Delegate username |

#### Return Value

`?`

### `def sign()`

```ruby
def sign(passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | passphrase |

#### Return Value

`?`

### `def type()`

```ruby
def type
```

Get the type of the transaction.

#### Return Value

`ArkEcosystem::Crypto::Enums::Types::DELEGATE_REGISTRATION`

## ArkEcosystem.Crypto.Transactions.Builder.MultiSignatureRegistration

### `def set_keysgroup()`

```ruby
def set_keysgroup(keysgroup)
```

Set the keysgroup of signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | keysgroup | Yes | Transaction keysgroup |

#### Return Value

`?`

### `def set_lifetime()`

```ruby
def set_lifetime(lifetime)
```

Set the transaction lifetime.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Integer | lifetime | Yes | Transaction lifetime |

#### Return Value

`?`

### `def set_min()`

```ruby
def set_min(min)
```

Set the transaction minimum required signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Integer | min | Yes | Minimum required signatures |

#### Return Value

`?`

### `def type()`

```ruby
def type
```

Get the type of the transaction.

#### Return Value

`ArkEcosystem::Crypto::Enums::Types::MULTI_SIGNATURE_REGISTRATION`

## ArkEcosystem.Crypto.Transactions.Builder.SecondSignatureRegistration

### `def set_second_passphrase()`

```ruby
def set_second_passphrase(second_passphrase)
```

Set the second passphrase for the transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | second\_passphrase | Yes | Second passphrase |

#### Return Value

`?`

### `def type()`

```ruby
def type
```

Get the type of the transaction.

#### Return Value

`ArkEcosystem::Crypto::Enums::Types::SECOND_SIGNATURE_REGISTRATION`

## ArkEcosystem.Crypto.Transactions.Builder.Transfer

### `def set_recipient_id()`

```ruby
def set_recipient_id(recipient_id)
```

Set the recipient id of the transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | recipient\_id | Yes | Recipient identifier |

#### Return Value

`?`

### `def set_amount()`

```ruby
def set_amount(amount)
```

Set the amount of the transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | amount | Yes | Transaction amount |

#### Return Value

`?`

### `def set_vendor_field()`

```ruby
def set_vendor_field(vendor_field)
```

Set the vendorfield of the transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | vendor\_field | Yes | Transaction vendorfield |

#### Return Value

`?`

### `def type()`

```ruby
def type
```

Get the type of the transaction.

#### Return Value

`ArkEcosystem::Crypto::Enums::Types::TRANSFER`

## ArkEcosystem.Crypto.Transactions.Builder.Vote

### `def set_votes()`

```ruby
def set_votes(votes)
```

Set the votes to cast.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Array | votes | Yes | Votes |

#### Return Value

`?`

### `def sign()`

```ruby
def sign(passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`?`

### `def type()`

```ruby
def type
```

Get the type of the transaction.

#### Return Value

`ArkEcosystem::Crypto::Enums::Types::VOTE`

## ArkEcosystem.Crypto.Transactions.Deserializers.Base

### `initialize()`

```ruby
def initialize(serialized, binary, asset_offset, transaction)
```

The base deserializer for transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | serialized | Yes | Serialized |
| ? | binary | Yes | ... |
| ? | asset\_offset | Yes | Offset |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.DelegateRegistration

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "delegate registration" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.DelegateResignation

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "delegate resignation" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.IPFS

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "ipfs" data

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.MultiPayment

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "multi payment" data

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.MultiSignatureRegistration

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "multi signature registration" data

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.SecondSignatureRegistration

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "second signature" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.TimelockTransfer

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "timelock transfer" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.Transfer

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "transfer" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Deserializers.Vote

### `deserialize()`

```ruby
def deserialize
```

Handle the deserialization of "vote" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.Base

### `initialize()`

```ruby
def initialize(transaction, bytes)
```

The base serializer for transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |
| ? | bytes | Yes | ... |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.DelegateRegistration

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "delegate registration" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.DelegateResignation

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "delegate resignation" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.IPFS

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "IPFS" data.

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.MultiPayment

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "multi payment" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.MultiSignatureRegistration

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "multi signature registration" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.SecondSignatureRegistration

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "second signature registration" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.TimelockTransfer

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "timelock transfer" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.Transfer

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "transfer" data.

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializers.Vote

### `serialize()`

```ruby
def serialize
```

Handle the serialization of "vote" data.

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Deserializer

### `initialize()`

```ruby
def initialize(serialized)
```

The base deserializer for transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | serialized | Yes | Serialized |

#### Return Value

`?`

### `deserialize()`

```ruby
def deserialize
```

Perform AIP11 compliant deserialization.

#### Return Value

`?`

### `handle_type()`

```ruby
def handle_type(asset_offset, transaction)
```

Handle the deserialization of "type" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | asset\_offset | Yes | Offset |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

### `handle_version_one()`

```ruby
def handle_version_one(transaction)
```

Handle the deserialization of transaction data with a version of 1.0.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Serializer

### `initialize()`

```ruby
def initialize(transaction)
```

The base serializer for transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

### `serialize()`

```ruby
def serialize
```

Perform AIP11 compliant serialization.

#### Return Value

`?`

### `handle_type()`

```ruby
def handle_type(bytes)
```

Handle the serialization of "type" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |

#### Return Value

`?`

### `handle_signatures()`

```ruby
def handle_signatures(bytes)
```

Handle the serialization of "signatures" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | bytes | Yes | ... |

#### Return Value

`?`

## ArkEcosystem.Crypto.Transactions.Transaction

### `get_id()`

```ruby
def get_id
```

Convert the byte representation to a unique identifier.

#### Return Value

`String`

### `sign()`

```ruby
def sign(passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |

#### Return Value

`?`

### `second_sign()`

```ruby
def second_sign(second_passphrase)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | second\_passphrase | Yes | Second passphrase |

#### Return Value

`?`

### `verify()`

```ruby
def verify
```

Verify the transaction.

#### Return Value

`?`

### `second_verify()`

```ruby
def second_verify(second_public_key)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | second\_public\_key | Yes | Second public key |

#### Return Value

`?`

### `to_bytes()`

```ruby
def to_bytes(skip_signature = true, skip_second_signature = true)
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | skip\_signature | No | Skip first signature |
| string | skip\_second\_signature | No | Skip second signature |

#### Return Value

`?`

### `parse_signatures()`

```ruby
def parse_signatures(serialized, start_offset)
```

Parse the signature, second signature, and multi signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | serialized | Yes | Serialized |
| ? | start\_offset | Yes | Offset |

#### Return Value

`?`

### `to_params()`

```ruby
def to_params
```

Convert the transaction to its params representation.

#### Return Value

`?`

### `to_json()`

```ruby
def to_json
```

Convert the transaction to its JSON representation.

#### Return Value

`?`

### `serialize()`

```ruby
def serialize(transaction)
```

Perform AIP11 compliant serialization

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

### `deserialize()`

```ruby
def serialize(transaction)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | transaction | Yes | Transaction |

#### Return Value

`?`

## ArkEcosystem.Crypto.Utils.Message

### `initialize()`

```ruby
def initialize(message)
```

The builder to work with signed messages.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | message | Yes | Message |

#### Return Value

`?`

### `sign()`

```ruby
def self.sign(message, passphrase)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | message | Yes | Message |
| String | passphrase | Yes | Passphrase |

#### Return Value

`?`

### `verify()`

```ruby
def verify
```

Verify the message contents

#### Return Value

`?`

### `to_params()`

```ruby
def to_params
```

Convert the message to its params representation

#### Return Value

`?`

### `to_json()`

```ruby
def to_json
```

Convert the message to its JSON representation

#### Return Value

`?`

## ArkEcosystem.Crypto.Utils.Slot

### `get_time()`

```ruby
def get_time
```

Get the time diff between now and network start.

#### Return Value

`?`

### `get_epoch()`

```ruby
def get_epoch
```

Get the network start epoch.

#### Return Value

`?`
