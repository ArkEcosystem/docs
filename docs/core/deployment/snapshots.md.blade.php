---
title: Deployment - Using Snapshots
---

# Using Snapshots

Snapshot functionality is a built-in feature of the Core that you can easily use with the integrated CLI. Snapshot makes a backup of the current DB state so you can recover from a previously made snapshot and get synced much faster than syncing from 0.

* [Creating a Snapshot](#creating-a-snapshot)
* [Restoring from a Snapshot](#restoring-from-a-snapshot)
* [Rolling back a Blockchain](#rolling-back-a-blockchain)
* [Using a Database Dump Instead](#using-a-database-dump-instead)
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

## Using a Database Dump Instead

Instead of Core snapshots, you can also back up the database with PostgreSQL's own `pg_dump` and `pg_restore` tools. This is a lot faster, especially on mainnet, as both the dump and the restore run in parallel, and the dump can be created while Core keeps running.

<x-alert type="warning">
We recommend using [snapshots](#creating-a-snapshot) instead. A database dump is imported as it is: Core doesn't verify the blocks and transactions in it, and the restore below skips the database checks for existing rows. Only use a database dump if you understand the steps below and fully trust the source of the dump, for example because it comes from your own server.
</x-alert>

The examples below use the default database name `ark_mainnet` and user `ark`. Look up the values for your node in its configuration, replacing `<network>` with the network you operate on:

```bash
grep CORE_DB ~/.config/ark-core/<network>/.env
```

Then make them available to the PostgreSQL tools for the current session, replacing the values with the ones from your configuration:

```bash
export PGHOST=localhost PGPORT=5432 PGUSER=ark PGPASSWORD=password
```

### Creating a Database Dump

Check the current height, so you can include it in the name of the dump:

```bash
psql -d ark_mainnet -tAc "SELECT max(height) FROM blocks"
```

Then create the dump, replacing `7740000` with that height. It uses the directory format, so it can run in parallel with one job per CPU:

```bash
mkdir -p ~/ark-db-dumps
pg_dump -d ark_mainnet --format=directory --jobs=$(nproc) --compress=zstd:3 \
    --no-owner --no-privileges --file=$HOME/ark-db-dumps/mainnet-7740000
```

<x-alert type="info">
Compressing with `zstd` requires PostgreSQL 16 or newer. Check your version with `pg_dump --version`, and use `--compress=6` instead on older versions.
</x-alert>

The dump is a folder that is already compressed, so it doesn't need to be compressed again when you copy or pack it.

### Restoring a Database Dump

The version of `pg_restore` on the server you restore to must be the same or newer than the version of `pg_dump` that created the dump. Check it with `pg_restore --version`. Servers set up with the [install script](/docs/core/installation/script) all run PostgreSQL 18.

First, stop the relay and the forger (if you run one on this server):

```bash
ark relay:stop
ark forger:stop
```

Remove the current database and create an empty one, owned by your Core database user:

```bash
psql -d postgres -c 'DROP DATABASE IF EXISTS ark_mainnet WITH (FORCE)'
psql -d postgres -c 'CREATE DATABASE ark_mainnet OWNER ark'
```

Restore the tables first, without any data, replacing the path with the location of your dump:

```bash
pg_restore -d ark_mainnet --no-owner --no-privileges --exit-on-error \
    --section=pre-data ~/ark-db-dumps/mainnet-7740000
```

Core's database has check constraints that look up other rows, such as the nonce of a sender's previous transaction. `pg_dump` doesn't write rows in that order, so loading the data with these checks in place fails, or takes hours on mainnet. Save the checks to a file, so you can add them back later:

```bash
psql -d ark_mainnet -tA -v ON_ERROR_STOP=1 -o ~/ark-checks.sql <<'SQL'
SELECT format('ALTER TABLE %I.%I ADD CONSTRAINT %I %s NOT VALID;',
              n.nspname, t.relname, c.conname,
              regexp_replace(pg_get_constraintdef(c.oid), '\s+NOT VALID$', ''))
FROM pg_constraint c
JOIN pg_class t ON t.oid = c.conrelid
JOIN pg_namespace n ON n.oid = t.relnamespace
WHERE c.contype = 'c' AND n.nspname = 'public';
SQL
```

Then remove the checks from the database:

```bash
psql -d ark_mainnet -v ON_ERROR_STOP=1 <<'SQL'
DO $$
DECLARE r record;
BEGIN
    FOR r IN SELECT n.nspname, t.relname, c.conname
             FROM pg_constraint c
             JOIN pg_class t ON t.oid = c.conrelid
             JOIN pg_namespace n ON n.oid = t.relnamespace
             WHERE c.contype = 'c' AND n.nspname = 'public'
    LOOP
        EXECUTE format('ALTER TABLE %I.%I DROP CONSTRAINT %I', r.nspname, r.relname, r.conname);
    END LOOP;
END $$;
SQL
```

Restore the data and indexes in parallel. This is the step that takes the longest:

```bash
pg_restore -d ark_mainnet --no-owner --no-privileges --exit-on-error \
    --section=data --section=post-data --jobs=$(nproc) ~/ark-db-dumps/mainnet-7740000
```

Add the checks back and update the database statistics:

```bash
psql -d ark_mainnet -v ON_ERROR_STOP=1 -f ~/ark-checks.sql
psql -d ark_mainnet -c 'ANALYZE'
```

The checks are added as `NOT VALID`: they apply to every new block from now on, but the rows from the dump are not checked again. This is why you should only restore a dump from a source you trust.

Finally, start the relay (and the forger, if applicable) again. It syncs the remaining blocks from the network:

```bash
ark relay:start
```

## Sharing a Database Between Servers

Syncing a new node from height 0 can take days. If you already run a synced node, or someone you trust does, it is much faster to copy its database. This comes down to three steps: create a backup on the server with the synced database (the source), send it to the new server (the target), and import it there.

<x-alert type="warning">
Only import a database from a server you control or from someone you trust. A backup replaces your entire chain.
</x-alert>

Both servers need to run the same network (`mainnet`, `devnet` or `testnet`), and the target needs at least **twice** the size of the backup in free disk space.

### Create a Backup

On the source, create a backup in one of two ways:

| Method | Steps | When to use |
| :----- | :---- | :---------- |
| **Snapshot** (recommended) | [Creating a Snapshot](#creating-a-snapshot) | Core-native format, works across PostgreSQL versions |
| **Database dump** | [Creating a Database Dump](#creating-a-database-dump) | A lot faster and can run while Core keeps running, but only if you [trust the source](#using-a-database-dump-instead) |

### Set Up an SSH Key Between the Servers

The source connects to the target over SSH to send the backup, so it needs a key the target accepts.

<x-alert type="warning">
Only set this up between servers you control. To share a backup with someone else, don't give them SSH access to your server, but let them download it instead, as described in [Share a Backup with Someone Else](#share-a-backup-with-someone-else).
</x-alert>
 If the target only allows key logins, for example after [securing it](/docs/core/security/intro), `ssh-copy-id` won't work, so add the key from your own SSH session instead.

On the source, create a key and print it:

```bash
ssh-keygen -t ed25519 -N "" -f ~/.ssh/id_ed25519
cat ~/.ssh/id_ed25519.pub
```

On the target, as the user that runs Core, append that line to the authorized keys:

```bash
echo "ssh-ed25519 AAAA... ark@source" >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
```

### Send the Backup

Copy the backup with `rsync`, which needs to be installed on both servers:

```bash
sudo apt-get install -y rsync
```

If the target uses [port knocking](/docs/core/security/knocking), knock first. Then run the command for your backup on the source, replacing `55555` with the target's SSH port.

For a snapshot, replacing `1-7740000` with the folder name of your snapshot:

```bash
ssh -p 55555 ark@203.0.113.20 'mkdir -p ~/.local/share/ark-core/mainnet/snapshots'
rsync -az --partial --info=progress2 -e "ssh -p 55555" \
    ~/.local/share/ark-core/mainnet/snapshots/1-7740000/ \
    ark@203.0.113.20:.local/share/ark-core/mainnet/snapshots/1-7740000/
```

For a database dump, which is already compressed, so `rsync` doesn't need to compress it again:

```bash
ssh -p 55555 ark@203.0.113.20 'mkdir -p ~/ark-db-dumps'
rsync -a --partial --info=progress2 -e "ssh -p 55555" \
    ~/ark-db-dumps/mainnet-7740000/ \
    ark@203.0.113.20:ark-db-dumps/mainnet-7740000/
```

`--partial` lets you resume an interrupted transfer by running the same command again.

### Share a Backup with Someone Else

To hand a backup to another node operator, let them download it instead of giving them SSH access to your server. First, pack the backup into a single file in a separate folder, and create a checksum for it. It doesn't need to be compressed again. For a snapshot, run the same commands from `~/.local/share/ark-core/mainnet/snapshots` with the snapshot's folder name:

```bash
mkdir -p ~/ark-db-share
cd ~/ark-db-dumps
tar -cf ~/ark-db-share/mainnet-7740000.tar mainnet-7740000
cd ~/ark-db-share
sha256sum mainnet-7740000.tar > mainnet-7740000.tar.sha256
```

You can share these files on any web server or file share you already use. If you don't have one, you can make them available temporarily with [ngrok](https://ngrok.com), without opening any ports on your server.

#### Sharing with ngrok

<x-alert type="info">
The free ngrok plan is limited to 1 GB of data transfer, which is not enough for a backup of mainnet or devnet. You'll need a paid plan to share a backup this way.
</x-alert>

Install ngrok and add the authtoken from your [ngrok dashboard](https://dashboard.ngrok.com/get-started/your-authtoken):

```bash
sudo snap install ngrok
ngrok config add-authtoken <your-authtoken>
```

Serve the folder with the backup on your server only. Run this in a separate session, for example with `screen` or `tmux`, as it keeps running until you stop it:

```bash
cd ~/ark-db-share
python3 -m http.server 8000 --bind 127.0.0.1
```

Then open a tunnel to it from another session:

```bash
ngrok http 8000
```

ngrok shows a public `https://` address under `Forwarding`. Send that address to the other operator, and send them the checksum through another channel, for example in a chat message, so they can check that the download wasn't tampered with.

<x-alert type="warning">
Anyone with the address can download the files while the tunnel is open, and everything in the folder you serve is visible. Only serve the folder with the backup, and stop both `ngrok` and the web server with `Ctrl+C` once the download is done.
</x-alert>

#### Downloading the Backup

The receiving operator downloads the backup to the same location as [above](#send-the-backup), `~/ark-db-dumps` for a database dump or `~/.local/share/ark-core/<network>/snapshots` for a snapshot. Replace the address with the one you received. `-C -` resumes an interrupted download when you run the command again:

```bash
mkdir -p ~/ark-db-dumps && cd ~/ark-db-dumps
curl -fL -C - -O https://example.ngrok.app/mainnet-7740000.tar
```

Then check it against the checksum you received, and unpack it:

```bash
echo "<checksum>  mainnet-7740000.tar" | sha256sum -c
tar -xf mainnet-7740000.tar && rm mainnet-7740000.tar
```

### Import the Backup

On the target, import the backup with the same method you used to create it:

* For a snapshot, follow [Restoring from a Snapshot](#restoring-from-a-snapshot).
* For a database dump, follow [Restoring a Database Dump](#restoring-a-database-dump).

Once Core is running again, it syncs the remaining blocks from the network.
