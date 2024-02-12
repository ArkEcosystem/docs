---
title: Security - Setting Up Port Knocking
---

# Setting Up Port Knocking

When running an Mainsail node, especially a Validator Node, you should consider your server's security as your main priority.

<x-alert type="warning">
During this guide, we will configure network and SSH parameters, which if improperly performed might permanently lock you out of your server. Ensure you fully understand each step before proceeding.
</x-alert>

## Port Knocking

### **What Is Port Knocking?**

Port knocking is a technique used which obscures the port you're connecting on to prevent port scanning by opening and closing it when you need it. We will use a series of ports to essentially "knock" and your server will open your configured port for you to connect on by listening for connection attempts on those ports in a specific order.

### **Disable UFW**

By default, UFW comes enabled since Ubuntu 16.04. If you get `ufw command not found` then run.

```bash
sudo apt-get install ufw
sudo ufw disable
```

You can verify that UFW is disabled by running `sudo ufw status` and get a response of `inactive`.

### **Disable All Incoming Connections**

```bash
sudo ufw default deny incoming
```

### **Enable Node Port**

Depending which network this node is for will determine what port you open here. For mainnet use `4001`, devnet use `4002`, and testnet use `4000` and public API which is by default located on port `4003`.

We don't want to open any more ports than required to operate securely so we will open P2P port depending on the network (in our example for mainnet) and public API port.

```bash
sudo ufw allow 4001/tcp
sudo ufw allow 4003/tcp
```

### **Install Knockd on Server**

```bash
sudo apt-get install knockd -y
```

### **Start Knockd Server on Boot**

```bash
sudo nano /etc/default/knockd
```

We need to change `START_KNOCKD=0` to `START_KNOCKD=1`

`File: /etc/default/knockd`

```bash
################################################
#
# knockd's default file, for generic sys config
#
################################################

# Control if We Start Knockd at Init or Not
# 1 = start
# anything else = don't start
#
# PLEASE EDIT /etc/knockd.conf BEFORE ENABLING
START_KNOCKD=0

# Command Line Options
#KNOCKD_OPTS="-i eth1"
```

`File: /etc/default/knockd`

```shell
...
START_KNOCKD=1
...
```

Then press `CTRL+S`, then answer `Y` and finally press `ENTER` to return to the command line.

#### **Edit Config**

```bash
sudo nano /etc/knockd.conf
```

#### **Knock Ports**

Here we're going to pick our opening and closing knock sequence. Choose three ports between `7000` and `40000` for each opening and closing. Write these ports down. The sequences need to be different.

Modify your config file to match the one below with your own ports. We do not recommend just copying and pasting this config. Replace `7000`, `8000`, `9000` with your own choices.

Also, don't forget to replace `55555` with the port you chose for `SSH`.

`File: /etc/knockd.conf`

```ini
[options]
        UseSyslog

[openSSH]
        sequence    = 7000,8000,9000
        seq_timeout = 5
        command     = ufw allow 55555/tcp
        tcpflags    = syn

[closeSSH]
        sequence    = 9000,8000,7000
        seq_timeout = 5
        command     = ufw delete allow 55555/tcp
        tcpflags    = syn
```

#### **Enable Our Firewall and Start Knockd**

```bash
sudo service knockd start
sudo ufw enable
```

#### **Checking Knockd and Ufw Status**

```bash
sudo service knockd status
sudo ufw status
```

### **Install Knockd Client**

Install a client for your operating system to make knocking easier. There are even a couple of mobile apps you can use for quickly knocking on your server to open your ssh port.

After knocking your port will remain open until you send the closing knock sequence.

#### **Ubuntu 16.04**

```bash
sudo apt-get install knockd
```

#### **Alternate Clients**

* [Win32 Client](http://www.zeroflux.org/proj/knock/files/knock-win32.zip)
* [MacOS Client](http://www.zeroflux.org/proj/knock/files/knock-macos.tar.gz)
* [Debian Package](http://packages.debian.org/unstable/net/knockd)
* [RPM Package](http://www.invoca.ch/pub/packages/knock/)
* [Android Client](https://play.google.com/store/apps/details?id=com.droidknocker)
* [iPhone Client](http://www.sungheroes.com/portknock/)

## **Troubleshooting and Testing**

Logs for knockd appear in `syslog` and will be crucial if you need to troubleshoot.

Run the following command on your Mainsail node server.

```bash
tail -f /var/log/syslog
```

Let us test our knocking! We set our SSH port, and we've enabled knocking. Now we need to check to make sure that when we send the correct knock that we open and close the port correctly.

### **Open SSH Port**

From your personal computer or mobile phone use the client you installed above or if you are running Linux install `knockd` by running `sudo apt-get install knockd` and use the following command to knock.

```bash
knock -v nodeip 7000 8000 9000
```

You should see the following logs appear in your `syslog`

```bash
Apr 17 04:02:18 node1 knockd: nodeip: openSSH: Stage 1
Apr 17 04:02:18 node1 knockd: nodeip: openSSH: Stage 2
Apr 17 04:02:18 node1 knockd: nodeip: openSSH: Stage 3
Apr 17 04:02:18 node1 knockd: nodeip: openSSH: OPEN SESAME
Apr 17 04:02:18 node1 knockd: openSSH: running command: ufw allow 55555/tcp
```

Running `sudo ufw status` should list your SSH port as enabled.

```bash
mainsail@node1:~$ sudo ufw status
Status: active

To                         Action      From
--                         ------      ----
2086/tcp                   ALLOW       Anywhere
4002/tcp                   ALLOW       Anywhere
55555/tcp                  ALLOW       Anywhere
2086/tcp (v6)              ALLOW       Anywhere (v6)
4002/tcp (v6)              ALLOW       Anywhere (v6)
55555/tcp (v6)             ALLOW       Anywhere (v6)
```

### **Close SSH Port**

```bash
knock -v nodeip 9000 8000 7000
```

```bash
Apr 17 04:23:37 node1 knockd: nodeip: closeSSH: Stage 1
Apr 17 04:23:37 node1 knockd: nodeip: closeSSH: Stage 2
Apr 17 04:23:37 node1 knockd: nodeip: closeSSH: Stage 3
Apr 17 04:23:37 node1 knockd: nodeip: closeSSH: OPEN SESAME
Apr 17 04:23:37 node1 knockd: closeSSH: running command: ufw delete allow 55555/tcp
```

### SSH Connection Using Your KeyPair

<x-alert type="warning">
If you do not copy the correct key to your server, in the right location, you will be unable to authenticate.
</x-alert>

If you are not comfortable managing SSH keys, you can continue logging in via a password, but it is less secure.

SSH keys should be generated on the computer you wish to log in from. Just press enter and accept all the defaults.

#### **MacOS / Linux**

```bash
ssh-keygen -t rsa
```

Browse to your `~/.ssh` directory and check to make sure it worked. You should see the following files.

```bash
cd ~/.ssh
ls -l

-rw------- 1 travism travism 1675 Mar 28 12:13 id_rsa
-rw-r--r-- 1 travism travism  401 Mar 28 12:13 id_rsa.pub
-rw-r--r-- 1 travism travism 3764 Apr 16 23:15 known_hosts
```

Copy your key to your server

```bash
# Open SSH Port It Not Already Open
knock -v nodeip 7000 8000 9000

# Copy Key
ssh-copy-id -p 55555 user@nodeip
```

#### **Windows**

Windows users can generate their ssh key using [PuTTY Key Generator](https://www.ssh.com/ssh/putty/windows/puttygen).

`Copy your PUBLIC KEY to your Server`

Copy the contents of your `id_rsa.pub` file on your local machine to your `~/.ssh/authorized_keys` on your Mainsail node server.

#### **Disable Password Authentication**

```bash
sudo nano /etc/ssh/sshd_config
```

This file should look familiar to you as we edited it earlier in this process. This time we're going to disable password authentication. Set `PasswordAuthentication` to `no` and make sure that `PubkeyAuthentication` is set to `yes` and `ChallengeResponseAuthentication` is set to `no`.

`file: /etc/ssh/sshd_config`

```shell
PasswordAuthentication no
PubkeyAuthentication yes
ChallengeResponseAuthentication no
```

Save your changes by pressing `CTRL+X`, then respond with `Y`, and finally press `ENTER` to write to file.

#### **Restart SSH**

```bash
sudo service ssh restart
```

The next time you log in you should log right in without a password prompt.
