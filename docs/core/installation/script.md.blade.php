---
title: Installation - Using the Install Script
---

# Using the Install Script

A step-by-step guide on how to prepare a fully-functional **Development** environment using the install script.

<x-alert type="success">
If you plan on using Core V3 for production purposes, consider setting up a **Production** environment by [Installing from Source](/docs/core/installation/source).
</x-alert>

---

<x-alert type="success">
If you don't have access to a Linux box you can quickly setup one on [DigitalOcean](https://cloud.digitalocean.com) by using this **$100** referral link: [Referral Link](https://m.do.co/c/09d061526b12).
</x-alert>

## Getting Started

The instructions on this page will guide you through creating a new user account with the correct privileges, installing and configuring ARK Core, then starting a relay instance and logging the output using the installation script.

Directly below is a quick summary of these install commands:

```bash
sudo adduser ark
sudo usermod -a -G sudo ark
sudo su - ark

bash <(curl -s https://raw.githubusercontent.com/ArkEcosystem/core/master/install.sh)

ark relay:start

pm2 logs
```

<x-alert type="info">
Installing **Devnet** via `install.sh` requires additional steps to ensure the latest `@next` version is used. Proceed to the '[Additional Devnet Steps](#additional-devnet-steps)' section for further instructions.
</x-alert>

## Step-by-Step Installation via the Script

If you are planning to setup a new server you can execute the following steps.

### Step 1: Create a New Account

Create a new dedicated user account to manage ARK-related software.

We’ll illustrate this command as **`sudo adduser ark`** to create a user by the name of **‘ark’**, but you can chose something else, if preferred.

On your server, type the following into the command line:

```bash
sudo adduser ark
```

You'll be asked to create and confirm a new user password, and be prompted to enter the user’s full name and some other information. (_Feel free to leave them blank by pressing ‘enter’, they are all optional fields._)

When prompted to confirm, type ‘Y’ and press ‘enter’ to finish.

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

---

### Step 2: Grant Sudo Privileges

Next, we need to make sure that our user account has all of the necessary privileges to run ARK Core properly. This will give our user account `sudo` privileges.

Type or copy-paste the following command into your terminal:

```bash
sudo usermod -a -G sudo ark
```

<x-alert type="info">
In this example we use **'ark'** for the name of the new user account, but you should use whatever username was set in previous steps above.
</x-alert>

---

### Step 3: Login as the New User

We now should switch to the user account created above, this will also land us in the user's base directory (`~/`).

Type or copy-paste the following command into your terminal:

```bash
sudo su - ark
```

---

### Step 4: Run the Installation Script

Here, we will use the `install.sh` script. This installs ARK Core and all of its dependencies onto your server, then publishes the configuration files for it.

Run the install script by copying and pasting this one line command into your terminal:

```bash
bash <(curl -s https://raw.githubusercontent.com/ArkEcosystem/core/master/install.sh)
```

You will be asked to input your user password to grant sudo privileges:

```bash
[sudo] password for ark: <input your password for user you created>
```

<x-alert type="warning">
The install process might take a while, don’t interrupt it, wait for it to finish.
</x-alert>

### Step 5: Select the Core network

Once the installation of dependencies and ARK Core is finished you will need to select which network you wish to operate on. This can be achieved by pressing the `up` or `down` arrow keys and confirming your selection by pressing `enter`.

`Mainnet` is the public network, `Devnet` is the development network for testing, and `Testnet` is network used for private testing.

```bash
? What network do you want to operate on? › - Use arrow-keys. Return to submit.
❯   devnet
    mainnet
    testnet
```

<x-alert type="info">
Installing **Devnet** via `install.sh` requires additional steps to ensure the latest `@next` version is used. After the following steps are completed, proceed to the '[Additional Devnet Steps](#additional-devnet-steps)' section for further instructions.
</x-alert>

After you have made your selection, you will need to confirm by pressing `y` and confirm again with `enter`

```bash
? Can you confirm? › (y/N)
```

At this point, ARK Core has been successfully installed with its configuration options properly published.

<x-alert type="info">
**Tinkering with 'Devnet'?** Create an Address using the [ARK Desktop Wallet](https://ark.io/download#desktop-wallet), then head over to the [ACF's](https://arkcommunity.fund) [Community Discord](https://discord.gg/arkecosystem) and visit the **`#community_bots`** channel. (_Use the **`!faucet`** command to receive DARK tokens_)
</x-alert>

### Step 6: Configuring the Core Database

The last step of the required ARK Core configuration is to setup the database parameters.

You will be presented with a prompt:

```bash
Would you like to configure the database? [y/N]:
```

Press `y` and confirm with `enter`.

---

Input the database credentials of your choosing.

<x-alert type="warning">
Replace `<network_name>` with the appropriate custom or pre-defined network name (e.g. '**ark_mainnet**', '**ark_devnet**', '**ark_testnet**').
</x-alert>

```bash
Enter the database username: ark
Enter the database password: password
Enter the database name: <network_name> # your chosen network name
```

This will create a PostgreSQL role and database to be used for storing blockchain data.

## Additional Devnet Steps

When installing **Devnet** via the `install.sh` script, you'll also need to enter the following commands into your terminal to ensure the latest `@next` version is used:

```bash
ark config:cli --channel=next
rm -rf ~/.config/ark-core/ && ark config:publish --network=devnet --reset
```

If custom data were entered during the installation process, you also might need to update your database settings in the `.env` file.
This can be done using the following command:

```bash
ark config:database
```

## Success

That’s it, your installation is all set! 🎉

<x-alert type="success">
**Hint:** start a relay instance and log its output by entering the following command into your terminal: **`ark relay:start && pm2 logs`**
</x-alert>
