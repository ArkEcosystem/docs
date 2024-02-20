---
title: Transaction Types - Transfer
---

# Transfer

The transfer transaction enables a user to broadcast a transaction to the network sending ARK tokens from one ARK wallet to another. This transaction type provides the utility of store-of-value and value transfer. It also contains a special data field of 255 bytes called the vendor field, allowing raw data, code or plain text to be stored on the blockchain. The vendor field is public and immutable, and is also utilized in ARK SmartBridge Technology.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/mainsail/blob/main/packages/crypto-transaction/source/validation/schemas.ts#L19-L40) \| [Transfer](https://github.com/ArkEcosystem/mainsail/blob/cb19935b0d6ba170994f8a6a237cfc13e9f98050/packages/crypto-transaction-transfer/source/versions/1.ts#L19-L30) |
