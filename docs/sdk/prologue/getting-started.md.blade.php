---
title: Getting Started
---

## Getting Started

Using ARK SDKs, developers can employ the programming language of their choice to build applications utilizing the ARK blockchain. The ARK SDKs are split into two packages for each language: Client and Cryptography.

**Client** SDKs help developers fetch information from the ARK blockchain about its current state: which delegates are currently forging, what transactions are associated with a given wallet, and so on.

**Cryptography** SDKs, by contrast, assist developers in working with transactions: signing, serializing, deserializing, etc.

If your application doesn't involve sending transactions, you can most likely build your application using the Client SDK alone. Otherwise, applications looking to leverage the full spectrum of ARK APIs should make use of both Client and Cryptography SDKs.

Usage guides are included for each supported language, and examples of how to use these libraries can be found in the **Examples** section of each.

## Supported Languages & Frameworks

| Crypto                                           | Client                                           | Frameworks                         |
| ------------------------------------------------ | ------------------------------------------------ | ---------------------------------- |
| [C++](/c++/crypto/getting-started)               | [C++](/c++/client/getting-started)               | [Laravel](/php/frameworks/laravel) |
| [Elixir](/elixir/crypto/getting-started)         | [Elixir](/elixir/client/getting-started)         | [Symfony](/php/frameworks/symfony) |
| [Golang](/golang/crypto/getting-started)         | [Golang](/golang/client/getting-started)         |                                    |
| [Java](/java/crypto/getting-started)             | [Java](/java/client/getting-started)             |                                    |
| [PHP](/php/crypto/getting-started)               | [PHP](/php/client/getting-started)               |                                    |
| [Python](/python/crypto/getting-started)         | [Python](/python/client/getting-started)         |                                    |
| [Ruby](/ruby/crypto/getting-started)             | [Ruby](/ruby/client/getting-started)             |                                    |
| [Rust](/rust/crypto/getting-started)             | [Rust](/rust/client/getting-started)             |                                    |
| [Swift](/swift/crypto/getting-started)           | [Swift](/swift/client/getting-started)           |                                    |
| [TypeScript](/typescript/crypto/getting-started) | [TypeScript](/typescript/client/getting-started) |                                    |

## Deprecated

| Crypto                                            | Client                                            | Frameworks                         |
| ------------------------------------------------- | ------------------------------------------------- | ---------------------------------- |
| [.NET](/dotnet/crypto/getting-started) | [.NET](/dotnet/client/getting-started) |                                    |

## Contributing

Contributions to our SDK follow the same guidelines as our general [contribution guidelines](https://docs.ark.io/guidebook/contribution-guidelines/contributing.html).

Additionally to those there are guidelines for the structure of SDKs and what functionality they should provide. Take a look at the [Crypto](/guidelines/crypto) and [Client](/guidelines/client) guidelines before you start to contribute to make sure the feature or change you plan to implement is in line with those.
