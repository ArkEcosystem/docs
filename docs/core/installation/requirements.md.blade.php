---
title: Installation - Server Requirements
---

# Server Requirements

<x-alert type="success">
If you don't have access to a Linux box you can quickly setup one on [DigitalOcean](https://cloud.digitalocean.com) and other cloud providers.
</x-alert>

---

<x-alert type="warning">
Only Ubuntu **LTS** releases are supported. Ubuntu 20.04 and older are **no longer** supported. If you run Core 3.13.0 or older on one of these, follow the [upgrade guide](/docs/core/releases/upgrade/node-24).
</x-alert>

---

| Supported OS | Release Version(s)          |
| :----------: | :-------------------------: |
| **Ubuntu**   | 24.04 LTS / 26.04 LTS (recommended)<br>22.04 LTS |

We recommend Ubuntu 24.04 or 26.04 for new servers. Ubuntu 22.04 is still supported, but its standard support ends in May 2027.

Other Debian-based distributions may work with the [install script](/docs/core/installation/script) on a best-effort basis, but they are not tested or officially supported. RedHat-based distributions are no longer supported by the install script.

| Software       | Version | Installed by                                          |
| :------------: | :-----: | :---------------------------------------------------: |
| **Node.js**    | 24.22.1 or newer | [install script](/docs/core/installation/script)      |
| **PostgreSQL** | 18.x    | [install script](/docs/core/installation/script)      |
| **PM2**        | 7.x     | [install script](/docs/core/installation/script)      |

| Relay Specification | Minimum | Recommended   |
| :-----------------: | :-----: | :-----------: |
| **CPUs**            | 2       | 4             |
| **RAM**             | 4GB     | 8GB           |
| **Disk**            | 100GB<br>(_SSD_) | 160GB<br>(_SSD / NVMe_) |

| Forger Specification | Minimum            | Recommended              |
| :------------------: | :----------------: | :----------------------: |
| **CPUs**             | 2<br>(_dedicated_) | 4<br>(_dedicated_)       |
| **RAM**              | 8GB                | 16GB                     |
| **Disk**             | 100GB<br>(_SSD_)   | 160GB<br>(_SSD / NVMe_)  |

<x-alert type="info">
If you plan to [share your database with other servers](/docs/core/deployment/snapshots#sharing-a-database-between-servers), reserve extra disk space for the dumps. The receiving server needs at least twice the size of the dump free.
</x-alert>
