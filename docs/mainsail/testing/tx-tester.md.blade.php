---
title: Testing - TX Tester
---

# Mainsail TX Tester

Mainsail TX Tester is a useful tool that allows you to create wallets and send transactions on the Mainsail Networks via command line. Mainsail TX Tester is accessibe on the following link: [Mainsail TX Tester](https://github.com/ArkEcosystem/mainsail-tx-tester)

## Requirements

Make sure you have the following software installed:
- git
- nodeJs
- pnpm (or yarn)
- build-essential 
- python3

You can setup required software by following **Step 1** to **Step 7** explained in the [Install from Source](/docs/mainsail/installation/source) guide. 

## Installation

Clone the Mainsail TX Tester repository:

```bash
git clone https://github.com/ArkEcosystem/mainsail-tx-tester.git
```

Navigate to the cloned repository:

```bash
cd mainsail-tx-tester
```

Install the dependencies:

```bash
pnpm install
```

Build:

```bash
pnpm run build
```

## Usage

### Create Wallet

To create a wallet, run the following command:

```bash
pnpm run wallet
```

or with provied mnemonic:

```bash
pnpm run wallet "lottery end olympic solid end wonder index raw income switch twice marriage page tree replace cube daring engage ivory spy satisfy length cricket between"
```

You will get a similar output:

```bash
Mnemonic:  lottery end olympic solid end wonder index raw income switch twice marriage page tree replace cube daring engage ivory spy satisfy length cricket between

Validator Public Key:  99f717d581e058b526fce70db1e2838c19ca5f32b09222749e8ec6a9471d4a2dc0faee9ac47b7a02220ebc858a7fe049
Validator Private Key:  413af7c36350b573dc6c7ccd2f9b3370d47f4b23e7db435e0af5a01ecd723c84

Public Key:  03c5369d4c62dd62822bfeb25dc9343ea0a5b508dfe9b6402932b9c831216c04f9
Private Key:  2be1626052967ca7672557a4675afdacd3e6d719ebaacb80934f4c047a8b9d32
Address:  D9ZAZfRFfRy22KQSotfR2FgP3cUoN8RkhP
```

### Receie some DARK tokens

Go to the [Mainsail Faucet](https://faucet-demo.mainsailhq.com/) and enter the address generated in the previous step to receive some DARK tokens.

## Configure Mainsail TX Tester

Check out the **config.js** file located on `config/config.js` path.

Modify the **senderPassphrase** and **peer** fields with your wallet passphrase and peer details. Provided mnemonic will be used to sign the transactions.

Check out [API Nodes](/docs/mainsail/installation/networks#api-nodes) and port details for the peer.

```javascript
module.exports = {
    senderPassphrase: "lottery end olympic solid end wonder index raw income switch twice marriage page tree replace cube daring engage ivory spy satisfy length cricket between", // REPLACE senderPassphrase WITH THE PASSPHRASE OF YOUR WALLET
    peer: {
        ip: "49.13.30.19",
        port: "4003",
        protocol: "http",
    },
};
```

## Send Transaction

To check which transactions are available, run the following command:

```bash
pnpm run start
```

You should get a similar output:

```bash
Please provide TX number in arguments:
1 - Transfer
2 - Vote
3 - UsernameRegistration
4 - UsernameResignation
5 - MultiPayment
6 - ValidatorRegistration
7 - ValidatorResignation
```

### Transfer

Before sending transfer transaction, modify the **transfer** object in the **config.js** file. 

```json
    transfer: {
        recipientId: "D9ZAZfRFfRy22KQSotfR2FgP3cUoN8RkhP",
        fee: "10000000",
        amount: "1",
        vendorField: "",
    }
```

Check out the [Transfer](/docs/mainsail/transactions/types/transfer) transaction for more details.

To send a transfer transaction, run the following command:

```bash
pnpm run start 1
```

### Vote

Before sending transfer transaction, modify the **transfer** object in the **config.js** file. If you want to vote for a validator, provide the validator's public key in the **voteAsset** field. If you want to unvote a validator, provide the validator's public key in the **unvoteAsset** field. You can combine vota and unvote in a single transaction.

```json
    vote: {
        voteAsset: "",
        unvoteAsset: "",
        fee: "100000000",
    }
```

Check out the [Vote](/docs/mainsail/transactions/types/vote-unvote) transaction for more details.

To send a vote transaction, run the following command:

```bash
pnpm run start 2
```

### Username Registration

Before sending username registration transaction, modify the **userNameRegistration** object in the **config.js** file. 

```json
    userNameRegistration: {
        username: "demo_100",
        fee: "2500000000",
    }
```
Check out the [Username Registration](/docs/mainsail/transactions/types/username-registration) transaction for more details.

To send a username registration transaction, run the following command:

```bash
pnpm run start 3
```

### Username Resignation

Before sending username resignation transaction, modify the **userNameResignation** object in the **config.js** file.

```json
    userNameResignation: {
        fee: "2500000000",
    }
```

Check out the [Username Resignation](/docs/mainsail/transactions/types/username-resignation) transaction for more details.


To send a username resignation transaction, run the following command:

```bash
pnpm run start 4
```

### Multi Payment

Before sending multi payment transaction, modify the **multiPayment** object in the **config.js** file.

```json
    multiPayment: {
        fee: "10000000",
        vendorField: "",
        payments: [
            {
                recipientId: "DNvqMC1YBF76AoT1emyqVGHyfwNw31RCws",
                amount: "100000000",
            },
            {
                recipientId: "DCFP8KogR2Jq34JuH6SdUpHjMPzLm3hpaC",
                amount: "200000000",
            },
        ],
    }
```

Check out the [MultiPayment](/docs/mainsail/transactions/types/multipayment) transaction for more details.

To send a multi payment transaction, run the following command:

```bash
pnpm run start 5
```

### Validator Registration

Before sending validator registration transaction, modify the **validatorRegistration** object in the **config.js** file. You need to provide the validator's public key in the **validatorPublicKey** field. You can generate new validator key pair by running the **pnpm run wallet** command.

```json
    validatorRegistration: {
        validatorPublicKey: "99f717d581e058b526fce70db1e2838c19ca5f32b09222749e8ec6a9471d4a2dc0faee9ac47b7a02220ebc858a7fe049",
        fee: "2500000000",
    },
```
Check out the [Validator Registration](/docs/mainsail/transactions/types/validator-registration) transaction for more details.

To send a validator registration transaction, run the following command:

```bash
pnpm run start 6
```

### Validator Resignation

Before sending validator resignation transaction, modify the **validatorResignation** object in the **config.js** file.

```json
    validatorResignation: {
        fee: "2500000000",
    }
```

Check out the [Validator Resignation](/docs/mainsail/transactions/types/validator-resignation) transaction for more details.

To send a validator resignation transaction, run the following command:

```bash
pnpm run start 7
```
