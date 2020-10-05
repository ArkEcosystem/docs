---
title: API Documentation
---

# API Documentation

## ArkEcosystem\Client\API\AbstractAPI

### `__construct()`

```php
public function __construct(Connection $connection)
```

Create a new API class instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Connection | connection | Yes | Connection |

### `get()`

```php
protected function get(string $path, array $query = [])
```

Send a GET request with query parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | path | Yes | Endpoint |
| array | query | No | Query parameters |

#### Return Value

`array|string`

### `post()`

```php
protected function post(string $path, array $query = [])
```

Send a POST request with JSON-encoded parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | path | Yes | Endpoint |
| array | query | No | Query parameters |

#### Return Value

`array|string`

## ArkEcosystem\Client\API\Blocks

### `all()`

```php
public function all(array $query = [])
```

Get all blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | query | No | Query parameters |

#### Return Value

`array`

### `show()`

```php
public function show(string $id)
```

Get a block by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Block ID |

#### Return Value

`array`

### `transactions()`

```php
public function transactions(string $id, array $query = [])
```

Get all transactions by the given block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Block ID |
| array | query | No | Query parameters |

#### Return Value

`array`

### `search()`

```php
public function search(array $parameters)
```

Filter all blocks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | parameters | Yes | Search parameters |

#### Return Value

`array`

## ArkEcosystem\Client\API\Delegates

### `all()`

```php
public function all(array $query = [])
```

Get all accounts.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | query | No | Query parameters |

#### Return Value

`array`

### `show()`

```php
public function show(string $id)
```

Get a delegate by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |

#### Return Value

`array`

### `blocks()`

```php
public function blocks(string $id, array $query = [])
```

Get all blocks for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |
| array | query | No | Query parameters |

#### Return Value

`array`

### `voters()`

```php
public function voters(string $id, array $query = [])
```

Get all voters for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Delegate identifier |
| array | query | No | Query parameters |

#### Return Value

`array`

## ArkEcosystem\Client\API\Node

### `configuration()`

```php
public function configuration()
```

Get the node configuration.

#### Return Value

`array`

### `status()`

```php
public function status()
```

Get the node status.

#### Return Value

`array`

### `syncing()`

```php
public function syncing()
```

Get the node syncing status.

#### Return Value

`array`

### `fees()`

```php
public function fees(int $days = null)
```

Get the node fee statistics.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | days | No | ... |

#### Return Value

`array`

## ArkEcosystem\Client\API\Peers

### `all()`

```php
public function all(array $query = [])
```

Get all peers.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | query | No | Query parameters |

#### Return Value

`array`

### `show()`

```php
public function show(string $ip)
```

Get a peer by the given IP address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | ip | Yes | IP address |

#### Return Value

`array`

## ArkEcosystem\Client\API\Transactions

### `create()`

```php
public function create(array $transactions)
```

Create a new transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | transactions | Yes | Transaction\(s\) to broadcast |

#### Return Value

`array`

### `show()`

```php
public function show(string $id)
```

Get a transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Transaction ID |

#### Return Value

`array`

### `all()`

```php
public function all(array $query = [])
```

Get all transactions.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | query | No | Query parameters |

#### Return Value

`array`

### `allUnconfirmed()`

```php
public function allUnconfirmed()
```

Get all unconfirmed transactions.

#### Return Value

`array`

### `showUnconfirmed()`

```php
public function showUnconfirmed(string $id)
```

Get an unconfirmed transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | No | Transaction ID |

#### Return Value

`array`

### `search()`

```php
public function search(array $parameters)
```

Filter all transactions by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | query | No | Search parameters |

#### Return Value

`array`

### `types()`

```php
public function types()
```

Get a list of valid transaction types.

#### Return Value

`array`

## ArkEcosystem\Client\API\Votes

### `all()`

```php
public function all(array $query = [])
```

Get all votes.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | query | No | Query parameters |

#### Return Value

`array`

### `show()`

```php
public function show(string $id)
```

Get a vote by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Vote ID |

#### Return Value

`array`

## ArkEcosystem\Client\API\Wallets

### `all()`

```php
public function all(array $query = [])
```

Get all wallets.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | query | No | Query parameters |

#### Return Value

`array`

### `show()`

```php
public function show(string $id)
```

Get a wallet by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |

#### Return Value

`array`

### `transactions()`

```php
public function transactions(string $id, array $query = [])
```

Get all transactions for the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| array | query | No | Quey parameters |

#### Return Value

`array`

### `receivedTransactions()`

```php
public function receivedTransactions(string $id, array $query = [])
```

Get all transactions received by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| array | query | No | Quey parameters |

#### Return Value

`array`

### `sentTransactions()`

```php
public function sentTransactions(string $id, array $query = [])
```

Get all transactions sent by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| array | query | No | Quey parameters |

#### Return Value

`array`

### `votes()`

```php
public function votes(string $id, array $query = [])
```

Get all votes by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | id | Yes | Wallet identifier |
| array | query | No | Quey parameters |

#### Return Value

`array`

### `top()`

```php
public function top()
```

Get all wallets sorted by balance in descending order.

#### Return Value

`array`

### `search()`

```php
public function search(array $parameters)
```

Filter all wallets by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| array | parameters | Yes | Search parameters |

#### Return Value

`array`
