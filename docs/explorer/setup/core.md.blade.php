---
title: Setup - Core Setup
---

# Core Setup

![](/storage/docs/docs/explorer/assets/setup/core-configuration.png)

***The following guide specifies all the necessary steps to set up a Core Relay and prepare it for use with Explorer 4.0. Before proceeding further, take note that you should ideally set up a Core instance behind a firewall with remote access to your database and a read-only user. As such, it is best to disable all public services (such as APIs and Webhooks) to reduce unnecessary overhead.***

## Setup

In essence, the setup process is split into two interdependent procedures, namely:

- **A Core Relay Setup**, and
- **Providing Remote Access to the Core Database**

You will first need to set up a Core Relay before proceeding any further. Follow the steps below and navigate to the relevant resources as and when you require them.

---

### Set Up a Core Relay

***The procedure on how to carry this out already exists, so only the second part of the setup process is explicitly discussed here.***

**Navigate to the Installation Guide** - A Core Relay is required in order to successfully set up Explorer 4.0. Please follow any one of the guides located [here](https://ark.dev/docs/core/installation/intro) and return to this page upon completion.

<x-alert type="hint">
In principle, two means of installing ARK Core exist, namely by **Using the Install Script** or via **Docker** on Linux/macOS and Windows. Ensure that you select the method relevant to your requirements and that you adhere to the steps as closely as possible.
</x-alert>

---

**Enable Wallets Table** - Once your Core Relay is functioning, enter `ark env:paths` to locate your `.env` file and navigate to it. Scroll to the relevant section and add `CORE_WALLET_SYNC_ENABLED=true`. Take note that you will need to type the full parameter out when adding it to your Environment.

---

**Restart the Core Process** - Once your configuration is saved, restart using `ark relay:restart` and wait while the table syncs (this may take several minutes depending on your setup, so please be patient). You can then run `pm2 logs` to view the synchronization process. If successful, you should see readouts similar to the following:

```ini
0|ark-relay     | [2022-01-01 00:00:00.000] INFO: Wallets table synchronized at height 10,000,000`
```

---

### Provide Remote Access to the Core Database

This officially marks the second part of the setup process in which you will enable remote access to the Core database that Explorer 4.0 will require in order to function. Please adhere to the steps outlined below and follow them accordingly.

<x-alert type="info">
As a result of the various available databases, `<database-name>` will appear in the ensuing instructions. Ensure that you replace this placeholder value with the database name relevant to your setup (so for example, `sudo -u postgres psql <database-name>` becomes `sudo -u postgres psql ark_mainnet` if you wish to make use of the ARK mainnet for your instance of Explorer). For more on custom databases, check the the configuration file located [here.](https://github.com/ArkEcosystem/explorer/blob/develop/config/explorer.php#L14)
</x-alert>

---

**Set Up Explorer User in PostgreSQL** - The next step entails creating a new Explorer user in PostgreSQL. Remember to substitute `<database-name>` with the database name relevant to your setup before running the first command. The subsequent command allows you to create a new user and set an encrypted password. Please ensure that you replace `<password>` with an actual password to maximize security and avoid any unnecessary mishaps.

```bash
sudo -u postgres psql <database-name>
CREATE USER explorer WITH ENCRYPTED PASSWORD '<password>';
```

Once you have specified the user and password, exit psql before continuing further.

<x-alert type="hint">
When entering the `create user` command, observe the necessary syntactical conventions to ensure commands execute as intended. For example, failing to include the `;` at the end of a line will result in your inputs failing to execute as required.
</x-alert>

---

**Grant Permissions to Explorer User** - The following three commands will grant the necessary permissions to your Explorer user. Before creating permissions, ensure that you use the correct database by entering `sudo -u postgres psql <database-name>` first.

```bash
grant CONNECT on DATABASE <database-name> to explorer;
grant USAGE on SCHEMA public to explorer;
grant SELECT on ALL tables in schema public to explorer;
```

---

**Check Your New User Has Database Access** - Before continuing, exit out of psql first. You will then need to specify the host in order to avoid any peer authentication issues that may arise by entering the following command.

```bash
psql -h 127.0.0.1 -d <database-name> -U explorer -W
```

---

**Search for the `postgresql.conf` File** - Since each system is unique, you will need to locate the `postgresql.conf` by searching for it using the following command.

```bash
sudo find / -name "postgresql.conf"
```

---

**Access the File** - Once located, you will need to access the file using `nano` and entering the relevant path. Take note that the path specified here is merely an example and that you will need to substitute it with the location of your `postgresql.conf` file in order for it to execute as intended.

```bash
sudo nano /etc/postgresql/13/main/postgresql.conf
```

---

**Edit `listen_addresses`** - The first parameter you will need to edit is `listen_addresses`. In essence, you will need to change:

```ini
listen_addresses = 'localhost'
```

to:

```ini
listen_addresses = '*'
```

<x-alert type="warning">
When editing `listen_addresses`, ensure that you remove the `#` at the beginning of the line if it is present, otherwise your changes will not have any effect.
</x-alert>

---

**Access `pg_hba.conf`** - Having edited and saved the `postgresql.conf` file, you will need to access and edit the `pg_hba.conf` file. Fortunately this file resides in the same folder as your `postgresql.conf` file, so you need to alter the path as necessary in order to access the `pg_hba.conf` file. Once again, you will need to substitute the sample path detailed below with the one relevant to your setup before you use `nano` to edit the parameters.

```bash
sudo nano /etc/postgresql/13/main/pg_hba.conf
```

---

**Add Entries to `pg_hba.conf`** - Scroll down until you see parameters listing databases and IP addresses. Once you have located the relevant section, add the following ipv4 and ipv6 entries accordingly.

```ini
host    <database-name>     explorer        0.0.0.0/0               md5
host    <database-name>     explorer        ::/0                    md5
```

---

**Restart PostgreSQL** - Upon inserting the required entries and saving the `pg_hba.conf` file, you will need to restart psql. You can carry this out by executing the following command.

```bash
sudo /etc/init.d/postgresql restart
```

---

**Open the Port** - If the port is disabled in your firewall, use the following command to open it.

```bash
sudo ufw allow 5432
```

---

### Test Your Connection

Now that you have set all the parameters and configured your server, the next logical step is to first test your connection before setting it up in the Explorer. By making use of a database manager such as [TablePlus](https://tableplus.com/), you can effectively add your server as a remote connection. Enter in the required details when prompted and click on 'Connect.'

![](/storage/docs/docs/explorer/assets/setup/core-configuration-tableplus.png)

> Database Managers such as TablePlus allow you to test your settings before altering parameters in your Environment. TablePlus is available for both macOS and Windows via their [official website](https://tableplus.com/)

<x-alert type="success">
If everything is working as it should, your server connection should reveal various tables containing relevant network data. You can click on these fields to view more details regarding the server's various operations and processes if you wish.
</x-alert>

---

**Update Your Explorer Instance** - Once you have successfully tested your connection, you may navigate to your `.env` file and alter the parameters in order to make your instance of Explorer point to your server. Adjust the following variables according to your requirements.

```ini
EXPLORER_DB_HOST=<your-core-ip>
EXPLORER_DB_PORT=5432
EXPLORER_DB_DATABASE=<your-core-database-name>
EXPLORER_DB_USERNAME=<your-core-database-username>
EXPLORER_DB_PASSWORD=<your-core-database-password>
```

Depending on the nature of the network in question, you will need to adjust the `EXPLORER_NETWORK` variable to either `EXPLORER_NETWORK=production` for mainnet or `EXPLORER_NETWORK=development` for devnet.

<x-alert type="info">
If you change the network data from an Explorer node (that is, you switch it from devnet to mainnet), you will need to clear the existing caches and rerun the commands to fetch data and resynchronize everything. You can clear all caches by running `php artisan optimize:clear` and subsequently re-cache your data using `php artisan explorer:cache-development-data`
</x-alert>
