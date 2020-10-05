---
title: API Documentation
---

# API Documentation

<x-alert type="danger">
WARNING! This package is deprecated and is no longer maintained and supported.
</x-alert>

## ArkEcosystem.Crypto.Configuration.Fee

### `Get()`

```csharp
public static UInt64 Get(int type)
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | type | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`UInt64`

### `Set()`

```csharp
public static void Set(int type, UInt64 value)
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | type | Yes | Transaction type for which we wish to get a fee |
| UInt64 | value | Yes | Fee for a given transaction type |

#### Return Value

`void`

## ArkEcosystem.Crypto.Configuration.Network

### `Set()`

```csharp
public static void Set(INetwork network)
```

Set what network you want to use in the crypto library

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| INetwork | network | Yes | Testnet, Devnet, Mainnet |

#### Return Value

`void`

### `Get()`

```csharp
public static INetwork Get()
```

Get settings for a selected network, default network is devnet

#### Return Value

`INetwork`

## ArkEcosystem.Crypto.Identities.Address

### `FromPassphrase()`

```csharp
public static string FromPassphrase(string passphrase, byte publicKeyHash = 0)
```

Get an address from a passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |
| byte | publicKeyHash | No | Public key hash |

#### Return Value

`string`

### `FromPublicKey()`

```csharp
public static string FromPublicKey(PubKey publicKey, byte publicKeyHash = 0)
```

Get an address from a public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| PubKey | publicKey | Yes | Public key |
| byte | publicKeyHash | No | Public key hash |

#### Return Value

`string`

### `FromPrivateKey()`

```csharp
public static string FromPrivateKey(Key privateKey, byte publicKeyHash = 0)
```

Get an address from a private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Key | privateKey | Yes | Private key |
| byte | publicKeyHash | No | Public key hash |

#### Return Value

`string`

### `Validate()`

```csharp
public static bool Validate(string address, byte publicKeyHash = 0)
```

Validate a given address

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | address | Yes | Address to validate |
| byte | publicKeyHash | No | Public key hash |

#### Return Value

`bool`

## ArkEcosystem.Crypto.Identities.PrivateKey

### `FromPassphrase()`

```csharp
public static Key FromPassphrase(string passphrase)
```

Create PrivateKey object from a given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`Key`

### `FromHex()`

```csharp
public static Key FromHex(string privateKey)
```

Create PrivateKey object from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | privateKey | Yes | Private key |

#### Return Value

`Key`

## ArkEcosystem.Crypto.Identities.PublicKey

### `FromPassphrase()`

```csharp
public static PubKey FromPassphrase(string passphrase)
```

Create PublicKey object from a given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`PubKey`

### `FromHex()`

```csharp
public static PubKey FromHex(string publicKey)
```

Create PublicKey object from a given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | publicKey | Yes | Public key |

#### Return Value

`PubKey`

## ArkEcosystem.Crypto.Identities.WIF

### `FromPassphrase()`

```csharp
public static string FromPassphrase(string passphrase)
```

Get wif from passphrase

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`string`

## ArkEcosystem.Crypto.Networks.Devnet

### `GetEpoch()`

```csharp
public DateTime GetEpoch()
```

Return the epoch date for devnet.

#### Return Value

`DateTime`

### `GetVersion()`

```csharp
public byte GetVersion()
```

Return the version for devnet.

#### Return Value

`byte`

### `GetWIF()`

```csharp
public byte GetWIF()
```

Return the WIF for devnet.

#### Return Value

`byte`

## ArkEcosystem.Crypto.Networks.Mainnet

### `GetEpoch()`

```csharp
public DateTime GetEpoch()
```

Return the epoch date for main net.

#### Return Value

`DateTime`

### `GetVersion()`

```csharp
public byte GetVersion()
```

Return the version for main net.

#### Return Value

`byte`

### `GetWIF()`

```csharp
public byte GetWIF()
```

Return the WIF for main net.

#### Return Value

`byte`

## Crypto.Crypto.Networks.Testnet.Testnet

### `GetEpoch()`

```csharp
public DateTime GetEpoch()
```

Return the epoch date for testnet.

#### Return Value

`DateTime`

### `GetVersion()`

```csharp
public byte GetVersion()
```

Return the version for testnet.

#### Return Value

`byte`

### `GetWIF()`

```csharp
public byte GetWIF()
```

Return the WIF for testnet.

#### Return Value

`byte`

## ArkEcosystem.Crypto.Transactions.Builder.Builder

### `Sign()`

```csharp
public static Transaction Sign(Transaction transaction, string passphrase, string secondPassphrase = null)
```

Builds a transaction for a transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |
| string | passphrase | Yes | Passphrase associated with the account sending this transaction |
| string | secondPassphrase | No | Second passphrase associated with the account sending this transaction |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Builder.DelegateRegistration

### `Create()`

```csharp
public static Transaction Create(string username, string passphrase, string secondPassphrase = null)
```

Builds a transaction for a delegate registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | username | Yes | Username to be associated with the delegate |
| string | passphrase | Yes | Passphrase associated with the account sending this transaction |
| string | secondPassphrase | No | Second passphrase associated with the account sending this transaction |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Builder.MultiSignatureRegistration

### `Create()`

```csharp
public static Transaction Create(int min, int lifetime, List<string> keysgroup, string passphrase, string secondPassphrase)
```

Builds a transaction for a multi signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | min | Yes | Transaction minimum required signatures |
| int | lifetime | Yes | Transaction lifetime |
| List | keysgroup | Yes | Transaction keysgroup |
| string | passphrase | Yes | Passphrase associated with the account sending this transaction |
| string | secondPassphrase | No | Second passphrase associated with the account sending this transaction |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Builder.SecondSignatureRegistration

### `Create()`

```csharp
public static Transaction Create(string passphrase, string secondPassphrase)
```

Builds a transaction for a second signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase associated with the account sending this transaction |
| string | secondPassphrase | No | Second passphrase associated with the account sending this transaction |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Builder.Transfer

### `Create()`

```csharp
public static Transaction Create(string recipientId, ulong amount, string vendorField, string passphrase, string secondPassphrase = null)
```

Builds a transaction for a transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | recipientId | Yes | Recipient identifier |
| ulong | amount | Yes | Transaction amount |
| string | vendorField | Yes | Transaction vendorfield |
| string | passphrase | Yes | Passphrase associated with the account sending this transaction |
| string | secondPassphrase | No | Second passphrase associated with the account sending this transaction |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Builder.Vote

### `Create()`

```csharp
public static Transaction Create(List<string> votes, string passphrase, string secondPassphrase = null)
```

Builds a transaction for a vote.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| List | votes | Yes | Votes |
| string | passphrase | Yes | Passphrase associated with the account sending this transaction |
| string | secondPassphrase | No | Second passphrase associated with the account sending this transaction |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.DelegateRegistration

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "delegate registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.DelegateResignation

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "delegate resignation" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.IPFS

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "IPFS" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.MultiPayment

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "multi payments" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.MultiSignatureRegistration

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "multi signature registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.SecondSignatureRegistration

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "second signature registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.TimelockTransfer

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "timelock transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.Transfer

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Deserializers.Vote

### `Deserialize()`

```csharp
public static Transaction Deserialize(
            BinaryReader reader,
            MemoryStream stream,
            Transaction transaction,
            string serialized,
            int assetOffset
        )
```

Handle the deserialization of "vote" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| MemoryStream | stream | Yes | Stream |
| Transaction | transaction | No | Transaction |
| string | serialized | No | Serialized |
| int | assetOffset | No | Offset |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Serializers.DelegateRegistration

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "delegate registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.DelegateResignation

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "delegate resignation" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.IPFS

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "IPFS" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.MultiPayment

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "multi payments" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.MultiSignatureRegistration

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "multi signature registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.SecondSignatureRegistration

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "second signature registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.TimelockTransfer

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "timelock transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.Transfer

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Serializers.Vote

### `Serialize()`

```csharp
public static void Serialize(BinaryWriter writer, Transaction transaction)
```

Handle the serialization of "vote" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| BinaryReader | reader | Yes | Reader |
| Transaction | transaction | No | Transaction |

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Deserializer

### `Deserializer()`

```csharp
public Deserializer(string serialized)
```

Class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | serialized | Yes | Serialized |

#### Return Value

`Deserializer`

### `Deserialize()`

```csharp
public Transaction Deserialize()
```

Perform AIP11 compliant deserialization.

#### Return Value

`Transaction`

### `HandleHeader()`

```csharp
public Transaction HandleHeader(Transaction transaction)
```

Handle the deserialization of "headers" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`Transaction`

### `HandleType()`

```csharp
Transaction HandleType(Transaction transaction)
```

Handle the deserialization of "type" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`Transaction`

### `HandleVersionOne()`

```csharp
Transaction HandleVersionOne(Transaction transaction)
```

Handle the deserialization of transaction data with a version of 1.0.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`Transaction`

## ArkEcosystem.Crypto.Transactions.Serializer

### `Serializer()`

```csharp
public Serializer(Transaction transaction)
```

Class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`Serializer`

### `Serialize()`

```csharp
public byte[] Serialize()
```

Perform AIP11 compliant serialization.

#### Return Value

`byte[]`

### `HandleHeader()`

```csharp
public void HandleHeader()
```

Handle the serialization of "headers" data.

#### Return Value

`void`

## ArkEcosystem.Crypto.Transactions.Transaction

### `GetId()`

```csharp
public string GetId()
```

Convert the byte representation to a unique identifier.

#### Return Value

`string`

### `Sign()`

```csharp
public string Sign(string passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`string`

### `SecondSign()`

```csharp
public string SecondSign(string passphrase)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`string`

### `Verify()`

```csharp
public bool Verify()
```

Verify the transaction.

#### Return Value

`bool`

### `SecondVerify()`

```csharp
public bool SecondVerify(string secondPublicKey)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | secondPublicKey | Yes | Second public key |

#### Return Value

`bool`

### `ParseSignatures()`

```csharp
public Transaction ParseSignatures(string serialized, int startOffset)
```

Parse the signature, second signature and multi signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | serialized | Yes | Serialized |
| int | startOffset | Yes | Offset |

#### Return Value

`Transaction`

### `ToBytes()`

```csharp
public byte[] ToBytes(bool skipSignature = true, bool skipSecondSignature = true)
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| bool | skipSignature | No | Skip first signature |
| bool | skipSecondSignature | No | Skip second signature |

#### Return Value

`byte[]`

### `Serialize()`

```csharp
public byte[] Serialize()
```

Perform AIP11 compliant serialization.

#### Return Value

`byte[]`

### `Deserialize()`

```csharp
public static Transaction Deserialize(string serialized)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | serialized | Yes | Serialized |

#### Return Value

`Transaction`

### `ToDictionary()`

```csharp
public Dictionary<string, dynamic> ToDictionary()
```

Convert the transaction to its dict representation.

#### Return Value

`Dictionary<string, dynamic>`

### `ToJson()`

```csharp
public string ToJson()
```

Convert the transaction to its JSON representation.

#### Return Value

`string`

## ArkEcosystem.Crypto.Message

### `Message()`

```csharp
public Message(string publicKey, string signature, string message)
```

Create a new message instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | publicKey | Yes | Public Key |
| string | signature | Yes | Signature |
| string | message | Yes | Lessage |

#### Return Value

`Message`

### `Sign()`

```csharp
public static Message Sign(string message, string passphrase)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | message | Yes | Message |
| string | passphrase | Yes | Passphrase |

#### Return Value

`Message`

### `Verify()`

```csharp
public bool Verify()
```

Verify the message contents.

#### Return Value

`bool`

### `ToDictionary()`

```csharp
public Dictionary<string, string> ToDictionary()
```

Convert the message to its dict representation.

#### Return Value

`Dictionary<string, string>`

### `ToJson()`

```csharp
public string ToJson()
```

Convert the message to its JSON representation.

#### Return Value

`string`

## ArkEcosystem.Crypto.Slot

### `GetTime()`

```csharp
public static uint GetTime()
```

Get the time diff between now and network start.

#### Return Value

`uint`

### `GetEpoch()`

```csharp
public static DateTime GetEpoch()
```

Get the network start epoch.

#### Return Value

`DateTime`
