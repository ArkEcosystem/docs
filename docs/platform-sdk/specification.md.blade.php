---
title: Specification
---

# Specification

## Contracts

Each coin follows a strict implementation contract. All of these contracts can be found at the following links.

<x-link-collection
    :links="[
        ['path' => 'https://github.com/ArkEcosystem/platform-sdk/tree/master/packages/platform-sdk/src/contracts/coins', 'name' => 'Coins'],
        ['path' => 'https://github.com/ArkEcosystem/platform-sdk/tree/master/packages/platform-sdk/src/contracts/price-trackers', 'name' => 'Markets'],
        ['path' => 'https://github.com/ArkEcosystem/platform-sdk/tree/master/packages/platform-sdk/src/dto', 'name' => 'DTO'],
    ]"
/>

## Network Manifest

Each coin follows a strict implementation contract which can be incomplete for certain coins due to how they work or a lack of features. The missing or unsupported methods will throw exceptions and to avoid unwanted surprised we need a way of letting consumers of the SDK know that calling a certain method will lead to an exception.

### Example

Let's take the `platform-sdk-ark` network manifest as an example. It contains some information like the name and ticker, but the important part is the `featureFlags` object. This object contains all supported services and methods.

```typescript
import { Coins } from "@arkecosystem/platform-sdk";

import { transactions, importMethods, featureFlags } from "../shared";

const network: Coins.NetworkManifest = {
	id: "ark.mainnet",
	type: "live",
	name: "Mainnet",
	coin: "ARK",
	currency: {
		ticker: "ARK",
		symbol: "Ѧ",
		decimals: 8,
	},
	constants: {
		slip44: 111,
	},
	hosts: [
		{
			type: "full",
			host: "https://wallets.ark.io/api",
		},
		{
			type: "musig",
			host: "https://musig1.ark.io",
		},
		{
			type: "explorer",
			host: "https://explorer.ark.io",
		},
	],
	governance: {
		delegateCount: 51,
		votesPerWallet: 1,
		votesPerTransaction: 1,
	},
	transactions,
	importMethods,
	featureFlags,
	knownWallets: "https://raw.githubusercontent.com/ArkEcosystem/common/master/mainnet/known-wallets-extended.json",
	meta: {
		fastDelegateSync: true,
	},
};

export default network;
```

> [platform-sdk-ark/src/networks/ark/mainnet.ts](https://github.com/ArkEcosystem/platform-sdk/blob/05c46197d498f9972df7a321bbbf567e3eb90114/packages/platform-sdk-ark/src/networks/ark/mainnet.ts) | [Platform SDK v8.3.4](https://github.com/ArkEcosystem/platform-sdk/tree/05c46197d498f9972df7a321bbbf567e3eb90114)

---

```typescript
import { Coins } from "@arkecosystem/platform-sdk";

import { transactions, importMethods, featureFlags } from "../shared";

const network: Coins.NetworkManifest = {
	id: "ark.mainnet",
	type: "live",
	name: "Mainnet",
	coin: "ARK",
	currency: {
		ticker: "ARK",
		symbol: "Ѧ",
		decimals: 8,
	},
	constants: {
		slip44: 111,
	},
	hosts: [
		{
			type: "full",
			host: "https://wallets.ark.io/api",
		},
		{
			type: "musig",
			host: "https://musig1.ark.io",
		},
		{
			type: "explorer",
			host: "https://explorer.ark.io",
		},
	],
	governance: {
		delegateCount: 51,
		votesPerWallet: 1,
		votesPerTransaction: 1,
	},
	transactions,
	importMethods,
	featureFlags,
	knownWallets: "https://raw.githubusercontent.com/ArkEcosystem/common/master/mainnet/known-wallets-extended.json",
	meta: {
		fastDelegateSync: true,
	},
};

export default network;

import { Coins } from "@arkecosystem/platform-sdk";

export const transactions: Coins.NetworkManifestTransactions = {
	expirationType: "height",
	types: [
		"delegate-registration",
		"delegate-resignation",
		"htlc-claim",
		"htlc-lock",
		"htlc-refund",
		"ipfs",
		"multi-payment",
		"multi-signature",
		"second-signature",
		"transfer",
		"vote",
	],
	fees: {
		type: "dynamic",
		ticker: "ARK",
	},
	memo: true,
};

export const importMethods: Coins.NetworkManifestImportMethods = {
	address: {
		default: false,
		permissions: ["read"],
	},
	bip39: {
		default: true,
		permissions: ["read", "write"],
	},
	publicKey: {
		default: false,
		permissions: ["read"],
	},
};

export const featureFlags: Coins.NetworkManifestFeatureFlags = {
	Client: [
		"transaction",
		"transactions",
		"wallet",
		"wallets",
		"delegate",
		"delegates",
		"votes",
		"voters",
		"configuration",
		"fees",
		"syncing",
		"broadcast",
	],
	Fee: ["all"],
	Identity: [
		"address.mnemonic.bip39",
		"address.multiSignature",
		"address.privateKey",
		"address.publicKey",
		"address.validate",
		"address.wif",
		"keyPair.mnemonic.bip39",
		"keyPair.privateKey",
		"keyPair.wif",
		"privateKey.mnemonic.bip39",
		"privateKey.wif",
		"publicKey.mnemonic.bip39",
		"publicKey.multiSignature",
		"publicKey.wif",
		"wif.mnemonic.bip39",
	],
	Ledger: ["getVersion", "getPublicKey", "signTransaction", "signMessage"],
	Link: ["block", "transaction", "wallet"],
	Message: ["sign", "verify"],
	Transaction: [
		"delegateRegistration",
		"delegateResignation",
		"ipfs.ledgerS",
		"ipfs.ledgerX",
		"ipfs.musig",
		"ipfs",
		"multiPayment.ledgerS",
		"multiPayment.ledgerX",
		"multiPayment.musig",
		"multiPayment",
		"multiSignature.ledgerS",
		"multiSignature.ledgerX",
		"multiSignature.musig",
		"multiSignature",
		"secondSignature",
		"transfer.ledgerS",
		"transfer.ledgerX",
		"transfer.musig",
		"transfer",
		"vote.ledgerS",
		"vote.ledgerX",
		"vote.musig",
		"vote",
	],
};
```

> [platform-sdk-ark/src/networks/shared.ts](https://github.com/ArkEcosystem/platform-sdk/blob/05c46197d498f9972df7a321bbbf567e3eb90114/packages/platform-sdk-ark/src/networks/shared.ts) | [Platform SDK v8.3.4](https://github.com/ArkEcosystem/platform-sdk/tree/05c46197d498f9972df7a321bbbf567e3eb90114)

---

In the case of ARK it would be unsafe to call `IdentityService.keyPair({ privateKey: "..." })` because it would lead to an exception due to a lack of support for this specific way of retrieving a key-pair. Knowing that there is a lack of support for this feature before we even try to call the method will allow us to safe-guard our application against any unexpected behaviors for a certain coin.

An example of how the manifest would be commonly used is to check if a certain coin supports the `TransactionService.vote` method. Trying to call this for example for `ETH` would lead to an exception because voting is not yet supported for this coin.
