---
title: Hardware Requirements
---

# Hardware Requirements

A Relay Node is a full node in the ARK network; it maintains a complete copy of the ledger (blockchain). These nodes serve as Public API endpoint, use an internal service discovery mechanism to locate other nodes and keep each other in sync.

## Recommended Hardware Requirements

* 4GB RAM
* 40GB SSD
* 2 Cores

ARK Nodes execute many query intensive operations. The most cost-effective approach for running a high-performance node is choosing SSD over HDD. Increasing the total RAM improves cache performance.

## Configuration Requirements

* Stable internet connection
* Access to multiple open ports (actual ports may be configured)

  | Service | Port | Required | Enabled by default | Documentation |
  | :--- | :---: | :---: | :---: | :---: |
  | p2p | 4001 | ✅ | ✅ | [reference](https://github.com/ArkEcosystem/gitbooks-exchange/tree/8af5049dc3d84a5f24ac80597529f2d656c651df/api/p2p/README.md) |
  | public API | 4003 | ❌ | ✅ | [reference](https://github.com/ArkEcosystem/gitbooks-exchange/tree/8af5049dc3d84a5f24ac80597529f2d656c651df/exchanges/public-api.html) |
  | webhook | 4004 | ❌ | ❌ | [reference](https://github.com/ArkEcosystem/gitbooks-exchange/tree/8af5049dc3d84a5f24ac80597529f2d656c651df/api/webhooks/README.md) |
  | JSON-RPC | 8080 | ❌ | ❌ | [reference](https://github.com/ArkEcosystem/gitbooks-exchange/tree/8af5049dc3d84a5f24ac80597529f2d656c651df/exchanges/json-rpc.html) |
