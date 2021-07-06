---
title: Examples
---

# Examples

## Initialization

```cpp
Ark::Client::Connection<Ark::Client::Api> connection("my.node.ip.address", port);
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```cpp
std::string blocks = connection.api.blocks.all()
```

### Retrieve a Block

```cpp
std::string block = connection.api.blocks.get("validBlockId")
```

### List All Transactions of a Block

```cpp
std::string blockTransactions = connection.api.blocks.transactions("validBlockId")
```

### Search All Blocks

```cpp
const std::map<std::string, std::string> body = {
    { "id", "validBlockId" },
    { "previousBlock", "validBlockId" },
    { "version", "validVersion" }
};

std::string walletsSearch = connection.api.blocks.search(body);
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent \(it does not have to be recast unless a wallet wishes to change from delegate\). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```cpp
std::string delegates = connection.api.delegates.all();
```

### Retrieve a Delegate

```cpp
std::string delegate = connection.api.delegates.get("validDelegateId");
```

### List All Blocks of a Delegate

```cpp
std::string delegateBlocks = connection.api.delegates.blocks("validDelegateId");
```

### List All Voters of a Delegate

```cpp
std::string delegateVoters = connection.api.delegates.voters("validDelegateId");
```

## Node

The ARK network consists of different anonymous nodes \(servers\), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```cpp
std::string nodeConfiguration = connection.api.node.configuration();
```

### Retrieve the Status

```cpp
std::string nodeStatus = connection.api.node.status();
```

### Retrieve the Syncing Status

```cpp
std::string nodeSyncing = connection.api.node.syncing();
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```cpp
std::string peers = connection.api.peers.all();
```

### Retrieve a Peer

```cpp
std::string peer = connection.api.peers.get("validIpAddress");
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```cpp
std::string jsonTransaction = "{"
    "\"transactions\":["
        ...
    "]"
"}";

std::string transaction = connection.api.transactions.send(jsonTransaction);
```

### Retrieve a Transaction

```cpp
std::string transaction = connection.api.transactions.get("validTransactionId");
```

### List All Transactions

```cpp
std::string transactions = connection.api.transactions.all();
```

### List All Unconfirmed Transactions

```cpp
std::string unconfirmedTransactions = connection.api.transactions.allUnconfirmed();
```

### Get Unconfirmed Transaction

```cpp
std::string transactionUnconfirmed = connection.api.transactions.getUnconfirmed("validTransactionId");
```

### Search Transactions

```cpp
const std::map<std::string, std::string> body = {
    { "height", "validHeight" }
};

std::string transactions = connection.api.transactions.search(body);
```

### List Transaction Types

```cpp
std::string transactionTypes = connection.api.transactions.types();
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```cpp
std::string votes = connection.api.votes.all();
```

### Retrieve a Vote

```cpp
std::string vote = connection.api.votes.get("validVoteId");
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```cpp
std::string wallet = connection.api.wallets.all();
```

### Retrieve a Wallet

```cpp
std::string wallet = connection.api.wallets.get("validWalletId");
```

### List All Transactions of a Wallet

```cpp
std::string walletTransactions = connection.api.wallets.transactions("validAddress");
```

### List All Received Transactions of a Wallet

```cpp
std::string walletTransactionsReceived = connection.api.wallets.transactionsReceived("validWalletAddress")
```

### List All Sent Transactions of a Wallet

```cpp
std::string walletTransactionsSent = connection.api.wallets.transactionsSent("validWalletAddress")
```

### List All Votes of a Wallet

```cpp
std::string walletVotes = connection.api.wallets.votes("validWalletAddress")
```

### List All Top Wallets

```cpp
std::string walletsTop = connection.api.wallets.top();
```

### Search All Wallets

```cpp
const std::map<std::string, std::string> body_parameters = {
    { "username", "validUsername" },
    { "address", "validAddress" },
    { "publicKey", "validPublicKey" }
};

std::string walletsSearch = connection.api.wallets.search(body_parameters);
```
