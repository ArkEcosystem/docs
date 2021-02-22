---
title: API Documentation
---

# API Documentation

## Client.Client.Api.Endpoints.Blocks.Blocks

### `all()`

```swift
public func all(limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Blocks.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `get()`

```swift
public func get(id: String, completionHandler: @escaping ([String: Any]?)
```

Retrieve a Block

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Block ID |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `transactions()`

```swift
public func transactions(ofBlock id: String, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Transactions of a Block

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Block ID |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `search()`

```swift
public func search(body: [String: Any]?, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

Search All Blocks

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | body | Yes | Search parameters |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

## Client.Client.Api.Endpoints.Delegates.Delegates

### `all()`

```swift
public func all(limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Delegates

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `get()`

```swift
public func get(byName id: String, completionHandler: @escaping ([String: Any]?)
```

Retrieve a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | id can be one of: Username, Address or Public Key |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `blocks()`

```swift
public func blocks(byName id: String, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Blocks of a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | id can be one of: Username, Address or Public Key |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `voters()`

```swift
public func voters(byName id: String, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Voters of a Delegate

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | id can be one of: Username, Address or Public Key |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`<class Void>`

## Client.Client.Api.Endpoints.Node.Node

### `configuration()`

```swift
public func configuration(completionHandler: @escaping ([String: Any]?)
```

Retrieve the Configuration

#### Return Value

`Void`

### `status()`

```swift
public func status(completionHandler: @escaping ([String: Any]?)
```

Retrieve the Status

#### Return Value

`Void`

### `syncing()`

```swift
public func syncing(completionHandler: @escaping ([String: Any]?)
```

Retrieve the Syncing Status

#### Return Value

`Void`

### `fees()`

```swift
public func fees(completionHandler: @escaping ([String: Any]?)
```

Retrieve the Fees

#### Return Value

`Void`

## Client.Client.Api.Endpoints.Peers.Peers

### `all()`

```swift
public func all(limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Peers

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `status()`

```swift
public func status(ip: String, completionHandler: @escaping ([String: Any]?)
```

Retrieve a Peer

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | ip | Yes | IP address |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

## Client.Client.Api.Endpoints.Transactions.Transactions

### `create()`

```swift
public func create(body: [String: Any]?, completionHandler: @escaping ([String: Any]?)
```

Create a Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | body | Yes | Search parameters |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `get()`

```swift
public func get(id: String, completionHandler: @escaping ([String: Any]?)
```

Retrieve a Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Transaction ID |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `all()`

```swift
public func all(limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `allUnconfirmed()`

```swift
public func allUnconfirmed(limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Unconfirmed Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `getUnconfirmed()`

```swift
public func getUnconfirmed(id: String, completionHandler: @escaping ([String: Any]?)
```

Get Unconfirmed Transaction

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Transaction ID |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `search()`

```swift
public func search(body: [String: Any]?, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

Search Transactions

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | body | Yes | Search parameters |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `types()`

```swift
public func types(completionHandler: @escaping ([String: Any]?)
```

List Transaction Types

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

## Client.Client.Api.Endpoints.Votes.Votes

### `all()`

```swift
public func all(limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Votes

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `get()`

```swift
public func get(id: String, completionHandler: @escaping ([String: Any]?)
```

Retrieve a Vote

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Vote ID |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

## Client.Client.Api.Endpoints.Wallets.Wallets

### `all()`

```swift
public func all(limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

Retrieve All Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `get()`

```swift
public func get(byName id: String, completionHandler: @escaping ([String: Any]?)
```

Retrieve a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | id can be one of: Username, Address or Public Key |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `transactions()`

```swift
public func transactions(byName id: String, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `receivedTransactions()`

```swift
public func receivedTransactions(byName id: String, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Received Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `sentTransactions()`

```swift
public func sentTransactions(byName id: String, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Sent Transactions of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `votes()`

```swift
public func votes(byName id: String, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

List All Votes of a Wallet

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `top()`

```swift
public func top(limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?) -> Void)
```

List All Top Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`

### `search()`

```swift
public func search(body: [String: Any]?, limit: Int = 100, page: Int = 1, completionHandler: @escaping ([String: Any]?)
```

Search All Wallets

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | body | Yes | Search parameters |
| Int | limit | No | Limit of results |
| Int | page | No | Pagination |
| String | completionHandler | No | Query parameters |

#### Return Value

`Void`
