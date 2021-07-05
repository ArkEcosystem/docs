---
title: Examples
---

# Examples

## Initialization

```rust
extern crate arkecosystem_client;

use arkecosystem_client::connection::Connection;
use arkecosystem_client::api;

fn main() {
    let connection = Connection::new("https://my.ark.node:port/api/");
    // Parameters are passed as a Vec of string tuples (key, value).
    let params = Vec::<(String, String)>::new();
}
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```rust
let blocks = connection.blocks.all();

>>> Result<Vec<Block>>
```

### Retrieve a Block

```rust
let block = connection.blocks.show("validBlockId");

>>> Result<Block>
```

### List All Transactions of a Block

```rust
let blockTransactions = connection.blocks.transactions("validBlockId");

>>> Result<Vec<Transaction>>
```

### Search All Blocks

```rust
let searchedBlock = connection.blocks.search(vec![("id", "validBlockId")]);

>>> Result<Vec<Block>>
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent \(it does not have to be recast unless a wallet wishes to change from delegate\). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```rust
let delegates = connection.delegates.all()

>>> Result<Vec<Delegate>>
```

### Retrieve a Delegate

```rust
let delegate = connection.delegates.show("validDelegateId")

>>> Result<Delegate>
```

### List All Blocks of a Delegate

```rust
let delegateBlocks = connection.delegates.blocks("validDelegateId")

>>> Result<Vec<Block>>
```

### List All Voters of a Delegate

```rust
let delegateVoters = connection.delegates.voters("validDelegateId")

>>> Result<Vec<Wallet>>
```

## Node

The ARK network consists of different anonymous nodes \(servers\), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```rust
let nodeConfiguration = connection.node.configuration()

>>> Result<NodeConfiguration>
```

### Retrieve the Status

```rust
let nodeStatus = connection.node.status()

>>> Result<NodeStatus>
```

### Retrieve the Syncing Status

```rust
let nodeSyncingStatus = connection.node.syncing()

>>> Result<NodeSyncing>
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```rust
let peers = connection.peers.all()

>>> Result<Vec<Peer>>
```

### Retrieve a Peer

```rust
let peer = connection.peers.show("validIpAddress")

>>> Result<Peer>
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```rust
let transaction = connection.transactions.create(vec![("id", "dummyId")])

>>> Result<Transaction>
```

### Retrieve a Transaction

```rust
let transaction = connection.transactions.show("validTransactionId")

>>> Result<Transaction>
```

### List All Transactions

```rust
let transactions = connection.transactions.all()

>>> Result<Vec<Transaction>>
```

### List All Unconfirmed Transactions

```rust
let unconfirmedTransactions = connection.transactions.all_unconfirmed()

>>> Result<Vec<Transaction>>
```

### Get Unconfirmed Transaction

```rust
let unconfirmedTransaction = connection.transactions.show_unconfirmed("validTransactionId")

>>> Result<Vec<Transaction>>
```

### Search Transactions

```rust
let transactions = connection.transactions.search(vec![("id", "dummyId")])

>>> Result<Vec<Transaction>>
```

### List Transaction Types

```rust
let transactionTypes = connection.transactions.types()

>>> Result<TransactionTypes>
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```rust
let votes = connection.votes.all()

>>> Result<Vec<Transaction>>
```

### Retrieve a Vote

```rust
let vote = connection.votes.show("validVoteId")

>>> Result<Transaction>
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```rust
let wallets = connection.wallets.all()

>>> Result<Vec<Wallet>>
```

### Retrieve a Wallet

```rust
let wallet = connection.wallets.show("validWalletId")

>>> Result<Wallet>
```

### List All Transactions of a Wallet

```rust
let walletTransactions = connection.wallets.transactions("validWalletId")

>>> Result<Vec<Transactions>>
```

### List All Received Transactions of a Wallet

```rust
let walletReceivedTransactions = connection.wallets.received_transactions("validWalletId")

>>> Result<Vec<Transactions>>
```

### List All Sent Transactions of a Wallet

```rust
let walletSentTransactions = connection.wallets.sent_transactions("validWalletId")

>>> Result<Vec<Transactions>>
```

### List All Votes of a Wallet

```rust
let walletVotes = connection.wallets.votes("validWalletId")

>>> Result<Vec<Transactions>>
```

### List All Top Wallets

```rust
let topWallets = connection.wallets.top()

>>> Result<Vec<Wallets>>
```

### Search All Wallets

```rust
let wallets = connection.wallets.search(vec![("amount", 10000)])

>>> Result<Vec<Wallets>>
```
