---
title: Transactions - Calculating Dynamic Fees
---

# Calculating Dynamic Fees

Dynamic Fees (_initially proposed in [ARK AIP-16](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-16.md)_) are intended to act as a "fee marketplace" between users and delegates, and work to create a responsive and resilient network.

ARK Validators (Delegates) may set their own fee threshold for each transaction-type while ARK users can define how much they are willing to pay for a transaction's inclusion. In general, the higher the user-set fee the greater the incentive for a block producer to forge and add that transaction to the ARK Blockchain.

<x-alert type="info">
Note that while Dynamic Transaction Fees are fully functional on the ARK Mainnet Blockchain, regular users typically shouldn't need to change a fee manually as it may result in them under or over-paying for a transaction.
</x-alert>

You can view the original ARK.io Blog article discussing the purpose and mechanics of ARK Core v2 Dynamic Transaction Fees by visiting the link below:

<livewire:embed-link url="https://ark.io/blog/towards-flexible-marketplace-with-ark-dynamic-fees-running-on-new-core-31f1aaf1e867#dynamic-fee-calculation" caption="ARK.io Blog - v2 Dynamic Fees" />

## How Do ARK's Dynamic Fees Work?

Dynamic fees are an optional compenent that may be enabled and defined per node. Calculating these fees can be relatively straighforward once you understand the formula and basic process.

**Fee** = `(T+S) * C`  

* **T**: The transaction's **Offset** or _**addonBytes**_
  * Network-defined and varies by transactiontype.
  * Reduces economic interest in spamming the network.
  * Accounts for computational requirements.
    * _e.g. a `null` transfer value_
* **S**: The transaction's **Size**
  * Length of the transactions serialized byte sequence.
* **C**: The transaction's **Constant** fee multiplier
  * Calculated in Arktoshi's per byte.
  * Defined in a node's `<network>.json` file.
  * Each node may set its own values.
    * `minFeePool` and `minFeeBroadcast`

<!--
<x-alert type="info">
Note that this is only relevant for Validator/Delegate nodes because a non-forging node (a _relay_) does not produce blocks.

Note that this is relevant for both forging _and_ non-forging node. While relays do not produce blocks, they _do_ assist in transaction filtering and propagation.
</x-alert>
-->
 
### Dynamic Fees in the Wild

You can use a particular Core Node's API service to view their configuration, which includes whether or not dynamic fees are enabled as well as their Validator-defined values.

<!--
https://api.ark.io/api/node/configuration

```json
{
  "data": {
    "core": {
      "version": "3.0.5"
    },
    "nethash": "6e84d08bd299ed97c212c886c98a57e36545c8f5d645ca7eeae63a8bd62d8988",
    "slip44": 111,
    "wif": 170,
    "token": "ARK",
    "symbol": "\u0466",
    "explorer": "https://explorer.ark.io",
    "version": 23,
    "ports": {},
    "constants": {
      "height": 17632000,
      "reward": 200000000,
      "activeDelegates": 51,
      "blocktime": 8,
      "block": {
        "version": 0,
        "maxTransactions": 150,
        "maxPayload": 6300000,
        "acceptExpiredTransactionTimestamps": false,
        "idFullSha256": true
      },
      "epoch": "2017-03-21T13:00:00.000Z",
      "fees": {
        "staticFees": {
          "transfer": 10000000,
          "secondSignature": 500000000,
          "delegateRegistration": 2500000000,
          "vote": 100000000,
          "multiSignature": 500000000,
          "ipfs": 500000000,
          "multiPayment": 10000000,
          "delegateResignation": 2500000000,
          "htlcLock": 10000000,
          "htlcClaim": 0,
          "htlcRefund": 0
        }
      },
      "vendorFieldLength": 255,
      "multiPaymentLimit": 64,
      "aip11": true,
      "aip36": true,
      "aip37": true
    },
    "transactionPool": {
      "dynamicFees": {
        "enabled": true,
        "minFeePool": 3000,
        "minFeeBroadcast": 3000,
        "addonBytes": {
          "transfer": 100,
          "secondSignature": 250,
          "delegateRegistration": 400000,
          "vote": 100,
          "multiSignature": 500,
          "ipfs": 250,
          "multiPayment": 500,
          "delegateResignation": 100,
          "htlcLock": 100,
          "htlcClaim": 0,
          "htlcRefund": 0
        }
      },
      "maxTransactionsInPool": 15000,
      "maxTransactionsPerSender": 150,
      "maxTransactionsPerRequest": 40,
      "maxTransactionAge": 2700,
      "maxTransactionBytes": 2000000
    }
  }
}
```
-->

### Building Dynamic Fees

## Examples

### Tranfers

### Multi-Paymens

### Votes

### Multi-Signature

<!-- ## Try it Yourself -->

---

Click below to find a list of all available transaction-types:

<livewire:page-reference path="/docs/core/transactions/types/overview#list-of-transaction-types" />
