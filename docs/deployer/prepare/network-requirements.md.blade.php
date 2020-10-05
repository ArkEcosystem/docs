---
title: Network Requirements
---

# Network Requirements

To successfully deploy your new chain, you will need the following server details:

* The IP address of the server where your bridgechain will be deployed, also known as the **genesis node.**
* The IP address of each server that will act as a peer on your network

The ARK Deployer configures and deploys three network profiles simultaneously within your new Core: **Mainnet, Devnet, and Testnet.**

* **Mainnet** - is usually the network you will be running in production, and it is the backbone of your project. This is usually known as the _Public Network_ since this network is utilized by your end users. This network is _real coins, real transactions_.
* **Devnet** - is the network where testing occurs before being deployed on the mainnet. In this _Development Network_, developers try to break things or test new features. If your project is open to community devs, they will be using this network to suggest and test network improvements. Be advised that due to the nature of blockchain and immutability, we strongly recommend that changes are tested on devnet before you push them to live production on Mainnet. This network is _play-around coins and transactions._
* **Testnet** - is a _Testing Network_ that you usually run locally when testing changes and don't expect to involve a wider audience. Running this usually means deploying a blockchain on your local machine for experimentation. Changes you test here are usually pushed to Devnet for a wider audience. This network is _play-around coins and transactions._

The ARK Deployer generates a configuration for all of the above networks with the same parameters for the most part. However, you can choose which to run on node initialization. You would probably start off with Testnet or Devnet to get familiar with the tech and to test if everything is working as intended. At the appropriate time, the installation script will ask you which network you wish to set as the default for the current machine.

The number of peers required for a functioning network changes depending on what type of network you are deploying:

* **Mainnet** requires a minimum of **20 peers** for a functioning network.
* **Devnet** requires a minimum of **5 peers** for a functioning network.
* **Testnet** is to be used in an instance where only the genesis node is utilized for testing purposes. **No peers are required**.

> **Note:** It is recommended to start with a Testnet network to become familiar with the installation of your bridgechain and how the network operates. If you are unprepared to provide the IPs of the nodes when the Deployer asks, you can skip the steps and manually edit the peers.json file for the networks in question later. Doing that is not hard and detailed steps are given in the Bridgechain Deployment section of this documentation.
