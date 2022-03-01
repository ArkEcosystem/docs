---
title: API Documentation
---

# API Documentation

<x-alert type="warning">
WARNING! This package is deprecated and is no longer maintained and supported.
</x-alert>

## ArkEcosystem.Client.API.Api

### `Api()`

```csharp
public Api(HttpClient client)
```

Class Constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Client |

#### Return Value

`Api`

## ArkEcosystem.Client.API.Blocks

### `Blocks()`

```csharp
public Blocks(HttpClient client)
```

Blocks class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Client |

#### Return Value

`Blocks`

### `All()`

```csharp
public Response<List<Block>> All(Dictionary<string, string> parameters = null)
```

List All Blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Block>>`

### `AllAsync()`

```csharp
public async Task<Response<List<Block>>> AllAsync(Dictionary<string, string> parameters = null)
```

List All Blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Block>>>`

### `Show()`

```csharp
public Response<Block> Show(string id)
```

Retrieve a Block

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Block ID |

#### Return Value

`Response<Block>`

### `ShowAsync()`

```csharp
public async Task<Response<Block>> ShowAsync(string id)
```

Retrieve a Block

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Block ID |

#### Return Value

`Task<Response<Block>>`

### `Transactions()`

```csharp
public Response<List<Transaction>> Transactions(string id, Dictionary<string, string> parameters = null)
```

List All Transactions of a Block

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Block ID |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Transaction>>`

### `TransactionsAsync()`

```csharp
public async Task<Response<List<Transaction>>> TransactionsAsync(string id, Dictionary<string, string> parameters = null)
```

List All Transactions of a Block

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Block ID |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `Search()`

```csharp
public Response<List<Block>> Search(Dictionary<string, string> parameters = null)
```

Search All Blocks

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Search parameters |

#### Return Value

`Response<List<Block>>`

### `SearchAsync()`

```csharp
public async Task<Response<List<Block>>> SearchAsync(Dictionary<string, string> parameters = null)
```

Search All Blocks

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Search parameters |

#### Return Value

`Task<Response<List<Block>>>`

## ArkEcosystem.Client.API.Delegates

### `Delegates()`

```csharp
public Delegates(HttpClient client)
```

Delegates class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Client |

#### Return Value

`Delegates`

### `All()`

```csharp
public Response<List<Delegate>> All(Dictionary<string, string> parameters = null)
```

List All Delegates

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`<List<Delegate>>`

### `AllAsync()`

```csharp
public async Task<Response<List<Delegate>>> AllAsync(Dictionary<string, string> parameters = null)
```

List All Delegates

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Delegate>>>`

### `Show()`

```csharp
public Response<Delegate> Show(string id)
```

Retrieve a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |

#### Return Value

`Response<Delegate>`

### `ShowAsync()`

```csharp
public async Task<Response<Delegate>> ShowAsync(string id)
```

Retrieve a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |

#### Return Value

`Task<Response<Delegate>>`

### `Blocks()`

```csharp
public Response<List<Block>> Blocks(string id, Dictionary<string, string> parameters = null)
```

List All Blocks of a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Block>>`

### `BlocksAsync()`

```csharp
public async Task<Response<List<Block>>> BlocksAsync(string id, Dictionary<string, string> parameters = null)
```

List All Blocks of a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Block>>>`

### `Voters()`

```csharp
public Response<List<Wallet>> Voters(string id, Dictionary<string, string> parameters = null)
```

List All Voters of a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Wallet>>`

### `VotersAsync()`

```csharp
public async Task<Response<List<Wallet>>> VotersAsync(string id, Dictionary<string, string> parameters = null)
```

List All Voters of a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Wallet>>>`

## ArkEcosystem.Client.API.Node

### `Node()`

```csharp
public Node(HttpClient client)
```

Node class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Client |

#### Return Value

`Node`

### `Configuration()`

```csharp
public Response<NodeConfiguration> Configuration()
```

Retrieve the Configuration

#### Return Value

`Response<NodeConfiguration>`

### `ConfigurationAsync()`

```csharp
public async Task<Response<NodeConfiguration>> ConfigurationAsync()
```

Retrieve the Configuration

#### Return Value

`Task<Response<NodeConfiguration>>`

### `Status()`

```csharp
public Response<NodeStatus> Status()
```

Retrieve the Status

#### Return Value

`Response<NodeStatus>`

### `StatusAsync()`

```csharp
public async Task<Response<NodeStatus>> StatusAsync()
```

Retrieve the Status

#### Return Value

`Task<Response<NodeStatus>>`

### `Syncing()`

```csharp
public Response<NodeSyncing> Syncing()
```

Retrieve the Syncing Status

#### Return Value

`Response<NodeSyncing>`

### `SyncingAsync()`

```csharp
public async Task<Response<NodeSyncing>> SyncingAsync()
```

Retrieve the Syncing Status

#### Return Value

`Task<Response<NodeSyncing>>`

## ArkEcosystem.Client.API.Peers

### `Peers()`

```csharp
public Peers(HttpClient client)
```

Peers class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Client |

#### Return Value

`Peers`

### `All()`

```csharp
public Response<List<Peer>> All()
```

List All Peers

#### Return Value

`Response<List<Peer>>`

### `AllAsync()`

```csharp
public async Task<Response<List<Peer>>> AllAsync(Dictionary<string, string> parameters = null)
```

List All Peers

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Peer>>>`

### `Show()`

```csharp
public Response<Peer> Show(string ip)
```

Retrieve a Peer

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | ip | Yes | IP address |

#### Return Value

`Response<Peer>`

### `ShowAsync()`

```csharp
public async Task<Response<Peer>> ShowAsync(string ip)
```

Retrieve a Peer

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | ip | Yes | IP address |

#### Return Value

`Task<Response<Peer>>`

## ArkEcosystem.Client.API.Transactions

### `Transactions()`

```csharp
public Transactions(HttpClient client)
```

Transactions class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Client |

#### Return Value

`Transactions`

### `Create()`

```csharp
public Response<Transaction> Create(Dictionary<string, dynamic> parameters)
```

Create a Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | Yes | Query parameters |

#### Return Value

`Response<Transaction>`

### `CreateAsync()`

```csharp
public async Task<Response<Transaction>> CreateAsync(Dictionary<string, dynamic> parameters)
```

Create a Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | Yes | Query parameters |

#### Return Value

`Task<Response<Transaction>>`

### `Show()`

```csharp
public Response<Transaction> Show(string id)
```

Retrieve a Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Transaction ID |

#### Return Value

`Response<Transaction>`

### `ShowAsync()`

```csharp
public async Task<Response<Transaction>> ShowAsync(string id)
```

Retrieve a Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Transaction ID |

#### Return Value

`Task<Response<Transaction>>`

### `All()`

```csharp
public Response<List<Transaction>> All(Dictionary<string, string> parameters = null)
```

List All Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Transaction>>`

### `AllAsync()`

```csharp
public async Task<Response<List<Transaction>>> AllAsync(Dictionary<string, string> parameters = null)
```

List All Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `AllUnconfirmed()`

```csharp
public Response<List<Transaction>> AllUnconfirmed(Dictionary<string, string> parameters = null)
```

List All Unconfirmed Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Transaction>>`

### `AllUnconfirmedAsync()`

```csharp
public async Task<Response<List<Transaction>>> AllUnconfirmedAsync(Dictionary<string, string> parameters = null)
```

List All Unconfirmed Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `ShowUnconfirmed()`

```csharp
public Response<List<Transaction>> ShowUnconfirmed(string id)
```

Get Unconfirmed Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Transaction ID |

#### Return Value

`Response<List<Transaction>>`

### `ShowUnconfirmedAsync()`

```csharp
public async Task<Response<List<Transaction>>> ShowUnconfirmedAsync(string id)
```

Get Unconfirmed Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Transaction ID |

#### Return Value

`Task<Response<List<Transaction>>>`

### `Search()`

```csharp
public Response<List<Transaction>> Search(Dictionary<string, string> parameters)
```

Search Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | Yes | Search parameters |

#### Return Value

`Response<List<Transaction>>`

### `SearchAsync()`

```csharp
public async Task<Response<List<Transaction>>> SearchAsync(Dictionary<string, string> parameters)
```

Search Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | Yes | Search parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `Types()`

```csharp
public Response<TransactionTypes> Types()
```

List Transaction Types

#### Return Value

`Response<TransactionTypes>`

### `TypesAsync()`

```csharp
public async Task<Response<TransactionTypes>> TypesAsync()
```

List Transaction Types

#### Return Value

`Task<Response<TransactionTypes>>`

## ArkEcosystem.Client.API.Votes

### `Votes()`

```csharp
public Votes(HttpClient client)
```

Votes class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Clients |

#### Return Value

`Votes`

### `All()`

```csharp
public Response<List<Transaction>> All(Dictionary<string, string> parameters = null)
```

List All Votes

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | Yes | Query parameters |

#### Return Value

`Response<List<Transaction>>`

### `AllAsync()`

```csharp
public async Task<Response<List<Transaction>>> AllAsync(Dictionary<string, string> parameters = null)
```

List All Votes

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | Yes | Query parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `Show()`

```csharp
public Response<Transaction> Show(string id)
```

Retrieve a Vote

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Vote ID |

#### Return Value

`Response<Transaction>`

### `ShowAsync()`

```csharp
public async Task<Response<Transaction>> ShowAsync(string id)
```

Retrieve a Vote

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Vote ID |

#### Return Value

`Task<Response<Transaction>>`

## ArkEcosystem.Client.API.Wallets

### `Wallets()`

```csharp
public Wallets(HttpClient client)
```

Wallets class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Client |

#### Return Value

`Wallets`

### `All()`

```csharp
public Response<List<Wallet>> All(Dictionary<string, string> parameters = null)
```

Retrieve All Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query Parameters |

#### Return Value

`Response<List<Wallet>>`

### `AllAsync()`

```csharp
public async Task<Response<List<Wallet>>> AllAsync(Dictionary<string, string> parameters = null)
```

Retrieve All Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query Parameters |

#### Return Value

`Task<Response<List<Wallet>>>`

### `Show()`

```csharp
public Response<Wallet> Show(string id)
```

Retrieve a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |

#### Return Value

`Response<Wallet>`

### `ShowAsync()`

```csharp
public async Task<Response<Wallet>> ShowAsync(string id)
```

Retrieve a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |

#### Return Value

`Task<Response<Wallet>>`

### `Transactions()`

```csharp
public Response<List<Transaction>> Transactions(string id, Dictionary<string, string> parameters = null)
```

List All Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Transaction>>`

### `TransactionsAsync()`

```csharp
public async Task<Response<List<Transaction>>> TransactionsAsync(string id, Dictionary<string, string> parameters = null)
```

List All Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `ReceivedTransactions()`

```csharp
public Response<List<Transaction>> ReceivedTransactions(string id, Dictionary<string, string> parameters = null)
```

List All Received Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Transaction>>`

### `ReceivedTransactionsAsync()`

```csharp
public async Task<Response<List<Transaction>>> ReceivedTransactionsAsync(string id, Dictionary<string, string> parameters = null)
```

List All Received Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `SentTransactions()`

```csharp
public Response<List<Transaction>> SentTransactions(string id, Dictionary<string, string> parameters = null)
```

List All Sent Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Transaction>>`

### `SentTransactionsAsync()`

```csharp
public async Task<Response<List<Transaction>>> SentTransactionsAsync(string id, Dictionary<string, string> parameters = null)
```

List All Sent Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `Votes()`

```csharp
public Response<List<Transaction>> Votes(string id, Dictionary<string, string> parameters = null)
```

List All Votes of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Transaction>>`

### `VotesAsync()`

```csharp
public async Task<Response<List<Transaction>>> VotesAsync(string id, Dictionary<string, string> parameters = null)
```

List All Votes of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Transaction>>>`

### `Search()`

```csharp
public Response<List<Wallet>> Search(Dictionary<string, string> parameters)
```

List All Top Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | Yes | Search parameters |

#### Return Value

`Response<List<Wallet>>`

### `SearchAsync()`

```csharp
public async Task<Response<List<Wallet>>> SearchAsync(Dictionary<string, string> parameters)
```

List All Top Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | Yes | Search parameters |

#### Return Value

`Task<Response<List<Wallet>>>`

### `Top()`

```csharp
public Response<List<Wallet>> Top(Dictionary<string, string> parameters = null)
```

List All Top Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Response<List<Wallet>>`

### `TopAsync()`

```csharp
public async Task<Response<List<Wallet>>> TopAsync(Dictionary<string, string> parameters = null)
```

List All Top Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Dictionary | parameters | No | Query parameters |

#### Return Value

`Task<Response<List<Wallet>>>`

## ArkEcosystem.Client.Connection

### `Connection()`

```csharp
public Connection(HttpClient client)
```

Constructor of the Connection class.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| HttpClient | client | Yes | Client |

#### Return Value

`Connection`

## ArkEcosystem.Client.ConnectionManager

### `Connect()`

```csharp
public IConnection Connect(IConnection connection, string name = "main")
```

Constructor of the Connection class.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| IConnection | connection | Yes | Connection instance |
| string | name | No | Connection name |

#### Return Value

`IConnection`

### `Disconnect()`

```csharp
public void Disconnect(string name = null)
```

Disconnect from given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | name | No | Connection name |

#### Return Value

`void`

### `Connection()`

```csharp
public IConnection Connection(string name = null)
```

Get a connection instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | name | No | Connection name |

#### Return Value

`IConnection`

### `GetDefaultConnection()`

```csharp
public string GetDefaultConnection()
```

Get the default connection name.

#### Return Value

`string`

### `SetDefaultConnection()`

```csharp
public void SetDefaultConnection(string name)
```

Set the default connection name.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | name | No | Connection name |

#### Return Value

`void`

### `GetConnections()`

```csharp
public Dictionary<string, IConnection> GetConnections()
```

Return all of the created connections.

#### Return Value

`Dictionary<string, IConnection>`
