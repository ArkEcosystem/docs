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

---

<livewire:page-reference path="/docs/mainsail/security/ssh" />

<livewire:page-reference path="/docs/mainsail/security/updated" />

<livewire:page-reference path="/docs/mainsail/security/iptables" />

<livewire:page-reference path="/docs/mainsail/security/fail2ban" />

<livewire:page-reference path="/docs/mainsail/security/knocking" />

<livewire:page-reference path="/docs/mainsail/security/ddos" />
