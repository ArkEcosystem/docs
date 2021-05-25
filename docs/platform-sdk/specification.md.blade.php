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

Let's take the `platform-sdk-ark` network manifest as an example. It contains some information like the name and ticker but the important part is the `featureFlags` key. This key contains all services and their methods with a boolean value to indicate if a method is safe to call.

```typescript
// https://github.com/ArkEcosystem/platform-sdk/blob/d42c34a148f19d1453ef3acac1e8b949386339c2/packages/platform-sdk-ark/src/networks/ark/mainnet.ts

import { Coins } from "@arkecosystem/platform-sdk";

const network: Coins.NetworkManifest = {
	id: "ark.mainnet",
	type: "live",
	name: "Mainnet",
	coin: "ARK",
	explorer: "https://explorer.ark.io/",
	currency: {
		ticker: "ARK",
		symbol: "Ѧ",
	},
	fees: {
		type: "dynamic",
		ticker: "ARK",
	},
	crypto: {
		slip44: 111,
		signingMethods: {
			mnemonic: true,
			wif: true,
		},
		expirationType: "height",
	},
	networking: {
		hosts: ["https://wallets.ark.io"],
		hostsMultiSignature: ["https://musig1.ark.io"],
	},
	governance: {
		voting: {
			enabled: true,
			delegateCount: 51,
			maximumPerWallet: 1,
			maximumPerTransaction: 1,
		},
	},
	featureFlags: {
		Client: {
			transaction: true,
			transactions: true,
			wallet: true,
			wallets: true,
			delegate: true,
			delegates: true,
			votes: true,
			voters: true,
			configuration: true,
			fees: true,
			syncing: true,
			broadcast: true,
		},
		Fee: {
			all: true,
		},
		Identity: {
			address: {
				mnemonic: true,
				multiSignature: true,
				publicKey: true,
				privateKey: true,
				wif: true,
			},
			publicKey: {
				mnemonic: true,
				multiSignature: true,
				wif: true,
			},
			privateKey: {
				mnemonic: true,
				wif: true,
			},
			wif: {
				mnemonic: true,
			},
			keyPair: {
				mnemonic: true,
				privateKey: false,
				wif: true,
			},
		},
		Ledger: {
			getVersion: true,
			getPublicKey: true,
			signTransaction: true,
			signMessage: true,
		},
		Link: {
			block: true,
			transaction: true,
			wallet: true,
		},
		Message: {
			sign: true,
			verify: true,
		},
		Peer: {
			search: true,
		},
		Transaction: {
			transfer: { default: true, ledgerS: true, ledgerX: true },
			secondSignature: { default: true, ledgerS: true, ledgerX: true },
			delegateRegistration: { default: true, ledgerS: true, ledgerX: true },
			vote: { default: true, ledgerS: true, ledgerX: true },
			multiSignature: { default: true, ledgerS: true, ledgerX: true },
			ipfs: { default: true, ledgerS: true, ledgerX: true },
			multiPayment: { default: true, ledgerS: true, ledgerX: true },
			delegateResignation: { default: true, ledgerS: true, ledgerX: true },
		},
		Miscellaneous: {
			dynamicFees: true,
			memo: true,
		},
		Derivation: {
			bip39: true,
			bip44: true,
		},
		Internal: {
			fastDelegateSync: true,
		},
	},
	transactionTypes: [
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
	knownWallets: "https://raw.githubusercontent.com/ArkEcosystem/common/master/mainnet/known-wallets-extended.json",
};

export default network;


```

In the case of ARK it would be unsafe to call `IdentityService.keyPair({ privateKey: "..." })` because it would lead to an exception due to a lack of support for this specific way of retrieving a key-pair. Knowing that there is a lack of support for this feature before we even try to call the method will allow us to safe-guard our application against any unexpected behaviors for a certain coin.

An example of how the manifest would be commonly used is to check if a certain coin supports the `TransactionService.vote` method. Trying to call this for example for `ETH` would lead to an exception because voting is not yet supported for this coin.
