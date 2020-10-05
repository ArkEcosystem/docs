---
title: API Documentation
---

# API Documentation

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | network | Yes | Network of transaction |

#### Parameters

## org.arkecosystem.crypto.configuration.Fee;

### `get()`

```java
public static long get(Types type)
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Types | type | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`long`

### `set()`

```java
public static void set(Types type, long fee)
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Types | type | Yes | Transaction type for which we wish to set a fee |
| long | fee | Yes | Fee for a given transaction type |

#### Return Value

`void`

## org.arkecosystem.crypto.configuration.Network;

### `set()`

```java
public static void set(INetwork network)
```

Set what network you want to use in the crypto library

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| INetwork | network | Yes | Testnet, Devnet, Mainnet |

#### Return Value

`void`

### `get()`

```java
public static INetwork get()
```

Get settings for a selected network, default network is devnet

#### Return Value

`INetwork`

## org.arkecosystem.crypto.enums.Fees;

### `getValue()`

```java
public Long getValue()
```

Get the fees value.

#### Return Value

`Long`

## org.arkecosystem.crypto.enums.Types;

### `getValue()`

```java
public int getValue()
```

Get the types value.

#### Return Value

`int`

## org.arkecosystem.crypto.identities.Address;

### `fromPublicKey()`

```java
public static String fromPublicKey(String publicKey, Integer networkVersion)
```

Derive the address from the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | publicKey | Yes | Public key |
| Integer | networkVersion | Yes | Version of the network |

#### Return Value

`String`

### `fromPublicKey()`

```java
public static String fromPublicKey(String publicKey)
```

Derive the address from the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | publicKey | Yes | Public key |

#### Return Value

`String`

### `fromPrivateKey()`

```java
public static String fromPrivateKey(ECKey privateKey, Integer networkVersion)
```

Derive the address from the given private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ECKey | privateKey | Yes | Private key |
| Integer | networkVersion | No | Version of the network |

#### Return Value

`String`

### `fromPrivateKey()`

```java
public static String fromPrivateKey(ECKey privateKey)
```

Derive the address from the given private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ECKey | privateKey | Yes | Private key |

#### Return Value

`String`

### `fromPassphrase()`

```java
public static String fromPassphrase(String passphrase, Integer networkVersion)
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |
| Integer | networkVersion | No | Version of the network |

#### Return Value

`String`

### `fromPassphrase()`

```java
public static String fromPassphrase(String passphrase)
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |

#### Return Value

`String`

### `validate()`

```java
public static Boolean validate(String address, Integer networkVersion)
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | address | Yes | Address to validate |
| Integer | networkVersion | Yes | Version of the network |

#### Return Value

`Boolean`

### `validate()`

```java
public static Boolean validate(String address)
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | address | Yes | Address to validate |

#### Return Value

`Boolean`

## org.arkecosystem.crypto.identities.PrivateKey;

### `fromPassphrase()`

```java
public static ECKey fromPassphrase(String passphrase)
```

Derive the private key for the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |

#### Return Value

`ECKey`

### `fromHex()`

```java
public static ECKey fromHex(String privateKey)
```

Create a private key instance from a hex String.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | privateKey | Yes | Hex string |

#### Return Value

`ECKey`

## org.arkecosystem.crypto.identities.PublicKey;

### `fromPassphrase()`

```java
public static String fromPassphrase(String passphrase)
```

Derive the public from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |

#### Return Value

`String`

## org.arkecosystem.crypto.identities.WIF;

### `fromPassphrase()`

```java
public static String fromPassphrase(String passphrase)
```

Derive the WIF from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |

#### Return Value

`String`

## org.arkecosystem.crypto.networks.Devnet;

### `version()`

```java
public int version()
```

Get the epoch time of the start of the Network.

#### Return Value

`int`

### `wif()`

```java
public int wif()
```

Get the epoch time of the start of the Network.

#### Return Value

`int`

### `epoch()`

```java
public String epoch()
```

Get the epoch time of the start of the Network.

#### Return Value

`String`

## org.arkecosystem.crypto.networks.Mainnet;

### `version()`

```java
public int version()
```

Get the epoch time of the start of the Network.

#### Return Value

`int`

### `wif()`

```java
public int wif()
```

Get the epoch time of the start of the Network.

#### Return Value

`int`

### `epoch()`

```java
public String epoch()
```

Get the epoch time of the start of the Network.

#### Return Value

`String`

## org.arkecosystem.crypto.networks.Testnet;

### `version()`

```java
public int version()
```

Get the epoch time of the start of the Network.

#### Return Value

`int`

### `wif()`

```java
public int wif()
```

Get the epoch time of the start of the Network.

#### Return Value

`int`

### `epoch()`

```java
public String epoch()
```

Get the epoch time of the start of the Network.

#### Return Value

`String`

## org.arkecosystem.crypto.transactions.builder.AbstractTransaction;

### `AbstractTransaction()`

```java
public AbstractTransaction()
```

AbstractTransaction class constructor.

### `version()`

```java
public TBuilder version(int version)
```

Sets the version of transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | version | Yes | Version of a transaction |

### `typeGroup()`

```java
public TBuilder typeGroup(int typeGroup)
```

Sets the typeGroup of transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | typeGroup | Yes | TypeGroup of transaction |

### `nonce()`

```java
public TBuilder nonce(long nonce)
```

Sets the nonce of transaction. To see how nonces work, check this guide [Understanding Transaction Nonce](/docs/core/transactions/understanding-transaction-nonce).

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| long | nonce | Yes | Nonce of transaction |

### `network()`

```java
public TBuilder network(int network)
```

Sets the network of a transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | network | Yes | Network of transaction |

### `fee()`

```java
public TBuilder fee(long fee)
```

Sets the fee of transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| long | fee | Yes | Fee of transaction |

### `amount()`

```java
public TBuilder amount(long amount)
```

Sets the amount of transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| long | amount | Yes | Amount of transaction |

### `sign()`

```java
public AbstractTransaction sign(String passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase associated with the account sending this transaction |

#### Return Value

`AbstractTransaction`

### `secondSign()`

```java
public AbstractTransaction secondSign(String passphrase)
```

Sign the transaction using the given second passphrase

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Second passphrase associated with the account sending this transaction |

#### Return Value

`AbstractTransaction`

### `getType()`

```java
abstract int getType()
```

Get the type of the transaction.

### `instance()`

```java
abstract TBuilder instance();
```

Get the instance of the builder.

## org.arkecosystem.crypto.transactions.builder.DelegateRegistration;

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `username()`

```java
public DelegateRegistration username(String username)
```

Set the username to assign.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | username | Yes | Username |

#### Return Value

`DelegateRegistration`

### `instance()`

```java
public DelegateRegistration instance()
```

#### Return Value

`DelegateRegistration`

## org.arkecosystem.crypto.transactions.builder.DelegateResignation;

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public DelegateResignation instance()
```

#### Return Value

`DelegateResignation`

## org.arkecosystem.crypto.transactions.builder.HtlcClaim

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `htlcClaimAsset()`

```java
public HtlcClaim htlcClaimAsset(String lockTransactionId, String unlockSecret)
```

Sets the locks transaction id and unlock secret.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | lockTransactionId | Yes | Lock transaction id |
| String | unlockSecret | Yes | Unlock secret |

#### Return Value

`HtlcClaim`

### `instance()`

```java
public HtlcClaim instance()
```

#### Return Value

`HtlcClaim`

## org.arkecosystem.crypto.transactions.builder.HtlcLock

### `recipientId()`

```java
public HtlcLock recipientId(String recipientId)
```

Sets the recipient id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | recipientId | Yes | Recipient id |

#### Return Value

`HtlcLock`

### `secretHash()`

```java
public HtlcLock secretHash(String secretHash)
```

Sets secret hash.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | secretHash | Yes | Secret hash |

#### Return Value

`HtlcLock`

### `ExpirationType()`

```java
public HtlcLock expirationType(HtlcLockExpirationType expirationType, int expirationValue)
```

Sets the expiration type of htlc lock.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HtlcLockExpirationType | expirationType | Yes | Expiration type |

#### Return Value

`HtlcLock`

### `vendorField()`

```java
public HtlcLock vendorField(String vendorField)
```

Sets the vendor field.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | vendorField | Yes | Transaction vendorfield |

#### Return Value

`HtlcLock`

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public HtlcLock instance()
```

#### Return Value

`HtlcLock`

## org.arkecosystem.crypto.transactions.builder.HtlcRefund;

### `htlcRefundAsset()`

```java
public HtlcRefund htlcRefundAsset(String lockTransactionId)
```

Sets the refund lock transaction id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | lockTransactionId | Yes | Lock transaction id |

#### Return Value

`HtlcRefund`

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public HtlcRefund instance()
```

#### Return Value

`HtlcRefund`

## org.arkecosystem.crypto.transactions.builder.Ipfs;

### `ipfsAsset()`

```java
public AbstractTransactionBuilder ipfsAsset(String ipfsId)
```

Set the ipfs id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | ipfsId | Yes | Ipfs id |

#### Return Value

`Ipfs`

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public Ipfs instance()
```

#### Return Value

`Ipfs`

## org.arkecosystem.crypto.transactions.builder.MultiPayment;

### `addPayment()`

```java
public MultiPayment addPayment(String recipientId, long amount)
```

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | recipientId | Yes | Recipient id |
| long | amount | Yes | Amount |

#### Return value

`MultiPayment`

### `vendorField()`

```java
public HtlcLock vendorField(String vendorField)
```

Sets the vendor field.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | vendorField | Yes | Transaction vendorfield |

#### Return Value

`MultiPayment`

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public MultiPayment instance()
```

#### Return Value

`MultiPayment`

## org.arkecosystem.crypto.transactions.builder.MultiSignatureRegistration;

### `min()`

```java
public MultiSignatureRegistration min(int min)
```

Set the minimum required signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | min | Yes | Minimum required signatures |

#### Return Value

`MultiSignatureRegistration`

### `min()`

```java
public MultiSignatureRegistration min(byte min)
```

Set the minimum required signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | min | Yes | Minimum required signatures |

#### Return Value

`MultiSignatureRegistration`

### `lifetime()`

```java
public MultiSignatureRegistration lifetime(int lifetime)
```

Set the transaction lifetime.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | lifetime | Yes | Transaction lifetime |

#### Return Value

`MultiSignatureRegistration`

### `lifetime()`

```java
public MultiSignatureRegistration lifetime(byte lifetime)
```

Set the transaction lifetime.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| byte | lifetime | Yes | Transaction lifetime |

#### Return Value

`MultiSignatureRegistration`

### `keysGroup()`

```java
public MultiSignatureRegistration keysgroup(List<String> keysgroup)
```

Set the keysgroup of signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| List | keysgroup | Yes | Transaction keysgroup |

#### Return Value

`MultiSignatureRegistration`

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public MultiPayment instance()
```

#### Return Value

`MultiPayment`

## org.arkecosystem.crypto.transactions.builder.SecondSignatureRegistration;

### `signature()`

```java
public SecondSignatureRegistration signature(String signature)
```

Set the signature asset to register the second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | signature | Yes | Signature |

#### Return Value

`SecondSignatureRegistration`

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public SecondSignatureRegistration instance()
```

#### Return Value

`SecondSignatureRegistration`

## org.arkecosystem.crypto.transactions.builder.Transfer;

### `recipient()`

```java
public Transfer recipient(String recipientId)
```

Set the recipient of the transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | recipientId | Yes | Recipient identifier |

#### Return Value

`Transfer`

### `amount()`

```java
public Transfer amount(int amount)
```

Set the amount to transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | amount | Yes | Transaction amount |

#### Return Value

`Transfer`

### `amount()`

```java
public Transfer amount(long amount)
```

Set the amount to transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| long | amount | Yes | Transaction amount |

#### Return Value

`Transfer`

### `vendorField()`

```java
public Transfer vendorField(String vendorField)
```

Set the vendor field / smartbridge.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | vendorField | Yes | Transaction vendorfield |

#### Return Value

`Transfer`

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public Transfer instance()
```

#### Return Value

`Transfer`

## org.arkecosystem.crypto.transactions.builder.Vote;

### `votes()`

```java
public Vote votes(List votes)
```

Set the votes to cast.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| List | votes | Yes | Votes |

#### Return Value

`Vote`

### `sign()`

```java
public Vote sign(String passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |

#### Return Value

`Vote`

### `getType()`

```java
public int getType()
```

Get the type of the transaction.

#### Return Value

`int`

### `instance()`

```java
public Vote instance()
```

#### Return Value

`Vote`

## org.arkecosystem.crypto.transactions.deserializers.AbstractDeserializer;

### `AbstractDeserializer()`

```java
public AbstractDeserializer(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new deserializer instance

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`AbstractDeserializer`

## org.arkecosystem.crypto.transactions.deserializers.DelegateRegistration;

### `DelegateRegistration()`

```java
public DelegateRegistration(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new DelegateRegistration instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "delegate registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.DelegateResignation;

### `DelegateResignation()`

```java
public DelegateResignation(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new DelegateResignation instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "delegate resignation" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.HtlcClaim;

### `HtlcClaim()`

```java
public HtlcClaim(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new HtlcClaim instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "htlc claim" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.HtlcLock;

### `HtlcLock()`

```java
public HtlcLock(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new HtlcLock instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "htlc lock" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.HtlcRefund;

### `HtlcRefund()`

```java
public HtlcRefund(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new HtlcRefund instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "htlc refund" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.Ipfs;

### `Ipfs()`

```java
public Ipfs(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new Ipfs instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "Ipfs" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.MultiPayment;

### `MultiPayment()`

```java
public MultiPayment(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new MultiPayment instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "multi payment" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.MultiSignatureRegistration;

### `MultiSignatureRegistration()`

```java
public MultiSignatureRegistration(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new MultiSignatureRegistration instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "multi signature registration" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.SecondSignatureRegistration;

### `SecondSignatureRegistration()`

```java
public SecondSignatureRegistration(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new SecondSignatureRegistration instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "second signature" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.Transfer;

### `Transfer()`

```java
public Transfer(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new Transfer instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offsets |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.deserializers.Vote;

### `Vote()`

```java
public Vote(String serialized, ByteBuffer buffer, Transaction transaction)
```

Create a new Vote instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `deserialize()`

```java
public void deserialize(int assetOffset)
```

Handle the deserialization of "vote" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.AbstractSerializer;

### `AbstractSerializer()`

```java
public AbstractSerializer(ByteBuffer buffer, Transaction transaction)
```

Create a new AbstractSerializer instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

## org.arkecosystem.crypto.transactions.serializers.DelegateRegistration;

### `DelegateRegistration()`

```java
public DelegateRegistration(ByteBuffer buffer, Transaction transaction)
```

Create a new DelegateRegistration instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "delegate registration" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.DelegateResignation;

### `DelegateResignation()`

```java
public DelegateResignation(ByteBuffer buffer, Transaction transaction)
```

Create a new DelegateResignation instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "delegate resignation" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.HtlcClaim;

### `HtlcClaim()`

```java
public HtlcClaim(ByteBuffer buffer, Transaction transaction)
```

Create a new HtlcClaim instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "htlc claim" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.HtlcLock;

### `HtlcLock()`

```java
public HtlcLock(ByteBuffer buffer, Transaction transaction)
```

Create a new HtlcLock instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "htlc lock" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.HtlcRefund;

### `HtlcRefund()`

```java
public HtlcRefund(ByteBuffer buffer, Transaction transaction)
```

Create a new HtlcRefund instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "htlc refund" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.Ipfs;

### `Ipfs()`

```java
public Ipfs(ByteBuffer buffer, Transaction transaction)
```

Create a new Ipfs instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "ipfs" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.MultiPayment;

### `MultiPayment()`

```java
public MultiPayment(ByteBuffer buffer, Transaction transaction)
```

Create a new MultiPayment instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "multi payment" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.MultiSignatureRegistration;

### `MultiSignatureRegistration`

```java
public MultiSignatureRegistration(ByteBuffer buffer, Transaction transaction)
```

Create a new MultiSignatureRegistration instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public function serialize()
```

Handle the serialization of "multi signature registration" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.SecondSignatureRegistration;

### `SecondSignatureRegistration`

```java
public SecondSignatureRegistration(ByteBuffer buffer, Transaction transaction)
```

Create a new SecondSignatureRegistration instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "second signature registration" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.Transfer;

### `Transfer`

```java
public Transfer(ByteBuffer buffer, Transaction transaction)
```

Create a new Transfer instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "transfer" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.serializers.Vote;

### `Vote`

```java
public Vote(ByteBuffer buffer, Transaction transaction)
```

Create a new Vote instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ByteBuffer | buffer | Yes | Buffer |
| Transaction | transaction | Yes | Transaction |

### `serialize`

```java
public void serialize()
```

Handle the serialization of "vote" data.

#### Return Value

`void`

## org.arkecosystem.crypto.transactions.Deserializer;

### `deserialize`

```java
public Transaction deserialize(String serialized)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |

#### Return Value

`Transaction`

## org.arkecosystem.crypto.transactions.Serializer;

### `serialize()`

```java
public byte[] serialize(Transaction transaction)
```

Perform AIP11 compliant serialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Transaction | transaction | Yes | Transaction |

#### Return Value

`byte[]`

## org.arkecosystem.crypto.transactions.Transaction;

### `computeId()`

```java
public String computeId()
```

Convert the byte representation to a unique identifier.

#### Return Value

`String`

### `sign()`

```java
public Transaction sign(String passphrase)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Passphrase |

#### Return Value

`Transaction`

### `secondSign()`

```java
public Transaction secondSign(String passphrase)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | passphrase | Yes | Second passphrase |

#### Return Value

`Transaction`

### `verify()`

```java
public boolean verify()
```

Verify the transaction.

#### Return Value

`boolean`

### `secondVerify()`

```java
public boolean secondVerify(String secondPublicKey)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | secondPublicKey | Yes | Second public key |

#### Return Value

`boolean`

### `parseSignatures()`

```java
public Transaction parseSignatures(String serialized, int startOffset)
```

Parse the signature, second signature and multi signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |
| int | startOffset | Yes | Offset |

#### Return Value

`Transaction`

### `toHashMap()`

```java
public HashMap toHashMap()
```

Convert the transaction to its hashmap representation.

#### Return Value

`HashMap`

### `toJson()`

```java
public String toJson()
```

Convert the transaction to its JSON representation.

#### Return Value

`String`

### `serialize()`

```java
public String serialize()
```

Perform AIP11 compliant serialization

#### Return Value

`String`

### `deserialize()`

```java
public static Transaction deserialize(String serialized)
```

Perform AIP11 compliant deserialization.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | serialized | Yes | Serialized |

#### Return Value

`Transaction`

## org.arkecosystem.crypto.utils.Message;

### `Message()`

```java
public Message(String publickey, String signature, String message)
```

Create a new message instance

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | publickey | Yes | Public key |
| String | signature | Yes | Signature |
| String | message | Yes | Message |

#### Return Value

`Message`

### `sign()`

```java
public static Message sign(String message, String passphrase)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | message | Yes | Message |
| String | passphrase | Yes | Passphrase |

#### Return Value

`Message`

### `verify()`

```java
public boolean verify()
```

Verify the message contents

#### Return Value

`boolean`

### `toMap()`

```java
public Map toMap()
```

Convert the message to its map representation

#### Return Value

`array`

### `toJson()`

```java
public String toJson()
```

Convert the message to its JSON representation

#### Return Value

`String`

### `getMessage()`

```java
public String getMessage()
```

Get the message content from the message object.

#### Return Value

`String`

### `getPublickey()`

```java
public String getPublickey()
```

Get the public key from the message.

#### Return Value

`String`

### `getSignature()`

```java
public String getSignature()
```

Get the signature from the message.

#### Return Value

`String`

## org.arkecosystem.crypto.utils.Slot;

### `time()`

```java
public static int time()
```

Get the time diff between now and network start.

#### Return Value

`int`

### `epoch()`

```java
public static long epoch()
```

Get the network start epoch.

#### Return Value

`long`
