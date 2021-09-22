---
title: Development - Authoring Core dApps
---

# Authoring Core dApps

ARK Core has an extensive and powerful plugin system that allows you to very easily break your application up into isolated pieces of business logic, and reusable utilities - **modules**. Modular structure enables developers to focus on writing reusable application logic instead of spending time thinking about software architecture.

<x-alert type="info">
Modules are the core building blocks of our blockchain development framework. Modular structure enables us to build reusable and manageable distributed applications of any kind.

**It is essential for you to understand and master the art of ARK Core Module development.**
</x-alert>

Everything you build will be packaged as a core module. That will also enable you to separate your code from our core blockchain platform, meaning updates and migration will be almost zero-configuration and effort. To learn more about module structure and how to write them follow the links below:

<livewire:page-reference path="/docs/core/development/dapps/structure" />

<livewire:page-reference path="/docs/core/development/dapps/module" />

## Reusable dApp Starter Core Module Templates

We provide module templates, that enable you to skip the boilerplate code generation and give you an implementation head start. The following templates are available:

<livewire:embed-link url="https://github.com/learn-ark/dapp-v3-custom-transaction-example/tree/update" caption="dApp Starter Template Project" />

<livewire:embed-link url="https://github.com/learn-ark/dapp-core-module-http-server-template" caption="dApp Starter Template Project With HTTP Server Implementation" />

<x-alert type="info">
Every template is based on the [dApp Starter Core Module Template](https://github.com/learn-ark/dapp-core-module-template/tree/develop) with additional implementation. Use the templates as a functional skeleton project and continue adding and implementing your own logic (API, additional database, voting, loyalty, defi...).
</x-alert>
