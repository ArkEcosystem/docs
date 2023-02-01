---
title: Devnet
---

# Devnet

**ARK is officially migrating to the [Polygon Blockchain](https://polygon.technology/). For this reason, users may choose to transfer (or 'migrate') any DARK tokens they currently hold on the [ARK Devnet](https://test.arkscan.io/) to [Polygon's Mumbai Testnet](https://mumbai.polygonscan.com/) in order to assist with testing.**

**Every user will therefore need to download and set up [MetaMask](https://metamask.io/download) in order to successfully migrate their tokens. You may only perform migrations using ARKVault, and in principle, the process consists of two parts, namely:**

- [Migrating Your DARK tokens Using ARKVault](#migrating-your-dark-tokens-using-arkvault), and
- [Viewing Your Migrated Tokens in MetaMask](#viewing-your-migrated-tokens-in-metamask)

<x-alert type="info">
Take note that the migration process will migrate *all* tokens within a given wallet (minus the network fee). If you only want to migrate a select number of tokens, you will need to transfer the desired amount to another ARK Devnet wallet and carry out the migration process accordingly.
</x-alert>

## Migrating Your DARK Tokens Using ARKVault

<x-alert type="info">
Before commencing with the migration process, you will need to download, install and set up [MetaMask](https://metamask.io/download). Also ensure that you add the **Mumbai Testnet** to MetaMask. For more information on adding networks to MetaMask, please visit their [Managing Networks](https://metamask.zendesk.com/hc/en-us/articles/360043227612-How-to-add-a-custom-network-RPC) documentation. You can also visit [Chainlist](https://chainlist.org/?testnets=true&search=mumbai) and connect your MetaMask wallet directly to auto-populate the required network details.
</x-alert>

To begin, log in to your ARKVault profile and click on either the **Migration** tab or the **Migrate Tokens** button that appears on the **Portfolio Dashboard**.

![](/storage/docs/docs/core/assets/migration/av-portfolio-migration.png)

<x-alert type="hint">
You will need to have at least *one* wallet with a minimum balance of **1 DARK** in order to successfully migrate your tokens. For more information on importing wallets, please see the [Import a Wallet](https://arkvault.io/docs/wallets/import) page. In case you have no DARK tokens, you can make use of our [DARK Faucet](https://faucet.ark.io) to get some.
</x-alert>

The **Migrate to Polygon** page will appear. To begin the migration process, click the **New Migration** button located near the top right corner of the page.

![](/storage/docs/docs/core/assets/migration/av-new-migration.png)

<x-alert type="hint">
Only wallets with a minimum balance of **1 DARK** will appear when interacting with the Migration Wizard.
</x-alert>

The **Migration Disclaimer** will appear. If you understand what the migration process entails as well as the associated risks, agree to the **Terms of Service** & **Privacy Policy** by marking the checkbox. When ready, click the **Confirm** button.

![](/storage/docs/docs/core/assets/migration/av-migration-disclaimer.png)

The **Migration** page will appear. Here you will select an ARK Devnet Wallet from which to migrate your tokens and connect your MetaMask Wallet accordingly.

Select an ARK Devnet Wallet by clicking on the **ARK Address** field.

![](/storage/docs/docs/core/assets/migration/av-migration-ark-address.png)

The **Select Wallet to Migrate** modal will appear. Search for your desired wallet and click the **Select** button.

![](/storage/docs/docs/core/assets/migration/av-migration-wallet-select.png)

You will notice that the **ARK Address** field now contains the address of your selected ARK Devnet wallet as well as the amount you will send (which, as aforementioned, is the full balance of the wallet less the network fee).

![](/storage/docs/docs/core/assets/migration/av-migration-ark-field.png)

The next step is to connect your MetaMask wallet. Click the **Connect Wallet** button.

![](/storage/docs/docs/core/assets/migration/av-migration-metamask-connect.png)

MetaMask should open the **Connect with MetaMask** page via your browser. Select the relevant Polygon wallet and click the **Next** button when ready.

![](/storage/docs/docs/core/assets/migration/av-connect-with-metamask.png)

<x-alert type="warning">
Ensure that you select the correct network (**Mumbai Testnet**) before attempting to migrate your tokens. ARKVault will prompt you to switch to Polygon if you have not already done so. Simply click the **Switch to Polygon** button that will appear on the Migration page in ARKVault, and when MetaMask opens with the relevant prompt, click on **Switch network** accordingly.
</x-alert>

The **Connect to** page will appear in MetaMask. If satisfied, click the **Connect** button to continue.

![](/storage/docs/docs/core/assets/migration/av-connect-to-account.png)

You will notice that the **Polygon Migration Address** field now contains your selected MetaMask address. You will also see the **Amount You Get** in Polygon DARK tokens, which should equate to the full balance of the wallet minus the network fee. When ready, click the **Continue** button.

![](/storage/docs/docs/core/assets/migration/av-migration-polygon-field.png)

The **Review Migration Transaction** page will appear. Carefully review all of the details and ensure everything is correct. When ready, click the **Continue** button.

![](/storage/docs/docs/core/assets/migration/av-review-migration-transaction.png)

The **Authenticate** page will then appear. Enter the necessary credentials for your ARK Devnet Wallet (such as a Mnemonic or Encryption Password) and click the **Send** button when ready.

![](/storage/docs/docs/core/assets/migration/av-migration-authenticate.png)

The **Migration Pending** page will appear informing you that your token migration is now in progress. The **Successfully Migrated** page will then appear once your DARK tokens have migrated to the Polygon Mumbai Testnet. You may then navigate to any page you wish or click the **Back to Dashboard** button to return to the **Portfolio Dashboard**.

![](/storage/docs/docs/core/assets/migration/av-migration-success.png)

<x-alert type="success">
You have successfully migrated your DARK tokens to the **Polygon Mumbai Testnet**. Please note that migrations should occur instantly, but they may take up to 5 minutes in certain instances. Upon completion, you will receive a notification informing you of the successful migration.
</x-alert>

## Viewing Your Migrated Tokens in MetaMask

Even after receiving the notification that your tokens migrated successfully, you will not see them appear in your wallet until you add them to MetaMask.

Open the **MetaMask Extension** in your browser and click on the **Assets** tab. Scroll down and click on **Import tokens**.

![](/storage/docs/docs/core/assets/migration/av-metamask-import-tokens.png)

You will then need to enter the **DARK Token contract address** in the field provided. For your convenience, the contract address is `0x23117305080f62b803ce0271cae547cbf84e5627`. Simply copy and paste the token contract address in the field provided.

![](/storage/docs/docs/core/assets/migration/av-metamask-custom-token.png)

Upon entering the **Token contract address**, the **Token symbol** (DARK) and **Token decimal** (18) should autocomplete. When ready, click the **Add custom token** button.

![](/storage/docs/docs/core/assets/migration/av-metamask-add-custom-token.png)

The **Import tokens** page will appear in MetaMask. If your migration was successful, you should see the corresponding DARK token balance appear in MetaMask. When ready, click the **Import tokens** button.

![](/storage/docs/docs/core/assets/migration/av-metamask-import-dark.png)

You should now see your DARK token balance in MetaMask.

![](/storage/docs/docs/core/assets/migration/av-metamask-dark-balance.png)

Now when you open MetaMask, you should see your DARK balance displayed along with any other digital assets you hold.

![](/storage/docs/docs/core/assets/migration/av-metamask-dark-tokens-main.png)

<x-alert type="success">
This effectively concludes the migration process. Note that you can use the same wallet to migrate tokens as many times as you wish. Bear in mind that the full balance of the wallet will transfer every time, so if you wish to keep using the same wallet, you will need to replenish the funds using another ARK Devnet wallet.
</x-alert>

<x-alert type="warning">
Note that if you wish to transfer or move your DARK tokens around on the Mumbai Testnet, you will need **MATIC** in order to do so. MATIC is used to pay for network fees, so without a minimum balance of MATIC, you cannot transfer your DARK tokens. You can obtain some MATIC for the Mumbai Testnet by visiting the Faucet [here](https://faucet.polygon.technology/).
</x-alert>

## Troubleshooting

### Can I migrate my DARK tokens on Polygon back to the ARK Devnet once a migration is complete?

Once you migrate your DARK tokens to Polygon, you cannot transfer them back to the ARK Devnet. The migration process is one-way and thus irreversible. Any corresponding DARK tokens that existed on the ARK Devnet will transfer to a burn address and cease to exist once you have migrated your tokens to Polygon's Mumbai Testnet.

### I don't want to migrate all of my tokens to Polygon immediately. How do I only send some tokens from a wallet?

Migrations transfer the entire wallet balance to Polygon. If you do not wish to transfer all of your tokens immediately, you will need to send the amount you wish to migrate to another (empty) ARK Devnet wallet and use that wallet to perform the migration.

### Can I use any wallet other than MetaMask?

You may only migrate tokens using ARKVault and MetaMask. This approach ensures that the process is kept as secure and straightforward as possible. You cannot connect any other kind of Ethereum wallet to ARKVault in order to carry out a migration.

### I can't see my DARK tokens in my MetaMask after migrating from the ARK Devnet

Migrations should occur instantly but can take up to 5 minutes to complete. However, you will not see the tokens until you have added them to MetaMask. For more information, please refer to the [Viewing Your Migrated Tokens in MetaMask](#viewing-your-migrated-tokens-in-metamask) section of this guide.

### I can't transfer or move my DARK tokens on the Polygon Network

MATIC is the native digital asset used to pay network fees on Polygon networks. For this reason you will need to fund your MetaMask wallet with some MATIC if you want to move or transfer your DARK tokens on the network.

### I can't see my ARK Devnet wallet in the Migration Wizard

Only ARK Devnet wallets with a balance greater than or equal to 1 DARK will appear on the Migration Wizard. Ensure that your wallet possesses the minimum number of tokens for migration before attempting to migrate your tokens.
