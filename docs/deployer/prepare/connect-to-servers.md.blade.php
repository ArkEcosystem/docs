---
title: Connect to Your Servers
---

# Connect To Servers

## Connecting to Server

Now that you have initialized the necessary servers, you need to connect to them and prepare them for bridgechain deployment.

**Windows**:

* Download and launch **[PuTTy](https://putty.org/)**.
* Enter the **Host Name (or IP Address)** provided to you by your chosen hosting service.
* **SSH Port** is usually **22**, but your provider may initialize servers with a different port.
* In the **Saved Sessions** text box, name your host according to the server name you chose in your hosting provider's dashboard, for your reference.
* Press the `Save` button on the right.
* Repeat for each server you have initialized with your provider.
* You can now start double-clicking names and connect to the servers.

**MacOS, Linux and** **[Windows Subsystem For Linux](https://docs.microsoft.com/en-us/windows/wsl/install-win10)**

* Open a new terminal window and type

```bash
ssh root@ipaddress
```

`root` is usually the initial username generated for the server in question and `ipaddress` is is the IP address of the new server in question.

## Cache Host Key & Validate RSA Fingerprint

When first connecting to your new server, you will be asked to cache the server's host key and validate the RSA fingerprint. Choose `Y` or `Yes`.

```bash
The authenticity of host '{SERVER_IP}' can't be established.
ECDSA key fingerprint is SHA256:'{FINGERPRINT}'.
Are you sure you want to continue connecting (yes/no)?
```

**CAUTION:** If this message appears again after you have already cached and validated, take precautions. It might have been compromised.

## Provide or Initialize Root Password

When prompted, use the password given to you by your hosting provider. Some providers will require you to set up a root password when creating the VPS, while others may give you a temporary password. You will also likely be prompted to immediately change the password upon entering the temporary one. Choose something as long, complicated, and unique as possible as attackers can try to brute force it especially if you haven't set up security precautions like _disabling root access,_ _custom SSH port_, _port knocking_, _fail2ban_, or _DDoS protection_.
