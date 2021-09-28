---
title: Transactions - Calculating Dynamic Fees
---

# Calculating Dynamic Transaction Fees

This section will provide some basic information you can use to calculate dynamic transaction fees.

## Why Dynamic Fees?

Dynamic Fees are intended to act as a "fee marketplace" between users and delegates, creating a dynamic, responsive, and resilient network.

ARK Validators (Delegates) may set their own fee threshold for each transaction-type while ARK users can define how much they are willing to pay for a transaction's inclusion . In short, the higher the user-set fee the faster that transaction will be forged and added to the ARK Blockchain.

<x-alert type="info">
Note that while Dynamic Transaction Fees are fully functional on the ARK Mainnet Blockchain, regular users typically shouldn't need to change a fee manually as it may result in them under or over-paying for a transaction.
</x-alert>

You can view the original ARK.io Blog article discussing the purpose and mechanics of ARK Core v2 Dynamic Transaction Fees by visiting the link below:

<livewire:embed-link url="https://ark.io/blog/towards-flexible-marketplace-with-ark-dynamic-fees-running-on-new-core-31f1aaf1e867#dynamic-fee-calculation" caption="ARK.io Blog - v2 Dynamic Fees" />

## How do Dynamic Fees Work?

Calculating a Dynamic Fee is a fairly straighforward process once you're familiar with the basic formula.

### The Forumula

The calculation formula: **Fee** = `(T+S) * C`  
The calculation formula: `Fee = C(T+S)`

### Definitions

* **T** (**Offset**): The transaction's "_offset_."
  * Network-defined and varies by transaction-type.
  * Accounts for extra computational power, especially transactions whose transfer value is `null`.
  * Reduces economic interest in spamming the network.
* **S** (**Size**): The "_size_" of the serialized transaction.
  * Calculated in bytes.
* **C** (**Constant**): The fee's "_constant_" multiplier.
  * Calculated in Arktoshi's per-byte.
  * The `minFeePool` and `minFeeBroadcast`.
  * Defined per Validator.

---

Click below to find a list of all available transaction-types:

<livewire:page-reference path="/docs/core/transactions/types/overview#list-of-transaction-types" />
