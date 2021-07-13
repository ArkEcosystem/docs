---
title: Examples
---

# Examples

## Initialization

```php
use ARKEcosystem\Crypto\Transactions\Builder\Transfer;
```

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/php/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase (from which the private key is generated). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```php
$transaction = Transfer::new()
    ->recipient('DGihocTkwDygiFvmg6aG8jThYTic47GzU9')
    ->amount(1 * 10 ** 8)
    ->vendorField('This is a transaction from PHP')
    ->sign('This is a top secret passphrase');

echo gettype($transaction);

>>> Transfer
```

### Serialize (AIP11)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```php
use ARKEcosystem\Crypto\Transactions\Serializer;

$buffer = Serializer::new($transaction)->serialize();

echo gettype($buffer);

>>> String
```

### Deserialize (AIP11)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```php
use ARKEcosystem\Crypto\Transactions\Deserializer;

$transaction = Deserializer::new($serializedTransaction)->deserialize();

echo gettype($transaction);

>>> ArkTransaction
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data (expressed as strings).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```php
use ARKEcosystem\Crypto\Utils\Message;

$message = Message::sign('Hello World', 'this is a top secret passphrase');

echo gettype($message);

>>> self
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```php
use ARKEcosystem\Crypto\Utils\Message;

$message = Message::new([
    'publickey' => 'validPublicKey',
    'signature' => 'validSignature',
    'message' => 'Hello World'
]);

echo($message->verify() ? 'Valid' : 'Invalid');

>>> 'Valid' | 'Invalid'
```

## Identities

> The identities class allows for the creation and inspection of keyPairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```php
use ARKEcosystem\Crypto\Identities\Address;

$address = Address::fromPassphrase('this is a top secret passphrase');

echo gettype($address);

>>> string
```

### Derive the Address from a Public Key

```php
use ARKEcosystem\Crypto\Identities\Address;

$address = Address::fromPublicKey('validPublicKey');

echo gettype($address);

>>> string
```

### Derive the Address from a Private Key

```php
use ARKEcosystem\Crypto\Identities\Address;

$address = Address::fromPrivateKey('validPrivateKey');

echo gettype($address);

>>> string
```

### Validate an Address

```php
use ARKEcosystem\Crypto\Identities\Address;

$address = Address::validate('validAddress');

echo gettype($address);

>>> bool
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```php
use ARKEcosystem\Crypto\Identities\PrivateKey;

$privateKey = PrivateKey::fromPassphrase('this is a top secret passphrase');

echo gettype($privateKey);

>>> EcPrivateKey
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```php
use ARKEcosystem\Crypto\Identities\PrivateKey;

$privateKey = PrivateKey::fromHex('validHexString');

echo gettype($privateKey);


>>> EcPrivateKey
```

### Derive the Private Key from a WIF

```php
use ARKEcosystem\Crypto\Identities\PrivateKey;

$privateKey = PrivateKey::fromWif('validWif');

echo gettype($privateKey);

>>> EcPrivateKey
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```php
use ARKEcosystem\Crypto\Identities\PublicKey;

$publicKey = PublicKey::fromPassphrase('this is a top secret passphrase');

echo gettype($publicKey);

>>> EcPublicKey
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```php
use ARKEcosystem\Crypto\Identities\PublicKey;

$publicKey = PublicKey::fromHex('validHexString');

echo gettype($publicKey);

>>> EcPublicKey
```

### Validate a Public Key

```php
use ARKEcosystem\Crypto\Identities\PublicKey;

$publicKey = PublicKey::validate('validPublicKey');

echo gettype($publicKey);

>>> EcPublicKey
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```php
use ARKEcosystem\Crypto\Identities\WIF;

$wif = WIF::fromPassphrase('this is a top secret passphrase');

echo gettype($wif);

>>> string
```
