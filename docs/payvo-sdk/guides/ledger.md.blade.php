---
title: Ledger Development
---

# Ledger Development

The Payvo SDK provides all the boilerplate and structures you need to integrate your blockchain into Payvo products. In this section, we will provide guidance on what you need to know for Ledger hardware wallet testing and integration.

## Ledger Communication

Ledger hardware wallets send and receive messages using [APDU](https://wikipedia.org/wiki/Smart_card_application_protocol_data_unit); a device communication encoding scheme initially designed for [smart cards](https://wikipedia.org/wiki/Smart_card). Ledger devices use this protocol to wrap transaction and message signing requests and responses along with other payload information.

<x-alert type="success">
Visit our Ledger-Transport's [apdu](https://github.com/ArkEcosystem/ledger-transport/blob/master/src/apdu.ts) code page to see a breakdown of the additional flags used to wrap ARK signing requests.
</x-alert>

## The Ledger Service

The Ledger Service is responsible for all interactions with a Ledger Hardware Wallet. This includes derivation and signing of transactions and is limited to 1 device at a time.

## Service Implementation

If we take the [ledger contract](https://github.com/PayvoHQ/sdk/blob/master/packages/sdk/source/ledger.contract.ts) and implement it to network's SDK package; we can use `[sdk-ark](https://github.com/PayvoHQ/sdk/blob/master/packages/ark/source/ledger.service.test.ts)` as an example.

## Testing

All code should include thorough tests that check not only for proper functionality but for cases where improper calls should be detected and handled appropriately. This is particularly important for Ledger hardware wallets where untrusted input could result in an invalid state where an attacker may execute malicious or otherwise undesired calls. Be sure to also familiarize yourself with Ledger's [App Security Guidelines](https://developers.ledger.com/docs/nano-app/secure-app).

An example of testing the Ledger service can be seen [here](https://github.com/PayvoHQ/sdk/blob/master/packages/ark/source/ledger.service.test.ts), but we'll outline what you should keep in mind when writing these tests.

<x-alert type="warning">
Ensure that unsupported methods throw a `NotImplemented` exception.
</x-alert>

### Test Fixtures

The Payvo SDK uses LedgerHQ's `[hw-transport-mocker](https://github.com/LedgerHQ/ledgerjs/tree/master/packages/hw-transport-mocker)` package to emulate and replay device communication sessions to facilitate testing without the need for a live device. i.e., these replay sessions are what constitute Ledger test fixtures.

<x-alert type="success">
Check out the `sdk-ark` [ledger fixtures](https://github.com/PayvoHQ/sdk/blob/master/packages/ark/test/fixtures/ledger.ts) to see what this communication replay looks like.
</x-alert>

### Fixture Examples

<!-- Visit the [Core Transfer](https://ark.dev/docs/core/transactions/types/transfer) page to see the structure of a serialized ARK transaction. You can further examine the ARK Ledger Transport's [test fixtures](https://github.com/ArkEcosystem/ledger-transport/blob/c7d67ed0a52929699d45cf828747de57cacd650b/__tests__/__fixtures__/transport-fixtures.ts) and [APDU constants](https://github.com/ArkEcosystem/ledger-transport/blob/c7d67ed0a52929699d45cf828747de57cacd650b/src/apdu.ts#L5-#L66) to get an idea of how serialized transactions should be wrapped. -->
