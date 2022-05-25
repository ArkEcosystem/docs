<x-ark-docs-sidebar-link first top-level path="/docs/marketsquare/intro" name="Welcome to MarketSquare" />

<x-ark-docs-sidebar-group path="/docs/marketsquare/overview/*" title="Overview">
    <x-ark-docs-sidebar-link path="/docs/marketsquare/overview/home-page" name="The Home Page" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/overview/marketsquare-hubs" name="MarketSquare Hubs" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/marketsquare/getting-started/*" title="Getting Started">
    <x-ark-docs-sidebar-link path="/docs/marketsquare/getting-started/account-sign-up" name="Account Sign Up" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/getting-started/what-next" name="What Can I Do Next?" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/marketsquare/profiles/*" title="Profiles">
    <x-ark-docs-sidebar-link path="/docs/marketsquare/profiles/updating-profile" name="Updating My Profile" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/profiles/reporting-profiles" name="Reporting Profiles" />
    <x-ark-docs-sidebar-link
        path="/docs/marketsquare/profiles/settings"
        name="Settings"
        :children="[
            ['path' => '/docs/marketsquare/profiles/settings/profile', 'name' => 'Profile'],
            ['path' => '/docs/marketsquare/profiles/settings/security', 'name' => 'Security'],
        ]"
    />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/marketsquare/projects/*" title="Projects">
    <x-ark-docs-sidebar-link path="/docs/marketsquare/projects/creating-projects" name="Project Creation" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/projects/claim" name="Claiming a Project" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/projects/updating-projects" name="Updating Projects" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/projects/removing-projects" name="Removing a Project" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/projects/reporting-projects" name="Reporting Projects" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/marketsquare/teams/*" title="Teams">
    <x-ark-docs-sidebar-link path="/docs/marketsquare/teams/inviting-members" name="Inviting Team Members" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/teams/managing-members" name="Managing Team Members" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/marketsquare/reviews/*" title="Reviews">
    <x-ark-docs-sidebar-link path="/docs/marketsquare/reviews/writing-reviews" name="Writing Reviews" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/reviews/my-reviews" name="My Reviews" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/reviews/ratings-karma" name="Ratings & Karma" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/reviews/reporting-reviews" name="Reporting Reviews" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/marketsquare/notifications/*" title="Notifications">
    <x-ark-docs-sidebar-link path="/docs/marketsquare/notifications/handling-notifications" name="Notification Handling" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/notifications/hub-announcements" name="Hub Announcements" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/marketsquare/support/*" title="Support">
    <x-ark-docs-sidebar-link path="/docs/marketsquare/support/supported-assets" name="Supported Assets" />
    <x-ark-docs-sidebar-link path="/docs/marketsquare/support/curation" name="Assets & Curation" />
    <x-ark-docs-sidebar-link path="https://ark.dev/contact" name="Contact Us" />
</x-ark-docs-sidebar-group>
