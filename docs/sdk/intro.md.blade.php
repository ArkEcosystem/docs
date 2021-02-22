---
title: Introduction
---

# Introduction

Using ARK SDKs, developers can employ the programming language of their choice to build applications utilizing the ARK blockchain. **The ARK SDKs are split into two packages for each language: Client and Cryptography.**

[**Client SDKs**](/docs/sdk/guidelines/client) help developers fetch information from the ARK blockchain about its current state: which delegates are currently forging, what transactions are associated with a given wallet, and so on.

[**Cryptography SDKs**](/docs/sdk/guidelines/crypto), by contrast, assist developers in working with transactions: signing, serializing, deserializing, etc.

<x-alert type="info">
If you need to learn more about Cryptography in general, how initial key and address generation works, what is a public or private key, head over to the page link below:
</x-alert>

<livewire:page-reference path="/docs/core/transactions/cryptography" />

If your application doesn't involve sending transactions, you can most likely build your application using the Client SDK alone. Otherwise, applications looking to leverage the full spectrum of ARK APIs should make use of both Client and Cryptography SDKs.

Usage guides are included for each supported language, and examples of how to use these libraries can be found in the **Examples** section of each specific library.

## Supported Languages & Frameworks
Below you can find the Installation, Crypto and Client documentation for the language of your choice.
<!-- The styling of the below links are a WIP. Not happy with it, might turn it into a table.  -->
### Typescript
<x-link-collection
    :links="[
        ['path' => '/docs/sdk/typescript/installation', 'name' => 'Installation'],
        ['path' => '/docs/sdk/typescript/crypto/api-documentation', 'name' => 'Crypto'],
        ['path' => '/docs/sdk/typescript/client/api-documentation', 'name' => 'Client'],
    ]"
/>

----

### PHP
<x-link-collection
    :links="[
        ['path' => '/docs/sdk/php/installation', 'name' => 'Installation'],
        ['path' => '/docs/sdk/php/crypto/api-documentation', 'name' => 'Crypto'],
        ['path' => '/docs/sdk/php/client/api-documentation', 'name' => 'Client'],
    ]"
/>

----

### Python
<x-link-collection
    :links="[
        ['path' => '/docs/sdk/python/installation', 'name' => 'Installation'],
        ['path' => '/docs/sdk/python/crypto/api-documentation', 'name' => 'Crypto'],
        ['path' => '/docs/sdk/python/client/api-documentation', 'name' => 'Client'],
    ]"
/>

----

### Java
<x-link-collection
    :links="[
        ['path' => '/docs/sdk/java/installation', 'name' => 'Installation'],
        ['path' => '/docs/sdk/java/crypto/api-documentation', 'name' => 'Crypto'],
        ['path' => '/docs/sdk/java/client/api-documentation', 'name' => 'Client'],
    ]"
/>

----

### GO
<x-link-collection
    :links="[
        ['path' => '/docs/sdk/go/installation', 'name' => 'Installation'],
        ['path' => '/docs/sdk/go/crypto/api-documentation', 'name' => 'Crypto'],
        ['path' => '/docs/sdk/go/client/api-documentation', 'name' => 'Client'],
    ]"
/>

----

### C++
<x-link-collection
    :links="[
        ['path' => '/docs/sdk/c++/installation', 'name' => 'Installation'],
        ['path' => '/docs/sdk/c++/crypto/api-documentation', 'name' => 'Crypto'],
        ['path' => '/docs/sdk/c++/client/api-documentation', 'name' => 'Client'],
    ]"
/>



