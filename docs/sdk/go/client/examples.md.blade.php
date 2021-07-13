---
title: Examples
---

# Examples

## Initialization

```go
package main

import (
    "net/url"

    ark "github.com/ARKEcosystem/go-client/client"
)

func main() {
    // OPTIONAL: client accepts a *http.Client.
    // Defaults to http.DefaultClient
    client := ark.NewClient(nil)

    // OPTIONAL: You can specify the URL of your choice.
    // Defaults to "https://dexplorer.ark.io:8443/api/"
    url, _ := url.Parse("http://127.0.0.1:4003/api")
    client.BaseURL = url
}
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Blocks.List(context.Background(), query)

>>> (*Blocks, *http.Response, error)
```

### Retrieve a Block

```go
responseStruct, response, err := client.Blocks.List(context.Background(), validBlockId)

>>> (*GetBlock, *http.Response, error)
```

### List All Transactions of a Block

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Blocks.List(context.Background(), validBlockId, query)

>>> *GetBlockTransactions, *http.Response, error
```

### Search All Blocks

```go
query := &Pagination{Limit: 1}
body := &BlocksSearchRequest{Id: "validBlockId"}
responseStruct, response, err := client.Blocks.List(context.Background(), query)

>>> *Blocks, *http.Response, error
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent (it does not have to be recast unless a wallet wishes to change from delegate). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Delegates.List(context.Background(), query)

>>> (*Delegates, *http.Response, error)
```

### Retrieve a Delegate

```go
responseStruct, response, err := client.Delegates.Get(context.Background(), "validDelegateId")

>>> (*GetDelegate, *http.Response, error)
```

### List All Blocks of a Delegate

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Delegates.Blocks(context.Background(), "validDelegateId", query)

>>> (*GetDelegateBlocks, *http.Response, error)
```

### List All Voters of a Delegate

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Delegates.Blocks(context.Background(), "validDelegateId", query)

>>> (*GetDelegateVoters, *http.Response, error)
```

## Node

The ARK network consists of different anonymous nodes (servers), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```go
responseStruct, response, err := client.Node.Configuration(context.Background())

>>> *GetNodeConfiguration, *http.Response, error
```

### Retrieve the Status

```go
responseStruct, response, err := client.Node.Status(context.Background())

>>> *GetNodeStatus, *http.Response, error
```

### Retrieve the Syncing Status

```go
responseStruct, response, err := client.Node.Syncing(context.Background())

>>> *GetNodeSyncing, *http.Response, error
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Peers.List(context.Background(), query)

>>> *Peers, *http.Response, error
```

### Retrieve a Peer

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Peers.Get(context.Background(), "validIpAddress")

>>> *GetPeer, *http.Response, error
```

## Transactions

The heart of any blockchain is formed by igo transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```go
body := &CreateTransactionRequest{
        Transactions: []Transaction@{{
            Id:            "dummy",
            BlockId:       "dummy",
            Type:          0,
            Amount:        10000000,
            Fee:           10000000,
            Sender:        "dummy",
            Recipient:     "dummy",
            Signature:     "dummy",
            VendorField:   "dummy",
            Confirmations: 10,
            Timestamp: Timestamp{
                Epoch: 40505460,
                Unix:  1530606660,
                Human: "2018-07-03T08:31:00Z",
            },
        }},
    }
responseStruct, response, err := client.Transactions.Create(context.Background(), query)

>>> *CreateTransaction, *http.Response, error
```

### Retrieve a Transaction

```go
responseStruct, response, err := client.Transactions.Get(context.Background(), "validTxId")

>>> *GetTransaction, *http.Response, error
```

### List All Transactions

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Transactions.List(context.Background(), query)

>>> *Transactions, *http.Response, error
```

### List All Unconfirmed Transactions

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Transactions.ListUnconfirmed(context.Background(), query)

>>> *Transactions, *http.Response, error
```

### Get Unconfirmed Transaction

```go
responseStruct, response, err := client.Transactions.GetUnconfirmed(context.Background(), "validTxId")

>>> *GetTransaction, *http.Response, error
```

### Search Transactions

```go
query := &Pagination{Limit: 1}
body := &TransactionsSearchRequest{Id: "validTxId"}
responseStruct, response, err := client.Transactions.Search(context.Background(), query)

>>> *Transactions, *http.Response, error
```

### List Transaction Types

```go
responseStruct, response, err := client.Transactions.Types(context.Background())

>>> *TransactionTypes, *http.Response, error
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Votes.List(context.Background(), query)

>>> *Transactions, *http.Response, error
```

### Retrieve a Vote

```go
responseStruct, response, err := client.Votes.Get(context.Background(), "validVoteId")

>>> *GetTransaction, *http.Response, error
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Wallets.List(context.Background(), query)

>>> *Wallets, *http.Response, error
```

### Retrieve a Wallet

```go
responseStruct, response, err := client.Wallets.Get(context.Background(), "validVoteId")

>>> *GetWallet, *http.Response, error
```

### List All Transactions of a Wallet

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Wallets.Transactions(context.Background(), query)

>>> *Transactions, *http.Response, error
```

### List All Received Transactions of a Wallet

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Wallets.ReceivedTransactions(context.Background(), query)

>>> *Transactions, *http.Response, error
```

### List All Sent Transactions of a Wallet

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Wallets.SentTransactions(context.Background(), query)

>>> *Transactions, *http.Response, error
```

### List All Votes of a Wallet

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Wallets.Votes(context.Background(), "validWalletId", query)

>>> *Transactions, *http.Response, error
```

### List All Top Wallets

```go
query := &Pagination{Limit: 1}
responseStruct, response, err := client.Wallets.Top(context.Background(), query)

>>> *Wallets, *http.Response, error
```

### Search All Wallets

```go
query := &Pagination{Limit: 1}
body := &WalletsSearchRequest{Address: "validAddress"}
responseStruct, response, err := client.Wallets.List(context.Background(), query, body)

>>> *Wallets, *http.Response, error
```
