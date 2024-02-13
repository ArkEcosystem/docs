---
title: Installation - Using the Install Script
---

# Using the Install Script

A step-by-step guide on how to prepare a fully-functional **Development** environment using the install script.

---

<x-alert type="success">
If you don't have access to a Linux box you can quickly setup one on [DigitalOcean](https://cloud.digitalocean.com) by using this **$100** referral link: [Referral Link](https://m.do.co/c/09d061526b12).
</x-alert>

## Getting Started

The instructions on this page will guide you through creating a new user account with the correct privileges, installing and configuring Mainsail Core, then starting a relay instance and logging the output using the installation script.

Directly below is a quick summary of these install commands:

```bash
sudo adduser mainsail
sudo usermod -a -G sudo mainsail
sudo su - mainsail

wget https://raw.githubusercontent.com/ArkEcosystem/mainsail/main/install-alpha.sh
bash install-alpha.sh

mainsail core:start --token=ark --network=testnet

pm2 logs
```

<!--
<x-alert type="info">
Installing **Devnet** via `install.sh` requires additional steps to ensure the latest `@next` version is used. Proceed to the '[Additional Devnet Steps](#additional-devnet-steps)' section for further instructions.
</x-alert>
-->

## Step-by-Step Installation via the Script

If you are planning to setup a new server you can execute the following steps.

### Step 1: Create a New Account

Create a new dedicated user account to manage Mainsail-related software.

We’ll illustrate this command as **`sudo adduser mainsail`** to create a user by the name of **‘mainsail’**, but you can chose something else, if preferred.

On your server, type the following into the command line:

```bash
sudo adduser mainsail
```

You'll be asked to create and confirm a new user password, and be prompted to enter the user’s full name and some other information. (_Feel free to leave them blank by pressing ‘enter’, they are all optional fields._)

When prompted to confirm, type ‘Y’ and press ‘enter’ to finish.

```bash
Adding user `mainsail' ...
Adding new group `mainsail' (1001) ...
Adding new user `mainsail' (1001) with group `mainsail' ...
Creating home directory `/home/mainsail' ...
Copying files from `/etc/skel' ...
New password: 
Retype new password: 
passwd: password updated successfully
Changing the user information for mainsail
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

Next, we need to make sure that our user account has all of the necessary privileges to run Mainsail software properly. This will give our user account `sudo` privileges.

Type or copy-paste the following command into your terminal:

```bash
sudo usermod -a -G sudo mainsail
```

<x-alert type="info">
In this example we use **'mainsail'** for the name of the new user account, but you should use whatever username was set in previous steps above.
</x-alert>

---

### Step 3: Login as the New User

We now should switch to the user account created above, this will also land us in the user's base directory (`~/`).

Type or copy-paste the following command into your terminal:

```bash
sudo su - mainsail
```

---

### Step 4: Run the Installation Script

Here, we will use the `install.sh` script. This installs Mainsail Core and all of its dependencies onto your server, then publishes the configuration files for it.

Run the install script by copying and pasting this one line command into your terminal:

```bash
bash <(curl -s https://raw.githubusercontent.com/ArkEcosystem/core/master/install.sh)
```

You will be asked to input your user password to grant sudo privileges:

```bash
[sudo] password for mainsail: <input your password for user you created>
```

<x-alert type="warning">
The install process might take a while, don’t interrupt it, wait for it to finish.
</x-alert>

At this point, Mainsail Core has been successfully installed with its configuration options properly published.

## Success

That’s it, your installation is all set! 🎉

<x-alert type="success">
**Hint:** start a node instance and log its output by entering the following command into your terminal: **`mainsail core:start --token=ark --network=testnet && pm2 logs`**
</x-alert>

## API installation

Mainsail core installation comes without the active API server. Additional steps are required to install the API server. Once installed API server for Mainsail will be available as `mainsail-api` CLI command.   

The easiest way to install the API server is to use the `install-alpha.sh` script. This script will install the API server and all of its dependencies onto your server, then publish the configuration files for it.
API server can be installed besides the Mainsail Core server or on a separate node. We will illustrate the installation on the same node as the core server.

To install the API server, you can use the following commands:

```bash
bash install-alpha.sh --api

mainsail-api api:start --token=ark --network=testnet

pm2 logs
```
## Step-by-Step API Installation via the Script

### Step 1: Ensure the user account exist with sudo privileges

Ensure the user account has all of the necessary privileges to run Mainsail software properly. This will give our user account `sudo` privileges.
We already created a user account in the previous steps when we install Mainsail core, so we can skip this step.

```bash
sudo adduser mainsail
sudo usermod -a -G sudo mainsail
sudo su - mainsail
````

### Step 2: Run the Installation Script

Run the install script by copying and pasting this one line command into your terminal. Be aware that the `--api` flag is used to install the API server.

```bash
bash install-alpha.sh --api
```


You will be asked to input your user password to grant sudo privileges:

```bash
[sudo] password for mainsail: <input your password for user you created>
```

### Step 3: Configure PostgreSQL database

After the installation of the API server, you will be asked to configure the database. You can use the following example to configure the database:

```bash
    ==> Installed PostgreSQL!
Would you like to configure the database? [y/N]: y
Enter the database username: ark
Enter the database password: password
Enter the database name: ark_testnet
database username: ark
database password: password
database name: ark_testnet
Proceed? [y/N]: y
```

This will create a PostgreSQL role and database to be used for storing blockchain data.


### Step 4: Configure Mainsail core

After the installation of the API server, you will be asked to configure the Mainsail core. You can use the following example to configure the Mainsail. Following configuration will update Mainsail configuration to use the PostgreSQL database for API server. 

```bash
    ==> Installed Mainsail API Server!
Are you going to run the backend Core server on the same node? [y/N]: y
```

<x-alert type="success">
**Hint:** start a node instance and log its output by entering the following command into your terminal: **`mainsail-api api:start --token=ark --network=testnet && pm2 logs`**
</x-alert>