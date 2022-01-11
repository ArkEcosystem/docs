---
title: Examples
---

# Examples

## Initialization

```php
use ArkEcosystem\Client\Connection;

$connection = new Connection([
    'host' => 'http://my.ark.node:port/api/',
]);
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```php
$blocks = $connection->blocks()->all();

echo gettype($blocks);

>>> array
```

### Retrieve a Block

```php
$block = $connection->blocks()->show('validBlockId');

echo gettype($block);

>>> array
```

### List All Transactions of a Block

```php
$blockTransactions = $connection->blocks()->transactions('validBlockId');

echo gettype($blockTransactions);

>>> array
```

### Search All Blocks

```php
$searchedBlock = $connection->blocks()->search(['address' => 'validAddress']);

echo gettype($searchedBlock);

>>> array
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent (it does not have to be recast unless a wallet wishes to change from delegate). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```php
$delegates = $connection->delegates()->all();

echo gettype($delegates);

>>> array
```

### Retrieve a Delegate

```php
$delegate = $connection->delegates()->show('validDelegateId');

echo gettype($delegate);

>>> array
```

### List All Blocks of a Delegate

```php
$delegateBlocks = $connection->delegates()->blocks('validDelegateId');

echo gettype($delegateBlocks);

>>> array
```

### List All Voters of a Delegate

```php
$delegates = $connection->delegates()->voters('validDelegateId');

echo gettype($delegates);

>>> array
```

## Node

The ARK network consists of different anonymous nodes (servers), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```php
$nodeConfiguration = $connection->node()->configuration();

echo gettype($nodeConfiguration);

>>> array
```

### Retrieve the Status

```php
$nodeStatus = $connection->node()->status();

echo gettype($nodeStatus);

>>> array
```

### Retrieve the Syncing Status

```php
$nodeSyncingStatus = $connection->node()->syncing();

echo gettype($nodeSyncingStatus);

>>> array
```

### Retrieve the Fees

```php
$nodeFees = $connection->node()->fees();

echo gettype($nodeFees);

>>> array
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```php
$peers = $connection->peers()->all();

echo gettype($peers);

>>> array
```

### Retrieve a Peer

```php
$peer = $connection->peers()->show('validIpAddress');

echo gettype($peer);

>>> array
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```php
$transactions = $connection->transactions()->create(['transactions' => []]);

echo gettype($transactions);

>>> array
```

### Retrieve a Transaction

```php
$transaction = $connection->transactions()->show('validTransactionId');

echo gettype($transaction);

>>> array
```

### List All Transactions

```php
$transactions = $connection->transactions()->all();

echo gettype($transactions);

>>> array
```

### List All Unconfirmed Transactions

```php
$unconfirmedTransactions = $connection->transactions()->allUnconfirmed();

echo gettype($unconfirmedTransactions);

>>> array
```

### Get Unconfirmed Transaction

```php
$unconfirmedTransaction = $connection->transactions()->showUnconfirmed('validUnconfirmedTransactionsId');

echo gettype($unconfirmedTransaction);

>>> array
```

### Search Transactions

```php
$transactions = $connection->transactions()->search(['amount' => 1]);

echo gettype($transactions);

>>> array
```

### List Transaction Types

```php
$transactionsTypes = $connection->transactions()->types();

echo gettype($transactionsTypes);

>>> array
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```php
$votes = $connection->votes()->all();

echo gettype($votes);

>>> array
```

### Retrieve a Vote

```php
$vote = $connection->votes()->show('validTransactionId');

echo gettype($vote);

>>> array
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```php
$wallets = $connection->wallets()->all();

echo gettype($wallets);

>>> array
```

### Retrieve a Wallet

```php
$wallet = $connection->wallets()->show('validWalletId');

echo gettype($wallet);

>>> array
```

### List All Transactions of a Wallet

```php
$walletTransactions = $connection->wallets()->transactions('validWalletId');

echo gettype($walletTransactions);

>>> array
```

### List All Received Transactions of a Wallet

```php
$walletReceivedTransactions = $connection->wallets()->receivedTransactions('validWalletId');

echo gettype($walletReceivedTransactions);

>>> array
```

### List All Sent Transactions of a Wallet

```php
$walletSentTransactions = $connection->wallets()->sentTransactions();

echo gettype($walletSentTransactions);

>>> array
```

### List All Votes of a Wallet

```php
$walletVotes = $connection->wallets()->votes('validWalletId');

echo gettype($walletVotes);

>>> array
```

### List All Top Wallets

```php
$topWallets = $connection->wallets()->top();

echo gettype($topWallets);

>>> array
```

### Search All Wallets

```php
$wallet = $connection->wallets()->search(['address' => 'validAddress']);

echo gettype($wallet);

>>> array
```
