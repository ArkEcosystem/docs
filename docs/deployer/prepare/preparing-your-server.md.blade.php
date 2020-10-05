---
title: Preparing Your Server
---

# Preparing Your Server

## Creating a User

Executing this guide as the root user should be avoided. Instead, create a new dedicated user to manage your bridgechain and grant him sudo privileges. On your server, type the following into the command line and press enter:

```bash
adduser <username>
```

`Username` is the new name you want to use. Moving forward in our examples we'll use username `bridgechain` but if can be customized to your preferred choice.

```bash
adduser bridgechain
```

You will see:

```bash
Adding user 'bridgechain' ...
Adding new group 'bridgechain' (1000) ...
Adding new user 'bridgechain' (1000) with group 'bridgechain' ...
Creating home directory '/home/bridgechain' ...
Copying files from '/etc/skel' ...
Enter new UNIX password:
```

You will need to enter a user password and confirm it by entering the same password again. Make sure it's long and secure. After that, you will be prompted to enter the new user’s full name and some other information. As they are optional, feel free to leave them all blank by continuing to press `Enter`.

You will see:

```
passwd: password updated successfully
Changing the user information for bridgechain
Enter the new value, or press ENTER for the default
   Full Name []:
   Room Number []:
   Work Phone []:
   Home Phone []:
   Other []:
Is the information correct? [Y/n]
```

When prompted to confirm, type `Y` and press `Enter` to finish.

## Granting New User Sudo Privileges

Now that a new user is added, we need to give them sudo priveleges so the new user can execute administrative functions.

```bash
usermod -a -G sudo bridgechain
```

The username is `bridgechain` in our example.

Now, our server is configured and ready to accept the bridgechain installation script, aside from any security precautions you should take with your new server such as _disabling root access,_ _SSH using keypairs,_ _custom SSH port_, _port knocking_, _fail2ban_, or _DDoS protection_.

## Securing the Servers

The documentation for securing an ARK Public Network or Devnet node also applies for launching a bridgechain. This is important because the genesis node must be protected as much as possible from attack if live delegates aren't available yet. [Review security precautions here.](/docs/core/how-to-guides/setting-up-your-production-environment/how-to-secure-your-ark-node) Moreover, it is strongly advised to destroy genesis delegate passphrases on the genesis node when your network attains proper stability after live delegates step in.
