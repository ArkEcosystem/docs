<x-ark-docs-sidebar-group :path="['/docs/sdk/intro', '/docs/sdk']" title="Introduction" borderless>
    <x-ark-docs-sidebar-link path="/docs/sdk/intro" name="Introduction" />
</x-ark-docs-sidebar-group>

<x-ark-docs-sidebar-group path="/docs/sdk/guidelines/*" title="Guidelines">
    <x-ark-docs-sidebar-link path="/docs/sdk/guidelines/crypto" name="Crypto Libraries" />
    <x-ark-docs-sidebar-link path="/docs/sdk/guidelines/client" name="Client Libraries" />
</x-ark-docs-sidebar-group>

@foreach(Documentation::availableSDK() as $sdk)
<x-sdk-sidebar-group
    :heading="2"
    :name="$sdk['name']"
    :slug="$sdk['slug']"
    :has-complementary="$sdk['has_complementary']"
/>
@endforeach

<x-ark-docs-sidebar-subheading>Deprecated</x-ark-docs-sidebar-subheading>

@foreach(Documentation::deprecatedSDK() as $sdk)
<x-sdk-sidebar-group
    :heading="3"
    :name="$sdk['name']"
    :slug="$sdk['slug']"
    :has-complementary="$sdk['has_complementary']"
/>
@endforeach

<x-ark-docs-sidebar-group path="/docs/sdk/frameworks/*" title="Frameworks">
    <x-ark-docs-sidebar-link path="/docs/sdk/frameworks/laravel" name="Laravel" />
    <x-ark-docs-sidebar-link path="/docs/sdk/frameworks/symfony" name="Symfony" />
</x-ark-docs-sidebar-group>
