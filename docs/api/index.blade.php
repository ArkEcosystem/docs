<x-ark-docs-sidebar-link first top-level path="/docs/api/intro" name="Introduction" />

<x-ark-docs-sidebar-group path="/docs/api/public-rest-api/*" title="Public REST API">
    <x-ark-docs-sidebar-link path="/docs/api/public-rest-api/getting-started" name="Getting Started" />
    <x-ark-docs-sidebar-link
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
    <x-ark-docs-sidebar-link path="/docs/api/public-rest-api/modify-response" name="Modify response" />
    <x-ark-docs-sidebar-link path="/docs/api/public-rest-api/troubleshooting" name="Troubleshooting" />
</x-ark-docs-sidebar-group>


<x-ark-docs-sidebar-group path="/docs/api/webhook-api/*" title="Webhook API">
    <x-ark-docs-sidebar-link path="/docs/api/webhook-api/getting-started" name="Getting Started" />
    <x-ark-docs-sidebar-link path="/docs/api/webhook-api/usage" name="Usage" />
    <x-ark-docs-sidebar-link path="/docs/api/webhook-api/endpoints" name="Endpoints" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/api/manager-api/*" title="Manager API">
    <x-ark-docs-sidebar-link path="/docs/api/manager-api/getting-started" name="Getting Started" />
    <x-ark-docs-sidebar-link
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
</x-ark-docs-sidebar-group>
