---
title: Getting Started - Core Configuration
---

# Core Server Configuration

Because Nodem communicates with your Core installation using the Manager API, you must install the `core-manager` plugin. This page will guide you through this process using your new--or existing--Core Server instance.

## 1) Install the Core-Manager Plugin

After connecting to your Core Server, install the `core-manager` plugin using the `ark` command below:

```bash
ark plugin:install @arkecosystem/core-manager
```

## 2) Configure the Core-Manager Plugin

The Manager API does not have a 'default' setup. You can use your Core instance's `app.json` and `.env` files to manually configure the required parameters or establish a basic configuration using an interactive process offered by the following command:

```bash
ark manager:config
```

<x-alert type="info">
Please refer to the [Core Manager API](https://ark.dev/docs/api/manager-api/getting-started) documentation page for additional information on logging, authentication, and related environment variables.
</x-alert>
