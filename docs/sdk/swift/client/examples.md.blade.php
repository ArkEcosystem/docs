---
title: Examples
---

# Examples

## Initialization

```swift
import Client

let conn = Connection(host: "http://127.0.0.1:4003/api")
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```swift
let blocks = Blocks(connection: conn)

var response: [String: Any]?

blocks.transactions(limit: 10, completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### Retrieve a Block

```swift
let blocks = Blocks(connection: conn)

var response: [String: Any]?

blocks.get(id: "validBlockId", completionHandler: { (response) in
    response = res
    print(response)
})

>>> {'data': {'id': 'validBlockId' ... }}
```

### List All Transactions of a Block

```swift
let blocks = Blocks(connection: conn)

var response: [String: Any]?

blocks.transactions(id: "validBlockId", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### Search All Blocks

```swift
let blocks = Blocks(connection: conn)

var response: [String: Any]?

blocks.search(body: ["generatorPublicKey": "validPublicKey"], completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 100, ... }}
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent (it does not have to be recast unless a wallet wishes to change from delegate). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```swift
let delegates = Delegates(connection: conn)

var response: [String: Any]?

delegates.all(limit: 20, completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 20, ... }}
```

### Retrieve a Delegate

```swift
let delegates = Delegates(connection: conn)

var response: [String: Any]?

delegates.get(byName: "delegateName", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'data': {'username': 'delegateName', ... }}
```

### List All Blocks of a Delegate

```swift
let delegates = Delegates(connection: conn)

var response: [String: Any]?

delegates.blocks(byName: "delegateName", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 100, ... }}
```

### List All Voters of a Delegate

```swift
let delegates = Delegates(connection: conn)

var response: [String: Any]?

delegates.voters(byName: "delegateName", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

## Node

The ARK network consists of different anonymous nodes (servers), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```swift
let node = Node(connection: conn)

var response: [String: Any]?

node.configuration(completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'data': {'nethash': '6e84d08bd299ed97c212c886c98a57e36545c8f5d645ca7eeae63a8bd62d8988', ... }}
```

### Retrieve the Status

```swift
let node = Node(connection: conn)

var response: [String: Any]?

node.status(completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'data': {'synced': True, 'now': 6897158, 'blocksCount': -1}}
```

### Retrieve the Syncing Status

```swift
let node = Node(connection: conn)

var response: [String: Any]?

node.syncing(completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'data': {'syncing': False, 'blocks': -1, 'height': 6897160, 'id': '12905037940821862953'}}
```

### Retrieve the Node Fees

```swift
let node = Node(connection: conn)

var response: [String: Any]?

node.fees(completionHandler: { (res) in
    response = res
    print(response)
})

>>> {"meta":{"days":7, ...}}
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```swift
let peers = Peers(connection: conn)

var response: [String: Any]?

peers.all(completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 100, ... }}
```

### Retrieve a Peer

```swift
let peers = Peers(connection: conn)

var response: [String: Any]?

peers.status(completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'data': {'count': 20, ... }} # Need to changes
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```swift
let transactions = Transactions(connection: conn)

var response: [String: Any]?

transactions.create(body: [transaction], completionHandler: { (res) in
    response = res
    print(response)
})

>>> ...
```

### Retrieve a Transaction

```swift
let transactions = Transactions(connection: conn)

var response: [String: Any]?

transactions.get(id: "validTransactionId", completionHandler: { (res) in
    response = res
    print(response)
})

>>> ...
```

### List All Transactions

```swift
let transactions = Transactions(connection: conn)

var response: [String: Any]?

transactions.all(limit: 10, completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### List All Unconfirmed Transactions

```swift
let transactions = Transactions(connection: conn)

var response: [String: Any]?

transactions.allUnconfirmed(limit: 10, completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### Get Unconfirmed Transaction

```swift
let transactions = Transactions(connection: conn)

var response: [String: Any]?

transactions.getUnconfirmed(id: "validTransactionId", completionHandler: { (res) in
    response = res
    print(response)
})

>>> ...
```

### Search Transactions

```swift
let transactions = Transactions(connection: conn)

var response: [String: Any]?

transactions.search(body: ["amount": 100000], completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### List Transaction Types

```swift
let transactions = Transactions(connection: conn)

var response: [String: Any]?

transactions.types(completionHandler: { (res) in
    response = res
    print(response)
})

>>> {"data":{...}}
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```swift
let votes = Votes(connection: conn)

var response: [String: Any]?

votes.all(limit: 10, completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### Retrieve a Vote

```swift
let votes = Votes(connection: conn)

var response: [String: Any]?

votes.get(id: "validVoteId", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'data': {...}}
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```swift
let wallets = Wallets(connection: conn)

var response: [String: Any]?

wallets.all(limit: 10, completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### Retrieve a Wallet

```swift
let wallets = Wallets(connection: conn)

var response: [String: Any]?

wallets.all(byAddress: "validWalletAddress", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'data': {'address': 'validWalletAddress' ... }}
```

### List All Transactions of a Wallet

```swift
let wallets = Wallets(connection: conn)

var response: [String: Any]?

wallets.transactions(byAddress: "validWalletAddress", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### List All Received Transactions of a Wallet

```swift
let wallets = Wallets(connection: conn)

var response: [String: Any]?

wallets.receivedTransactions(byAddress: "validWalletAddress", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### List All Sent Transactions of a Wallet

```swift
let wallets = Wallets(connection: conn)

var response: [String: Any]?

wallets.sentTransactions(byAddress: "validWalletAddress", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### List All Votes of a Wallet

```swift
let wallets = Wallets(connection: conn)

var response: [String: Any]?

wallets.votes(byAddress: "validWalletAddress", completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### List All Top Wallets

```swift
let wallets = Wallets(connection: conn)

var response: [String: Any]?

wallets.top(limit: 10, completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```

### Search All Wallets

```swift
let wallets = Wallets(connection: conn)

var response: [String: Any]?

wallets.all(body: ["balance": 0], completionHandler: { (res) in
    response = res
    print(response)
})

>>> {'meta': {'count': 10, ... }}
```
