---
title: Transferring and Executing Installation Script
---

# Transferring and Executing Installation Script

> It is strongly advised to execute your installation scripts on a server with a new installation of Ubuntu. Installing onto servers with previous installations of Core can result in errors.

## Transferring Installation Script to Genesis Node

At the final page of the ARK Deployer configuration pipeline, you will see the **Deployer Install Script** area with `View` and `Download` buttons. Download the file to your computer for safekeeping, but to transfer to genesis node, we will select `View`.

1. In the ARK Deployer, press `View`.
2. Press `Copy` to copy the script to clipboard.
3. Connect to your genesis node server using the new user you configured.
4. To create and edit a new file type:

```bash
nano setup-deployer.sh
```

<!-- markdownlint-disable MD029 -->
5. In the resulting screen, paste the deployer installation script into the console window using mouse `Right-Click`.
6. Exit the file editing process using `CTRL+X`.
7. Press `Y` when prompted to save changes.
8. Press `Enter` to confirm filename.
<!-- markdownlint-enable MD029 -->

## Executing Installation Script

The next step is installing the `setup-deployer.sh` script. The install script will magically perform the following operations:

* Update and install initial packages and dependencies
* Install NodeJS & NPM
* Install Yarn
* Install ARK Deployer CLI
* Deploy your bridgechain
* Set up startup scripts
* Install Explorer
* Allow selection of either Mainnet, Devnet or Testnet
* Reboots server

Let's execute this installation step.

1. To start installation process and  watch magic happen (_this may take 10-30 minutes depending on hardware specs_) type:

```bash
bash setup-deployer.sh
```

<!-- markdownlint-disable MD029 -->
2. When prompted, provide your GitHub username or email address and password. This occurs if you pre-forked the GitHub repos and provided git info to ARK Deployer.
3. During the installation, your genesis passphrases for Mainnet, Devnet, and Testnet will be displayed. These are required to distribute tokens to users.
<!-- markdownlint-enable MD029 -->

**WRITE DOWN AND SECURE THESE ADDRESSES AND PASSPHRASES.** They will only be shown once. These are the most important addresses you will likely ever encounter, as they contain the initial tokens as configured in ARK Deployer. If you chose Basic, this number is 125 million tokens for each network's genesis address. These genesis passphrases also exist at \`~/.bridgechain/TESTNET_DEVNET_MAINNET/BRIDGECHAIN_NAME/genesisWallet.json\` respectively. Take the proper precautions to secure or move the funds.

1. Once the installation is complete, you will be prompted to declare **Mainnet**, **Devnet**, or **Testnet** network. Make your choice. More on the nature of these networks can be found in [Network Requirements](../prepare/network-requirements) section.
2. At this point your genesis node will automatically reboot after a short pause. Then, your bridgechain and Explorer will autostart.
