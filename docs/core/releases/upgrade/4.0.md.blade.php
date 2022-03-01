---
title: Upgrade Guides - Core v3.x to v4.x
---

# v4.0 Upgrade Guide - Devnet

<x-alert type="warning">
    This is a preliminary upgrade guide that is aimed at the development network. Please do not run this on mainnet yet.
</x-alert>

## Prerequisites

Before starting the upgrade, make sure that you are on node version 14 or higher. You can check your current version by running the following command:

```bash
node --version
```

If this indicates that you are below version 14.x, you will have to upgrade node first by running the following:

```bash
sudo sed -i 's/node_.*.x/node_14.x/' /etc/apt/sources.list.d/nodesource.list \
&& sudo apt-get update && sudo apt-get install nodejs -y
```

This will get you on node version 14. You can check it afterwards by running `node --version` again to verify the upgrade was succesful.

## Migrating to pnpm

With core 4.x, we are moving away from `yarn` to `pnpm`. [pnpm](https://pnpm.io/) is an alternative package manager, which is better suited for the monorepo structure core is making use of. As core is currently installed by `yarn`, the easiest way to switch is to uninstall that core version and reinstall it through `pnpm`. The below commands will do this for you. Note that this does not affect your database and you will be good to go after core has been installed through `pnpm`.

```bash
pm2 kill \
&& rm -f ~/.pm2/dump* \
&& yarn global remove @arkecosystem/core \
&& yarn cache clean > /dev/null 2>&1 \
&& sudo npm install -g npm \
&& sudo npm uninstall -g pm2 \
&& sudo apt remove yarn -y \
&& sed -i '/yarn global/d' ~/.bashrc \
&& npm config set prefix '~/.pnpm' \
&& npm config set global-bin-dir ~/.pnpm/bin \
&& export PATH=$(npm config get global-bin-dir):$PATH \
&& echo 'export PATH=$(npm config get global-bin-dir):$PATH' >> ~/.bashrc \
&& npm install -g pnpm \
&& pnpm install -g pm2 \
&& pnpm install -g @arkecosystem/core@next
```

After the above commands are finished, you can start core as usual by running `ark relay:start` and `ark forger:start`, or by running `ark core:start` for the combined process.

## Reporting Problems

If you happen to experience any issues, please [open an issue](https://github.com/ArkEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it, and info about your environment.
