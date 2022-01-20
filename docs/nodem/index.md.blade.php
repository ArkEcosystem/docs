<!-- markdownlint-disable MD041 -->
## Introduction
<!-- markdownlint-enable MD041 -->

<x-general.sidebar-link path="/docs/nodem/intro" name="Welcome to Nodem" />

## Overview

<x-general.sidebar-link path="/docs/nodem/overview/features" name="Features" />
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

## Using Nodem

<x-general.sidebar-link path="/docs/nodem/usage/management" name="Server Management" />
<x-general.sidebar-link
    path="/docs/nodem/usage/"
    name="Accounts"
    :children="[
        ['path' => '/docs/nodem/usage/setup', 'name' => 'First-Time Setup'],
        ['path' => '/docs/nodem/usage/settings', 'name' => 'Settings'],
    ]"
/>
<x-general.sidebar-link
    path="/docs/nodem/usage/"
    name="Teams"
    :children="[
        ['path' => '/docs/nodem/usage/inviting', 'name' => 'Inviting Members'],
        ['path' => '/docs/nodem/usage/managing', 'name' => 'Managing Members'],
    ]"
/>

## Support

<x-general.sidebar-link path="/docs/nodem/support/troubleshooting" name="Troubleshooting" />
<x-general.sidebar-link path="/docs/nodem/support/security" name="Security" />
<x-general.sidebar-link path="https://ark.dev/contact" name="Contact Us" />
