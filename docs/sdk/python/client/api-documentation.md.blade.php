---
title: API Documentation
---

# API Documentation

## client.api.blocks.Blocks

### `all()`

```python
def all(self, page=None, limit=100, **kwargs)
```

List All Blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | page | No | Pagination |
| int | limit | No | Result limits |
| any | \*\*kwargs | No | Query parameters |

#### Return Value

`<class 'dict'>`

### `get()`

```python
def get(self, block_id)
```

Retrieve a Block

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | block_id | Yes | Block ID |

#### Return Value

`<class 'dict'>`

### `transactions()`

```python
def transactions(self, block_id, page=None, limit=100)
```

List All Transactions of a Block

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | block_id | Yes | Block ID |
| int | page | No | Pagination |
| int | limit | No | Query parameters |

#### Return Value

`<class 'dict'>`

### `search()`

```python
def search(self, criteria, page=None, limit=100)
```

Search All Blocks

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| dict | criteria | Yes | Search parameters |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

## client.api.delegates.Delegates

### `all()`

```python
def all(self, page=None, limit=100, **kwargs)
```

List All Delegates

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | page | No | Pagination |
| int | limit | No | Result limits |
| any | \*\*kwargs | No | Query parameters |

#### Return Value

`<class 'dict'>`

### `get()`

```python
def get(self, delegate_id)
```

Retrieve a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | delegate_id | Yes | Delegate identifier |

#### Return Value

`<class 'dict'>`

### `search()`

```python
def search(self, username, page=None, limit=100)
```

Search Delegates

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | username | Yes | Delegate username |
| int | page | No | Pagination |
| int | limit | No | Result limits |

#### Return Value

`<class 'dict'>`

### `blocks()`

```python
def blocks(self, delegate_id, page=None, limit=100)
```

List All Blocks of a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | delegate_id | Yes | Delegate identifier |
| int | page | No | Pagination |
| int | limit | No | Result limits |

#### Return Value

`<class 'dict'>`

### `voters()`

```python
def voters(self, delegate_id, page=None, limit=100, **kwargs)
```

List All Voters of a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | delegate_id | Yes | Delegate identifier |
| int | page | No | Pagination |
| int | limit | No | Result limits |
| any | \*\*kwargs | No | Query parameters |

#### Return Value

`<class 'dict'>`

## client.api.node.Node

### `configuration()`

```python
def configuration(self)
```

Retrieve the Configuration

#### Return Value

`<class 'dict'>`

### `status()`

```python
def status(self)
```

Retrieve the Status

#### Return Value

`<class 'dict'>`

### `syncing()`

```python
def syncing(self)
```

Retrieve the Syncing Status

#### Return Value

`<class 'dict'>`

### `fees()`

```python
def fees(self, days=None)
```

Retrieve the Fees

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | days | No | ... |

#### Return Value

`<class 'dict'>`

## client.api.peers.Peers

### `all()`

```python
def all(self, os=None, status=None, port=None, version=None, order_by=None, page=None, limit=100)
```

List All Peers

#### Parameters

| Type | Name | Required | Description      s |
| :--- | :--- | :--- | :--- |
| str | os | No | Operating System |
| str | status | No | Peer status |
| int | port | No | Peer port |
| str | version | No | Peer version |
| str | order_by | No | Order by |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

### `get()`

```python
def get(self, ip)
```

Retrieve a Peer

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | ip | Yes | IP address |

#### Return Value

`<class 'dict'>`

## client.api.transactions.Transactions

### `create()`

```python
def create(self, transactions)
```

Create a Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| list | transactions | Yes | Transaction to broadcast |

#### Return Value

`<class 'dict'>`

### `get()`

```python
def get(self, transaction_id)
```

Retrieve a Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | transaction_id | Yes | Transaction ID |

#### Return Value

`<class 'dict'>`

### `all()`

```python
def all(self, page=None, limit=100, **kwargs)
```

List All Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | page | No | Pagination |
| int | limit | No | Result limit |
| any | \*\*kwargs | No | Query parameters |

#### Return Value

`<class 'dict'>`

### `all_unconfirmed()`

```python
def all_unconfirmed(self, limit=100, offset=None, **kwargs)
```

List All Unconfirmed Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | limit | No | Result limit |
| int | offset | No | Offset |
| any | \*\*kwargs | No | Query parameters |

#### Return Value

`<class 'dict'>`

### `get_unconfirmed()`

```python
def get_unconfirmed(self, transaction_id)
```

Get Unconfirmed Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | transaction_id | Yes | Transaction ID |

#### Return Value

`<class 'dict'>`

### `search()`

```python
def search(self, criteria, page=None, limit=100)
```

Search Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| dict | criteria | Yes | Search parameters |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

### `types()`

```python
def types(self)
```

List Transaction Types

#### Return Value

`<class 'dict'>`

### `fees()`

```python
def fees(self)
```

List Transaction Fees (Non-Dynamic)

#### Return Value

`<class 'dict'>`

## client.api.votes.Votes

### `all()`

```python
def all(self, page=None, limit=100)
```

List All Votes

#### Parameters

| Type | Name | Required | Description  s |
| :--- | :--- | :--- | :--- |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

### `get()`

```python
def get(self, vote_id)
```

Retrieve a Vote

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | vote_id | Yes | Vote IDs |

#### Return Value

`<class 'dict'>`

## client.api.wallets.Wallets

### `all()`

```python
def all(self, page=None, limit=100)
```

Retrieve All Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

### `get()`

```python
def get(self, wallet_id)
```

Retrieve a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | wallet_id | Yes | Wallet identifier |

#### Return Value

`<class 'dict'>`

### `transactions()`

```python
def transactions(self, wallet_id ,page=None, limit=100, **kwargs)
```

List All Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | wallet_id | Yes | Wallet identifier |
| int | page | No | Pagination |
| int | limit | No | Result limit |
| any | \*\*kwargs | No | Query parameters |

#### Return Value

`<class 'dict'>`

### `transactions_received()`

```python
def transactions_received(self, wallet_id, page=None, limit=100)
```

List All Received Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | wallet_id | Yes | Wallet identifier |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

### `transactions_sent()`

```python
def transactions_sent(self, wallet_id, page=None, limit=100)
```

List All Sent Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | wallet_id | Yes | Wallet identifier |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

### `votes()`

```python
def votes(self, wallet_id,page=None, limit=100)
```

List All Votes of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| str | wallet_id | Yes | Wallet identifier |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

### `top()`

```python
def top(self, page=None, limit=100)
```

List All Top Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`

### `search()`

```python
def search(self, criteria, page=None, limit=100)
```

Search All Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| dict | criteria | Yes | Search parameters |
| int | page | No | Pagination |
| int | limit | No | Result limit |

#### Return Value

`<class 'dict'>`
