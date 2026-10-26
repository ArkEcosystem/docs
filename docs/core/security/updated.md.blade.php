---
title: Security - Staying Up-to-Date
---

# Staying Up-to-Date

The first thing we're going to do is make sure we have the latest security updates for Ubuntu.

```bash
sudo apt-get update
sudo apt-get upgrade -y
```

Some updates, like a new kernel, only take effect after a reboot. Ubuntu creates `/var/run/reboot-required` when that is the case:

```bash
[ -f /var/run/reboot-required ] && sudo reboot
```

## Automatic Security Updates

Ubuntu ships with `unattended-upgrades`, which installs security updates automatically every day. Make sure it is installed and enabled:

```bash
sudo apt-get install -y unattended-upgrades
```

`file: /etc/apt/apt.conf.d/20auto-upgrades`

```bash
APT::Periodic::Update-Package-Lists "1";
APT::Periodic::Unattended-Upgrade "1";
APT::Periodic::AutocleanInterval "7";
```

```bash
sudo systemctl enable --now unattended-upgrades
```

By default only packages from the security pocket are upgraded, and the server is never rebooted automatically. We recommend keeping it that way for a forger, so you can plan reboots and make sure it comes back online. You can check what would be upgraded with:

```bash
sudo unattended-upgrade --dry-run --debug
```

<x-alert type="info">
Kernel updates still need a reboot. If you want to avoid that, [Canonical Livepatch](https://ubuntu.com/security/livepatch) applies critical kernel fixes to a running system. It is part of Ubuntu Pro, which is free for personal use on a limited number of machines: `sudo pro attach <token> && sudo pro enable livepatch`.
</x-alert>

<x-alert type="warning">
`cron-apt` is no longer recommended. Remove it if you set it up before, so it does not run alongside `unattended-upgrades`: `sudo apt-get purge cron-apt`.
</x-alert>
