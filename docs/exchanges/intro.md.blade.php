---
title: Introduction
---

# Introduction

This section is tailored for institutional/production usage of ARK Core. Most exchanges and third-party services are familiar with `Bitcoind-RPC` when listing or adding a new cryptocurrency. Since ARK is a custom blockchain, some companies have had difficulty navigating through our GitHub and integrating ARK into their platform.

The two most popular means of accessing the ARK blockchain are via the `Public API` and the `JSON-RPC`. Though the [JSON-RPC](/docs/exchanges/json-rpc/getting-started#usage-instructions) is the recommended approach, we include instructions here on how to accomplish the most common tasks on both API surfaces.

We have added "quick guides" to walk you through the process of interacting with the ARK blockchain in each API.

Use the sidebar to navigate this section, or follow the links below:

<livewire:page-reference path="/docs/exchanges/node-installation/baremetal-instructions" />

<livewire:page-reference path="/docs/exchanges/node-installation/docker-installation" />

<livewire:page-reference path="/docs/exchanges/json-rpc/getting-started" />

<livewire:page-reference path="/docs/exchanges/json-rpc/examples" />

<livewire:page-reference path="/docs/exchanges/json-rpc/endpoints/intro" />

<livewire:page-reference path="/docs/exchanges/public-api-guide" />

## Upgrade Guides

<x-link-collection
    :links="[
        ['path' => '/docs/exchanges/upgrade/baremetal', 'name' => 'Upgrade to 3.0 - BareMetal or VM Install'],
        ['path' => '/docs/exchanges/upgrade/docker', 'name' => 'Upgrade to 3.0 - Docker Install'],
        ['path' => '/docs/exchanges/upgrade/json-rpc', 'name' => 'Upgrade to 3.0 - JSON-RPC Install'],
    ]"
/>
