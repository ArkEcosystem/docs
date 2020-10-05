---
title: Getting Started
---

## NodeJS installation

NodeJS can be downloaded [here](https://nodejs.org/en/download/).

Alternatively you can install NodeJS through your operating system [packager manager](https://nodejs.org/en/download/package-manager/).

An excellent way to manage your NodeJS installation and be able to work with multiple version is to go through [NVM](https://github.com/nvm-sh/nvm).

## Yarn

> Yarn is a package manager for your code. It allows you to use and share code with other developers from around the world. Yarn does this quickly, securely, and reliably so you don’t ever have to worry.

### Install Yarn

Instructions on how to install Yarn can be found [here](https://yarnpkg.com/en/docs/install)

### Install package with Yarn

```bash
yarn add @arkecosystem/client
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/javascript-client).

2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/javascript-client
   ```

3. Next, move into the fresh cloned directory.

```bash
   cd javascript-client
   ```

4. Proceed to install the dependencies.

```bash
   yarn install
   ```

5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.

```bash
   yarn test
   ```
