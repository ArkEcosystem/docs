---
title: Transaction Types - MultiPayment
---

# MultiPayment Transaction

This type is designed to reduce the payload on the blockchain by enabling multiple payments to be combined and broadcast to the network as a single transaction. This benefits the end user and validators by lowering transaction fees per payment and reducing congestion. Initially and depending on testing, the ARK Core will allow at least 64 payments to be combined within a single transaction for APN/Mainnet. Eventually, the number of payments per transaction will be able to scale as needed.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/mainsail/blob/main/packages/crypto-transaction/source/validation/schemas.ts#L19-L40) \| [MultiPayment Transaction](https://github.com/ArkEcosystem/mainsail/blob/cb19935b0d6ba170994f8a6a237cfc13e9f98050/packages/crypto-transaction-multi-payment/source/versions/1.ts#L22-L52) |
