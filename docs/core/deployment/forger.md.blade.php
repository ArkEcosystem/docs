---
title: Deployment - Starting a Forger
---

# Starting a Forger

This part should only be followed if you intend to run a delegate or are planning to become one. First you need to make sure you register your ARK address as a delegate. You can do this inside the Desktop Wallet, by clicking on your wallet (make sure you have enough funds in the address you want to register) and click on the 3 dots in the upper right corner in the wallet address for which you wish to register the delegate, and click on ‘Register delegate’, sign the tx, and let it confirm. After that, we need to configure it on our relay node we previously configured. Login to your server and run this command:

## Getting Started

```bash
ark config:forger
```

This will bring up an interactive menu where you have two options of setting up your forger passphrase, ‘Encrypted BIP38’ or ‘Plain BIP39’.

Chose the preferred method using the `up` and `down` arrow keys, confirm it with the `enter` key, and configure according to the screen instructions. Note that when writing a BIP39 passphrase (12 words) make sure you either paste it from the file or write it as it was shown when you generated it — all lower case, words separated by space, no space at the end.

```bash
✔ Please select how you wish to store your delegate passphrase? › - Use arrow-keys. Return to submit.

› Encrypted BIP38 (Recommended)
  Plain BIP39
```

* _**Encrypted BIP38**_ will encrypt your BIP39 passphrase with your custom password and save the encrypted passphrase. In order to decrypt it you will need to provide your set password so back it up as well. Once you set this up, you will need to confirm with the "y" and "enter" keys.
* _**Plain BIP39**_ will save your mnemonic passphrase in plain text. Once you set this up, you will need to confirm with the "y" and "enter" keys.

<x-alert type="danger">
Do **NOT** share login details with unauthorized individuals. BIP38 encryption offers additional protections but does **not** prevent malicious extraction of a BIP39 mnemonic by those with access to your server.
</x-alert>

## BIP-38 Setup

An example of setting up **Encrypted BIP38** passphrase:

```bash
ark config:forger

✔ Please select how you wish to store your delegate passphrase? › - Use arrow-keys. Return to submit.

› Encrypted BIP38 (Recommended)
  Plain BIP39

✔ Please enter your delegate plain text passphrase. Referred to as BIP39.

✔ Please enter your custom password that encrypts the BIP39. Referred to as BIP38.

✔ Confirm custom password that encrypts the BIP39. Referred to as BIP38.

    ✔ Validating passphrase is BIP39 compliant.
    ✔ Prepare crypto.
    ✔ Loading private key.
    ✔ Encrypting BIP39 passphrase.
```

## BIP-39 Setup

An example of setting up **Plain BIP39** passphrase:

```bash
ark config:forger

✔ Please select how you wish to store your delegate passphrase? › - Use arrow-keys. Return to submit.

  Encrypted BIP38 (Recommended)
› Plain BIP39

✔ Please enter your delegate plain text passphrase. Referred to as BIP39.

✔ Can you confirm? › (y/N)

    ✔ Validating passphrase is BIP39 compliant.
    ✔ Writing BIP39 passphrase to configuration.
```

> _Note:_ passphrase (encrypted or not) is saved in file delegates.json in: `/home/ark/.config/ark-core/<network>/delegates.json` (where you replace &lt;network&gt; with network you operate on (mainnet, devnet, testnet). You can also run command `ark env:paths` to get this information.

## Starting the Forger Process

Once you set this up you need to start the Forger process by writing:

```bash
ark forger:start
```

When the process has started, you will get a message:

```bash
Starting ark-forger... done
```

This will initiate and read your passphrase and start the Forger process. You can check Forger logs by writing one of this commands:

```bash
pm2 logs ark-forger
// OR RUN
ark forger:log
```

## Success

If you set it up successfully, after your node is fully synced, you should see an output similar to this, but with your own delegate name and your delegate’s public key:

```bash
2|ark-forger | [2019-03-20 12:12:36][DEBUG]: Loaded 1 delegate: undefined (02297e602dcb3e6ee81205e9e0a7754d50cf3791b06b01fb6e9dde17059b1fb1ba)
2|ark-forger | [2019-03-20 12:12:36][INFO]: Forger Manager started with 1 forger
```

This is it — you have now successfully set up a Relay and Forger!
