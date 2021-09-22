---
title: Security - Using SSH
---

# Using SSH

When running an ARK node, especially a Delegate Node, you should consider your server's security as your main priority.

<x-alert type="warning">
During this guide, we will configure network and SSH parameters, which if improperly performed might permanently lock you out of your server. Ensure you fully understand each step before proceeding.
</x-alert>

## SSH Security

### Edit Your SSH Config

Edit your `sshd_config` by running the following command.

```bash
sudo nano /etc/ssh/sshd_config
```

`file: /etc/ssh/sshd_config`

```bash
# What ports, IPs and protocols we listen for
Port 22
```

Change the `22` to a port of your choosing between `49152` and `65535`. This is the new SSH port we will connect on. Since we are not using the default SSH port, it is crucial you do not forget what you choose, or you will not be able to access your server.

From now on port 22 is not usable for SSH connections.

`file: /etc/ssh/sshd_config`

```bash
# What ports, IPs and protocols we listen for
Port 55555
```

### **Authentication Settings**

In the previous section, we had you create a new account for security purposes. You should never log in as root to your server after it has been set up. Our first security measure is going to be to disable root access altogether.

`file: /etc/ssh/sshd_config`

```bash
# Authentication:
LoginGraceTime 120
PermitRootLogin yes
StrictModes yes
```

Change `LoginGraceTime` to `60` and set `PermitRootLogin` to `no`

`file: /etc/ssh/sshd_config`

```bash
# Authentication:
LoginGraceTime 60
PermitRootLogin no
StrictModes yes
```

### **Disable X11 Forwarding**

Set `X11Forwarding` to `no`.

`file: /etc/ssh/sshd_config`

```bash
X11Forwarding yes
X11DisplayOffset 10
PrintMotd no
PrintLastLog yes
TCPKeepAlive yes
#UseLogin no
```

`/file: etc/ssh/sshd_config`

```bash
X11Forwarding no
```

### **Limit Max Concurrent Connections**

Scroll down until you see the following line and uncomment `MaxStartups`. Then set MaxStartups to `2`.

`/file: etc/ssh/sshd_config`

```bash
#MaxStartups 10:30:60
#Banner /etc/issue.net
```

`file: /etc/ssh/sshd_config`

```bash
MaxStartups 2
#Banner /etc/issue.net
```

### **Save Your Config File**

Press `CTRL+X` to exit the file, `Y` to save the file and then `Enter` to write to the file and return to the command line.

#### **Restart SSH Daemon**

```bash
sudo service ssh restart
exit
```

#### **Test New SSH Connection**

```bash
ssh user@yournode -p 55555
```

If everything was setup successfully, you should be reconnected to your ARK node. Replace `55555` with the port you chose when setting up your `sshd_config`.
