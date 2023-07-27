<x-ark-docs-sidebar-group first :path="['/docs/core/intro', '/docs/core']" title="Introduction" borderless>
    <x-ark-docs-sidebar-link path="/docs/core/intro" name="Welcome to ARK Core v3" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/overview/*" title="Overview">
    <x-ark-docs-sidebar-link path="/docs/core/overview/stack" name="Technology Stack" />
    <x-ark-docs-sidebar-link path="/docs/core/overview/directory" name="Directory Structure" />
    <x-ark-docs-sidebar-link path="/docs/core/overview/models" name="Data Models" />
    <x-ark-docs-sidebar-link path="/docs/core/overview/cryptography" name="Cryptography" />
    <x-ark-docs-sidebar-link
        path="/docs/core/overview/architecture"
        name="Architecture"
        :children="[
            ['path' => '/docs/core/overview/architecture/lifecycle', 'name' => 'Application Lifecycle'],
            ['path' => '/docs/core/overview/architecture/container', 'name' => 'Service Container'],
            ['path' => '/docs/core/overview/architecture/provider', 'name' => 'Service Provider'],
            ['path' => '/docs/core/overview/architecture/managers-drivers', 'name' => 'Managers and Drivers'],
            ['path' => '/docs/core/overview/architecture/contracts', 'name' => 'Contracts'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/overview/services"
        name="Services"
        :children="[
            ['path' => '/docs/core/overview/services/attributes', 'name' => 'Attributes'],
            ['path' => '/docs/core/overview/services/cache', 'name' => 'Cache'],
            ['path' => '/docs/core/overview/services/events', 'name' => 'Events'],
            ['path' => '/docs/core/overview/services/filesystem', 'name' => 'Filesystem'],
            ['path' => '/docs/core/overview/services/logging', 'name' => 'Logging'],
            ['path' => '/docs/core/overview/services/mixins', 'name' => 'Mixins'],
            ['path' => '/docs/core/overview/services/pipeline', 'name' => 'Pipeline'],
            ['path' => '/docs/core/overview/services/queue', 'name' => 'Queue'],
            ['path' => '/docs/core/overview/services/schedule', 'name' => 'Schedule'],
            ['path' => '/docs/core/overview/services/triggers', 'name' => 'Triggers'],
            ['path' => '/docs/core/overview/services/validation', 'name' => 'Validation'],
        ]"
    />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/transactions/*" title="Transactions">
    <x-ark-docs-sidebar-link path="/docs/core/transactions/lifecycle" name="Understanding the Lifecycle" />
    <x-ark-docs-sidebar-link path="/docs/core/transactions/nonce" name="Understanding the Nonce" />
    <x-ark-docs-sidebar-link
        path="/docs/core/transactions/types"
        name="Transaction Types"
        :children="[
            ['path' => '/docs/core/transactions/types/overview', 'name' => 'Overview'],
            ['path' => '/docs/core/transactions/types/transfer', 'name' => 'Transfer'],
            ['path' => '/docs/core/transactions/types/second-signature', 'name' => '2nd Signature Registration'],
            ['path' => '/docs/core/transactions/types/delegate-registration', 'name' => 'Delegate Registration'],
            ['path' => '/docs/core/transactions/types/vote-unvote', 'name' => 'Vote / Unvote'],
            ['path' => '/docs/core/transactions/types/multisignature', 'name' => 'Multisignature Registration'],
            ['path' => '/docs/core/transactions/types/ipfs', 'name' => 'Ipfs'],
            ['path' => '/docs/core/transactions/types/multipayment', 'name' => 'Multipayment'],
            ['path' => '/docs/core/transactions/types/delegate-resignation', 'name' => 'Delegate Resignation'],
            ['path' => '/docs/core/transactions/types/htlc', 'name' => 'HTLC'],
            ['path' => '/docs/core/transactions/types/entity', 'name' => 'Entity'],
        ]"
    />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/installation/*" title="Installation">
    <x-ark-docs-sidebar-link path="/docs/core/installation/intro" name="Introduction" />
    <x-ark-docs-sidebar-link path="/docs/core/installation/requirements" name="Requirements" />
    <x-ark-docs-sidebar-link path="/docs/core/installation/configuration" name="Configuring Core" />
    <x-ark-docs-sidebar-link path="/docs/core/installation/variables" name="Environment Variables" />
    <x-ark-docs-sidebar-link path="/docs/core/installation/script" name="Using the Install Script" />
    <x-ark-docs-sidebar-link path="/docs/core/installation/source" name="Installing from Source" />
    <x-ark-docs-sidebar-link path="/docs/core/installation/docker-unix" name="Docker on Linux/macOS" />
    <x-ark-docs-sidebar-link path="/docs/core/installation/docker-windows" name="Docker on Windows" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/security/*" title="Security">
    <x-ark-docs-sidebar-link path="/docs/core/security/intro" name="Security Through Obscurity" />
    <x-ark-docs-sidebar-link path="/docs/core/security/ssh" name="Using SSH" />
    <x-ark-docs-sidebar-link path="/docs/core/security/updated" name="Staying Up-to-Date" />
    <x-ark-docs-sidebar-link path="/docs/core/security/iptables" name="Applying iptables" />
    <x-ark-docs-sidebar-link path="/docs/core/security/fail2ban" name="Installing Fail2Ban" />
    <x-ark-docs-sidebar-link path="/docs/core/security/knocking" name="Setting Up Port Knocking" />
    <x-ark-docs-sidebar-link path="/docs/core/security/ddos" name="Cloudflare DDoS Protection" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/deployment/*" title="Deployment">
    <x-ark-docs-sidebar-link path="/docs/core/deployment/modes" name="Core Run Modes" />
    <x-ark-docs-sidebar-link path="/docs/core/deployment/cli" name="Core CLI Commands" />
    <x-ark-docs-sidebar-link path="/docs/core/deployment/relay" name="Starting a Relay" />
    <x-ark-docs-sidebar-link path="/docs/core/deployment/forger" name="Starting a Forger" />
    <x-ark-docs-sidebar-link path="/docs/core/deployment/snapshots" name="Using Snapshots" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/development/*" title="Development Guides">
    <x-ark-docs-sidebar-link path="/docs/core/development/factories" name="Creating Factories" />
    <x-ark-docs-sidebar-link path="/docs/core/development/testnet" name="Launching a Testnet" />
    <x-ark-docs-sidebar-link path="/docs/core/development/explorer" name="Launching a Block Explorer" />
    <x-ark-docs-sidebar-link path="/docs/core/development/core-tester-cli" name="Using the Core-Tester-CLI" />
    <x-ark-docs-sidebar-link path="/docs/core/development/emitters" name="Creating Event Emitters" />
    <x-ark-docs-sidebar-link path="/docs/core/development/api" name="Creating API Servers" />
    <x-ark-docs-sidebar-link path="/docs/core/development/milestones" name="Implementing Milestones" />
    <x-ark-docs-sidebar-link path="/docs/core/development/docker" name="Using Docker" />
    <x-ark-docs-sidebar-link
        path="/docs/core/development/cli"
        name="Core CLI"
        :children="[
            ['path' => '/docs/core/development/cli/available', 'name' => 'Available Commands'],
            ['path' => '/docs/core/development/cli/create', 'name' => 'Creating Commands'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/development/dapps"
        name="dApps"
        :children="[
            ['path' => '/docs/core/development/dapps/intro', 'name' => 'Authoring Core dApps'],
            ['path' => '/docs/core/development/dapps/structure', 'name' => 'Modeling the Structure'],
            ['path' => '/docs/core/development/dapps/module', 'name' => 'Creating a Module'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/development/plugins"
        name="Plugins"
        :children="[
            ['path' => '/docs/core/development/plugins/intro', 'name' => 'Authoring Plugins'],
            ['path' => '/docs/core/development/plugins/manage', 'name' => 'Managing Plugins'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/development/transactions"
        name="Custom Transactions"
        :children="[
            ['path' => '/docs/core/development/transactions/intro', 'name' => 'Authoring Transaction Types'],
            ['path' => '/docs/core/development/transactions/structure', 'name' => 'Defining the Structure'],
            ['path' => '/docs/core/development/transactions/builder', 'name' => 'Implementing the Builder'],
            ['path' => '/docs/core/development/transactions/handlers', 'name' => 'Implementing the Handler'],
            ['path' => '/docs/core/development/transactions/load', 'name' => 'Loading the dApp'],
            ['path' => '/docs/core/development/transactions/run', 'name' => 'Running the Example'],
        ]"
    />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/testing/*" title="Testing">
    <x-ark-docs-sidebar-link path="/docs/core/testing/intro" name="Introduction" />
    <x-ark-docs-sidebar-link path="/docs/core/testing/sandbox" name="Using the Sandbox" />
    <x-ark-docs-sidebar-link path="/docs/core/testing/plugins" name="Testing Plugins" />
    <x-ark-docs-sidebar-link path="/docs/core/testing/transactions" name="Testing Transactions" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/releases/*" title="Releases">
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="2.0"
        :children="[
            ['path' => '/docs/core/releases/release/2.0', 'name' => '2.0 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/2.0', 'name' => '2.0 Upgrade Guide'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="2.1"
        :children="[
            ['path' => '/docs/core/releases/release/2.1', 'name' => '2.1 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/2.1', 'name' => '2.1 Upgrade Guide'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="2.2"
        :children="[
            ['path' => '/docs/core/releases/release/2.2', 'name' => '2.2 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/2.2', 'name' => '2.2 Upgrade Guide'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="2.3"
        :children="[
            ['path' => '/docs/core/releases/release/2.3', 'name' => '2.3 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/2.3', 'name' => '2.3 Upgrade Guide'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="2.4"
        :children="[
            ['path' => '/docs/core/releases/release/2.4', 'name' => '2.4 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/2.4', 'name' => '2.4 Upgrade Guide'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="2.5"
        :children="[
            ['path' => '/docs/core/releases/release/2.5', 'name' => '2.5 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/2.5', 'name' => '2.5 Upgrade Guide'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="2.6"
        :children="[
            ['path' => '/docs/core/releases/release/2.6', 'name' => '2.6 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/2.6', 'name' => '2.6 Upgrade Guide'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="3.0"
        :children="[
            ['path' => '/docs/core/releases/release/3.0', 'name' => '3.0 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/3.0', 'name' => '3.0 Upgrade Guide'],
            ['path' => '/docs/core/releases/upgrade/docker/3.0', 'name' => '3.0 Upgrade Guide (Docker)'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="3.8.2"
        :children="[
            ['path' => '/docs/core/releases/release/3.8', 'name' => '3.8.2 Release Guide'],
            ['path' => '/docs/core/releases/upgrade/3.8', 'name' => '3.8.2 Upgrade Guide'],
        ]"
    />
    <x-ark-docs-sidebar-link
        path="/docs/core/releases"
        name="4.0 (Development)"
        :children="[
            ['path' => '/docs/core/releases/upgrade/4.0', 'name' => '4.0 Upgrade Guide - Devnet'],
        ]"
    />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/core/support/*" title="Support">
    <x-ark-docs-sidebar-link path="/docs/core/support/troubleshooting" name="Troubleshooting" />
    <x-ark-docs-sidebar-link path="/docs/core/support/security" name="Security Vulnerabilities" />
    <x-ark-docs-sidebar-link path="https://ark.dev/contact" name="Contact Us" />
</x-ark-docs-sidebar-group>
