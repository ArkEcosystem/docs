---
title: Adding Network Peers
---

# Adding Network Peers

With your genesis node now up and running, it's time to add _peers_, or other nodes, to your network. Be advised to add the correct number of peers depending on how your genesis node is configured:

* **Testnet** - no additional peers required
* **Devnet** - 5 additional peers
* **Mainnet** - 20 additional peers

The process to add peers to your bridgechain network is just like adding a node to the ARK Public Network. For each peer server, perform the following:

1. Replacing `GITHUB_USERNAME` with your or your project's GitHub username execute:

```bash
bash <(curl -s https://raw.githubusercontent.com/GITHUB_USERNAME/core/chore/bridgechain-changes/install.sh)
```

1. Wait as the procedure runs.
2. You will be prompted to select **mainnet**, **devnet**, or **testnet**. Choose the same net as the genesis node you set up for the given network.
3. Confirm with `Y`.
4. You will be prompted to declare database credentials `username`, `password`, and `database name`. These are for internal server use and can be anything, including something like `bridgechain`, `bridgechain` and `bridgechain`.
5. The process will complete.
6. To start relay process execute (replacing `bridgechain` at the start with yours):

```bash
bridgechain relay:start
```

1. To observe logs type:

```bash
bridgechain relay:log
```

or

```bash
pm2 logs
```

You will see the synchronization process occur and the relay should eventually catch up and start receiving new blocks. 9. Repeat this procedure for each peer.
