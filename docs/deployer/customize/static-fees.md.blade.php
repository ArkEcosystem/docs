---
title: Static Fees
---

# Static Fees

Every transaction type on your new network can have its own set of independent fees. Core supports static and dynamic fees \(dynamic being optional\). While we can set initial fees, every forger on the network can also configure them on their own or run the default ones you'll setup in this step. While you can set fees as low as 0.00000001 per transaction type, fees represent a way to ward off potential transaction spam on the network and reward forgers for verifying and including new transactions in blocks.

**Even if you enable dynamic fees, you should treat these static fees as a kind of "max reasonable fee" per tx type.**

## Setup

The first two parameters are related to setting ranges and steps for the sliders below. Note that you can also manually input custom numbers using a text box and bypass the sliders.

### Fee Slider Step

Is a number on how much the slider will move while setting each transaction type. This is the slider _granularity._

### Fee Slider Max

Is a maximum number to which the slider can go to. This is the slider _upper bound._

> Let's now set the fees per transaction type. Note that ARK Mainnet defaults are based on ARK's economic model of a specific genesis block amount, forging reward, block time, etc. So, your goal is to set fees that are deemed reasonable for each transaction type based on your bridgechain's economic model.

## Transfer Fee

Is the fee paid when sending coins to another address on the network. This is the most used transaction type on the network so finding a good balance between making it affordable and preventing spam should be the main focus.

## Vote/Unvote Fee

Is the fee paid when voting for a delegate on the network. This is considered the second most used transaction type on the network. Each address on the network has an option to vote for a delegate that will best represent their interest while making sure the delegate is capable of securing the network. Unvoting is part of this transaction type and can also be done if the address owner wants to change their vote or simply unvote a delegate.

## Second Signature Fee

Is an additional layer of security for any address on the network. If an address opts in, they will get a second passphrase to input when signing transactions instead of just one. This is optional and can be done on any address and at any time by each owner of the address on the network.

## Delegate Registration Fee

Is a fee that new delegates need to pay in order to register their unique name on the network. This will be an identifier for other users to find them and vote for them. This is a necessary step for those that want to become a potential forging delegate.

## Multi-Signature Fee

Is a special transaction type where more than one address is needed in order to sign a transaction. This can be N out of M signatures required for successfully signing and broadcasting a transaction on the network, where N is a number of minimum required signatures and M is the number of all signatures that are associated with multisignature \(e.g. 3 of 5 would mean you need at least 3 signatures out of 5 that are associated with that multisignature address\). This transaction type will become available with implementation of [AIP 18](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-18.md).

## IPFS Fee

Will be a special transaction type where you will be able to make a reference on a piece of data in hexadecimal format following IPFS standard. This transaction type will become available with implementation of [AIP 11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md).

## Timelock Fee

Will be a type of transaction that can happen in the future when a certain time or block is passed based on the time that was specified by the user at the creation of the transaction. This transaction type will become available with implementation of [AIP 11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md).

## Multi-payment Fee

A type of transaction where users will be able to "batch" their transactions inside a single multi-payment transaction. With that, users will be able to send to multiple addresses at the same time. This transaction type will become available with implementation of [AIP 11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md).

## Delegate Resignation Fee

In cases where a delegate no longer wishes to receive votes, they will have an option to resign their delegate. This will make it impossible to vote for this delegate or have the delegate included in forging rounds. This transaction type will become available with implementation of [AIP 11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md).
