---
title: Complementary Examples
---

# Complementary Examples

## Prerequisites

Before we get started we need to make sure that all of the required dependencies are installed. These dependencies are the [Crypto SDK](/docs/sdk/typescript/crypto/api-documentation) and [Client SDK](/docs/sdk/typescript/client/api-documentation). You can head on over to their documentations to read more about them but for now we are only concerned with installing them to get up and running.

Open your project and execute the following commands to install both SDKs. Make sure that those complete without any errors. If you encounter any errors, please [open an issue](https://github.com/ArkEcosystem/core/issues/new) with as much information as you can provide so that our developers can have a look and get to the bottom of the issue.

### [yarn](https://yarnpkg.com/)

```bash
yarn add @arkecosystem/crypto
yarn add @arkecosystem/client
```

### [pnpm](https://pnpm.js.org/)

```bash
pnpm add @arkecosystem/crypto
pnpm add @arkecosystem/client
```

### [npm](https://www.npmjs.com/)

```bash
npm install @arkecosystem/crypto
npm install @arkecosystem/client
```

Now that we're setup and ready to go we'll look into some examples for the most common tasks you'll encounter when wanting to interact with the ARK Blockchain.

## Persisting your transaction on the blockchain

The process of getting your transaction verified and persisted on the ARK Blockchain involves a few steps with which our SDKs will help you but lets break them down to get a better idea of what is happening.

1. Install the Client SDK and configure it to use a node of your choosing to broadcast your transactions to. Always make sure that you have a fallback node that you can use for broadcasting in case your primary node goes offline or acts strange otherwise.
2. Install the Crypto SDK and configure it to match the configuration of the network. This is the most important part as misconfiguration can lead to a myriad of issues as Core will reject your transactions.
3. Retrieve the nonce of the sender wallet and increase it by 1. You can read about what a sequential nonce is and why it is important [here](/docs/core/transactions/understanding-the-nonce).
4. Create an instance of the builder for the type of transaction you want to create. This is the step where we actually create a transaction and sign it so that the ARK Blockchain can later on verify it and decide if it will be accepted, forged and finally. You can read the relevant [API documentation](/docs/sdk/typescript/crypto/api-documentation) if you want more detailed information about the design and usage.
5. Turn the newly created transaction into JSON and broadcast it to the network through the Client SDK. You can read the relevant [API documentation](/docs/sdk/typescript/client/api-documentation) if you want more detailed information about the design and usage.
6. Process the API response and verify that your transaction was accepted. If the network rejects your transaction you'll receive the reason as to why that is the case in the response which might mean that you need to create a new transaction and broadcast it.

## Troubleshooting

A common issue when trying to get your transaction onto the blockchain is that you'll receive an error to the effect of **Transaction Version 2 is not supported** which indicates that your Crypto SDK configuration might be wrong.

The solution to this is to make sure that your Crypto SDK instance is properly configured. This includes both the network preset and the height it's configured to assume the network has passed, if any of those don't match up you'll encounter the aforementioned issue with the version of your transactions.

### Mainnet

```typescript
Managers.configManager.setFromPreset("mainnet");
Managers.configManager.setHeight(11273000);
```

### Devnet

```typescript
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);
```

## Creating and Broadcasting a Transfer

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.transfer()
        .version(2)
        .nonce(senderNonce.toFixed())
        .recipientId("Address of Recipient")
        .amount(1 * 1e8)
        .vendorField("Hello World")
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

<x-alert type="info">
The vendorField is optional and limited to a length of 255 characters. It can be a good idea to add a vendor field to your transactions if you want to be able to easily track them in the future.
</x-alert>

## Creating and Broadcasting a Second Signature

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.secondSignature()
        .version(2)
        .nonce(senderNonce.toFixed())
        .signatureAsset("this is a top secret second passphrase")
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

## Creating and Broadcasting a Delegate Registration

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.delegateRegistration()
        .version(2)
        .nonce(senderNonce.toFixed())
        .usernameAsset("johndoe")
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

## Creating and Broadcasting a Vote

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.vote()
        .version(2)
        .nonce(senderNonce.toFixed())
        .votesAsset(["+public_key_of_a_delegate_wallet"])
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

<x-alert type="info">
Note the **plus** prefix for the public key that is passed to the **votesAsset** function. This prefix denotes that this is a transaction to remove a vote from the given delegate.
</x-alert>

## Creating and Broadcasting an Unvote

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.vote()
        .version(2)
        .nonce(senderNonce.toFixed())
        .votesAsset(["-public_key_of_a_delegate_wallet"])
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

<x-alert type="info">
Note the **minus** prefix for the public key that is passed to the **votesAsset** function. This prefix denotes that this is a transaction to add a vote to the given delegate.
</x-alert>

## Creating and Broadcasting a Multi Signature

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.multiSignature()
        .version(2)
        .nonce(senderNonce.toFixed())
        .multiSignatureAsset({
            publicKeys: [
                "039180ea4a8a803ee11ecb462bb8f9613fcdb5fe917e292dbcc73409f0e98f8f22",
                "028d3611c4f32feca3e6713992ae9387e18a0e01954046511878fe078703324dc0",
                "021d3932ab673230486d0f956d05b9e88791ee298d9af2d6df7d9ed5bb861c92dd",
            ],
            min: 2,
        })
        .senderPublicKey("039180ea4a8a803ee11ecb462bb8f9613fcdb5fe917e292dbcc73409f0e98f8f22")
        .multiSign("this is a top secret passphrase 1", 0)
        .multiSign("this is a top secret passphrase 2", 1)
        .multiSign("this is a top secret passphrase 3", 2)
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

## Creating and Broadcasting a IPFS

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.ipfs()
        .version(2)
        .nonce(senderNonce.toFixed())
        .ipfsAsset("QmR45FmbVVrixReBwJkhEKde2qwHYaQzGxu4ZoDeswuF9w")
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

## Creating and Broadcasting a Multi Payment

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.multiPayment()
        .version(2)
        .nonce(senderNonce.toFixed())
        .addPayment("Address of Recipient Wallet 1", 1 * 1e8)
        .addPayment("Address of Recipient Wallet 2", 1 * 1e8)
        .addPayment("Address of Recipient Wallet 3", 1 * 1e8)
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

## Creating and Broadcasting a Delegate Resignation

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.delegateResignation()
        .version(2)
        .nonce(senderNonce.toFixed())
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

<x-alert type="info">
A delegate resignation has to be sent from the delegate wallet itself to verify its identity.
</x-alert>

## Creating and Broadcasting a HTLC Lock

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.htlcLock()
        .version(2)
        .nonce(senderNonce.toFixed())
        .htlcLockAsset({
            secretHash: "0f128d401958b1b30ad0d10406f47f9489321017b4614e6cb993fc63913c5454",
            expiration: {
                type: 1,
                value: Math.floor(Date.now() / 1000),
            },
        })
        .amount(1 * 1e8)
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

## Creating and Broadcasting a HTLC Claim

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.htlcClaim()
        .version(2)
        .nonce(senderNonce.toFixed())
        .htlcClaimAsset({
            lockTransactionId: "943c220691e711c39c79d437ce185748a0018940e1a4144293af9d05627d2eb4",
            unlockSecret: "c27f1ce845d8c29eebc9006be932b604fd06755521b1a8b0be4204c65377151a",
        })
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```

<x-alert type="info">
The **unlockSecret** has to be a SHA256 hash of the plain text secret that you shared with the person that is allowed to claim the transaction.
</x-alert>

## Creating and Broadcasting a HTLC Refund

```typescript
const { Transactions, Managers, Utils } = require("@arkecosystem/crypto");
const { Connection } = require("@arkecosystem/client");

// Configure our API client
const client = new Connection("https://dexplorer.ark.io/api");

// Ensure AIP11 is enabled for the Crypto SDK
Managers.configManager.setFromPreset("devnet");
Managers.configManager.setHeight(4006000);

(async () => {
    // Step 1: Retrieve the incremental nonce of the sender wallet
    const senderWallet = await client.api("wallets").get("YOUR_SENDER_WALLET_ADDRESS");
    const senderNonce = Utils.BigNumber.make(senderWallet.body.data.nonce).plus(1);

    // Step 2: Create the transaction
    const transaction = Transactions.BuilderFactory.htlcRefund()
        .version(2)
        .nonce(senderNonce.toFixed())
        .htlcRefundAsset({
            lockTransactionId: "943c220691e711c39c79d437ce185748a0018940e1a4144293af9d05627d2eb4",
        })
        .sign("this is a top secret passphrase");

    // Step 4: Broadcast the transaction
    const broadcastResponse = await client.api("transactions").create({ transactions: [transaction.build().toJson()] });

    // Step 5: Log the response
    console.log(JSON.stringify(broadcastResponse.body.data, null, 4))
})();
```
