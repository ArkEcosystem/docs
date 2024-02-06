---
title: Testing - Introduction
---

# Core V3 Testing Introduction

ARK Core V3 is currently available for testing on the ARK Development Network (ADN). V3 is a major milestone for ARK Core that finally provides a fully modular architecture that lets developers customize their chain to fit their application’s specific needs. While Core v2 provided the initial push towards being fully modular, some elements of prior ARK Core versions were still intertwined to the point where small modifications of one area could have large and unintended impacts on another. Core v3 brings much more structure and separation of components than any previous Core version.

## Getting Started

ARK Core is built with testing in mind to ensure that breaking changes or bugs are caught before they make it into a release. There are 4 types of tests that we employ to ensure that we catch as many issues as possible and keep feedback during development fast and useful.

### E2E

The E2E tests are the most high level tests we have. They work with a real network powered by Docker Compose and replicate how certain actions could affect a network and ensure that they won't cause any harm. If something has the potential to stall the network or slow it down then we can write an E2E test and see how it will react.

### Functional

The functional tests are responsible for testing certain functionalities from the perspective of a user that talks to a node. They start a real node and start talking to it, for example sending transactions and ensuring that they have been accepted and forged or rejected and not forged. These tests are important to ensure that everything is working as expected from a user perspective.

### Integration

The integration tests are responsible for testing functionality that requires fully functional instances of plugins but not Core. The most obvious example for this is the public API which only depends on a few components but doesn't need a full instance of Core to function. They are similar to functional tests but work at a smaller scope.

### Unit

The unit tests are responsible for testing isolated functionality that doesn't depend on any other components or a running instance of Core. These tests ensure that each component is working as intended while you work up to stitch them together to a plugin or new functionality. They are the best way to get started with TDD as you start out small and slowly work your way up to bigger tests as you gain confidence in your implementation.

## What's New in Core v3?

It is important to understand that ARK Core v3.0 is a massive improvement over every version of ARK Core released thus far. To get a deeper understanding of how it all works, check out our Let's Explore ARK Core Series that examines the upgrades and improvements the development team made to the Core infrastructure:

- **[Part 1: Infrastructure](https://ark.io/blog/lets-explore-ark-core-v3-part-1-infrastructure-5c8ba13c9c42)**
- **[Part 2: Bootstrap and Events](https://ark.io/blog/lets-explore-core-v3-part-2-bootstrap-events-f24adf70dfff)**
- **[Part 3: Kernel and Services](https://ark.io/blog/lets-explore-core-part-3-kernel-services-2836756675bd)**
- **[Part 4: Extensibility](https://ark.io/blog/lets-explore-core-part-4-extensibility-c60522f1b700)**
- **[Part 5: Maintainability and Testability](https://ark.io/blog/lets-explore-core-part-5-maintainability-testability-e40dfee1fe10)**
- **[Part 6: Tooling](https://ark.io/blog/lets-explore-core-part-6-tooling-939d3b6b50df)**

> *For a full list of current changes and upgrades, take a look at the* **[Core V3 Changelog](https://github.com/ArkEcosystem/core/blob/develop/CHANGELOG.md).** *Even more may come as a result of this testing phase.*

## Join the Testing

Help from our community during this test phase is critical to ensure a smooth transition from 2.7 to 3.0 on the ARK Public Network. If you would like to help out with testing then please join the [ACF's](https://arkcommunity.fund) [Community Discord](https://discord.gg/arkecosystem) and visit the #devnet channel. Within this channel you will find all the assistance required to get started with Core V3 on the ARK Development Network.

As you test different aspects of Core V3, you are encouraged to use your own initiative and come up with interesting and unique ways to test Core 3.0.

## Objectives

The objectives of this test period is to ensure that the Core 3.0's feature set function as designed, identify potential pain points and areas for improvement, and to report any bugs or defects to the ARK.io Team.

## Preparation

Throughout this documentation, we will be using various tools to test Core V3.0 that have been upgraded to be compatible with the latest release of ARK Core.

### Core V3 Server Setup

If your server was previously operational on devnet with Core 2.7, then please follow this upgrade guide:
<livewire:page-reference path="/docs/mainsail/releases/upgrade/3.0" />

If you are creating a new server for V3 testing, please follow the guides found in the 'Development Setup' section:
<livewire:page-reference path="/docs/mainsail/installation/intro" />

### Desktop Wallet

You can find a new version of the Desktop Wallet that's compatible with Core v3 in the links below.

*Note: This release also includes new functionality that enables you to unvote and vote delegates within the same transaction.*

- **Windows** can be found **[here](https://github.com/ArkEcosystem/desktop-wallet/releases/download/2.9.5/ark-desktop-wallet-win-2.9.5.exe)**
- **macOS** can be found **[here](https://github.com/ArkEcosystem/desktop-wallet/releases/download/2.9.5/ark-desktop-wallet-mac-2.9.5.dmg)**
- **Linux** can be found here: **[(32-bit)](https://github.com/ArkEcosystem/desktop-wallet/releases/download/2.9.5/ark-desktop-wallet-linux-x64-2.9.5.tar.gz)** | **[(64-bit)](https://github.com/ArkEcosystem/desktop-wallet/releases/download/2.9.5/ark-desktop-wallet-linux-amd64-2.9.5.deb)**

<x-alert type="warning">
To download from the links above you are required to be logged in to GitHub otherwise you may see 404 errors
</x-alert>

### core-tx-tester

The `core-tx-tester` is a useful tool that allows you to send transactions on the ARK Development Network via command line and may be preferable to the Desktop Wallet. You can find a set up guide for the `core-tx-tester` below:
<livewire:embed-link url="https://github.com/ArkEcosystem/core-tx-tester" caption="ARK Core-TX-Tester" />

### Explorer

The ARK Explorer is a pivotal tool to use whilst testing. You can find the ARK Development Network Explorer below:
<livewire:embed-link url="https://dexplorer.ark.io/" caption="ARK Development Network Explorer" />

## Reporting Issues

All of the issues will need to be opened via ARK’s Core Github repository at [http://github.com/arkecosystem/core/issues](http://github.com/arkecosystem/core/issues) with detailed information on what the bug does, how to reproduce the bug, and even a potential solution. If you’re suggesting an improvement then please provide detailed information on what feature/performance/improvement can be implemented.

## Transactions

Transactions are an integral component of the ARK Core Framework and requires thorough testing to ensure that not only each transaction type can be sent successfully but also that our surrounding products display the correct detail where applicable.

To get stuck in with testing Transactions, you can follow this document below:

<livewire:page-reference path="/docs/mainsail/testing/transactions" />

## Plugin Development

Testers who previously created Plugins for Core are encouraged to migrate their Plugins to be functional with Core V3 to increase test coverage and report any pain points found during the migration process.

To get stuck in with Plugin Development, follow the link below:

<livewire:page-reference path="/docs/mainsail/testing/plugins" />
