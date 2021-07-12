---
title: API Documentation
---

# API Documentation

* ARK C++ Client v1.4.1

## Ark::Client::Connection

### `Connection()`

```cpp
#include <arkClient.h>

Ark::Client::Connection<Ark::Client::Api> connection(const char\* newIP, int newPort);
```

Configure an API Connection

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Ark::Client::Api | template&lt;&gt; parameter | Yes | API to use _(current `Ark::Crypto::Api` is AIP-11 (Core 2.6) API)_ |
| const char\* | newIP | No | A Peers IP Address |
| int | newPort | No | The Peers API Port |

## Ark::Client::api::Blockchain

### `get()`

```cpp
#include <arkClient.h>

std::string getBlockchain = connection.api.blockchain.get();
```

Get Blockchain info, (height, id, supply)

#### Return Value

`std::string`

## Ark::Client::api::Blocks

### `all()`

```cpp
#include <arkClient.h>

std::string allBlocks = connection.api.blocks.all(const char\* const query);
```

Get all blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string getBlock = connection.api.blocks.get(const char\* const blockId);
```

Get a block by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | blockId | Yes | Block ID |

#### Return Value

`std::string`

### `first()`

```cpp
#include <arkClient.h>

std::string getFirst = connection.api.blocks.first();
```

Get the first block forged.

#### Return Value

`std::string`

### `last()`

```cpp
#include <arkClient.h>

std::string getLast = connection.api.blocks.last();
```

Get the last block forged.

#### Return Value

`std::string`

### `transactions()`

```cpp
#include <arkClient.h>

std::string blockTxs = connection.api.blocks.transactions(const char\* const blockId);
```

Get all transactions by the given block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | blockId | Yes | Block ID |

#### Return Value

`std::string`

### `search()`

```cpp
#include <arkClient.h>

std::string results = connection.api.blocks.search(
        const std::map<std::string, std::string>& bodyParameters,
        const char\* const query);
```

Filter all blocks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::map& | &bodyParameters | Yes | Search Parameters |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

## Ark::Client::api::Bridgechains

### `all()`

```cpp
#include <arkClient.h>

std::string allBridgechains = connection.api.bridgechains.all(const char\* const query);
```

Get all Bridgechains.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string getBridgechain = connection.api.bridgechains.get(const char\* const bridgechainId);
```

Get a Bridgechain by a given bridgechainId.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | bridgechainId | Yes | Bridgechain ID |

#### Return Value

`std::string`

### `search()`

```cpp
#include <arkClient.h>

std::string results = connection.api.bridgechains.search(
        const std::map<std::string, std::string>& bodyParameters,
        const char\* const query);
```

Filter all Bridgechains by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::map& | &bodyParameters | Yes | Search Parameters |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

## Ark::Client::api::Businesses

### `all()`

```cpp
#include <arkClient.h>

std::string allBusinesses = connection.api.businesses.all(const char\* const query);
```

Get all Businesses.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string getBridgechain = connection.api.businesses.get(const char\* const businessId);
```

Get a Business by a given businessId.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | businessId | Yes | Business ID |

#### Return Value

`std::string`

### `bridgechains()`

```cpp
#include <arkClient.h>

std::string getBusinessBridgechains = connection.api.businesses.bridgechains(const char\* const businessId, const char\* const query);
```

Get a Business by a given businessId.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | businessId | Yes | Business ID |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `search()`

```cpp
#include <arkClient.h>

std::string results = connection.api.businesses::search(
        const std::map<std::string, std::string>& bodyParameters,
        const char\* const query);
```

Filter all Businesses by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::map& | &bodyParameters | Yes | Search Parameters |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

## Ark::Client::api::Delegates

### `all()`

```cpp
#include <arkClient.h>

std::string allDelegates = connection.api.delegates.all(const char\* const query);
```

Get all Delegates.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string delegate = connection.api.delegates.get(const char\* const identifier);
```

Get a delegate by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Delegate identifier |

#### Return Value

`std::string`

### `blocks()`

```cpp
#include <arkClient.h>

std::string allBlocks = connection.api.delegates.blocks(const char\* const identifier, const char\* const query);
```

Get all blocks for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Delegate identifier |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `voters()`

```cpp
#include <arkClient.h>

std::string allBlocks = connection.api.delegates.voters(const char\* const identifier, const char\* const query);
```

Get all voters for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Delegate identifier |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

## Ark::Client::api::Locks

### `all()`

```cpp
#include <arkClient.h>

std::string allLocks = connection.api.locks.all(const char\* const query);
```

Get all Locks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string lock = connection.api.locks.all(const char\* const lockId);
```

Get a Lock by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | lockId | Yes | Lock identifier |

#### Return Value

`std::string`

### `search()`

```cpp
#include <arkClient.h>

std::string results = connection.api.locks.search(
        const std::map<std::string, std::string>& bodyParameters,
        const char\* const query);
```

Filter all Locks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::map& | &bodyParameters | Yes | Search Parameters |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `unlocked()`

```cpp
#include <arkClient.h>

std::string results = connection.api.locks.unlocked(std::string& jsonIds, const char\* const query);
```

Filter all Locks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| std::string& | jsonIds | Yes | Search Parameters |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

## Ark::Client::api::Node

### `configuration()`

```cpp
#include <arkClient.h>

std::string nodeConfig = connection.api.node.configuration();
```

Get the node configuration.

#### Return Value

`std::string`

### `crypto()`

```cpp
#include <arkClient.h>

std::string nodeCrypto = connection.api.node.crypto();
```

Get the node crypto.

#### Return Value

`std::string`

### `fees()`

```cpp
#include <arkClient.h>

std::string nodeFees = connection.api.node.fees(const char\* const query);
```

Get the node fees.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `status()`

```cpp
#include <arkClient.h>

std::string nodeStatus = connection.api.node.status();
```

Get the node status.

#### Return Value

`std::string`

### `syncing()`

```cpp
#include <arkClient.h>

std::string nodeSyncing = connection.api.node.syncing();
```

Get the node syncing status.

#### Return Value

`std::string`

## Ark::Client::api::Peers

### `all()`

```cpp
#include <arkClient.h>

std::string allPeers = connection.api.peers.all(const char\* const query);
```

Get all peers.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string allPeers = connection.api.peers.get(const char\* const ip);
```

Get a peer by the given IP address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | ip | Yes | IP Address |

#### Return Value

`std::string`

## Ark::Client::api::Rounds

### `delegates()`

```cpp
#include <arkClient.h>

std::string delegatesInRound = connection.api.rounds.delegates(const char\* const roundId);
```

Get all delegates in a given round.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | roundId | Yes | Round Id |

#### Return Value

`std::string`

## Ark::Client::api::Transactions

### `send()`

```cpp
#include <arkClient.h>

std::string sendResult = connection.api.transactions.send(std::string& jsonTransaction);
```

Post a new transaction to the network.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| std::string& | jsonTransaction | Yes | Transaction |

#### Return Value

`std::string`

### `all()`

```cpp
#include <arkClient.h>

std::string allTransactions = connection.api.transactions.all(const char\* const query);
```

Get all transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `allUnconfirmed()`

```cpp
#include <arkClient.h>

std::string allUnconfirmed = connection.api.transactions.allUnconfirmed(const char\* const query);
```

Get all unconfirmed transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string allUnconfirmed = connection.api.transactions.get(const char\* const identifier);
```

Get a transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Transaction ID |

#### Return Value

`std::string`

### `getUnconfirmed()`

```cpp
#include <arkClient.h>

std::string allUnconfirmed = connection.api.transactions.getUnconfirmed(const char\* const identifier);
```

Get an unconfirmed transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Transaction ID |

#### Return Value

`std::string`

### `search()`

```cpp
#include <arkClient.h>

std::string results = connection.api.transactions.search(const std::map<std::string, std::string> &bodyParameters, const char\* const query);
```

Filter all transactions by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::map& | &bodyParameters | Yes | Search parameters |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `fees()`

```cpp
#include <arkClient.h>

std::string allFees = connection.api.transactions.fees();
```

Get a list of fees for transaction types.

#### Return Value

`std::string`

### `types()`

```cpp
#include <arkClient.h>

std::string allTypes = connection.api.transactions.types();
```

Get a list of valid transaction types.

#### Return Value

`std::string`

## Ark::Client::api::Votes

### `all()`

```cpp
#include <arkClient.h>

std::string allVotes = connection.api.votes.all(const char\* const query);
```

Get all votes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string getVote = connection.api.votes.get(const char\* const identifier);
```

Get a vote by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Vote ID |

#### Return Value

`std::string`

## Ark::Client::api::Wallets

### `all()`

```cpp
#include <arkClient.h>

std::string allWallets = connection.api.wallets.all(const char\* const query);
```

Get all wallets.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `get()`

```cpp
#include <arkClient.h>

std::string getWallet = connection.api.wallets.get(const char\* const identifier);
```

Get a wallet by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Wallet ID |

#### Return Value

`std::string`

### `locks()`

```cpp
#include <arkClient.h>

std::string walletLocks = connection.api.wallets.locks(const char\* const identifier, const char\* const query);
```

Get a wallets locks by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Wallet ID |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `transactions()`

```cpp
#include <arkClient.h>

std::string walletLocks = connection.api.wallets.transactions(const char\* const identifier, const char\* const query);
```

Get all transactions for the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| char | identifier | No | Wallet identifier |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `transactionsReceived()`

```cpp
#include <arkClient.h>

std::string txsReceived = connection.api.wallets.transactionsReceived(const char\* const identifier, const char\* const query);
```

Get all transactions received by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | No | Wallet identifier |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `transactionsSent()`

```cpp
#include <arkClient.h>

std::string txsSent = connection.api.wallets.transactionsSent(const char\* const identifier, const char\* const query);
```

Get all transactions sent by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Wallet identifier |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `top()`

```cpp
#include <arkClient.h>

std::string topWallets = connection.api.wallets.top(const char\* const query);
```

Get all wallets sorted by balance in descending order.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `votes()`

```cpp
#include <arkClient.h>

std::string topWallets = connection.api.wallets.votes(const char\* const identifier, const char\* const query);
```

Get all votes by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const char\* const | identifier | Yes | Wallet identifier |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`

### `search()`

```cpp
#include <arkClient.h>

std::string result = connection.api.wallets.search(const std::map<std::string, std::string> &bodyParameters, const char\* const query);
```

Filter all wallets by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| const std::map& | bodyParameters | Yes | Search parameters |
| const char\* const | query | No | API Query (page, limit, etc) |

#### Return Value

`std::string`
