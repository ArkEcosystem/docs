---
title: Introduction
---

# Introduction

## Coins

The **Coin** section will introduce you to Coins. Coin are the most important part of the Platform SDK because they provide all of the core functionality that makes it possible to build a standardizes user experience across the board. All of them adhere to the contracts laid out in the [specification](/docs/platform-sdk/specification).

<x-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/coins/ada', 'name' => 'ADA'],
        ['path' => '/docs/platform-sdk/coins/ark', 'name' => 'ARK'],
        ['path' => '/docs/platform-sdk/coins/atom', 'name' => 'ATOM'],
        ['path' => '/docs/platform-sdk/coins/avax', 'name' => 'AVAX'],
        ['path' => '/docs/platform-sdk/coins/btc', 'name' => 'BTC'],
        ['path' => '/docs/platform-sdk/coins/dot', 'name' => 'DOT'],
        ['path' => '/docs/platform-sdk/coins/eos', 'name' => 'EOS'],
        ['path' => '/docs/platform-sdk/coins/eth', 'name' => 'ETH'],
        ['path' => '/docs/platform-sdk/coins/lsk', 'name' => 'LSK'],
        ['path' => '/docs/platform-sdk/coins/neo', 'name' => 'NEO'],
        ['path' => '/docs/platform-sdk/coins/sol', 'name' => 'SOL'],
        ['path' => '/docs/platform-sdk/coins/trx', 'name' => 'TRX'],
        ['path' => '/docs/platform-sdk/coins/xlm', 'name' => 'XLM'],
        ['path' => '/docs/platform-sdk/coins/xrp', 'name' => 'XRP'],
    ]"
/>

## Markets

The **Markets** section will introduce you to Cryptocurrency Data Services. These packages are responsible for providing a standardizes way of retrieving historical pricing data for all kinds of currencies to allow for a rich user experience with detailed information and charts.

<x-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/markets', 'name' => 'Markets'],
        ['path' => '/docs/platform-sdk/markets/coincap', 'name' => 'CoinCap'],
        ['path' => '/docs/platform-sdk/markets/coingecko', 'name' => 'CoinGecko'],
        ['path' => '/docs/platform-sdk/markets/cryptocompare', 'name' => 'CryptoCompare'],
    ]"
/>

## HTTP Clients

The **HTTP Clients** section will introduce you to HTTP communication. The Platform SDK itself is agnostic as to what HTTP Client you want to use as long as it adheres to the contracts laid out in the [specification](/docs/platform-sdk/specification). This will make it easier to get the SDK working in different environments, like Electron, because you can use packages that were built specifically for your environment.

<x-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/http/axios', 'name' => 'axios'],
        ['path' => '/docs/platform-sdk/http/bent', 'name' => 'bent'],
        ['path' => '/docs/platform-sdk/http/got', 'name' => 'got'],
        ['path' => '/docs/platform-sdk/http/ky', 'name' => 'ky'],
        ['path' => '/docs/platform-sdk/http/node-fetch', 'name' => 'node-fetch'],
    ]"
/>

## Cryptography

The **Cryptography** section will introduce you to do encryption, hashing and identity computation. Cryptography is at the core of everything we do daily at ARK. The cryptography packages are responsible for providing secure encryption of data, hashing of passwords and providing interfaces to interacting with common [BIP](https://github.com/bitcoin/bips) functionality like mnemonic generation.

<x-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/crypto', 'name' => 'Introduction'],
        ['path' => '/docs/platform-sdk/crypto/aes', 'name' => 'AES'],
        ['path' => '/docs/platform-sdk/crypto/argon2', 'name' => 'argon2'],
        ['path' => '/docs/platform-sdk/crypto/base64', 'name' => 'Base64'],
        ['path' => '/docs/platform-sdk/crypto/bcrypt', 'name' => 'bcrypt'],
        ['path' => '/docs/platform-sdk/crypto/bip38', 'name' => 'BIP38'],
        ['path' => '/docs/platform-sdk/crypto/bip39', 'name' => 'BIP39'],
        ['path' => '/docs/platform-sdk/crypto/bip44', 'name' => 'BIP44'],
        ['path' => '/docs/platform-sdk/crypto/hash', 'name' => 'Hash'],
        ['path' => '/docs/platform-sdk/crypto/keychain', 'name' => 'Keychain'],
        ['path' => '/docs/platform-sdk/crypto/pbkdf2', 'name' => 'PBKDF2'],
    ]"
/>

## Internationalization

The **Internationalization** section will introduce you to locale-based functionality. The Internationalization package is responsible for providing a standardizes way of handling numbers, dates, times and money so that all of this data can be normalized and displayed in a format that is familiar to the user geolocation.

<x-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/intl', 'name' => 'Introduction'],
        ['path' => '/docs/platform-sdk/intl/currency', 'name' => 'Currency'],
        ['path' => '/docs/platform-sdk/intl/datetime', 'name' => 'DateTime'],
        ['path' => '/docs/platform-sdk/intl/money', 'name' => 'Money'],
        ['path' => '/docs/platform-sdk/intl/numeral', 'name' => 'Numeral'],
    ]"
/>

## Profiles

The **Profiles** section will introduce you to the core of our Desktop & Mobile wallets. The profiles package is the amalgamation of all the Platform SDK components to provide an easy and consistent way of using the SDK in our products.

<x-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/profiles', 'name' => 'Introduction'],
        ['path' => '/docs/platform-sdk/profiles/contacts', 'name' => 'Contacts'],
        ['path' => '/docs/platform-sdk/profiles/data', 'name' => 'Data'],
        ['path' => '/docs/platform-sdk/profiles/environment', 'name' => 'Environment'],
        ['path' => '/docs/platform-sdk/profiles/notifications', 'name' => 'Notifications'],
        ['path' => '/docs/platform-sdk/profiles/plugins', 'name' => 'Plugins'],
        ['path' => '/docs/platform-sdk/profiles/settings', 'name' => 'Settings'],
        ['path' => '/docs/platform-sdk/profiles/transactions', 'name' => 'Transactions'],
        ['path' => '/docs/platform-sdk/profiles/wallets', 'name' => 'Wallets'],
    ]"
/>

<x-alert type="warning">
The Profiles package is tailored to our specific needs for our products like the Desktop and Mobile wallets. It should only be used as inspiration for your implementation. **Pull Requests that alter its behavior from what it is intended to be for our products will be declined and closed.**
</x-alert>

## Utility

The **Utility** section will introduce you to supportive functionality. The packages in this section provide miscellaneous functionality like retrieval of news, working with BigInt, generating QRCodes and more.

<x-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/utility/news', 'name' => 'News'],
        ['path' => '/docs/platform-sdk/utility/support', 'name' => 'Support'],
    ]"
/>
