---
title: Transaction Types - Multisignature
---

# MultiSignature Transaction

By utilizing Schnorr Signatures - multiple signatures and their corresponding keys can be aggregated into one. This enables the creation of transactions that must be authorized by a minimum number of participants (signatures).

For a detailed explanation of how MultiSignature transaction works, please **read our blog post here:**

<livewire:embed-link url="https://blog.ark.io/ark-core-series-schnorrs-multisignatures-4979caac887a" caption="TODO" />

You can also set-up your own Multisignature server by following this guide:

<livewire:embed-link url="https://blog.ark.io/ark-core-series-multisignature-server-9557f5a9e711" caption="TODO" />

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP18](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-18.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/mainsail/blob/main/packages/crypto-transaction/source/validation/schemas.ts#L19-L40) \| [MultiSignature Transaction](https://github.com/ArkEcosystem/mainsail/blob/cb19935b0d6ba170994f8a6a237cfc13e9f98050/packages/crypto-transaction-multi-signature-registration/source/versions/1.ts#L24-L66) |
