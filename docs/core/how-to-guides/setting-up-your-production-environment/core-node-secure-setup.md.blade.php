---
title: How To Setup a Server Running ARK Core?
---

# How To Setup a Server Running ARK Core? (APN | Mainnet)

Setting up the new ARK Core has never been easier! If you want to have your own instance up and running, this guide will help you set one up in a few minutes with some basic Linux knowledge.

**This guide is structured in a few sections:**

* **1. Short Guide for Setting Up Relay Node** — for those that have some basic knowledge about ARK and Linux, this is a simple, command based guide to get you up and running in no time.
* **2. Longer Guide For Setting Up Relay Node** — this is a more in depth step by step guide that covers all aspects of setting up a Relay Node.
* **3. Configuring And Starting the Forging Process** — those who want to be delegates will need to configure and start a separate Forger process in order to be able to confirm new blocks to run an active delegate.
* **4. Making A Snapshot** — snapshot functionality makes a backup of the current DB state so you can recover from it and get synced in no time. This should be done regularly in case you need to recover due to any unforeseen circumstance or to get you up and running quickly on additional servers.
* **5. Restoring From Snapshot** — process for restoring from a previously made snapshot.
* **6. Rollback Blockchain** — if you want to rollback your blockchain to some previous state \(eg. you forked or are testing something\).
* **7. Copying Snapshots Between Servers** — if you want to move a snapshot to a different server, either as independent backup or get your second node up and running quickly.

## Preparation

To start with the ARK Core install process, we recommend that you start with a clean server having at least the following minimum requirements.

### Minimum Requirements for Running Relay Node

* Ubuntu 16.x / 18.x.
* 1 CPU \(if you are going to run a Forger at least 2 dedicated CPUs\).
* 2–4 GB RAM \(if you are going to run a Forger at least 8GB RAM\).
* minimum 40 GB, recommended 60 GB drive \(we strongly recommend running it on SSD drive as there are a lot of read and write operations to the DB\).

## 1. Short Guide for Setting Up Relay Node

For those who are familiar with Linux and ARK, running these commands will install and initialize ARK Core. Login to your newly created server and run these commands in sequence. There is more detailed information in the section following the commands:

```bash
sudo adduser ark
sudo usermod -aG sudo ark
sudo su - ark
cd ~
bash <(curl -s https://raw.githubusercontent.com/ArkEcosystem/core/master/install.sh)
ark relay:start
```

_NOTE: if you are going to operate on Devnet, before you start the relay you will need to run this command to switch NPM channels to latest release \(don’t run this on Mainnet\):_

```bash
# only run this on Devnet, before you start relay process with ark  relay:start, DON'T START THIS ON MAINNET
ark config:cli --channel=next
```

This is all that is needed for getting Core installed and starting to sync. The specified commands will create an ARK user with sudo privileges, switch to the newly created user, run an installer script which installs all of the necessary dependencies, installs ARK Core, and publishes configuration files.

All you need to do is select which network you wish to connect to when prompted \(`mainnet` for public network, `devnet` for development network, or `testnet` for our private testing network\). For configuring the database you can use `ark` as database user, `password` as password, and `ark_mainnet` / `ark_devnet` as database name for default credentials or you can set your own. As a last step, start the relay Core process to get your server to start syncing with other peers \(it will take around 10+ hours at the moment to get to the current height, just leave it running\).

You can check logs by running `ark relay:log` or `pm2 logs`command. That is it!

_For the list of CLI commands supported by ARK Core please visit :_
[Using the CLI](/docs/core/command-line-interface-cli/getting-started)

## 2. Longer Guide for Setting Up a Relay Node

For those who want more detailed instructions with each of the above steps, please follow this guide.

### - Provision a Linux Server

With each provider, the setup process for creating a new virtual server is going to be different. You can choose one of the listed providers below, or use another VPS provider of your own choosing. You will need to follow the providers instructions to create the server instance.

* [Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-create-your-first-digitalocean-droplet)
* [Linode](https://www.linode.com/docs/getting-started/#provision-your-linode)
* [AWS](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html)
* [Vultr](https://www.vultr.com/)
* [Microsoft Azure](https://docs.microsoft.com/en-us/azure/virtual-machines/linux/overview)
* [OVH](https://support.ovhcloud.com/hc/en-us/articles/115001520890-Getting-Started-with-Servers)

### Connect to Your Server

After creating a server, you need to connect to it. Your provider should have given you an `IP address`, `username`, and `password` to connect to your new server.

This information can usually be found somewhere in your provider’s dashboard for your new server or be sent to your email.

Do note that your IP and default SSH port \(default is 22, can be something else\) are assigned by your provider and can vary depending on who you use.

Depending on your operating system you will connect to your server in different ways. Windows users will want to use something like [PuTTy](https://putty.org/) or the newer [Windows Subsystem for Linux](https://docs.microsoft.com/en-us/windows/wsl/install-win10). When using the WSL, the Linux part of this guide should be relevant.

**Windows**

Open PuTTy and place the `IP address` given to you by your provider in the `Host Name` field as shown below. You should probably save this host, so you don't have to enter it every time.

![](/storage/docs/docs/core/assets/howtosetupanewserverimage1.jpeg)

**MacOS / Linux**

Open up a new terminal window and type in the following to connect to your new server via `SSH` \(replace user and IP address with the one provided by the hosting provider\).

```bash
ssh user@ipaddress
```

When first connecting to your new server, you will be asked to cache the servers host key and validate the RSA fingerprint, click yes. If this message appears after you have already configured your server, take precautions, it might have been compromised.

```bash
The authenticity of host '{SERVER_IP}' can't be established.
ECDSA key fingerprint is SHA256:kgjgjfihut985ht984754643354+hrQ.
Are you sure you want to continue connecting (yes/no)? y
```

When prompted, use the password given to you by your hosting provider. Some providers will require you to set up a root password when creating the VM, while others may give you a temporary password.

### Create a user

Executing this guide as the root user should be avoided. Instead, create a new dedicated user to manage ARK related software. On your server, type the following into the command line and press enter. `username` is the name you want to log in with with. We’ll illustrate it as **`sudo adduser ark`** to create a user by the name of ‘ark’, but you can chose something else, if preferred.

```
`sudo adduser <username>` //in our example we'll create user by the name of 'ark' so we'll replace <username> with ark and run:
`sudo adduser ark`
```

You will need to enter a user password and confirm it by entering the same password again. After that, you will be prompted to enter in the user’s full name and some other information. Feel free to leave them all blank, as they are optional, by pressing ‘enter’. When prompted to confirm, type ‘Y’ and press ‘enter’ to finish.

```bash
Adding user 'ark' ...
Adding new group 'ark' (1000) ...
Adding new user 'ark' (1000) with group 'ark' ...
Creating home directory '/home/ark' ...
Copying files from '/etc/skel' ...
Enter new UNIX password:
Retype new UNIX password:
passwd: password updated successfully
Changing the user information for ark
Enter the new value, or press ENTER for the default
    Full Name []:
    Room Number []:
    Work Phone []:
    Home Phone []:
    Other []:
Is the information correct? [Y/n] Y
```

### Granting sudo privileges

Next, we need to make sure that our user has all of the necessary privileges for it to run ARK Core properly. Type the command below into your command line and press ‘enter’. In this example, `ark` is the name of the new account you created, but it can be a different user name depending on what you chose in previous step. This will give our user `sudo` privileges.

```bash
usermod -a -G sudo ark
```

### Installing ARK Core

We’re now ready to begin installing Ark. The initial install may take a while, and at times, appear to not be doing anything. Please be patient and let the process finish.

### Switch to the ARK user

While installing Ark Core, we should use the ark user that we created above and go to the base directory. To switch to it \(again, it can be different than `ark` depending on your choice of user names in first step where we created the new user\), run:

```bash
sudo su - ark
cd ~
```

### Running ARK Core installation script

Installing ARK Core is a straightforward process. We will use the ARKinstaller script that will install all of the necessary dependencies and ARK Core onto your server, and publish configuration files for it. To install, run this command \(copy and paste it, this is a one line command\):

```bash
bash <(curl -s https://raw.githubusercontent.com/ArkEcosystem/core/master/install.sh)
```

You will be asked to input your current users password for sudo privileges:

```bash
[sudo] password for ark: <input your password for user you created>
```

Write or paste it and press `enter` to start installation process.

The install process might take a while, don’t interrupt it, wait for it to finish.

### Selecting ARK Core network

Once the installation of dependencies and ARK Core is finished you will need to select which network you wish to operate on. This can be achieved by pressing `up` or `down` arrow keys and confirming selection with `enter`.

`Mainnet` is the public network, `Devnet` is the development network for testing, and `Testnet` is our private testing network.

```bash
? What network do you want to operate on? › - Use arrow-keys. Return to submit.
   devnet
❯  mainnet
   testnet
```

<x-alert type="info">
Experimenting with `Devnet`? Create an Address using the [ARK Desktop Wallet](https://ark.io/download#desktop-wallet), then head over to [Discord](https://discord.ark.io) and visit the **`#community_bots`** channel. Use the **`!faucet`** command to receive DARK tokens.
</x-alert>

After you have made your selection, you will need to confirm by pressing `y` and confirm again with `enter`

```bash
? Can you confirm? › (y/N)
```

With that we have successfully installed ARK Core and published our configuration options.

### Configuring ARK Core database

The last step of the required ARK Core configuration is to configure the database parameters. You will be presented with a prompt:

```bash
Would you like to configure the database? [y/N]:
```

Press `y` and confirm with `enter`.

You can input any custom database credentials that you want to use, or you can use the one provided below, by replacing “ark\_network” with the network you plan to operate on \(eg. ark\_mainnet, ark\_devnet, ark\_testnet\):

```bash
Enter the database username: ark
Enter the database password: password
Enter the database name: ark_network
```

This will create a PostgreSQL role and database to be used for storing blockchain data. That’s it, you are all set!

### Starting ARK Relay process

_NOTE: if you are going to operate on Devnet, before you start relay you will need to run this command to switch NPM channels to latest release \(do not run this on Mainnet\):_

```bash
ark config:cli --channel=next
//only run this on Devnet, before you start the relay process with
ark relay:start // DON'T RUN THIS ON MAINNET
```

To start the ARK relay process, and with it the synchronization process with the ARK blockchain, we need to start the relay process with our integrated CLI:

```bash
ark relay:start
```

When the process has started you will get a message:

```bash
Starting ark-relay... done
```

<x-alert type="info">
All of the CLI commands with a description can be viewed in our [Core CLI](/docs/core/command-line-interface-cli/getting-started) documentation or by running the `ark help`command.
</x-alert>


### Checking to see if everything is working

Now we want to see if the ARK Relay process has started the synchronization process. You can do that by running one of these two commands:

```bash
ark relay:log
// OR RUN
pm2 logs
```

If the process has started, you will see a lot of messages like this, with actual data.

```bash
[YYYY-DD-MM hh:mm:ss][DEBUG]: Delegate <delegate name> (<public key>) allowed to forge block <#> 👍
```

Note that depending on the network you use, synchronization of the blockchain can take upwards of 10 hours \(on Public Network\).

Once the syncing finishes you will see messages ‘Delegate allowed to forge’ about every 8 seconds. You can always check the current height of the blockchain on our [Explorer](https://explorer.ark.io/).

<x-alert type="info">
Extra security guide: if you want to secure your server with additional security countermeasures, please give this **“How To Secure Your ARK Node”** guide a read.
</x-alert>

<livewire:page-reference path="/docs/core/how-to-guides/setting-up-your-production-environment/how-to-secure-your-ark-node" />

## 3. Configuring and Starting the Forger Process

This part should only be followed if you intend to run a delegate or are planning to become one. First you need to make sure you register your ARK address as a delegate. You can do this inside the Desktop Wallet, by clicking on your wallet \(make sure you have enough funds in the address you want to register\) and click on the 3 dots in the upper right corner in the wallet address for which you wish to register the delegate, and click on ‘Register delegate’, sign the tx, and let it confirm. After that, we need to configure it on our relay node we previously configured. Login to your server and run this command:

```bash
ark config:forger
```

This will bring up an interactive menu where you have two options of setting up your forger passphrase, ‘Encrypted BIP38’ or ‘Plain BIP39’.

Chose the preferred method using the `up` and `down` arrow keys, confirm it with the `enter` key, and configure according to the screen instructions. Note that when writing a BIP39 passphrase \(12 words\) make sure you either paste it from the file or write it as it was shown when you generated it — all lower case, words separated by space, no space at the end.

```bash
? What method would you like to use to store your passphrase? › - Use arrow-keys. Return to submit.
❯  Encrypted BIP38 (Recommended)
   Plain BIP39
```

* _**Encrypted BIP38**_ will encrypt your BIP39 passphrase with your custom password and save the encrypted passphrase. In order to decrypt it you will need to provide your set password so back it up as well. Once you set this up you will need to confirm with the “y” and “enter” keys.
* _**Plain BIP39**_ will save your 12 word passphrase in plain format. Once you set this up you will need to confirm with the “y” and “enter” keys.

An example of setting up **Encrypted BIP38** passphrase:

```bash
ark config:forger

✔ What method would you like to use to store your passphrase?

› Encrypted BIP38 (Recommended)

✔ Please enter your delegate passphrase …
you will write your 12 word passphrase (all lower case, 12 words, separated by space)

✔ Please enter your desired BIP38 password …
your desired password to decrypt your passphrase

✔ Can you confirm? …
pressing 'Y' + enter to confirm  ✔ Prepare configuration

  ✔ Validate passphrase
  ✔ Prepare crypto
  ✔ Loading private key
  ✔ Encrypt BIP38
```

An example of setting up **Plain BIP39** passphrase:

```bash
ark config:forger

✔ What method would you like to use to store your passphrase?

›Plain BIP39

✔ Please enter your delegate passphrase …
you will write your 12 word passphrase (all lower case, 12 words, separated by space)

✔ Can you confirm? …
pressing 'Y' + enter to confirm

✔ Prepare configuration
  ✔ Validate passphrase
  ✔ Write BIP39 to configuration
```

> _Note:_ passphrase \(encrypted or not\) is saved in file delegates.json in: `/home/ark/.config/ark-core/<network>/delegates.json` \(where you replace &lt;network&gt; with network you operate on \(mainnet, devnet, testnet\). You can also run command `ark env:paths` to get this information.

Once you set this up you need to start the Forger process by writing:

```bash
ark forger:start
```

When the process has started, you will get a message:

```bash
Starting ark-forger... done
```

This will initiate and read your passphrase and start the Forger process. You can check Forger logs by writing one of this commands:

```bash
pm2 logs ark-forger
// OR RUN
ark forger:log
```

If you set it up successfully, after your node is fully synced, you should see an output similar to this, but with your own delegate name and your delegate’s public key:

```bash
2|ark-forger | [2019-03-20 12:12:36][DEBUG]: Loaded 1 delegate: undefined (02297e602dcb3e6ee81205e9e0a7754d50cf3791b06b01fb6e9dde17059b1fb1ba)
2|ark-forger | [2019-03-20 12:12:36][INFO]: Forger Manager started with 1 forger
```

This is it — you have now successfully set up a Relay and Forger!

## 4. Making a Snapshot

Snapshot functionality is a built-in feature of the Core that you can easily use with the integrated CLI. Snapshot makes a backup of the current DB state so you can recover from a previously made snapshot and get synced much faster than syncing from 0.

This function should be done at least once per month if you need to recover due to some failure down the road \(database corruption, database integrity failure, …\) or to quickly set up on additional servers.

Making use of this feature makes most sense once your node is fully synced \(up to latest height\). To make latest snapshot run this command:

```bash
ark snapshot:dump
```

This will start up the snapshot process. Don’t interrupt it, as it might take a while, depending on the size of the blockchain. You’ll see a message, something along these lines, as time goes on:

```bash
[2019-03-20 12:57:40][INFO]: Snapshots: Database connected
[2019-03-20 12:57:40][INFO]: Starting to export table blocks to folder 1-7739750, codec: lite, append:false, skipCompression: false
[2019-03-20 13:01:55][INFO]: Snapshot: blocks done. ==> Total rows processed: 7739750, duration: 255150 ms
[2019-03-20 13:01:55][INFO]: Starting to export table transactions to folder 1-7739750, codec: lite, append:false, skipCompression: false
```

After it’s done, you’ll see this message informing you that the process to create the snapshot was shut down and you can now continue:

```bash
[2019-03-20 13:03:18][INFO]: Snapshot: transactions done. ==> Total rows processed: 2089576, duration: 82323 ms
[2019-03-20 13:03:18][DEBUG]: Closing snapshots-cli database connection
[2019-03-20 13:03:18][INFO]: Core is trying to gracefully shut down to avoid data corruption
```

This is it! You just made a backup of the blockchain.

You can see a list of all completed snapshots in this filepath \(_replace_ _**&lt;network&gt;**_ _with the network you operate on — mainnet,devnet,testnet_\):

```bash
ls /home/ark/.local/share/ark-core/<network>/snapshots
example:
ls /home/ark/.local/share/ark-core/mainnet/snapshots
//In our example it made backup of blockchain 1-7739750 which means
 from height 1 to height 7739750
```

_Useful tip: next time you want to make a snapshot, you can just append data to one of the previously made snapshots to save time. Lets use our snapshot we made in the previous step \(directory filename 1–7739750\) and append the difference of current height to it to have an up-to-date snapshot ready. We’ll run the command, replacing the filename with yours, which can be obtained by running the command from previous paragraph_ ``**`ls /home/ark/.local/share/ark-core/<network>/snapshots`** _to list files. Let’s run this to append data to previous backup:_

```bash
ark snapshot:dump --blocks=1-7739750
//replace 1-7739750 with your own folder from previously created snapshot.
```

You should get message like this if you ran it correctly:

```bash
[2019-03-20 13:16:45][INFO]: Snapshots: Database connected
[2019-03-20 13:16:45][INFO]: Copying snapshot from 1-7739750 to a new file 1-7739894 for appending of data
[2019-03-20 13:16:52][INFO]: Starting to export table blocks to folder 1-7739894, codec: lite, append:true, skipCompression: false
[2019-03-20 13:16:52][INFO]: Snapshot: blocks done. ==> Total rows processed: 144, duration: 18 ms
[2019-03-20 13:16:52][INFO]: Starting to export table transactions to folder 1-7739894, codec: lite, append:true, skipCompression: false
[2019-03-20 13:16:52][INFO]: Snapshot: transactions done. ==> Total rows processed: 248, duration: 43 ms
[2019-03-20 13:16:52][DEBUG]: Closing snapshots-cli database connection
[2019-03-20 13:16:52][INFO]: Core is trying to gracefully shut down to avoid data corruption
```

We do recommend that you also take full \(complete, unappended\) snaps regularly as well as appending in case a snapshot gets corrupted after appending.

We now have a new and up-to-date snapshot!

## 5. Restoring from Snapshot

The process for restoring from a previously made snapshot is pretty straightforward. We’ll again make use of the integrated CLI Snapshot.

First, let’s stop the ARK Relay process, if we have it currently running, with:

```bash
ark relay:stop
```

After that we’ll run the restore command:

```bash
ark snapshot:restore --blocks=<folder name>
//replace <folder name> with your previously made latest snapshot
in our case lets use 1-7739894 so we'd run this command to restore:
ark snapshot:restore --blocks=1-7739894
```

You will see a message similar to this. It will take some time, so leave it running:

```bash
[2019-03-20 13:22:09][INFO]: Snapshots: Database connected
[2019-03-20 13:22:09][INFO]: Starting to import table blocks from /home/ark/.local/share/ark-core/mainnet/snapshots/1-7739894/blocks.lite, codec: lite, skipCompression: false
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░ 0% | ETA: 0s | 1/7739894 | Duration: 0s(node:4996) ExperimentalWarning: Readable[Symbol.asyncIterator] is an experimental feature. This feature could change at any time
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░ 0% | ETA: 0s | 1/7739894 | Duration: 34s[2019-03-20 13:23:51][INFO]: Import from folder 1-7739894 completed. Last block in database: 7,739,947
[2019-03-20 13:23:51][INFO]: Rolling back chain to last finished round with last block height 7,739,913
[2019-03-20 13:23:51][DEBUG]: Closing snapshots-cli database connection
[2019-03-20 13:23:51][INFO]: Core is trying to gracefully shut down to avoid data corruption
```

After it is completed, we need to start the relay process again for it to resync \(if applicable\) back to current height:

```bash
ark relay:start
```

## 6. Rollback Blockchain

The rollback function is specifically useful if you forked, your node cannot seem to process new blocks, and you want to resync from the network from specified height.

First, let’s stop the ARK Relay process with:

```bash
ark relay:stop
```

After that, we’ll make use of Snapshot command _**rollback**_ — for this case we can use two commands:

### Rolling back to a specific height
```bash
ark snapshot:rollback --height=<height>

//where we replace <height> with a height we want to rollback to and
start to sync from the network. In our case lets say current
blockchain height is 7,740,000 and if we want to go back 2,000 blocks
we'll input 7739000 in <height> so we'll run. We'd run:

ark snapshot:rollback --height=7738000
```

You’ll see a message similar to this:

```bash
ark snapshot:rollback --height=7738000[2019-03-20 13:49:18][INFO]: Snapshots: Database connected
[2019-03-20 13:49:18][INFO]: Starting the process of blockchain rollback to block height of 7,738,000
[2019-03-20 13:49:18][INFO]: 1259 transactions from rollbacked blocks safely exported to file rollbackTransactionBackup.7738001.7740137.json
[2019-03-20 13:49:18][INFO]: Rolling back chain to last finished round 151,725 with last block height 7,737,975
[2019-03-20 13:49:18][DEBUG]: Closing snapshots-cli database connection
[2019-03-20 13:49:18][INFO]: Core is trying to gracefully shut down to avoid data corruption
```

After it is finished, we need to start the relay process again for it to resync from the previously rolled back state and sync back up to the current height by running:

```bash
ark relay:start
```

### Rolling back to a specific number of blocks

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
ark snapshot:rollback --number=2000
[2019-03-20 13:49:18][INFO]: Snapshots: Database connected
[2019-03-20 13:49:18][INFO]: Starting the process of blockchain rollback to block height of 7,738,000
[2019-03-20 13:49:18][INFO]: 1259 transactions from rollbacked blocks safely exported to file rollbackTransactionBackup.7738001.7740137.json
[2019-03-20 13:49:18][INFO]: Rolling back chain to last finished round 151,725 with last block height 7,737,975
[2019-03-20 13:49:18][DEBUG]: Closing snapshots-cli database connection
[2019-03-20 13:49:18][INFO]: Core is trying to gracefully shut down to avoid data corruption
```

After it is finished, we need to start the relay process again for it to resync from the previously rolled back state and sync back up to the current height by running:

```bash
ark relay:start
```

Let it sync back, and you are back in business!

## 7. Copying Snapshots Between Servers

If you want to copy a snapshot to another server you own to bring it quickly into sync or to store a copy in a different location, we can make use of SCP \(Secure Copy Protocol\) which supports secure file transfers between different hosts.

SCP allows files to be copied to / from / between different hosts. It uses SSH protocol for transfers and provides the same authentication and level of security as SSH.

If you want to copy files from one server to another, we’ll run this command where we need to replace `<network>` with the network you operate on \(in our example mainnet\), `<folder-name>` with snapshot name we are copying in our example it will be 1–7739894, `<username>` with username of the server we are copying to and `<IP>` with its IP address:

```bash
scp -r /home/ark/.local/share/ark-core/<network>/snapshots/<folder-name> <username>@IP:/home/ark/.local/share/ark-core/<network>/snapshots/<folder-name>

// to put this into a practical example:

scp -r /home/ark/.local/share/ark-core/mainnet/snapshots/1–7739894 ark@111.11.11.1:/home/ark/.local/share/ark-core/mainnet/snapshots/1–7739894
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

Your files will begin copying from one server to another. Wait until it completes, and you are good to go! If you wish to restore from the snapshot on your second server, login to that server and follow “_Restoring from the Snapshot_” above.
