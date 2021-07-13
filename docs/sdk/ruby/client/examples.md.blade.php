---
title: Examples
---

# Examples

## Initialization

```ruby
require 'arkecosystem/client'

manager = ARKEcosystem::Client::ConnectionManager.new()

connection = manager.connect(ARKEcosystem::Client::Connection.new({
  host: "http://my.ark.node:port/api/"
}), 'main')
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```ruby
blocks = connection.blocks.all()

print blocks.class

>>> [Faraday::Response]
```

### Retrieve a Block

```ruby
block = connection.blocks.show("validBlockId")

print block.class

>>> [Faraday::Response]
```

### List All Transactions of a Block

```ruby
blockTransactions = connection.blocks.transactions("validBlockId")

print blockTransactions.class

>>> [Faraday::Response]
```

### Search All Blocks

```ruby
searchedBlock = connection.blocks.search(id: "validBlockId")

print searchedBlock.class

>>> [Faraday::Response]
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent (it does not have to be recast unless a wallet wishes to change from delegate). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```ruby
delegates = connection.delegates.all()

print delegates.class

>>> [Faraday::Response]
```

### Retrieve a Delegate

```ruby
delegate = connection.delegates.show("validDelegateId")

print delegate.class

>>> [Faraday::Response]
```

### List All Blocks of a Delegate

```ruby
delegateBlocks = connection.delegates.blocks("validDelegateId")

print delegateBlocks.class

>>> [Faraday::Response]
```

### List All Voters of a Delegate

```ruby
delegateVoters = connection.delegates.voters(client, "validDelegateId")

print delegateVoters.class

>>> [Faraday::Response]
```

## Node

The ARK network consists of different anonymous nodes (servers), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```ruby
nodeConfiguration = connection.node.configuration()

print nodeConfiguration.class

>>> [Faraday::Response]
```

### Retrieve the Status

```ruby
nodeStatus = connection.node.status()

print nodeStatus.class

>>> [Faraday::Response]
```

### Retrieve the Syncing Status

```ruby
nodeSyncingStatus = connection.node.syncing()

print nodeSyncingStatus.class

>>> [Faraday::Response]
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```ruby
peers = connection.peers.all()

print peers.class

>>> [Faraday::Response]
```

### Retrieve a Peer

```ruby
peer = connection.peers.show("validIpAddress")

print peer.class

>>> [Faraday::Response]
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```ruby
transaction = connection.transactions.create(id: "dummyCreatedId")

print transaction.class

>>> [Faraday::Response]
```

### Retrieve a Transaction

```ruby
transaction = connection.transactions.show("validTransactionId")

print transaction.class

>>> [Faraday::Response]
```

### List All Transactions

```ruby
transactions = connection.transactions.all()

print transactions.class

>>> [Faraday::Response]
```

### List All Unconfirmed Transactions

```ruby
unconfirmedTransactions = connection.transactions.all_unconfirmed()

print unconfirmedTransactions.class

>>> [Faraday::Response]
```

### Get Unconfirmed Transaction

```ruby
unconfirmedTransaction = connection.transactions.show_unconfirmed("validTransactionId")

print unconfirmedTransaction.class

>>> [Faraday::Response]
```

### Search Transactions

```ruby
transactions = connection.transactions.search(id: "validTransactionId")

print transactions.class

>>> [Faraday::Response]
```

### List Transaction Types

```ruby
transactionTypes = connection.transactions.types()

print transactionTypes.class

>>> [Faraday::Response]
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```ruby
votes = connection.votes.all()

print votes.class

>>> [Faraday::Response]
```

### Retrieve a Vote

```ruby
vote = connection.votes.types("validVoteId")

print vote.class

>>> [Faraday::Response]
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```ruby
wallets = connection.wallets.all()

print wallets.class

>>> [Faraday::Response]
```

### Retrieve a Wallet

```ruby
wallet = connection.wallets.show("validWalletId")

print wallet.class

>>> [Faraday::Response]
```

### List All Transactions of a Wallet

```ruby
walletTransactions = connection.wallets.transactions("validWalletId")

print walletTransactions.class

>>> [Faraday::Response]
```

### List All Received Transactions of a Wallet

```ruby
walletReceivedTransactions = connection.wallets.received_transactions("validWalletId")

print walletReceivedTransactions.class

>>> [Faraday::Response]
```

### List All Sent Transactions of a Wallet

```ruby
walletSentTransactions = connection.wallets.sent_transactions("validWalletId")

print walletReceivedTransactions.class

>>> [Faraday::Response]
```

### List All Votes of a Wallet

```ruby
walletVotes = connection.wallets.votes("validWalletId")

print walletVotes.class

>>> [Faraday::Response]
```

### List All Top Wallets

```ruby
topWallets = connection.wallets.top()

print topWallets.class

>>> [Faraday::Response]
```

### Search All Wallets

```ruby
wallets = connection.wallets.search(id: "validWalletId")

print wallets.class

>>> [Faraday::Response]
```
