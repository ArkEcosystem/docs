---
title: Introduction
---

# Introduction

This is a reference guide for the available Core APIs. APIs expose different resources and data provided by the Core Server \(Node\). Based on the Core Server configuration \(enabled core modules\) we can configure different array of services, such as:

1. [Public REST API](/docs/api/public-rest-api/getting-started)
2. [Webhook API](/docs/api/webhook-api/getting-started)
2. [Manager API](/docs/api/manager-api/getting-started)

<x-alert type="info">
Each Core server (node) has its own internal blockchain and state, meaning it may have forked or be out of sync, causing queries to fail. Monitor your node by comparing it to different public nodes, such as the official [explorer](https://explorer.ark.io:8443/api) to ensure you are in sync.
</x-alert>
