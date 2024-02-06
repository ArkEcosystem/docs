---
title: Welcome to ARK Core v3
---

# Welcome to ARK Core v3

## Overview

The **Overview** section will introduce you to the basic concepts surrounding ARK Core v3 development.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/overview/stack', 'name' => 'Technology Stack'],
        ['path' => '/docs/mainsail/overview/directory', 'name' => 'Directory Structure'],
        ['path' => '/docs/mainsail/overview/models', 'name' => 'Data Models'],
        ['path' => '/docs/mainsail/overview/cryptography', 'name' => 'Cryptography'],
    ]"
/>

### Architecture

The **Architecture** section will introduce you to the most important concepts and internals of ARK Core v3.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/overview/architecture/lifecycle', 'name' => 'Application Lifecycle'],
        ['path' => '/docs/mainsail/overview/architecture/container', 'name' => 'Service Container'],
        ['path' => '/docs/mainsail/overview/architecture/provider', 'name' => 'Service Provider'],
        ['path' => '/docs/mainsail/overview/architecture/managers-drivers', 'name' => 'Managers and Drivers'],
        ['path' => '/docs/mainsail/overview/architecture/contracts', 'name' => 'Contracts'],
    ]"
/>

### Services

The **Services** section will introduce you to pre-built services that you will be able to leverage to speed up ARK Core v3 development.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/overview/services/attributes', 'name' => 'Attributes'],
        ['path' => '/docs/mainsail/overview/services/cache', 'name' => 'Cache'],
        ['path' => '/docs/mainsail/overview/services/events', 'name' => 'Events'],
        ['path' => '/docs/mainsail/overview/services/filesystem', 'name' => 'Filesystem'],
        ['path' => '/docs/mainsail/overview/services/logging', 'name' => 'Logging'],
        ['path' => '/docs/mainsail/overview/services/mixins', 'name' => 'Mixins'],
        ['path' => '/docs/mainsail/overview/services/pipeline', 'name' => 'Pipeline'],
        ['path' => '/docs/mainsail/overview/services/queue', 'name' => 'Queue'],
        ['path' => '/docs/mainsail/overview/services/schedule', 'name' => 'Schedule'],
        ['path' => '/docs/mainsail/overview/services/triggers', 'name' => 'Triggers'],
        ['path' => '/docs/mainsail/overview/services/validation', 'name' => 'Validation'],

    ]"
/>

## Transactions

The **Transactions** section will guide you through the most important concepts, internals, and services that you need to understand for implementing and using ARK Core v3 Transactions.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/transactions/lifecycle', 'name' => 'Understanding the Lifecycle'],
        ['path' => '/docs/mainsail/transactions/nonce', 'name' => 'Understanding the Nonce'],
    ]"
/>

### Transaction Types

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/transactions/types/overview', 'name' => 'Overview'],
        ['path' => '/docs/mainsail/transactions/types/transfer', 'name' => 'Transfer'],
        ['path' => '/docs/mainsail/transactions/types/second-signature', 'name' => '2nd Signature Registration'],
        ['path' => '/docs/mainsail/transactions/types/delegate-registration', 'name' => 'Delegate Registration'],
        ['path' => '/docs/mainsail/transactions/types/vote-unvote', 'name' => 'Vote / Unvote'],
        ['path' => '/docs/mainsail/transactions/types/multisignature', 'name' => 'Multisignature Registration'],
        ['path' => '/docs/mainsail/transactions/types/ipfs', 'name' => 'Ipfs'],
        ['path' => '/docs/mainsail/transactions/types/multipayment', 'name' => 'Multipayment'],
        ['path' => '/docs/mainsail/transactions/types/delegate-resignation', 'name' => 'Delegate Resignation'],
        ['path' => '/docs/mainsail/transactions/types/htlc', 'name' => 'HTLC'],
        ['path' => '/docs/mainsail/transactions/types/entity', 'name' => 'Entity'],
    ]"
/>

## Installation

The **Installation** section will guide you through configuring and installing ARK Core v3 using Unix and Windows-based environments, including the use of [Docker](https://www.docker.com/).

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/installation/intro', 'name' => 'Introduction'],
        ['path' => '/docs/mainsail/installation/requirements', 'name' => 'Requirements'],
        ['path' => '/docs/mainsail/installation/configuration', 'name' => 'Configuring Core'],
        ['path' => '/docs/mainsail/installation/variables', 'name' => 'Database Variables'],
        ['path' => '/docs/mainsail/installation/script', 'name' => 'Using the Install Script'],
        ['path' => '/docs/mainsail/installation/source', 'name' => 'Installing from Source'],
        ['path' => '/docs/mainsail/installation/docker-unix', 'name' => 'Docker on Linux/macOS'],
        ['path' => '/docs/mainsail/installation/docker-windows', 'name' => 'Docker on Windows'],
    ]"
/>

## Security

The **Security** section will guide you through the most important concepts and service you can use to improve the security of your ARK Core v3 node.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/security/intro', 'name' => 'Security Through Obscurity'],
        ['path' => '/docs/mainsail/security/ssh', 'name' => 'Using SSH'],
        ['path' => '/docs/mainsail/security/updated', 'name' => 'Staying Up-to-Date'],
        ['path' => '/docs/mainsail/security/iptables', 'name' => 'Applying iptables'],
        ['path' => '/docs/mainsail/security/fail2ban', 'name' => 'Installing Fail2Ban'],
        ['path' => '/docs/mainsail/security/knocking', 'name' => 'Setting Up Port Knocking'],
        ['path' => '/docs/mainsail/security/ddos', 'name' => 'Cloudflare DDoS Protection'],
    ]"
/>

## Deployment

The **Deployment** section will guide you through important actions such as the launching and maintaining of your ARK Core v3 node.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/deployment/modes', 'name' => 'Core Run Modes'],
        ['path' => '/docs/mainsail/deployment/cli', 'name' => 'Core CLI Commands'],
        ['path' => '/docs/mainsail/deployment/relay', 'name' => 'Starting a Relay'],
        ['path' => '/docs/mainsail/deployment/forger', 'name' => 'Starting a Forger'],
        ['path' => '/docs/mainsail/deployment/snapshots', 'name' => 'Using Snapshots'],
    ]"
/>

## Development Guides

The **Development Guides** section will guide you, step-by-step, through customizing essential ARK Core v3 plugins and services.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/development/factories', 'name' => 'Creating Factories'],
        ['path' => '/docs/mainsail/development/testnet', 'name' => 'Launching a Testnet'],
        ['path' => '/docs/mainsail/development/explorer', 'name' => 'Launching a Block Explorer'],
        ['path' => '/docs/mainsail/development/core-tester-cli', 'name' => 'Using the Core-Tester-CLI'],
        ['path' => '/docs/mainsail/development/emitters', 'name' => 'Creating Event Emitters'],
        ['path' => '/docs/mainsail/development/api', 'name' => 'Creating API Servers'],
        ['path' => '/docs/mainsail/development/milestones', 'name' => 'Implementing Milestones'],
        ['path' => '/docs/mainsail/development/docker', 'name' => 'Using Docker'],
    ]"
/>

### CLI

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/development/cli/available', 'name' => 'Available Commands'],
        ['path' => '/docs/mainsail/development/cli/create', 'name' => 'Creating Commands'],
    ]"
/>

### dApps

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/development/dapps/intro', 'name' => 'Authoring Core dApps'],
        ['path' => '/docs/mainsail/development/dapps/structure', 'name' => 'Modeling the Structure'],
        ['path' => '/docs/mainsail/development/dapps/module', 'name' => 'Creating a Module'],
    ]"
/>

### Plugins

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/development/plugins/intro', 'name' => 'Authoring Plugins'],
        ['path' => '/docs/mainsail/development/plugins/manage', 'name' => 'Managing Plugins'],
    ]"
/>

### Custom Transactions

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/development/transactions/intro', 'name' => 'Authoring Transaction Types'],
        ['path' => '/docs/mainsail/development/transactions/structure', 'name' => 'Defining the Structure'],
        ['path' => '/docs/mainsail/development/transactions/builder', 'name' => 'Implementing the Builder'],
        ['path' => '/docs/mainsail/development/transactions/handlers', 'name' => 'Implementing the Handler'],
        ['path' => '/docs/mainsail/development/transactions/load', 'name' => 'Loading the dApp'],
        ['path' => '/docs/mainsail/development/transactions/run', 'name' => 'Running the Example'],
    ]"
/>

## Testing

The **Testing** section will introduce you to the most importing tools and knowledge needed to test ARK Core v3 and it's plugins and services.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/testing/intro', 'name' => 'Introduction'],
        ['path' => '/docs/mainsail/testing/sandbox', 'name' => 'Using the Sandbox'],
        ['path' => '/docs/mainsail/testing/plugins', 'name' => 'Testing Plugins'],
        ['path' => '/docs/mainsail/testing/transactions', 'name' => 'Testing Transactions'],
    ]"
/>

## Releases

The **Releases** section provides important ARK Core release and upgrade information.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/2.0', 'name' => '2.0 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/2.0', 'name' => '2.0 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/2.1', 'name' => '2.1 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/2.1', 'name' => '2.1 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/2.2', 'name' => '2.2 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/2.2', 'name' => '2.2 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/2.3', 'name' => '2.3 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/2.3', 'name' => '2.3 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/2.4', 'name' => '2.4 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/2.4', 'name' => '2.4 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/2.5', 'name' => '2.5 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/2.5', 'name' => '2.5 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/2.6', 'name' => '2.6 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/2.6', 'name' => '2.6 Upgrade Guide'],
    ]"
/>
<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/3.0', 'name' => '3.0 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/3.0', 'name' => '3.0 Upgrade Guide'],
        ['path' => '/docs/mainsail/releases/release/3.0', 'name' => '3.0 Release Guide (Docker)'],
        ['path' => '/docs/mainsail/releases/upgrade/docker/3.0', 'name' => '3.0 Upgrade Guide (Docker)'],
    ]"
/>

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/release/3.8', 'name' => '3.8.2 Release Guide'],
        ['path' => '/docs/mainsail/releases/upgrade/3.8', 'name' => '3.8.2 Upgrade Guide'],
    ]"
/>

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/releases/upgrade/4.0', 'name' => '4.0 Upgrade Guide - Devnet'],
    ]"
/>

## Support

The **Support** section provides resources for solving and reporting issues in ARK Core v3.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/support/troubleshooting', 'name' => 'Troubleshooting'],
        ['path' => '/docs/mainsail/support/security', 'name' => 'Security Vulnerabilities'],
        ['path' => 'https://ark.dev/contact', 'name' => 'Contact Us'],
    ]"
/>
