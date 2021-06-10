---
title: Installation
---

# Installation (APN | Mainnet)

Since Version 2.2.0 we distribute the ARK Core as an npm package, which has to be globally installed, which provides a built-in CLI.

## Prerequisites

The following sections will guide you through an automated ARK Core installation on a new server. Alternatively, a manual installation option is available, take a look at [install.sh](https://github.com/ArkEcosystem/core/blob/master/install.sh) to see what dependencies need to be installed and configured.

**A global `pm2` installation is required as the CLI uses it to manage processes. Take a look at the** [process manager](https://github.com/ARKEcosystem/core/blob/master/packages/core/src/process-manager.ts) **to see how it works under the hood.**

## Existing Installation

If you are already operating a server that runs Core 2.1.0 or newer you can simply execute the following command.

```bash
yarn global add @arkecosystem/core
```

This command may take a while since all packages and dependencies need to be installed.

Once this command has finished you should stop all your existing core processes with `pm2 delete all` and start new ones with one of the commands that are documented further down on this page. If you are having any issues with the CLI, head down to the **Troubleshoot** section which covers the most common issues we know about.

## Fresh Installation

If you are planning to setup a new server you can execute the following steps.

```bash
sudo adduser ark
sudo usermod -aG sudo ark
sudo su - ark
cd ~
bash <(curl -s https://raw.githubusercontent.com/ArkEcosystem/core/master/install.sh)
```

Once this command has finished you should start your relay and forger with one of the commands that are documented further down on this page. If you are having any issues with the CLI, head down to the **Troubleshoot** section which covers the most common issues we know about.

> You can check [https://www.npmjs.com/package/@arkecosystem/core](https://www.npmjs.com/package/@arkecosystem/core) for new releases or use `ark update` to check for updates.

## Configuration

Before you can start using ARK Core you will need to publish the configuration of the network you wish to operate on.

```bash
ark config:publish
```

This will bring up an interactive UI which will ask a few questions to help you with the setup process. Once you have published the configuration you can start using the CLI. It will automatically detect which network you have configured.

## Troubleshooting

Most of the issues you will encounter are related to `pm2` not properly responding so the first thing you can try is to kill your pm2 daemon and refresh it.

```bash
pm2 kill && pm2 cleardump && pm2 reset
```

If this doesn't help, read the known issues below and see if any of those solve your issues.

### Command Not Found

If you are receiving a message to the effect of `ark command not found` your bash environment most likely doesn't have the yarn bin path registered. Execute the following command to resolve the issue.

```bash
echo 'export PATH=$(yarn global bin):$PATH' >> ~/.bashrc && source ~/.bashrc
```

If you are using a shell other then the default bash, like zsh, you will need to replace `~/.bashrc` with `~/.zshrc`.

### Process Fails to Start After Update

If the processes fail to start or restart after an update it is most likely an issue with pm2. Running `pm2 update` should usually resolve the issue.

If this doesn't resolve the issue you should run `pm2 delete all && ark relay:start && pm2 logs`, also `ark forger:start` if you are a delegate.

### Process Has Entered an Unknown State

If you are receiving a message to the effect of `The "..." process has entered an unknown state.` your pm2 instance is not responding properly. This is usually resolved by a simple `pm2 update`, if that doesn't help try `pm2 kill` to destroy the pm2 daemon so it gets restarted the next time an application tries to access it.
