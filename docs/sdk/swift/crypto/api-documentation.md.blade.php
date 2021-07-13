---
title: API Documentation
---

# API Documentation

## Crypto.Crypto.Configuration.FeeConfiguration.Fee

### `get()`

```swift
public func get(forType: TransactionType)
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| TransactionType | forType | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`UInt64`

### `set()`

```swift
public func set(forType: TransactionType, fee: UInt64)
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| TransactionType | forType | Yes | Transaction type for which we wish to get a fee |
| UInt64 | fee | Yes | Fee for a given transaction type |

#### Return Value

`UInt64`

## Crypto.Crypto.Configuration.NetworkConfiguration.ArkNetwork

### `set()`

```swift
public func set(network: ProtocolNetwork)
```

Set what network you want to use in the crypto library

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ProtocolNetwork | network | Yes | Testnet, Devnet, Mainnet |

#### Return Value

`Void`

### `get()`

```swift
public func get()
```

Get settings for a selected network, default network is devnet

#### Return Value

`ProtocolNetwork`

## Crypto.Crypto.Identities.Address.ArkAddress

### `from`

```swift
public static func from(passphrase: String, network: UInt8? = nil)
public static func from(privateKey: PrivateKey, network: UInt8? = nil)
public static func from(publicKey: String, network: UInt8? = nil)
```

Get an address from a passphrase, a private key or a public key

#### Parameters

| Type | Name | Required | Description |  |  |
| :--- | :--- | :--- | :--- | :--- | :--- |
| String | passphrase | privateKey | publicKey | Yes | Passphrase, private key or public key |
| UInt8 | network | No | Version of the network |  |  |

#### Return Value

`String`

### `validate()`

```swift
 public static func validate(address: String)
```

Validate a given address

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | address | Yes | Address to validate |

#### Return Value

`Bool`

## Crypto.Crypto.Identities.PrivateKey.ArkPrivateKey

### `from()`

```swift
public static func from(passphrase: String)
public static func from(hex: String)
```

Create PrivateKey object from a given passphrase or hex string

#### Parameters

| Type | Name | Required | Description |  |
| :--- | :--- | :--- | :--- | :--- |
| Str | passphrase | hex | Yes | Passphrase or hex string |

#### Return Value

`PrivateKey`

## Crypto.Crypto.Identities.PublicKey.ArkPublicKey

### `from()`

```swift
public static func from(passphrase: String)
public static func from(hex: String)
```

Create PublicKey object from a given passphrase

#### Parameters

| Type | Name | Required | Description |  |
| :--- | :--- | :--- | :--- | :--- |
| String | passphrase | hex | Yes | Passphrase or hex string |

#### Return Value

`PublicKey`

## Crypto.Crypto.Identities.WIF.WIF

### `from()`

```swift
public static func from(passphrase: String)
```

Get wif from passphrase

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |

#### Return Value

`String`

## Crypto.Crypto.Networks.Devnet.Devnet

### `epoch()`

```swift
public func epoch()
```

Return the epoch date for devnet.

#### Return Value

`String`

### `version()`

```swift
public func version()
```

Return the version for devnet.

#### Return Value

`UInt8`

### `nethash()`

```swift
public func nethash()
```

Return the nethash for devnet.

#### Return Value

`String`

### `wif()`

```swift
public func wif()
```

Return the WIF for devnet.

#### Return Value

`UInt8`

## Crypto.Crypto.Networks.Mainnet.Mainnet

### `epoch()`

```swift
public func epoch()
```

Return the epoch date for mainnet.

#### Return Value

`String`

### `version()`

```swift
public func version()
```

Return the version for mainnet.

#### Return Value

`UInt8`

### `nethash()`

```swift
public func nethash()
```

Return the nethash for mainnet.

#### Return Value

`String`

### `wif()`

```swift
public func wif()
```

Return the WIF for mainnet.

#### Return Value

`UInt8`

## Crypto.Crypto.Networks.Testnet.Testnet

### `epoch()`

```swift
public func epoch()
```

Return the epoch date for testnet.

#### Return Value

`String`

### `version()`

```swift
public func version()
```

Return the version for testnet.

#### Return Value

`UInt8`

### `nethash()`

```swift
public func nethash()
```

Return the nethash for testnet.

#### Return Value

`String`

### `wif()`

```swift
public func wif()
```

Return the WIF for testnet.

#### Return Value

`UInt8`

## Crypto.Crypto.Transactions.ArkBuilder.ArkBuilder

### `buildTransfer()`

```swift
public static func buildTransfer(_ passphrase: String, secondPassphrase: String?, to recipient: String, amount: UInt64, vendorField: String?)
```

Builds a transaction for a transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase associated with the account sending this transaction |
| String | secondPassphrase | No | Second passphrase that will be registered for the wallet |
| String | recipient | Yes | Recipient identifier |
| String | amount | Yes | Transaction amount |
| String | vendorField | No | Transaction vendorfield |

#### Return Value

`ArkTransaction`

### `buildSecondSignature()`

```swift
public static func buildSecondSignature(_ passphrase: String, secondPassphrase: String)
```

Builds a transaction for a second signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase associated with the account sending this transaction |
| String | secondPassphrase | No | Second passphrase that will be registered for the wallet |

#### Return Value

`ArkTransaction`

### `buildDelegateRegistration()`

```swift
public static func buildDelegateRegistration(_ passphrase: String, secondPassphrase: String?, username: String)
```

Builds a transaction for a delegate registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase associated with the account sending this transaction |
| String | secondPassphrase | No | Second passphrase that will be registered for the wallet |
| String | username | No | Delegate username |

#### Return Value

`ArkTransaction`

### `buildVote()`

```swift
public static func buildVote(_ passphrase: String, secondPassphrase: String?, vote: String)
```

Builds a transaction for a vote.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase associated with the account sending this transaction |
| String | secondPassphrase | No | Second passphrase that will be registered for the wallet |
| String | vote | Yes | Public key of the delegate that is being voted for |

#### Return Value

`ArkTransaction`

### `buildUnvote()`

```swift
public static func buildUnvote(_ passphrase: String, secondPassphrase: String?, vote: String)
```

Builds a transaction for an unvote.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase associated with the account sending this transaction |
| String | secondPassphrase | No | Second passphrase that will be registered for the wallet |
| String | vote | Yes | Public key of the delegate that is being unvoted |

#### Return Value

`ArkTransaction`

### `buildMultiSignatureRegistration()`

```swift
public static func buildMultiSignatureRegistration(_ passphrase: String, secondPassphrase: String?, min: UInt8, lifetime: UInt8, keysgroup: [String])
```

Builds a transaction for a multi signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase associated with the account sending this transaction |
| String | secondPassphrase | No | Second passphrase that will be registered for the wallet |
| UInt8 | min | Yes | Minimum required signatures |
| UInt8 | lifetime | Yes | Transaction lifetime |
| [String] | keysgroup | Yes | Transaction keysgroup |

#### Return Value

`ArkTransaction`

## Crypto.Crypto.Transactions.ArkDeserializer.ArkDeserializer

### `deserialize()`

```swift
public static func deserialize(serialized: String)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |

#### Return Value

`ArkTransaction`

## Crypto.Crypto.Transactions.ArkSerializer.ArkSerializer

### `serialize()`

```swift
public static func serialize(transaction: ArkTransaction)
```

Handle the serialization of transaction data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ArkTransaction | transaction | Yes | Transaction |

#### Return Value

`String`

## Crypto.Crypto.Transactions.ArkTransaction.ArkTransaction

### `getId()`

```swift
public static func getId()
```

Convert the byte representation to a unique identifier.

#### Return Value

`String`

### `sign()`

```swift
public func sign(_ keys: PrivateKey)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| PrivateKey | keys | Yes | Passphrase |

#### Return Value

`ArkTransaction`

### `secondSign()`

```swift
public func secondSign(_ keys: PrivateKey)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| PrivateKey | keys | Yes | Second passphrase |

#### Return Value

`ArkTransaction`

### `verify()`

```swift
public static func verify()
```

Verify the transaction.

#### Return Value

`Bool`

### `secondVerify()`

```swift
public func secondVerify(publicKey: String)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | publicKey | Yes | Second public key |

#### Return Value

`Bool`

### `toBytes()`

```swift
public func toBytes(skipSignature: Bool = true, skipSecondSignature: Bool = true)
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Bool | skipSignature | False | Skip first signature |
| Bool | skipSecondSignature | False | Skip second signature |

#### Return Value

`[UInt8]`

### `toDict()`

```swift
public func toDict()
```

Convert the transaction to its dict representation.

#### Return Value

`[String: Any]`

### `toJson()`

```swift
public func toJson()
```

Convert the transaction to its JSON representation.

#### Return Value

`String?`

## Crypto.Crypto.Utils.Message.ArkMessage

### `init()`

```swift
public init(publicKey: String, signature: String, message: String)
```

Create a new message instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | publicKey | Yes | Public key |
| String | signature | Yes | Signature |
| String | message | Yes | Message |

### `sign()`

```swift
public static func sign(message: String, passphrase: String)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | message | Yes | Message |
| String | passphrase | Yes | Passphrase |

#### Return Value

`ArkMessage?`

### `verify()`

```swift
public func sign()
```

Verify the message contents.

#### Return Value

`Bool`

### `toDict()`

```swift
public func toDict()
```

Convert the message to its dict representation.

#### Return Value

`[String: String]`

### `toJson()`

```swift
public func toJson()
```

Convert the message to its JSON representation.

#### Return Value

`String`

## Crypto.Crypto.Utils.Slot.Slot

### `time()`

```swift
public static func time()
```

Get the time diff between now and network start.

#### Return Value

`UInt32`

### `epoch()`

```swift
public static func epoch()
```

Get the network start epoch.

#### Return Value

`Int`
