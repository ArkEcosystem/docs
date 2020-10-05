---
title: API Documentation
---

# API Documentation

## client

### `NewClient()`

```go
func NewClient(httpClient *http.Client) *Client
```

Create a new Connection class instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*http.Client | httpClient | Yes | Client |

#### Return Value

`*Client`

## client.blocks

### `List()`

```go
func (s *BlocksService) List(ctx context.Context, query *Pagination) (*Blocks, *http.Response, error)
```

Get all blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Blocks, *http.Response, error`

### `Get()`

```go
func (s *BlocksService) Get(ctx context.Context, id int) (*GetBlock, *http.Response, error)
```

Get a block by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| int | id | Yes | Block ID |

#### Return Value

`*GetBlock, *http.Response, error`

### `Transactions()`

```go
func (s *BlocksService) Transactions(ctx context.Context, id int, query *Pagination) (*GetBlockTransactions, *http.Response, error)
```

Get all transactions by the given block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| int | id | Yes | Block ID |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*GetBlockTransactions, *http.Response, error`

### `Search()`

```go
func (s *BlocksService) Search(ctx context.Context, query *Pagination, body *BlocksSearchRequest) (*Blocks, *http.Response, error)
```

Filter all blocks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |
| \*BlocksSearchRequest | body | No | Search parameters |

#### Return Value

`*Blocks, *http.Response, error`

## client.delegates

### `List()`

```go
func (s *DelegatesService) List(ctx context.Context, query *Pagination) (*Delegates, *http.Response, error)
```

Get all delegates.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |

#### Return Value

`(*Delegates, *http.Response, error)`

### `Get()`

```go
func (s *DelegatesService) Get(ctx context.Context, id string) (*GetDelegate, *http.Response, error)
```

Get a delegate by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | ... |
| string | id | Yes | ... |

#### Return Value

`(*GetDelegate, *http.Response, error)`

### `Blocks()`

```go
func (s *DelegatesService) Blocks(ctx context.Context, id string, query *Pagination) (*GetDelegateBlocks, *http.Response, error)
```

Get all blocks for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Delegate identifier |
| \*Pagination | query | No | Query parameters |

#### Return Value

`(*GetDelegateBlocks, *http.Response, error)`

### `Voters()`

```go
func (s *DelegatesService) Voters(ctx context.Context, id string, query *Pagination) (*GetDelegateVoters, *http.Response, error)
```

Get all voters for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Delegate identifier |
| \*Pagination | query | No | Query parameters |

#### Return Value

`(*GetDelegateVoters, *http.Response, error)`

## client.node

### `Configuration()`

```go
func (s *NodeService) Configuration(ctx context.Context) (*GetNodeConfiguration, *http.Response, error)
```

Get the node configuration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |

#### Return Value

`*GetNodeConfiguration, *http.Response, error`

### `Status()`

```go
func (s *NodeService) Status(ctx context.Context) (*GetNodeStatus, *http.Response, error)
```

Get the node status.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |

#### Return Value

`*GetNodeStatus, *http.Response, error`

### `Syncing()`

```go
func (s *NodeService) Syncing(ctx context.Context) (*GetNodeSyncing, *http.Response, error)
```

Get the node syncing status.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |

#### Return Value

`*GetNodeSyncing, *http.Response, error`

## client.peers

### `List()`

```go
func (s *PeersService) List(ctx context.Context, query *Pagination) (*Peers, *http.Response, error)
```

Get all peers.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |

#### Return Value

`(*Peers, *http.Response, error)`

### `Get()`

```go
func (s *PeersService) Get(ctx context.Context, ip string) (*GetPeer, *http.Response, error)
```

Get a peer by the given IP address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | ip | Yes | IP address |

#### Return Value

`(*GetPeer, *http.Response, error)`

## client.transactions

### `Create()`

```go
func (s *TransactionsService) Create(ctx context.Context, body *CreateTransactionRequest) (*CreateTransaction, *http.Response, error)
```

Create a new transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| object\[\] | payload | Yes | Transaction to broadcast |

#### Return Value

`*CreateTransaction, *http.Response, error`

### `Get()`

```go
func (s *TransactionsService) Get(ctx context.Context, id string) (*GetTransaction, *http.Response, error)
```

Get a transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Transaction ID |

#### Return Value

`*GetTransaction, *http.Response, error`

### `List()`

```go
func (s *TransactionsService) List(ctx context.Context, query *Pagination) (*Transactions, *http.Response, error)
```

Get all transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Transactions, *http.Response, error`

### `ListUnconfirmed()`

```go
func (s *TransactionsService) ListUnconfirmed(ctx context.Context, query *Pagination) (*Transactions, *http.Response, error)
```

Get all unconfirmed transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Transactions, *http.Response, error`

### `GetUnconfirmed()`

```go
func (s *TransactionsService) GetUnconfirmed(ctx context.Context, id string) (*GetTransaction, *http.Response, error)
```

Get an unconfirmed transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Transaction ID |

#### Return Value

`*GetTransaction, *http.Response, error`

### `Search()`

```go
func (s *TransactionsService) Search(ctx context.Context, query *Pagination, body *TransactionsSearchRequest) (*Transactions, *http.Response, error)
```

Filter all transactions by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |
| \*TransactionsSearchRequest | query | No | Search parameters |

#### Return Value

`*Transactions, *http.Response, error`

### `Types()`

```go
func (s *TransactionsService) Types(ctx context.Context) (*TransactionTypes, *http.Response, error)
```

Get a list of valid transaction types.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |

#### Return Value

`*TransactionTypes, *http.Response, error`

## client.votes

### `List()`

```go
func (s *VotesService) List(ctx context.Context, query *Pagination) (*Transactions, *http.Response, error)
```

Get all votes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Transactions, *http.Response, error`

### `Get()`

```go
func (s *VotesService) Get(ctx context.Context, id string) (*GetTransaction, *http.Response, error)
```

Get a vote by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Vote ID |

#### Return Value

`*GetTransaction, *http.Response, error`

## client.wallets

### `List()`

```go
func (s *WalletsService) List(ctx context.Context, query *Pagination) (*Wallets, *http.Response, error)
```

Get all wallets.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Wallets, *http.Response, error`

### `Get()`

```go
func (s *WalletsService) Get(ctx context.Context, id string) (*GetWallet, *http.Response, error)
```

Get a wallet by the given id.

#### Parameters

| Type | Name | Required | Description       s |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Wallet identifier |

#### Return Value

`*GetWallet, *http.Response, error`

### `Transactions()`

```go
func (s *WalletsService) Transactions(ctx context.Context, id string, query *Pagination) (*Transactions, *http.Response, error)
```

Get all transactions for the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Wallet identifier |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Transactions, *http.Response, error`

### `Receivedtransactions()`

```go
func (s *WalletsService) ReceivedTransactions(ctx context.Context, id string, query *Pagination) (*Transactions, *http.Response, error)
```

Get all transactions received by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Wallet identifier |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Transactions, *http.Response, error`

### `SentTransactions()`

```go
func (s *WalletsService) SentTransactions(ctx context.Context, id string, query *Pagination) (*Transactions, *http.Response, error)
```

Get all transactions sent by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Wallet identifier |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Transactions, *http.Response, error`

### `Votes()`

```go
func (s *WalletsService) Votes(ctx context.Context, id string, query *Pagination) (*Transactions, *http.Response, error)
```

Get all votes by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| string | id | Yes | Wallet identifier |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Transactions, *http.Response, error`

### `Top()`

```go
func (s *WalletsService) Top(ctx context.Context, query *Pagination) (*Wallets, *http.Response, error)
```

Get all wallego sorted by balance in descending order.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |

#### Return Value

`*Wallets, *http.Response, error`

### `Search()`

```go
func (s *WalletsService) Search(ctx context.Context, query *Pagination, body *WalletsSearchRequest) (*Wallets, *http.Response, error)
```

Filter all wallego by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| context.Context | ctx | Yes | Context |
| \*Pagination | query | No | Query parameters |
| \*WalletsSearchRequest | body | Yes | Search parameters |

#### Return Value

`*Wallets, *http.Response, error`
