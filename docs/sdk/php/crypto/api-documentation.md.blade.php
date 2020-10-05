---
title: API Documentation
---

# API Documentation

## ArkEcosystem\Crypto\Configuration\Fee

### `get()`

```php
public static function get(int $type)
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | type | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`int`

### `set()`

```php
public static function set(int $type, int $fee)
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | type | Yes | Transaction type for which we wish to set a fee |
| int | fee | Yes | Fee for a given transaction type |

#### Return Value

`void`

## ArkEcosystem\Crypto\Configuration\Network

### `set()`

```php
public static function set(AbstractNetwork $netswork)
```

Set what network you want to use in the crypto library

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| AbstractNetwork | network | Yes | Testnet, Devnet, Mainnet |

#### Return Value

`void`

### `get()`

```php
public static function get()
```

Get settings for a selected network, default network is devnet

#### Return Value

`AbstractNetwork`

## ArkEcosystem\Crypto\Identities\Address

### `fromPublicKey()`

```php
public static function fromPublicKey(string $publicKey, $network = null)
```

Derive the address from the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | publicKey | Yes | Public key |
| AbstractNetwork | network | No | Version of the network |

#### Return Value

`string`

### `fromPrivateKey()`

```php
public static function fromPrivateKey(EccPrivateKey $privateKey, AbstractNetwork $network = null)
```

Derive the address from the given private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| EccPrivateKey | private\_key | Yes | Private key |
| AbstractNetwork | network | No | Version of the network |

#### Return Value

`string`

### `fromPassphrase()`

```php
public static function fromPassphrase(string $passphrase, AbstractNetwork $network = null)
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Private key |
| AbstractNetwork | network | No | Version of the network |

#### Return Value

`string`

### `validate()`

```php
public static function validate(string $address, $network = null)
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | address | Yes | Address to validate |
| AbstractNetwork | network | No | Version of the network |

#### Return Value

`bool`

## ArkEcosystem\Crypto\Identities\PrivateKey

### `fromPassphrase()`

```php
public static function fromPassphrase(string $passphrase)
```

Derive the private key for the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`EcPrivateKey`

### `fromHex()`

```php
public static function fromHex($privateKey)
```

Create a private key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | privateKey | Yes | Private key |

#### Return Value

`EcPrivateKey`

### `fromWif()`

```php
public static function fromWif(string $wif, AbstractNetwork $network = null)
```

Create a private key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | wif | Yes | Network WIF |
| AbstractNetwork | network | No | Network |

#### Return Value

`EcPrivateKey`

## ArkEcosystem\Crypto\Identities\PublicKey

### `fromPassphrase()`

```php
public static function fromPassphrase(string $passphrase)
```

Derive the public from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`EcPublicKey`

### `fromHex()`

```php
public static function fromHex($publicKey)
```

Create a public key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | publicKey | Yes | Public key |

#### Return Value

`EcPublicKey`

## ArkEcosystem\Crypto\Identities\WIF

### `fromPassphrase()`

```php
public static function fromPassphrase(string $passphrase, AbstractNetwork $network = null)
```

Derive the WIF from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | passphrase | Yes | Passphrase |
| AbstractNetwork | network | No | Network WIF |

#### Return Value

`string`

## ArkEcosystem\Crypto\Networks\Devnet

### `epoch()`

```php
public function epoch()
```

Get the epoch time of the start of the Network.

#### Return Value

`string`

## ArkEcosystem\Crypto\Networks\Mainnet

### `epoch()`

```php
public function epoch()
```

Get the epoch time of the start of the Network.

#### Return Value

`string`

## ArkEcosystem\Crypto\Networks\Testnet

### `epoch()`

```php
public function epoch()
```

Get the epoch time of the start of the Network.

#### Return Value

`string`

## ArkEcosystem\Crypto\Transactions\Builder\AbstractTransaction

### `__toString()`

```php
public function __toString()
```

Convert the message to its string representation.

#### Return Value

`string`

### `new()`

```php
public function new()
```

Create a new transaction instance.

#### Return Value

`self`

### `withFee()`

```php
public function withFee(int $fee)
```

Set the transaction fee.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | fee | Yes | Transaction fee |

#### Return Value

`self`

### `toJson()`

```php
public function toJson()
```

Convert the transaction to its JSON representation.

#### Return Value

`string`

### `toArray()`

```php
public function toArray()
```

Convert the transaction to its array representation.

#### Return Value

`array`

### `sign()`

```php
public function sign(string $passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase associated with the account sending this transaction |

#### Return Value

`self`

### `secondSign()`

```php
public function secondSign(string $secondPassphrase)
```

Sign the transaction using the given second passphrase

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Second passphrase associated with the account sending this transaction |

#### Return Value

`self`

### `verify()`

```php
public function verify()
```

Verify the transaction validity.

#### Return Value

`bool`

### `secondVerify()`

```php
public function secondVerify(string $secondPublicKey)
```

Verify the transaction validity with a second signature

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | secondPublicKey | Yes | Second public key |

#### Return Value

`bool`

## ArkEcosystem\Crypto\Transactions\Builder\DelegateRegistration

### `sign()`

```php
public function sign(string $passphrase)
```

Sign the transaction using the given passphrase

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`AbstractTransaction`

### `username()`

```php
public function username(string $username)
```

Set the username to assign.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | username | Yes | Username |

#### Return Value

`self`

## ArkEcosystem\Crypto\Transactions\Builder\MultiPayment

### `add()`

```php
public function add(string $recipientId, int $amount)
```

Add a new payment to the collection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | recipientId | Yes | Recipient identifier |
| int | amount | Yes | Transaction amount |

#### Return Value

`self`

## ArkEcosystem\Crypto\Transactions\Builder\MultiSignatureRegistration

### `min()`

```php
public function min(int $min)
```

Set the minimum required signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | min | Yes | Minimum required signatures |

#### Return Value

`self`

### `lifetime()`

```php
public function lifetime(int $lifetime)
```

Set the transaction lifetime.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | lifetime | Yes | Transaction lifetime |

#### Return Value

`self`

### `keysGroup()`

```php
public function keysgroup(array $keysgroup)
```

Set the keysgroup of signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | keysgroup | Yes | Signatures keysgroup |

#### Return Value

`self`

## ArkEcosystem\Crypto\Transactions\Builder\SecondSignatureRegistration

### `signature()`

```php
public function signature(string $secondPassphrase)
```

Set the signature asset to register the second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | secondPassphrase | Yes | Second passphrase |

#### Return Value

`self`

## ArkEcosystem\Crypto\Transactions\Builder\TimelockTransfer

### `timelock`

```php
public function timelock(int $timelock)
```

Set the timelock of the transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | timelock | Yes | Timelock |

#### Return Value

`self`

### `timestamp`

```php
public function timestamp()
```

Set the timelock type of the transfer to timestamp.

#### Return Value

`self`

### `height`

```php
public function height()
```

Set the timelock type of the transfer to block height.

#### Return Value

`self`

## ArkEcosystem\Crypto\Transactions\Builder\Transfer

### `recipient()`

```php
public function recipient(string $recipientId)
```

Set the recipient of the transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | recipientId | Yes | Recipient identifier |

#### Return Value

`self`

### `amount()`

```php
public function amount(int $amount)
```

Set the amount to transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | amount | Yes | Transaction amount |

#### Return Value

`self`

### `vendorField()`

```php
public function vendorField(string $vendorField)
```

Set the vendor field / smartbridge.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | vendorField | Yes | Transaction vendorfield |

#### Return Value

`self`

## ArkEcosystem\Crypto\Transactions\Builder\Vote

### `votes()`

```php
public function votes(array $votes)
```

Set the votes to cast.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | votes | Yes | Votes |

#### Return Value

`self`

### `sign()`

```php
public function sign(string $passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | passphrase | Yes | Passphrase |

#### Return Value

`AbstractTransaction`

## ArkEcosystem\Crypto\Transactions\Deserializers\AbstractDeserializer

### `__construct()`

```php
public function __construct(Reader $buffer, int $assetOffset, Transaction $transaction)
```

Create a new deserializer instance

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Reader | serialized | Yes | Reader |
| int | asset\_offset | Yes | Offset |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`AbstractDeserializer`

### `deserialize()`

```php
abstract public function deserialize()
```

Handle the deserialization of transaction data

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\DelegateRegistration

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "delegate registration" data.

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\DelegateResignation

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "delegate resignation" data.

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\IPFS

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "ipfs" data

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\MultiPayment

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "multi payment" data

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\MultiSignatureRegistration

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "multi signature registration" data

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\SecondSignatureRegistration

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "second signature" data.

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\TimelockTransfer

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "timelock transfer" data.

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\Transfer

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "transfer" data.

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Deserializers\Vote

### `deserialize()`

```php
public function deserialize()
```

Handle the deserialization of "vote" data.

#### Return Value

`object`

## ArkEcosystem\Crypto\Transactions\Serializers\AbstractSerializer

### `__construct()`

```php
public function __construct(array $transaction, Writer $buffer)
```

Create a new serializer instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | transaction | Yes | Transaction |
| writer | buffer | Yes | Writer |

#### Return Value

`AbstractSerializer`

### `serialize`

```php
abstract public function serialize()
```

Handle the serialization of transaction data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\DelegateRegistration

### `serialize`

```php
public function serialize()
```

Handle the serialization of "delegate registration" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\DelegateResignation

### `serialize`

```php
public function serialize()
```

Handle the serialization of "delegate resignation" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\IPFS

### `serialize`

```php
public function serialize()
```

Handle the serialization of "IPFS" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\MultiPayment

### `serialize`

```php
public function serialize()
```

Handle the serialization of "multi payment" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\MultiSignatureRegistration

### `serialize`

```php
public function serialize()
```

Handle the serialization of "multi signature registration" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\SecondSignatureRegistration

### `serialize`

```php
public function serialize()
```

Handle the serialization of "second signature registration" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\TimelockTransfer

### `serialize`

```php
public function serialize()
```

Handle the serialization of "timelock transfer" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\Transfer

### `serialize`

```php
public function serialize()
```

Handle the serialization of "transfer" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Serializers\Vote

### `serialize`

```php
public function serialize()
```

Handle the serialization of "vote" data.

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Deserializer

### `__construct()`

```php
public function __construct(string $serialized)
```

Create a new deserializer instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | serialized | Yes | Serialized transaction |

#### Return Value

`Deserializer`

### `new()`

```php
public static function new(string $serialized)
```

Create a new deserializer instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | serialized | Yes | Serialized transaction |

#### Return Value

`Deserializer`

### `deserialize`

```php
public function deserialize(self):
```

Perform AIP11 compliant deserialization.

#### Return Value

`Transaction`

### `handleType`

```php
public function handleType(int $assetOffset, Transaction $transaction)
```

Handle the deserialization of "type" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`Transaction`

### `handleVersionOne`

```php
public function handleVersionOne(Transaction $transaction)
```

Handle the deserialization of transaction data with a version of 1.0.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`Transaction`

### `handleVersionTwo`

```php
public function handleVersionTwo(Transaction $transaction)
```

Handle the deserialization of transaction data with a version of 2.0.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`Transaction`

## ArkEcosystem\Crypto\Transactions\Serializer

### `__construct()`

```php
private function __construct($transaction)
```

Create a new serializer instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`Serializer`

### `new()`

```php
public static function new($transaction)
```

Create a new serializer instance.

#### Parameters

| Type | Name | Required | Description |  |
| :--- | :--- | :--- | :--- | :--- |
| Transaction | array | transaction | Yes | Transaction |

#### Return Value

`self`

### `serialize()`

```php
public function serialize()
```

Perform AIP11 compliant serialization.

#### Return Value

`Buffer`

### `handleType()`

```php
public function handleType(Writer $buffer)
```

Handle the serialization of "type" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Writer | buffer | Yes | Writer |

#### Return Value

`void`

### `handleSignatures()`

```php
public function handleSignatures(Writer $buffer)
```

Handle the serialization of "signatures" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Writer | buffer | Yes | Writer |

#### Return Value

`void`

## ArkEcosystem\Crypto\Transactions\Transaction

### `getId()`

```php
public function getId()
```

Convert the byte representation to a unique identifier.

#### Return Value

`string`

### `sign()`

```php
public function sign(PrivateKey $keys)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| PrivateKey | keys | Yes | Passphrase |

#### Return Value

`self`

### `secondSign()`

```php
public function secondSign(PrivateKey $keys)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| PrivateKey | keys | Yes | Passphrase |

#### Return Value

`self`

### `verify()`

```php
public function verify()
```

Verify the transaction.

#### Return Value

`bool`

### `secondVerify()`

```php
public function secondVerify(string $secondPublicKey)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | secondPublicKey | Yes | Second public key |

#### Return Value

`bool`

### `parseSignatures()`

```php
public function parseSignatures(string $serialized, int $startOffset)
```

Parse the signature, second signature and multi signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | serialized | Yes | Transaction |
| int | startOffset | Yes | Offset |

#### Return Value

`self`

### `toArray()`

```php
public function toArray()
```

Convert the transaction to its array representation.

#### Return Value

`array`

### `toJson()`

```php
public function toJson():
```

Convert the transaction to its JSON representation.

#### Return Value

`string`

### `toBytes()`

```php
public function toBytes(bool $skipSignature = true, bool $skipSecondSignature = true)
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| bool | skipSignature | No | Skip first signature |
| bool | skipSecondSignature | No | Skip second signature |

#### Return Value

`Buffer`

### `serialize()`

```php
public function serialize()
```

Perform AIP11 compliant serialization

#### Return Value

`Buffer`

### `deserialize()`

```php
public static function deserialize(string $serialized)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | serialized | Yes | Transaction |

#### Return Value

`self`

## ArkEcosystem\Crypto\Utils\Message

### `__construct()`

```php
public function __construct(object $message)
```

Create a new message instance

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| object | message | Yes | Message |

#### Return Value

`Message`

### `__toString()`

```php
public function __toString()
```

Convert the message to its JSON representation

#### Return Value

`string`

### `new()`

```php
public static function new($message)
```

Create a new message instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| mixed | message | Yes | Message |

#### Return Value

`self`

### `sign()`

```php
public static function sign(string $message, string $passphrase)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | message | Yes | Message |
| string | passphrase | Yes | Passphrase |

#### Return Value

`self`

### `verify()`

```php
public function verify()
```

Verify the message contents

#### Return Value

`bool`

### `toArray()`

```php
public function toArray()
```

Convert the message to its array representation

#### Return Value

`array`

### `toJson()`

```php
public function toJson()
```

Convert the message to its JSON representation

#### Return Value

`string`

## ArkEcosystem\Crypto\Util\Slot

### `time()`

```php
public static function time()
```

Get the time diff between now and network start.

#### Return Value

`int`

### `epoch()`

```php
public static function epoch()
```

Get the network start epoch.

#### Return Value

`int`

## ArkEcosystem\Crypto\Helpers

### `version()`

```php
public static function version($network)
```

Get the network version.

#### Parameters

| Type | Name | Required | Description |  |
| :--- | :--- | :--- | :--- | :--- |
| AbstractNetwork | int | network | Yes | Network |

#### Return Value

`int`
