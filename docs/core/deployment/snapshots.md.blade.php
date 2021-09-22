---
title: Deployment - Using Snapshots
---

# Using Snapshots

Snapshot functionality is a built-in feature of the Core that you can easily use with the integrated CLI. Snapshot makes a backup of the current DB state so you can recover from a previously made snapshot and get synced much faster than syncing from 0.

* [Restoring from a Snapshot](#restoring-from-a-snapshot)
* [Rolling back a Blockchain](#rolling-back-a-blockchain)
* [Copying Snapshots Between Servers](#copying-snapshots-between-servers)

## Getting Started

This function should be done at least once per month if you need to recover due to some failure down the road (database corruption, database integrity failure, …) or to quickly set up on additional servers.

<x-alert type="warning">
All snapshot input data that represent block height are rounded down to the beginning of the round that contains given height.
</x-alert>

Making use of this feature makes most sense once your node is fully synced (up to latest height). To make latest snapshot run this command:

```bash
ark snapshot:dump
```

This will start up the snapshot process. Don’t interrupt it, as it might take a while, depending on the size of the blockchain. You’ll see a message, something along these lines, as time goes on:

```bash
[2021-06-29 08:11:28.398] INFO : Connecting to database: ark_mainnet
[2021-06-29 08:11:28.469] DEBUG: Connection established.
[2021-06-29 08:11:28.473] INFO : Running DUMP for network: mainnet
[2021-06-29 08:11:28.474] INFO : Start counting blocks, rounds and transactions
[2021-06-29 08:11:28.525] INFO : Start running dump for 153 blocks, 153 rounds and 153 transactions
```

After it’s done, you’ll see this message informing you that the process to create the snapshot was shut down and you can now continue:

```bash
⠸ Blocks: 100.00 % Transactions: 100.00 % Rounds: 100.00 %
[2021-06-29 08:11:29.688] INFO : Snapshot is saved on location: .../ark-core/mainnet/snapshots/1-153/
[2021-06-29 08:11:29.689] DEBUG: Disposing @arkecosystem/core-snapshots...
[2021-06-29 08:11:29.689] DEBUG: Disposing @arkecosystem/core-database...
[2021-06-29 08:11:29.689] DEBUG: Disconnecting from database
[2021-06-29 08:11:29.690] DEBUG: Disconnected from database
[2021-06-29 08:11:29.691] DEBUG: Disposing @arkecosystem/core-logger-pino...
```

This is it! You just made a backup of the blockchain.

You can see a list of all completed snapshots in this filepath (_replace_ _**&lt;network&gt;**_ _with the network you operate on — mainnet,devnet,testnet_):

```bash
ls /home/ark/.local/share/ark-core/<network>/snapshots
example:
ls /home/ark/.local/share/ark-core/mainnet/snapshots
//In our example it made backup of blockchain 1-153 which means
from height 1 to height 153
```

_Useful tip: next time you want to make a snapshot, you can start dump from height following latest stored snapshot. Lets use our snapshot we made in the previous step (directory filename 1-153) and increase height by 1, to prepare following snapshot. We’ll run the command, replacing the filename with yours, which can be obtained by running the command from previous paragraph_ ``**`ls /home/ark/.local/share/ark-core/<network>/snapshots`** _to list files. Let’s run this to create new snapshot:_

```bash
ark snapshot:dump --start=154
//replace 1-153 with your own folder from previously created snapshot.
```

We do recommend that you also take full (complete) snaps regularly.

## Restoring from a Snapshot

The process for restoring from a previously made snapshot is pretty straightforward. We’ll again make use of the integrated CLI Snapshot.

First, let’s stop the ARK Relay process, if we have it currently running, with:

```bash
ark relay:stop
```

After that we’ll run the restore command:

```bash
ark snapshot:restore --blocks=<folder name>
//replace <folder name> with your previously made latest snapshot
in our case lets use 1-153 so we'd run this command to restore:
ark snapshot:restore --blocks=1-153
```

You will see a message similar to this. It will take some time, so leave it running:

```bash
[2021-06-29 08:26:19.515] INFO : Connecting to database: ark_testnet
[2021-06-29 08:26:19.576] DEBUG: Connection established.
[2021-06-29 08:26:19.582] INFO : Running RESTORE for network: testnet
⠸ Blocks: 100.00 % Transactions: 100.00 % Rounds: 100.00 %
[2021-06-29 08:26:21.026] INFO : Successfully restore  153 blocks, 153 transactions, 153 rounds
[2021-06-29 08:26:21.027] DEBUG: Disposing @arkecosystem/core-snapshots...
[2021-06-29 08:26:21.027] DEBUG: Disposing @arkecosystem/core-database...
[2021-06-29 08:26:21.028] DEBUG: Disconnecting from database
[2021-06-29 08:26:21.029] DEBUG: Disconnected from database
[2021-06-29 08:26:21.030] DEBUG: Disposing @arkecosystem/core-logger-pino...

```

Restore command does not automatically clear the database. Use snapshot:rollback or snapshot:truncate command, to rollback or clear the database.

After it is completed, we need to start the relay process again for it to resync (if applicable) back to current height:

```bash
ark relay:start
```

## Rolling back a Blockchain

The rollback function is specifically useful if you forked, your node cannot seem to process new blocks, and you want to resync from the network from specified height.

First, let’s stop the ARK Relay process with:

```bash
ark relay:stop
```

After that, we’ll make use of Snapshot command _**rollback**_ — for this case we can use two commands:

### Rolling back to a Specific Height

```bash
ark snapshot:rollback --height=<height>

start to sync from the network. In our case lets say current
blockchain height is 7,740,000 and if we want to go back 2,000 blocks
we'll input 7738000 in <height> so we'll run. We'd run:

ark snapshot:rollback --height=7738000
```

You’ll see a message similar to this:

```bash
[2021-06-29 08:41:03.467] INFO : Connecting to database: ark_testnet
[2021-06-29 08:41:03.571] DEBUG: Connection established.
[2021-06-29 08:41:03.575] INFO : Running ROLLBACK
[2021-06-29 08:41:03.666] INFO : Last block height is: 7,740,000
[2021-06-29 08:41:03.715] INFO : Rolling back chain to last finished round 151,725 with last block height 7,737,975
[2021-06-29 08:41:03.716] DEBUG: Disposing @arkecosystem/core-snapshots...
[2021-06-29 08:41:03.716] DEBUG: Disposing @arkecosystem/core-database...
[2021-06-29 08:41:03.717] DEBUG: Disconnecting from database
[2021-06-29 08:41:03.718] DEBUG: Disconnected from database
[2021-06-29 08:41:03.718] DEBUG: Disposing @arkecosystem/core-logger-pino...
```

After it is finished, we need to start the relay process again for it to resync from the previously rolled back state and sync back up to the current height by running:

```bash
ark relay:start
```

### Rolling back to a Specific Block Number

```bash
ark snapshot:rollback --number=<number>

//where we replace <number> with a number of blocks we want to
rollback to and start to sync from the network. In our case lets say
current blockchain height is 7,740,000 and if we want to go back
2,000 blocks we'll input 2000 in <number> so we'll run. We'd run:

ark snapshot:rollback --number=2000
```

You’ll see a message similar to this:

```bash
[2021-06-29 08:41:03.467] INFO : Connecting to database: ark_testnet
[2021-06-29 08:41:03.571] DEBUG: Connection established.
[2021-06-29 08:41:03.575] INFO : Running ROLLBACK
[2021-06-29 08:41:03.666] INFO : Last block height is: 7,740,000
[2021-06-29 08:41:03.715] INFO : Rolling back chain to last finished round 151,725 with last block height 7,737,975
[2021-06-29 08:41:03.716] DEBUG: Disposing @arkecosystem/core-snapshots...
[2021-06-29 08:41:03.716] DEBUG: Disposing @arkecosystem/core-database...
[2021-06-29 08:41:03.717] DEBUG: Disconnecting from database
[2021-06-29 08:41:03.718] DEBUG: Disconnected from database
[2021-06-29 08:41:03.718] DEBUG: Disposing @arkecosystem/core-logger-pino...
```

After it is finished, we need to start the relay process again for it to resync from the previously rolled back state and sync back up to the current height by running:

```bash
ark relay:start
```

Let it sync back, and you are back in business!

## Copying Snapshots Between Servers

If you want to copy a snapshot to another server you own to bring it quickly into sync or to store a copy in a different location, we can make use of SCP (Secure Copy Protocol) which supports secure file transfers between different hosts.

SCP allows files to be copied to / from / between different hosts. It uses SSH protocol for transfers and provides the same authentication and level of security as SSH.

If you want to copy files from one server to another, we’ll run this command where we need to replace `<network>` with the network you operate on (in our example mainnet), `<folder-name>` with snapshot name we are copying in our example it will be 1-7739894, `<username>` with username of the server we are copying to and `<IP>` with its IP address:

```bash
scp -r /home/ark/.local/share/ark-core/<network>/snapshots/<folder-name> <username>@IP:/home/ark/.local/share/ark-core/<network>/snapshots/<folder-name>

// to put this into a practical example:

scp -r /home/ark/.local/share/ark-core/mainnet/snapshots/1-7739894 ark@111.11.11.1:/home/ark/.local/share/ark-core/mainnet/snapshots/1-7739894
```

After this, you will enter `yes` to confirm you want to connect to the server and add it to the list of known hosts.

```bash
The authenticity of host ‘<IP>’ can’t be established.
ECDSA key fingerprint is <key>
Are you sure you want to continue connecting (yes/no)? yes
```

After that, you will be prompted for the password of the server you are connecting to:

```bash
Warning: Permanently added '<ip>' (ECDSA) to the list of known hosts.
ark@<ip>'s password: inputpasswordhere
```

Your files will begin copying from one server to another. Wait until it completes, and you are good to go! If you wish to restore from the snapshot on your second server, login to that server and follow "_Restoring from the Snapshot_" above.
