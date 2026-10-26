---
title: Deployment - Using Snapshots
---

# Using Snapshots

Snapshot functionality is a built-in feature of the Core that you can easily use with the integrated CLI. Snapshot makes a backup of the current DB state so you can recover from a previously made snapshot and get synced much faster than syncing from 0.

* [Creating a Snapshot](#creating-a-snapshot)
* [Restoring from a Snapshot](#restoring-from-a-snapshot)
* [Rolling back a Blockchain](#rolling-back-a-blockchain)
* [Sharing a Database Between Servers](#sharing-a-database-between-servers)

## Creating a Snapshot

You should create a snapshot at least once per month, so you can recover from a failure down the road (database corruption, database integrity failure, …) or quickly set up additional servers.

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

Snapshots are stored per network. Replace `<network>` with the network you operate on (`mainnet`, `devnet` or `testnet`) to list them:

```bash
ls ~/.local/share/ark-core/<network>/snapshots
```

The folder name is the range of blocks in the snapshot. In our example, `1-153` contains the blocks from height 1 to height 153.

### Appending to a Snapshot

Next time, you don't have to dump the whole chain again. Start from the height after your latest snapshot instead. Continuing with our `1-153` example:

```bash
ark snapshot:dump --start=154
```

We do recommend that you also take full (complete) snapshots regularly.

## Restoring from a Snapshot

The process for restoring from a previously made snapshot is pretty straightforward. We’ll again make use of the integrated CLI Snapshot.

First, let’s stop the ARK Relay process, if we have it currently running, with:

```bash
ark relay:stop
```

The restore command does not clear the database by itself. Clear it first with `snapshot:truncate`, or roll back to the height the snapshot starts from with [`snapshot:rollback`](#rolling-back-a-blockchain):

```bash
ark snapshot:truncate
```

Then run the restore command, replacing `1-153` with the folder name of your snapshot:

```bash
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

After that, we’ll make use of Snapshot command _**rollback**_. You can roll back to a specific height, or by a number of blocks.

### Rolling back to a Specific Height

Let's say the current height is 7,740,000 and we want to go back 2,000 blocks. Then we roll back to height 7,738,000:

```bash
ark snapshot:rollback --height=7738000
```

### Rolling back a Number of Blocks

The same rollback, but expressed as the number of blocks to remove from the top of the chain:

```bash
ark snapshot:rollback --number=2000
```

In both cases, you’ll see a message similar to this:

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

## Sharing a Database Between Servers

Syncing a new node from height 0 can take days. If you already run a synced node, or someone you trust does, it is much faster to copy their database. The [`ark-db-sync.sh`](https://raw.githubusercontent.com/ArkEcosystem/core/master/scripts/ark-db-sync.sh) script takes care of dumping, transferring and importing the database in one command.

<x-alert type="warning">
Only import a database from a server you control or from someone you trust. A dump replaces your entire chain, and your node accepts its contents as they are.
</x-alert>

### Methods

The script supports two methods. Both sides need to use the same one.

| Method | How it works | When to use |
| :----- | :----------- | :---------- |
| **`pg`** (default) | `pg_dump` and `pg_restore` in parallel, compressed with zstd | Fastest by far. Can dump while Core keeps running on the source |
| **`snapshot`** | `ark snapshot:dump` and `ark snapshot:restore` | Core-native format, for example if the PostgreSQL versions differ |

<x-alert type="info">
With the `pg` method, `pg_restore` on the receiving server must be the same or a newer PostgreSQL version than the one that created the dump. Servers set up with the [install script](/docs/core/installation/script) all run PostgreSQL 18.
</x-alert>

### Requirements

* Both servers have Core installed and a database configured, for example with the [install script](/docs/core/installation/script).
* Both servers run the same network (`mainnet`, `devnet` or `testnet`). The script detects it, or you pass it with `--network`.
* `rsync` is installed on both servers: `sudo apt-get install -y rsync`.
* The receiving server has at least **twice** the size of the dump free. The script checks this before sending anything.
* You run the script as the user that runs Core. No root access is needed on either side.

### Download the Script

On the server that has the synced database (the source):

```bash
curl -fsSLO https://raw.githubusercontent.com/ArkEcosystem/core/master/scripts/ark-db-sync.sh
chmod +x ark-db-sync.sh
./ark-db-sync.sh --help
```

The receiving server doesn't need to download it. When pushing, the script copies itself over and runs the import there.

### Set Up an SSH Key Between the Servers

The source server connects to the receiving server (the target) over SSH. It needs a key the target accepts. If the target only allows key logins, for example after [securing it](/docs/core/security/intro), `ssh-copy-id` won't work, so add the key from your own SSH session instead.

On the source server, create a key and print it:

```bash
ssh-keygen -t ed25519 -N "" -f ~/.ssh/id_ed25519
cat ~/.ssh/id_ed25519.pub
```

On the target server, as the Core user, append that line to the authorized keys:

```bash
echo "ssh-ed25519 AAAA... ark@source" >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
```

### Push the Database to Another Server

With the key in place, a single command dumps the database, sends it over SSH and imports it on the target:

```bash
./ark-db-sync.sh push --to ark@203.0.113.20
```

If the target uses a custom SSH port and [port knocking](/docs/core/security/knocking), pass those as well. The script knocks before connecting, and keeps a single SSH connection open for the whole transfer, so it doesn't matter that the port closes again in the meantime:

```bash
./ark-db-sync.sh push --to ark@203.0.113.20 --ssh-port 55555 --knock 7000,8000,9000
```

The script will:

1. Check that the target has Core configured for the same network and has `rsync` and `pg_restore` available.
2. Reuse the latest complete dump on the source, or create a new one. Pass `--fresh` to always create a new dump, which also removes older dumps for that network.
3. Check that the target has enough free disk space, then send the dump with `rsync`. An interrupted transfer continues where it left off when you run the command again.
4. Stop the Core processes on the target that are managed by PM2, replace the database, and start the processes that were running again.

<x-alert type="info">
The import replaces the database on the target. The script asks for confirmation first, unless you pass `--yes`.
</x-alert>

### Share a Dump with Someone Else

You can also create a dump and import it as separate steps, for example to hand a dump to another node operator, or to keep one as a backup.

On the source server, create the dump:

```bash
./ark-db-sync.sh dump
```

The dump is saved in `~/ark-db-dumps/<network>-<height>-<date>`. It is a folder that is already compressed, so you can send it as it is with `rsync`, or pack it into a single file without compressing it again:

```bash
cd ~/ark-db-dumps
tar -cf mainnet-dump.tar mainnet-7740000-20261026-120000
sha256sum mainnet-dump.tar > mainnet-dump.tar.sha256
```

Share the `.tar` file together with its checksum, for example on a web server or file share. On the receiving server, [download the script](#download-the-script) to the home directory, verify and unpack the dump, then import it:

```bash
mkdir -p ~/ark-db-dumps && cd ~/ark-db-dumps
sha256sum -c mainnet-dump.tar.sha256
tar -xf mainnet-dump.tar
~/ark-db-sync.sh import --path ~/ark-db-dumps/mainnet-7740000-20261026-120000
```

The import checks that the dump is for the same network as your node, stops Core, replaces the database and starts Core again. Once Core is running it syncs the remaining blocks from the network.

### Using Core Snapshots Instead

Add `--method snapshot` to any of the commands above to use Core's own snapshots instead of `pg_dump`:

```bash
./ark-db-sync.sh push --to ark@203.0.113.20 --method snapshot
```

This uses `ark snapshot:dump` on the source, copies the snapshot to `~/.local/share/ark-core/<network>/snapshots` on the target, then runs `ark snapshot:truncate` and `ark snapshot:restore` there. It is slower than the `pg` method, but does not depend on the PostgreSQL versions on both servers.

To import a snapshot that is already on the server, pass its folder name:

```bash
./ark-db-sync.sh import --method snapshot --path 1-7740000
```

### Options

| Option | Description |
| :----- | :---------- |
| `--method pg\|snapshot` | `pg_dump`/`pg_restore` (default) or ARK snapshots |
| `--network NAME` | `mainnet`, `devnet` or `testnet`. Detected automatically if only one is configured |
| `--jobs N` | Parallel jobs for dump and restore. Defaults to the number of CPUs |
| `--to user@host` | `push`: the target server |
| `--ssh-port N` | `push`: the target's SSH port (default `22`) |
| `--knock a,b,c` | `push`: knock these ports on the target before connecting |
| `--path DIR` | `import`: the dump folder, or the snapshot folder name |
| `--keep-remote` | `push`: keep the dump on the target after importing |
| `--fresh` | `push`: always create a new dump, and remove older dumps for this network |
| `--no-start` | Don't start Core again after importing |
| `--yes` | Don't ask for confirmation |

<x-alert type="info">
**Why not just run `pg_restore`?** Core's database has check constraints that look up other rows, such as the nonce of a sender's previous transaction. `pg_dump` doesn't write rows in that order, so a plain restore fails, or takes hours on mainnet. The script removes these checks while loading and adds them back afterwards. They then apply to every new block, without checking all existing rows again, which were already validated on the source.
</x-alert>

### Copying Snapshots Manually

You can also copy a snapshot folder yourself, for example to store it in a different location. Use `rsync` over SSH, replacing `55555` with the target's SSH port and `1-7739894` with your snapshot's folder name. Knock first if the target uses [port knocking](/docs/core/security/knocking):

```bash
rsync -az --partial --info=progress2 -e "ssh -p 55555" \
    ~/.local/share/ark-core/mainnet/snapshots/1-7739894/ \
    ark@203.0.113.20:.local/share/ark-core/mainnet/snapshots/1-7739894/
```

`--partial` lets you resume an interrupted transfer by running the same command again. Once the copy is complete, log in to the target and follow [Restoring from a Snapshot](#restoring-from-a-snapshot).
