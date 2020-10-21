---
title: Transaction Testing
---

# Transaction Testing

Transactions are an integral component of the ARK Core Framework and requires thorough testing of all transaction types to ensure that:
- **Transactions are sent successfully**
- **The correct detail of each transaction is reported within the Explorer.**
- **Balances are updated correctly in the Explorer.**
- **Alternatively, you can check the API to check that details of the transactions are correct. You can find an example of a Send transaction [here](https://dexplorer.ark.io/api/transactions/ce72b48016d3fa1c68f21dfd33a7396f852546c4cb34f99d1ccb240fa1a35b2a)**

<x-alert type="info">
- Guides for sending all transactions within the Desktop Wallet can be found [here](/docs/desktop-wallet/intro#transactions)
- Using a JSON Viewer browser extension such as [this](https://chrome.google.com/webstore/detail/json-viewer/gbmdgpbipfallnflgajpaliibnhdgobh) makes viewing API data in a browser much easier to read.
</x-alert>

As you progress through this document, you are encouraged to test scenarios that you think of that we may have not detailed. 

## Send Transaction
The transfer transaction enables a user to broadcast a transaction to the network sending ARK tokens from one ARK wallet to another. This transaction type provides the utility of store-of-value and value transfer. It also contains a special data field of 255 bytes called the vendor field, allowing raw data, code or plain text to be stored on the blockchain. The vendor field is public and immutable, and is also utilized in ARK SmartBridge Technology.

- Before sending a transaction, check the balances of the sender and recipient via the explorer or API
- Using the Desktop Wallet, send a transaction between your wallets. 
- Once forged, check the balances of the sender and recipient and ensure that they are now updated correctly.
- Search for the Transaction ID via Explorer or API and ensure that all transaction details are displayed correctly. 
- Search for the Block ID and ensure all details are correct
- Repeat this process several times with and without utlizing the vendorField.    

## Multipayment Transaction
This type is designed to reduce the payload on the blockchain by enabling multiple payments to be combined and broadcast to the network as a single transaction. This benefits the end user and delegates by lowering transaction fees per payment and reducing congestion. ARK Core (devnet) will allow allow up to 128 payments to be combined within a single transaction. 

- Before sending a transaction, check the balances of the sender and recipients via the explorer or API
- Using the desktop wallet, send a multipayment transaction to X amounts of recipients. 
- Once forged, check the balances of the sender and recipients and ensure that they are now updated correctly.
- Search for the Transaction ID via Explorer or API and ensure that all transaction details are displayed correctly. 
- Search for the Block ID and ensure all details are correct.
- Repeat this process several times with and without utlizing the vendorField.  
- Devnet has a limit of 128 recipients for a multipayment. Advanced users can attempt to exceed this amount in a multipayment transaction using tools outside of the Desktop Wallet. 
 
## Delegate Registration 
A user or organization can register their address to become a delegate and secure the network. Upon accumulating sufficient vote weight, the delegate will begin forging transactions and receiving block rewards. The delegate assigns a custom name to their address to differentiate it from other delegates.

- Before sending a Delegate Registration transaction, check the balances of the sender via the explorer or API
- Using the desktop wallet, send a Delegate Registration transaction.
- Once forged, check the balances of the sender and ensure that they are now updated correctly.
- Search for the Transaction ID via Explorer or API and ensure that all transaction details are displayed correctly. 
- Search for the Block ID and ensure all details are correct.
- Check that you can now search for your delegate by name in the Explorer.

## Vote & Unvote
A key feature of the ARK DPoS model is that each address can vote for one delegate of their choosing to secure the network. A vote and unvote transaction type is therefore necessary to enable this functionality. Once an address votes for a delegate, funds can enter and leave the address as needed, and vote weight adjusts automatically. Voting does not send funds to the delegate’s ARK address in question - it only assigns vote weight

## Vote
- Before sending a vote transaction check the balances of the sender via the explorer or API.
- Select a delegate and note the amount of DARK voting for them and the amount of wallets voting for them.
- Using the Desktop Wallet, send a Vote transaction to vote for your selected delegate. 
- Once forged, check the balances of the sender and view the delegate you are voting for to ensure that the details are updated correctly. 
- Search for the selected delegate and check that their amount of DARK voting for them and the amount of wallets voting for them have been updated correctly.
- Search for the Transaction ID via Explorer or API and ensure that all transaction details are displayed correctly. 
- Search for the Block ID and ensure all details are correct.

## Unvote
- Repeat the 'Vote' process but send an 'Unvote' transaction instead.

## Vote & Unvote (in the same transaction)
<x-alert type="info">
A new feature of Core V3 is that now you can unvote your current delegate and vote for a new delegate within the same transaction. **This is new functionality to the Vote transaction and requires rigorous testing** 
</x-alert>
- Make sure the wallet you are testing with is already voting for a delegate
- Select a delegate and note the amount of DARK voting for them and the amount of wallets voting for them.
- Check the delegate you are currently voting for and note the DARK voting for them and the amount of wallets voting for them.
- Using the Desktop Wallet, vote for the delegate you have selected and broadcast the transaction.
- Once forged, your wallet will have automatically unvoted your previous delegate.
- Search for the unvoted delegate delegate and check that the amount of DARK voting for them and the amount of wallets voting for them have been updated correctly.
- Search for the voted delegate and check that their amount of DARK voting for them and the amount of wallets voting for them have been updated correctly.
- Search for the Transaction ID API and ensure that all transaction details are displayed correctly. 
- Search for the Block ID and ensure all details are correct.


## IPFS Transaction
This transaction type utilizes a special data field similar to the vendor field to store Interplanetary File System data on the blockchain. This provides an easy way to timestamp and optionally encrypt and verify files. This implementation of the IPFS transaction type won’t allow storing data on the blockchain - for that, special IPFS nodes are needed.

- Before sending a transaction, note the balances of the sender and recipient via the explorer or API.
- Using the Desktop Wallet, store an IPFS hash on the blockchain with an IPFS Transaction.
- Once forged, check the balances of the sender and recipient and ensure that they are now updated correctly.
- Search for the Transaction ID via Explorer or API and ensure that all transaction details are displayed correctly. 
- Search for the Block ID and ensure all details are correct
- Attempt to store the same IPFS hash on the blockchain with the same wallet. This should fail.  


## Delegate Resignation Transaction

This transaction type enables delegates to block potential voters from voting for them if they choose to withdraw their status as delegates. A non-reversible transaction can be sent to the network to indicate that the delegate should no longer be included in any future forging rounds.

- Before sending a Delegate Resistration transaction, check the balances of the sender via the explorer or API
- Using the desktop wallet, send a Delegate Resistration transaction.
- Once forged, check the balances of the sender and ensure that they are now updated correctly.
- Search for the Transaction ID via Explorer or API and ensure that all transaction details are displayed correctly. 
- Search for the Block ID and ensure all details are correct.
- Check the wallet of your resigned delegate ensure that the 'resigned' flag is set to true.


## Second Signature
This transaction type enables a user to add an extra layer of security to their address by creating a second passphrase, using mnemonic code for generating deterministic keys via BIP-39 to produce an additional 12 words. Once a second signature has been registered to a wallet, the owner of the wallet will then be required to input their primary and secondary passphrase when sending a transaction to the network.

- Before sending a Second Signature transaction, check the balances of the sender via the explorer or API
- Using the desktop wallet, send a Second Signature transaction.
- Once forged, check the balances of the sender and ensure that they are now updated correctly.
- Search for the Transaction ID via Explorer or API and ensure that all transaction details are displayed correctly. 
- Search for the Block ID and ensure all details are correct.
- Attempt to send another transaction and ensure that you are required to sign the transaction with a second signature.

## Entity Transaction Guide

<x-alert type="info">
The next set of transaction testing requires the use of the core-tx-tester as entity transactions are not currently supported in the ARK Desktop Wallet. To install and setup the `core-tx-tester`, follow the install guide [here](https://github.com/ArkEcosystem/core-tx-tester)
</x-alert>

[AIP-36(Entity Declarations)](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-36.md) are a new set of Magistrate Transaction-types that replaces & improves the current Business & Blockchain transactions first introduced on the ARK Public Network (APN) with the release of ARK Core v2.6.

Magistrate Transactions are used to `Register`, `Update` or `Resign` an entity.

Each entity transaction must contain a `type` and `subtype`.

### Type

The `type` refers to the type of entity that is being registered. This number can be of any value between 0-255. However, currently the following types have been defined.

```
Business = 0,
Product = 1,
Plugin = 2,
Module = 3,
Delegate = 4
```

### subType

The `subType` refers to a sub-category that the type belongs to. For example, a 'Business' could have a subtype of 'Finance'. As with the `type`, the `subType` is defined by a number between 0-255. 


## Register Entity Transaction using `core-tx-tester`

After running `node index.js` which will load the `core-tx-tester` with your configuration. Each entity transaction must have the following prefix:

`11 1`

We can then add a `type` to the transaction, in this example we will register a business by adding a `0`:

`11 1 0`

We will then add a `subtype` of `1` to this business registration:

`11 1 0 1`

We then need to provide an action, and we will `register` this entity:

`11 1 0 1 register`

We then need to provide a name to this registration which we'll call `businessname`

`11 1 0 1 register businiessname`

Lastly, we can add an IPFS hash to our registration:

`11 1 0 1 register businiessname QmXrvSZaDr8vjLUB9b7xz26S3kpk3S3bSc8SUyZmNPvmVo`

Using the above command in `core-tx-tester`, we have registered a `business` called `businessname` with a subtype of `0`. 

### Examples

>`11 1 0 3 register name QmXrvSZaDr8vjLUB9b7xz26S3kpk3S3bSc8SUyZmNPvmVo`  
> Registers a 'Business' titled 'name' with a subtype of 3  
>`11 1 1 2 register name1 QmXrvSZaDr8vjLUB9b7xz26S3kpk3S3bSc8SUyZmNPvmVo`  
> Registers a 'Product' titled 'name1' with a subtype of 2  
>`11 1 2 1 register name2 QmXrvSZaDr8vjLUB9b7xz26S3kpk3S3bSc8SUyZmNPvmVo`  
> Registers a 'Plugin' titled 'name2' with a subtype of 1  
>`11 1 3 0 register name3 QmXrvSZaDr8vjLUB9b7xz26S3kpk3S3bSc8SUyZmNPvmVo`  
> Registers a 'Module' titled 'name3' with a subtype of 0   

<x-alert type="warning">
You can only register a delegate entity if the wallet you are using has already registered as a delegate on the network. 
Ensure that the name of your entity delegate matches the name of your registered delegate, otherwise the transaction will fail.
</x-alert>

## Update Entity Transaction using `core-tx-tester`

You can send an `update` transaction for any registered entity by replacing the `name` with the `registrationID` of your initial transaction.

Using the `businessname` example from above, we could update the entity with the following command:

`11 1 0 1 update registrationID QmXrvSZaDr8vjLUB9b7xz26S3kpk3S3bSc8SUyZmNPvmVo`

## Resign Entity Transaction using `core-tx-tester`

You can `resign` any registered entity by using the registration ID as with the `update` transaction. An `IPFS hash` is not required to `resign` an entity. 

Using the `businessname` example from above, we could resign the entity with the following command:

`11 1 0 1 resign registrationID`

## Entity Transaction Testing 

Register, update and resign various entites and ensure that the data is correctly displayed via API or the Explorer.

<x-alert type="info">
Registered entity names need to be unique by **type**. If a business called `businessname` is already registered, any attempt to register another business titled `businessname` should fail.
</x-alert>

## Advanced Users

Advanced Users can follow the documentation provided [here](/docs/core/transactions/transaction-types/intro) on each transaction type to attempt send malformed data using tools outside of the Desktop Wallet and core-tx-tester. 