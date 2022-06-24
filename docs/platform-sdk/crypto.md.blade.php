---
title: Crypto
---

# Crypto

This is a Cryptography package for the Payvo SDK. The implementation makes use native and third-party packages to ensure consistent outcomes and adheres to the contracts laid out in the [specification](/docs/payvo-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/PayvoHQ/sdk/tree/master/packages/cryptography" />

## Installation

```bash
yarn add @payvo/sdk-cryptography
```

## Usage

<x-ark-link-collection
    :links="[
        ['path' => '/docs/payvo-sdk/crypto/aes', 'name' => 'AES'],
        ['path' => '/docs/payvo-sdk/crypto/argon2', 'name' => 'argon2'],
        ['path' => '/docs/payvo-sdk/crypto/base64', 'name' => 'Base64'],
        ['path' => '/docs/payvo-sdk/crypto/bcrypt', 'name' => 'bcrypt'],
        ['path' => '/docs/payvo-sdk/crypto/bip32', 'name' => 'BIP32'],
        ['path' => '/docs/payvo-sdk/crypto/bip38', 'name' => 'BIP38'],
        ['path' => '/docs/payvo-sdk/crypto/bip39', 'name' => 'BIP39'],
        ['path' => '/docs/payvo-sdk/crypto/bip44', 'name' => 'BIP44'],
        ['path' => '/docs/payvo-sdk/crypto/hash', 'name' => 'Hash'],
        ['path' => '/docs/payvo-sdk/crypto/hdkey', 'name' => 'HDKey'],
        ['path' => '/docs/payvo-sdk/crypto/keychain', 'name' => 'Keychain'],
        ['path' => '/docs/payvo-sdk/crypto/pbkdf2', 'name' => 'PBKDF2'],
        ['path' => '/docs/payvo-sdk/crypto/uuid', 'name' => 'UUID'],
        ['path' => '/docs/payvo-sdk/crypto/wif', 'name' => 'WIF'],
    ]"
/>

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@payvo.com](mailto:security@payvo.com). All security vulnerabilities will be promptly addressed.
