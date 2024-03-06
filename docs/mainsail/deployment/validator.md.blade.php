---
title: Deployment - Becoming a Validator
---

# Becoming a Validator

This part should only be followed if you intend to run a validator node or are planning to become one.

Install Mainsail TX tester by following the [TX Tester Installation](/docs/mainsail/testing/tx-tester) guide before you continue.

## Prepare wallet

Before you can start forging, you need to register your validator on the network. You can do this by sending a **validator registration transaction**.

If you don't have a wallet yet create one using the **pnpm run wallet** as described in [Create Wallet](/docs/mainsail/testing/tx-tester#create-wallet) section.

Ensure your wallet has enough funds to cover the transaction fee. Check [Receive Tokens](/docs/mainsail/testing/tx-tester#receie-tokens) section to receive additional tokens.

## Register Validator

Modify the **validatorRegistration** object in the **config.js** file. You need to provide the validator's public key in the **validatorPublicKey** field. You can generate new validator key pair by running the **pnpm run wallet** command.

```json
    validatorRegistration: {
        validatorPublicKey: "99f717d581e058b526fce70db1e2838c19ca5f32b09222749e8ec6a9471d4a2dc0faee9ac47b7a02220ebc858a7fe049",
        fee: "2500000000",
    },
```

<x-alert type="info">
Regsitering a **validator public key** is necessary before you can start forging. When your validator is set up in the node **validator private key** is used to sign consensus messages and block proposals.
</x-alert>

Check out the [Validator Registration](/docs/mainsail/transactions/types/validator-registration) transaction for more details.

To send a validator registration transaction, run the following command:

```bash
pnpm run start 6
```

<x-alert type="warning">
Keep your menmonic and validator private key safe. Do not share it with unauthorized individuals. Different mnemonic can be used for your wallet keys and your validator keys.
</x-alert>

## Prepare for Forging

After you have registered your validator, you need to set up your node to start forging.

Node will check `validator.json` file located on the config path. If menmonic is included node will automatically detect validator and start if your validator is part of active validators list. You can check that in the (ARK Scan - Delegates)[https://explorer-demo.mainsailhq.com/delegates].

Configuration path can be obtained by running the following command:

```bash
mainsail env:paths
```

You can register the validator on your node by running the following command:

```bash
mainsail config:forger:bip39
```

Start the node:

```bash
mainsail core:start
```

## Active validators

Your validator will become a forger once it is part of the active validators list. You can check that in the (ARK Scan - Delegate monitor)[https://explorer-demo.mainsailhq.com/delegate-monitor] tool.

Active validator are validators that are not resigned and have enough votes to be part of the consensus. Mainsail currently uses 53 active validators.

Nwtwork participants (wallets) need to vote for your validator to become active. You can check the current votes and rank for your validator in the (ARK Scan - Delegate)[https://explorer-demo.mainsailhq.com/delegates] page.
