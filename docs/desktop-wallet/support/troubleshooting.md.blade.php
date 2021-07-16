---
title: Troubleshooting
---

# Troubleshooting

This page will cover common issues related to the ARK Desktop Wallet `v2.x`.

<x-alert type="info">
If your issue is not covered here, please contact us using the ‘Technical Support’ form found [here](https://ark.io/contact), or reach out on [Discord](https://discord.ark.io/)!
</x-alert>

## Getting Started

A user experiencing unexpected errors should first check that their apps and software are up-to-date.

### Desktop Wallet Software

First, check that the latest version of the ARK Desktop Wallet is installed.

All official Desktop Wallet releases can be found at the following link:
<livewire:embed-link url="https://ark.io/download#desktop-wallet" caption="ARK.io Downloads | Download Blockchain Software" />

---

### ARK Ledger App

If the issue involves a <u>**Ledger Hardware Wallet**</u>, check that the **ARK App** <u>***and***</u> **Ledger Firmware** are up-to-date.

More information on updating a **Ledger Hardware Wallet** and **Ledger Apps** can be found by visiting the following links:

<livewire:embed-link url="https://support.ledger.com/hc/en-us/articles/360002731113-Update-Ledger-Nano-S-firmware" caption="Update Ledger Nano S firmware" />

<livewire:embed-link url="https://support.ledger.com/hc/en-us/articles/360013349800-Update-Ledger-Nano-X-firmware" caption="Update Ledger Nano X firmware" />

<livewire:embed-link url="https://support.ledger.com/hc/en-us/articles/360006523674-Install-uninstall-and-update-apps" caption="Install, uninstall and update apps" />

## Connectivity Issues

Some of the more common issues are related to **peer** and **network** <u>**connectivity**</u>.

### Recognizing Connectivity Issues

Users having **connectivity** issues will typically experience the following:

- **Incomplete Transaction History**
- **Incorrect Balances**
- **Transaction Send Errors**

Common **error messages** associated with **connectivity** issues include—but are not limited to—the following:

- **"Cannot Connect"**
- **"Failed to connect to peer"**
- **"…fee is not valid"**
- **"Initialization is taking longer than expected…"**
- **"…invalid seed nodes…"**
- **"No internet connection"**
- **"…transaction could not be created / sent / registered…"**
- **"Version 2 Not Supported"**

### Resolving Connectivity issues

**Connectivity** issues are typically resolved by <u>**refreshing**</u> your **peer connection**.

![Select the ‘cloud’ icon on the left sidebar. Then click the "Refresh" button of the Peer modal as shown above.](/storage/docs/docs/desktop-wallet/assets/troubleshooting-refresh-peer.jpg)

---

If the issue persists after **refreshing** the peer connection, you can also perform a "**Force Reload**".

This restarts all services related to the ARK Desktop Wallet, no data will be lost.

![Select "Force Reload" from the "View" drop-down menu.](/storage/docs/docs/desktop-wallet/assets/troubleshooting-force-reload.jpeg)

<x-alert type="info">
If the **connection issues** are **not** resolved using the advice above, check that your connections are not being blocked by **Firewall** or **Antivirus Software**.
</x-alert>

<x-alert type="success">
Tip: Enter your ARK Address at [explorer.ark.io](http://explorer.ark.io) to verify balances and transactions.
</x-alert>

## Wallet Issues

<u>**Wallet**</u> issues are encountered while attempting to <u>**import**</u>/<u>**restore**</u> a wallet using a **mnemonic recovery passphrase**.

### Recognizing Wallet Issues

Users having **Wallet** issues will typically experience the following:

- **Incorrect Address**
- **Missing Balance**
- **Missing Transaction History**

### Resolving Wallet Issues

**Wallet** issues are commonly resolved by double-checking that your <u>**recovery passphrase**</u> is correct.

A word may have been misspelled or extra characters might have been entered by mistake.

<x-alert type="info">
A mnemonic recovery passphrase should be all <u>**lower-case**</u> letters with a <u>**single space**</u> between <u>**each**</u> word.
</x-alert>

---

<!-- markdownlint-disable MD026 -->
### My Recovery Phrase Was Entered as Recorded!
<!-- markdownlint-enable MD026 -->

If the mnemonic passphrase was entered **exactly** as recorded, compare each word to the official list found here:<br>[BIP-39 Wordlist: https://raw.githubusercontent.com/bitcoin/bips/master/bip-0039/english.txt](https://raw.githubusercontent.com/bitcoin/bips/master/bip-0039/english.txt)

<x-alert type="info">
The purpose of checking this wordlist is to ensure that similar words were not recorded inadvertently.<br>*e.g. "aim" vs "air"; "fine" vs "find"; "seek" vs "seed"*
</x-alert>

<x-alert type="success">
Tip: Enter your ARK Address at [explorer.ark.io](http://explorer.ark.io) to check that the balance and transaction history are as expected.
</x-alert>

---

<!-- markdownlint-disable MD026 -->
### My Recovery Phrase is Gone!
<!-- markdownlint-enable MD026 -->

In most cases, the above advice will help a user successfully recover their wallet.

Unfortunately, no mechanism exists to recover a lost recovery mnemonic. This security design is a fundamental element of Blockchain technology.

It is <u>**always**</u> advised to write your recovery phrase down on paper, double and triple check that it is written down correctly, keep it safe and **share it with no one**.

<x-alert type="danger">
Your 12-word passphrase is <u>**your**</u> responsibility. If it is lost or stolen, you <u>**will**</u> lose access to your funds. Lost mnemonic recovery passphrases are <u>**NOT**</u> recoverable.
</x-alert>

## Signing Issues

<u>**Signing**</u> issues are encountered when attempting to <u>**sign a transaction**</u>.

### Recognizing Signing Issues

Users having **Signing** issues will typically receive the following **error messages**:

- **"Invalid Passphrase"**
- **"Failed to Decrypt Passphrase"**
- **"Failed to sign the transaction"**
- **"Transaction could not be created"**

### Resolving Signing Issues

**Signing** issues are resolved by checking that you are either:

- a) using the correct <u>**encryption password**</u>
- b) using the correct <u>**recovery passphrase**</u>

<x-alert type="info">
Users should also check that they are not using the <u>**Mnemonic Passphrase**</u> *as* the <u>**Encryption Password**</u>, or <u>**Encryption Password**</u> *as* the <u>**Mnemonic Passphrase**</u>.
</x-alert>

---

<!-- markdownlint-disable MD026 -->
### My Encryption Password is Wrong!
<!-- markdownlint-enable MD026 -->

If only the **encryption password** is wrong.. **FUNDS SAFU!**

The **encryption password** is only used to help "*hide*" your keys; try re-importing your wallet using its **mnemonic passphrase**.

<x-alert type="warning">
An encryption password **must** contain at least:<br>- 8 characters in total<br>- 1 upper-case character<br>- 1 lower-case character<br>- 1 number<br>- 1 special character
</x-alert>

---

<!-- markdownlint-disable MD026 -->
### My Recovery Phrase <u>Seems</u> Correct!
<!-- markdownlint-enable MD026 -->

If your **mnemonic passphrase** appears to be correct, check that it was **entered** correctly.

A word may have been misspelled or extra characters might have been entered by mistake.

<x-alert type="info">
If the mnemonic passphrase was entered exactly as recorded, refer to the section on checking a passphrase <u>[here](#resolving-wallet-issues)</u>.
</x-alert>

## Ledger Hardware Wallet Issues

<u>**Ledger**</u> Hardware issues are mostly encountered when connecting a <u>**Ledger NanoS/NanoX**</u> or attempting to <u>**sign a transaction**</u>.

### Recognizing Ledger Issues

Users having **Ledger** issues when <u>**connecting**</u> a device will typically experience the following **behavior**:

- **no activity or feedback within the ARK Desktop Wallet**
- **repeated persistent Ledger connected and disconnected messages**

Users experiencing **Ledger** issues when attempting to <u>**sign a transaction**</u> will typically receive the following **error messages**:

- **"Could not sign transaction with Ledger: User declined"**
- **"Could not sign transaction with Ledger: Illegal buffer"**
- **"Could not sign transaction with Ledger: Version 2 not supported"**

### Resolving Ledger Issues

If the **Ledger** issue is related to **device** <u>**connectivity**</u>, there are several things a user can check.

{{-- 1) is the ARK Desktop Wallet up-to-date? --}}
<details><summary><u><b>1) is the ARK Desktop Wallet up-to-date?</b></u></summary>
A user should check that the <b>most recent</b> version of the <b>ARK Desktop Wallet</b> is <b>installed</b>.

All official releases can be found by visiting the following page:

<livewire:embed-link url="https://ark.io/download#desktop-wallet" caption="ARK.io Downloads | Download Blockchain Software" />
</details>
{{--  --}}

{{-- 2) is the Ledger device connected via USB? --}}
<details><summary><u><b>2) is the Ledger device connected via USB?</b></u></summary>
A user should make sure that they are using a <b>known</b> and <b>working USB <i>data</i> cable</b> to connect their <b>Ledger</b>.

It’s best to use the official <b>USB <i>data</i></b> cable included from <b>Ledger</b> at the time of purchase.

If the cable is <b>known</b> to be a working <b>data</b> cable or the official USB <b>data</b> cable, try using a different USB port on your computer.

<b>Linux</b> computers require <b>additional configuration</b>.

For <b>Linux configuration</b> or <b>additional</b> USB troubleshooting steps, refer to the following link:

<livewire:embed-link url="https://support.ledger.com/hc/en-us/articles/360019301813" caption="Fix USB issues" />
</details>
{{--  --}}

{{-- 3) is the Ledger device unlocked? --}}
<details><summary><u><b>3) is the Ledger device unlocked?</b></u></summary>
A user should make sure that their <b>Ledger</b> is <b>unlocked</b> using their <b>security pin</b>.

This <b>unlock pin</b> is configured at the time a user first set-up their device.
</details>
{{--  --}}

{{-- 4) is the Ledger device up-to-date? --}}
<details><summary><u><b>4) is the Ledger device up-to-date?</b></u></summary>
A user should also check that their <b>Ledger firmware</b> is <b>up-to-date</b>.

<livewire:embed-link url="https://support.ledger.com/hc/en-us/articles/360002731113-Update-Ledger-Nano-S-firmware" caption="Update Ledger Nano S firmware" />

<livewire:embed-link url="https://support.ledger.com/hc/en-us/articles/360013349800-Update-Ledger-Nano-X-firmware" caption="Update Ledger Nano X firmware" />
</details>
{{--  --}}

{{-- 5) is the ARK App installed and opened? --}}
<details><summary><u><b>5) is the ARK App installed and opened?</b></u></summary>
In order to use the ARK Desktop Wallet with a <b>Ledger</b> device, the <b>ARK App</b> must be <b>installed</b> and <b>opened</b> on the device.

For guidance on <b>installing</b> the <b>ARK App</b>, refer to the following link: [https://support.ledger.com/hc/en-us/articles/115005174589-Ark-ARK-](https://support.ledger.com/hc/en-us/articles/115005174589-Ark-ARK-)
</details>
{{--  --}}

{{-- 6) is the ARK App up-to-date? --}}
<details><summary><u><b>6) is the ARK App up-to-date?</b></u></summary>
A user should ensure that the <b>ARK App</b> is <b>up-to-date</b>, with the <b>most recent</b> version installed.

For guidance on <i><b>updating</b></i> <b>Ledger Apps</b>, refer to the following link:

<livewire:embed-link url="https://support.ledger.com/hc/en-us/articles/360006523674-Install-uninstall-and-update-apps" caption="Install, uninstall and update apps" />
</details>
{{--  --}}

{{-- 7) is all other Ledger software closed? --}}
<details><summary><u><b>7) is all other Ledger software closed?</b></u></summary>
A user should check that <b>all</b> other <b>software</b> or <b>apps</b> that <b><i>can</i> connect</b> to a <b>Ledger</b> device are <b>closed</b>.

This includes other <b>wallets</b>, <b>Ledger Live</b>, as well as any <b>browser apps</b> like <b>MetaMask</b> or <b>MEW</b>.

This is because a <b>Ledger</b> device only allows <b>one</b> connection at a time.
</details>
{{--  --}}

{{-- 8) is Firewall or Antivirus software blocking the connection? --}}
<details><summary><u><b>8) is Firewall <i>or</i> Antivirus software blocking the connection?</b></u></summary>
Users should also check that <i><b>no</b></i> <b>Firewall</b> or <b>Antivirus</b> software is <b>blocking</b> the <b>USB connection</b>.
</details>
{{--  --}}

---

If the **Ledger** issue is related to <u>**signing a transaction**</u>, there are a few things a user can check.

{{-- 1) is the ARK Desktop Wallet up-to-date? --}}
<details><summary><u><b>1) is the ARK Desktop Wallet up-to-date?</b></u></summary>
A user should check that the <b>most recent</b> version of the <b>ARK Desktop Wallet</b> is <b>installed</b>.

All official releases can be found by visiting the following page:

<livewire:embed-link url="https://ark.io/download#desktop-wallet" caption="ARK.io Downloads | Download Blockchain Software" />
</details>
{{--  --}}

{{-- 2) is the ARK App up-to-date? --}}
<details><summary><u><b>2) is the ARK App up-to-date?</b></u></summary>
A user should ensure that the <b>ARK App</b> is <b>up-to-date</b>, with the <b>most recent</b> version installed.

For guidance on <i><b>updating</b></i> <b>Ledger Apps</b>, refer to the following link:

<livewire:embed-link url="https://support.ledger.com/hc/en-us/articles/360006523674-Install-uninstall-and-update-apps" caption="Install, uninstall and update apps" />
</details>
{{--  --}}

<x-alert type="warning">
Users should also check that they are properly **connected** to a **valid network peer**.
</x-alert>

<x-alert type="info">
Advice on troubleshooting a **network connection** can be found <u>[here](#resolving-connectivity-issues)</u>.
</x-alert>

---

<!-- markdownlint-disable MD026 -->
### My Ledger issue is still not resolved!
<!-- markdownlint-enable MD026 -->

Most **Ledger** **connectivity** and **transaction** issues will be resolved by following the advice above.

In rare cases, a user's profile may have become corrupted.

A user is then advised to **restore** the ARK Desktop Wallet to its **default settings**, then **re-import** wallets and watch-addresses.

<x-alert type="danger">
This will **erase a user's** **profile data**, make sure <u>**all**</u> **mnemonic recovery phrases** and **watch-addresses** are **written down** and **saved properly**. Funds **will** be **lost** if your data is **not** backed up. <u>**This action cannot be undone**</u>.
</x-alert>

<x-alert type="info">
Note that **Ledger** wallets are imported <u>**only**</u> by **connecting** to the ARK Desktop Wallet. <u>**NEVER**</u> enter your 24-word Ledger recovery phrase into <u>**any**</u> software, apps or websites.
</x-alert>

## Debugging Tips

Sometimes, a **user** or **developer** may require **additional** information when **troubleshooting** or **debugging** issues within the **ARK Desktop Wallet**.

---

The easiest and most common way is to use the built-in **Dev Tools**, which **will** show additional **console** and **network** information.

![Dev tools can be opened by selecting ‘**Toggle Dev Tools**’ from the "**View**" drop-down menu.](/storage/docs/docs/desktop-wallet/assets/troubleshooting-dev-tools.jpeg)

<x-alert type="info">
If your issue is not covered here, please contact us using the ‘Technical Support’ form found [here](https://ark.io/contact), or reach out on [Discord](https://discord.ark.io/)!
</x-alert>
