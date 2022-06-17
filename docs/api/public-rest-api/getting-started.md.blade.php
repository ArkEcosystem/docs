---
title: Getting Started
---

# Getting Started

<x-alert type="warning">
All HTTP requests have to be sent with the `Content-Type: application/json` header. If the header is not present it will result in malformed responses or request rejections.
</x-alert>

This is the reference guide for the Public API. This API exposes all resources and data provided by an ARK Core node; and is the preferred way of interacting with the ARK network. Note that each node has its own internal blockchain and state, meaning it may have forked or be out of sync, causing queries to fail. Monitor your node by comparing it to different public nodes, such as an official explorer to ensure you are in sync.

- **Main Network** - [https://live.arkscan.io](https://live.arkscan.io)
- **Test Network** - [https://test.arkscan.io](https://test.arkscan.io)

> If you have any problems or requests please [open an issue](https://github.com/ArkEcosystem/core/issues/new/choose).

## Pagination

Requests that return multiple items will be paginated to 100 items by default. You can specify further pages with the `?page` parameter. For some resources, you can also set a custom page size up to 100 with the `?limit` parameter. Note that for technical reasons not all endpoints respect the `?limit` parameter.

## Public Testing Relay

If you are not running a relay yourself you can test API calls using:

- **Main Network** - [https://api.ark.io/api](https://api.ark.io/api)
- **Test Network** - [https://dapi.ark.io/api](https://dapi.ark.io/api)

Happy developing!
