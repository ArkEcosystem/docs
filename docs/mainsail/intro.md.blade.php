---
title: Welcome to Mainsail
---

# Welcome to Mainsail

## Overview

The **Overview** section will introduce you to the basic concepts surrounding Mainsail development.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/overview/stack', 'name' => 'Technology Stack'],
        ['path' => '/docs/mainsail/overview/directory', 'name' => 'Directory Structure'],
        ['path' => '/docs/mainsail/overview/models', 'name' => 'Data Models'],
        ['path' => '/docs/mainsail/overview/cryptography', 'name' => 'Cryptography'],
    ]"
/>

### Architecture

The **Architecture** section will introduce you to the most important concepts and internals of Mainsail.

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

The **Services** section will introduce you to pre-built services that you will be able to leverage to speed up Mainsail development.

<x-ark-link-collection
    :links="[
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

The **Transactions** section will guide you through the most important concepts, internals, and services that you need to understand for implementing and using Mainsail Transactions.

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
        ['path' => '/docs/mainsail/transactions/types/validator-registration', 'name' => 'Validator Registration'],
        ['path' => '/docs/mainsail/transactions/types/validator-resignation', 'name' => 'Validator Resignation'],
        ['path' => '/docs/mainsail/transactions/types/username-registration', 'name' => 'Username Registration'],
        ['path' => '/docs/mainsail/transactions/types/username-resignation', 'name' => 'Username Resignation'],
        ['path' => '/docs/mainsail/transactions/types/vote-unvote', 'name' => 'Vote / Unvote'],
        ['path' => '/docs/mainsail/transactions/types/multisignature', 'name' => 'Multisignature Registration'],
        ['path' => '/docs/mainsail/transactions/types/multipayment', 'name' => 'Multipayment'],
    ]"
/>

## Installation

The **Installation** section will guide you through configuring and installing Mainsail using Unix and Windows-based environments, including the use of [Docker](https://www.docker.com/).

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/installation/intro', 'name' => 'Introduction'],
        ['path' => '/docs/mainsail/installation/requirements', 'name' => 'Requirements'],
        ['path' => '/docs/mainsail/installation/configuration', 'name' => 'Configuring Mainsail'],
        ['path' => '/docs/mainsail/installation/variables', 'name' => 'Database Variables'],
        ['path' => '/docs/mainsail/installation/script', 'name' => 'Using the Install Script'],
        ['path' => '/docs/mainsail/installation/source', 'name' => 'Installing from Source'],
        ['path' => '/docs/mainsail/installation/docker-unix', 'name' => 'Docker on Linux/macOS'],
    ]"
/>

## Security

The **Security** section will guide you through the most important concepts and service you can use to improve the security of your Mainsail node.

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

The **Deployment** section will guide you through important actions such as the launching and maintaining of your Mainsail node.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/deployment/cli', 'name' => 'Mainsail CLI Commands'],
        ['path' => '/docs/mainsail/deployment/cli-api', 'name' => 'Mainsail API CLI Commands'],
    ]"
/>

## Testing

The **Testing** section will introduce you to the most importing tools and knowledge needed to test Mainsail and it's plugins and services.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/testing/intro', 'name' => 'Introduction'],
    ]"
/>

## Support

The **Support** section provides resources for solving and reporting issues in Mainsail.

<x-ark-link-collection
    :links="[
        ['path' => '/docs/mainsail/support/troubleshooting', 'name' => 'Troubleshooting'],
        ['path' => 'https://ark.dev/contact', 'name' => 'Contact Us'],
    ]"
/>
