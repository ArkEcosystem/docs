---
title: Examples
---

# Examples

## Transactions

A transaction is an object specifying the transfer of funds from the sender's wallet to the recipient's. Each transaction must be signed by the sender's private key to prove authenticity and origin. After broadcasting through the [client SDK](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/cpp/client/api-documentation/README.md#initialization), a transaction is permanently incorporated in the blockchain by a Delegate Node.

### Sign

The crypto SDK can sign a transaction using your private key or passphrase \(from which the private key is generated\). Ensure you are familiar with [digital signatures](https://en.wikipedia.org/wiki/Digital_signature) before using the crypto SDKs.

```cpp
#include "transactions/transaction.hpp"

Ark::Crypto::transactions::Transaction transaction;

// manually set values
// - transaction.network = 23;
// - transaction.asset.transfer.amount = 100000000ULL;
// - etc

transaction.sign(const std::string &passphrase);
```

Or sign inline using the builder

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::Transfer()
        .network(uint8_t network)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)
        .amount(uint64_t amount)
        .expiration(uint32_t expiration)
        .recipientId(const uint8_t *addressHash)
        .sign(const std::string &passphrase)
        .build();
```

### Serialize \(AIP11\)

> Serialization of a transaction object ensures it is compact and properly formatted to be incorporated in the ARK blockchain. If you are using the crypto SDK in combination with the public API SDK, you should not need to serialize manually.

```cpp
#include "transactions/transaction.hpp"

Ark::Crypto::transactions::Transaction transaction;

// manually set values
// - transaction.network = 23;
// - transaction.asset.transfer.amount = 100000000ULL;
// - etc

std::array<uint8_t> serialized = transaction.serialize();
```

### Deserialize \(AIP11\)

> A serialized transaction may be deserialized for inspection purposes. The public API does not return serialized transactions, so you should only need to deserialize in exceptional circumstances.

```cpp
#include "transactions/transaction.hpp"

Ark::Crypto::transactions::Transaction transaction;

bool wasSuccessful = transaction.deserialize(const std::vector<uint8_t> &serialized);
```

## Message

The crypto SDK not only supports transactions but can also work with other arbitrary data \(expressed as strings\).

### Sign

> Signing a string works much like signing a transaction: in most implementations, the message is hashed, and the resulting hash is signed using the `private key` or `passphrase`.

```cpp
#include "crypto/message.hpp"

const auto text = "Computer science is no more about computers than astronomy is about telescopes.";
const auto passphrase = "bullet parade snow bacon mutual deposit brass floor staff list concert ask";
Ark::Crypto::Message message;
message.sign(text, passphrase);
// bool wasVerified = message.verify();
```

### Verify

> A message's signature can easily be verified by hash, without the private key that signed the message, by using the `verify` method.

```cpp
#include "crypto/message.hpp"

const auto text = "Computer science is no more about computers than astronomy is about telescopes.";
PublicKey publicKey = PublicKey::fromHex("0275776018638e5c40f1b922901e96cac2caa734585ef302b4a2801ee9a338a456");
std::vector<uint8_t> signature = HexToBytes("3044022021704f2adb2e4a10a3ddc1d7d64552b8061c05f6d12a168c69091c75581d611402200edf37689d2786fc690af9f0f6fa1f629c95695039f648a6d455484302402e93");

const auto message = Ark::Crypto::Message(text, publicKey, signature);

message.verify();
```

## Identities

> The identities class allows for the creation and inspection of keypairs from `passphrases`. Here you find vital functions when creating transactions and managing wallets.

### Derive the Address from a Passphrase

```cpp
#include "identities/address.hpp"

const auto passphrase = "this is a top secret passphrase";
const uint8_t networkVersion = 0x1E;
const auto address = Ark::Crypto::Address::fromPassphrase(passphrase, networkVersion);
```

### Derive the Address from a Public Key

```cpp
#include "identities/address.hpp"

Ark::Crypto::PublicKey publicKey("029fdf41a7d69d8efc7b236c21b9509a23d862ea4ed8b13a56e31eee58dbfd97b4");
const uint8_t networkVersion = 0x1E;
const auto address = Ark::Crypto::Address::fromPublicKey(publicKey, networkVersion);
```

### Derive the Address from a Private Key

```cpp
#include "identities/address.hpp"

Ark::Crypto::PrivateKey privateKey("950981ce17df662dbc1d25305f8597a71309fb8f7232203a0944477e2534b021");
const uint8_t networkVersion = 0x1E;
const auto address = Ark::Crypto::Address::fromPrivateKey(privateKey, networkVersion);
```

### Validate an Address

```cpp
#include "identities/address.hpp"

Ark::Crypto::Address address("DStZXkgpEjxbG355nQ26vnkp95p24U9tsV");
bool isValidAddress = Ark::Crypto::Address::validate(address, networkVersion);
```

## Private Key

> As the name implies, private keys and passphrases are to remain private. Never store these unencrypted and minimize access to these secrets

### Derive the Private Key from a Passphrase

```cpp
#include "identities/privatekey.hpp"

const auto passphrase = "this is a top secret passphrase";
const auto privateKey = Ark::Crypto::PrivateKey::fromPassphrase(passphrase);
```

### Derive the Private Key Instance Object from a Hexadecimal Encoded String

```cpp
#include "identities/privatekey.hpp"

const auto privateKey = Ark::Crypto::PrivateKey::fromHex("950981ce17df662dbc1d25305f8597a71309fb8f7232203a0944477e2534b021");
```

### Derive the Private Key from a WIF

```cpp
#include "identities/keys.hpp"

const auto wifString = "SGq4xLgZKCGxs7bjmwnBrWcT4C1ADFEermj846KC97FSv1WFD1dA";
uint8_t outVersion = 0;
const auto privateKey = Ark::Crypto::Identities::Keys::PrivateKey::fromWif(wifString, outVersion);
```

## Public Key

> Public Keys may be freely shared, and are included in transaction objects to validate the authenticity.

### Derive the Public Key from a Passphrase

```cpp
#include "identities/publickey.hpp"

const auto passphrase = "this is a top secret passphrase";
const auto publicKey = PublicKey::fromPassphrase(passphrase);
```

### Derive the Public Key Instance Object from a Hexadecimal Encoded String

```cpp
#include "identities/publickey.hpp"

const auto publicKey = PublicKey::fromHex("029fdf41a7d69d8efc7b236c21b9509a23d862ea4ed8b13a56e31eee58dbfd97b4");
```

## WIF

> The WIF should remain secret, just like your `passphrase` and `private key`.

### Derive the WIF from a Passphrase

```cpp
#include "identities/wif.hpp"

const auto passphrase = "this is a top secret passphrase";
const uint8_t wifVersion = 0xaa;
const auto wif = Ark::Crypto::Identities::Wif::fromPassphrase(passphrase, wifVersion);
```
