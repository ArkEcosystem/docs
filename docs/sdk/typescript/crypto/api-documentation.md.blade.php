---
title: API Documentation
---

# API Documentation

## Crypto\Blocks\BlockFactory

### `fromHex()`

```typescript
public static fromHex(hex: string)
```

Generate Block object from HEX.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | hex | Yes | Block content |

#### Return Value

`IBlock`

### `fromBytes()`

```typescript
public static fromBytes(buffer: Buffer)
```

Generate Block object from a Buffer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer | buffer | Yes | Block content |

#### Return Value

`IBlock`

### `fromJson()`

```typescript
public static fromJson(json: IBlockJson)
```

Generate Block object from JSON.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IBlockJson | json | Yes | Block content |

#### Return Value

`IBlock`

### `fromData()`

```typescript
public static fromData(data: IBlockData, options: { deserializeTransactionsUnchecked?: boolean } = {})
```

Generate Block object from Block data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IBlockData | data | Yes | Block content |
| object | options | Yes | Options used for parsing block data |

#### Return Value

`IBlock`

## Crypto\Blocks\Serializer

### `size()`

```typescript
public static size(block: IBlock)
```

Get size of Block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IBlock | block | Yes | Block object |

#### Return Value

`number`

### `serializeWithTransactions()`

```typescript
public static serializeWithTransactions(block: IBlockData)
```

Serialize Block with Transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IBlockData | block | Yes | Block object |

#### Return Value

`Buffer`

### `serialize()`

```typescript
public static serialize(block: IBlockData, includeSignature: boolean = true)
```

Serialize Block without Transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IBlockData | block | Yes | Block object |
| boolean | includeSignature | Yes | Whether to include signature in serialization |

#### Return Value

`Buffer`

## Crypto\Crypto\HashAlgorithms

### `ripemd160()`

```typescript
public static ripemd160(buffer: Buffer | string)
```

Hash with RIPEMD-160.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer, string | buffer | Yes | String or Buffer to generate hash for |

#### Return Value

`Buffer`

### `sha1()`

```typescript
public static sha1(buffer: Buffer | string)
```

Hash with SHA-1.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer, string | buffer | Yes | String or Buffer to generate hash for |

#### Return Value

`Buffer`

### `sha256()`

```typescript
public static sha256(buffer: Buffer | string | Buffer[])
```

Hash with SHA-256.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer, string | buffer | Yes | String or Buffer to generate hash for |

#### Return Value

`Buffer`

### `hash160()`

```typescript
public static hash160(buffer: Buffer | string)
```

Hash with Hash160.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer, string | buffer | Yes | String or Buffer to generate hash for |

#### Return Value

`Buffer`

### `hash256()`

```typescript
public static hash256(buffer: Buffer | string)
```

Hash with Hash256.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer, string | buffer | Yes | String or Buffer to generate hash for |

#### Return Value

`Buffer`

## Crypto\Crypto\Hash

### `signECDSA()`

```typescript
public static signECDSA(hash: Buffer, keys: IKeyPair)
```

Sign hash with ECDSA.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer | hash | Yes | Hash to sign |
| IKeyPair | keys | Yes | Keys to sign hash with |

#### Return Value

`string`

### `verifyECDSA()`

```typescript
public static verifyECDSA(hash: Buffer, signature: Buffer | string, publicKey: Buffer | string)
```

Verify ECDSA signature.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer | hash | Yes | Hash to verify |
| Buffer, string | signature | Yes | Signature of hash |
| Buffer, string | publicKey | Yes | Public key of wallet which signed the hash |

#### Return Value

`boolean`

### `signSchnorr()`

```typescript
public static signSchnorr(hash: Buffer, keys: IKeyPair)
```

Sign hash with Schnorr.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer | hash | Yes | Hash to sign |
| IKeyPair | keys | Yes | Keys to sign hash with |

#### Return Value

`string`

### `verifySchnorr()`

```typescript
public static verifySchnorr(hash: Buffer, signature: Buffer | string, publicKey: Buffer | string)
```

Verify Schnorr signature.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer | hash | Yes | Hash to verify |
| Buffer, string | signature | Yes | Signature of hash |
| Buffer, string | publicKey | Yes | Public key of wallet which signed the hash |

#### Return Value

`boolean`

## Crypto\Crypto\HDWallet

### `fromMnemonic()`

```typescript
public static fromMnemonic(mnemonic: string, passphrase?: string)
```

Generate BIP32 Wallet from mnemonic.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | mnemonic | Yes | INSERT_DESCRIPTION |
| string | passphrase | No | INSERT_DESCRIPTION |

#### Return Value

`BIP32Interface`

### `fromKeys()`

```typescript
public static fromKeys(keys: IKeyPair, chainCode: Buffer)
```

Generate BIP32 Wallet from KeyPair.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IKeyPair | keys | Yes | INSERT_DESCRIPTION |
| Buffer | chainCode | Yes | INSERT_DESCRIPTION |

#### Return Value

`BIP32Interface`

### `getKeys()`

```typescript
public static getKeys(node: BIP32Interface)
```

Get keys for BIP32 Wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BIP32Interface | node | Yes | BIP32 Wallet to get keys for |

#### Return Value

`IKeyPair`

### `deriveSlip44()`

```typescript
public static deriveSlip44(root: BIP32Interface, hardened: boolean = true)
```

Determine Slip44 for BIP32 Wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BIP32Interface | root | Yes | BIP32 Wallet to determine Slip44 for |
| boolean | hardened | Yes | INSERT_DESCRIPTION |

#### Return Value

`BIP32Interface`

### `deriveNetwork()`

```typescript
public static deriveNetwork(root: BIP32Interface)
```

Determine Network for BIP32 Wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BIP32Interface | root | Yes | BIP32 Wallet to determine network for |

#### Return Value

`BIP32Interface`

## Crypto\Crypto\Message

### `sign()`

```typescript
public static sign(message: string, passphrase: string)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | message | Yes | Message |
| string | passphrase | Yes | Passphrase |

#### Return Value

`IMessage`

### `signWithWif()`

```typescript
public static signWithWif(message: string, wif: string, network?: INetwork)
```

Sign a message using the given WIF string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | message | Yes | Message |
| string | wif | Yes | Network WIF |
| INetwork | network | No | Network |

#### Return Value

`IMessage`

### `verify()`

```typescript
public static verify({ message, publicKey, signature }: IMessage)
```

Verify the message contents

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IMessage | object | Yes | Message |

#### Return Value

`boolean`

## Crypto\Crypto\Slots

### `getTime()`

```typescript
public static getTime(time?: number)
```

Get the time diff between now and network start.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | time | No | Network start time |

#### Return Value

`number`

### `getTimeInMsUntilNextSlot()`

```typescript
public static getTimeInMsUntilNextSlot()
```

Get the time (in milliseconds) until the start of the next slot.

#### Return Value

`number`

### `getSlotNumber()`

```typescript
public static getSlotNumber(epoch?: number)
```

Get the slot number.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | epoch | No | Epoch time |

#### Return Value

`number`

### `getSlotTime()`

```typescript
public static getSlotTime(slot: number)
```

Get the slot time.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | slot | Yes | Slot |

#### Return Value

`number`

### `getNextSlot()`

```typescript
public static getNextSlot()
```

Get the next slot.

#### Return Value

`number`

### `isForgingAllowed()`

```typescript
public static isForgingAllowed(epoch?: number)
```

Verify is forging is allowed.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | epoch | No | Epoch time |

#### Return Value

`boolean`

## Crypto\Identities\Address

### `fromPassphrase()`

```typescript
public static fromPassphrase(passphrase: string, networkVersion?: number)
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |
| number | networkVersion | No | Version of the network |

#### Return Value

`string`

### `fromPublicKey()`

```typescript
public static fromPublicKey(publicKey: string, networkVersion?: number)
```

Derive a (multisig) address from a multi signature asset.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | publicKey | Yes | Public key |
| number | networkVersion | No | Version of the network |

#### Return Value

`string`

### `fromWIF()`

```typescript
public static fromWIF(wif: string, network?: NetworkType)
```

Derive the address from a WIF string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | wif | Yes | WIF |
| NetworkType | network | No | Network to generate address for |

#### Return Value

`string`

### `fromMultiSignatureAsset()`

```typescript
public static fromMultiSignatureAsset(asset: IMultiSignatureAsset, networkVersion?: number)
```

Derive the address from the given multi signature asset.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IMultiSignatureAsset | asset | Yes | Address to validate |
| number | networkVersion | No | Version of the network |

#### Return Value

`string`

### `fromPrivateKey()`

```typescript
public static fromPrivateKey(privateKey, networkVersion?: number)
```

Derive the address from the given private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| any | privateKey | Yes | Private key to derive address for |
| number | networkVersion | No | Version of the network |

#### Return Value

`string`

### `fromBuffer()`

```typescript
public static fromBuffer(buffer: Buffer)
```

Derive the address from a Buffer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer | buffer | Yes | Buffer to derive address from |

#### Return Value

`string`

### `toBuffer()`

```typescript
public static toBuffer(address: string)
```

Convert address to a Buffer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | address | Yes | Address to convert to buffer |

#### Return Value

`{ addressBuffer: Buffer; addressError?: string }`

### `validate()`

```typescript
public static validate(address: string, networkVersion?: number)
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | address | Yes | Address to validate |
| number | networkVersion | No | Version of the network |

#### Return Value

`boolean`

## Crypto\Identities\Keys

### `fromPassphrase()`

```typescript
public static fromPassphrase(passphrase: string, compressed: boolean = true)
```

Derive the keys from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |
| boolean | compressed | Yes | Compression flag |

#### Return Value

`IKeyPair`

### `fromPrivateKey()`

```typescript
public static fromPrivateKey(privateKey: Buffer | string, compressed: boolean = true)
```

Derive the keys from the given private key.

#### Parameters

| Type | Name | Required | Description |  |
| :--- | :--- | :--- | :--- | :--- |
| Buffer, string | privateKey | Yes | Private Key to derive keys from |  |
| boolean | compressed | Yes | Compression flag |  |

#### Return Value

`IKeyPair`

### `fromWIF()`

```typescript
public static fromWIF(wifKey: string, network?: INetwork)
```

Derive the keys from the given WIF.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | wifKey | Yes | Private key |
| INetwork | network | No | Network |

#### Return Value

`IKeyPair`

## Crypto\Identities\PrivateKey

### `fromPassphrase()`

```typescript
public static fromPassphrase(passphrase: string)
```

Derive the private key for the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`string`

### `fromWIF()`

```typescript
public static fromWIF(wif: string, network?: NetworkType)
```

Create a private key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | wif | Yes | Network WIF |
| NetworkType | network | No | Network |

#### Return Value

`string`

## Crypto\Identities\PublicKey

### `fromPassphrase()`

```typescript
public static fromPassphrase(passphrase: string)
```

Derive the public key from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`string`

### `fromWIF()`

```typescript
public static fromWIF(wif: string, network?: NetworkType)
```

Derive the public key from the given WIF.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | wif | Yes | WIF to derive public key from |
| NetworkType | network | No | Network |

#### Return Value

`string`

### `fromMultiSignatureAsset()`

```typescript
public static fromMultiSignatureAsset(asset: IMultiSignatureAsset)
```

Derive the public key from the given multi signature asset.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IMultiSignatureAsset | asset | Yes | Asset |

#### Return Value

`string`

### `validate()`

```typescript
public static validate(publicKey: string, networkVersion?: number)
```

Validate the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | publicKey | Yes | Public key |
| number | networkVersion | No | Network version |

#### Return Value

`boolean`

## Crypto\Identities\WIF

### `fromPassphrase()`

```typescript
public static fromPassphrase(passphrase: string, network?: INetwork)
```

Derive the WIF from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase to derive WIF from |
| INetwork | network | No | Network wif |

#### Return Value

`string`

### `fromKeys()`

```typescript
public static fromKeys(keys: IKeyPair, network?: INetwork)
```

Derive the WIF from the given keys.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IKeyPair | keys | Yes | Keys |
| INetwork | network | No | Network |

#### Return Value

`string`

## Crypto\Managers\ConfigManager

### `setConfig()`

```typescript
public setConfig(config: INetworkConfig)
```

Set the configuration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| INetworkConfig | config | Yes | Network configuration object |

#### Return Value

`void`

### `setFromPreset()`

```typescript
public setFromPreset(network: NetworkName)
```

Set the configuration from given presets.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| NetworkName | network | Yes | Preset |

#### Return Value

`void`

### `getPreset()`

```typescript
public getPreset(network: NetworkName)
```

Get configuration preset.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| NetworkName | network | Yes | Preset |

#### Return Value

`INetworkConfig`

### `all()`

```typescript
public all()
```

Get all configs.

#### Return Value

`INetworkConfig`

### `set()`

```typescript
public set<T = any>(key: string, value: T)
```

Set a value for the specified network config key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | key | Yes | Key to set |
| T | value | Yes | Value to set |

#### Return Value

`void`

### `get()`

```typescript
public get<T = any>(key: string)
```

Get key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | key | Yes | Key to get |

#### Return Value

`T`

### `setHeight()`

```typescript
public setHeight(value: number)
```

Set network height.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | value | Yes | Network height |

#### Return Value

`void`

### `getHeight()`

```typescript
public getHeight()
```

Get network height.

#### Return Value

`number`

### `isNewMilestone()`

```typescript
public isNewMilestone(height?: number)
```

Verify if current height contains a milestone.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | height | No | Height to check for milestone |

#### Return Value

`boolean`

### `getMilestone()`

```typescript
public getMilestone(height?: number)
```

Get milestone.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | height | No | Network height |

#### Return Value

`{ [key: string]: any }`

### `getMilestones()`

```typescript
public getMilestones()
```

Get all milestones.

#### Return Value

`any`

## Crypto\Managers\NetworkManager

### `all()`

```typescript
public static all()
```

Get settings for all networks.

#### Return Value

`Record<NetworkName, INetworkConfig>`

### `findByName()`

```typescript
public static findByName(name: NetworkName)
```

Get settings for a selected network, default network is devnet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| NetworkName | name | Yes | Network name |

#### Return Value

`INetworkConfig`

## Crypto\Transactions\Deserializer

### `deserialize()`

```typescript
public static deserialize(serialized: string | Buffer, options: IDeserializeOptions = {})
```

Deserialize Transaction into object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string, Buffer | serialized | Yes | Serialized transaction |
| IDeserializeOptions | options | Yes | Options for deserializing |

#### Return Value

`ITransaction`

### `applyV1Compatibility()`

```typescript
public static applyV1Compatibility(transaction: ITransactionData)
```

Modify transaction to be v1 compatible.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction object |

#### Return Value

`void`

## Crypto\Transactions\TransactionFactory

### `fromHex()`

```typescript
public static fromHex(hex: string)
```

Create Transaction object from HEX.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | hex | Yes | HEX of transaction |

#### Return Value

`ITransaction`

### `fromBytes()`

```typescript
public static fromBytes(buffer: Buffer, strict: boolean = true)
```

Create Transaction object from Buffer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer | buffer | Yes | Transaction buffer |
| boolean | strict | Yes | Strict creation from buffer |

#### Return Value

`ITransaction`

### `fromBytesUnsafe()`

```typescript
public static fromBytesUnsafe(buffer: Buffer, id?: string)
```

Create Transaction object from Buffer (unsafe).

NOTE: Only use this internally when it is safe to assume the buffer has already been verified.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Buffer | buffer | Yes | Transaction buffer |
| string | id | No | ID override |

#### Return Value

`ITransaction`

### `fromJson()`

```typescript
public static fromJson(json: ITransactionJson)
```

Create Transaction object from JSON.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionJson | json | Yes | Transaction JSON object |

#### Return Value

`ITransaction`

### `fromData()`

```typescript
public static fromData(data: ITransactionData, strict: boolean = true)
```

Create Transaction object from Transaction data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | data | Yes | Transaction object |
| boolean | strict | Yes | Strict conversion |

#### Return Value

`ITransaction`

## Crypto\Transactions\Serializer

### `getBytes()`

```typescript
public static getBytes(transaction: ITransactionData, options: ISerializeOptions = {})
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction |
| ISerializeOptions | options | Yes | Options |

#### Return Value

`Buffer`

### `serialize()`

```typescript
public static serialize(transaction: ITransaction, options: ISerializeOptions = {})
```

Perform AIP11 compliant serialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransaction | transaction | Yes | Transaction |
| ISerializeOptions | options | Yes | Options |

#### Return Value

`Buffer`

## Crypto\Transactions\Signer

### `sign()`

```typescript
public static sign(transaction: ITransactionData, keys: IKeyPair, options?: ISerializeOptions)
```

Sign the given transaction with the provided keys.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction |
| IKeyPair | keys | Yes | Keys |
| ISerializeOptions | options | No | Options |

#### Return Value

`string`

### `secondSign()`

```typescript
public static secondSign(transaction: ITransactionData, keys: IKeyPair)
```

Second sign the given transaction with the provided keys.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction |
| IKeyPair | keys | Yes | Keys |

#### Return Value

`string`

### `multiSign()`

```typescript
public static multiSign(transaction: ITransactionData, keys: IKeyPair, index: number = -1)
```

Multi sign the given transaction with the provided keys.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction |
| IKeyPair | keys | Yes | Keys |
| number | index | Yes | Index |

#### Return Value

`string`

## Crypto\Transactions\Utils

### `toBytes()`

```typescript
public static toBytes(data: ITransactionData)
```

Convert Transaction object to Buffer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | data | Yes | Transaction object |

#### Return Value

`Buffer`

### `toHash()`

```typescript
public static toHash(transaction: ITransactionData, options?: ISerializeOptions)
```

Convert Transaction object to Hash.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction object |
| ISerializeOptions | options | No | Serialization options for generating hash |

#### Return Value

`Buffer`

### `getId()`

```typescript
public static getId(transaction: ITransactionData, options: ISerializeOptions = {})
```

Get Transaction ID of Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction object |
| ISerializeOptions | options | Yes | Serialization options for generating hash |

#### Return Value

`string`

## Crypto\Transactions\Verifier

### `verify()`

```typescript
public static verify(data: ITransactionData)
```

Verify transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | data | Yes | Transaction object |

#### Return Value

`boolean`

### `verifySecondSignature()`

```typescript
public static verifySecondSignature(transaction: ITransactionData, publicKey: string)
```

Verify second signature.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction object |
| string | publicKey | Yes | Public key |

#### Return Value

`boolean`

### `verifySignatures()`

```typescript
public static verifySignatures(transaction: ITransactionData, multiSignature: IMultiSignatureAsset)
```

Verify the signatures of a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | transaction | Yes | Transaction object |
| IMultiSignatureAsset | multiSignature | Yes | Asset for Multi-Signature wallets/transactions |

#### Return Value

`boolean`

### `verifyHash()`

```typescript
public static verifyHash(data: ITransactionData)
```

Verify transaction hash.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | data | Yes | Transaction |

#### Return Value

`boolean`

### `verifySchema()`

```typescript
public static verifySchema(data: ITransactionData, strict: boolean = true)
```

Verify transaction schema.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | data | Yes | Transaction |
| boolean | strict | Yes | Strict flag |

#### Return Value

`ISchemaValidationResult`

## Crypto\Transactions\Builders\BuilderFactory

### `transfer()`

```typescript
public static transfer()
```

Initiate a Transfer transaction type.

#### Return Value

`TransferBuilder`

### `secondSignature()`

```typescript
public static secondSignature()
```

Initiate a Second Signature transaction type.

#### Return Value

`SecondSignatureBuilder`

### `delegateRegistration()`

```typescript
public static delegateRegistration()
```

Initiate a Delegate Resignation transaction type.

#### Return Value

`DelegateRegistrationBuilder`

### `vote()`

```typescript
public static vote()
```

Initiate a Vote transaction type.

#### Return Value

`VoteBuilder`

### `multiSignature()`

```typescript
public static multiSignature()
```

Initiate a Multi-Signature transaction type.

#### Return Value

`MultiSignatureBuilder`

### `ipfs()`

```typescript
public static ipfs()
```

Initiate an IPFS transaction type.

#### Return Value

`IPFSBuilder`

### `multiPayment()`

```typescript
public static multiPayment()
```

Initiate a Multi-Payment transaction type.

#### Return Value

`MultiPaymentBuilder`

### `delegateResignation()`

```typescript
public static delegateResignation()
```

Initiate a Delegate Resignation transaction type.

#### Return Value

`DelegateResignationBuilder`

### `htlcLock()`

```typescript
public static htlcLock()
```

Initiate a HTLC Lock transaction type.

#### Return Value

`HtlcLockBuilder`

### `htlcClaim()`

```typescript
public static htlcClaim()
```

Initiate a HTLC Claim transaction type.

#### Return Value

`HtlcClaimBuilder`

### `htlcRefund()`

```typescript
public static htlcRefund()
```

Initiate a HTLC Refund transaction type.

#### Return Value

`HtlcRefundBuilder`

## Crypto\Transactions\Builders\Transactions\DelegateRegistrationBuilder

### `usernameAsset()`

```typescript
public usernameAsset(username: string)
```

Set the username to assign.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | username | Yes | Delegate username |

#### Return Value

`DelegateRegistrationBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\DelegateResignationBuilder

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\HtlcClaimBuilder

### `htlcClaimAsset()`

```typescript
public htlcClaimAsset(claimAsset: IHtlcClaimAsset)
```

Specify the HTLC Claim asset data for the Transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IHtlcClaimAsset | claimAsset | Yes | Asset for a HTLC Claim |

#### Return Value

`HtlcClaimBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\HtlcLockBuilder

### `htlcLockAsset()`

```typescript
public htlcLockAsset(lockAsset: IHtlcLockAsset)
```

Specify the HTLC Lock asset data for the Transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IHtlcLockAsset | lockAsset | Yes | Asset for a HTLC Lock |

#### Return Value

`HtlcLockBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\HtlcRefundBuilder

### `htlcRefundAsset()`

```typescript
public htlcRefundAsset(refundAsset: IHtlcRefundAsset)
```

Specify the HTLC Refund asset data for the Transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IHtlcRefundAsset | refundAsset | Yes | Asset for a HTLC Refund |

#### Return Value

`HtlcRefundBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\IPFSBuilder

### `ipfsAsset()`

```typescript
public ipfsAsset(ipfsId: string)
```

Set IPFS asset.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | ipfsId | Yes | IPFS ID |

#### Return Value

`IPFSBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\MultiPaymentBuilder

### `addPayment()`

```typescript
public addPayment(recipientId: string, amount: string)
```

Add a new payment to the collection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | recipientId | Yes | Recipient identifier |
| string | amount | Yes | Transaction amount |

#### Return Value

`MultiPaymentBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\MultiSignatureBuilder

### `participant()`

```typescript
public participant(publicKey: string)
```

Add participant to multi signature transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | publicKey | Yes | Public key |

#### Return Value

`MultiSignatureBuilder`

### `min()`

```typescript
public min(min: number)
```

Set the minimum required signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | min | Yes | Minimum required signatures |

#### Return Value

`MultiSignatureBuilder`

### `multiSignatureAsset()`

```typescript
public multiSignatureAsset(multiSignature: IMultiSignatureAsset)
```

Derive the address from the given multi signature asset.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IMultiSignatureAsset | multiSignature | Yes | Multi signature asset |

#### Return Value

`MultiSignatureBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\SecondSignatureBuilder

### `signatureAsset()`

```typescript
public signatureAsset(secondPassphrase: string)
```

Specify the Second Signature asset data for the Transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | secondPassphrase | Yes | Asset for a Second Signature |

#### Return Value

`SecondSignatureBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\TransferBuilder

### `expiration()`

```typescript
public expiration(expiration: number)
```

Set Transfer expiration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | expiration | Yes | The block-height or time when the transaction should expire |

#### Return Value

`TransferBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Builders\Transactions\VoteBuilder

### `votesAsset()`

```typescript
public votesAsset(votes: string[])
```

Specify the Vote asset data for the Transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | votes | Yes | Asset for a Vote |

#### Return Value

`VoteBuilder`

### `getStruct()`

```typescript
public getStruct()
```

Get transaction structure.

#### Return Value

`ITransactionData`

## Crypto\Transactions\Types\DelegateRegistrationTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Handle the serialization of "delegate registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Handle the deserialization of "delegate registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer |

#### Return Value

`void`

## Crypto\Transactions\Types\DelegateResignationTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `verify()`

```typescript
public verify()
```

Verify transaction.

#### Return Value

`boolean`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Handle the serialization of "delegate resignation" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Handle the deserialization of "delegate resignation" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer |

#### Return Value

`void`

## Crypto\Transactions\Types\TransactionTypeFactory

### `initialize()`

```typescript
public static initialize(transactionTypes: Map<InternalTransactionType, TransactionConstructor>)
```

Initialize new transaction types factory.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | transactionTypes | Yes | INSERT_DESCRIPTION |

### `create()`

```typescript
public static create(data: ITransactionData)
```

Create new transaction type.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ITransactionData | data | Yes | Transaction object |

#### Return Value

`ITransaction`

### `get()`

```typescript
public static get(type: number, typeGroup?: number)
```

Get a transaction type.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | type | Yes | Transaction type |
| number | typeGroup | No | Transaction group |

#### Return Value

`TransactionConstructor`

## Crypto\Transactions\Types\HtlcClaimTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `verify()`

```typescript
public verify()
```

Verify transaction.

#### Return Value

`boolean`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Serialize Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Serialization options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Deserialize into Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer to deserialize |

#### Return Value

`void`

## Crypto\Transactions\Types\HtlcLockTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `verify()`

```typescript
public verify()
```

Verify transaction.

#### Return Value

`boolean`

### `hasVendorField()`

```typescript
public hasVendorField()
```

Verify if the transaction contains a vendorfield.

#### Return Value

`boolean`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Serialize a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Serialization options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Deserialize into a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer to deserialize |

#### Return Value

`void`

## Crypto\Transactions\Types\HtlcRefundTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `verify()`

```typescript
public verify()
```

Verify transaction.

#### Return Value

`boolean`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Serialize a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Serialization options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Deserialize into a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer to deserialize |

#### Return Value

`void`

## Crypto\Transactions\Types\InternalTransactionType

### `from()`

```typescript
public static from(type: number, typeGroup?: number)
```

Create new internal transaction type from existing type.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| number | type | Yes | Transaction type |
| number | typeGroup | No | Transaction group |

#### Return Value

`InternalTransactionType`

### `toString()`

```typescript
public toString()
```

Convert transaction type to a `group/type` string representation (E.g. 1/0)

#### Return Value

`string`

## Crypto\Transactions\Types\IpfsTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `verify()`

```typescript
public verify()
```

Verify transaction.

#### Return Value

`boolean`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Handle the serialization of "IPFS" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Handle the deserialization of "IPFS" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer |

#### Return Value

`void`

## Crypto\Transactions\Types\MultiPaymentTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `verify()`

```typescript
public verify()
```

Verify transaction.

#### Return Value

`boolean`

### `hasVendorField()`

```typescript
public hasVendorField()
```

Verify if the transaction contains a vendorfield.

#### Return Value

`boolean`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Serialize a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Serialization options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Deserialize into a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer to deserialize |

#### Return Value

`void`

## Crypto\Transactions\Types\MultiSignatureRegistrationTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `staticFee()`

```typescript
public static staticFee(feeContext: { height?: number; data?: ITransactionData } = {})
```

Get the static fee for the Multi-Signature transaction type.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| object | feeContext | Yes | Context for determining the static fee |

#### Return Value

`BigNumber`

### `verify()`

```typescript
public verify()
```

Verify transaction.

#### Return Value

`boolean`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Serialize a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Serialization options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Deserialize into a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer to deserialize |

#### Return Value

`void`

## Crypto\Transactions\Types\SecondSignatureRegistrationTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Serialize a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Serialization options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Deserialize into a Transaction object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer to deserialize |

#### Return Value

`void`

## Crypto\Transactions\Types\TransferTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `hasVendorField()`

```typescript
public hasVendorField()
```

Verify if the transaction contains a vendorfield.

#### Return Value

`boolean`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Perform AIP11 compliant serialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Serialization options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer to deserialize |

#### Return Value

`void`

## Crypto\Transactions\Types\VoteTransaction

### `getSchema()`

```typescript
public static getSchema()
```

Get transaction schema.

#### Return Value

`schemas.TransactionSchema`

### `serialize()`

```typescript
public serialize(options?: ISerializeOptions)
```

Perform AIP11 compliant serialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ISerializeOptions | options | No | Serialization options |

#### Return Value

`ByteBuffer`

### `deserialize()`

```typescript
public deserialize(buf: ByteBuffer)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buf | Yes | Buffer to deserialize |

#### Return Value

`void`

## Crypto\Validation\Validator

### `getInstance()`

```typescript
public getInstance()
```

Get an instance of the Validator object.

#### Return Value

`Ajv.Ajv`

### `validate()`

```typescript
public validate<T = any>(schemaKeyRef: string | boolean | object, data: T)
```

Validate a schema object.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string, boolean, object | schemaKeyRef | Yes | Schema to validate against |
| T | data | Yes | Data to validate |

#### Return Value

`ISchemaValidationResult<T>`

### `validateException()`

```typescript
public validateException<T = any>(schemaKeyRef: string | boolean | object, data: T)
```

Validate a schema object for an exception.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string, boolean, object | schemaKeyRef | Yes | Schema to validate against |
| T | data | Yes | Data to validate |

#### Return Value

`ISchemaValidationResult<T>`

### `addFormat()`

```typescript
public addFormat(name: string, format: Ajv.FormatDefinition)
```

Add formatting definition used for validation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | name | Yes | Name of definition |
| Ajv | format | Yes | Format definition |

#### Return Value

`void`

### `addKeyword()`

```typescript
public addKeyword(keyword: string, definition: Ajv.KeywordDefinition)
```

Add keyword definition used for validation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | keyword | Yes | Name of definition |
| Ajv | definition | Yes | Keyword definition |

#### Return Value

`void`

### `addSchema()`

```typescript
public addSchema(schema: object | object[], key?: string)
```

Add schema used for validation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| object | schema | Yes | Name of schema |
| string | key | No | Schema |

#### Return Value

`void`

### `removeKeyword()`

```typescript
public removeKeyword(keyword: string)
```

Remove keyword definition from validation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | keyword | Yes | Name of definition |

#### Return Value

`void`

### `removeSchema()`

```typescript
public removeSchema(schemaKeyRef: string | boolean | object | RegExp)
```

Remove schema from validation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string, boolean, object, RegExp | schemaKeyRef | Yes | Schema to remove |

#### Return Value

`void`

### `extendTransaction()`

```typescript
public extendTransaction(schema: TransactionSchema, remove?: boolean)
```

Extend a Transaction's schema for validation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| TransactionSchema | schema | Yes | Schema of transaction to extend |
| boolean | remove | No | Whether to remove the schema |
