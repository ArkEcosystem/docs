---
title: Transaction Types - Vote / Unvote
---

# Vote & Unvote Transaction

A key feature of the ARK DPoS model is that each address can vote for one validator of their choosing to secure the network. A vote and unvote transaction type is therefore necessary to enable this functionality. Once an address votes for a validator, funds can enter and leave the address as needed, and vote weight adjusts automatically. Voting does not send funds to the validators’s ARK address in question - it only assigns vote weight

Holders of ARK vote through their wallets for validators who secure the network, insert blocks into the ledger, and create new ARK. The top 51 vote earners are named elected forging validators. Number of validators is related to [DPOS mechanism configuration](https://whitepaper.ark.io/public-network#4-2-consensus-mechanism).

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/mainsail/blob/main/packages/crypto-transaction/source/validation/schemas.ts#L19-L40) \| [Vote / Unvote Transaction](https://github.com/ArkEcosystem/mainsail/blob/cb19935b0d6ba170994f8a6a237cfc13e9f98050/packages/crypto-transaction-vote/source/versions/1.ts#L20-L50) |

## Single Vote Structure

A single-vote transaction is structured and works identically in Core v3 as it did in Core v2.

In the following example, we can see the first transaction from this wallet (`03415...ed192`) is a **Vote** for the publicKey `02511...36f34`.

### Signed JSON Payload

```javascript
{
    "version": 3,
    "network": 23,
    "type": 3,
    "nonce": "1",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "100000000",
    "amount": "0",
    "asset": {
        "votes": [
            "+02511f16ffb7b7e9afc12f04f317a11d9644e4be9eb5a5f64673946ad0f6336f34"
        ]
    },
    "signature": "582aa4650868c162516f4b2a2d872970483f5b9577014a831a6320dea3c01d5063618b5d857634497bb7683f1787e7fbb9826301066ef1cc680996acde457a03",
    "id": "72276571deef993f297d2f4e39985d425c40dac7f5dc9dd6a268423cb105ee11"
}
```

### Serialized Payload

```shell
ff03170100000003000100000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed19200e1f5050000000000010102511f16ffb7b7e9afc12f04f317a11d9644e4be9eb5a5f64673946ad0f6336f34582aa4650868c162516f4b2a2d872970483f5b9577014a831a6320dea3c01d5063618b5d857634497bb7683f1787e7fbb9826301066ef1cc680996acde457a03
```

### Deserialized Hex Payload

| Key | Pos. | Size _(bytes)_ | Value  _(hex)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **[0]** | **1** | `0xff` |
| **Version:** | **[1]** | **1** | `0x03` |
| **Network:** | **[2]** | **1** | `0x17` |
| **Typegroup:** | **[3]** | **4** | `0x01000000` |
| **Type:** | **[7]** | **2** | `0x0300` |
| **Nonce:** | **[9]** | **8** | `0x0100000000000000` |
| **SenderPublicKey:** | **[17]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **[50]** | **8** | `0x00e1f50500000000` |
| **VendorField Length:** | **[58]** | **1** | `0x00` |
| **Number of Votes:** | **[59]** | **1** | `0x01` |
| **Vote:** | **[60]** | **34** | `0x0102511f16ffb7b7e9afc12f04f317a11d9644e4be9eb5a5f64673946ad0f6336f34` |
| **Signature:** | **[94]** | **64** | `0xbb1f8e7825551ace32fc137c87142d45be512865879bf57f3361ddf743669f53a1856f90aed7edb612051693799055c66dc73e687cba6505e0aac3ca1b126ced` |

## Multi-Vote Structure

A multi-vote transaction is exclusive to Core v3 and allows up 2 different votes (**Vote**/**Unvote**) to be combined into a single transaction.

**key facts**:

* A Multi-vote contains a max of **2 Votes**.
  * A [single vote](#single-vote-structure) is still permitted.
* Votes must **not** be duplicated.
  * They **must** be either **`[Vote, Unvote]`** or **`[Unvote, Vote]`**.
  * It would **not** make sense to **Vote**--or **Unvote**--_twice_ in the same transaction.
* Votes **must** be ordered.
  * It would **not** make sense to **Vote** _THEN_ **Unvote** from a wallet that **has** already voted.
  * It would **not** make sense to **Unvote** _THEN_ **Vote** from a wallet that has **not** already voted.

In the following example, we can see this wallet's 2nd transaction is an **Unvote** for the publicKey `02511...36f34`, and a subsequent **Vote** for the publicKey `0259d...cfe79`.

### Signed JSON Payload

```javascript
{
    "version": 3,
    "network": 23,
    "type": 3,
    "nonce": "2",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "100000000",
    "amount": "0",
    "asset": {
        "votes": [
            "-02511f16ffb7b7e9afc12f04f317a11d9644e4be9eb5a5f64673946ad0f6336f34"
            "+0259d9ca7922c277b0e7407a88703bbb98f5da43a335b0eefa6c4642f072acfe79"
        ]
    },
    "signature": "51b77240bc639e6bcbe08510e0f71a77b029faa67ea60d7c7208963a00e155cafae06e35513db0b6bea1d16c4e19f36fe15fba03fbf59e2b556edf6923e06114",
    "id": "f1f2c81d42acf9da186c180c7c4c3646f8d60c2814e151ec216b960f58a9bfa7"
}
```

### Serialized Payload

```shell
ff03170100000003000200000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed19200e1f5050000000000020002511f16ffb7b7e9afc12f04f317a11d9644e4be9eb5a5f64673946ad0f6336f34010259d9ca7922c277b0e7407a88703bbb98f5da43a335b0eefa6c4642f072acfe7951b77240bc639e6bcbe08510e0f71a77b029faa67ea60d7c7208963a00e155cafae06e35513db0b6bea1d16c4e19f36fe15fba03fbf59e2b556edf6923e06114
```

### Deserialized Hex Payload

| Key | Pos. | Size _(bytes)_ | Value  _(hex)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **[0]** | **1** | `0xff` |
| **Version:** | **[1]** | **1** | `0x03` |
| **Network:** | **[2]** | **1** | `0x17` |
| **Typegroup:** | **[3]** | **4** | `0x01000000` |
| **Type:** | **[7]** | **2** | `0x0300` |
| **Nonce:** | **[9]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **[17]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **[50]** | **8** | `0x00e1f50500000000` |
| **VendorField Length:** | **[58]** | **1** | `0x00` |
| **Number of Votes:** | **[59]** | **1** | `0x02` |
| **Vote:** | **[60]** | **34** | `0x0002555806bca6737eaeaff6434d5171bac8aeb72533ed9bafb280dd11b328a3822d` |
| **Vote:** | **[94]** | **34** | `0x010259d9ca7922c277b0e7407a88703bbb98f5da43a335b0eefa6c4642f072acfe79` |
| **Signature:** | **[128]** | **64** | `0x51b77240bc639e6bcbe08510e0f71a77b029faa67ea60d7c7208963a00e155cafae06e35513db0b6bea1d16c4e19f36fe15fba03fbf59e2b556edf6923e06114` |
