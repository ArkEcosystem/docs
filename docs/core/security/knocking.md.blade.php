---
title: Security - Setting Up Port Knocking
---

# Setting Up Port Knocking

When running an ARK node, especially a Delegate Node, you should consider your server's security as your main priority.

<x-alert type="warning">
During this guide, we will configure network and SSH parameters, which if improperly performed might permanently lock you out of your server. Ensure you fully understand each step before proceeding, and keep your current SSH session open until you have confirmed you can log in again.
</x-alert>

## Port Knocking

### **What Is Port Knocking?**

Port knocking keeps your SSH port closed to the world. Your server listens for connection attempts on a series of ports in a specific order, a "knock". Only after a correct knock is the SSH port opened, and only for the IP address that knocked. After a minute it closes again automatically. Sessions that were opened in that window stay connected.

This guide uses [ufw](https://help.ubuntu.com/community/UFW) as the firewall and assumes you have already moved SSH to its own port as described in [Using SSH](/docs/core/security/ssh). We use `55555` as the SSH port in the examples below.

### **Install Knockd and ufw**

```bash
sudo apt-get install -y knockd ufw
```

### **Pick Your Knock Ports**

Choose three different ports between `7000` and `40000` and write them down, together with your SSH port. We do not recommend copying the ports in the examples below. Make sure nothing is listening on the ports you choose:

```bash
sudo ss -tlnp
```

### **Find Your Network Interface**

knockd needs to know which network interface to listen on. This prints the interface used for the default route, for example `eth0` or `ens3`:

```bash
ip -o -4 route show to default | awk '{print $5}'
```

### **Edit Config**

```bash
sudo nano /etc/knockd.conf
```

Replace the contents with the following, using your own interface, knock ports and SSH port:

`file: /etc/knockd.conf`

```ini
[options]
    UseSyslog
    Interface = eth0

[openSSH]
    sequence      = 7000,8000,9000
    seq_timeout   = 15
    tcpflags      = syn
    start_command = /usr/sbin/ufw allow in on eth0 from %IP% to any port 55555 proto tcp
    cmd_timeout   = 60
    stop_command  = /usr/sbin/ufw delete allow in on eth0 from %IP% to any port 55555 proto tcp
```

| Setting | Why |
| :------ | :-- |
| `sequence` | The ports to knock on, in this order |
| `seq_timeout` | The whole knock has to arrive within 15 seconds |
| `start_command` | Opens SSH for the IP that knocked (`%IP%`), not for everyone |
| `cmd_timeout` / `stop_command` | Closes the port again after 60 seconds, so there is no separate closing knock to forget |

<x-alert type="warning">
Keep `in on eth0` (with your own interface) in both commands. It makes the knock rule a different `ufw` rule from a permanent `allow from <your-ip>` rule. Without it, `ufw` treats both as the same rule, and closing the knock window would also delete your permanent rule.
</x-alert>

Since the config contains your knock sequence, make it readable for root only:

```bash
sudo chmod 600 /etc/knockd.conf
```

### **Start Knockd on Boot**

If your system has a `/etc/default/knockd` file, set `START_KNOCKD=1` in it:

```bash
sudo sed -i 's/^START_KNOCKD=.*/START_KNOCKD=1/' /etc/default/knockd
```

knockd fails when it starts before the network interface is up, which can happen after a reboot. Add a systemd override so it waits for the network and restarts on failure:

```bash
sudo systemctl edit knockd
```

`file: /etc/systemd/system/knockd.service.d/override.conf`

```ini
[Unit]
After=network-online.target
Wants=network-online.target

[Service]
Restart=on-failure
RestartSec=5
```

Then enable and start knockd, and check that it is running:

```bash
sudo systemctl enable knockd
sudo systemctl restart knockd
sudo systemctl status knockd
```

<x-alert type="danger">
Do not continue until knockd shows as `active (running)`. Enabling the firewall without a working knockd closes off SSH for good.
</x-alert>

### **Configure the Firewall**

Deny all incoming connections by default, and only open the ports Core needs. For mainnet the P2P port is `4001`, for devnet `4002` and for testnet `4000`. The public API is on port `4003` by default. A forger doesn't need to expose its API, so leave that port closed there.

```bash
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow 4001/tcp
sudo ufw allow 4003/tcp
```

SSH must only be reachable through knocking, so remove any rules that open it to everyone, including the one you may have added while changing the SSH port:

```bash
sudo ufw delete allow 22/tcp
sudo ufw delete allow OpenSSH
sudo ufw delete allow 55555/tcp
```

<x-alert type="info">
If you have a static IP at home or in the office, you can always allow SSH from that IP without knocking: `sudo ufw allow from <your-ip> to any port 55555 proto tcp`.
</x-alert>

### **Enable the Firewall**

```bash
sudo ufw enable
sudo ufw status verbose
```

Your current session stays connected. Test the knock from a new terminal, as described below, before you log out.

### **Install a Knock Client**

Install a client on the computer you connect from:

| OS | Client |
| :- | :----- |
| **Ubuntu / Debian** | `sudo apt-get install knockd` (includes the `knock` client) |
| **macOS** | `brew install knock` |
| **Windows** | Use `knock` from WSL, or the `nc` loop below |

There are also port knocking apps for Android and iOS.

Any TCP connection attempt works as a knock, so you don't strictly need a knock client. With `nc` (netcat):

```bash
for p in 7000 8000 9000; do nc -z -w1 nodeip $p; sleep 0.2; done
```

## **Troubleshooting and Testing**

Logs for knockd end up in the systemd journal and will be crucial if you need to troubleshoot. Run the following command on your ARK node server:

```bash
sudo journalctl -u knockd -f
```

### **Open SSH Port and Connect**

From your personal computer, knock and connect within 60 seconds:

```bash
knock -d 200 -v nodeip 7000 8000 9000 && sleep 1 && ssh -p 55555 ark@nodeip
```

`-d 200` waits 200 milliseconds between the ports, so they arrive in the right order, and `sleep 1` gives knockd a moment to open the port before `ssh` connects.

You should see the following logs appear on the server:

```bash
knockd[1234]: 203.0.113.10: openSSH: Stage 1
knockd[1234]: 203.0.113.10: openSSH: Stage 2
knockd[1234]: 203.0.113.10: openSSH: Stage 3
knockd[1234]: 203.0.113.10: openSSH: OPEN SESAME
knockd[1234]: openSSH: running command: /usr/sbin/ufw allow in on eth0 from 203.0.113.10 to any port 55555 proto tcp
```

While the port is open, `sudo ufw status` lists a rule for your IP only:

```bash
Status: active

To                         Action      From
--                         ------      ----
4001/tcp                   ALLOW       Anywhere
4003/tcp                   ALLOW       Anywhere
55555/tcp on eth0          ALLOW       203.0.113.10
4001/tcp (v6)              ALLOW       Anywhere (v6)
4003/tcp (v6)              ALLOW       Anywhere (v6)
```

After 60 seconds the rule is removed again:

```bash
knockd[1234]: 203.0.113.10: openSSH: command timeout
knockd[1234]: openSSH: running command: /usr/sbin/ufw delete allow in on eth0 from 203.0.113.10 to any port 55555 proto tcp
```

### **Knock Automatically with SSH**

On macOS and Linux you can make knocking part of `ssh` itself, so you never type the sequence again. Add this to `~/.ssh/config` on your own computer:

`file: ~/.ssh/config`

```bash
Host ark-node
    HostName nodeip
    Port 55555
    User ark

Match host nodeip exec "knock -d 200 %h 7000 8000 9000; sleep 1"
```

Now `ssh ark-node` knocks with a pause between the ports, waits a second, then connects. This also works for `scp` and `rsync`. The `Match` line uses the IP, because by the time `ssh` checks it, `%h` has been replaced with the real hostname from `HostName`.

<x-alert type="info">
If you connect by hostname rather than IP, add `-4` to the `knock` command. Otherwise the knock can go out over IPv4 while `ssh` connects over IPv6, and the firewall only opened the port for your IPv4 address.
</x-alert>

### **If the Knock Doesn't Work**

* **Knock seems stuck or only works sometimes:** the knock packets can arrive in a different order than they were sent, which knockd sees as a wrong sequence. Add a delay between the ports with `knock -d 200`, and wait a second before connecting.
* **No `Stage 1` in the logs:** check that the knock ports aren't blocked by a firewall in your own network or at your hosting provider, and that `Interface` in `/etc/knockd.conf` matches the server's public interface.
* **`OPEN SESAME` in the logs, but `ssh` times out:** you may have connected over IPv6 while the knock went over IPv4, or connected after the 60 second window. Knock with `-4` and connect right after.
