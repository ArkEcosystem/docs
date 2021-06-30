---
title: Releases - v3.0
---

# v3.0 Release Guide

ARK `v3.0` is a major update and **not backward compatible with `v2.7.x`**.

## Breaking Changes

* **2.0 plugins** are incompatible with **3.0 plugins** due to the vast amount of architectural changes of internals
* The `/v2` path segment in API URLs has been deprecated in 2.0 and removed in 3.0
* `SocketCluster` has been replaced with `@hapi/nes`
* `oclif` has been replaced with a custom CLI for greater control and extensibility of its behaviors
* All `POST /search` endpoints exposed through the API have been deprecated in favour of dot-notation query parameters
* Log file name convention is changed from `{token}-{process}-current.log` to `{token}-{network}-{process}-current.log`.
* New snapshot package and snapshot file format is not compatible with previous version.

## Upgrade Guide

For detailed step-by-step instructions on upgrading from **Core v2.7** to **Core v3**, please visit the link below or proceed to the next page.

<livewire:page-reference path="/docs/core/version-guides/upgrade/3.0" />

## Reporting Problems

If you happen to experience any issues please [open an issue](https://github.com/ARKEcosystem/core/issues/new?template=Bug_report.md) with a detailed description of the problem, steps to reproduce it and info about your environment.
