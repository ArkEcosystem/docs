---
title: Configure Bridgechain Installation
---

# Configure Bridgechain Installation

This configuration step is where we'll set up the default installation folder for your Core, as well as some other network parameters relating to the database and communication ports.

## Bridgechain Path

Is the path and folder name on which your Core will reside. The default path and folder is `$HOME/core-bridgechain`, but you can replace core-bridgechain with name of your project (be sure to omit spaces). In ARK's case, this variable would be `$HOME/core-ark`.

## Database Host

Is the IP address or hostname where the database will be hosted. Since this is usually residing on the same machine we can use the default, which is `localhost`.

## Database Name

Is a unique label given to your database. The default database name is `core_bridgechain`, but for easier identification you can swap `bridgechain` with your project name, i.e. `core_ark`.

## Database Port

Is the port number for accessing the database. The database is the main location where all of the blockchain data is stored. The normal range for this number is usually **1024 to 49151**, and you can decide the port. If you are unsure use default port **5432**.

## P2P Port

Is the port number for Peer 2 Peer (P2P) communications between nodes on your network. This is used for nodes on your network to communicate and share data between each other. The normal range for this number is usually **1024 to 49151**, and you can decide the port. If you are unsure use default port **4002**.

## API Port

Is the port number for the publicly available API. The API exposes all resources and data provided by Core node and is the preferred way of interacting with the network. Lite clients like wallets also use this port to interact with nodes. The normal range for this number is usually **1024 to 49151**, and you can decide the port. If you are unsure, use default port **4003**.

## Webhook Port

Is the port number for Webhooks. Webhooks allow you to create more flexible and automated systems while also reducing traffic/load on your server. The normal range for this number is usually **1024 to 49151**, and you can decide the port. If you are unsure, use default port **4004**.

## JSON-RPC Port

Is the port number for JSON-RPC, which was created to aid organizations such as exchanges with the integration of ARK technology in their existing RPC based infrastructure. Keep in mind that JSON-RPC is optional and all operations provided by the JSON-RPC can be performed using the public API. The normal range for this number is usually **1024 to 49151**, and you can decide the port. If you are unsure, use default port **8080**.
