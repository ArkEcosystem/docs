---
title: How to build the Wallet from Source?
---

# How to build the Desktop Wallet from source?

`Desktop Wallet version 2.x`

The official ARK Desktop Wallet is an open-source, cross-platform and MIT-licensed project maintained by the ARK Team & Community.

It is an Electron-based JavaScript app developed with Vue.js & Tailwind CSS using the Node v12 runtime.

The ARK Desktop Wallet's source code can be found at the following link: [https://github.com/ArkEcosystem/desktop-wallet](https://github.com/ArkEcosystem/desktop-wallet)

### Requirements

#### Ubuntu

Ubuntu requires additional libraries for kernel device management and hardware wallet support.

- `libudev-dev`
- `libusb-1.0-0-dev`

These may be installed using `apt-get`:

```bash
sudo apt-get install libudev-dev libusb-1.0-0-dev
```

#### Windows

Windows additionally requires `Python 2.7` and `Visual Studio 2017`.

They may be downloaded and installed via the links provided below:

- Python 2.7
  - [https://www.python.org/downloads/release/python-2718](https://www.python.org/downloads/release/python-2718/)
- Visual Studio 2017
  - [https://visualstudio.microsoft.com/vs/older-downloads](https://visualstudio.microsoft.com/vs/older-downloads/)

#### Node 12

Node.js v12 is the supported runtime for the ARK Desktop Wallet.

Download and install the appropriate Node v12 package from: [https://nodejs.org/dist/latest-v12.x](https://nodejs.org/dist/latest-v12.x/)

If `npm` is already installed, we may also run the following as an alternative:

```bash
npm install -g n
sudo n 12
```

> https://nodejs.org

#### Yarn

The Yarn dependency manager is also required and may be installed globally using the following `npm` command:

```bash
npm install -g yarn
```

> https://yarnpkg.com

### Commands

Below is a list of useful `yarn` commands for building, testing and packaging the ARK Desktop Wallet.

<details><summary>script reference</summary>

``` bash
# view `package.json` for more commands and details

# Install dependencies
yarn install

# Run the application using hot-reloading
yarn dev

# Lint all JS/Vue files in `src` and `__tests__`
yarn lint

# Lint and fix all JS/Vue files in `src` and `__tests__`
yarn lint:fix

# Create a compressed package of the collected code
yarn pack

# Build the Electron app for production (using the Current OS)
yarn build

# Build the Electron app for production (Windows)
yarn build:win

# Build the Electron app for production (Mac)
yarn build:mac

# Build the Electron app for production (Linux)
yarn build:linux

# Run unit and end-to-end (e2e) tests
yarn test

# Run unit tests
yarn test:unit

# Run unit tests, then generate and display the coverage report
yarn test:unit:coverage

# Run unit tests, then watch for changes before re-running tests
yarn test:unit:watch

# Run end-to-end (e2e) tests without building the Electron app
yarn test:e2e

# Build the Electron app, then run end-to-end (e2e) tests
yarn test:e2e:full
```

> hint: The most common command used to build from source to a live instance is: `yarn install && yarn dev`

</details>

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ark.io](mailto:security@ark.io). All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

[MIT](LICENSE) © [ARK Ecosystem](https://ark.io)
