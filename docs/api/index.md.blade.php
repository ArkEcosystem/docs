## Introduction

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
        ['path' => '/docs/api/public-rest-api/endpoints/node', 'name' => 'Node'],
        ['path' => '/docs/api/public-rest-api/endpoints/peers', 'name' => 'Peers'],
        ['path' => '/docs/api/public-rest-api/endpoints/transactions', 'name' => 'Transactions'],
        ['path' => '/docs/api/public-rest-api/endpoints/votes', 'name' => 'Votes'],
        ['path' => '/docs/api/public-rest-api/endpoints/wallets', 'name' => 'Wallets'],
    ]"
/>
<x-general.sidebar-link path="/docs/api/public-rest-api/troubleshooting" name="Troubleshooting" />

## Webhook API

<x-general.sidebar-link path="/docs/api/webhook-api/getting-started" name="Getting Started" />
<x-general.sidebar-link path="/docs/api/webhook-api/usage" name="Usage" />
<x-general.sidebar-link path="/docs/api/webhook-api/endpoints" name="Endpoints" />

## Elasticsearch API

<x-general.sidebar-link path="/docs/api/elasticsearch-api/getting-started" name="Getting Started" />
<x-general.sidebar-link path="/docs/api/elasticsearch-api/endpoints" name="Endpoints" />

## Crypto JSON-RPC

<x-general.sidebar-link path="/docs/api/crypto-json-rpc/getting-started" name="Getting Started" />
<x-general.sidebar-link
    path="/docs/api/crypto-json-rpc/endpoints/intro"
    name="Endpoints"
    :children="[
        ['path' => '/docs/api/crypto-json-rpc/endpoints/identities', 'name' => 'Identities'],
        ['path' => '/docs/api/crypto-json-rpc/endpoints/transactions', 'name' => 'Transactions'],
    ]"
/>
