---
title: Deployment - Starting a Relay
---

# Starting a Relay

Setting up the new ARK Core has never been easier! If you want to have your own instance up and running, this guide will help you set one up in a few minutes with some basic Linux knowledge.

**This guide is structured in a few sections:**

* **1. A Guide For Setting Up Relay Node** — this is a more in depth step by step guide that covers all aspects of setting up a Relay Node.
* **2. Configuring And Starting the Forging Process** — those who want to be delegates will need to configure and start a separate Forger process in order to be able to confirm new blocks to run an active delegate.
* **3. Making A Snapshot** — snapshot functionality makes a backup of the current DB state so you can recover from it and get synced in no time. This should be done regularly in case you need to recover due to any unforeseen circumstance or to get you up and running quickly on additional servers.
* **4. Restoring From Snapshot** — process for restoring from a previously made snapshot.
* **5. Rollback Blockchain** — if you want to rollback your blockchain to some previous state (eg. you forked or are testing something).
* **6. Copying Snapshots Between Servers** — if you want to move a snapshot to a different server, either as independent backup or get your second node up and running quickly.

## Step 1: Provision a Linux Server

With each provider, the setup process for creating a new virtual server is going to be different. You can choose one of the listed providers below, or use another VPS provider of your own choosing. You will need to follow the providers instructions to create the server instance.

* [AWS](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html)
* [Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-create-your-first-digitalocean-droplet)
* [Google Cloud](https://cloud.google.com/free/)
* [Linode](https://www.linode.com/docs/getting-started/#provision-your-linode)
* [Microsoft Azure](https://docs.microsoft.com/azure/virtual-machines/linux/overview)
* [OVH](https://docs.ovh.com/us/en/vps/getting-started-vps/)
* [Vultr](https://www.vultr.com/)

## Step 2: Connect to Your Server

After creating a server, you need to connect to it. Your provider should have given you an `IP address`, `username`, and `password` to connect to your new server.

This information can usually be found somewhere in your provider’s dashboard for your new server or be sent to your email.

Do note that your IP and default SSH port (default is 22, can be something else) are assigned by your provider and can vary depending on who you use.

Depending on your operating system you will connect to your server in different ways. Windows users will want to use something like [PuTTy](https://putty.org/) or the newer [Windows Subsystem for Linux](https://docs.microsoft.com/windows/wsl/install-win10). When using the WSL, the Linux part of this guide should be relevant.

`Windows`

Open PuTTy and place the `IP address` given to you by your provider in the `Host Name` field as shown below. You should probably save this host, so you don't have to enter it every time.

![](/storage/docs/docs/core/assets/howtosetupanewserverimage1.jpeg)

`MacOS / Linux`

Open up a new terminal window and type in the following to connect to your new server via `SSH` (replace user and IP address with the one provided by the hosting provider).

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

## Step 3: Create a user

Executing this guide as the root user should be avoided. Instead, create a new dedicated user to manage ARK related software. On your server, type the following into the command line and press enter. `username` is the name you want to log in with with. We’ll illustrate it as **`adduser ark`** to create a user by the name of ‘ark’, but you can chose something else, if preferred.

```bash
sudo adduser <username> //in our example we'll create user by the name of 'ark' so we'll replace <username> with ark and run:
sudo adduser ark
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

## Step 4: Granting sudo privileges

Next, we need to make sure that our user has all of the necessary privileges for it to run ARK Core properly. Type the command below into your command line and press ‘enter’. In this example, `ark` is the name of the new account you created, but it can be a different user name depending on what you chose in previous step. This will give our user `sudo` privileges.

```bash
sudo usermod -a -G sudo ark
```

## Step 5: Installing ARK Core

We’re now ready to begin installing Ark. The initial install may take a while, and at times, appear to not be doing anything. Please be patient and let the process finish.

## Step 6: Switch to the ARK user

While installing Ark Core, we should use the ark user that we created above and go to the base directory. To switch to it (again, it can be different than `ark` depending on your choice of user names in first step where we created the new user), run:

```bash
sudo su - ark
```

## Step 7: Running ARK Core installation script

Installing ARK Core is a straightforward process. We will use the ARK installer script that will install all of the necessary dependencies and ARK Core onto your server, and publish configuration files for it. To install, run this command (copy and paste it, this is a one line command):

```bash
sudo apt-get install curl

bash <(curl -s https://raw.githubusercontent.com/ArkEcosystem/core/master/install.sh)
```

You will be asked to input your current users password for sudo privileges:

```bash
[sudo] password for ark: <input your password for user you created>
```

Write or paste it and press `enter` to start installation process.

The install process might take a while, don’t interrupt it, wait for it to finish.

## Step 8: Selecting ARK Core network

Once the installation of dependencies and ARK Core is finished you will need to select which network you wish to operate on. This can be achieved by pressing `up` or `down` arrow keys and confirming selection with `enter`.

`Mainnet` is the public network, `Devnet` is the development network for testing, and `Testnet` is our private testing network.

```bash
? What network do you want to operate on? › - Use arrow-keys. Return to submit.
    devnet
❯   mainnet
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

## Step 9: Configuring ARK Core database

The last step of the required ARK Core configuration is to configure the database parameters. You will be presented with a prompt:

```bash
Would you like to configure the database? [y/N]:
```

Press `y` and confirm with `enter`.

---

Input the database credentials of your choosing.

```bash
Enter the database username: ark
Enter the database password: password
Enter the database name: <network_name> # your chosen network name
```

<x-alert type="warning">
Replace `<network_name>` with the appropriate custom or pre-defined network name (e.g. '**ark_mainnet**', '**ark_devnet**', '**ark_testnet**').
</x-alert>

This will create a PostgreSQL role and database to be used for storing blockchain data. That’s it, you are all set!

## Step 10: Starting ARK Relay process

_NOTE: if you are going to operate on Devnet, before you start relay you will need to run this command to switch NPM channels to latest release (do not run this on Mainnet):_

```bash
# only run these on Devnet, before starting the relay process with 'ark relay:start'
# !!! DO NOT RUN THESE ON MAINNET !!!
ark config:cli --channel=next
rm -rf ~/.config/ark-core/ && ark config:publish --network=devnet --reset
```

```bash
ark config:cli --channel=next
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
All of the CLI commands with a description can be viewed in our [Core CLI](/docs/core/deployment/cli) documentation or by running the `ark help`command.
</x-alert>

## Step 11: Checking that Everything is Working

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

Note that depending on the network you use, synchronization of the blockchain can take upwards of 10 hours (on Public Network).

Once the syncing finishes you will see messages ‘Delegate allowed to forge’ about every 8 seconds. You can always check the current height of the blockchain on our [Explorer](https://explorer.ark.io/).

<x-alert type="info">
Extra security guide: if you want to secure your server with additional security countermeasures, please give this **"How To Secure Your ARK Node"** guide a read.
</x-alert>

<livewire:page-reference path="/docs/core/security/intro" />
