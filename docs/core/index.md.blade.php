---
title: Introduction
---

## Introduction

<x-general.sidebar-link path="/docs/core" name="Welcome to ARK Core v3" />

## Overview

<x-general.sidebar-link path="/docs/core/overview/technology-stack" name="Technology Stack" />
<x-general.sidebar-link path="/docs/core/overview/directory-structure" name="Directory Structure" />

## Getting Started

<x-general.sidebar-link path="/docs/core/getting-started/installation" name="Installation" />
<x-general.sidebar-link path="/docs/core/getting-started/configuration" name="Configuration" />
<x-general.sidebar-link path="/docs/core/getting-started/environment-variables" name="Environment Variables" />
<x-general.sidebar-link
    path="/docs/core/getting-started/development-setup"
    name="Development Setup"
    :children="[
        ['path' => '/docs/core/getting-started/development-setup/introduction', 'name' => 'Introduction'],
        ['path' => '/docs/core/getting-started/development-setup/linux-macos', 'name' => 'Linux and macOS'],
        ['path' => '/docs/core/getting-started/development-setup/docker-linux-macos', 'name' => 'Docker on Linux and macOS'],
        ['path' => '/docs/core/getting-started/development-setup/docker-windows', 'name' => 'Docker on Windows'],
        ['path' => '/docs/core/getting-started/development-setup/spinning-up-first-testnet', 'name' => 'Spinning up your 1st Testnet'],
        ['path' => '/docs/core/getting-started/development-setup/node-running-modes', 'name' => 'Node Running Modes'],
        ['path' => '/docs/core/getting-started/development-setup/local-block-explorer-setup', 'name' => 'Local Block Explorer Setup'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/getting-started/production-setup"
    name="Production Setup"
    :children="[
        ['path' => '/docs/core/getting-started/production-setup/core-server-setup', 'name' => 'Server Setup'],
        ['path' => '/docs/core/getting-started/production-setup/core-docker-setup', 'name' => 'Docker Setup'],
        ['path' => '/docs/core/getting-started/production-setup/core-node-security', 'name' => 'Node Security'],
    ]"
/>

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

## Transactions

<x-general.sidebar-link path="/docs/core/transactions/understanding-the-lifecycle" name="Understanding the Lifecycle" />
<x-general.sidebar-link path="/docs/core/transactions/understanding-the-nonce" name="Understanding the Nonce" />
<x-general.sidebar-link path="/docs/core/transactions/cryptography-overview" name="Cryptography Overview" />
<x-general.sidebar-link
    path="/docs/core/transactions/transaction-types"
    name="Transaction Types"
    :children="[
        ['path' => '/docs/core/transactions/transaction-types/overview', 'name' => 'Overview'],
        ['path' => '/docs/core/transactions/transaction-types/transfer', 'name' => 'Transfer'],
        ['path' => '/docs/core/transactions/transaction-types/second-signature', 'name' => '2nd Signature Registration'],
        ['path' => '/docs/core/transactions/transaction-types/delegate-registration', 'name' => 'Delegate Registration'],
        ['path' => '/docs/core/transactions/transaction-types/vote-unvote', 'name' => 'Vote / Unvote'],
        ['path' => '/docs/core/transactions/transaction-types/multisignature', 'name' => 'Multisignature Registration'],
        ['path' => '/docs/core/transactions/transaction-types/ipfs', 'name' => 'Ipfs'],
        ['path' => '/docs/core/transactions/transaction-types/multipayment', 'name' => 'Multipayment'],
        ['path' => '/docs/core/transactions/transaction-types/delegate-resignation', 'name' => 'Delegate Resignation'],
        ['path' => '/docs/core/transactions/transaction-types/htlc', 'name' => 'HTLC'],
        ['path' => '/docs/core/transactions/transaction-types/entity', 'name' => 'Entity'],
    ]"
/>

## Development Guides

<x-general.sidebar-link path="/docs/core/development-guides/api-servers" name="API Servers" />
<x-general.sidebar-link path="/docs/core/development-guides/core-events" name="Core Events" />
<x-general.sidebar-link path="/docs/core/development-guides/data-models" name="Data Models" />
<x-general.sidebar-link path="/docs/core/development-guides/milestones" name="Milestones" />
<x-general.sidebar-link
    path="/docs/core/development-guides/command-line-interface"
    name="Command Line Interface (CLI)"
    :children="[
        ['path' => '/docs/core/development-guides/command-line-interface/getting-started', 'name' => 'Getting Started'],
        ['path' => '/docs/core/development-guides/command-line-interface/core-cli-commands', 'name' => 'Core CLI Commands'],
        ['path' => '/docs/core/development-guides/command-line-interface/developing-commands', 'name' => 'Developing Commands'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/development-guides/dapps"
    name="dApps"
    :children="[
        ['path' => '/docs/core/development-guides/dapps/authoring-core-dapps', 'name' => 'Authoring Core dApps'],
        ['path' => '/docs/core/development-guides/dapps/modeling-the-structure', 'name' => 'Modeling the Structure'],
        ['path' => '/docs/core/development-guides/dapps/creating-a-module', 'name' => 'Creating a Module'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/development-guides/plugins"
    name="Plugins"
    :children="[
        ['path' => '/docs/core/development-guides/plugins/managing-plugins', 'name' => 'Managing Plugins'],
        ['path' => '/docs/core/development-guides/plugins/developing-plugins', 'name' => 'Developing Plugins'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/development-guides/custom-transactions"
    name="Custom Transactions"
    :children="[
        ['path' => '/docs/core/development-guides/custom-transactions/authoring-transaction-types', 'name' => 'Authoring Transaction Types'],
        ['path' => '/docs/core/development-guides/custom-transactions/defining-the-structure', 'name' => 'Defining the Structure'],
        ['path' => '/docs/core/development-guides/custom-transactions/implementing-the-builder', 'name' => 'Implementing the Builder'],
        ['path' => '/docs/core/development-guides/custom-transactions/implementing-the-handlers', 'name' => 'Implementing the Handlers'],
        ['path' => '/docs/core/development-guides/custom-transactions/loading-the-dapp', 'name' => 'Loading the dApp'],
        ['path' => '/docs/core/development-guides/custom-transactions/running-the-example', 'name' => 'Running the Example'],
    ]"
/>

## Testing

<x-general.sidebar-link path="/docs/core/testing/introduction" name="Introduction" />
<x-general.sidebar-link path="/docs/core/testing/getting-started" name="Getting Started" />
<x-general.sidebar-link path="/docs/core/testing/sandbox" name="Sandbox" />
<x-general.sidebar-link path="/docs/core/testing/factories" name="Factories" />
<x-general.sidebar-link path="/docs/core/testing/transactions" name="Transactions" />
<x-general.sidebar-link path="/docs/core/testing/core-plugins" name="Core Plugins" />

## Version Guides

<x-general.sidebar-link
    path="/docs/core/version-guides"
    name="2.0"
    :children="[
        ['path' => '/docs/core/version-guides/release/2.0', 'name' => '2.0 Release Guide'],
        ['path' => '/docs/core/version-guides/upgrade/2.0', 'name' => '2.0 Upgrade Guide'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/version-guides"
    name="2.1"
    :children="[
        ['path' => '/docs/core/version-guides/release/2.1', 'name' => '2.1 Release Guide'],
        ['path' => '/docs/core/version-guides/upgrade/2.1', 'name' => '2.1 Upgrade Guide'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/version-guides"
    name="2.2"
    :children="[
        ['path' => '/docs/core/version-guides/release/2.2', 'name' => '2.2 Release Guide'],
        ['path' => '/docs/core/version-guides/upgrade/2.2', 'name' => '2.2 Upgrade Guide'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/version-guides"
    name="2.3"
    :children="[
        ['path' => '/docs/core/version-guides/release/2.3', 'name' => '2.3 Release Guide'],
        ['path' => '/docs/core/version-guides/upgrade/2.3', 'name' => '2.3 Upgrade Guide'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/version-guides"
    name="2.4"
    :children="[
        ['path' => '/docs/core/version-guides/release/2.4', 'name' => '2.4 Release Guide'],
        ['path' => '/docs/core/version-guides/upgrade/2.4', 'name' => '2.4 Upgrade Guide'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/version-guides"
    name="2.5"
    :children="[
        ['path' => '/docs/core/version-guides/release/2.5', 'name' => '2.5 Release Guide'],
        ['path' => '/docs/core/version-guides/upgrade/2.5', 'name' => '2.5 Upgrade Guide'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/version-guides"
    name="2.6"
    :children="[
        ['path' => '/docs/core/version-guides/release/2.6', 'name' => '2.6 Release Guide'],
        ['path' => '/docs/core/version-guides/upgrade/2.6', 'name' => '2.6 Upgrade Guide'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/core/version-guides"
    name="3.0"
    :children="[
        ['path' => '/docs/core/version-guides/release/3.0', 'name' => '3.0 Release Guide'],
        ['path' => '/docs/core/version-guides/upgrade/3.0', 'name' => '3.0 Upgrade Guide'],
    ]"
/>

## Support

<x-general.sidebar-link path="/docs/core/support/troubleshooting" name="Troubleshooting" />
<x-general.sidebar-link path="/docs/core/support/security" name="Security Vulnerabilities" />
<x-general.sidebar-link path="https://ark.dev/contact" name="Contact Us" />
