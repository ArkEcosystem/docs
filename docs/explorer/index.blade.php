<x-general.sidebar-group :path="[
    '/docs/explorer',
    '/docs/explorer/intro',
    '/docs/explorer/features',
]" title="Introduction">
    <x-general.sidebar-link path="/docs/explorer/intro" name="Welcome" />
    <x-general.sidebar-link path="/docs/explorer/features" name="Features" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/explorer/setup/*" title="Setup">
    <x-general.sidebar-link path="/docs/explorer/setup/core" name="Core" />
    <x-general.sidebar-link path="/docs/explorer/setup/development" name="Development" />
    <x-general.sidebar-link path="/docs/explorer/setup/docker" name="Docker" />
    <x-general.sidebar-link path="/docs/explorer/setup/production" name="Production" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/explorer/faqs" title="Troubleshooting">
    <x-general.sidebar-link path="/docs/explorer/faqs" name="FAQs" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/explorer/archived/*" title="Old Explorer">
    <x-general.sidebar-link path="/docs/explorer/archived/using" name="Usage" />
    <x-general.sidebar-link path="/docs/explorer/archived/running" name="Deployment" />
    <x-general.sidebar-link path="/docs/explorer/archived/branding" name="Custom Branding" />
    <x-general.sidebar-link path="/docs/explorer/archived/transactions" name="Transaction Types" />
</x-general.sidebar-group>
