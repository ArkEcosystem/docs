<x-general.sidebar-group path="/docs/exchanges/intro" title="Introduction">
    <x-general.sidebar-link path="/docs/exchanges/intro" name="Introduction" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/exchanges/node-installation/*" title="Core Node Installation">
    <x-general.sidebar-link path="/docs/exchanges/node-installation/hardware-requirements" name="Hardware Requirements" />
    <x-general.sidebar-link path="/docs/exchanges/node-installation/baremetal-instructions" name="BareMetal or VM Install" />
    <x-general.sidebar-link path="/docs/exchanges/node-installation/docker-installation" name="Docker Installation" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/exchanges/json-rpc/*" title="JSON-RPC">
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
</x-general.sidebar-group>

<x-general.sidebar-group :path="[
    '/docs/exchanges/public-api-guide',
    '/docs/exchanges/configuring-rate-limits',
]" title="Public API">
    <x-general.sidebar-link path="/docs/exchanges/public-api-guide" name="Exchanges API Guide" />
    <x-general.sidebar-link path="/docs/exchanges/configuring-rate-limits" name="Configuring Rate Limits" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/exchanges/*" title="Upgrade Guides">
    <x-general.sidebar-link
        path="/docs/exchanges/upgrade"
        name="3.0"
        :children="[
            ['path' => '/docs/exchanges/upgrade/baremetal', 'name' => 'Upgrade to 3.0 - BareMetal or VM Install'],
            ['path' => '/docs/exchanges/upgrade/docker', 'name' => 'Upgrade to 3.0 - Docker Install'],
            ['path' => '/docs/exchanges/upgrade/json-rpc', 'name' => 'Upgrade to 3.0 - JSON-RPC Install'],
        ]"
    />
</x-general.sidebar-group>
