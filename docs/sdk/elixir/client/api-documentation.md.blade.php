---
title: API Documentation
---

# API Documentation

## ArkEcosystem.Client

### `new()`

```elixir
def new(opts)
```

Shortcut to `ArkEcosystem.Client.Connection.new/1`

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Keyword.t() | opts | Yes | Query parameters |

#### Return Value

`Tesla.Client.t`

### `get()`

```elixir
def get(client, url, opts \\ [])
```

Shortcut to `Tesla.get/4`

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | url | Yes | Endpoint |
| Keyword.t() | opts | No | Query parameters |

#### Return Value

`response()`

### `patch()`

```elixir
def patch(client, url, body, opts \\ [])
```

Alias for `put/4`

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | url | Yes | Endpoint |
| any() | body | Yes | ... |
| Keyword.t() | opts | No | Query parameters |

#### Return Value

`response()`

### `post()`

```elixir
def post(client, url, body, opts \\ [])
```

Shortcut to `Tesla.post/4`

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | url | Yes | Endpoint |
| any() | body | Yes | ... |
| Keyword.t() | opts | No | Query parameters |

#### Return Value

`response()`

### `put()`

```elixir
def put(client, url, body, opts \\ [])
```

Shortcut to `Tesla.put/4`

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | url | Yes | Endpoint |
| any() | body | Yes | ... |
| Keyword.t() | opts | No | Query parameters |

#### Return Value

`response()`

## ArkEcosystem.Client.Connection

### `new()`

```elixir
def new(%{
    host: host
  })
when is_bitstring(host)
```

Create a new Connection class instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map.t | \* | Yes | Config map |

#### Return Value

`Tesla.Client.t`

## ArkEcosystem.Client.API.Blocks

### `list()`

```elixir
def list(client, parameters \\ [])
```

Get all blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `show()`

```elixir
def show(client, id)
```

Get a block by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Block ID |

#### Return Value

`ArkEcosystem.Client.response()`

### `transactions()`

```elixir
def transactions(client, id, parameters \\ [])
```

Get all transactions by the given block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Block ID |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `search()`

```elixir
def search(client, parameters)
```

Filter all blocks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | Yes | Search parameters |

#### Return Value

`ArkEcosystem.Client.response()`

## ArkEcosystem.Client.API.Delegates

### `list()`

```elixir
def list(client, parameters \\ [])
```

Get all accounts.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | Yes | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `show()`

```elixir
def show(client, id)
```

Get a delegate by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Delegate identifier |

#### Return Value

`ArkEcosystem.Client.response()`

### `blocks()`

```elixir
def blocks(client, id, parameters \\ [])
```

Get all blocks for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Delegate identifier |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `voters()`

```elixir
def voters(client, id, parameters \\ [])
```

Get all voters for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Delegate identifier |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

## ArkEcosystem.Client.API.Node

### `configuration()`

```elixir
def configuration(client)
```

Get the node configuration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |

#### Return Value

`ArkEcosystem.Client.response()`

### `status()`

```elixir
def status(client)
```

Get the node status.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |

#### Return Value

`ArkEcosystem.Client.response()`

### `syncing()`

```elixir
def syncing(client)
```

Get the node syncing status.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |

#### Return Value

`ArkEcosystem.Client.response()`

## ArkEcosystem.Client.API.Peers

### `all()`

```elixir
def list(client, parameters \\ [])
```

Get all peers.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `show()`

```elixir
def show(client, ip)
```

Get a peer by the given IP address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | ip | Yes | IP address |

#### Return Value

`ArkEcosystem.Client.response()`

## ArkEcosystem.Client.API.Transactions

### `create()`

```elixir
def create(client, parameters)
```

Create a new transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `show()`

```elixir
def show(client, id)
```

Get a transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Transaction ID |

#### Return Value

`ArkEcosystem.Client.response()`

### `list()`

```elixir
def list(client, parameters \\ [])
```

Get all transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `list_unconfirmed()`

```elixir
def list_unconfirmed(client, parameters \\ [])
```

Get all unconfirmed transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `get_unconfirmed()`

```elixir
def get_unconfirmed(client, id)
```

Get an unconfirmed transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Transaction ID |

#### Return Value

`ArkEcosystem.Client.response()`

### `search()`

```elixir
def search(client, parameters)
```

Filter all transactions by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Search parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `types()`

```elixir
def types(client)
```

Get a list of valid transaction types.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |

#### Return Value

`ArkEcosystem.Client.response()`

## ArkEcosystem.Client.API.Votes

### `list()`

```elixir
def list(client, parameters \\ [])
```

Get all votes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `show()`

```elixir
def show(client, id)
```

Get a vote by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Vote ID |

#### Return Value

`ArkEcosystem.Client.response()`

## ArkEcosystem.Client.API.Wallets

### `list()`

```elixir
def list(client, parameters \\ [])
```

Get all wallets.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `show()`

```elixir
def show(client, id)
```

Get a wallet by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Wallet identifier |

#### Return Value

`ArkEcosystem.Client.response()`

### `transactions()`

```elixir
def transactions(client, id, parameters \\ [])
```

Get all transactions for the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Wallet identifier |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `received_transactions()`

```elixir
def received_transactions(client, id, parameters \\ [])
```

Get all transactions received by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Wallet identifier |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `sent_transactions()`

```elixir
def sent_transactions(client, id, parameters \\ [])
```

Get all transactions sent by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Wallet identifier |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `votes()`

```elixir
def votes(client, id)
```

Get all votes by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| String.t() | id | Yes | Wallet identifier |

#### Return Value

`ArkEcosystem.Client.response()`

### `top()`

```elixir
def top(client, parameters \\ [])
```

Get all wallets sorted by balance in descending order.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`

### `search()`

```elixir
def search(client, parameters)
```

Filter all wallets by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Tesla.Client.t() | client | Yes | Client |
| Keyword.t() | parameters | No | Query parameters |

#### Return Value

`ArkEcosystem.Client.response()`
