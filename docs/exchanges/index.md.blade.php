<!-- markdownlint-disable MD041 -->
## Introduction
<!-- markdownlint-enable MD041 -->

<x-general.sidebar-link path="/docs/exchanges/intro" name="Introduction" />

## Core Node Installation

<x-general.sidebar-link path="/docs/exchanges/node-installation/hardware-requirements" name="Hardware Requirements" />
<x-general.sidebar-link path="/docs/exchanges/node-installation/baremetal-instructions" name="BareMetal or VM Install" />
<x-general.sidebar-link path="/docs/exchanges/node-installation/docker-installation" name="Docker Installation" />

## JSON-RPC

<x-general.sidebar-link path="/docs/exchanges/json-rpc/getting-started" name="Getting Started" />
<x-general.sidebar-link
    path="/docs/exchanges/json-rpc/endpoints"
    name="Endpoints"
    :children="[
        ['path' => '/docs/exchanges/json-rpc/endpoints/blocks', 'name' => 'Blocks'],
        ['path' => '/docs/exchanges/json-rpc/endpoints/transactions', 'name' => 'Transactions'],
        ['path' => '/docs/exchanges/json-rpc/endpoints/wallets', 'name' => 'Wallets'],
    ]"
/>
<x-general.sidebar-link path="/docs/exchanges/json-rpc/examples"  name="Examples" />

## Public API

<x-general.sidebar-link path="/docs/exchanges/public-api-guide" name="Exchanges API Guide" />
<x-general.sidebar-link path="/docs/exchanges/configuring-rate-limits" name="Configuring Rate Limits" />

## Upgrade Guides

<x-general.sidebar-link
    path="/docs/exchanges/upgrade"
    name="3.0"
    :children="[
        ['path' => '/docs/exchanges/upgrade/baremetal', 'name' => 'Upgrade to 3.0 - BareMetal or VM Install'],
        ['path' => '/docs/exchanges/upgrade/docker', 'name' => 'Upgrade to 3.0 - Docker Install'],
        ['path' => '/docs/exchanges/upgrade/json-rpc', 'name' => 'Upgrade to 3.0 - JSON-RPC Install'],
    ]"
/>
