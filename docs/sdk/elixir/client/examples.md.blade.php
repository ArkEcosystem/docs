---
title: Examples
---

# Examples

## Initialization

```elixir
client = ARKEcosystem.Client.new(%{
    host: "http://my.node.ip:myport/api",
    nethash: "validNethash",
    version: "1.0.0"
})
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```elixir
blocks = ARKEcosystem.Client.API.Blocks.list(client)

IO.inspect blocks

>>> ArkEcosystem.Client.response()
```

### Retrieve a Block

```elixir
block = ARKEcosystem.Client.API.Blocks.show(client, "validBlockId")

IO.inspect block

>>> ArkEcosystem.Client.response()
```

### List All Transactions of a Block

```elixir
blockTransactions = ARKEcosystem.Client.API.Blocks.transactions(client, "validBlockId")

IO.inspect blockTransactions

>>> ArkEcosystem.Client.response()
```

### Search All Blocks

```elixir
searchedBlock = ARKEcosystem.Client.API.Blocks.search(client, %{q: "searchQuery"})

IO.inspect searchedBlock

>>> ArkEcosystem.Client.response()
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent (it does not have to be recast unless a wallet wishes to change from delegate). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```elixir
delegates = ARKEcosystem.Client.API.Delegates.list(client)

IO.inspect delegates

>>> ArkEcosystem.Client.response()
```

### Retrieve a Delegate

```elixir
delegate = ARKEcosystem.Client.API.Delegates.show(client, "validDelegateId")

IO.inspect delegate

>>> ArkEcosystem.Client.response()
```

### List All Blocks of a Delegate

```elixir
delegateBlocks = ARKEcosystem.Client.API.Delegates.blocks(client, "validDelegateId")

IO.inspect delegateBlocks

>>> ArkEcosystem.Client.response()
```

### List All Voters of a Delegate

```elixir
delegateVoters = ARKEcosystem.Client.API.Delegates.voters(client, "validDelegateId")

IO.inspect delegateVoters

>>> ArkEcosystem.Client.response()
```

## Node

The ARK network consists of different anonymous nodes (servers), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```elixir
nodeConfiguration = ARKEcosystem.Client.API.Node.configuration(client)

IO.inspect nodeConfiguration

>>> ArkEcosystem.Client.response()
```

### Retrieve the Status

```elixir
nodeStatus = ARKEcosystem.Client.API.Node.status(client)

IO.inspect nodeStatus

>>> ArkEcosystem.Client.response()
```

### Retrieve the Syncing Status

```elixir
nodeSyncingStatus = ARKEcosystem.Client.API.Node.syncing(client)

IO.inspect nodeSyncingStatus

>>> ArkEcosystem.Client.response()
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```elixir
peers = ARKEcosystem.Client.API.Peers.list(client)

IO.inspect peers

>>> ArkEcosystem.Client.response()
```

### Retrieve a Peer

```elixir
peer = ARKEcosystem.Client.API.Peers.show(client, "validIpAddress")

IO.inspect peer

>>> ArkEcosystem.Client.response()
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```elixir
transaction = ARKEcosystem.Client.API.Transactions.create(client, %{id: "dummyCreatedId"})

IO.inspect transaction

>>> ArkEcosystem.Client.response()
```

### Retrieve a Transaction

```elixir
transaction = ARKEcosystem.Client.API.Transactions.show(client, "validTransactionId")

IO.inspect transaction

>>> ArkEcosystem.Client.response()
```

### List All Transactions

```elixir
transactions = ARKEcosystem.Client.API.Transactions.list(client)

IO.inspect transactions

>>> ArkEcosystem.Client.response()
```

### List All Unconfirmed Transactions

```elixir
unconfirmedTransactions = ARKEcosystem.Client.API.Transactions.list_unconfirmed(client)

IO.inspect unconfirmedTransactions

>>> ArkEcosystem.Client.response()
```

### Get Unconfirmed Transaction

```elixir
unconfirmedTransaction = ARKEcosystem.Client.API.Transactions.list_unconfirmed(client, "validTransactionId")

IO.inspect unconfirmedTransaction

>>> ArkEcosystem.Client.response()
```

### Search Transactions

```elixir
transactions = ARKEcosystem.Client.API.Transactions.search(client, %{q: "searchQuery"})

IO.inspect transactions

>>> ArkEcosystem.Client.response()
```

### List Transaction Types

```elixir
transactionTypes = ARKEcosystem.Client.API.Transactions.types(client)

IO.inspect transactionTypes

>>> ArkEcosystem.Client.response()
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```elixir
votes = ARKEcosystem.Client.API.Votes.list(client)

IO.inspect votes

>>> ArkEcosystem.Client.response()
```

### Retrieve a Vote

```elixir
vote = ARKEcosystem.Client.API.Transactions.types(client, "validVoteId")

IO.inspect vote

>>> ArkEcosystem.Client.response()
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```elixir
wallets = ARKEcosystem.Client.API.Wallets.list(client)

IO.inspect wallets

>>> ArkEcosystem.Client.response()
```

### Retrieve a Wallet

```elixir
wallet = ARKEcosystem.Client.API.Wallets.show(client, "validWalletId")

IO.inspect wallet

>>> ArkEcosystem.Client.response()
```

### List All Transactions of a Wallet

```elixir
walletTransactions = ARKEcosystem.Client.API.Wallets.transactions(client, "validWalletId")

IO.inspect walletTransactions

>>> ArkEcosystem.Client.response()
```

### List All Received Transactions of a Wallet

```elixir
walletReceivedTransactions = ARKEcosystem.Client.API.Wallets.received_transactions(client, "validWalletId")

IO.inspect walletReceivedTransactions

>>> ArkEcosystem.Client.response()
```

### List All Sent Transactions of a Wallet

```elixir
walletSentTransactions = ARKEcosystem.Client.API.Wallets.sent_transactions(client, "validWalletId")

IO.inspect walletReceivedTransactions

>>> ArkEcosystem.Client.response()
```

### List All Votes of a Wallet

```elixir
walletVotes = ARKEcosystem.Client.API.Wallets.votes(client, "validWalletId")

IO.inspect walletVotes

>>> ArkEcosystem.Client.response()
```

### List All Top Wallets

```elixir
topWallets = ARKEcosystem.Client.API.Wallets.top(client)

IO.inspect topWallets

>>> ArkEcosystem.Client.response()
```

### Search All Wallets

```elixir
wallets = ARKEcosystem.Client.API.Wallets.search(client, %{q: "searchQuery"})

IO.inspect wallets

>>> ArkEcosystem.Client.response()
```
