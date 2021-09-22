---
title: Testing - Core Plugins
---

# Core 3.0 Plugin Development

Testers who previously created Plugins for Core are encouraged to migrate their Plugins to be functional with Core V3 to increase test coverage and report any pain points found during the migration process.

## Prerequisites

Before developing a plugin you should make sure that you have read the following links.

<x-link-collection
    :links="[
        ['path' => '/docs/core/overview/architecture/lifecycle', 'name' => 'Application Lifecycle'],
        ['path' => '/docs/core/overview/architecture/container', 'name' => 'Service Container'],
        ['path' => '/docs/core/overview/architecture/provider', 'name' => 'Service Provider'],
        ['path' => '/docs/core/overview/architecture/managers-drivers', 'name' => 'Managers and Drivers'],
        ['path' => '/docs/core/overview/architecture/contracts', 'name' => 'Contracts'],
    ]"
/>

All of the above are quintessential to building plugins that are easy to maintain and expand. If you don't fully understand those you will end up with difficult to maintain code that will be hacky.

You should also take a look at our blog series for Core 3.0 that will talk you through the most important changes with some samples to give you an idea about the internals of core and how to leverage them to your advantage for plugins you are planning to build.

- [https://ark.io/blog/lets-explore-ark-core-v3-part-1-infrastructure-arkio-blog](https://ark.io/blog/lets-explore-ark-core-v3-part-1-infrastructure-arkio-blog)
- [https://ark.io/blog/lets-explore-core-v3-part-2-bootstrap-events-arkio-blog](https://ark.io/blog/lets-explore-core-v3-part-2-bootstrap-events-arkio-blog)
- [https://ark.io/blog/lets-explore-core-part-3-kernel-services-arkio-blog](https://ark.io/blog/lets-explore-core-part-3-kernel-services-arkio-blog)
- [https://ark.io/blog/lets-explore-core-part-4-extensibility-arkio-blog](https://ark.io/blog/lets-explore-core-part-4-extensibility-arkio-blog)
- [https://ark.io/blog/lets-explore-core-part-5-maintainability-testability](https://ark.io/blog/lets-explore-core-part-5-maintainability-testability)
- [https://ark.io/blog/lets-explore-core-part-6-tooling-arkio-blog#replacing-oclif-with-our-own-pluggable-cli](https://ark.io/blog/lets-explore-core-part-6-tooling-arkio-blog#replacing-oclif-with-our-own-pluggable-cli)

## Basics

The most basic plugin consist of 3 files which are responsible for getting your plugin configured and running within core.

### defaults.ts

This file contains all of the configuration defaults for your plugin. If you are planning to expose environment variables to configure your plugin we recommend that you use a unique prefix like `VENDOR_` for your plugins to avoid collisions with other plugins. For example if your plugin is is `@vendor/something` then you should prefix your environment variables with `VENDOR_SOMETHING_` to ensure they are unique.

```typescript
export const defaults = {
    server: {
        http: {
            enabled: !process.env.CORE_API_DISABLED,
            host: process.env.CORE_API_HOST || "0.0.0.0",
            port: process.env.CORE_API_PORT || 4003,
        },
        https: {
            enabled: process.env.CORE_API_SSL,
            host: process.env.CORE_API_SSL_HOST || "0.0.0.0",
            port: process.env.CORE_API_SSL_PORT || 8443,
            tls: {
                key: process.env.CORE_API_SSL_KEY,
                cert: process.env.CORE_API_SSL_CERT,
            },
        },
    },
};
```

### service-provider.ts

This file contains the service provider which is the heart of your plugin. It is responsible for preparing, starting and stopping your plugin.

```typescript
import { Providers } from "@arkecosystem/core-kernel";

import Handlers from "./handlers";
import { Identifiers } from "./identifiers";
import { preparePlugins } from "./plugins";
import { Server } from "./server";
import { DelegateSearchService, LockSearchService, WalletSearchService } from "./services";

export class ServiceProvider extends Providers.ServiceProvider {
    public async register(): Promise<void> {
        this.app.bind(Identifiers.WalletSearchService).to(WalletSearchService);
        this.app.bind(Identifiers.DelegateSearchService).to(DelegateSearchService);
        this.app.bind(Identifiers.LockSearchService).to(LockSearchService);

        if (this.config().get("server.http.enabled")) {
            await this.buildServer("http", Identifiers.HTTP);
        }

        if (this.config().get("server.https.enabled")) {
            await this.buildServer("https", Identifiers.HTTPS);
        }
    }

    public async boot(): Promise<void> {
        if (this.config().get("server.http.enabled")) {
            await this.app.get<Server>(Identifiers.HTTP).boot();
        }

        if (this.config().get("server.https.enabled")) {
            await this.app.get<Server>(Identifiers.HTTPS).boot();
        }
    }

    public async dispose(): Promise<void> {
        if (this.config().get("server.http.enabled")) {
            await this.app.get<Server>(Identifiers.HTTP).dispose();
        }

        if (this.config().get("server.https.enabled")) {
            await this.app.get<Server>(Identifiers.HTTPS).dispose();
        }
    }
}
```

### index.ts

This file contains all the exports of your package. There are no mandatory exports besides the service provider which is required .

```jsx
export * from "./service-provider";
```

## Questions

If there are any questions about plugin migrations from 2.0 to 3.0 you can open issue on the [GitHub repository](https://github.com/ArkEcosystem/core) with reproduction steps and a link to your repository. An update skeleton with the basics can be found at [https://github.com/ArkEcosystem/core-plugin-skeleton/tree/lel](https://github.com/ArkEcosystem/core-plugin-skeleton/tree/lel).
