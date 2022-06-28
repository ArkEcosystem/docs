---
title: Introduction
---

# Introduction

## Coins

The **Coin** section will introduce you to Coins. Coins are the most important part of the Platform SDK because they provide all of the core functionality that makes it possible to build a standardized user experience across the board. All of them adhere to the contracts laid out in the [specification](/docs/platform-sdk/specification).

<x-ark-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/coins/ada', 'name' => 'ADA'],
        ['path' => '/docs/platform-sdk/coins/ark', 'name' => 'ARK'],
        ['path' => '/docs/platform-sdk/coins/atom', 'name' => 'ATOM'],
        ['path' => '/docs/platform-sdk/coins/avax', 'name' => 'AVAX'],
        ['path' => '/docs/platform-sdk/coins/btc', 'name' => 'BTC'],
        ['path' => '/docs/platform-sdk/coins/dot', 'name' => 'DOT'],
        ['path' => '/docs/platform-sdk/coins/egld', 'name' => 'EGLD'],
        ['path' => '/docs/platform-sdk/coins/eos', 'name' => 'EOS'],
        ['path' => '/docs/platform-sdk/coins/eth', 'name' => 'ETH'],
        ['path' => '/docs/platform-sdk/coins/lsk', 'name' => 'LSK'],
        ['path' => '/docs/platform-sdk/coins/luna', 'name' => 'LUNA'],
        ['path' => '/docs/platform-sdk/coins/nano', 'name' => 'NANO'],
        ['path' => '/docs/platform-sdk/coins/neo', 'name' => 'NEO'],
        ['path' => '/docs/platform-sdk/coins/sol', 'name' => 'SOL'],
        ['path' => '/docs/platform-sdk/coins/trx', 'name' => 'TRX'],
        ['path' => '/docs/platform-sdk/coins/xlm', 'name' => 'XLM'],
        ['path' => '/docs/platform-sdk/coins/xrp', 'name' => 'XRP'],
        ['path' => '/docs/platform-sdk/coins/zil', 'name' => 'ZIL'],
    ]"
/>

## Markets

The **Markets** section will introduce you to Cryptocurrency Data Services. These packages are responsible for providing a standardized way of retrieving historical pricing data for all kinds of currencies to allow for a rich user experience with detailed information and charts.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/markets', 'name' => 'Markets'],
        ['path' => '/docs/platform-sdk/markets/coincap', 'name' => 'CoinCap'],
        ['path' => '/docs/platform-sdk/markets/coingecko', 'name' => 'CoinGecko'],
        ['path' => '/docs/platform-sdk/markets/cryptocompare', 'name' => 'CryptoCompare'],
    ]"
/>

## Cryptography

The **Cryptography** section will introduce you to encryption, hashing and identity computation. Cryptography is at the core of everything we do daily at ARK. The cryptography packages are responsible for providing secure encryption of data, hashing of passwords and providing interfaces to interact with common [BIP](https://github.com/bitcoin/bips) functionality like mnemonic generation.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/crypto', 'name' => 'Introduction'],
        ['path' => '/docs/platform-sdk/crypto/aes', 'name' => 'AES'],
        ['path' => '/docs/platform-sdk/crypto/argon2', 'name' => 'argon2'],
        ['path' => '/docs/platform-sdk/crypto/base64', 'name' => 'Base64'],
        ['path' => '/docs/platform-sdk/crypto/bcrypt', 'name' => 'bcrypt'],
        ['path' => '/docs/platform-sdk/crypto/bip32', 'name' => 'BIP32'],
        ['path' => '/docs/platform-sdk/crypto/bip38', 'name' => 'BIP38'],
        ['path' => '/docs/platform-sdk/crypto/bip39', 'name' => 'BIP39'],
        ['path' => '/docs/platform-sdk/crypto/bip44', 'name' => 'BIP44'],
        ['path' => '/docs/platform-sdk/crypto/hash', 'name' => 'Hash'],
        ['path' => '/docs/platform-sdk/crypto/hdkey', 'name' => 'HDKey'],
        ['path' => '/docs/platform-sdk/crypto/keychain', 'name' => 'Keychain'],
        ['path' => '/docs/platform-sdk/crypto/pbkdf2', 'name' => 'PBKDF2'],
        ['path' => '/docs/platform-sdk/crypto/uuid', 'name' => 'UUID'],
        ['path' => '/docs/platform-sdk/crypto/wif', 'name' => 'WIF'],
    ]"
/>

## Internationalization

The **Internationalization** section will introduce you to locale-based functionality. The Internationalization package is responsible for providing a standardized way of handling numbers, dates, time and money so that all of this data can be normalized and displayed in a format that is familiar to the user geolocation.

<x-ark-link-collection
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

<x-ark-link-collection
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

<x-ark-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/news', 'name' => 'News'],
        ['path' => '/docs/platform-sdk/helpers', 'name' => 'Helpers'],
        ['path' => '/docs/platform-sdk/markets', 'name' => 'Markets'],
        ['path' => '/docs/platform-sdk/fetch', 'name' => 'fetch'],
    ]"
/>

## Guides

The **Guides** section will provide in-depth explanations as to what you will need to do, how to do it, and what limitations and gotchas there are that need to be kept in mind when developing and testing your integration.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/platform-sdk/guides/development', 'name' => 'Development'],
        ['path' => '/docs/platform-sdk/guides/testing', 'name' => 'Testing'],
    ]"
/>
