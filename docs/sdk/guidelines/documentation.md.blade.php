---
title: Documentation
---

## Introduction

This file describes a general overview that must be adhered to when writing documentation for any of the SDKs (both Crypto and Client).

Following these guidelines is required to provide a streamlined experience across different languages to make it easier for developers to read up on the SDK usage in their language of choice.

> Carefully read those guidelines and abide by them while writing SDK documentation.

## Structure

Each SDK contains as at a minimum the following **three** documentation files:

- `getting-started.md`, which contains all the information you need in order to work with the SDK.
- `api-documentation.md`, which contains an overview of all available functions in the SDK.
- `examples.md`, which contains actual code examples for scenario's that frequently occur.

We'll explain the specifics of each file in more details in the following sections.

### Getting Started

We want to make it easy for anyone to work with the SDKs. Therefore this document will detail all the steps necessary to use it in your project. These steps include listing requirements for the SDKs (in terms of what other dependencies you need to have), how to install the SDK on your system to use it and how to include or import it in a project.

Note that this document should also include a section on how to start further development on the SDK, including cloning from GitHub, how to run the tests and everything else needed to properly setup a development environment.

### API Documentation

The API documentation should only document the available functions in the SDK, the parameters they take and their return type. It should be accompanied by a guiding text on what the function does, but should not become a code example; save those for the actual example document.

### Examples

This file is meant to show code examples on how to use the SDK. These examples should contain often-used use cases depending on the SDK type. For the Client SDK, this would for example show:

- How to fetch a list of blocks
- How to fetch all active delegates
- How to fetch information of a specific wallet
- ...

For the Crypto SDK, you could give examples of:

- How to create a transaction with a builder
- How to serialize / deserialize transactions
- How to generate a private key / public key / address from a passphrase
- ...

These examples are not set in stone yet and can be adjusted to what you deem fit. If an SDK has more functionality than the same SDK in another language, this would of course mean it could have additional examples. However, please keep an eye on the examples in other languages and make sure the language you work on has similar ones if the SDK contains that same functionality. That way the examples will be streamlined across different languages.
