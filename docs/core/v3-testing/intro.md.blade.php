---
title: Core V3 Testing Introduction
---

# Core V3 Testing Introduction
ARK Core V3 is currently available for testing on the ARK Development Network (ADN). V3 is a major milestone for ARK Core that finally provides a fully modular architecture that lets developers customize their chain to fit their application’s specific needs. While Core v2 provided the initial push towards being fully modular, some elements of prior ARK Core versions were still intertwined to the point where small modifications of one area could have large and unintended impacts on another. Core v3 brings much more structure and separation of components than any previous Core version.

## What's New in Core v3?
It is important to understand that ARK Core v3.0 is a massive improvement over every version of ARK Core released thus far. To get a deeper understanding of how it all works, check out our Let's Explore ARK Core Series that examines the upgrades and improvements the development team made to the Core infrastructure:

- **[Part 1: Infrastructure](https://ark.io/blog/lets-explore-ark-core-v3-part-1-infrastructure-5c8ba13c9c42)**
- **[Part 2: Bootstrap & Events](https://ark.io/blog/lets-explore-core-v3-part-2-bootstrap-events-f24adf70dfff)**
- **[Part 3: Kernel & Services](https://ark.io/blog/lets-explore-core-part-3-kernel-services-2836756675bd)**
- **[Part 4: Extensibility](https://ark.io/blog/lets-explore-core-part-4-extensibility-c60522f1b700)**
- **[Part 5: Maintainability & Testability](https://ark.io/blog/lets-explore-core-part-5-maintainability-testability-e40dfee1fe10)**
- **[Part 6: Tooling](https://ark.io/blog/lets-explore-core-part-6-tooling-939d3b6b50df)**

> *For a full list of current changes and upgrades, take a look at the* **[Core V3 Changelog](https://github.com/ArkEcosystem/core/blob/develop/CHANGELOG.md).** *Even more may come as a result of this testing phase.*

## Join the Testing!
Help from our community during this test phase is critical to ensure a smooth transition from 2.7 to 3.0 on the ARK Public Network. If you would like to help out with testing then please join the ARK's [Slack](https://ark.io/slack) and join the #devnet channel. Within this channel you will find all the assistance required to get started with Core V3 on the ARK Development Network. 

As you test different aspects of Core V3, you are encouraged to use your own initiative and come up with interesting and unique ways to test Core 3.0. 

## Objectives
The objectives of this test period is to ensure that the Core 3.0's feature set function as designed, identify potential pain points and areas for improvement, and to report any bugs or defects to the ARK.io Team. 

## Preparation
Throughout this documentation, we will be using various tools to test Core V3.0 that have been upgraded to be compatible with the latest release of ARK Core. 

### Core V3 Server Setup
If your server was previously operational on devnet with Core 2.7, then please follow this upgrade guide:
<livewire:page-reference path="/docs/core/upgrade-guides/3.0" />

If you are creating a new server for V3 testing, then please follow this guide:
<livewire:page-reference path="/docs/core/v3-testing/creating-v3-node" />

### Desktop Wallet
You can find a new version of the Desktop Wallet that's compatible with Core v3 in the links below.   
*Note: This release also includes new functionality that enables you to unvote and vote delegates within the same transaction.*
- **Windows** link can be found [here](https://github.com/ArkEcosystem/desktop-wallet/suites/1345717663/artifacts/21756947)
- **Mac** download can be found [here](https://github.com/ArkEcosystem/desktop-wallet/suites/1345717663/artifacts/21756946)
- **Linux** download can be found [here](https://github.com/ArkEcosystem/desktop-wallet/suites/1345717663/artifacts/21756947e)
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

All of the issues will need to be opened via ARK’s Core Github repository at http://github.com/arkecosystem/core/issues with detailed information on what the bug does, how to reproduce the bug, and even a potential solution. If you’re suggesting an improvement then please provide detailed information on what feature/performance/improvement can be implemented.

## Transactions

Transactions are an integral component of the ARK Core Framework and requires thorough testing to ensure that not only each transaction type can be sent successfully but also that our surrounding products display the correct detail where applicable. 

To get stuck in with testing Transactions, you can follow this document below:

<livewire:page-reference path="/docs/core/v3-testing/transactions" />

## ARK Core CLI
ARK Core comes packaged with a robust command line interface (CLI) which is an essential tool that enables any node operator to update, manage, or monitor their node installation without the need for external programs. 

To get stuck in with testing ARK Core CLI, jump to the document below:

<livewire:page-reference path="/docs/core/v3-testing/cli-testing" />

## Plugin Development
Testers who previously created Plugins for Core are encouraged to migrate their Plugins to be functional with Core V3 to increase test coverage and report any pain points found during the migration process.

To get stuck in with Plugin Development, follow the link below:

<livewire:page-reference path="/docs/core/v3-testing/v3-plugins" />

## SDKs (Coming Soon)

ARK Core currently provides SDK support for several different languages such as:
- PHP  
- Python  
- Java
- Go
- TypeScript
- C++

Testing on SDK's will begin soon. Stay tuned for an update on this. 

