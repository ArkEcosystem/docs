<x-ark-docs-sidebar-group first :path="['/docs/mainsail/intro', '/docs/mainsail']" title="Introduction" borderless>
    <x-ark-docs-sidebar-link path="/docs/mainsail/intro" name="Welcome to Mainsail" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/mainsail/overview/*" title="Overview">
    <x-ark-docs-sidebar-link path="/docs/mainsail/overview/stack" name="Technology Stack" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/overview/directory" name="Directory Structure" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/overview/models" name="Data Models" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/overview/cryptography" name="Cryptography" />
    <x-ark-docs-sidebar-link
        path="/docs/mainsail/overview/architecture"
        name="Architecture"
        :children="[
            ['path' => '/docs/mainsail/overview/architecture/lifecycle', 'name' => 'Application Lifecycle'],
            ['path' => '/docs/mainsail/overview/architecture/container', 'name' => 'Service Container'],
            ['path' => '/docs/mainsail/overview/architecture/provider', 'name' => 'Service Provider'],
            ['path' => '/docs/mainsail/overview/architecture/managers-drivers', 'name' => 'Managers and Drivers'],
            ['path' => '/docs/mainsail/overview/architecture/contracts', 'name' => 'Contracts'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/mainsail/overview/services"
        name="Services"
        :children="[
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
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/mainsail/transactions/*" title="Transactions">
    <x-ark-docs-sidebar-link path="/docs/mainsail/transactions/lifecycle" name="Understanding the Lifecycle" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/transactions/nonce" name="Understanding the Nonce" />
    <x-ark-docs-sidebar-link
        path="/docs/mainsail/transactions/types"
        name="Transaction Types"
        :children="[
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
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/mainsail/installation/*" title="Installation">
    <x-ark-docs-sidebar-link path="/docs/mainsail/installation/intro" name="Introduction" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/installation/requirements" name="Requirements" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/installation/configuration" name="Configuring Mainsail" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/installation/variables" name="Environment Variables" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/installation/script" name="Using the Install Script" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/installation/source" name="Installing from Source" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/installation/docker-unix" name="Docker on Linux/macOS" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/mainsail/security/*" title="Security">
    <x-ark-docs-sidebar-link path="/docs/mainsail/security/intro" name="Security Through Obscurity" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/security/ssh" name="Using SSH" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/security/updated" name="Staying Up-to-Date" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/security/iptables" name="Applying iptables" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/security/fail2ban" name="Installing Fail2Ban" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/security/knocking" name="Setting Up Port Knocking" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/security/ddos" name="Cloudflare DDoS Protection" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/mainsail/deployment/*" title="Deployment">
    <x-ark-docs-sidebar-link path="/docs/mainsail/deployment/modes" name="Core Run Modes" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/deployment/cli" name="Mainsail CLI Commands" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/deployment/cli-api" name="Mainsail API CLI Commands" />
    <x-ark-docs-sidebar-link path="/docs/mainsail/deployment/forger" name="Starting a Forger" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/mainsail/testing/*" title="Testing">
    <x-ark-docs-sidebar-link path="/docs/mainsail/testing/intro" name="Introduction" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/mainsail/support/*" title="Support">
    <x-ark-docs-sidebar-link path="/docs/mainsail/support/troubleshooting" name="Troubleshooting" />
    <x-ark-docs-sidebar-link path="https://ark.dev/contact" name="Contact Us" />
</x-ark-docs-sidebar-group>
