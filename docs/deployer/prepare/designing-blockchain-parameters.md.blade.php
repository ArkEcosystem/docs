---
title: Designing Blockchain Parameters
---

# Designing Blockchain Parameters

The first thing is to identify your need for customization for your new network. If you simply want a network with a native token, high scalability, and flexibility to implement decentralized applications, you can choose (in the ARK Deployer):

* **Basic Level** to receive a clone of the ARK Public Network with all of ARK's default blockchain parameters, economic model, and network architecture.
* **Intermediate Level** to customize the identity of your new chain like the name, ticker, currency symbol, and other identity-related variables. If you have your own plan to implement your own economic model with custom forger count, initial token supply, forging rewards, fee structures, and other such variables.
* **Advanced Level** to fully customize the chain for variables like hosts, port numbers, paths, and Explorer customization.

It is important to keep in mind that when customizing your new chain, as you deviate more from ARK Public Network specifications, thorough testing of your chain becomes more necessary to ensure stability. The wrong combination of parameters could result in the chain forking into oblivion, or future nodes syncing endlessly and never catching up to the current block height. While ARK technology can run on a variety of different configurations, the more you adhere to ARK Public Network specs, the more convenience you should expect to experience. Here's a short breakdown of the relevant ARK Public Network performance specs:

* Number of Forgers: 51
* Block Time: 8 Seconds
* Number of Transactions per Block: 150

Another example, the Lisk network, has a different configuration:

* Number of Forgers: 101
* Block Time: 10 Seconds
* Number of Transactions per Block: 25
