---
title: Examples
---

# Examples

## Initialization

```typescript
const { Connection } = require("@arkecosystem/client");

const client = new Connection(`${server}/api`);
```

## Blocks

This service API grants access to the [blocks resource](/docs/api/public-rest-api/endpoints/blocks). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```typescript
const response = client.api("blocks").all();

>>> Promise<IResponse<T>>
```

### Retrieve a Block

```typescript
const response = client.api("blocks").get("validBlockId");

>>> Promise<IResponse<T>>
```

### List All Transactions of a Block

```typescript
const response = client.api("blocks").transactions("validBlockId");

>>> Promise<IResponse<T>>
```

### Search All Blocks

```typescript
const response = client.api("blocks").search({"id": "validBlockId"});

>>> Promise<IResponse<T>>
```

## Bridgechains

This service API grants access to the bridgechain resource. This can be used to access all registered bridgechains on the network.

### List All Bridgechains

```typescript
const response = client.api("bridgechains").all();

>>> Promise<IResponse<T>>
```

### Retrieve a Bridgechain

```typescript
const response = client.api("bridgechains").get("validId");

>>> Promise<IResponse<T>>
```

### Search All Bridgechains

```typescript
const response = client.api("bridgechains").search({"bridgechainId": "validId"});

>>> Promise<IResponse<T>>
```

## Businesses

This service API grants access to the business resource. This can be used to access all registered businesses on the network.

### List All Businesses

```typescript
const response = client.api("businesses").all();

>>> Promise<IResponse<T>>
```

### Retrieve a Business

```typescript
const response = client.api("businesses").get("validId");

>>> Promise<IResponse<T>>
```

### Retrieve all Business Bridgechains

```typescript
const response = client.api("businesses").bridgechains("validId");

>>> Promise<IResponse<T>>
```

### Search All Businesses

```typescript
const response = client.api("businesses").search({"businessId": "validId"});

>>> Promise<IResponse<T>>
```

## Delegates

The client SDK can be used to query the [delegate resource](/docs/api/public-rest-api/endpoints/delegates).

A delegate is a regular wallet that has broadcasted a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcasted a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent \(it does not have to be recast unless a wallet wishes to change from delegate\). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```typescript
const response = client.api("delegates").all();

>>> Promise<IResponse<T>>
```

### Retrieve a Delegate

```typescript
const response = client.api("delegates").get("validId");

>>> Promise<IResponse<T>>
```

### List All Blocks of a Delegate

```typescript
const response = client.api("delegates").blocks("validId");

>>> Promise<IResponse<T>>
```

### List All Voters of a Delegate

```typescript
const response = client.api("delegates").voters("validId");

>>> Promise<IResponse<T>>
```

## Locks

This service API grants access to the lock resource. This can be used to access all locks initiated for wallets.

### List All Locks

```typescript
const response = client.api("locks").all();

>>> Promise<IResponse<T>>
```

### Retrieve a Lock

```typescript
const response = client.api("locks").get("validId");

>>> Promise<IResponse<T>>
```

### Search Locks

```typescript
const response = client.api("locks").search({"lockId": "validId"});

>>> Promise<IResponse<T>>
```

### Get Unlocked Locks

```typescript
const response = client.api("locks").unlocked({ids: [ "validId" ]});

>>> Promise<IResponse<T>>
```

## Node

The ARK network consists of different anonymous nodes \(servers\), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](/docs/api/public-rest-api/endpoints/node) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```typescript
const response = client.api("node").configuration();

>>> Promise<IResponse<T>>
```

### Retrieve the Status

```typescript
const response = client.api("node").status();

>>> Promise<IResponse<T>>
```

### Retrieve the Syncing Status

```typescript
const response = client.api("node").syncing();

>>> Promise<IResponse<T>>
```

### Retrieve the Fees

```typescript
const response = client.api("node").fees();

>>> Promise<IResponse<T>>
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](/docs/api/public-rest-api/endpoints/peers) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control.

### List All Peers

```typescript
const response = client.api("peers").all();

>>> Promise<IResponse<T>>
```

### Retrieve a Peer

```typescript
const response = client.api("peers").get("validIpAddress");

>>> Promise<IResponse<T>>
```

## Rounds

This service API grants access to the round resource. This can be used to access all round information for the network.

### List Delegates for a Round

```typescript
const response = client.api("rounds").delegates(roundNumber);

>>> Promise<IResponse<T>>
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](/docs/api/public-rest-api/endpoints/transactions).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```typescript
const response = client.api("transactions").create([...]);

>>> Promise<IResponse<T>>
```

### Retrieve a Transaction

```typescript
const response = client.api("transactions").get("validId");

>>> Promise<IResponse<T>>
```

### List All Transactions

```typescript
const response = client.api("transactions").all();

>>> Promise<IResponse<T>>
```

### List All Unconfirmed Transactions

```typescript
const response = client.api("transactions").allUnconfirmed();

>>> Promise<IResponse<T>>
```

### Get Unconfirmed Transaction

```typescript
const response = client.api("transactions").getUnconfirmed("validId");

>>> Promise<IResponse<T>>
```

### Search Transactions

```typescript
const response = client.api("transactions").search({"id": "validId"});

>>> Promise<IResponse<T>>
```

### List Transaction Types

```typescript
const response = client.api("transactions").types();

>>> Promise<IResponse<T>>
```

## Votes

A [vote](/docs/api/public-rest-api/endpoints/votes) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```typescript
const response = client.api("votes").all();

>>> Promise<IResponse<T>>
```

### Retrieve a Vote

```typescript
const response = client.api("votes").get("validId");

>>> Promise<IResponse<T>>
```

## Wallets

The [wallet resource](/docs/api/public-rest-api/endpoints/wallets#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```typescript
const response = client.api("wallets").all();

>>> Promise<IResponse<T>>
```

### Retrieve a Wallet

```typescript
const response = client.api("wallets").get("validId");

>>> Promise<IResponse<T>>
```

### List All Transactions of a Wallet

```typescript
const response = client.api("wallets").transactions("validId");

>>> Promise<IResponse<T>>
```

### List All Received Transactions of a Wallet

```typescript
const response = client.api("wallets").transactionsReceived("validId");

>>> Promise<IResponse<T>>
```

### List All Sent Transactions of a Wallet

```typescript
const response = client.api("wallets").transactionsSent("validId");

>>> Promise<IResponse<T>>
```

### List All Votes of a Wallet

```typescript
const response = client.api("wallets").votes("validId");

>>> Promise<IResponse<T>>
```

### List All Locks of a Wallet

```typescript
const response = client.api("wallets").locks("validId");

>>> Promise<IResponse<T>>
```

### List All Top Wallets

```typescript
const response = client.api("wallets").top();

>>> Promise<IResponse<T>>
```

### Search All Wallets

```typescript
const response = client.api("wallets").search({"address": "validId"});

>>> Promise<IResponse<T>>
```
