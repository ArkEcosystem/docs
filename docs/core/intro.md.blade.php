---
title: Welcome to ARK Core v3
---

# Welcome to ARK Core v3

## Overview

The **Overview** section will introduce you to the basic concepts surrounding ARK Core v3 development.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/overview/stack', 'name' => 'Technology Stack'],
        ['path' => '/docs/core/overview/directory', 'name' => 'Directory Structure'],
        ['path' => '/docs/core/overview/models', 'name' => 'Data Models'],
        ['path' => '/docs/core/overview/cryptography', 'name' => 'Cryptography'],
    ]"
/>

### Architecture

The **Architecture** section will introduce you to the most important concepts and internals of ARK Core v3.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/overview/architecture/lifecycle', 'name' => 'Application Lifecycle'],
        ['path' => '/docs/core/overview/architecture/container', 'name' => 'Service Container'],
        ['path' => '/docs/core/overview/architecture/provider', 'name' => 'Service Provider'],
        ['path' => '/docs/core/overview/architecture/managers-drivers', 'name' => 'Managers and Drivers'],
        ['path' => '/docs/core/overview/architecture/contracts', 'name' => 'Contracts'],
    ]"
/>

### Services

The **Services** section will introduce you to pre-built services that you will be able to leverage to speed up ARK Core v3 development.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/overview/services/attributes', 'name' => 'Attributes'],
        ['path' => '/docs/core/overview/services/cache', 'name' => 'Cache'],
        ['path' => '/docs/core/overview/services/events', 'name' => 'Events'],
        ['path' => '/docs/core/overview/services/filesystem', 'name' => 'Filesystem'],
        ['path' => '/docs/core/overview/services/logging', 'name' => 'Logging'],
        ['path' => '/docs/core/overview/services/mixins', 'name' => 'Mixins'],
        ['path' => '/docs/core/overview/services/pipeline', 'name' => 'Pipeline'],
        ['path' => '/docs/core/overview/services/queue', 'name' => 'Queue'],
        ['path' => '/docs/core/overview/services/schedule', 'name' => 'Schedule'],
        ['path' => '/docs/core/overview/services/triggers', 'name' => 'Triggers'],
        ['path' => '/docs/core/overview/services/validation', 'name' => 'Validation'],

    ]"
/>

## Transactions

The **Transactions** section will guide you through the most important concepts, internals, and services that you need to understand for implementing and using ARK Core v3 Transactions.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/transactions/lifecycle', 'name' => 'Understanding the Lifecycle'],
        ['path' => '/docs/core/transactions/nonce', 'name' => 'Understanding the Nonce'],
    ]"
/>

### Transaction Types

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/transactions/types/overview', 'name' => 'Overview'],
        ['path' => '/docs/core/transactions/types/transfer', 'name' => 'Transfer'],
        ['path' => '/docs/core/transactions/types/second-signature', 'name' => '2nd Signature Registration'],
        ['path' => '/docs/core/transactions/types/delegate-registration', 'name' => 'Delegate Registration'],
        ['path' => '/docs/core/transactions/types/vote-unvote', 'name' => 'Vote / Unvote'],
        ['path' => '/docs/core/transactions/types/multisignature', 'name' => 'Multisignature Registration'],
        ['path' => '/docs/core/transactions/types/ipfs', 'name' => 'Ipfs'],
        ['path' => '/docs/core/transactions/types/multipayment', 'name' => 'Multipayment'],
        ['path' => '/docs/core/transactions/types/delegate-resignation', 'name' => 'Delegate Resignation'],
        ['path' => '/docs/core/transactions/types/htlc', 'name' => 'HTLC'],
        ['path' => '/docs/core/transactions/types/entity', 'name' => 'Entity'],
    ]"
/>

## Installation

The **Installation** section will guide you through configuring and installing ARK Core v3 using Unix and Windows-based environments, including the use of [Docker](https://www.docker.com/).

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/installation/intro', 'name' => 'Introduction'],
        ['path' => '/docs/core/installation/requirements', 'name' => 'Requirements'],
        ['path' => '/docs/core/installation/configuration', 'name' => 'Configuring Core'],
        ['path' => '/docs/core/installation/variables', 'name' => 'Database Variables'],
        ['path' => '/docs/core/installation/script', 'name' => 'Using the Install Script'],
        ['path' => '/docs/core/installation/source', 'name' => 'Installing from Source'],
        ['path' => '/docs/core/installation/docker-unix', 'name' => 'Docker on Linux/macOS'],
        ['path' => '/docs/core/installation/docker-windows', 'name' => 'Docker on Windows'],
    ]"
/>

## Security

The **Security** section will guide you through the most important concepts and service you can use to improve the security of your ARK Core v3 node.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/security/intro', 'name' => 'Security Through Obscurity'],
        ['path' => '/docs/core/security/ssh', 'name' => 'Using SSH'],
        ['path' => '/docs/core/security/updated', 'name' => 'Staying Up-to-Date'],
        ['path' => '/docs/core/security/iptables', 'name' => 'Applying iptables'],
        ['path' => '/docs/core/security/fail2ban', 'name' => 'Installing Fail2Ban'],
        ['path' => '/docs/core/security/knocking', 'name' => 'Setting Up Port Knocking'],
        ['path' => '/docs/core/security/ddos', 'name' => 'Cloudflare DDoS Protection'],
    ]"
/>

## Deployment

The **Deployment** section will guide you through important actions such as the launching and maintaining of your ARK Core v3 node.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/deployment/modes', 'name' => 'Core Run Modes'],
        ['path' => '/docs/core/deployment/cli', 'name' => 'Core CLI Commands'],
        ['path' => '/docs/core/deployment/relay', 'name' => 'Starting a Relay'],
        ['path' => '/docs/core/deployment/forger', 'name' => 'Starting a Forger'],
        ['path' => '/docs/core/deployment/snapshots', 'name' => 'Using Snapshots'],
    ]"
/>

## Development Guides

The **Development Guides** section will guide you, step-by-step, through customizing essential ARK Core v3 plugins and services.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/development/factories', 'name' => 'Creating Factories'],
        ['path' => '/docs/core/development/testnet', 'name' => 'Launching a Testnet'],
        ['path' => '/docs/core/development/explorer', 'name' => 'Launching a Block Explorer'],
        ['path' => '/docs/core/development/core-tester-cli', 'name' => 'Using the Core-Tester-CLI'],
        ['path' => '/docs/core/development/emitters', 'name' => 'Creating Event Emitters'],
        ['path' => '/docs/core/development/api', 'name' => 'Creating API Servers'],
        ['path' => '/docs/core/development/milestones', 'name' => 'Implementing Milestones'],
        ['path' => '/docs/core/development/docker', 'name' => 'Using Docker'],
    ]"
/>

### CLI

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/development/cli/available', 'name' => 'Available Commands'],
        ['path' => '/docs/core/development/cli/create', 'name' => 'Creating Commands'],
    ]"
/>

### dApps

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/development/dapps/intro', 'name' => 'Authoring Core dApps'],
        ['path' => '/docs/core/development/dapps/structure', 'name' => 'Modeling the Structure'],
        ['path' => '/docs/core/development/dapps/module', 'name' => 'Creating a Module'],
    ]"
/>

### Plugins

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/development/plugins/intro', 'name' => 'Authoring Plugins'],
        ['path' => '/docs/core/development/plugins/manage', 'name' => 'Managing Plugins'],
    ]"
/>

### Custom Transactions

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/development/transactions/intro', 'name' => 'Authoring Transaction Types'],
        ['path' => '/docs/core/development/transactions/structure', 'name' => 'Defining the Structure'],
        ['path' => '/docs/core/development/transactions/builder', 'name' => 'Implementing the Builder'],
        ['path' => '/docs/core/development/transactions/handlers', 'name' => 'Implementing the Handler'],
        ['path' => '/docs/core/development/transactions/load', 'name' => 'Loading the dApp'],
        ['path' => '/docs/core/development/transactions/run', 'name' => 'Running the Example'],
    ]"
/>

## Testing

The **Testing** section will introduce you to the most importing tools and knowledge needed to test ARK Core v3 and it's plugins and services.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/testing/intro', 'name' => 'Introduction'],
        ['path' => '/docs/core/testing/sandbox', 'name' => 'Using the Sandbox'],
        ['path' => '/docs/core/testing/plugins', 'name' => 'Testing Plugins'],
        ['path' => '/docs/core/testing/transactions', 'name' => 'Testing Transactions'],
    ]"
/>

## Releases

The **Releases** section provides important ARK Core release and upgrade information.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/2.0', 'name' => '2.0 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/2.0', 'name' => '2.0 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/2.1', 'name' => '2.1 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/2.1', 'name' => '2.1 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/2.2', 'name' => '2.2 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/2.2', 'name' => '2.2 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/2.3', 'name' => '2.3 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/2.3', 'name' => '2.3 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/2.4', 'name' => '2.4 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/2.4', 'name' => '2.4 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/2.5', 'name' => '2.5 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/2.5', 'name' => '2.5 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/2.6', 'name' => '2.6 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/2.6', 'name' => '2.6 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/3.0', 'name' => '3.0 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/3.0', 'name' => '3.0 Upgrade Guide'],
        ['path' => '/docs/core/releases/release/3.0', 'name' => '3.0 Release Guide (Docker)'],
        ['path' => '/docs/core/releases/upgrade/docker/3.0', 'name' => '3.0 Upgrade Guide (Docker)'],
    ]"
/>

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/release/3.8', 'name' => '3.8.2 Release Guide'],
        ['path' => '/docs/core/releases/upgrade/3.8', 'name' => '3.8.2 Upgrade Guide'],
    ]"
/>

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/releases/upgrade/4.0', 'name' => '4.0 Upgrade Guide - Devnet'],
    ]"
/>

## Support

The **Support** section provides resources for solving and reporting issues in ARK Core v3.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/core/support/troubleshooting', 'name' => 'Troubleshooting'],
        ['path' => '/docs/core/support/security', 'name' => 'Security Vulnerabilities'],
        ['path' => 'https://ark.dev/contact', 'name' => 'Contact Us'],
    ]"
/>
