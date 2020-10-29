## Introduction

<x-general.sidebar-link path="/docs/core" name="Introduction" />

## Getting Started

<x-general.sidebar-link path="/docs/core/getting-started/technology-stack" name="Technology Stack" />
<x-general.sidebar-link path="/docs/core/getting-started/installation" name="Installation" />
<x-general.sidebar-link path="/docs/core/getting-started/configuration" name="Configuration" />
<x-general.sidebar-link path="/docs/core/getting-started/directory-structure" name="Directory Structure" />

## Architecture

<x-general.sidebar-link path="/docs/core/architecture/application-lifecycle" name="Application Lifecycle" />
<x-general.sidebar-link path="/docs/core/architecture/service-container" name="Service Container" />
<x-general.sidebar-link path="/docs/core/architecture/service-provider" name="Service Provider" />
<x-general.sidebar-link path="/docs/core/architecture/managers-and-drivers" name="Managers and Drivers" />
<x-general.sidebar-link path="/docs/core/architecture/contracts" name="Contracts" />

## Services

<x-general.sidebar-link path="/docs/core/services/attributes" name="Attributes" />
<x-general.sidebar-link path="/docs/core/services/cache" name="Cache" />
<x-general.sidebar-link path="/docs/core/services/events" name="Events" />
<x-general.sidebar-link path="/docs/core/services/filesystem" name="Filesystem" />
<x-general.sidebar-link path="/docs/core/services/logging" name="Logging" />
<x-general.sidebar-link path="/docs/core/services/mixins" name="Mixins" />
<x-general.sidebar-link path="/docs/core/services/pipeline" name="Pipeline" />
<x-general.sidebar-link path="/docs/core/services/queue" name="Queue" />
<x-general.sidebar-link path="/docs/core/services/schedule" name="Schedule" />
<x-general.sidebar-link path="/docs/core/services/triggers" name="Triggers" />
<x-general.sidebar-link path="/docs/core/services/validation" name="Validation" />

## Testing

<x-general.sidebar-link path="/docs/core/testing/getting-started" name="Getting Started" />
<x-general.sidebar-link path="/docs/core/testing/sandbox" name="Sandbox" />
<x-general.sidebar-link path="/docs/core/testing/factories" name="Factories" />

## Command Line Interface (CLI)

<x-general.sidebar-link path="/docs/core/command-line-interface-cli/getting-started" name="Getting Started" />
<x-general.sidebar-link path="/docs/core/command-line-interface-cli/developing-commands" name="Developing Commands" />

## Configuration

<x-general.sidebar-link path="/docs/core/configuration/getting-started" name="Getting Started" />
<x-general.sidebar-link path="/docs/core/configuration/environment-variables" name="Environment Variables" />

## Transactions

<x-general.sidebar-link path="/docs/core/transactions/transaction-lifecycle" name="Understanding Transaction Lifecycle" />
<x-general.sidebar-link path="/docs/core/transactions/understanding-transaction-nonce" name="Understanding Transaction Nonce" />
<x-general.sidebar-link path="/docs/core/transactions/cryptography" name="Cryptography Overview" />
<x-general.sidebar-link
    path="/docs/core/transactions/transacion-types"
    name="Transaction Types"
    :children="[
        ['path' => '/docs/core/transactions/transaction-types/intro', 'name' => 'Introduction'],
        ['path' => '/docs/core/transactions/transaction-types/transfer', 'name' => 'Transfer'],
        ['path' => '/docs/core/transactions/transaction-types/second-signature-registration', 'name' => 'Second Signature Registration'],
        ['path' => '/docs/core/transactions/transaction-types/delegate-registration', 'name' => 'Delegate Registration'],
        ['path' => '/docs/core/transactions/transaction-types/vote-and-unvote-transaction', 'name' => 'Vote and Unvote Transaction'],
        ['path' => '/docs/core/transactions/transaction-types/multisignature-transaction', 'name' => 'Multisignature Transaction'],
        ['path' => '/docs/core/transactions/transaction-types/ipfs-transaction', 'name' => 'IPFS Transaction'],
        ['path' => '/docs/core/transactions/transaction-types/multipayment-transaction', 'name' => 'Multipayment Transaction'],
        ['path' => '/docs/core/transactions/transaction-types/delegate-resignation', 'name' => 'Delegate Resignation'],

    ]"
/>

## Security
<x-general.sidebar-link path="/docs/core/security/security-vulnerability-disclosure-program" name="Security Vulnerability Disclosure Program" />

## How-To Guides
<x-general.sidebar-link
    path="/docs/core/how-to-guides/setting-up-your-production-environment"
    name="Core Production Setup"
    :children="[
        ['path' => '/docs/core/how-to-guides/setting-up-your-production-environment/core-node-secure-setup', 'name' => 'Core Server Setup'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-production-environment/how-to-setup-a-node-with-docker', 'name' => 'Core Docker Setup'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-production-environment/how-to-secure-your-ark-node', 'name' => 'Secure Node'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/how-to-guides/setting-up-your-development-environment"
    name="Core Development Setup"
    :children="[
        ['path' => '/docs/core/how-to-guides/setting-up-your-development-environment/intro', 'name' => 'Introduction'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-development-environment/linux', 'name' => 'Linux and macOS'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-development-environment/docker', 'name' => 'Docker on Linux & macOS'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-development-environment/windows', 'name' => 'Docker on Windows'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-development-environment/spinning-up-your-first-testnet', 'name' => 'Spinning Up Your First Testnet'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-development-environment/core-node-running-modes', 'name' => 'Core Node Running Modes'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-development-environment/how-to-use-the-core-tester-cli', 'name' => 'Using The Core-Tester-CLI'],
        ['path' => '/docs/core/how-to-guides/setting-up-your-development-environment/setup-local-blockchain-explorer', 'name' => 'Setup Local Block Explorer'],
    ]"
/>

<x-general.sidebar-link
    path="/docs/core/how-to-guides/how-to-write-custom-transactions-types"
    name="Custom Transactions"
    :children="[
        ['path' => '/docs/core/how-to-guides/how-to-write-custom-transactions-types/intro', 'name' => 'How To Write New Transactions Types'],
        ['path' => '/docs/core/how-to-guides/how-to-write-custom-transactions-types/implementing-transaction-structure', 'name' => 'Define Transaction Structure'],
        ['path' => '/docs/core/how-to-guides/how-to-write-custom-transactions-types/implement-transaction-builder', 'name' => 'Implement Transaction Builder'],
        ['path' => '/docs/core/how-to-guides/how-to-write-custom-transactions-types/implement-blockchain-protocol-handler', 'name' => 'Implement Blockchain Protocol Handlers'],
        ['path' => '/docs/core/how-to-guides/how-to-write-custom-transactions-types/loading-the-dapp-within-core', 'name' => 'Loading The dApp Within Core'],
        ['path' => '/docs/core/how-to-guides/how-to-write-custom-transactions-types/example-walkthrough', 'name' => 'Running The Example'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/how-to-guides/how-to-write-core-dapps"
    name="Core dApps"
    :children="[
        ['path' => '/docs/core/how-to-guides/how-to-write-core-dapps/intro', 'name' => 'How To Write Core dApps'],
        ['path' => '/docs/core/how-to-guides/how-to-write-core-dapps/basic-structure-and-properties', 'name' => 'Basic Module Structure'],
        ['path' => '/docs/core/how-to-guides/how-to-write-core-dapps/setting-up-your-first-module', 'name' => 'Creating Your First Core Module'],
        ]"
/>
<x-general.sidebar-link path="/docs/core/how-to-guides/managing-plugins" name="Managing Plugins" />
<x-general.sidebar-link path="/docs/core/how-to-guides/plugin-development" name="Plugin Development" />
<x-general.sidebar-link path="/docs/core/how-to-guides/using-milestones" name="Using Milestones" />
<x-general.sidebar-link path="/docs/core/how-to-guides/how-to-create-api-servers" name="Create API Servers" />
<x-general.sidebar-link path="/docs/core/how-to-guides/how-to-listen-to-core-events" name="Listen to Core Events" />
<x-general.sidebar-link path="/docs/core/how-to-guides/data-models" name="Data Models" />


## Upgrade Guides

<x-general.sidebar-link path="/docs/core/upgrade-guides/2.0" name="2.0" />
<x-general.sidebar-link path="/docs/core/upgrade-guides/2.1" name="2.1" />
<x-general.sidebar-link path="/docs/core/upgrade-guides/2.2" name="2.2" />
<x-general.sidebar-link path="/docs/core/upgrade-guides/2.3" name="2.3" />
<x-general.sidebar-link path="/docs/core/upgrade-guides/2.4" name="2.4" />
<x-general.sidebar-link path="/docs/core/upgrade-guides/2.5" name="2.5" />
<x-general.sidebar-link path="/docs/core/upgrade-guides/2.6" name="2.6" />
<x-general.sidebar-link path="/docs/core/upgrade-guides/3.0" name="3.0" />

## Release Guides

<x-general.sidebar-link path="/docs/core/releases/intro" name="Introduction" />
<x-general.sidebar-link path="/docs/core/releases/2.0" name="2.0" />
<x-general.sidebar-link path="/docs/core/releases/2.1" name="2.1" />
<x-general.sidebar-link path="/docs/core/releases/2.2" name="2.2" />
<x-general.sidebar-link path="/docs/core/releases/2.3" name="2.3" />
<x-general.sidebar-link path="/docs/core/releases/2.4" name="2.4" />
<x-general.sidebar-link path="/docs/core/releases/2.5" name="2.5" />
<x-general.sidebar-link path="/docs/core/releases/2.6" name="2.6" />

## V3 Testing

<x-general.sidebar-link path="/docs/core/v3-testing/intro" name="Introduction" />
<x-general.sidebar-link path="/docs/core/v3-testing/creating-v3-node" name="Core V3 Server Setup" />
<x-general.sidebar-link path="/docs/core/v3-testing/transactions" name="Transactions" />
<x-general.sidebar-link path="/docs/core/v3-testing/cli-testing" name="Core CLI" />
<x-general.sidebar-link path="/docs/core/v3-testing/v3-plugins" name="Core 3.0 Plugins" />
