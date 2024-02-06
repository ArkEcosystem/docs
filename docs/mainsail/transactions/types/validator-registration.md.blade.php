---
title: Transaction Types - Validator Registration
---

# Validator Registration

A user or organization can register their address to become a validator and secure the network. Upon accumulating sufficient vote weight, the validator will begin forging transactions and receiving block rewards. In validator registration transaction, valdiator registers BLS12-281 public key. Registered public key is used to sign blocks and consensus messages. 

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/mainsail/blob/cb19935b0d6ba170994f8a6a237cfc13e9f98050/packages/crypto-transaction/source/validation/schemas.ts#L19-L40) \| [Validator Registration](https://github.com/ArkEcosystem/mainsail/blob/cb19935b0d6ba170994f8a6a237cfc13e9f98050/packages/crypto-transaction-validator-registration/source/versions/1.ts#L17-L34) |

