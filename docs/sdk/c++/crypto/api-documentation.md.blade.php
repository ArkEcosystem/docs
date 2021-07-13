---
title: API Documentation
---

# API Documentation

* ARK C++ Crypto v1.1.0

## Ark::Crypto::Configuration

### `Configuration()`

```cpp
// default: Devnet

#include "common/configuration.hpp"

Ark::Crypto::Configuration config;
```

```cpp
#include "common/configuration.hpp"

Ark::Crypto::Configuration config(const Network &network);
```

```cpp
#include "common/configuration.hpp"

Ark::Crypto::Configuration config(const FeePolicy &policy);
```

```cpp
#include "common/configuration.hpp"

Ark::Crypto::Configuration config(const Network &network, const FeePolicy &policy);
```

Create a network configuration

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const Network& | network | no | Network configuration |
| const FeePolicy& | policy | no | Fee Policy for a the provided network |

#### Return Value

`void`

### `getFee()`

```cpp
// Default: Devnet

#include "common/configuration.hpp"

Ark::Crypto::Configuration config;
uint64_t fee = config.getFee(uint16_t type);
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint16_t | type | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`uint64_t`

### `setFee()`

```cpp
Ark::Crypto::Configuration config;
config.setFee(uint16_t type, uint64_t fee);
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint16_t | type | Yes | Transaction type for which we wish to set a fee |
| uint64_t | fee | Yes | Fee for a given transaction type |

#### Return Value

`void`

### `setNetwork()`

```cpp
Ark::Crypto::Configuration config;
config.setNetwork(const Ark::Crypto::Network &network);
```

Set what network you want to use in the crypto library

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Network& | network | Yes | Testnet, Devnet, Mainnet, Custom |

#### Return Value

`void`

### `getNetwork()`

```cpp
Ark::Crypto::Configuration config;
config.getNetwork();
```

Get settings for a selected network, default network is devnet

#### Return Value

`Ark::Crypto::Network`

## Ark::Crypto::Message

```cpp
class Message {
  public:
    std::string                 message;
    std::array<uint8_t, 32>     publicKey;
    std::vector<uint8_t>        signature;
};
```

Message data structure

### `Message()`

```cpp
#include "crypto/message.hpp"

Ark::Crypto::Utils::Message message;
```

Create a new empty message instance to be created and signed `Message()`

```cpp
#include "crypto/message.hpp"

Ark::Crypto::Utils::Message message(std::string message, const uint8_t *publicKeyBytes, const uint8_t *signature);
```

Create a new message instance ready for verification

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| std::string | message | Yes | Message to sign |
| const uint8_t\* | publicKeyBytes | Yes | Public key bytes _**(uint8_t[33])**_ |
| const uint8_t\* | signature | Yes | Signature bytes _**(uint8_t[32])**_ |

### `sign()`

```cpp
#include "crypto/message.hpp"

Ark::Crypto::Message message;

bool isValidMessage = message.sign(const std::string& message, const std::string &passphrase);
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::string& | message | Yes | Message |
| const std::string& | passphrase | Yes | Passphrase |

#### Return Value

`bool`

### `verify()`

```cpp
#include "crypto/message.hpp"

bool isValidMessage = message.verify();
```

Verify the message contents

#### Return Value

`bool`

### `toMap()`

```cpp
#include "crypto/message.hpp"

std::map<std::string, std::string> messageMap = message.toMap();
```

Convert the message to its string-map representation

#### Return Value

`std::map<std::string, std::string>`

### `toJson()`

```cpp
#include "crypto/message.hpp"

std::string messageJsonString = message.toJson();
```

Convert the message to its JSON representation

#### Return Value

`std::string`

## Ark::Crypto::Slot

### `epoch()`

```cpp
#include "crypto/slot.hpp"

uint64_t epoch = Ark::Crypto::Slot::epoch(const Ark::Crypto::Network &network);
```

Get the network start epoch.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const Network& | network | Yes | Network |

#### Return Value

`uint64_t`

### `time()`

```cpp
#include "crypto/slot.hpp"

uint64_t time = Ark::Crypto::Slot::time(const Ark::Crypto::Network &network)
```

Get the time diff between now and network start.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const Network& | network | Yes | Network |

#### Return Value

`uint64_t`

## Ark::Crypto::Identities::Address

### `Address()` (const char\*)

```cpp
#include "identities/address.hpp"

Ark::Crypto::Identities::Address address(const char *addressString);
```

Constructor of the Address class.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | addressString | Yes | Valid address string |

### `Address()` (PubKeyHash, uint8_t)

```cpp
#include "identities/address.hpp"

Ark::Crypto::Identities::Address address(const PubkeyHash &pubkeyHash, uint8_t version);
```

Constructor of the Address class.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const PubkeyHash& | pubkeyHash | Yes | Valid PubkeyHash _**(std::array)**_ |
| uint8_t | version | Yes | Network version-byte |

### `version()`

```cpp
#include "identities/address.hpp"

Ark::Crypto::Identities::Address address(const char *addressString);
uint8_t version = address.version()
```

Get the network version of an address.

#### Return Value

`uint8_t`

### `toBytes()`

```cpp
#include "identities/address.hpp"

Ark::Crypto::Identities::Address address(const char *addressString);
const auto pubKeyHash = address.toBytes()
```

Convert the address to its pubKey hash.

#### Return Value

`PubkeyHash`

### `toString()`

```cpp
#include "identities/address.hpp"

Ark::Crypto::Identities::Address address(const PubkeyHash &pubkeyHash, uint8_t version);
std::string addressString = address.toString();
```

Convert the address to its string representation.

#### Return Value

`std::string`

### `fromPublicKey()`

```cpp
#include "identities/address.hpp"

const auto address = Ark::Crypto::Identities::Address::fromPublicKey(const uint8_t *publicKeyBytes, uint8_t version);
```

Derive the address from the given public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const uint8_t\* | publicKeyBytes | Yes | Public key bytes (_**uint8_t[33]**_) |
| uint8_t | version | Yes | Version of the network |

#### Return Value

`Ark::Crypto::Identities::Address`

### `fromPrivateKey()`

```cpp
#include "identities/address.hpp"

const auto address = Ark::Crypto::Identities::Address::fromPrivateKey(const uint8_t *privateKeyBytes, uint8_t version);
```

Derive the address from the given private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const uint8_t\* | privateKeyBytes | Yes | Private key bytes (_**uint8_t[32]**_) |
| uint8_t | version | Yes | Version of the network |

#### Return Value

`Ark::Crypto::Identities::Address`

### `fromPassphrase()`

```cpp
#include "identities/address.hpp"

const auto address = Ark::Crypto::Identities::Address::fromPassphrase(const char *passphrase, uint8_t version);
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | passphrase | Yes | 12-word passphrase |
| uint8_t | version | Yes | Version of the network |

#### Return Value

`Ark::Crypto::Identities::Address`

### `validate()`

```cpp
#include "identities/address.hpp"

bool isValidAddress = Ark::Crypto::Identities::Address::validate(const Address &address, uint8_t version);
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const Address& | address | Yes | Address to validate |
| uint8_t | networkVersion | Yes | Version of the network |

#### Return Value

`bool`

### `validate()` (const char\*, uint8_t)

```cpp
#include "identities/address.hpp"

bool Ark::Crypto::Identities::Address::validate(const char *const addressStr, uint8_t networkVersion);
```

Validate the given Address string to the network version.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | addressStr | Yes | Address to validate |
| uint8_t | networkVersion | Yes | Version of the network |

#### Return Value

`bool`

### `validate()` (uint8_t\*, uint8_t)

```cpp
#include "identities/address.hpp"

bool Ark::Crypto::Identities::Address::validate(const uint8_t *addressBytes, uint8_t networkVersion);
```

Validate the given Address bytes to the network version.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t\* | addressBytes | Yes | Address to validate |
| uint8_t | networkVersion | Yes | Version of the network |

#### Return Value

`bool`

## Ark::Crypto::Identities::Keys

```cpp
struct KeyPair {
    std::array<uint8_t, 32>     privateKey  { };
    std::array<uint8_t, 33>     publicKey   { };
};
```

### `fromPassphrase()`

```cpp
#include "identities/keys.hpp"

const KeyPair keys = Ark::Crypto::Identities::PrivateKey::fromPassphrase(const char *passphrase);
```

Create a key-pair instance from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | passphrase | Yes | Passphrase |

#### Return Value

`Ark::Crypto::KeyPair`

### `fromPrivateKey()`

```cpp
#include "identities/keys.hpp"

const KeyPair keys = Ark::Crypto::Identities::PrivateKey::fromPrivateKey(const uint8_t *privateKeyBytes);
```

Create a key-pair instance from privateKey bytes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const uint8_t\* | privateKeyBytes | Yes | Private Key bytes _**(uint8_t[32])**_ |

#### Return Value

`Ark::Crypto::KeyPair`

### `fromWif()`

```cpp
#include "identities/keys.hpp"

const KeyPair keys = Ark::Crypto::Identities::PrivateKey::fromWif(const char *wif);
```

Create a key-pair instance from privateKey bytes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | wif | Yes | WIF string |

#### Return Value

`Ark::Crypto::KeyPair`

### `PrivateKey::fromPassphrase()`

```cpp
#include "identities/keys.hpp"

const PrivateKeyBytes privateKeyBytes = Ark::Crypto::Identities::Keys::PrivateKey::fromPassphrase(const char *passphrase);
```

Generate PrivateKey bytes from a given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | passphrase | Yes | Passphrase |

#### Return Value

`Ark::Crypto::PrivateKeyBytes`

### `PrivateKey::fromWif()`

```cpp
#include "identities/keys.hpp"

const PrivateKeyBytes privateKeyBytes = Ark::Crypto::Identities::Keys::PrivateKey::fromWif(const char *wif, uint8_t *outVersion);
```

Generate PrivateKey bytes and the network version from a given wif string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | wif | Yes | Wif string |
| uint8_t\* | outVersion | Yes | output Wif version |

#### Return Value

`Ark::Crypto::PrivateKeyBytes`

### `PublicKey::fromPrivateKey()`

```cpp
#include "identities/keys.hpp"

const PublicKeyBytes publicKeyBytes = Ark::Crypto::Identities::Keys::PublicKey::fromPrivatekey(const uint8_t *privateKeyBytes);
```

Generate PublicKey bytes PrivateKey bytes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const uint8_t\* | privateKeyBytes | Yes | Private Key bytes _**(uint8_t[32])**_ |

#### Return Value

`Ark::Crypto::PublicKeyBytes`

## Ark::Crypto::Identities::PrivateKey

### `PrivateKey()`

```cpp
#include "identities/privatekey.hpp"

Ark::Crypto::Identities::PrivateKey privateKey(const PrivateKeyBytes &privateKeyBytes);
```

Constructor of the Private Key class.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const PrivateKeyBytes& | privateKeyBytes | Yes | Private Key _**(std::array)**_ |

### `toBytes()`

```cpp
#include "identities/privatekey.hpp"

Ark::Crypto::Identities::Privatekey privateKey(const PrivateKeyBytes &privateKeyBytes);
const auto privateKeyBytes = privateKey.toBytes()
```

Convert the private key to its bytes representation.

#### Return Value

`PrivateKeyBytes`

### `toString()`

```cpp
#include "identities/privatekey.hpp"

Ark::Crypto::Identities::Privatekey privateKey(const PrivateKeyBytes &privateKeyBytes);
const auto privateKeyString = privateKey.toString()
```

Convert the private key to its string representation.

#### Return Value

`std::string`

### `fromPassphrase()`

```cpp
#include "identities/privatekey.hpp"

const auto privateKey = Ark::Crypto::Identities::PrivateKey::fromPassphrase(const char *passphrase);
```

Derive the private key for the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | passphrase | Yes | Passphrase |

#### Return Value

`Ark::Crypto::Identities::PrivateKey`

### `fromHex()`

```cpp
#include "identities/privatekey.hpp"

const auto privateKey = Ark::Crypto::Identities::PrivateKey::fromHex(const char *privateKeyHex);
```

Create a private key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | privateKeyHex | Yes | Private key hex-string |

#### Return Value

`Ark::Crypto::Identities::PrivateKey`

## Ark::Crypto::Identities::PublicKey

### `PublicKey()`

```cpp
#include "identities/publickey.hpp"

Ark::Crypto::Identities::PublicKey publicKey(const PublicKeyBytes &publicKeyBytes);
```

Constructor of the Public Key class.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const PublicKeyBytes& | publicKeyBytes | Yes | Public Key bytes _**(std::array)**_ |

### `toBytes()`

```cpp
#include "identities/publickey.hpp"

const PublicKeyBytes publicKeyBytes = publicKey.toBytes();
```

Convert the public key to its byte representation.

#### Return Value

`Ark::Crypto:PublicKeyBytes`

### `toString()`

```cpp
#include "identities/publickey.hpp"

std::string publicKeyString = publicKey::toString();
```

Convert the public key to its string representation.

#### Return Value

`std::string`

### `fromPassphrase()`

```cpp
#include "identities/publickey.hpp"

const auto publicKey = Ark::Crypto::Identities::PublicKey::fromPassphrase(const char *passphrase);
```

Derive the public from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | passphrase | Yes | Passphrase |

#### Return Value

`Ark::Crypto::Identities::PublicKey`

### `fromHex()`

```cpp
#include "identities/publickey.hpp"

const auto publicKey = Ark::Crypto::Identities::PublicKey::fromHex(const char *publicKeyHex);
```

Create a public key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | publicKeyHex | Yes | Public key hex-string |

#### Return Value

`Ark::Crypto::Identities::PublicKey`

## Ark::Crypto::Identities::Wif

### `Wif()` (PrivateKeyBytes, uint8_t)

```cpp
#include "identities/wif.hpp"

Ark::Crypto::Identities::Wif wif(const PrivateKeyBytes &privateKeyBytes, uint8_t version);
```

Constructor of the Wif class.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const PrivateKeyBytes& | privateKeyBytes | Yes | Private Key bytes _**(std::array)**_ |
| uint8_t | version | Yes | Network Wif version |

### `Wif()` (const char\*)

```cpp
#include "identities/wif.hpp"

Ark::Crypto::Identities::Wif wif(const char *wif);
```

Constructor of the Wif class.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | wif | Yes | Network WIF string |

### `version()`

```cpp
#include "identities/wif.hpp"

const uint8_t version = wif.version();
```

Get the network version of the Wif.

#### Return Value

`uint8_t`

### `toBytes()`

```cpp
#include "identities/wif.hpp"

const PrivateKeyBytes privateKeyBytes = wif.toBytes();
```

Convert the Wif to a PrivateKeyBytes representation.

#### Return Value

`Ark::Crypto::PrivateKeyBytes`

### `toString()`

```cpp
#include "identities/wif.hpp"

std::string wifString = wif.toString();
```

Convert the Wif to its string representation.

#### Return Value

`std::string`

### `fromPassphrase()`

```cpp
#include "identities/wif.hpp"

const auto wif = Ark::Crypto::Identities::Wif::fromPassphrase(const char *passphrase, uint8_t version);
```

Derive the Wif from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* | passphrase | Yes | Passphrase |
| uint8_t | version | Yes | Network WIF version |

#### Return Value

`Ark::Crypto::Identities::Wif`

## Ark::Crypto::Network

```cpp
struct Ark::Crypto::Network {
    std::string     nethash;
    uint8_t         slip44;
    uint8_t         wif;
    uint8_t         version;
    std::string     epoch;
};
```

Network data structure

### `Network()`

```cpp
#include "common/network.hpp"

const Ark::Crypto::Network CustomNetwork {
    "16c891512149d6d3ff1b70e65900936140bf853a4ae79b5515157981dcc706df",
    1, 0x53, 0xaa,
    "2019-04-12T13:00:00.000Z"
};
```

Create a network instance

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| std::string | nethash | Yes | Nethash |
| uint8_t | slip44 | Yes | Slip44 index |
| uint8_t | wif | Yes | Wif version |
| uint8_t | version | Yes | Network version |
| std::string | epoch | Yes | Network epoch |

## Ark::Crypto::transactions::Builder

### `Transfer()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::Transfer(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .vendorField(const std::string& vendorField)
        .vendorFieldHex(const uint8_t *vendorField, const size_t &length)

        .amount(uint64_t amount)
        .expiration(uint32_t expiration)
        .recipientId(const uint8_t *addressHash)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)
        .secondSign(const std::string& secondPassphrase)

        .build();
```

Build a Transfer Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| const std::string& | vendorField | No | Transaction vendorfield |
| const uint8_t\*, const size_t& | vendorFieldHex | No | Transaction vendorfield hex |
|  |  |  |  |
| uint64_t | amount | Yes | Transfer amount |
| uint32_t | expiration | Yes | Transfer expiration |
| const uint8_t\* | recipientId | Yes | Transfer recipient address hash _**(uint8_t[1 + 20])**_ |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature¹ | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
| const std::string& | secondSign | No | Second passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

#### Return Value

`Transaction`

### `SecondSignature()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::SecondSignature(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .publicKey(const uint8_t *secondPublicKey)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)

        .build();
```

Build a Second Signature Registration Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| const uint8_t\* | publicKey | Yes | Second PublicKey _**(uint8_t[33])**_ |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

#### Return Value

`Transaction`

### `DelegateRegistration()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::DelegateRegistration(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .username(const uint8_t *username, const size_t &length)
        .username(const std::string &username)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)
        .secondSign(const std::string& secondPassphrase)

        .build();
```

Build a Delegate Registration Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| const uint8_t\*, const size_t &length | username | _Yes_ | Delegate Username from bytes and length |
| const std::string& | username | _Yes_ | Delegate Username from a string |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
| const std::string& | secondSign | No | Second passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

#### Return Value

`Transaction`

### `Vote()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::Vote(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .votes(const uint8_t *votes)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)
        .secondSign(const std::string& secondPassphrase)

        .build();
```

Build a Vote Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| const uint8_t\* | votes | Yes | Vote-bytes¹ |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
| const std::string& | secondSign | No | Second passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

¹ _(`uint8_t votes[] = { count,`0x00(-)`|`0x01(+)`, publicKey, ..., ... };` )_

#### Return Value

`Transaction`

### `Ipfs()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::Ipfs(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .ipfs(const uint8_t *ipfsHash, const size_t &length)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)
        .secondSign(const std::string& secondPassphrase)

        .build();
```

Build an Ipfs Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| const uint8_t\*, const size_t& | ipfs | Yes | Ipfs hash-bytes |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
| const std::string& | secondSign | No | Second passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

#### Return Value

`Transaction`

### `MultiPayment()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::MultiPayment(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .n_payments(uint16_t n_payments)
        .amounts(const std::vector<uint64_t> &amounts)
        .addresses(const std::vector<std::array<uint8_t, 21> > &addresses)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)
        .secondSign(const std::string& secondPassphrase)

        .build();
```

Build a MultiPayment Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| uint16_t | n_payments | Yes | Number of Payments |
| const std::vector | amounts | Yes | Vector of amounts for `payments[i]` |
| const std::vector &gt; | addresses | Yes | Vector of Address Hashes for `payments[i]`¹ |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
| const std::string& | secondSign | No | Second passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

¹ _(Address Hash: `uint8_t[1 + 20] | { networkVersion, PubkeyHash }` )_

#### Return Value

`Transaction`

### `HtlcLock()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::HtlcLock(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .amount(uint64_t amount)
        .secretHash(const uint8_t *secretHash)
        .expirationType(uint8_t expirationType)
        .expiration(uint32_t expiration)
        .recipientId(const uint8_t *addressHash)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)
        .secondSign(const std::string& secondPassphrase)

        .build();
```

Build an Htlc Lock Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| uint64_t | amount | Yes | Htlc Lock amount |
| const uint8_t\* | amount | Yes | Htlc Lock Secret hash _**(uint8_t[32])**_ |
| uint8_t | expirationType | Yes | Htlc Lock Expiration Type |
| uint32_t | expiration | Yes | Htlc Lock Expiration |
| const uint8_t\* | recipientId | Yes | Htlc Lock recipient address hash _**(uint8_t[1 + 20])**_ |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
| const std::string& | secondSign | No | Second passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

#### Return Value

`Transaction`

### `HtlcClaim()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::HtlcClaim(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .lockTransactionId(const uint8_t *lockTransactionId)
        .unlockSecret(const uint8_t *unlockSecret)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)
        .secondSign(const std::string& secondPassphrase)

        .build();
```

Build an Htlc Claim Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| const uint8_t\* | lockTransactionId | Yes | TransactionId of the Htlc Lock Transaction _**(uint8_t[32])**_ |
| const uint8_t\* | unlockSecret | Yes | Htlc Claim Unlock Secret _**(uint8_t[32])**_ |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
| const std::string& | secondSign | No | Second passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

#### Return Value

`Transaction`

### `HtlcRefund()`

```cpp
#include "transactions/builders/builder.hpp"

const auto transaction = builder::HtlcRefund(const Configuration &config = {})
        .version(uint8_t version)
        .network(uint8_t network)
        .typeGroup(uint16_t typeGroup)
        .type(uint16_t type)
        .nonce(uint64_t nonce)
        .senderPublicKey(const uint8_t *senderPublicKey)
        .fee(uint64_t fee)

        .lockTransactionId(const uint8_t *lockTransactionId)

        .signature(const uint8_t *signature, const size_t &length)
        .secondSignature(const uint8_t *secondSignature, const size_t &length)

        .sign(const std::string& passphrase)
        .secondSign(const std::string& secondPassphrase)

        .build();
```

Build an Htlc Claim Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| uint8_t | version | No | Transaction version |
| uint8_t | network | No | Network version |
| uint16_t | typeGroup | No | Transaction Type-Group |
| uint16_t | type | No | Transaction Type |
| uint64_t | nonce | Yes | Transaction (Sequential) Nonce |
| const uint8_t\* | senderPublicKey | No | Sender PublicKey |
| uint64_t | fee | No | Transaction fee |
|  |  |  |  |
| const uint8_t\* | lockTransactionId | Yes | TransactionId of the Htlc Lock Transaction _**(uint8_t[32])**_ |
|  |  |  |  |
| const uint8_t\*, const size_t& | signature | No | Transaction Signature |
| const uint8_t\*, const size_t& | secondSignature | No | Transaction Second Signature |
|  |  |  |  |
| const std::string& | sign | No | Passphrase |
| const std::string& | secondSign | No | Second passphrase |
|  |  |  |  |
| const Configuration& | build | Yes | Finish the builder process |

#### Return Value

`Transaction`

## Ark::Crypto::transactions::Transaction

### `TransactionData()`

```cpp
struct TransactionData {
    uint8_t                     header              { 0xff };
    uint8_t                     version             { 2 };
    uint8_t                     network             { 30 };

    uint32_t                    typeGroup           { 1 };   // v2
    uint16_t                    type                { 0 };   // v1: 1 Byte | v2: 2 Bytes

    uint64_t                    nonce               { 0 };   // v2 only
    uint32_t                    timestamp           { 0 };    // v1 only

    std::array<uint8_t, 33>     senderPublicKey     { };

    uint64_t                    fee                 { 0 };

    std::vector<uint8_t>        vendorField;

    Asset                       asset;

    std::array<uint8_t, 32>     id                  { };
    std::vector<uint8_t>        signature;
    std::vector<uint8_t>        secondSignature;
};
```

Transaction data model

### `Transaction()`

```cpp
class Transaction {
  public:
    Transaction() = default;

    std::array<uint8_t, 32> getId() const;

    bool sign(const std::string &passphrase);
    bool secondSign(const std::string &secondPassphrase);

    bool verify() const;
    bool secondVerify(const uint8_t *secondPublicKey) const;

    bool deserialize(const std::vector<uint8_t> &serialized);
    std::vector<uint8_t> serialize();

    std::vector<uint8_t> toBytes(const SerializerOptions &options = { false, false }) const;

    std::map<std::string, std::string> toMap() const;
    std::string toJson() const;

    TransactionData data;
};
```

Transaction model

```cpp
Ark::Crypto::transactions::Transaction transaction;
```

### `getId()`

```cpp
#include "transactions/transaction.hpp"

Hash32 txId = transaction.getId();
```

Convert the byte representation to a unique identifier.

#### Return Value

`Hash32` _**(std::array)**_

### `sign()`

```cpp
#include "transactions/transaction.hpp"

bool wasSuccessful = transaction.sign(const std::string &passphrase);
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::string& | passphrase | Yes | Passphrase |

#### Return Value

`bool`

### `secondSign()`

```cpp
#include "transactions/transaction.hpp"

bool wasSuccessful = transaction.secondSign(const std::string &secondPassphrase);
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::string& | secondPassphrase | Yes | Second passphrase |

#### Return Value

`bool`

### `verify()`

```cpp
#include "transactions/transaction.hpp"

bool isVerified = transaction.verify();
```

Verify the transaction.

#### Return Value

`bool`

### `secondVerify()`

```cpp
#include "transactions/transaction.hpp"

bool isSecondVerified = transaction.secondVerify(const uint8_t *secondPublicKey);
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const uint8_t\* | secondPublicKey | Yes | Second public key bytes _**(uint8_t[33])**_ |

#### Return Value

`bool`

### `deserialize()`

```cpp
#include "transactions/transaction.hpp"

bool wasDeserialized = transaction.deserialize(const std::vector<uint8_t> &serialized);
```

Deserialize a validly-serialized transaction byte-array

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::vector& | serialized | Yes | Serialized transaction byte-array |

#### Return Value

`bool`

### `serialize()`

```cpp
#include "transactions/transaction.hpp"

std::vector<uint8_t> serialized = transaction.serialize();
```

Serialize a transaction instance

#### Return Value

`std::vector<uint8_t>`

### `toBytes()`

```cpp
#include "transactions/transaction.hpp"

std::vector<uint8_t> transaction.toBytes(const SerializerOptions &options = { false, false })
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| bool | skipSignature | No | Skip first signature |
| bool | skipSecondSignature | No | Skip second signature |

#### Return Value

`std::vector<uint8_t>`

### `toMap()`

```cpp
#include "transactions/transaction.hpp"

std::map<std::string, std::string> txMap = transaction.toMap();
```

Convert the transaction to its string-map representation.

#### Return Value

`std::map<std::string, std::string>`

### `toJson()`

```cpp
#include "transactions/transaction.hpp"

std::string txString = transaction.toJson();
```

Convert the transaction to its Json-string representation.

#### Return Value

`std::string`
