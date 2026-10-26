---
title: Security - Security Through Obscurity
---

# Security Through Obscurity

When running an ARK node, especially a Delegate Node, you should consider your server's security as your main priority.

<x-alert type="warning">
During this guide, we will configure network and SSH parameters, which if improperly performed might permanently lock you out of your server. Ensure you fully understand each step before proceeding.
</x-alert>

## Security Through Obscurity

By outlining how to secure a node we're breaking a fundamental property of network security. We are telling people how we are defending our network. This breaks the security through obscurity ([Wikipedia Reference](https://en.wikipedia.org/wiki/Security_through_obscurity)) rule. If all nodes were secured in the same way, a single exploit might compromise the entire network. It is therefore vital that you consider other sources as well to secure your node.

## Automated Setup

The [`secure.sh`](https://raw.githubusercontent.com/ArkEcosystem/core/master/scripts/secure.sh) script applies the baseline from the pages below in one go, on Ubuntu 24.04 LTS and 26.04 LTS: automatic security updates, a hardened SSH configuration, fail2ban, port knocking and a `ufw` firewall that only exposes the P2P port (and optionally the public API), with a limit on P2P connections per IP. Run it as your normal sudo user, not as root:

```bash
curl -fsSLO https://raw.githubusercontent.com/ArkEcosystem/core/master/scripts/secure.sh
less secure.sh
bash secure.sh
```

It asks for the network, whether to expose the API and which SSH port to use, shows a summary and only continues after you confirm. At the end it prints your SSH port and knock sequence. **Write these down**, and keep your current SSH session open until you have logged in again from a new terminal.

<x-alert type="info">
Add your SSH key to the server first, as described in [Using SSH](/docs/core/security/ssh#using-ssh-keys). The script only disables password logins when it finds a key in `~/.ssh/authorized_keys`, so you can re-run it after adding one.
</x-alert>

Treat the script as a starting point. Read the pages below to understand what it does, and add your own measures on top, so not every node is secured in exactly the same way.

---

<livewire:page-reference path="/docs/core/security/updated" />

<livewire:page-reference path="/docs/core/security/ssh" />

<livewire:page-reference path="/docs/core/security/fail2ban" />

<livewire:page-reference path="/docs/core/security/knocking" />

<livewire:page-reference path="/docs/core/security/iptables" />

<livewire:page-reference path="/docs/core/security/ddos" />
