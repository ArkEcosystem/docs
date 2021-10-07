<!-- markdownlint-disable MD041 -->
<x-general.sidebar-link path="/docs/sdk/intro" name="Introduction" />
<!-- markdownlint-enable MD041 -->

## Guidelines

<x-general.sidebar-link path="/docs/sdk/guidelines/crypto" name="Crypto Libraries" />
<x-general.sidebar-link path="/docs/sdk/guidelines/client" name="Client Libraries" />

@foreach(Documentation::availableSDK() as $sdk)
<x-sdk-sidebar-group
    :heading="2"
    :name="$sdk['name']"
    :slug="$sdk['slug']"
    :has-complementary="$sdk['has_complementary']"
/>
@endforeach

## Deprecated

@foreach(Documentation::deprecatedSDK() as $sdk)
<x-sdk-sidebar-group
    :heading="3"
    :name="$sdk['name']"
    :slug="$sdk['slug']"
    :has-complementary="$sdk['has_complementary']"
/>
@endforeach

## Frameworks

<x-general.sidebar-link path="/docs/sdk/frameworks/laravel" name="Laravel" />
<x-general.sidebar-link path="/docs/sdk/frameworks/symfony" name="Symfony" />
