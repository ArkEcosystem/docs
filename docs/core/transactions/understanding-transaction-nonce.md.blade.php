---
title: Understanding Transaction Nonce
---

# Understanding Transaction Nonce

## Introduction

In ARK, every transaction has a sequential nonce. The nonce is the number of transactions sent from a given address. Each time you send a transaction, the nonce value increases by **1**. There are rules about what transactions are considered valid transactions, and the nonce is used to enforce some of these rules.

**Specifically:**

* **Transactions must be in order.**  You cannot have a transaction with a nonce of **1** forged before one with a nonce of **0**. In the case of ARK, it’s a monotonically increasing number that starts at **1** for the first transaction a wallet **sends**. Each subsequent transaction that wallet sends, will increment the nonce by one.
* **No skipping!**  You cannot have a transaction with a nonce of **2** forged if you have not already sent transactions with a nonce of **1** and **0**. There can be no gaps between transaction nonces, so every new transaction will have a nonce that is one higher than the last transaction.

## How To Get Nonce Value For An Address?

A sequential nonce depends on the amount of transaction a specific wallet has sent. You can find the current nonce for a wallet by utilizing the Public API, more specifically the [wallet endpoint](/docs/api/public-rest-api/endpoints/wallets#retrieve-a-wallet). The wallet endpoint returns the wallet details, including the current wallets nonce field, like below:

```javascript
{
    "data": {
        "address": "D8rr7B1d6TL6pf14LgMz4sKp1VBMs6YUYD",
        "publicKey": "03df6cd794a7d404db4f1b25816d8976d0e72c5177d17ac9b19a92703b62cdbbbc",
        "nonce": "123",  // THIS IS WALLETS CURRENT NONCE VALUE
        "balance": "7919999400",
        "attributes": {
            ...
            ...
            ...
        },
        "lockedBalance": "0",
        "isDelegate": false,
        "isResigned": false
    }
}
```

## How To Set Nonce Value?

When you create a new transaction for that wallet, you will use the **current nonce and add 1** to it to get to the new nonce value.

<x-alert type="info">
If you retrieved a nonce value of **123** for a wallet, the next transaction will have to use nonce **124,** \(current\_nonce + 1\). The API will increase the nonce value once a transaction has been forged for the wallet.
</x-alert>

### Sending Multiple Transactions

You have to keep track locally of the next nonce value in case you intend to send multiple transactions in a single block.

For example, we have a wallet with nonce 123 and want to send 3 transactions to be forged in the next block. These transactions will require nonce values 124, 125 and 126 respectively, and you will have to set the values, before creating transactions.

After the block is forged, the API will report the _current_ nonce of the wallet to be 126.

## **Why does it matter?**

This value prevents double-spending and makes long range attacks much harder, as the nonce will always specify the order of transactions. If a double-spend _does_ occur, it’s typically due to the following process:

* A transaction is sent to one party.
* They wait for it to register.
* Something is collected from this first transaction.
* Another transaction is quickly sent with a high gas price.
* The second transaction is forged first, therefore invalidating the first transaction.

This is why exchanges wait for you to have a certain number of confirmations before allowing you to trade freshly-deposited funds.
