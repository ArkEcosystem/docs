---
title: Security - Applying iptables
---

# Applying API iptables

iptables is a utility that allows system admins to configure IP packet filtering rules for Linux's kernel firewall. These rules are organized in separate tables and determine how to treat network packets. Using iptables is _highly recommended_ and shouldn't be overlooked unless required by your system's architecture and/or you're aware of the security implications.

<x-alert type="warning">
Using iptables is highly recommended. Be aware that Mainsail can implement multiple API endpoints, and you should consider applying the iptables script to each of them.
</x-alert>

## The iptables Script

The iptables script offers additional protection for Mainsail and Mainsail API nodes by using standard firewall tools to rate-limit certain connections.

Specifically:

* Parallel/simultaneous P2P connections are restricted to a total of _10 per IP address_; this number can be adjusted using the `P2P_GLOBAL_CONN` script variable.
* Global connections are limited to 4 _NEW_ connections per 30-second interval.

## Script Usage

| Command     | Example                     |
| :---------- | :---------------------------- |
| **start**   | `bash api-iptables.sh start pool`   |
| **stop**    | `bash api-iptables.sh stop pool`    |
| **restart** | `bash api-iptables.sh restart pool` |
| **status**  | `bash api-iptables.sh status pool`  |

## Running the Script

Download and execute the iptables script using the following commands:

```shell
wget -N https://raw.githubusercontent.com/ArkEcosystem/mainsail/main/scripts/api-iptables.sh
```

Edit the iptables script an use correct settings. 

```shell
nano ./api-iptables.sh
```

Enable iptables:

```shell
bash ./api-iptables.sh start
```

## Configuration

Edit the iptables script an review setting. 

```shell
nano ./api-iptables.sh
```

| Option     | Description                     |
| :---------- | :---------------------------- |
| API_GLOBAL   | Public API port number.  |
| API_GLOBAL_RATE    |  Request rate for Public API.   |
| API_GLOBAL_BURST | Burst for Public API. |
| API_TRANSACTION_POOL_GLOBAL   | Transaction pool API port number.  |
| API_GLOBAL_RATE    |  Request rate for Transaction pool.   |
| API_GLOBAL_BURST | Burst for Transaction pool API. |

| Procees     | Description                     |
| :---------- | :---------------------------- |
| api   | The public API that is part of `mainsail-api` script.  |
| pool  |  The transaction pool API that is part of `mainsail` script.   |


## Creating a cron job

Because the filtering initiated by the iptables script does not persist after a system reboot, you should also consider adding the script to a cron job.

1. edit the crontab file (_choose the ‘nano’ editor when prompted_):

   ```shell
   crontab -e
   ```

2. add the following line to the _**end**_ of the crontab file:

   ```shell
   @reboot bash ~/api-iptables.sh start pool
   @reboot bash ~/api-iptables.sh start api
   ```

3. save the changes and exit:

   ```shell
   ctrl + x 
   
   # press 'y' then 'enter' to confirm
   ```

4. apply the permissions:

   ```shell
   sudo bash -c "echo \"$USER ALL=(ALL) NOPASSWD:/sbin/api-iptables\" >> /etc/sudoers"
   ```

<x-alert type="warning">
Failing to apply permissions will prevent the iptables script from executing after a system reboot.
</x-alert>
