---
title: Overview - Data Models
---

# Data Models

Keep in mind that the data structures are kept consistent as much as possible for the sake of backward and forwards compatibility. As such, these data hierarchies are not necessarily the same as the object's internal representation.

This is something to keep in mind when accessing these models through the Event API, for example, as the correct way to obtain information might be different from following the structure listed here.

Where possible, these discrepancies are noted below. The `resources` directories in the `core-api` module help to paint a complete picture; they can be found in their respective repositories:

<livewire:embed-link url="https://github.com/ArkEcosystem/core/tree/develop/packages/core-api/src/resources" caption="Resources for the data structures returned via core-api" />

## Block

Blocks are the core unit of any given blockchain. In ARK, blocks contain a group of transactions and are signed by a delegate to validate their authenticity.

* **id**
* **version** _the version of ARK active on the network when the block was forged_
* **height** _the total number of blocks since genesis (block 1)_
* **previous** _the ID of the previous block in the chain_
* **forged**:
  * **reward** _total reward for mining block_
  * **fee** total _fee paid by users for this block_
  * **total** _total reward + total fee_
* **payload** fields holding metadata on the block's transactions:
  * **hash** _The SHA256 hash of the block's content_
  * **length** _the length of the payload hash in bytes_
* **generator** _the delegate who generated the block_:
  * _username_
  * _address_
  * _publicKey_
* **signature** _the signature of the delegate who forged the block_
* **confirmations** _the amount of times the network has declared this block as valid_
* **transactions** _the amount of transactions in the block_
* **timestamp**

## Transaction

Transactions are the heart of any blockchain, cryptocurrency or otherwise. They represent a transfer of value from one network participant to another. In ARK, transactions can be of one of multiple types, specified in [AIP11](https://github.com/ARKEcosystem/AIPs/blob/master/AIPS/aip-11.md), which can affect the content and data structure of each transaction's payload.

* **id**
* **blockId** _the ID of the block in which this transaction is included_
* **type** _the AIP11 type of the transaction_
* **amount** _the transaction value in arktoshi_
* **fee** _the fee paid to include the transaction in its block_
* **sender** _the address of the transaction sender_
* **recipient** _the address of the transaction recipient_
* **signature** _the signature of the sending party_
* **signSignature** _if secondSignature is enabled, the second signature is stored here_
* **signatures** _an array of the transaction's signatures, used in multisignature transactions to validate more than two signatures_
* **vendorField** _an optional text field written by the sender and associated with the transaction_
* **asset** _the type-specific transaction payload_
* **confirmations** _the amount of times this transaction's block has been confirmed_
* **timestamp**

## Wallet

Wallets are individual accounts on the ARK ledger. Each wallet has a balance that grows and shrinks as the wallet sends and receives transactions on the network. Additionally, each wallet can cast exactly one vote for one delegate to forge on their behalf.

Note in particular that private keys and passphrases are not included on this model, as they are never stored in memory at any point during the operation of ARK Core nodes.

* **address** _the wallet's address, derived from public key_
* **publicKey** _the wallet's public key, derived from private key_
* **secondPublicKey** _if the wallet has enabled a second key, that second key is stored here_

## Delegate

Though delegates are treated as their own data type in the ARK Public API, in their implementation delegates are nothing more than wallets whose owners have registered a delegate username.

They share all fields in common with the Wallet data structure, with a few extra fields:

* **username** _the delegate username of this wallet_
* **address** _the delegate address of this wallet_
* **publicKey** _the delegate public key of this wallet_
* **votes** _the sum of balances of all wallets voting for the delegate_
* **isResigned** _the resignation status of this delegate_
* **blocks**:
  * **produced** _the total number of blocks produced by the delegate_
  * **last** _the last block produced by the delegate_
* **production**:
  * **approval** _the vote share for this delegate_
* **forged**:
  * **fees** _the forged fees for this delegate_
  * **rewards** _the forged rewards for this delegate_
  * **total** _the forged fees and rewards for this delegate_

## Peer

Peers are nodes in the ARK network that work together to relay transactions and form consent. Each node keeps a list of current peers, regularly pruning and updating the list as new peers join and leave the network.

* **ip** _the IP address of the peer_
* **port** _the port on which the peer has enabled its P2P connection_
* **version** _the network version this peer is operating on_
* **height** _the total height of the blockchain as reported by the peer_
* **latency** _the average delay between contacting the peer and receiving a response_
