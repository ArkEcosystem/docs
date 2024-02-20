---
title: Transaction Types - Validator Resignation
---

# Valdaitor Resignation

This transaction type enables validators to block potential voters from voting for them if they choose to withdraw their status as validator. A non-reversible transaction can be sent to the network to indicate that the validator should no longer be included in any future forging rounds.

This transaction acts as a "kill command" for validators who wish to resign or retire their validator. Activating a validator resignation will mean validators will no longer be able to receive any new votes. Plus, for actively forging validators, enabling validator resignation will mean they permanently drop out of the top 51. This provides a clean and simple way to retire a validator.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/mainsail/blob/main/packages/crypto-transaction/source/validation/schemas.ts#L19-L40) \| [Validator Resignation](https://github.com/ArkEcosystem/mainsail/blob/cb19935b0d6ba170994f8a6a237cfc13e9f98050/packages/crypto-transaction-validator-resignation/source/versions/1.ts#L13-L20) |
