---
title: Security - Using SSH
---

# Using SSH

When running an ARK node, especially a Delegate Node, you should consider your server's security as your main priority.

<x-alert type="warning">
During this guide, we will configure network and SSH parameters, which if improperly performed might permanently lock you out of your server. Ensure you fully understand each step before proceeding, and keep your current SSH session open until you have confirmed you can log in again.
</x-alert>

## Using SSH Keys

Logging in with an SSH key is far more secure than a password, and lets us disable password logins altogether. Set up your key **before** changing the SSH configuration, so you can't lock yourself out.

SSH keys should be generated on the computer you wish to log in from. Press enter to accept the defaults, and preferably set a passphrase.

### **macOS / Linux / Windows**

All three ship with OpenSSH, so the same command works in a terminal or in PowerShell:

```bash
ssh-keygen -t ed25519
```

This creates a private key (`id_ed25519`) and a public key (`id_ed25519.pub`) in your `~/.ssh` directory. Only the **public** key ever leaves your computer.

### **Copy Your Key to the Server**

On macOS and Linux, copy the public key to the user you created during the installation:

```bash
ssh-copy-id ark@nodeip
```

On Windows, `ssh-copy-id` is not available. Append the contents of `id_ed25519.pub` to `~/.ssh/authorized_keys` on the server instead:

```powershell
type $env:USERPROFILE\.ssh\id_ed25519.pub | ssh ark@nodeip "mkdir -p ~/.ssh && chmod 700 ~/.ssh && cat >> ~/.ssh/authorized_keys && chmod 600 ~/.ssh/authorized_keys"
```

Log in again with `ssh ark@nodeip`. If you are not asked for the user's password (only for your key passphrase, if you set one), the key works.

## SSH Configuration

Instead of editing `/etc/ssh/sshd_config` itself, we put our settings in a separate file in `/etc/ssh/sshd_config.d/`. This keeps them apart from the defaults, and package updates won't ask you to merge changes into your config.

<x-alert type="info">
`sshd` uses the **first** value it reads for each setting. Ubuntu includes `/etc/ssh/sshd_config.d/*.conf` at the top of `sshd_config`, so settings in this directory take priority. Check that the `Include /etc/ssh/sshd_config.d/*.conf` line is still near the top of `/etc/ssh/sshd_config`, and that no other file in that directory sets the same options, for example a `50-cloud-init.conf` that enables `PasswordAuthentication`.
</x-alert>

### **Choose a Port**

Pick a port between `49152` and `65535` for SSH. Since we are not using the default SSH port, it is crucial you do not forget what you choose, or you will not be able to access your server. We'll use `55555` in the examples below.

If `ufw` is already active on your server, allow the new port **before** restarting SSH, or you will be locked out:

```bash
sudo ufw status
sudo ufw allow 55555/tcp
```

<x-alert type="info">
When you set up [port knocking](/docs/core/security/knocking) later on, this rule is removed again so the port is only opened after a correct knock.
</x-alert>

### **Create the Config File**

```bash
sudo nano /etc/ssh/sshd_config.d/00-ark-hardening.conf
```

`file: /etc/ssh/sshd_config.d/00-ark-hardening.conf`

```bash
Port 55555
PermitRootLogin no
LoginGraceTime 60
MaxAuthTries 3
MaxStartups 2
X11Forwarding no

# Only once your SSH key works:
PubkeyAuthentication yes
PasswordAuthentication no
KbdInteractiveAuthentication no
```

Press `CTRL+X` to exit the file, `Y` to save the file and then `Enter` to write to the file and return to the command line.

| Setting | Why |
| :------ | :-- |
| `Port` | Moves SSH away from port 22, which is scanned constantly |
| `PermitRootLogin no` | You should never log in as root, use your own user and `sudo` instead |
| `LoginGraceTime 60` | Drops connections that don't authenticate within 60 seconds |
| `MaxAuthTries 3` | Limits authentication attempts per connection |
| `MaxStartups 2` | Limits concurrent unauthenticated connections |
| `X11Forwarding no` | A node has no use for graphical forwarding |
| `PasswordAuthentication no` | Only allows key logins. Leave the last three lines out if you have not set up a key yet |

<x-alert type="info">
`KbdInteractiveAuthentication` replaces the deprecated `ChallengeResponseAuthentication` option you may know from older guides.
</x-alert>

### **Validate the Config**

Always check the configuration before restarting. If this prints anything, fix the reported problem first:

```bash
sudo sshd -t
```

### **Disable Socket Activation**

Since Ubuntu 22.10, SSH is started through `ssh.socket` by default, which listens on the port itself. Switch back to the regular `ssh.service`, so `sshd` listens on the port from your config file:

```bash
sudo systemctl disable --now ssh.socket
sudo systemctl enable ssh.service
```

### **Restart SSH**

Your current session stays connected when you restart SSH:

```bash
sudo systemctl restart ssh
sudo ss -tlnp | grep sshd
```

The second command should show `sshd` listening on your new port.

### **Test New SSH Connection**

From a **new** terminal on your own computer, without closing the current session:

```bash
ssh -p 55555 ark@nodeip
```

If everything was setup successfully, you should be reconnected to your ARK node. If it fails, use the session you still have open to fix the configuration, or remove `/etc/ssh/sshd_config.d/00-ark-hardening.conf` and restart SSH to go back to the defaults.
