<x-general.sidebar-group :path="['/docs/desktop-wallet', '/docs/desktop-wallet/intro']" title="Introduction">
    <x-general.sidebar-link path="/docs/desktop-wallet/intro" name="Introduction" />
</x-general.sidebar-group>

<x-general.sidebar-group :path="[
    '/docs/desktop-wallet/user-guides/installation',
    '/docs/desktop-wallet/user-guides/wallet-interface',
    '/docs/desktop-wallet/user-guides/how-to-create-or-import-wallets',
    '/docs/desktop-wallet/user-guides/how-to-add-a-contact',
    '/docs/desktop-wallet/introduction-to-ark-rewards',
    '/docs/desktop-wallet/cryptoasset-integrations',
]" title="Getting Started">
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/installation" name="Installation" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/wallet-interface" name="Wallet Navigation" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/how-to-create-or-import-wallets" name="Create or Import Wallet" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/how-to-add-a-contact" name="Add a Contact" />
    <x-general.sidebar-link path="/docs/desktop-wallet/introduction-to-ark-rewards" name="ARK Rewards (Staking)" />
    <x-general.sidebar-link path="/docs/desktop-wallet/cryptoasset-integrations" name="Cryptoasset Integrations" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/desktop-wallet/user-guides/*" title="Transactions">
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/how-to-send" name="Send ARK Transfer" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/how-to-vote-unvote" name="Vote or Unvote a Delegate" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/how-to-register-or-resign-delegate" name="Register or Resign Delegate" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/how-to-sign-and-verify" name="Sign & Verify Messages" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/how-to-register-second-passphrase" name="Register a Second Passphrase" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/how-to-store-ipfs-hash" name="Store an IPFS Hash" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/transaction-fees" name="Transaction Fees" />
</x-general.sidebar-group>

<x-general.sidebar-group :path="[
    '/docs/desktop-wallet/developer-guides/*',
    '/docs/desktop-wallet/user-guides/security',
]" title="Developer Guides">
    <x-general.sidebar-link path="/docs/desktop-wallet/developer-guides/how-to-build-from-source" name="Build the Wallet from Source" />
    <x-general.sidebar-link path="/docs/desktop-wallet/developer-guides/developing-your-first-plugin" name="Develop a Plugin" />
    <x-general.sidebar-link path="/docs/desktop-wallet/developer-guides/developing-a-wallet-theme" name="Develop a Theme Plugin" />
    <x-general.sidebar-link path="/docs/desktop-wallet/user-guides/security" name="Security" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/desktop-wallet/support/troubleshooting" title="Support">
    <x-general.sidebar-link path="/docs/desktop-wallet/support/troubleshooting" name="Troubleshooting" />
</x-general.sidebar-group>
