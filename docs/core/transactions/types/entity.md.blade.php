---
title: Transaction Types - Entity
---

# Entity Transaction

The Entity Declaration Transaction is made up of four different properties: Type, Subtype, Action and Data. It provides generic ways for entities to declare their status in terms of registrations, resignations and updates.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP36](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-36.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/core/blob/7a6a4e9a49bf7338da5b320c51cd86138fb06db7/packages/core-magistrate-crypto/src/transactions/entity.ts#L30-L78) \| [Entity Transaction Data](https://github.com/ArkEcosystem/core/blob/7a6a4e9a49bf7338da5b320c51cd86138fb06db7/packages/core-magistrate-crypto/src/transactions/utils/entity-schemas.ts#L1-L28) |

## Transaction Structure

### Signed JSON Payload

```javascript
{
  "version": 2,
  "network": 30,
  "typeGroup": 2,
  "type": 6,
  "nonce": "1",
  "senderPublicKey": "03224402ab371a9fb3e244daca8c433131b4967fbf66e324fd0624a72cf3f57449",
  "fee": "5000000000",
  "amount": "0",
  "asset": {
    "type": 0,
    "subType": 0,
    "action": 0,
    "data": {
      "name": "name",
      "ipfsData": "QmYSK2JyM3RyDyB52caZCTKFR3HKniEcMnNJYdk8DQ6KKB"
    }
  },
  "signature": "7a0855790b85608d40c6f8a076f90240b81e2f2b3ca3fc37f568c95efba379c0c0c64892f8171002dc7aee4340e86249f834df4e8579e5b320cc30aabe5b5beb",
  "id": "651debbc72d21ab2fe9a779d976870c3d427077f481ad9a744861829253fb01a"
}
```

### Serialized Payload

```shell
ff021e020000000600010000000000000003224402ab371a9fb3e244daca8c433131b4967fbf66e324fd0624a72cf3f5744900f2052a010000000000000000046e616d652e516d59534b324a794d335279447942353263615a43544b465233484b6e6945634d6e4e4a59646b384451364b4b427a0855790b85608d40c6f8a076f90240b81e2f2b3ca3fc37f568c95efba379c0c0c64892f8171002dc7aee4340e86249f834df4e8579e5b320cc30aabe5b5beb
```

### Deserialized Hex Payload

| Key | Pos. | Size _(bytes)_ | Value  _(hex)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **[0]** | **1** | `0xff` |
| **Version:** | **[1]** | **1** | `0x02` |
| **Network:** | **[2]** | **1** | `0x1e` |
| **TypeGroup:** | **[3]** | **4** | `0x02000000` |
| **Type:** | **[7]** | **2** | `0x0600` |
| **Nonce:** | **[9]** | **8** | `0x0100000000000000` |
| **SenderPublicKey:** | **[17]** | **33** | `0x03224402ab371a9fb3e244daca8c433131b4967fbf66e324fd0624a72cf3f57449` |
| **Fee:** | **[50]** | **8** | `0x00f2052a01000000` |
| **VendorField Length:** | **[58]** | **1** | `0x00` |
| **AssetType:** | **[59]** | **1** | `0x00` |
| **AssetSubType:** | **[60]** | **1** | `0x00` |
| **Action:** | **[61]** | **1** | `0x00` |
| **RegistrationId Length:** | **[62]** | **1** | `0x00` |
| **Name Length:** | **[63]** | **1** | `0x04` |
| **Name:** | **[64]** | **4** | `0x6e616d65` |
| **IPFS Hash Length:** | **[68]** | **** | `0x2e` |
| **IPFS Hash:** | **[69]** | **46** | `0x516d59534b324a794d335279447942353263615a43544b465233484b6e6945634d6e4e4a59646b384451364b4b42` |
| **Signature:** | **[115]** | **64** | `7a0855790b85608d40c6f8a076f90240b81e2f2b3ca3fc37f568c95efba379c0c0c64892f8171002dc7aee4340e86249f834df4e8579e5b320cc30aabe5b5beb` |
