---
title: VPS vs Dedicated vs Local Server
---

# VPS vs Dedicated vs Local Server

A server is pretty much just a computer with a hard drive, CPU, some memory and a bunch of input/output ports. In many ways, it’s actually very similar to your computer at home. Whether using a VPS, dedicated plan or local hardware, be advised the bigger and more powerful the hardware in the server, the more stable your network will be. This comes into play when dealing with high-performance blockchains with high transaction throughput or high quantities of lite clients connecting to nodes to ask for data.

Choosing the right hardware for your network setup is an integral part of the process of deploying your bridgechain. Depending on your use-case, various options are available:

* **Virtual Private Server \(VPS\)**
* **Dedicated Server**
* **Local Hardware**

## Virtual Private Server

_A VPS is affordable and easy to set up, some providers are designed for less technical users to handle basic server tasks easily._ These use 'virtualization' technologies to effectively split their resources between multiple users. If the hardware consists of a 500GB hard drive, 12GB of memory, and four people use the hardware they will each get 125GB of storage space and 3GB of memory. Virtual private servers are generally cheaper than dedicated servers which could benefit those who are setting up a Devnet or Mainnet environment. A VPS is a server-as-a-service you and your node operators can use to host your new chain.

## Dedicated Server

With dedicated hosting plans, only one user has access to all of the hardware on the server. In contrast, with a VPS hosting plan the server’s hardware can be used by a number of different users. A dedicated hosting plan can be thought in a similar way to your own regular computer. You own all of the hardware and you and you alone have access to all of the resources available. Dedicated servers a highly configurable and are seen to be more secure. However, dedicated servers generally come at a higher expense.

## Local Hardware

Local hardware is effectively using equipment in your own home. There are multiple cost benefits to this as you don’t have to pay for the renting of a VPS or dedicated server, and you have full control over the hardware. However, due to household internet connectivity not being as stable as VPS or dedicated hosts, it’s not recommended to build a network with local hardware. If your home internet were to disconnect, it could have a detrimental effect on your network. Local hardware is only advised for developers building a testnet with no intention of providing external access to the network. To bypass the Internet connection reliability issue, you can bring your local hardware to a nearby _colocation site,_ where a third party allows you to store your hardware in their facility and grants you access to their top-tier Internet backbone connection.

## Server Requirements

Below are the server requirements for nodes on your network:

**Genesis Node & Forging Peer Nodes**

* Ubuntu 16.x / 18.x
* 2 CPU
* 8GB RAM
* 20+ GB SSD \(HDD\)

**Relay Nodes**

* Ubuntu 16.x / 18.x
* 1 CPU
* 2-4GB RAM
* 20+ GB SSD \(HDD\)
