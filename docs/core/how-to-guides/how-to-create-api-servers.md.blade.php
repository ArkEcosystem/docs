---
title: How To Create API Servers
---

# How To Create API Servers

A common use-case for a module is that you process some data from within core and want to make use of that data with an external application. The easiest way to do this is through an HTTP server that exposes an API from which you request the data.

<x-alert type="info">
Core provides a package called [core-http-utils](https://github.com/ARKEcosystem/core/tree/develop/packages/core-http-utils/src) which provides everything you will need to run an HTTP server with modules. Core uses [hapi](https://hapijs.com/) for all its HTTP based services as it enables developers to focus on writing reusable application logic instead of spending time building infrastructure.
</x-alert>

## Step 0: Create A New Module From A Template 

To create a new module from a template follow this simple guide:

<livewire:page-reference path="/docs/core/how-to-guides/how-to-write-core-dapps/setting-up-your-first-module" />

After you have created the module and adjusted basic properties \(name, structure, dependencies\) we can start to add custom functionalities, like **adding a HTTP server.**

You can also use our template project with HTTP server implementation already done and create a new module from it.

<livewire:embed-link url="https://github.com/learn-ark/dapp-core-module-http-server-template" caption="You can use our template project with HTTP server implementation." />

<x-alert type="success">
dApp Http Server Template already has a running HTTP server implemented. All you need to do is add your own routes and load the module in correct network configuration as defined in **Step 3** below.
</x-alert>

## Step 1: Adding core-http-utils Dependency 

<x-alert type="info">
If you used the dApp Http Server Module Template, the boilerplate HTTP Server implementation is already done. You can skip Step 1, 2 and **jump to Step 3** below.
</x-alert>

**Steps 1 and 2** are basic explanation of needed packages and implementation decisions for the HTTP server module template we are using. This is a **recommended read** if you want to understand the basic server mechanics and how to add it to you existing modules.

As you've learned in [How to write a Core Modules](/docs/core/how-to-guides/how-to-write-core-dapps/intro) you will need to install the required dependencies. For our example we will use we need the **core-http-utils** package which you can install with the following command:


```bash
cd your-module-folder
lerna add @arkecosystem/core-http-utils --scope=@vendor/demo-plugin
```


This will add a `core-http-utils` package dependency to our module.

## Step 2: Implement a HTTP Server Inside dApp Module 

Now that `core-http-utils` is installed we can get started with starting our HTTP server, which is fairly simple.

This example will register a server with a single endpoint at `http://localhost:5003/` where `localhost` is the host and `5003` the port. When you run `curl http://localhost:5003/` you should get **`Hello ARKies`** as response.

To create our server we need to import the following packages from `core-http-utils`:


```typescript
import { createServer, mountServer } from "@arkecosystem/core-http-utils";
import Hapi from "@hapi/hapi";
```


To start the server with predefined configuration we call the `createServer` and `mountServer` methods.


```typescript
await createServer(options);
await Server.registerRoutes("HTTP", this.http);
await mountServer(`Custom HTTP Public ${name.toUpperCase()} API`, server);
```


Below is the whole `server.ts` file that handles the creation and mounting logic and `plugin.ts` that starts/stops the HTTP server. Looking at the tabs, you can see the full implementation of the custom HTTP server logic and how it relates to the overall dApp creation module logic. Also note the `registerRoutes` method where you can custom routes.

**plugin.ts**

```typescript
import { Container, Logger } from "@arkecosystem/core-interfaces";
import { defaults } from "./defaults";
import { Server } from "./server";

export const plugin: Container.IPluginDescriptor = {
    pkg: require("../package.json"),
    defaults,
    alias: "core-custom-server-example",
    async register(container: Container.IContainer, options) {
        container.resolvePlugin<Logger.ILogger>("logger").info("Starting dApp");

        const server = new Server(options);
        await server.start();

        return server;
    },

    async deregister(container: Container.IContainer, options) {
        await container.resolvePlugin<Server>("core-custom-server-example").stop();
    },
};
```


**defaults**

```typescript
export const defaults = {
    enabled: true,
    host: "0.0.0.0",
    port: 5003,
};
```


**server.ts**

```typescript
export class Server {
    private logger = app.resolvePlugin<Logger.ILogger>("logger");

    private http: any;

    public constructor(private readonly config: any) {
        this.config = config;
    }

    public async start(): Promise<void> {
        const options = {
            host: this.config.host,
            port: this.config.port,
        };

        if (this.config.enabled) {
            this.http = await createServer(options);
            this.http.app.config = this.config;

            await Server.registerRoutes("HTTP", this.http);
        }

        // TODO: add SSL support. See plugin `core/packages/core-api` for more information
    }

    public async stop(): Promise<void> {
        if (this.http) {
            this.logger.info(`Stopping Custom HTTP Server`);
            await this.http.stop();
        }
    }

    public async restart(): Promise<void> {
        if (this.http) {
            await this.http.stop();
            await this.http.start();
        }
    }

    public instance(type: string): Hapi.Server {
        return this[type];
    }

    private static async registerRoutes(name: string, server: Hapi.Server): Promise<void> {
        server.route({
            method: "GET",
            path: "/",
            handler() {
                return { data: "Hello ARKies!" };
            },
        });

        await mountServer(`Custom HTTP Public ${name.toUpperCase()} API`, server);
    }
}

```


<x-alert type="info">
Head over to: [https://github.com/learn-ark/dapp-core-module-http-server-template](https://github.com/learn-ark/dapp-core-module-http-server-template) and create a new module. Your new module will already have a running HTTP server implemented, so all you need to do is add your own routes and load the module in correct network configuration.
</x-alert>

### **Implementing Route Handlers**

Adding more routes and handlers within the same file would make code unreadable. That is why we must split the logic into route registrations and implementations. The file `handlers.ts` inside the template module servers serves as an example on how to achieve this. For example we register a route in the `server.ts` with this line \(add this line to `registerRoutes` method: line 52 in file `server.ts` above, just before the `mountServer` call\):


```typescript
// source: https://github.com/learn-ark/dapp-core-module-http-server-template/blob/master/src/server.ts#L63
server.route([{ method: "GET", path: "/config", ...handlers.config }]);
```


The above registered route is implemented with in the  `handler.ts` file:

**handler.ts**

```typescript
import { app } from "@arkecosystem/core-container";
import { Plugins } from "@arkecosystem/core-utils";

export const config = {
    async handler() {
        const appConfig = app.getConfig();

        return {
            data: {
                version: app.getVersion(),
                network: {
                    version: appConfig.get("network.pubKeyHash"),
                    name: appConfig.get("network.name"),
                    nethash: appConfig.get("network.nethash"),
                    explorer: appConfig.get("network.client.explorer"),
                    token: {
                        name: appConfig.get("network.client.token"),
                        symbol: appConfig.get("network.client.symbol"),
                    },
                },
                plugins: Plugins.transformPlugins(appConfig.config.plugins),
            },
        };
    },
    config: {
        cors: true,
    },
};
```


By using this approach it is much easier to split and manage your API code. Also check our official `core-api` plugin to learn more about our API and best practices.

## Step 3: Load The Module Within Network Configuration 

We already learned how to load the new module within selected network configuration. All we have to do is edit the `plugin.js` file and add our new module name to the list.

### **Step 3.1: Add New Module To The Network plugins.js file**

Go [here](/docs/core/how-to-guides/how-to-write-core-dapps/setting-up-your-first-module#step-3-module-registration-within-network-configuration) for detailed explanation on how to achieve this.

### **Step 3.2: Start Your dApp**

Your implemented dApp application leaves and works from the ARK Core blockchain node as an independent Core module.

Now **Go And Start You Local Testnet** Blockchain with the new module enabled by following [this guide](/docs/core/how-to-guides/how-to-write-core-dapps/setting-up-your-first-module#step-4-running-your-dapp)!

## Step 4: Test Your New API Server

When Core is started you should see the dApp starting and enabling HTTP server messages in the `core.log`, similar to the display below:


```bash
... a lot of text
[2019-12-09 08:59:31.680] INFO : Starting dApp
[2019-12-09 08:59:31.685] INFO : Custom HTTP Public HTTP API Server running at: http://0.0.0.0:5003
... a lot of text :)
```


<x-alert type="success">
**Congratulations!**
Your dApp was successfully loaded and custom HTTP Server is running and listening on port 5003.
</x-alert>

Looking at the source code from the template \(file [`server.ts`](https://github.com/learn-ark/dapp-core-module-http-server-template/blob/dfde8e761c8e904bf40194fa56219ed318b4d85b/src/server.ts#L55-L63)\) we registered two endpoints:

* [GET 0.0.0.0:5003/](http://127.0.0.1:5003)
* [GET 0.0.0.0:5003/config](http://127.0.0.1:5003/config)

The default greeting endpoint was registered and implemented directly from the method in [server.ts](https://github.com/learn-ark/dapp-core-module-http-server-template/blob/dfde8e761c8e904bf40194fa56219ed318b4d85b/src/server.ts#L55-L61).

The configuration endpoint was registered from the [server.ts](https://github.com/learn-ark/dapp-core-module-http-server-template/blob/master/src/server.ts#L63), but the implementation is in the [handlers.ts](https://github.com/learn-ark/dapp-core-module-http-server-template/blob/dfde8e761c8e904bf40194fa56219ed318b4d85b/src/handlers.ts#L4-L28) file. We have split the logic into route registrations and actual implementations.

<x-alert type="success">
You saw how easy it is to add new application/modules and register them on blockchain, making them available to everyone, secure and scalable by default - being powered by ARK Blockchain Core Platform.
</x-alert>

Continue to play around and start implementing your own application, supported by custom API, all packed within the ARK Core module concept, and still fully compatible with our bridgechain ecosystem.

In the next part, we will learn how to listen to blockchain and share the information via API. We will continue to work on this example.
