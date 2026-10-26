---
title: Security - Installing Fail2Ban
---

# Installing Fail2Ban

When running an ARK node, especially a Delegate Node, you should consider your server's security as your main priority.

<x-alert type="warning">
During this guide, we will configure network and SSH parameters, which if improperly performed might permanently lock you out of your server. Ensure you fully understand each step before proceeding.
</x-alert>

## Install Fail2Ban

### **What Is Fail2Ban**

The basic idea behind fail2ban is to monitor the logs of standard services to spot patterns in authentication failures. When a single IP fails to log in too many times, it is banned in the firewall for a while.

<x-alert type="warning">
[Fail2Ban](https://github.com/fail2ban/fail2ban) can reduce the rate of incorrect authentication attempts, however it cannot eliminate the risk that weak authentication presents. Use [SSH keys](/docs/core/security/ssh#using-ssh-keys) and disable password logins to properly protect SSH.
</x-alert>

### **Installation**

`python3-systemd` lets fail2ban read the systemd journal directly, which works regardless of whether `/var/log/auth.log` exists on your system.

```bash
sudo apt-get install -y fail2ban python3-systemd
```

### **Configuration**

Don't edit `jail.conf` or copy it to `jail.local`, as that file is replaced on package updates and the copy would hide new defaults. Put your own settings in a small file in `/etc/fail2ban/jail.d/` instead.

```bash
sudo nano /etc/fail2ban/jail.d/ark-sshd.local
```

Replace `55555` with the SSH port you chose in [Using SSH](/docs/core/security/ssh).

`file: /etc/fail2ban/jail.d/ark-sshd.local`

```ini
[DEFAULT]
bantime = 1h
bantime.increment = true
findtime = 10m
maxretry = 5
ignoreip = 127.0.0.1/8 ::1

[sshd]
enabled = true
port = 55555
backend = systemd
```

| Setting | Why |
| :------ | :-- |
| `bantime` / `bantime.increment` | Bans for an hour, and longer each time the same IP is banned again |
| `findtime` / `maxretry` | Bans an IP after 5 failures within 10 minutes |
| `ignoreip` | IPs that are never banned. Add your own static IP here if you have one |
| `backend = systemd` | Reads SSH logins from the systemd journal |

<x-alert type="info">
Older guides also enable an `sshd-ddos` jail. That jail no longer exists in current fail2ban versions. Its checks are part of the `sshd` jail, and you can make them stricter by adding `mode = aggressive` to the `[sshd]` section.
</x-alert>

Press `CTRL+X` to exit the file, `Y` to save the file and then `Enter` to write to the file and return to the command line.

#### **Restart Fail2Ban**

```bash
sudo systemctl enable fail2ban
sudo systemctl restart fail2ban
```

#### **Check the Status**

```bash
sudo fail2ban-client status sshd
```

This shows the number of failed attempts and the currently banned IPs. If you ever ban yourself, unban your IP from another connection (or your provider's web console) with:

```bash
sudo fail2ban-client set sshd unbanip <your-ip>
```
