---
title: API Documentation
---

# API Documentation

## api::mod::Api

### `new()`

```rust
pub fn new(host: &str)
```

Instantiate new Api.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | host | Yes | Node url |

#### Return Value

`Api`

### `new_with_client()`

```rust
pub fn new_with_client(client: &Client)
```

Instantiate new Api with an already existing Client.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &Client | client | Yes | Client |

#### Return Value

`Api`

## api::blocks::Blocks

### `new()`

```rust
pub fn new(client: Client)
```

Instantiate new Blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &Client | client | Yes | Client |

#### Return Value

`Blocks`

### `all()`

```rust
pub fn all(&self)
```

Get all blocks.

#### Return Value

`Result<Vec<Block>>`

### `all_params()`

```rust
pub fn all_params<I, K, V>(&self, parameters: I)
```

Get all blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Block>>`

### `show()`

```rust
pub fn show(&self, id: &str)
```

Get a block by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Block ID |

#### Return Value

`Result<Block>`

### `transactions()`

```rust
pub fn transactions(&self, id: &str)
```

Get all transactions by the given block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Block ID |

#### Return Value

`Result<Vec<Transaction>>`

### `transactions_params()`

```rust
pub fn transactions_params<I, K, V>(&self, id: &str, parameters: I)
```

Get all transactions by the given block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Block ID |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Transaction>>`

### `search()`

```rust
pub fn search<I, K, V>(&self, parameters: I)
```

Filter all blocks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | Yes | Search parameters |

#### Return Value

`Result<Vec<Block>>`

## api::delegates::Delegates

### `new()`

```rust
pub fn new(client: Client)
```

Instantiate new Delegates.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

#### Return Value

`Delegates`

### `all()`

```rust
pub fn all(&self)
```

Get all accounts.

#### Return Value

`Result<Vec<Delegate>>`

### `all_params()`

```rust
pub fn all_params<I, K, V>(&self, parameters: I)
```

Get all accounts.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Delegate>>`

### `show()`

```rust
pub fn show(&self, id: &str)
```

Get a delegate by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Delegate identifier |

#### Return Value

`Result<Delegate>`

### `blocks()`

```rust
pub fn blocks(&self, id: &str)
```

Get all blocks for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Delegate identifier |

#### Return Value

`Result<Vec<Block>>`

### `blocks_params()`

```rust
pub fn blocks_params<I, K, V>(&self, id: &str, parameters: I)
```

Get all blocks for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Delegate identifier |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Block>>`

### `voters()`

```rust
pub fn voters(&self, id: &str)
```

Get all voters for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Delegate identifier |

#### Return Value

`Result<Vec<Wallet>>`

### `voters_params()`

```rust
pub fn voters_params<I, K, V>(&self, id: &str, parameters: I)
```

Get all voters for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Delegate identifier |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Wallet>>`

### `voters_balances()`

```rust
pub fn voters_balances(&self, id: &str)
```

Returns the voters of a delegate and their balances.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Delegate identifier |

#### Return Value

`Result<Balances>`

### `search()`

```rust
 pub fn search<I, K, V>(
        &self,
        payload: Option<HashMap<&str, &str>>,
        parameters: I,
)
```

Searches the delegates.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Option&gt; | payload | Yes | Search parameters |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Delegate>>`

## api::node::Node

### `new()`

```rust
pub fn new(client: Client)
```

Instantiate new Node.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Clients |

#### Return Value

`Node`

### `configuration()`

```rust
pub fn configuration(&self)
```

Get the node configuration.

#### Return Value

`Result<NodeConfiguration>`

### `status()`

```rust
pub fn status(&self)
```

Get the node status.

#### Return Value

`Result<NodeStatus>`

### `syncing()`

```rust
pub fn syncing(&self)
```

Get the node syncing status.

#### Return Value

`Result<NodeSyncing>`

## api::peers::Peers

### `new()`

```rust
pub fn new(client: Client)
```

Instantiate new Peers.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

#### Return Value

`Peers`

### `all()`

```rust
pub fn all(&self)
```

Get all peers.

#### Return Value

`Result<Vec<Peer>>`

### `all_params()`

```rust
pub fn all_params<I, K, V>(&self, parameters: I)
```

Get all peers.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | No | Query parameters |

#### Return Value

`Result<Vec<Peer>>`

### `show()`

```rust
pub fn show(&self, ip_addr: &str)
```

Get a peer by the given IP address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | ip_address | Yes | IP address |

#### Return Value

`Result<Peer>`

## api::transactions::Transactions

### `new()`

```rust
pub fn new(client: Client)
```

Instantiate new Transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

#### Return Value

`Transactions`

### `create()`

```rust
pub fn create(&self, transactions: Vec<&str>)
```

Create a new transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Vec&lt;&str&gt; | transactions | Yes | Transaction(s) to broadcast |

#### Return Value

`Result<Transaction>`

### `show()`

```rust
pub fn show(&self, id: &str)
```

Get a transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Transaction ID |

#### Return Value

`Result<Transaction>`

### `all()`

```rust
pub fn all(&self)
```

Get all transactions.

#### Return Value

`Result<Vec<Transaction>>`

### `all_params()`

```rust
pub fn all_params<I, K, V>(&self, parameters: I)
```

Get all transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | No | Query parameters |

#### Return Value

`Result<Vec<Transaction>>`

### `all_unconfirmed()`

```rust
pub fn all_unconfirmed(&self)
```

Get all unconfirmed transactions.

#### Return Value

`Result<Vec<Transaction>>`

### `all_unconfirmed_params()`

```rust
pub fn all_unconfirmed_params<I, K, V>(&self, parameters: I)
```

Get all unconfirmed transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | No | Query parameters |

#### Return Value

`Result<Vec<Transaction>>`

### `show_unconfirmed()`

```rust
pub fn show_unconfirmed(&self, id: &str)
```

Get an unconfirmed transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Transaction ID |

#### Return Value

`Result<Vec<Transaction>>`

### `search()`

```rust
pub fn search<I, K, V>(
        &self,
        payload: Option<HashMap<&str, &str>>,
        parameters: I,
)
```

Filter all transactions by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Option&gt; | payload | Yes | Search parameters |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Transaction>>`

### `types()`

```rust
pub fn types(&self)
```

Get a list of valid transaction types.

#### Return Value

`Result<TransactionTypes>`

### `fees()`

```rust
pub fn fees(&self)
```

Returns the static fees of the last block processed by the node.

#### Return Value

`Result<TransactionFees>`

## api::votes::Votes

### `new()`

```rust
pub fn new(client: Client)
```

Instantiate new Votes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

#### Return Value

`Votes`

### `all()`

```rust
pub fn all(&self)
```

Get all votes.

#### Return Value

`Result<Vec<Transaction>>`

### `all_params()`

```rust
pub fn all_params<I, K, V>(&self, parameters: I)
```

Get all votes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | No | Query parameters |

#### Return Value

`Result<Vec<Transaction>>`

### `show()`

```rust
pub fn show(&self, id: &str)
```

Get a vote by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Vote ID |

#### Return Value

`Result<Transaction>`

## api::wallets::Wallets

### `new()`

```rust
pub fn new(client: Client)
```

Instantiate new Wallets.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

#### Return Value

`Wallets`

### `all()`

```rust
pub fn all(&self)
```

Get all wallets.

#### Return Value

`Result<Vec<Wallet>>`

### `all_params()`

```rust
pub fn all_params<I, K, V>(&self, parameters: I)
```

Get all wallets.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | No | Query parameters |

#### Return Value

`Result<Vec<Wallet>>`

### `show()`

```rust
pub fn show(&self, id: &str)
```

Get a wallet by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Wallet identifier |

#### Return Value

`Result<Wallet>`

### `transactions()`

```rust
pub fn transactions(&self, id: &str)
```

Get all transactions for the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Wallet identifier |

#### Return Value

`Result<Vec<Transaction>>`

### `transactions_params()`

```rust
pub fn transactions_params<I, K, V>(&self, id: &str, parameters: I)
```

Get all transactions for the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Wallet identifier |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Transaction>>`

### `received_transactions()`

```rust
pub fn received_transactions(&self, id: &str)
```

Get all transactions received by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Wallet identifier |

#### Return Value

`Result<Vec<Transaction>>`

### `received_transactions_params()`

```rust
pub fn received_transactions_params<I, K, V>(
        &self,
        id: &str,
        parameters: I,
)
```

Get all transactions received by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Wallet identifier |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Transaction>>`

### `sent_transactions()`

```rust
pub fn sent_transactions(&self, id: &str)
```

Get all transactions sent by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Wallet identifier |

#### Return Value

`Result<Vec<Transaction>>`

### `sent_transactions_params()`

```rust
pub fn sent_transactions_params<I, K, V>(
        &self,
        id: &str,
        parameters: I,
)
```

Get all transactions sent by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Wallet identifier |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<Vec<Transaction>>`

### `votes()`

```rust
pub fn votes(&self, id: &str)
```

Get all votes by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | id | Yes | Wallet identifier |

#### Return Value

`Result<Vec<Transaction>>`

### `top()`

```rust
pub fn top(&self)
```

Get all wallets sorted by balance in descending order.

#### Return Value

`Result<Vec<Wallet>>`

### `top_params()`

```rust
pub fn top_params<I, K, V>(&self, parameters: I)
```

Get all wallets sorted by balance in descending order.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | No | Query parameters |

#### Return Value

`Result<Vec<Wallet>>`

### `search()`

```rust
pub fn search<I, K, V>(&self, parameters: I)
```

Filter all wallets by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| I | parameters | No | Query parameters |

#### Return Value

`Result<Vec<Wallet>>`

## connection::manager::Manager

### `new()`

```rust
pub fn new()
```

Instantiate new Manager.

#### Return Value

`Manager<'a>`

### `connect()`

```rust
pub fn connect(&mut self, connection: &'a Connection)
```

Connect to the given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &'a Connection | connection | Yes | Connection |

#### Return Value

`Result<(), &str>`

### `connect_as()`

```rust
pub fn connect_as(&mut self, connection: &'a Connection, name: &str)
```

Connect to the given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &'a Connection | connection | Yes | Connection |
| &str | name | Yes | Connection name |

#### Return Value

`Result<(), &str>`

### `disconnect()`

```rust
pub fn disconnect(&mut self, name: &str)
```

Disconnect from given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | name | Yes | Connection name |

#### Return Value

`Void`

### `connection()`

```rust
pub fn connection(&self)
```

Get a connection instance.

#### Return Value

`Option<&'a Connection>`

### `connection_by_name()`

```rust
pub fn connection_by_name(&self, name: &str)
```

Get the connection by name.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | name | Yes | Connection name |

#### Return Value

`Option<&'a Connection>`

### `get_default_connection()`

```rust
pub fn get_default_connection(&self)
```

Get the default connection name.

#### Return Value

`String`

### `set_default_connection()`

```rust
pub fn set_default_connection(&mut self, name: &str)
```

Set the default connection name.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | name | Yes | Connection name |

#### Return Value

`Void`

### `connections()`

```rust
pub fn connections(&self)
```

Return all of the created connections.

#### Return Value

`Values<String, &'a Any>`

## connection::mod::Connection

### `new()`

```rust
pub fn new(host: &str)
```

Instantiate new Connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | host | Yes | Node URL |

#### Return Value

`Connection`

## http::client::Client

### `new()`

```rust
pub fn new(host: &str) -> Client
```

Instantiate new Client.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | host | Yes | Node URL |

#### Return Value

`Client`

### `set_version()`

```rust
pub fn set_version(&mut self, version: &'static str)
```

Set the version of the client.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &'static str | version | Yes | API Version |

#### Return Value

`Void`

### `get()`

```rust
pub fn get<T: DeserializeOwned>(&self, endpoint: &str)
```

GET request on the given endpoint.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | endpoint | Yes | Endpoint |

#### Return Value

`Result<T>`

### `get_with_params()`

```rust
pub fn get_with_params<T, I, K, V>(&self, endpoint: &str, parameters: I)
```

GET request with parameters on the given endpoint.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | endpoint | Yes | Endpoint |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<T>`

### `post()`

```rust
pub fn post<T, V>(&self, endpoint: &str, payload: Option<HashMap<&str, V>>)
```

POST request on the given endpoint.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | endpoint | Yes | Endpoint |
| Option&gt; | payload | Yes | Payload |

#### Return Value

`Result<T>`

### `post_with_params()`

```rust
pub fn post_with_params<T, H, I, K, V>(
        &self,
        endpoint: &str,
        payload: Option<HashMap<&str, H>>,
        parameters: I,
)
```

POST request with parameters on the given endpoint.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| &str | endpoint | Yes | Endpoint |
| Option&gt; | payload | Yes | Payload |
| I | parameters | Yes | Query parameters |

#### Return Value

`Result<T>`
