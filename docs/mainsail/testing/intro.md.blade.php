---
title: Testing - Introduction
---

# Mainsail Testing Introduction

Mainsail is currently available for testing on the Mainsail Testnet Network (MTN).

## Getting Started

Mainsail is built with testing in mind to ensure that breaking changes or bugs are caught before they make it into a release. There are 4 types of tests that we employ to ensure that we catch as many issues as possible and keep feedback during development fast and useful.

### E2E

The E2E tests are the most high level tests we have. They work with a real network powered by Docker Compose and replicate how certain actions could affect a network and ensure that they won't cause any harm. If something has the potential to stall the network or slow it down then we can write an E2E test and see how it will react.

### Functional

The functional tests are responsible for testing certain functionalities from the perspective of a user that talks to a node. They start a real node and start talking to it, for example sending transactions and ensuring that they have been accepted and forged or rejected and not forged. These tests are important to ensure that everything is working as expected from a user perspective.

### Integration

The integration tests are responsible for testing functionality that requires fully functional instances of plugins but not Core. The most obvious example for this is the public API which only depends on a few components but doesn't need a full instance of Core to function. They are similar to functional tests but work at a smaller scope.

### Unit

The unit tests are responsible for testing isolated functionality that doesn't depend on any other components or a running instance of Core. These tests ensure that each component is working as intended while you work up to stitch them together to a plugin or new functionality. They are the best way to get started with TDD as you start out small and slowly work your way up to bigger tests as you gain confidence in your implementation.

### core-tx-tester

The `mainsail-tx-tester` is a useful tool that allows you to send transactions on the Mainsail Development Network via command line and may be preferable to the Desktop Wallet. You can find a set up guide for the `core-tx-tester` below:
<livewire:embed-link url="https://github.com/ArkEcosystem/mainsail-tx-tester" caption="Mainsail TX Tester" />

### Explorer

The ARK Explorer is a pivotal tool to use whilst testing. You can find the ARK Development Network Explorer below:
<livewire:embed-link url="http://51.91.80.232:8898" caption="Mainsail Development Network Explorer" />

## Reporting Issues

All of the issues will need to be opened via Mainsail Github repository at [https://github.com/ArkEcosystem/mainsail/issues](https://github.com/ArkEcosystem/mainsail/issues) with detailed information on what the bug does, how to reproduce the bug, and even a potential solution. If you’re suggesting an improvement then please provide detailed information on what feature/performance/improvement can be implemented.
