---
title: API Documentation
---

# API Documentation

## org.arkecosystem.client.http.Client;

### `Client()`

```java
public Client(String host, String version)
```

Create a new Client class instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | host | Yes | Node url |
| String | version | Yes | Version to use |

### `get()`

```java
public LinkedTreeMap<String, Object> get(String url, Map<String, Object> params)
```

Send a GET request with query parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | url | Yes | Endpoint |
| Map | params | No | Query parameters |

#### Return Value

`LinkedTreeMap<String, Object>`

### `get()`

```java
public LinkedTreeMap<String, Object> get(String url)
```

Send a GET request without query parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | url | Yes | Endpoint |

#### Return Value

`LinkedTreeMap<String, Object>`

### `post()`

```java
public LinkedTreeMap<String, Object> post(String url, Map payload)
```

Send a POST request with JSON-encoded parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | url | Yes | Endpoint |
| Map | payload | Yes | Transaction\(s\) to post |

#### Return Value

`LinkedTreeMap<String, Object>`

### `getClient()`

```java
public OkHttpClient getClient()
```

Get Client instance.

#### Return Value

`OkHttpClient`

### `setClient()`

```java
public void setClient(OkHttpClient client)
```

Set client instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| OkHttpClient | client | Yes | Client |

#### Return Value

`LinkedTreeMap<String, Object>`

## org.arkecosystem.client.Connection;

### `Connection()`

```java
public Connection(Map<String, Object> config)
```

Connection class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | config | Yes | Configuration |

### `api()`

```java
public T api()
```

Instantiate new Api.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | config | Yes | Configuration |

#### Return Value

`T`

## org.arkecosystem.client.ConnectionManager;

### `ConnectionManager()`

```java
public ConnectionManager()
```

ConnectionManager class constructor.

### `getDefaultConnection()`

```java
public String getDefaultConnection()
```

Get the default connection name.

#### Return Value

`String`

### `setDefaultConnection()`

```java
public void setDefaultConnection(String name)
```

Set the default connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | name | Yes | Connection name |

#### Return Value

`void`

### `getConnections()`

```java
public Map<String, Connection<? extends AbstractAPI>> getConnections()
```

Get a map of connections.

#### Return Value

`Map<String, Connection<? extends AbstractAPI>>`

### `connect()`

```java
public <T extends AbstractAPI> Connection<T> connect(Map config, String name)
```

Connect to the given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | config | Yes | Configuration |
| String | name | Yes | Connection name |

#### Return Value

`<T extends AbstractAPI>`

### `connect()`

```java
public <T extends AbstractAPI> Connection<T> connect(Map config)
```

Connect to the given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | config | Yes | Configuration |

#### Return Value

`<T extends AbstractAPI>`

### `disconnect()`

```java
public void disconnect(String name)
```

Disconnect from given connection.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | name | Yes | Connection name |

#### Return Value

`void`

### `disconnect()`

```java
public void disconnect()
```

Disconnect from given connection.

### `connection()`

```java
public <T extends AbstractAPI> Connection<T> connection(String name)
```

Get a connection instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | name | Yes | Connection name |

#### Return Value

`<T extends AbstractAPI>`

### `connection()`

```java
public Connection connection()
```

Get a connection instance.

#### Return Value

`Connection`

## org.arkecosystem.client.api.AbstractAPI;

### `AbstractAPI()`

```java
public AbstractAPI(Client client) {
```

Create a new API class instance.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

## org.arkecosystem.client.api.Blockchain;

### `Blockchain`\(\)

```java
public Blockchain(Client client)
```

Blockchain class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

## org.arkecosystem.client.api.Blocks;

### `Blocks()`

```java
public Blocks(Client client)
```

Blocks class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `all()`

```java
public LinkedTreeMap<String, Object> all()
```

Get all blocks.

#### Return Value

`LinkedTreeMap<String, Object>`

### `show()`

```java
public LinkedTreeMap<String, Object> show(String id)
```

Get a block by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Block ID |

#### Return Value

`LinkedTreeMap<String, Object>`

### `transactions()`

```java
public LinkedTreeMap<String, Object> transactions(String id)
```

Get all transactions by the given block.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Block ID |

#### Return Value

`LinkedTreeMap<String, Object>`

### `search()`

```java
public LinkedTreeMap<String, Object> search(Map<String, Object> parameters)
```

Filter all blocks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | parameters | Yes | Query parameters |

#### Return Value

`LinkedTreeMap<String, Object>`

## org.arkecosystem.client.api.Bridgechains;

### `Bridgechains()`

```java
public Bridgechains(Client client)
```

Bridgechains class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### all\(\)

```java
public LinkedTreeMap<String, Object> all()
```

Get all bridgechains.

#### Return Value

`LinkedTreeMap<String, Object>`

### `show()`

```java
public LinkedTreeMap<String, Object> show(String id)
```

Get a bridgechain by genesis hash.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Bridgechain identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

### search\(\)

```java
public LinkedTreeMap<String, Object> search(Map<String, Object> parameters)
```

Filter all bridgechains by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | parameters | Yes | Query parameters |

## org.arkecosystem.client.api.Businesses

### `Business()`

```java
public Businesses(Client client)
```

Businesses class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `all()`

```java
public LinkedTreeMap<String, Object> all()
```

Get all business wallets.

#### Return Value

`LinkedTreeMap<String, Object>`

### `show()`

```java
public LinkedTreeMap<String, Object> show(String id)
```

Get a business by wallet address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Business identifier |

### `showBridgechains()`

```java
public LinkedTreeMap<String, Object> showBridgechains(String id)
```

Get all bridgechains of a wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Business identifier |

### `search()`

```java
public LinkedTreeMap<String, Object> search(Map<String, Object> parameters)
```

Filter all businesses by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | parameters | Yes | Query parameters |

## org.arkecosystem.client.api.Delegates;

### `Delegates()`

```java
public Delegates(Client client)
```

Delegates class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `all()`

```java
public LinkedTreeMap<String, Object> all()
```

Get all accounts.

#### Return Value

`LinkedTreeMap<String, Object>`

### `show()`

```java
public LinkedTreeMap<String, Object> show(String id)
```

Get a delegate by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Delegate identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

### `blocks()`

```java
public LinkedTreeMap<String, Object> blocks(String id)
```

Get all blocks for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Delegate identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

### `voters()`

```java
public LinkedTreeMap<String, Object> voters(String id)
```

Get all voters for the given delegate.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Delegate identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

## org.arkecosystem.client.api.Locks;

### `Locks()`

```java
public Locks(Client client)
```

Locks class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `all()`

```java
public LinkedTreeMap<String, Object> all()
```

Get all locks.

#### Return Value

`LinkedTreeMap<String, Object>`

### show\(\)

```java
public LinkedTreeMap<String, Object> show(String id)
```

Return all locks by a given wallet address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet address |

### `search()`

```java
public LinkedTreeMap<String, Object> search(Map<String, Object> parameters)
```

Filter all locks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | parameters | Yes | Query parameters |

### `search()`

```java
public LinkedTreeMap<String, Object> searchUnlocked(Map<String, Object> parameters)
```

Filter all unlocked locks by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | parameters | Yes | Query parameters |

## org.arkecosystem.client.api.Node;

### `Node()`

```java
public Node(Client client)
```

Node class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `configuration()`

```java
public LinkedTreeMap<String, Object> configuration()
```

Get the node configuration.

#### Return Value

`LinkedTreeMap<String, Object>`

### `status()`

```java
public LinkedTreeMap<String, Object> status()
```

Get the node status.

#### Return Value

`LinkedTreeMap<String, Object>`

### `syncing()`

```java
public LinkedTreeMap<String, Object> syncing()
```

Get the node syncing status.

#### Return Value

`LinkedTreeMap<String, Object>`

### `fees()`

```java
public LinkedTreeMap<String, Object> fees(Integer... days)
```

Get fees by days.

#### Return Value

`LinkedTreeMap<String, Object>`

### `debug()`

```java
public LinkedTreeMap<String, Object> debug()
```

#### Return Value

`LinkedTreeMap<String, Object>`

## org.arkecosystem.client.api.peers;

### `Peers()`

```java
public Peers(Client client)
```

Peers class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `all()`

```java
public LinkedTreeMap<String, Object> all()
```

Get all peers.

#### Return Value

`public LinkedTreeMap<String, Object>`

### `show()`

```java
public LinkedTreeMap<String, Object> show(String ip)
```

Get a peer by the given IP address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | ip | Yes | IP address |

#### Return Value

`public LinkedTreeMap<String, Object>`

## org.arkecosystem.client.api.Rounds;

### `Rounds()`

```java
public Rounds(Client client)
```

Rounds class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `delegates()`

```java
public LinkedTreeMap<String, Object> delegates(int id)
```

Returns delegates by given round.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Round identifier |

## org.arkecosystem.client.api.Transactions;

### `Transactions()`

```java
public Transactions(Client client)
```

Transactions class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `create()`

```java
public LinkedTreeMap<String, Object> create(List<HashMap> transactions)
```

Create a new transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| List | transactions | Yes | Transaction\(s\) to broadcast |

#### Return Value

`LinkedTreeMap<String, Object>`

### `show()`

```java
public LinkedTreeMap<String, Object> show(String id)
```

Get a transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Transaction ID |

#### Return Value

`LinkedTreeMap<String, Object>`

### `all()`

```java
public LinkedTreeMap<String, Object> all()
```

Get all transactions.

#### Return Value

`LinkedTreeMap<String, Object>`

### `allUnconfirmed()`

```java
public LinkedTreeMap<String, Object> allUnconfirmed()
```

Get all unconfirmed transactions.

#### Return Value

`LinkedTreeMap<String, Object>`

### `showUnconfirmed()`

```java
public LinkedTreeMap<String, Object> showUnconfirmed(String id)
```

Get an unconfirmed transaction by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | No | Unconfirmed transaction ID |

#### Return Value

`LinkedTreeMap<String, Object>`

### `search()`

```java
public LinkedTreeMap<String, Object> search(Map<String, Object> parameters)
```

Filter all transactions by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | parameters | Yes | Query parameters |

#### Return Value

`LinkedTreeMap<String, Object>`

### `types()`

```java
public LinkedTreeMap<String, Object> types()
```

Get a list of valid transaction types.

#### Return Value

`LinkedTreeMap<String, Object>`

### `schemas()`

```java
public LinkedTreeMap<String, Object> schemas()
```

Get a list of transactions schemas.

#### Return Value

`LinkedTreeMap<String, Object>`

### `fees()`

```java
public LinkedTreeMap<String, Object> fees()
```

Get a list of transactions fees.

#### Return Value

`LinkedTreeMap<String, Object>`

## org.arkecosystem.client.api.Votes;

### `Votes()`

```java
public Votes(Client client)
```

Votes class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `all()`

```java
public LinkedTreeMap<String, Object> all()
```

Get all votes.

#### Return Value

`LinkedTreeMap<String, Object>`

### `show()`

```java
public LinkedTreeMap<String, Object> show(String id)
```

Get a vote by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Vote identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

## org.arkecosystem.client.api.Wallets;

### `Wallets()`

```java
public Wallets(Client client)
```

Wallets class constructor.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Client | client | Yes | Client |

### `all()`

```java
public LinkedTreeMap<String, Object> all()
```

Get all wallets.

#### Return Value

`LinkedTreeMap<String, Object>`

### `show()`

```java
public LinkedTreeMap<String, Object> show(String id)
```

Get a wallet by the given id.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

### `transactions()`

```java
public LinkedTreeMap<String, Object> transactions(String id)
```

Get all transactions for the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

### `receivedTransactions()`

```java
public LinkedTreeMap<String, Object> receivedTransactions(String id)
```

Get all transactions received by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

### `sentTransactions()`

```java
public LinkedTreeMap<String, Object> sentTransactions(String id)
```

Get all transactions sent by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

### `votes()`

```java
public LinkedTreeMap<String, Object> votes(String id)
```

Get all votes by the given wallet.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| String | id | Yes | Wallet identifier |

#### Return Value

`LinkedTreeMap<String, Object>`

### `top()`

```java
public LinkedTreeMap<String, Object> top()
```

Get all wallets sorted by balance in descending order.

#### Return Value

`LinkedTreeMap<String, Object>`

### `search()`

```java
public LinkedTreeMap<String, Object> search(Map<String, Object> parameters)
```

Filter all wallets by the given parameters.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| Map | parameters | Yes | Search query parameters |

#### Return Value

`LinkedTreeMap<String, Object>`
