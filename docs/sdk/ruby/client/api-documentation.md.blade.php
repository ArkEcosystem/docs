---
title: API Documentation
---

# API Documentation

## ArkEcosystem.Client.API.Base

### `initialize()`

```ruby
def initialize(client)
```

Create a new resource instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Object\] | client | Yes | Client |

#### Return Value

`Base`

## ArkEcosystem.Client.Connection

### `initialize()`

```ruby
def initialize(config, client = nil)
```

Create a new connection instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | config | Yes | Configuration |
| Client | client | No | Client |

#### Return Value

`[ArkEcosystem::Client::Connection]`

### `blocks()`

```ruby
def blocks
```

Return the Blocks API resource.

#### Return Value

`[Object]`

### `delegates()`

```ruby
def delegates
```

Return the Delegates API resource.

#### Return Value

`[Object]`

### `node()`

```ruby
def node
```

Return the Node API resource.

#### Return Value

`[Object]`

### `peers()`

```ruby
def peers
```

Return the Peers API resource.

#### Return Value

`[Object]`

### `transactions()`

```ruby
def transactions
```

Return the Transactions API resource.

#### Return Value

`[Object]`

### `votes()`

```ruby
def votes
```

Return the Votes API resource.

#### Return Value

`[Object]`

### `wallets()`

```ruby
def wallets
```

Return the Wallets API resource.

#### Return Value

`[Object]`

## ArkEcosystem.Client.ConnectionManager

### `def initialize`

```ruby
def initialize
```

Create a new client instance.

#### Return Value

`[Faraday::Response]`

### `connect()`

```ruby
def connect(connection, name = 'main')
```

Connect to the given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[ArkEcosystem::Client::Connection\] | connection | Yes | Connection instance |
| \[String\] | name | No | Connection name |

#### Return Value

`[Faraday::Response]`

### `disconnect()`

```ruby
def disconnect(name)
```

Disconnect from the given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | name | Yes | Connection name |

#### Return Value

`[nil]`

### `connection()`

```ruby
def connection(name)
```

Get a connection instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | name | Yes | Connection name |

#### Return Value

`[ArkEcosystem::Client::Connection]`

## ArkEcosystem.Client.API.Blocks

### `all()`

```ruby
def all(parameters = {})
```

Get all blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `show()`

```ruby
def show(id)
```

Get a block by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Block ID |

#### Return Value

`[Faraday::Response]`

### `transactions()`

```ruby
def transactions(id, parameters = {})
```

Get all transactions by the given block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Block ID |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `search()`

```ruby
def search(parameters)
```

Filter all blocks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | Yes | Search parameters |

#### Return Value

`[Faraday::Response]`

## ArkEcosystem.Client.API.Delegates

### `all()`

```ruby
def all(parameters = {})
```

Get all accounts.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `show()`

```ruby
def show(client, id)
```

Get a delegate by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | No | Delegate identifier |

#### Return Value

`[Faraday::Response]`

### `blocks()`

```ruby
def blocks(id, parameters = {})
```

Get all blocks for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | No | Delegate identifier |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `voters()`

```ruby
def voters(id, parameters = {})
```

Get all voters for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | No | Delegate identifier |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

## ArkEcosystem.Client.API.Node

### `configuration()`

```ruby
def configuration
```

Get the node configuration.

#### Return Value

`[Faraday::Response]`

### `status()`

```ruby
def status
```

Get the node status.

#### Return Value

`[Faraday::Response]`

### `syncing()`

```ruby
def syncing
```

Get the node syncing status.

#### Return Value

`[Faraday::Response]`

### `fees()`

```ruby
def fees
```

Get the loader fee statistics.

#### Return Value

`[Faraday::Response]`

## ArkEcosystem.Client.API.Peers

### `all()`

```ruby
def all(parameters = {})
```

Get all peers.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `show()`

```ruby
def show(ip_addr)
```

Get a peer by the given IP address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | ip\_addr | Yes | IP address |

#### Return Value

`[Faraday::Response]`

## ArkEcosystem.Client.API.Transactions

### `create()`

```ruby
def create(parameters)
```

Create a new transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | Yes | Transaction to broadcast |

#### Return Value

`[Faraday::Response]`

### `show()`

```ruby
def show(id)
```

Get a transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Transaction ID |

#### Return Value

`[Faraday::Response]`

### `all()`

```ruby
def all(parameters = {})
```

Get all transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | Yes | Query parameters |

#### Return Value

`[Faraday::Response]`

### `all_unconfirmed()`

```ruby
def all_unconfirmed(parameters = {})
```

Get all unconfirmed transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | Yes | Query parameters |

#### Return Value

`[Faraday::Response]`

### `show_unconfirmed()`

```ruby
def show_unconfirmed(client, id)
```

Get an unconfirmed transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Transaction ID |

#### Return Value

`[Faraday::Response]`

### `search()`

```ruby
def search(parameters)
```

Filter all transactions by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | Yes | Query parameters |

#### Return Value

`[Faraday::Response]`

### `types()`

```ruby
def types
```

Get a list of valid transaction types.

#### Return Value

`[Faraday::Response]`

## ArkEcosystem.Client.API.Votes

### `all()`

```ruby
def all(parameters = {})
```

Get all votes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | Yes | Query parameters |

#### Return Value

`[Faraday::Response]`

### `show()`

```ruby
def show(id)
```

Get a vote by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Vote ID |

#### Return Value

`[Faraday::Response]`

## ArkEcosystem.Client.API.Wallets

### `all()`

```ruby
def all(parameters = {})
```

Get all wallets.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | Yes | Query parameters |

#### Return Value

`[Faraday::Response]`

### `show()`

```ruby
def show(id)
```

Get a wallet by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Wallet identifier |

#### Return Value

`[Faraday::Response]`

### `transactions()`

```ruby
def transactions(id, parameters = {})
```

Get all transactions for the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Wallet identifier |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `received_transactions()`

```ruby
def received_transactions(id, parameters = {})
```

Get all transactions received by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Wallet identifier |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `sent_transactions()`

```ruby
def sent_transactions(id, parameters = {})
```

Get all transactions sent by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Wallet identifier |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `votes()`

```ruby
def votes(id)
```

Get all votes by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | id | Yes | Wallet identifier |

#### Return Value

`[Faraday::Response]`

### `top()`

```ruby
def top(parameters = {})
```

Get all wallets sorted by balance in descending order.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `search()`

```ruby
def search(parameters)
```

Filter all wallets by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | parameters | No | Search parameters |

#### Return Value

`[Faraday::Response]`

## ArkEcosystem.Client.HTTP.Client

### `initialize()`

```ruby
def initialize(config)
```

Create a new resource instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[Hash\] | config | Yes | Configuration |

#### Return Value

`[ArkEcosystem::Client]`

### `get()`

```ruby
def get(url, query = {})
```

Create and send a HTTP "GET" request.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | url | Yes | Endpoint |
| \[Hash\] | query | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `post()`

```ruby
def post(url, payload = {})
```

Create and send a HTTP "POST" request.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | url | Yes | Endpoint |
| \[Hash\] | payload | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `put()`

```ruby
def put(url, payload = {})
```

Create and send a HTTP "PUT" request.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | url | Yes | Endpoint |
| \[Hash\] | payload | No | Query parameters |

#### Return Value

`[Faraday::Response]`

### `delete()`

```ruby
def delete(url, query = {})
```

Create and send a HTTP "DELETE" request.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | url | Yes | Endpoint |
| \[Hash\] | query | No | Query parameters |

#### Return Value

`[Faraday::Response]`

## ArkEcosystem.Client.HTTP.Response

### `initialize()`

```ruby
def initialize(response)
```

Create a new resource instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[String\] | response | Yes | Response |

#### Return Value

`[ArkEcosystem::Response]`

### `body()`

```ruby
def body
```

Get the body from the Response.

#### Return Value

`[String]`

### `url()`

```ruby
def url
```

Get url from the Response.

#### Return Value

`[String]`

### `to_hash()`

```ruby
def to_hash
```

Convert the Response to a hash.

#### Return Value

`[String]`
