---
title: Installation - Networks
---

# Networks

<x-alert type="success">
If you don't have access to a Linux box you can quickly setup one on [DigitalOcean](https://cloud.digitalocean.com) and other cloud providers.
</x-alert>

Active Mainsail networks:

## Testnet (ARK)

### Files

| Name | File |
| :----------: | :----------------: |
| **Crypto**   | [crypto.json](https://raw.githubusercontent.com/ArkEcosystem/mainsail-network-config/main/testnet/mainsail/crypto.json)  |
| **App**   | [app.json](https://raw.githubusercontent.com/ArkEcosystem/mainsail-network-config/main/testnet/mainsail/app.json)  |
| **Seed peers**   | [peers.json](https://raw.githubusercontent.com/ArkEcosystem/mainsail-network-config/main/testnet/mainsail/peers.json)  |

### Ports

| Process                    | Port number |
| :------------------------: | :---------: |
| **P2P**                    | 4000        |
| **Public API**             | 4003        |
| **Transaction Pool API**   | 4007        |

### API Nodes

You can make use of [https://dwallets.mainsailhq.com/](https://dwallets.mainsailhq.com/) as API node. This is a load balancer with 3 separate servers behind it.

### Ark Scan

- [Testnet Explorer](https://explorer-demo.mainsailhq.com)

### Receiving testnet tokens

You can receive testnet tokens from the [DARK Faucet](https://faucet-demo.mainsailhq.com/). The faucet is a service that provides free tokens to testnet users.

You need to provide your testnet address to receive tokens. If you don't have a testnet address, you can create one using the [Mainsail TX Tester](https://github.com/ArkEcosystem/mainsail-tx-tester).
