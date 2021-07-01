---
title: dApps Guide - Modeling the Structure
---

# Basic Module Structure

Modules are very simple to write. At their core they are an object with a register property, that is a function with the signature async function.

<x-alert type="success">
Everything we use inside ARK core is built with modules. To learn more about modules and their structure follow the source code of existing modules within core.
</x-alert>

<x-alert type="info">
GitHub learning repository has a template project available [here](https://github.com/learn-ark/dapp-core-module-template/tree/develop). You can create a new module by creating a [new GitHub repository](https://github.com/new) and selecting the correct template: **learn-ark/dapp-core-module-template**.
</x-alert>

## Package properties

The module properties are set in the `package.json` file in the root of you core module.

* **name** _the module name_
* **version** _the module version_
* **arkecosystem**:
  * **core**:
    * **alias**: _the module alias_
    * **dependencies**: _the module dependencies_
    * **required**: _is module required_

## Service Provider

```typescript
import { Container, Contracts, Providers } from "@arkecosystem/core-kernel";
import { DappManager } from "./manager";

const DappManagerIdentifier = Symbol.for("DappManager");

export class ServiceProvider extends Providers.ServiceProvider {
    public async register(): Promise<void> {
        this.app.get<Contracts.Kernel.Logger>(Container.Identifiers.LogService).info(`Loading dapp`);

        this.app.bind<DappManager>(DappManagerIdentifier).to(DappManager).inSingletonScope();
    }

    public async boot(): Promise<void> {
        this.app.get<Contracts.Kernel.Logger>(Container.Identifiers.LogService).info(`Booting dapp`);

        this.app.get<DappManager>(DappManagerIdentifier).start({});
    }

    public async dispose(): Promise<void> {
        this.app.get<Contracts.Kernel.Logger>(Container.Identifiers.LogService).info(`Disposing dapp`);

        this.app.get<DappManager>(DappManagerIdentifier).stop();
    }
}
```

### Registration

Module needs to be registered in order to be picked up by the `core` engine. Looking at the source code above each core module must have the **`register`** method implemented. This method is called from the application container.

```typescript
public async register(): Promise<void> {
    this.app.get<Contracts.Kernel.Logger>(Container.Identifiers.LogService).info(`Loading dapp`);

    this.app.bind<DappManager>(DappManagerIdentifier).to(DappManager).inSingletonScope();
}
```

Take a look on [Service Providers](/docs/core/architecture/service-provider) to learn more about it.

**Let's head over to the next section, where we will learn how to write our own dApp in a few minutes, just by following our dApp core module template repository.**
