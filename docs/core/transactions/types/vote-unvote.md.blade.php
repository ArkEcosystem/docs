---
title: Transaction Types - Vote / Unvote
---

# Vote & Unvote Transaction

A key feature of the ARK DPoS model is that each address can vote for one delegate of their choosing to secure the network. A vote and unvote transaction type is therefore necessary to enable this functionality. Once an address votes for a delegate, funds can enter and leave the address as needed, and vote weight adjusts automatically. Voting does not send funds to the delegate’s ARK address in question - it only assigns vote weight

Holders of ARK vote through their wallets for delegates who secure the network, insert blocks into the ledger, and create new ARK. The top 51 vote earners are named elected forging delegates. Number of delegates is related to [DPOS mechanism configuration](https://whitepaper.ark.io/public-network#4-2-consensus-mechanism).

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/core/blob/aef8a3848fdc91aa6f44248dd37643e0fe7926e7/packages/crypto/src/transactions/types/schemas.ts#L17-L45) \| [Vote / Unvote Transaction](https://github.com/ArkEcosystem/core/blob/aef8a3848fdc91aa6f44248dd37643e0fe7926e7/packages/crypto/src/transactions/types/schemas.ts#L125-L147) |
 