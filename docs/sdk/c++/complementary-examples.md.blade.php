---
title: Complementary Examples
---

# Complementary Examples

* ARK C++ Client v1.4.1
* ARK C++ Crypto v1.1.0

## Prerequisites

Before we get started we need to make sure that all of the required dependencies are installed. These dependencies are the [Crypto SDK](/docs/sdk/c++/crypto/api-documentation) and [Client SDK](/docs/sdk/c++/client/api-documentation). You can head on over to their documentations to read more about them but for now we are only concerned with installing them to get up and running.

Also note that [CMake](https://cmake.org/download/) is the recommended build tool.

Open your project and execute the following commands to install both SDKs. Make sure that those complete without any errors. If you encounter any errors, please open an issue in [C++ Client](https://github.com/ArkEcosystem/cpp-client/issues/new) or [C++ Crypto](https://github.com/ArkEcosystem/cpp-crypto/issues/new) with as much information as you can provide so that our developers can have a look and get to the bottom of the issue.

Clone the C++ Client and Crypto repos into your projects external dependencies directory.

```bash
git clone https://github.com/arkecosystem/cpp-client
git clone https://github.com/arkecosystem/cpp-crypto
```

## Example Setup

### Project Layout

> ```bash
> project
> - extern/
>    - cpp-client/
>    - cpp-crypto/
> - src/
>    - | main.c
> - | CMakeLists.txt
> ```

### Cloning

```bash
git clone https://github.com/arkecosystem/cpp-client extern/cpp-client
git clone https://github.com/arkecosystem/cpp-crypto extern/cpp-crypto
```

### Example CMake File

#### `CMakeLists.txt`

> ```bash
> cmake_minimum_required(VERSION 3.2)
>
> project(ark_cpp_example_project)
>
> set(CMAKE_CXX_STANDARD 11)
>
> if (MSVC)
>    add_definitions(
>        -D_CRT_SECURE_NO_WARNINGS
>        -D_SCL_SECURE_NO_WARNINGS
>        -DNOMINMAX
>    )
>    set(CMAKE_CXX_FLAGS "${CMAKE_CXX_FLAGS} /utf-8")
> endif()
>
> add_subdirectory(extern/cpp-client)
> add_subdirectory(extern/cpp-crypto)
>
> set(FILE_SRC src/main.cpp)
>
> add_executable(${PROJECT_NAME} ${FILE_SRC})
>
> target_link_libraries(${PROJECT_NAME} ark_cpp_client ark_cpp_crypto)
> ```

### Building and Running the Project

```bash
mkdir build && cd build
cmake ..
cmake --build .
./ark_cpp_example_project
```

## Ready to roll

Now that we're setup and understand the basic layout and build steps, let's look into some examples for the most common tasks encountered when interacting with the ARK Blockchain.

## Persisting your transaction on the blockchain

The process of getting your transaction verified and persisted on the ARK Blockchain involves a few steps with which our SDKs will help you but lets break them down to get a better idea of what is happening.

1. Install the Client SDK and configure it to use a node of your choosing to broadcast your transactions to. Always make sure that you have a fallback node that you can use for broadcasting in case your primary node goes offline or acts strange otherwise.
2. Install the Crypto SDK and configure it to match the configuration of the network. This is the most important part as misconfiguration can lead to a myriad of issues as Core will reject your transactions.
3. Retrieve the nonce of the sender wallet and increase it by 1. You can read about what a sequential nonce is and why it is important [here](/docs/core/transactions/understanding-the-nonce).
4. Create an instance of the builder for the type of transaction you want to create. This is the step where we actually create a transaction and sign it so that the ARK Blockchain can later on verify it and decide if it will be accepted, forged and finally. You can read the relevant [API documentation](/docs/sdk/c++/crypto/api-documentation) if you want more detailed information about the design and usage.
5. Turn the newly created transaction into JSON and broadcast it to the network through the Client SDK. You can read the relevant [API documentation](/docs/sdk/c++/client/api-documentation) if you want more detailed information about the design and usage.
6. Process the API response and verify that your transaction was accepted. If the network rejects your transaction you'll receive the reason as to why that is the case in the response which might mean that you need to create a new transaction and broadcast it.

## Troubleshooting

A common issue when trying to get your transaction onto the blockchain is that you'll receive an error to the effect of **Transaction Version 2 is not supported** which indicates that your Crypto SDK configuration might be wrong.

The solution to this is to make sure that your Crypto SDK instance is properly configured. This includes both the network preset and the height it's configured to assume the network has passed, if any of those don't match up you'll encounter the aforementioned issue with the version of your transactions.

### Mainnet

```cpp
#include "common/configuration.hpp"
#include "transactions/builders/builder.hpp"

#include "networks/mainnet.hpp"

auto transaction = Ark::Crypto::transactions::builder::Transfer(Mainnet)
        .nonce(1)
        .senderPublicKey("YOUR_SENDER_WALLET_PUBLICKEY")
        .amount(1)
        .expiration(0)
        .recipientId("Address of Recipient")
        .build(config);
```

### Devnet

```cpp
#include "common/configuration.hpp"
#include "transactions/builders/builder.hpp"

#include "networks/devnet.hpp"

// Devnet is the default configuration
auto transaction = Ark::Crypto::transactions::builder::Transfer()
        .nonce(1)
        .senderPublicKey("YOUR_SENDER_WALLET_PUBLICKEY")
        .amount(1)
        .expiration(0)
        .recipientId("Address of Recipient")
        .build();
```

### Testnet

```cpp
#include "common/configuration.hpp"
#include "transactions/builders/builder.hpp"

#include "networks/testnet.hpp"

Ark::Crypto::Configuration config(Testnet);

auto transaction = Ark::Crypto::transactions::builder::Transfer(config)
        .nonce(1)
        .senderPublicKey("YOUR_SENDER_WALLET_PUBLICKEY")
        .amount(1)
        .expiration(0)
        .recipientId("Address of Recipient")
        .build();
```

### Custom Network

```cpp
#include "common/configuration.hpp"
#include "transactions/builders/builder.hpp"

#include "common/network.hpp"

const Ark::Crypto::Network CustomNetwork = {
    "f39a61f04d6136a690a0b675ef6eedbd053665bd343b4e4f03311f12065fb875",
    1, 0xCE, 0x41,
    "2019-10-25T09:05:40.856Z"
};

auto transaction = Ark::Crypto::transactions::builder::Transfer(CustomNetwork)
        .nonce(1)
        .senderPublicKey("YOUR_SENDER_WALLET_PUBLICKEY")
        .amount(1)
        .expiration(0)
        .recipientId("Address of Recipient")
        .build();
```

## Creating and Broadcasting a Transfer Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the Transaction
    const auto transaction = builder::Transfer()
            .nonce(nonce)
            .amount(1ULL)
            .expiration(0UL)
            .recipientId("Address of Recipient")
            .vendorField("Hello World")
            .sign("this is a top secret passphrase")
            .build();

    // Step 3: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 4: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 5: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

<x-alert type="info">
The vendorField is optional and limited to a length of 255 characters. It can be a good idea to add a vendor field to your transactions if you want to be able to easily track them in the future.
</x-alert>

## Creating and Broadcasting a Second Signature Registration Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the Second PublicKey
    // - 2nd PublicKey: 03699e966b2525f9088a6941d8d94f7869964a000efe65783d78ac82e1199fe609
    const uint8_t secondPublicKey[33] = { 3, 105, 158, 150, 107, 37, 37, 249, 8, 138, 105, 65, 216, 217, 79, 120, 105, 150, 74, 0, 14, 254, 101, 120, 61, 120, 172, 130, 225, 25, 159, 230, 9 };

    // Step 3: Create the Transaction
    const auto transaction = builder::SecondSignature()
            .nonce(nonce)
            .publicKey(secondPublicKey)
            .sign("this is a top secret passphrase")
            .build();

    // Step 4: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 5: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 6: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

## Creating and Broadcasting a Delegate Registration Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the Transaction
    const auto transaction = builder::DelegateRegistration()
            .nonce(nonce)
            .username("baldninja")
            .sign("this is a top secret passphrase")
            .build();

    // Step 3: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 4: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 5: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

## Creating and Broadcasting a Vote Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

#include "networks/mainnet.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client. For example, this time on a Mainnet peer
Connection<Api> client("5.196.105.34", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the 'Vote'
    // - votes   +022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d
    // - vote:   '+' / 0x01
    // - unvote: '-' / 0x00
    const uint8_t unvote[34] = { 1, 2, 44, 202, 149, 41, 236, 151, 167, 114, 21, 108, 21, 42, 0, 170, 209, 85, 238, 103, 8, 36,  62, 101, 201, 210, 17, 165, 137, 203, 93, 67, 35, 77 };

    // Step 3: Create the Transaction using Mainnet
    const auto transaction = builder::Vote(Mainnet)
            .nonce(nonce)
            .votes(vote)
            .sign("this is a top secret passphrase")
            .build();

    // Step 4: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 5: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 6: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

<x-alert type="info">
Note the **plus (1)** prefix for the public key that is passed to the **.votes()** function. This prefix denotes that this is a transaction to remove a vote from the given delegate.
</x-alert>

## Creating and Broadcasting an Unvote Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

#include "networks/mainnet.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client. For example, this time on a Mainnet peer
Connection<Api> client("5.196.105.34", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the 'Unvote'
    // - votes   -022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d
    // - vote:   '+' / 0x01
    // - unvote: '-' / 0x00
    const uint8_t unvote[34] = { 0, 2, 44, 202, 149, 41, 236, 151, 167, 114, 21, 108, 21, 42, 0, 170, 209, 85, 238, 103, 8, 36,  62, 101, 201, 210, 17, 165, 137, 203, 93, 67, 35, 77 };

    // Step 3: You can also use a configuration for Mainnet or a custom network
    Configuration config(Mainnet);

    // Step 4: Create the Transaction
    const auto transaction = builder::Vote(config)
            .nonce(nonce)
            .votes(unvote)
            .sign("this is a top secret passphrase")
            .build();

    // Step 5: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 6: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 7: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

<x-alert type="info">
Note the **minus (0)** prefix for the public key that is passed to the **.votes()** function. This prefix denotes that this is a transaction to add a vote to the given delegate.
</x-alert>

## Creating and Broadcasting an Ipfs Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the Ipfs Hash
    // ipfs: QmYSK2JyM3RyDyB52caZCTKFR3HKniEcMnNJYdk8DQ6KKB
    const uint8_t ipfsHash[34] = { 18, 32, 150, 8, 24, 77, 108, 238, 43, 154, 248, 230, 194, 164, 111, 201, 49, 138, 223, 115, 50, 154, 235, 138,134, 207, 132, 114, 130, 159, 255, 91, 184, 158 };

    // Step 3: Create the Transaction for Mainnet
    const auto transaction = builder::Ipfs()
            .nonce(nonce)
            .ipfs(ipfsHash, 34)
            .sign("this is a top secret passphrase")
            .build();

    // Step 4: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 5: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 6: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

## Creating and Broadcasting a Multi Payment Transaction

```cpp
#include <array>
#include <vector>

#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");


    // Step 2: Create the Amounts and Addresses objects
    const auto amounts = std::vector<uint64_t>({ 1ULL, 1ULL, 1ULL, 1ULL, 1ULL, 1ULL, 1ULL, 1ULL, 1ULL, 1ULL });
    // addresses:   "DHKxXag9PjfjHBbPg3HQS5WCaQZdgDf6yi",
    //              "DBzGiUk8UVjB2dKCfGRixknB7Ki3Zhqthp",
    //              "DFa7vn1LvWAyTuVDrQUr5NKaM73cfjx2Cp",
    //              "DSGsxX84gif4ipAxZjjCE2k2YpHmsNTJeY",
    //              "DQhzMRvVoCYCiZH2iSyuqCTcayz7z4XTKx",
    //              "DMSD6fFT1Xcxh4ErYExr5MtGnEuDcYu22m",
    //              "D7HCZG8hJuJqu9rANRdyNr6N1vpH2vbyx8",
    //              "DQy6ny2bkvWiDLboQMZ1cxnmoNC5JM228w",
    //              "D7EUgmA78qUaSfsNedfgKs2ALq28FhL3zo",
    //              "DEHyKHdtzHqTghfpwaBcvTzLpgPP5AAUgE"
    const auto addresses = std::vector<std::array<uint8_t, 21> >({
            { 30, 133, 175, 101, 173, 106, 163, 161, 223,  91, 201, 166, 245, 155, 159,  61,  57,  79, 100,  58,  35 },
            { 30,  75,  29, 161, 170, 169, 188, 174, 197, 170, 246, 118,   4, 120,   1,   7,  12,  76,  18,  71, 193 },
            { 30, 114, 108, 208, 211, 224,  41,  32, 188, 193,  79, 109,  87, 165, 247,  47, 100, 210, 112, 206, 227 },
            { 30, 231, 211, 119, 107, 126, 111,  22,  25, 170, 218,  56, 165, 252, 113, 167, 183, 243, 185, 186, 200 },
            { 30, 214, 162, 243, 198,  57, 152,  44,   0,  89, 206,  95, 226,  30,  94, 116,  33,  45, 106, 140,  63 },
            { 30, 178, 190, 143,  12,  23,  91, 172, 102,  34, 216, 126, 212, 216,  73,  93, 113, 191, 188,  73, 243 },
            { 30,  23, 120, 154,  45,   2, 165,  13, 103, 200,  74, 101, 226, 221, 246,  68, 137,  57, 210,  11, 124 },
            { 30, 217, 126, 145,  87, 206, 191, 199,  71, 134, 227,  49,  91, 164, 170, 123, 164,  10, 223, 107,  80 },
            { 30,  22, 244, 209, 133,  76,  10,  63,  34, 251,  44, 242,  46,  28, 139, 137,  46, 108, 158,  83,  14 },
            { 30, 100, 102, 216, 129,  91,   2,  33, 119, 141,  36,  36, 214,  55, 142, 101, 144,  24, 178, 175,  62 }})

    // Step 3: Create the Transaction
    const auto transaction = builder::MultiPayment()
            .nonce(nonce)
            .n_payments(10UL)
            .amounts(amounts)
            .addresses(addresses)
            .sign("this is a top secret passphrase")
            .build();

    // Step 4: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 5: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 6: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

## Creating and Broadcasting a Delegate Resignation Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the Transaction
    const auto transaction = builder::DelegateResignation()
            .nonce(nonce)
            .fee(2500000000ULL)
            .sign("this is a top secret passphrase")
            .build();

    // Step 3: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 4: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 5: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

<x-alert type="info">
A delegate resignation has to be sent from the delegate wallet itself to verify its identity.
</x-alert>

## Creating and Broadcasting a Htlc Lock Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the Secret Hash object
    const uint8_t secretHash[32] = { 9, 185, 162, 131, 147, 239, 208, 47, 205, 118, 162, 27, 15, 15, 85, 186, 42, 173, 143, 54, 64, 255, 140, 174, 134, 222, 3, 58, 156, 251, 215, 140 };

    // Step 3: Create the Transaction
    const auto transaction = builder::HtlcLock()
            .nonce(nonce)
            .amount(1ULL)
            .secretHash(secretHash)
            .expirationType(1U)
            .expiration(81242895UL)
            .recipientId("Address of Recipient")
            .sign("this is a top secret passphrase")
            .build();

    // Step 4: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 5: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 6: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

## Creating and Broadcasting a Htlc Claim Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the Lock TransactionId and Unlock Secret objects
    // - 50f301306d8da58d62332ce3a361d9fd4a01b0a89ca914517b685e2d3714e24e
    const uint8_t lockTxId[32] = { 80, 243, 1, 48,  109, 141, 165, 141, 98, 51, 44, 227, 163, 97, 217, 253, 74, 1, 176, 168, 156, 169, 20,  81, 123, 104, 94, 45, 55, 20, 226, 78 };
    // - sha256("f5ea877a311ced90cf4524cb489e972f")
    // - 580fde2946477f24b288890faea69fa120a14cfa5ea4a9819508331a034d9585
    const uint8_t unlockSecret[32] = { 88, 15, 222, 41, 70, 71, 127, 36, 178, 136, 137, 15, 174, 166, 159, 161, 32, 161, 76, 250, 94, 164, 169, 129, 149, 8, 51, 26, 3, 77, 149, 133 };

    // Step 3: Create the Transaction
    const auto transaction = builder::HtlcClaim()
            .nonce(nonce)
            .lockTransactionId(lockTxId)
            .unlockSecret(unlockSecret)
            .sign("this is a top secret passphrase")
            .build();

    // Step 4: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 5: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 6: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```

<x-alert type="info">
The **unlockSecret** has to be a SHA256 hash of the plain text secret that you shared with the person that is allowed to claim the transaction.
</x-alert>

## Creating and Broadcasting a Htlc Refund Transaction

```cpp
#include <iostream>

#include <arkClient.h>
#include <arkCrypto.h>

#include "transactions/builders/builder.hpp"

using namespace Ark::Client;
using namespace Ark::Crypto;
using namespace Ark::Crypto::transactions;

// Configure our API client
Connection<Api> client("167.114.29.52", 4003);

// This is just one method of Parsing Json to obtain a Nonce;
// it uses the built-in tools from C++ Client & Crypto.
//
// Other methods of parsing may be used here.
uint64_t getWalletNonce(Connection<Api>& client, const char\* address) {
    // Request the Wallet's Json from the API Connection
    const auto walletResponse = client.api.wallets.get(address);

    // parse the Json Wallet Response to retrieve the nonce
    const size_t capacity = JSON_OBJECT_SIZE(0) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(6) + 160;
    DynamicJsonDocument doc(capacity);
    deserializeJson(doc, walletResponse);
    uint64_t nonce = doc["data"]["nonce"];

    return nonce ?: 1;
}

int main() {
    // Step 1: Retrieve the nonce of the sender wallet
    const auto nonce = getWalletNonce(client, "YOUR_SENDER_WALLET_ADDRESS");

    // Step 2: Create the Lock TransactionId object
    // - 50f301306d8da58d62332ce3a361d9fd4a01b0a89ca914517b685e2d3714e24e
    const uint8_t lockTxId[32] = { 80, 243, 1, 48,  109, 141, 165, 141, 98, 51, 44, 227, 163, 97, 217, 253, 74, 1, 176, 168, 156, 169, 20,  81, 123, 104, 94, 45, 55, 20, 226, 78 };

    // Step 3: Create the Transaction
    const auto transaction = builder::HtlcRefund()
            .nonce(nonce)
            .lockTransactionId(lockTxId)
            .sign("this is a top secret passphrase")
            .build();

    // Step 4: Construct the Transaction Payload
    auto txPayload = "{\"transactions\":[" + transaction.toJson() + "]}";

    // Step 5: Broadcast the Transaction Payload
    const auto broadcastResponse = client.api.transactions.send(txPayload);

    // Step 6: Log the response
    printf("\nbroadcastResponse: %s\n", broadcastResponse.c_str());

    return 0;
}
```
