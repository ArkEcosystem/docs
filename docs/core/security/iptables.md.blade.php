---
title: Security - Applying iptables
---

# Applying iptables

iptables is a utility that allows system admins to configure IP packet filtering rules for Linux's kernel firewall. These rules are organized in separate tables and determine how to treat network packets. Limiting connections to your node is _highly recommended_ and shouldn't be overlooked unless required by your system's architecture and/or you're aware of the security implications.

The most important rule caps how many P2P connections a single IP address can keep open at the same time, so one peer can't exhaust your node's connections. There are two ways to apply it. Use the first one if you followed the [Port Knocking](/docs/core/security/knocking) guide or used `secure.sh`, as both rely on `ufw`.

## Option 1: Using ufw

`ufw` is a front end for iptables (nftables on recent Ubuntu releases), so instead of running separate iptables rules we add the limit to `ufw` itself. Rules in `/etc/ufw/before.rules` are applied before the regular `ufw allow` rules.

```bash
sudo nano /etc/ufw/before.rules
```

Add the following lines just **before** the final `COMMIT` line, replacing `4001` with your network's P2P port (`4001` mainnet, `4002` devnet, `4000` testnet):

`file: /etc/ufw/before.rules`

```bash
# BEGIN ark-p2p-connlimit
-A ufw-before-input -p tcp --syn --dport 4001 -m connlimit --connlimit-above 10 --connlimit-mask 32 -j REJECT --reject-with tcp-reset
# END ark-p2p-connlimit

COMMIT
```

Do the same for IPv6 in `/etc/ufw/before6.rules`, using the `ufw6-before-input` chain and a `/64` mask, since a single IPv6 user usually has a whole `/64` range:

`file: /etc/ufw/before6.rules`

```bash
# BEGIN ark-p2p-connlimit
-A ufw6-before-input -p tcp --syn --dport 4001 -m connlimit --connlimit-above 10 --connlimit-mask 64 -j REJECT --reject-with tcp-reset
# END ark-p2p-connlimit

COMMIT
```

Apply the rules:

```bash
sudo ufw reload
```

Because these rules are part of the `ufw` configuration, they persist after a reboot without any extra steps.

## Option 2: The iptables Script

If you don't use `ufw`, the iptables script offers the same protection for Core v3 nodes using plain iptables.

<x-alert type="warning">
Don't combine this script with `ufw`. Both manage the same firewall, and their rules can conflict.
</x-alert>

Specifically:

* Parallel/simultaneous P2P connections are restricted to a total of _10 per IP address_; this number can be adjusted using the `P2P_GLOBAL_CONN` script variable.
* Global connections are limited to 4 _NEW_ connections per 30-second interval.

### Script Usage

| Command     | Execution                     |
| :---------- | :---------------------------- |
| **start**   | `bash v3-iptables.sh start`   |
| **stop**    | `bash v3-iptables.sh stop`    |
| **restart** | `bash v3-iptables.sh restart` |
| **status**  | `bash v3-iptables.sh status`  |

### Running the Script

Download and execute the iptables script using the following commands:

```shell
curl -fsSLO https://raw.githubusercontent.com/ArkEcosystem/core/master/scripts/v3-iptables.sh
bash ./v3-iptables.sh start
```

### Starting the Script on Boot

The filtering applied by the iptables script does not persist after a system reboot. Since the script needs root privileges, add it to **root's** crontab, so it runs on boot without changing any `sudo` permissions:

1. edit root's crontab file (_choose the ‘nano’ editor when prompted_):

   ```shell
   sudo crontab -e
   ```

2. add the following line to the _**end**_ of the crontab file, replacing `ark` with your username:

   ```shell
   @reboot bash /home/ark/v3-iptables.sh start
   ```

3. save the changes and exit:

   ```shell
   ctrl + x

   # press 'y' then 'enter' to confirm
   ```

<x-alert type="warning">
Older versions of this guide appended a `NOPASSWD` rule to `/etc/sudoers` with `echo`. That is no longer needed with the root crontab. If you added it, remove it with `sudo visudo`, as a mistake in that file can lock you out of `sudo`.
</x-alert>
