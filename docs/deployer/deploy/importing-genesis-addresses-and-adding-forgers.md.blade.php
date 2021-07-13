---
title: Importing Genesis Addresses and Adding Forgers
---

# Importing Genesis Addresses and Adding Forgers

## Importing Genesis Wallet Address

Now that you have the ARK Desktop Wallet communicating with your new network, it's time to import the genesis wallet address.

1. Click `Import Wallet` in the top right area of the ARK Desktop Wallet.
2. Choose `Use the passphrase only`.
3. Enter the 12 word `passphrase` given to you by the genesis node console.
4. Click `Next`.
5. Optionally `encrypt` the passphrase so you don't have to type the whole thing every time. **However, do this with caution:** if an attacker gains access to your encrypted keyfile on your computer and cracks your encryption, they will gain access to the genesis wallet address funds!
6. Click `Next`.
7. `Name` the wallet. This name is only stored locally on your computer.
8. Click `Done`.

**Congratulations!** You now have access to the genesis wallet address funds, and you can now perform tasks such as:

* Sending funds to new addresses you create.
* Setting up wallets with funds inside to vote for live forging delegates you set up to test the network.
* Allocating funds to various trusts.
* Distributing funds to persons or organizations.
* Testing various transaction types.

## Adding Forging Delegates

At this point you have a genesis node running with autoforging genesis delegates on it, and a number of network peers running as relays. Since your goal is likely to have a decentralized network, you'll need to introduce _live forging delegates_ to your network. These live forging delegates will be ranked by vote weight, and that will dictate who is authorized to insert blocks into the ledger and receive forging rewards.

How you proceed from here depends on your blockchain goals. Unfortunately, there are too many permutations regarding network architecture and token distribution models to cover here. You can reach out to the ARK community and team via [Discord](https://discord.ark.io) or [Reddit](https://reddit.ark.io) to discuss your specific goals.

The below procedure simply describes how you or someone else would configure and introduce a live forging delegate node into the network:

1. Open the **ARK Desktop Wallet**.
2. Add the bridgechain network in question to the ARK Desktop Wallet. That procedure can be found in the [Adding Bridgechain to ARK Desktop Wallet](https://github.com/ArkEcosystem/gitbooks-deployer/tree/040c67394a003d6fced9936a8be483b18f6c118a/deploy/deploy/adding-bridgechain-to-ark-desktop-wallet.md) portion of this documentation.
3. Create a new address in the wallet within your network's profile.
4. Obtain enough tokens to execute a **delegate registration transaction** using the new address. For the ARK Public Network and Basic bridgechains, this is 25 tokens (but can be dynamic).
5. Click the `...` in the top right of the wallet interface.
6. Choose `Register delegate`.
7. Declare a `delegate name` (_this is public_).
8. Execute the transaction.
9. Configure a new peer (relay node). That procedure can be found in the [Adding Network Peers](https://github.com/ArkEcosystem/gitbooks-deployer/tree/040c67394a003d6fced9936a8be483b18f6c118a/deploy/deploy/adding-network-peers.md) portion of this documentation.
10. Replacing `bridgechain` with your lowercase bridgechain name lets configure forger:

```bash
bridgechain config:forger
```

1. Select either **BIP38 (Recommended)** or **Plain BIP39**. Encrypted BIP38 is recommended for additional security.
2. Enter the 12 word delegate passphrase associated with the recently registered delegate address.
3. If you chose BIP38, choose a password. This password is required whenever the forger process launches. Confirm with `Y`.
4. Start the forger process, replacing `bridgechain` with your lowercase chain name:

```bash
 bridgechain forger:start
```

1. Enter your BIP38 password (if applicable). Confirm with `Y`.
2. The success message will say `Starting bridgechain-forger... done`.
3. Replacing `bridgechain` with your lowercase chain name execute:

```bash
bridgechain forger:log
```

This should produce a result similar to `[DATE TIME] DEBUG: Loaded 1 active delegate: DELEGATE_NAME (PUBLIC_KEY)`. In some rare cases it may load a delegate with name `undefined` with a public key that matches your actual delegate address public key. This is OK. 18. Now that the forging delegate node is operational, you need to assign vote weight to it in order to insert this delegate node into the forging delegates list. Simply put, other standard addresses with tokens inside them must execute a `vote transaction` and choose your delegate.

### How to vote with the ARK Desktop Wallet

1. Open the **ARK Desktop Wallet**.
2. Create or access a wallet address within your network's profile.
3. Obtain tokens to load up the address.
4. Click the `Delegates` tab.
5. Click the `Search delegate` box at the bottom of the interface.
6. Enter the delegate name in question and click `Confirm`.
7. Click `Vote`.
8. Execute the transaction.
9. The address in question has now successfully voted and assigned vote weight to the delegate.
