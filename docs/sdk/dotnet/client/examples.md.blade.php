---
title: Examples
---

# Examples

<x-alert type="danger">
WARNING! This package is deprecated and is no longer maintained and supported.
</x-alert>

## Initialization

```csharp
using ARKEcosystem.Client;
using ARKEcosystem.Client.API;

static void Main(string[] args)
{
    ConnectionManager.Connect(new Connection("http://my.node.ip:port/api/", "main"))
}
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```csharp
var blocks = ConnectionManager.Connection("main").Api.Blocks.All();

>>> {'meta': {'count': 10, ... }}
```

### Retrieve a Block

```csharp
var block = ConnectionManager.Connection("main").Api.Blocks.Show("validBlockId");


>>> {'data': {'id': 'validBlockId' ... }}
```

### List All Transactions of a Block

```csharp
var blockTransactions = ConnectionManager.Connection("main").Api.Blocks.Transactions("validBlockId");

>>> {'meta': {'count': 10, ... }}
```

### Search All Blocks

```csharp
var parameters = new Dictionary<string, string> {
    {"id": "validBlockId"}
}
var searchedBlocks = ConnectionManager.Connection("main").Api.Blocks.Search(parameters);

>>> {'meta': {'count': 100, ... }}
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent \(it does not have to be recast unless a wallet wishes to change from delegate\). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```csharp
var delegates = ConnectionManager.Connection("main").Api.Delegates.All();

>>> {'meta': {'count': 20, ... }}
```

### Retrieve a Delegate

```csharp
var delegate = ConnectionManager.Connection("main").Api.Delegates.Show("validId");

>>> {'data': {'username': 'delegateName', ... }}
```

### List All Blocks of a Delegate

```csharp
var delegateBlocks = ConnectionManager.Connection("main").Api.Delegates.Blocks("validId");

>>> {'meta': {'count': 100, ... }}
```

### List All Voters of a Delegate

```csharp
var delegateVoters = ConnectionManager.Connection("main").Api.Delegates.voters("validId");

>>> {'meta': {'count': 10, ... }}
```

## Node

The ARK network consists of different anonymous nodes \(servers\), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```csharp
var nodeConfiguration = ConnectionManager.Connection("main").Api.Node.Configuration();

>>> {'data': {'nethash': '6e84d08bd299ed97c212c886c98a57e36545c8f5d645ca7eeae63a8bd62d8988', ... }}
```

### Retrieve the Status

```csharp
var nodeStatus = ConnectionManager.Connection("main").Api.Node.Status();

>>> {'data': {'synced': True, 'now': 6897158, 'blocksCount': -1}}
```

### Retrieve the Syncing Status

```csharp
var nodeSyncingStatus = ConnectionManager.Connection("main").Api.Node.Syncing();

>>> {'data': {'syncing': False, 'blocks': -1, 'height': 6897160, 'id': '12905037940821862953'}}
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```csharp
var peers = ConnectionManager.Connection("main").Api.Peers.All();

>>> {'meta': {'count': 100, ... }}
```

### Retrieve a Peer

```csharp
var peer = ConnectionManager.Connection("main").Api.Peers.Show("validIpAddress");

>>> {'data': {'count': 20, ... }} # Need to changes
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```csharp
var parameters = new Dictionary<string, dynamic>
{
    {
        "amount: 1,
        ...
    }
};

var transaction = ConnectionManager.Connection("main").Api.Transactions.Create(parameters);

>>> ...
```

### Retrieve a Transaction

```csharp
var transaction = ConnectionManager.Connection("main").Api.Transactions.Show("validId");

>>> ...
```

### List All Transactions

```csharp
var transactions = ConnectionManager.Connection("main").Api.Transactions.All();

>>> {'meta': {'count': 10, ... }}
```

### List All Unconfirmed Transactions

```csharp
var unconfirmedTransactions = ConnectionManager.Connection("main").Api.Transactions.AllUnconfirmed();

>>> {'meta': {'count': 10, ... }}
```

### Get Unconfirmed Transaction

```csharp
var unconfirmedTransaction = ConnectionManager.Connection("main").Api.Transactions.ShowUnconfirmed("validId");

>>> ...
```

### Search Transactions

```csharp
var parameters = new Dictionary<string, string>
{
    {
        "amount", 1
    }
};
var searchedTransactions = ConnectionManager.Connection("main").Api.Transactions.Search(parameters);

>>> {'meta': {'count': 10, ... }}
```

### List Transaction Types

```csharp
var transactionTypes = ConnectionManager.Connection("main").Api.Transactions.Types();

>>> {"data":{...}}
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```csharp
var votes = ConnectionManager.Connection("main").Api.Votes.All();

>>> {'meta': {'count': 10, ... }}
```

### Retrieve a Vote

```csharp
var vote = ConnectionManager.Connection("main").Api.Votes.Show("validId");

>>> {'data': {...}}
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```csharp
var wallets = ConnectionManager.Connection("main").Api.Wallets.All();

>>> {'meta': {'count': 10, ... }}
```

### Retrieve a Wallet

```csharp
var wallet = ConnectionManager.Connection("main").Api.Wallets.Show("validId");

>>> {'data': {'address': 'validWalletAddress' ... }}
```

### List All Transactions of a Wallet

```csharp
var walletTransactions = ConnectionManager.Connection("main").Api.Wallets.Transactions("validId");

>>> {'meta': {'count': 10, ... }}
```

### List All Received Transactions of a Wallet

```csharp
var receivedTransactions = ConnectionManager.Connection("main").Api.Wallets.ReceivedTransactions();

>>> {'meta': {'count': 10, ... }}
```

### List All Sent Transactions of a Wallet

```csharp
var sentTransactions = ConnectionManager.Connection("main").Api.Wallets.SentTransactions();

>>> {'meta': {'count': 10, ... }}
```

### List All Votes of a Wallet

```csharp
var walletVotes = ConnectionManager.Connection("main").Api.Wallets.Votes();

>>> {'meta': {'count': 10, ... }}
```

### List All Top Wallets

```csharp
var topWallets = ConnectionManager.Connection("main").Api.Wallets.Top();

>>> {'meta': {'count': 10, ... }}
```

### Search All Wallets

```csharp
var parameters = new Dictionary<string, string>
{
    {
        "username", "dummy"
    }
};

var searchedWallets = ConnectionManager.Connection("main").Api.Wallets.Search(parameters);

>>> {'meta': {'count': 10, ... }}
```
