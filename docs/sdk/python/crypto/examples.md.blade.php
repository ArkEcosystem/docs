---
title: Examples
---

# Examples

## Initialization

```python
from crypto.transactions.builder.transfer import Transfer
```

The transaction object used for this section:

```python
tx = {
    'version': int,
    'network': int,
    'type': int,
    'timestamp': int,
    'senderPublicKey', str
    'fee': int,
    'amount': int,
    'expiration': int,
    'recipientId': str,
    'signature': str,
    'id': str
    'serialized': str,
}
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/python/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase \(from which the private key is generated\). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

For serializing and deserializing, we must require the Transaction model:

```python
from crypto.transactions.transaction import Transaction

# Serializing
transaction = Transaction(**tx)
transaction.serialize()

# Deserializing
transaction = Transaction()
transaction.deserialize(**tx['serialized'])
```

Using the Transaction builder class.

```python
transaction = Transfer(recipientId=str, amount=int)
transaction.schnorr_sign('seedPass')
```

### Serialize \(AIP11\)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```python
from crypto.transactions.serializer import Serializer

serialized_transaction = Serializer(tx).serialize()

>>> <class 'str'>
```

### Deserialize \(AIP11\)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```python
from crypto.transactions.deserializer import Deserializer

transaction_data = Deserializer(serialized_data).deserialize()

>>> <class 'crypto.transactions.transaction.Transaction'>
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data \(expressed as strings\).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```python
from crypto.utils.message import Message

message = Message.sign(string, 'validSeedPass')

>>> <class 'crypto.utils.message.Message'>
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```python
from crypto.utils.message import Message

message = Message(
    message=str,
    signature=str,
    public_key=str
)

# Can also be used like this
message = Message(str, 'validSignature', 'validPublicKey')

message.verify()

>>> <class 'bool'>
```

## Identities

> The identities class allows for the creation and inspection of keypairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```python
from crypto.identity.address import address_from_passphrase

address_from_passphrase('validSeedPass')

>>> <class 'str'>
```

### Derive the Address from a Public Key

```python
from crypto.identity.address import address_from_public_key

address_from_public_key('validPublicKey')

>>> <class 'str'>
```

### Derive the Address from a Private Key

```python
from crypto.identity.address import address_from_private_key

address_from_private_key('validPrivateKey')

>>> <class 'str'>
```

### Validate an Address

```python
from crypto.identity.address import validate_address

validate_address('validAddress')

>>> <class 'bool'>
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```python
from crypto.identity.private_key import PrivateKey

private_key = PrivateKey.from_passphrase('validSeedPass').to_hex()

>>> <class 'str'>
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```python
from crypto.identity.private_key import PrivateKey

private_key = PrivateKey.from_hex(str)

>>> <class 'crypto.identity.private_key.PrivateKey'>
```

### Derive the Private Key from a WIF

```python
This function has not been implemented in this client library.
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```python
from crypto.identity.public_key import PublicKey

public_key = PublicKey.from_passphrase('this is a top secret passphrase')

>>> <class 'str'>
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```python
from crypto.identity.public_key import PublicKey

public_key = PublicKey.from_hex(str)

>>> <class 'crypto.identity.public_key.PublicKey'>
```

### Validate a Public Key

```python
This function has not been implemented in this client library.
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```python
from crypto.identity.wif import wif_from_passphrase

wif = wif_from_passphrase('validSeedPass')

>>> <class 'str'>
```
