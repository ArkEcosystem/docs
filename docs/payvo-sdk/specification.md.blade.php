---
title: Specification
---

# Specification

## Contracts

Each coin follows a strict implementation contract. All of these contracts can be found at the following links.

<x-link-collection
    :links="[
        ['path' => 'https://github.com/PayvoHQ/sdk/tree/master/packages/sdk/src/contracts/coins', 'name' => 'Coins'],
        ['path' => 'https://github.com/PayvoHQ/sdk/tree/master/packages/sdk/src/contracts/price-trackers', 'name' => 'Markets'],
        ['path' => 'https://github.com/PayvoHQ/sdk/tree/master/packages/sdk/src/dto', 'name' => 'DTO'],
    ]"
/>

## Network Manifest

Each coin follows a strict implementation contract which can be incomplete for certain coins due to how they work or a lack of features. The missing or unsupported methods will throw exceptions and to avoid unwanted surprised we need a way of letting consumers of the SDK know that calling a certain method will lead to an exception.

### Example

Let's take the `sdk-ark` network manifest as an example. It contains some information like the name and ticker, but the important part is the `featureFlags` object. This object contains all supported services and methods.

```typescript
import { Networks } from "@payvo/sdk";

import { explorer, transactions, importMethods, featureFlags } from "../shared";

const network: Networks.NetworkManifest = {
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
    explorer,
    knownWallets: "https://raw.githubusercontent.com/ArkEcosystem/common/master/mainnet/known-wallets-extended.json",
    meta: {
        fastDelegateSync: true,
    },
};

export default network;
```

> [sdk-ark/src/networks/ark/mainnet.ts](https://github.com/PayvoHQ/sdk/blob/0ad2fbc1f61247a282ee00789ce1933617ca8579/packages/sdk-ark/src/networks/ark/mainnet.ts) | [Platform SDK v9.0.4](https://github.com/PayvoHQ/sdk/tree/9c16ecb85166dd04ce6b92925284562840702b99)

---

```typescript
import { Networks } from "@payvo/sdk";

export const transactions: Networks.NetworkManifestTransactions = {
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

export const importMethods: Networks.NetworkManifestImportMethods = {
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

export const featureFlags: Networks.NetworkManifestFeatureFlags = {
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

export const explorer: Networks.NetworkManifestExplorer = {
    block: "block/{0}",
    transaction: "transaction/{0}",
    wallet: "wallets/{0}",
};
```

> [sdk-ark/src/networks/shared.ts](https://github.com/PayvoHQ/sdk/blob/0ad2fbc1f61247a282ee00789ce1933617ca8579/packages/sdk-ark/src/networks/shared.ts) | [Platform SDK v9.0.4](https://github.com/PayvoHQ/sdk/tree/9c16ecb85166dd04ce6b92925284562840702b99)

---

### Checking for Supported Feature Flags

In the case of ARK it would be unsafe to call `HDWallet.fromMnemonic(identity.mnemonic, { bip84: { account: 0 } })` because it would lead to an exception due to a lack of support for this specific way of retrieving a key-pair. Knowing that there is a lack of support for this feature before we even try to call the method will allow us to safe-guard our application against any unexpected behaviors for a certain coin.

A given coin's network may be checked for supported features using the following pattern as an example:

```typescript
network.allows(FeatureFlag.IdentityAddressMnemonicBip84);
```

---

### Available Feature Flags

Below is a list of all currently-available feature flags.

```typescript
export enum FeatureFlag {
    ClientBroadcast = "Client.broadcast",
    ClientDelegate = "Client.delegate",
    ClientDelegates = "Client.delegates",
    ClientTransaction = "Client.transaction",
    ClientTransactions = "Client.transactions",
    ClientVoters = "Client.voters",
    ClientVotes = "Client.votes",
    ClientWallet = "Client.wallet",
    ClientWallets = "Client.wallets",
    FeeAll = "Fee.all",
    IdentityAddressMnemonicBip39 = "Identity.address.mnemonic.bip39",
    IdentityAddressMnemonicBip44 = "Identity.address.mnemonic.bip44",
    IdentityAddressMnemonicBip49 = "Identity.address.mnemonic.bip49",
    IdentityAddressMnemonicBip84 = "Identity.address.mnemonic.bip84",
    IdentityAddressMultiSignature = "Identity.address.multiSignature",
    IdentityAddressPrivateKey = "Identity.address.privateKey",
    IdentityAddressPublicKey = "Identity.address.publicKey",
    IdentityAddressSecret = "Identity.address.secret",
    IdentityAddressValidate = "Identity.address.validate",
    IdentityAddressWif = "Identity.address.wif",
    IdentityKeyPairMnemonicBip39 = "Identity.keyPair.mnemonic.bip39",
    IdentityKeyPairMnemonicBip44 = "Identity.keyPair.mnemonic.bip44",
    IdentityKeyPairMnemonicBip49 = "Identity.keyPair.mnemonic.bip49",
    IdentityKeyPairMnemonicBip84 = "Identity.keyPair.mnemonic.bip84",
    IdentityKeyPairPrivateKey = "Identity.keyPair.privateKey",
    IdentityKeyPairSecret = "Identity.keyPair.secret",
    IdentityKeyPairWif = "Identity.keyPair.wif",
    IdentityPrivateKeyMnemonicBip39 = "Identity.privateKey.mnemonic.bip39",
    IdentityPrivateKeyMnemonicBip44 = "Identity.privateKey.mnemonic.bip44",
    IdentityPrivateKeyMnemonicBip49 = "Identity.privateKey.mnemonic.bip49",
    IdentityPrivateKeyMnemonicBip84 = "Identity.privateKey.mnemonic.bip84",
    IdentityPrivateKeySecret = "Identity.privateKey.secret",
    IdentityPrivateKeyWif = "Identity.privateKey.wif",
    IdentityPublicKeyMnemonicBip39 = "Identity.publicKey.mnemonic.bip39",
    IdentityPublicKeyMnemonicBip44 = "Identity.publicKey.mnemonic.bip44",
    IdentityPublicKeyMnemonicBip49 = "Identity.publicKey.mnemonic.bip49",
    IdentityPublicKeyMnemonicBip84 = "Identity.publicKey.mnemonic.bip84",
    IdentityPublicKeyMultiSignature = "Identity.publicKey.multiSignature",
    IdentityPublicKeySecret = "Identity.publicKey.secret",
    IdentityPublicKeyWif = "Identity.publicKey.wif",
    IdentityWifMnemonicBip39 = "Identity.wif.mnemonic.bip39",
    IdentityWifMnemonicBip44 = "Identity.wif.mnemonic.bip44",
    IdentityWifMnemonicBip49 = "Identity.wif.mnemonic.bip49",
    IdentityWifMnemonicBip84 = "Identity.wif.mnemonic.bip84",
    IdentityWifSecret = "Identity.wif.secret",
    LedgerGetPublicKey = "Ledger.getPublicKey",
    LedgerGetVersion = "Ledger.getVersion",
    LedgerSignMessage = "Ledger.signMessage",
    LedgerSignTransaction = "Ledger.signTransaction",
    LinkBlock = "Link.block",
    LinkTransaction = "Link.transaction",
    LinkWallet = "Link.wallet",
    MessageSign = "Message.sign",
    MessageVerify = "Message.verify",
    PeerSearch = "Peer.search",
    TransactionDelegateRegistration = "Transaction.delegateRegistration",
    TransactionDelegateRegistrationLedgerS = "Transaction.delegateRegistration.ledgerS",
    TransactionDelegateRegistrationLedgerX = "Transaction.delegateRegistration.ledgerX",
    TransactionDelegateResignation = "Transaction.delegateResignation",
    TransactionDelegateResignationLedgerS = "Transaction.delegateResignation.ledgerS",
    TransactionDelegateResignationLedgerX = "Transaction.delegateResignation.ledgerX",
    TransactionHtlcClaim = "Transaction.htlcClaim",
    TransactionHtlcClaimLedgerS = "Transaction.htlcClaim.ledgerS",
    TransactionHtlcClaimLedgerX = "Transaction.htlcClaim.ledgerX",
    TransactionHtlcLock = "Transaction.htlcLock",
    TransactionHtlcLockLedgerS = "Transaction.htlcLock.ledgerS",
    TransactionHtlcLockLedgerX = "Transaction.htlcLock.ledgerX",
    TransactionHtlcRefund = "Transaction.htlcRefund",
    TransactionHtlcRefundLedgerS = "Transaction.htlcRefund.ledgerS",
    TransactionHtlcRefundLedgerX = "Transaction.htlcRefund.ledgerX",
    TransactionIpfs = "Transaction.ipfs",
    TransactionIpfsLedgerS = "Transaction.ipfs.ledgerS",
    TransactionIpfsLedgerX = "Transaction.ipfs.ledgerX",
    TransactionMultiPayment = "Transaction.multiPayment",
    TransactionMultiPaymentLedgerS = "Transaction.multiPayment.ledgerS",
    TransactionMultiPaymentLedgerX = "Transaction.multiPayment.ledgerX",
    TransactionMultiSignature = "Transaction.multiSignature",
    TransactionMultiSignatureLedgerS = "Transaction.multiSignature.ledgerS",
    TransactionMultiSignatureLedgerX = "Transaction.multiSignature.ledgerX",
    TransactionSecondSignature = "Transaction.secondSignature",
    TransactionSecondSignatureLedgerS = "Transaction.secondSignature.ledgerS",
    TransactionSecondSignatureLedgerX = "Transaction.secondSignature.ledgerX",
    TransactionTransfer = "Transaction.transfer",
    TransactionTransferLedgerS = "Transaction.transfer.ledgerS",
    TransactionTransferLedgerX = "Transaction.transfer.ledgerX",
    TransactionVote = "Transaction.vote",
    TransactionVoteLedgerS = "Transaction.vote.ledgerS",
    TransactionVoteLedgerX = "Transaction.vote.ledgerX",
}
```

> [sdk-ark/src/enums.ts](https://github.com/PayvoHQ/sdk/blob/6eeb6d9cac724fc73e059680b50f41215974e045/packages/sdk/src/enums.ts) | [Platform SDK v9.0.4](https://github.com/PayvoHQ/sdk/tree/9c16ecb85166dd04ce6b92925284562840702b99)
