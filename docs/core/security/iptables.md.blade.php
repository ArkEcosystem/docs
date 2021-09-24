---
title: Security - Applying iptables
---

# Applying iptables

iptables is a utility that allows system admins to configure IP packet filtering rules for Linux's kernel firewall. These rules are organized in separate tables and determine how to treat network packets. Using iptables is _highly recommended_ and shouldn't be overlooked unless required by your system's architecture and/or you're aware of the security implications.

## The iptables Script

The iptables script offers additional protection for Core v3 nodes by using standard firewall tools to rate-limit certain connections.

Specifically:

* Parallel/simultaneous P2P connections are restricted to a total of _10 per IP address_; this number can be adjusted using the `P2P_GLOBAL_CONN` script variable.
* Global connections are limited to 4 _NEW_ connections per 30-second interval.

## Script Usage

| Command     | Execution                     |
| :---------- | :---------------------------- |
| **start**   | `bash v3-iptables.sh start`   |
| **stop**    | `bash v3-iptables.sh stop`    |
| **restart** | `bash v3-iptables.sh restart` |
| **status**  | `bash v3-iptables.sh status`  |

## Running the Script

Download and execute the iptables script using the following commands:

```shell
wget -N https://raw.githubusercontent.com/ArkEcosystem/core/master/scripts/v3-iptables.sh
bash ./v3-iptables.sh start
```

## Creating a cron job

Because the filtering initiated by the iptables script does not persist after a system reboot, you should also consider adding the script to a cron job.

1. edit the crontab file (_choose the ‘nano’ editor when prompted_):

   ```shell
   crontab -e
   ```

2. add the following line to the _**end**_ of the crontab file:

   ```shell
   @reboot bash ~/v3-iptables.sh start
   ```

3. save the changes and exit:

   ```shell
   ctrl + x 
   
   # press 'y' then 'enter' to confirm
   ```

4. apply the permissions:

   ```shell
   sudo bash -c "echo \"$USER ALL=(ALL) NOPASSWD:/sbin/iptables\" >> /etc/sudoers"
   ```

<x-alert type="warning">
Failing to apply permissions will prevent the iptables script from executing after a system reboot.
</x-alert>
