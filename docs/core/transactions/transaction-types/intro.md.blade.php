---
title: Transaction Types
---

# Transaction Types

## Introduction

This sections describes Mainnet Transaction Types and its structure related to the `serde` process (serialization and deserialization of transactions).

<x-alert type="info">
Transactions are the heart of any blockchain, cryptocurrency or otherwise. They represent a transfer of value from one network participant to another. In ARK, transactions can be of one of multiple types, specified in AIP11, which can affect the content and data structure of each transaction's payload.
</x-alert>

Using[ ARK SDKs](/docs/api/), developers can employ the programming language of their choice to build applications utilizing the ARK blockchain. The ARK SDKs are split into two packages for each language: Client and Cryptography.

**Client** SDKs help developers fetch information from the ARK blockchain about its current state: which delegates are currently forging, what transactions are associated with a given wallet, and so on.

**Cryptography** SDKs, by contrast, assist developers in working with transactions: signing, serializing, deserializing, etc.

For more information about SDK implementations visit [ARK SDKs hub](/docs/api/).

In the following sections basic transaction types and their structure is presented. If you are interested in the signature generation process and algorithm used, please check the [Cryptography Overview](/docs/core/transactions/cryptography) page.

### List of Transaction Types:

<livewire:page-reference path="/docs/core/transactions/transaction-types/transfer" />

<livewire:page-reference path="/docs/core/transactions/transaction-types/second-signature-registration" />

<livewire:page-reference path="/docs/core/transactions/transaction-types/delegate-registration" />

<livewire:page-reference path="/docs/core/transactions/transaction-types/vote-and-unvote-transaction" />

<livewire:page-reference path="/docs/core/transactions/transaction-types/multisignature-transaction" />

<livewire:page-reference path="/docs/core/transactions/transaction-types/ipfs-transaction" />

<livewire:page-reference path="/docs/core/transactions/transaction-types/multipayment-transaction" />

<livewire:page-reference path="/docs/core/transactions/transaction-types/delegate-resignation" />

<livewire:page-reference path="/docs/core/transactions/transaction-types/hashed-time-locked-contracts" />
