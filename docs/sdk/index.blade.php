<x-general.sidebar-group path="/docs/sdk/intro" title="Introduction">
    <x-general.sidebar-link path="/docs/sdk/intro" name="Introduction" />
</x-general.sidebar-group>

<x-general.sidebar-group path="/docs/sdk/guidelines/*" title="Guidelines">
    <x-general.sidebar-link path="/docs/sdk/guidelines/crypto" name="Crypto Libraries" />
    <x-general.sidebar-link path="/docs/sdk/guidelines/client" name="Client Libraries" />
</x-general.sidebar-group>

@foreach(Documentation::availableSDK() as $sdk)
<x-sdk-sidebar-group
    :heading="2"
    :name="$sdk['name']"
    :slug="$sdk['slug']"
    :has-complementary="$sdk['has_complementary']"
/>
@endforeach

<h3 class="pl-9 mt-4 pt-4 text-base font-semibold uppercase border-t text-theme-secondary-500 border-theme-secondary-200">Deprecated</h3>

@foreach(Documentation::deprecatedSDK() as $sdk)
<x-sdk-sidebar-group
    :heading="3"
    :name="$sdk['name']"
    :slug="$sdk['slug']"
    :has-complementary="$sdk['has_complementary']"
/>
@endforeach

<x-general.sidebar-group path="/docs/sdk/frameworks/*" title="Frameworks">
    <x-general.sidebar-link path="/docs/sdk/frameworks/laravel" name="Laravel" />
    <x-general.sidebar-link path="/docs/sdk/frameworks/symfony" name="Symfony" />
</x-general.sidebar-group>
