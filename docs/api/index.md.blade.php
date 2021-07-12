<!-- markdownlint-disable MD041 -->
## Introduction
<!-- markdownlint-enable MD041 -->

<x-general.sidebar-link path="/docs/api/intro" name="Introduction" />

## Public REST API

<x-general.sidebar-link path="/docs/api/public-rest-api/getting-started" name="Getting Started" />
<x-general.sidebar-link
    path="/docs/api/public-rest-api/endpoints"
    name="Endpoints"
    :children="[
        ['path' => '/docs/api/public-rest-api/endpoints/blockchain', 'name' => 'Blockchain'],
        ['path' => '/docs/api/public-rest-api/endpoints/blocks', 'name' => 'Blocks'],
        ['path' => '/docs/api/public-rest-api/endpoints/delegates', 'name' => 'Delegates'],
        ['path' => '/docs/api/public-rest-api/endpoints/entities', 'name' => 'Entities'],
        ['path' => '/docs/api/public-rest-api/endpoints/node', 'name' => 'Node'],
        ['path' => '/docs/api/public-rest-api/endpoints/peers', 'name' => 'Peers'],
        ['path' => '/docs/api/public-rest-api/endpoints/transactions', 'name' => 'Transactions'],
        ['path' => '/docs/api/public-rest-api/endpoints/votes', 'name' => 'Votes'],
        ['path' => '/docs/api/public-rest-api/endpoints/locks', 'name' => 'Locks'],
        ['path' => '/docs/api/public-rest-api/endpoints/wallets', 'name' => 'Wallets'],
    ]"
/>
<x-general.sidebar-link path="/docs/api/public-rest-api/modify-response" name="Modify response" />
<x-general.sidebar-link path="/docs/api/public-rest-api/troubleshooting" name="Troubleshooting" />

## Webhook API

<x-general.sidebar-link path="/docs/api/webhook-api/getting-started" name="Getting Started" />
<x-general.sidebar-link path="/docs/api/webhook-api/usage" name="Usage" />
<x-general.sidebar-link path="/docs/api/webhook-api/endpoints" name="Endpoints" />

## Manager API

<x-general.sidebar-link path="/docs/api/manager-api/getting-started" name="Getting Started" />
<x-general.sidebar-link
    path="/docs/api/manager-api/endpoints"
    name="Endpoints"
    :children="[
        ['path' => '/docs/api/manager-api/endpoints/configuration', 'name' => 'Configuration'],
        ['path' => '/docs/api/manager-api/endpoints/info', 'name' => 'Info'],
        ['path' => '/docs/api/manager-api/endpoints/log', 'name' => 'Log'],
        ['path' => '/docs/api/manager-api/endpoints/process', 'name' => 'Process'],
        ['path' => '/docs/api/manager-api/endpoints/snapshots', 'name' => 'Snapshots'],
        ['path' => '/docs/api/manager-api/endpoints/watcher', 'name' => 'Watcher'],
    ]"
/>
