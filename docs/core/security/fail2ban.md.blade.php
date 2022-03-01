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

The basic idea behind fail2ban is to monitor the logs of standard services to spot patterns in authentication failures. For example, by finding many password authentication failures originating from a single IP, `whois` commands shortly after connecting over SSH or other known exploits.

<x-alert type="warning">
[Fail2Ban](https://www.fail2ban.org/wiki/index.php/Main_Page) can reduce the rate of incorrect authentications attempts however it cannot eliminate the risk that weak authentication presents. Configure services to use only two factor or public/private authentication mechanisms if you want to protect services. :::
</x-alert>

### **Installation**

Install Fail2Ban and create local configuration file.

```bash
sudo apt-get install fail2ban
sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
```

### **Configuration**

Find all the references that specify port = SSH (typically in the SSH header section) and change the port to the new one you selected in the SSH security section above.

```bash
sudo nano /etc/fail2ban/jail.local
```

`File: /etc/fail2ban/jail.local`

```bash
#
# SSH Servers
#

[sshd]
port = ssh
logpath = %(sshd_log)s

[sshd-ddos]
# This Jail Corresponds to the Standard Configuration in Fail2ban
# The Mail-Whois Action Sends a Notification E-Mail With a Whois Request
port = ssh
logpath = %(sshd_log)s

[dropbear]
port = ssh
logpath = %(dropbear_log)s


[selinux-ssh]
port = ssh
logpath = %(auditd_log)s
maxretry = 5
```

### **Save Your Config File**

Press `CTRL+X` to exit the file, `Y` to save the file and then `Enter` to write to the file and return to the command line.

#### **Restart Fail2Ban Daemon**

```bash
sudo service fail2ban restart
exit
```
