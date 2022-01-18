<!-- markdownlint-disable MD041 -->
## Introduction
<!-- markdownlint-enable MD041 -->

<x-general.sidebar-link path="/docs/nodem/intro" name="Welcome to Nodem" />

## Overview

<x-general.sidebar-link path="/docs/nodem/overview/nodem" name="Nodem Overview" />
<x-general.sidebar-link path="/docs/nodem/overview/stack" name="Technology Stack" />

## Getting Started

<x-general.sidebar-link path="/docs/nodem/getting-started/requirements" name="Requirements" />
<x-general.sidebar-link
    path="/docs/nodem/getting-started/"
    name="Nodem Setup"
    :children="[
        ['path' => '/docs/nodem/getting-started/development', 'name' => 'Development'],
        ['path' => '/docs/nodem/getting-started/production', 'name' => 'Production'],
    ]"
/>
<x-general.sidebar-link path="/docs/nodem/getting-started/core" name="Core Configuration" />

## Accounts

<x-general.sidebar-link path="/docs/nodem/accounts/setup" name="First-Time Setup" />
<x-general.sidebar-link path="/docs/nodem/accounts/settings" name="Settings" />

## Teams

<x-general.sidebar-link path="/docs/nodem/teams/inviting" name="Inviting Members" />
<x-general.sidebar-link path="/docs/nodem/teams/managing" name="Managing Members" />

## Servers

<x-general.sidebar-link path="/docs/nodem/servers/management" name="Management" />
<x-general.sidebar-link path="/docs/nodem/servers/providers" name="Supported Providers" />

## Support

<x-general.sidebar-link path="/docs/nodem/support/troubleshooting" name="Troubleshooting" />
<x-general.sidebar-link path="/docs/nodem/support/security" name="Security" />
<x-general.sidebar-link path="https://ark.dev/contact" name="Contact Us" />
