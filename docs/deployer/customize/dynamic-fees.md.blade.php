---
title: Dynamic Fees
---

# Dynamic Fees

Dynamic fees are an optional feature of the Core that you can enable or disable by the switching the toggle. Dynamic fees work in a way that they are calculated based on the size of transaction and predefined addon bytes that can be different for each transaction type. Addon bytes can add some default value to each transaction such that it will create an _absolute minimum fee_ for that transaction type. While you can disable dynamic fees by default (meaning static will be used as primary option), this does not mean it will be disabled for eternity or that all forgers need to enable them for it to take effect. By design, any delegate can enable dynamic fees later in the configuration file or manually modify their static fees.

## Minimum Fee for Transaction Pool

Is minimum acceptable fee on any transaction type that needs to be met to enter transaction pool of the node. TX pool is a first step in the transaction life cycle, before it gets confirmed and included in the block. This number should be high enough to deter basic spam attacks, but low enough to fit in with the economic model you are setting up for your chain.

## Minimum Fee to Broadcast

Is a minimum acceptable fee for any transaction type that needs to be met in order to be broadcast to other peers on the network. This number should be high enough to deter basic spam attacks, but low enough to fit in with the economic model you are setting up for your chain.

## Addon Bytes

With dynamic fees we can set addon bytes, which is a way to put some minimum value on the transaction fees in order to prevent abuse in the form of spam attacks. If you are not sure you can use default values. In order to understand the formula you can read [this section](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-16.md#formula-calculation) of AIP 16, which covers the dynamic fee formula (T in that formula is addon bytes / offset).

Addon bytes can be set for all transaction types:

* Transfer Fee
* Vote Fee
* Second Signature Fee
* Delegate Registration Fee
* Multi-Signature Fee (*)
* IPFS Fee (*)
* Timelock Fee (*)
* Multi-payment Fee (*)
* Delegate Resignation Fee (*)

> * (*): Part of the upcoming [AIP 11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md) and [AIP 18](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-18.md) transaction type upgrades.
