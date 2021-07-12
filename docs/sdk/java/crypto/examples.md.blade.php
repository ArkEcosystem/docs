---
title: Examples
---

# Examples

## Initialization

```java
import org.arkecosystem.crypto.transactions.Transaction;
import org.arkecosystem.crypto.transactions.builder.Transfer;
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/java/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase (from which the private key is generated). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

To learn more about how sequential nonces work go to the following link: [Understanding Transaction Nonce](/docs/core/transactions/understanding-the-nonce)

#### Transfer

```java
Transaction actual = new TransferBuilder()
                .recipient("validAddress")
                .amount(10^8) // amount of arktoshi we want to send
                .nonce("1")
                .vendorField("This is a transaction from Java")
                .sign("this is a top secret passphrase")
                .transaction;
>>> Transfer
```

#### MultiPayment

```java
Transaction actual = new MultiPaymentBuilder()
                .addPayment("validAddress", 10^8)
                .addPayment("validAddress", 10^8)
                .addPayment("validAddress", 10^8)
                .nonce("1")
                .sign("this is a top secret passphrase")
                .transaction;

>>> MultiPayment
```

### Serialize (AIP11)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```java
import org.arkecosystem.crypto.transactions.Serializer;

   byte[] bytes = Serializer.serialize(transaction);
   String serializedHex = Arrays.toString(bytes);

>>> String
```

### Deserialize (AIP11)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```java
import org.arkecosystem.crypto.transactions.Deserializer;

Transaction transaction = new Deserializer("serialized-hex").deserialize();

>>> void
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data (expressed as strings).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```java
import org.arkecosystem.crypto.utils.Message;

Message message = Message.sign("Hello World", "this is a top secret passphrase");

>>> Message
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```java
import org.arkecosystem.crypto.utils.Message;

Message message = Message.sign("Hello World", "this is a top secret passphrase");
System.out.println(message.verify());

>>> boolean
```

## Identities

> The identities class allows for the creation and inspection of keyPairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```java
import org.arkecosystem.crypto.identities.Address;

Address.fromPassphrase("this is a top secret passphrase");

>>> string
```

### Derive the Address from a Public Key

```java
import org.arkecosystem.crypto.identities.Address;

Address.fromPublicKey("validPublicKey");

>>> String
```

### Derive the Address from a Private Key

```java
import org.arkecosystem.crypto.identities.Address;

Address.fromPrivateKey("validPrivateKey");

>>> String
```

### Validate an Address

```java
import org.arkecosystem.crypto.identities.Address;

Address.validate("validAddress");

>>> Boolean
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```java
import org.arkecosystem.crypto.identities.PrivateKey;

PrivateKey.fromPassphrase("this is a top secret passphrase").getPrivateKeyAsHex();

>>> ECKey
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```java
import org.arkecosystem.crypto.identities.PrivateKey;

PrivateKey.fromHex("validHexString").getPrivateKeyAsHex();

>>> ECKey
```

### Derive the Private Key from a WIF

```java
This function has not been implemented in this client library.
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```java
import org.arkecosystem.crypto.identities.PublicKey;

PublicKey.fromPassphrase("this is a top secret passphrase");

>>> String
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```java
This function has not been implemented in this client library.
```

### Validate a Public Key

```java
This function has not been implemented in this client library.
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```java
import org.arkecosystem.crypto.identities.WIF;

WIF.fromPassphrase("this is a top secret passphrase");

>>> String
```
