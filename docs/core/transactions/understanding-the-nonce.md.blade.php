---
title: Transactions - Understanding the Nonce
---

# Understanding Transaction Nonce

## Introduction

ARK transactions use a sequential nonce to protect against [double-spending](https://en.m.wikipedia.org/wiki/Double-spending), long-range attacks, key-leakage as a result of signature reuse, and [side-channel attacks](https://en.m.wikipedia.org/wiki/Side-channel_attack) associated with random nonces.

A sequential nonce effectively counts each outgoing transaction from a given wallet. This means that the first transaction from a wallet must have a nonce of **1**, the second transaction must have a nonce of **2**, and so on.

This ensures that the data contained within a particular transaction will always be unique and thus results in a distinct hash that will necessarily produce a unique signature.

**key facts**:

* The 1st transaction from a wallet **must** have a nonce of **1**.
* The nonce **must** increment sequentially for every subsequent transaction being sent. (_e.g. 2, 3, 4, 5, 6, 7, ..._)
* A nonce **cannot** be reused.
* A nonce **cannot** be skipped. (_a transaction with a nonce of **5** originating from a wallet with a nonce of **3** will be rejected._)

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
If you retrieved a nonce value of **123** for a wallet, the next transaction will have to use nonce **124,** (current_nonce + 1). The API will increase the nonce value once a transaction has been forged for the wallet.
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
