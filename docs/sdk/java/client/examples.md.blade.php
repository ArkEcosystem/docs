---
title: Examples
---

# Examples

## Initialization

```java
import java.util.HashMap;
import java.io.IOException;
import org.arkecosystem.client.Connection;
import org.arkecosystem.client.api;

public class Main {
    public static void main(String[] args) throws IOException {
        HashMap<String, Object> map = new HashMap<>();
        map.put("host", "http://my.node.ip:port/api/");
        map.put("API-Version", 2);
        Connection connection = new Connection(map);
    }
}
```

## Blockchain

Used to get the latest block and supply of the blockchain.

### Get blockchain data

```java
LinkedTreeMap<String, Object> blockchain = connection2.api().blockchain.all();

>>> LinkedTreeMap<String, Object>
```

## Blocks

This service API grants access to the [blocks resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/blocks.html). A block is a signed set of transactions created by a delegate and permanently committed to the ARK blockchain.

> It is not possible to `POST` a block through the public API. Relay Nodes accept only blocks posted by a delegate at the correct time through the internal API.

### List All Blocks

```java
LinkedTreeMap<String, Object> blocks = connection.api().blocks.all();

>>> LinkedTreeMap<String, Object>
```

### Retrieve a Block

```java
LinkedTreeMap<String, Object> block = connection.api().blocks.show("validBlockId");

>>> LinkedTreeMap<String, Object>
```

### Retrieve first block

```java
LinkedTreeMap<String, Object> block = connection2.api().blocks.first();

>>> LinkedTreeMap<String, Object>
```

### Retrieve last block

```java
LinkedTreeMap<String, Object> block = connection2.api().blocks.last();

>>> LinkedTreeMap<String, Object>
```

### List All Transactions of a Block

```java
LinkedTreeMap<String, Object> blockTransactions = connection.api().blocks.transactions("validBlockId");

>>> LinkedTreeMap<String, Object>
```

### Search All Blocks

```java
LinkedTreeMap<String, Object> searchedBlocks = connection.api().blocks.search(new HashMap<>());

>>> LinkedTreeMap<String, Object>
```

## Bridgechains

This service API grants access to the bridgechain resource. This can be used to access all registered bridgechains on the network.

### List all bridgechains

```java
LinkedTreeMap<String, Object> bridgechains = connection2.api().bridgechains.all();

>>> LinkedTreeMap<String, Object>
```

### Retrieve a bridgechain

```java
LinkedTreeMap<String, Object> bridgechain = connection2.api().bridgechains.show("bridgechains genesis hash");

>>> LinkedTreeMap<String, Object>
```

### Search bridgechains

```java
LinkedTreeMap<String, Object> bridgechains = connection2.api().bridgechains.search(new HashMap<>());

>>> LinkedTreeMap<String, Object>
```

## Businesses

This service API grants access to the business resource. This can be used to access all registered businesses on the network.

### List all businesses

```java
LinkedTreeMap<String, Object> businesses = connection2.api().businesses.all();

>>> LinkedTreeMap<String, Object>
```

### Retrieve a businesses

```java
LinkedTreeMap<String, Object> businesses = connection2.api().businesses.show("wallet address");

>>> LinkedTreeMap<String, Object>
```

### Retrieve all bridgechains of a business

```java
LinkedTreeMap<String, Object> bridgechains = connection2.api().businesses.showBridgechains("D991ZqskaGWMDu9kpfpJr5LRssV7ek981k");

>>> LinkedTreeMap<String, Object>
```

### Search businesses

```java
LinkedTreeMap<String, Object> businesses = connection2.api().businesses.search(new HashMap<>());

>>> LinkedTreeMap<String, Object>
```

## Delegates

The client SDK can be used to query the [delegate resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/delegates.html).

A delegate is a regular wallet that has broadcast a registration transaction, acquired a sufficient number of votes, and has a Relay Node configured to forge new blocks through a `forger` module. At any time only 51 delegates are active. They are cost-efficient miners running the ARK network.

> Voters are wallets which have broadcast a vote transaction on a delegate. A vote remains active until an un-vote transaction is sent (it does not have to be recast unless a wallet wishes to change from delegate). Voting for a delegate does not give the delegate access to the wallet nor does it lock the coins in it.

### List All Delegates

```java
LinkedTreeMap<String, Object> delegates = connection.api().delegates.all();

>>> LinkedTreeMap<String, Object>
```

### Retrieve a Delegate

```java
LinkedTreeMap<String, Object> delegate = connection.api().delegates.show("validDelegateId");

>>> LinkedTreeMap<String, Object>
```

### List All Blocks of a Delegate

```java
LinkedTreeMap<String, Object> delegateBlocks = connection.api().delegates.blocks("validDelegateId");

>>> LinkedTreeMap<String, Object>
```

### List All Voters of a Delegate

```java
LinkedTreeMap<String, Object> delegateVoters = connection.api().delegates.voters("validDelegateId");

>>> LinkedTreeMap<String, Object>
```

### Search delegates

```java
LinkedTreeMap<String, Object> delegates = connection2.api().delegates.search(new HashMap<>());

>>> LinkedTreeMap<String, Object>
```

## Locks

This service API grants access to the lock resource. This can be used to access all locks initiated for wallets.

### List all locks

```java
LinkedTreeMap<String, Object> locks = connection2.api().locks.all();

>>> LinkedTreeMap<String, Object>
```

### Retrieve a lock

```java
LinkedTreeMap<String, Object> lock = connection2.api().locks.show("lock id");

>>> LinkedTreeMap<String, Object>
```

### Search unlocked locks

```java
LinkedTreeMap<String, Object> unlockedLocks = connection2.api().locks.searchUnlocked(new HashMap<>());

>>> LinkedTreeMap<String, Object>
```

### Search locks

```java
LinkedTreeMap<String, Object> locks = connection2.api().locks.search(new HashMap<>());

>>> LinkedTreeMap<String, Object>
```

## Node

The ARK network consists of different anonymous nodes (servers), maintaining the public ledger, validating transactions and blocks and providing APIs. The [node resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/node.html) allows for querying the health and configurations of the node used by the instantiated client.

### Retrieve the Configuration

```java
LinkedTreeMap<String, Object> nodeConfiguration = connection.api().node.configuration();

>>> LinkedTreeMap<String, Object>
```

### Retrieve the Status

```java
LinkedTreeMap<String, Object> nodeStatus = connection.api().node.status();

>>> LinkedTreeMap<String, Object>
```

### Retrieve the Syncing Status

```java
LinkedTreeMap<String, Object> nodeSyncingStatus = connection.api().node.syncing();

>>> LinkedTreeMap<String, Object>
```

### Retrieve the Fees

```java
LinkedTreeMap<String, Object> fees = connection2.api().node.fees(days);

>>> LinkedTreeMap<String, Object>
```

### Debug

```java
LinkedTreeMap<String, Object> debug = connection2.api().node.debug();

>>> LinkedTreeMap<String, Object>
```

## Peers

Each node is connected to a set of peers, which are Relay or Delegate Nodes as well. The [peers resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/peers.html) provides access to all peers connected to our node.

> Peers have made their Public API available for use; however for mission-critical queries and transaction posting you should use a node which is under your control. We provide a guide to setting up a Relay Node [here](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/tutorials/node/setup.html).

### List All Peers

```java
LinkedTreeMap<String, Object> peers = connection.api().peers.all();

>>> LinkedTreeMap<String, Object>
```

### Retrieve a Peer

```java
LinkedTreeMap<String, Object> peer = connection.api().peers.show("validIpAddress");

>>> LinkedTreeMap<String, Object>
```

## Rounds

This service API grants access to the round resource. This can be used to access all round information for the network.

### List Delegates for a Round

```java
LinkedTreeMap<String, Object> delegates = connection2.api().rounds.delegates(numberOfARound);

>>> LinkedTreeMap<String, Object>
```

## Transactions

The heart of any blockchain is formed by its transactions; state-altering payloads signed by a wallet. Most likely you will be querying for transactions most often, using the [transaction resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/transactions.html).

> A transaction is the only object which may be posted by a non-delegate. It requires a signature from a wallet containing a sufficient amount of ARK.

### Create a Transaction

```java
LinkedTreeMap<String, Object> transaction = connection.api().transactions.create(new ArrayList<>());

>>> LinkedTreeMap<String, Object>
```

### Retrieve a Transaction

```java
LinkedTreeMap<String, Object> transaction = connection.api().transactions.show("validTxId");

>>> LinkedTreeMap<String, Object>
```

### List All Transactions

```java
LinkedTreeMap<String, Object> transactions = connection.api().transactions.all();

>>> LinkedTreeMap<String, Object>
```

### List All Unconfirmed Transactions

```java
LinkedTreeMap<String, Object> unconfirmedTransactions = connection.api().transactions.allUnconfirmed();

echo gettype($unconfirmedTransactions);

>>> LinkedTreeMap<String, Object>
```

### Get Unconfirmed Transaction

```java
LinkedTreeMap<String, Object> unconfirmedTransaction = connection.api().transactions.showUnconfirmed("validTxId");

echo gettype($unconfirmedTransaction);

>>> LinkedTreeMap<String, Object>
```

### Search Transactions

```java
LinkedTreeMap<String, Object> searchedTransactions = connection.api().transactions.search(new HashMap<>());

>>> LinkedTreeMap<String, Object>
```

### List Transaction Types

```java
LinkedTreeMap<String, Object> transactionTypes = connection.api().transactions.types();

>>> LinkedTreeMap<String, Object>
```

### List transaction schemas

```java
LinkedTreeMap<String, Object> schemas = connection2.api().transactions.schemas();

>>> LinkedTreeMap<String, Object>
```

### List transaction fees

```java
LinkedTreeMap<String, Object> fees = connection2.api().transactions.fees();

>>> LinkedTreeMap<String, Object>
```

## Votes

A [vote](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/votes.html) is a transaction sub-type, where the `asset` field contains a `votes` object and the `transaction.type` is `3`.

### List All Votes

```java
LinkedTreeMap<String, Object> votes = connection.api().votes.all();

>>> LinkedTreeMap<String, Object>
```

### Retrieve a Vote

```java
LinkedTreeMap<String, Object> actual = connection.api().votes.show("validVoteId");

>>> LinkedTreeMap<String, Object>
```

## Wallets

The [wallet resource](https://github.com/ArkEcosystem/gitbooks-sdk/tree/fcb399a02301c4ed91f0da34e9adbad8e0d2f3dc/api/public/v2/wallets.html#list-all-wallets) provides access to:

* Wallets.
* Incoming and outgoing transactions per wallet.
* Each wallet's votes.

### Retrieve All Wallets

```java
LinkedTreeMap<String, Object> wallets = connection.api().wallets.all();

>>> LinkedTreeMap<String, Object>
```

### Retrieve a Wallet

```java
LinkedTreeMap<String, Object> wallet = connection.api().wallets.show("validWalletId");

>>> LinkedTreeMap<String, Object>
```

### List All Transactions of a Wallet

```java
LinkedTreeMap<String, Object> walletTransactions = connection.api().wallets.transactions("validWalletId");

>>> LinkedTreeMap<String, Object>
```

### List All Received Transactions of a Wallet

```java
LinkedTreeMap<String, Object> receivedTransactions = connection.api().wallets.receivedTransactions("validWalletId");

>>> LinkedTreeMap<String, Object>
```

### List All Sent Transactions of a Wallet

```java
LinkedTreeMap<String, Object> senTransactions = connection.api().wallets.sentTransactions("validWalletId");

>>> LinkedTreeMap<String, Object>
```

### List All Votes of a Wallet

```java
LinkedTreeMap<String, Object> walletVotes = connection.api().wallets.votes("validWalletId");

>>> LinkedTreeMap<String, Object>
```

### List All Top Wallets

```java
LinkedTreeMap<String, Object> topWallets = connection.api().wallets.top();

>>> LinkedTreeMap<String, Object>
```

### List locks of a Wallet

```java
LinkedTreeMap<String, Object> fees = connection2.api().wallets.locks(walletAddress);

>>> LinkedTreeMap<String, Object>
```

### Search All Wallets

```java
LinkedTreeMap<String, Object> searchedWallets = connection.api().wallets.search(new HashMap<>());

>>> LinkedTreeMap<String, Object>
```
