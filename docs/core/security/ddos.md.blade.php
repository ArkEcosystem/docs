---
title: Security - Cloudflare DDoS Protection
---

# Cloudflare DDoS Protection

When running an ARK node, especially a Delegate Node, you should consider your server's security as your main priority.

<x-alert type="warning">
During this guide, we will configure network and SSH parameters, which if improperly performed might permanently lock you out of your server. Ensure you fully understand each step before proceeding.
</x-alert>

## DDoS Protection With Cloudflare

In this section, we're going to put your node's public API behind Cloudflare with SSL for DDoS protection, using Nginx as a reverse proxy.

<x-alert type="info">
Cloudflare only proxies HTTP(S) traffic, so this protects the public API (port `4003`). The P2P port has to stay directly reachable for other nodes. Protect it with the [connection limits](/docs/core/security/iptables) instead.
</x-alert>

### **Install Nginx**

```bash
sudo apt-get install -y nginx
```

### **Cloudflare / SSL Setup**

Login to your Cloudflare dashboard and add a DNS record for your node, for example `node.yoursite.com`, pointing to your server's IP. Make sure the record is **Proxied** (orange cloud).

![](/storage/docs/docs/core/assets/cloudflare_dns.png)

Then go to `SSL/TLS` and set the encryption mode to **Full (strict)**, so the connection between Cloudflare and your server is encrypted and verified as well.

![](/storage/docs/docs/core/assets/cloudflare_crypto.png)

Go to `SSL/TLS` > `Origin Server` and click the `Create Certificate` button. Keep this window open after Cloudflare generates the certificate and private key.

![](/storage/docs/docs/core/assets/cloudflare_certificate.png)

Open a terminal on your ARK node server. We need to create a new folder and copy the certificate and key to our server:

```bash
sudo mkdir -p /etc/nginx/ssl
sudo nano /etc/nginx/ssl/ark.crt
sudo nano /etc/nginx/ssl/ark.key
sudo chmod 600 /etc/nginx/ssl/ark.key
```

Copy the `Origin Certificate` to the file `ark.crt` and the `Private Key` to `ark.key`.

### **Edit Nginx Config**

```bash
sudo nano /etc/nginx/sites-available/ark-api
```

Paste in the following config, making sure you edit the `server_name`. You may need to change `ssl_certificate` and `ssl_certificate_key` if you name your files something different.

`file: /etc/nginx/sites-available/ark-api`

```bash
# HTTPS
server {
    listen 443 ssl;
    listen [::]:443 ssl;
    server_name node.yoursite.com;

    ssl_certificate /etc/nginx/ssl/ark.crt;
    ssl_certificate_key /etc/nginx/ssl/ark.key;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_prefer_server_ciphers off;

    location / {
        proxy_pass http://127.0.0.1:4003/;
        proxy_http_version 1.1;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        proxy_redirect off;
    }
}
```

Press `CTRL+X` to exit the file, `Y` to save the file, and `ENTER` to write to the file and return to the command line.

<x-alert type="info">
TLS 1.0 and 1.1 are deprecated and rejected by modern browsers and by Cloudflare's recommended settings, so only TLS 1.2 and 1.3 are enabled. Leaving `ssl_ciphers` unset uses the secure defaults of OpenSSL on Ubuntu.
</x-alert>

### **Enable the Site and Start Nginx**

```bash
sudo ln -s /etc/nginx/sites-available/ark-api /etc/nginx/sites-enabled/ark-api
sudo nginx -t
sudo systemctl enable nginx
sudo systemctl reload nginx
```

If `nginx -t` reports an error, fix it before reloading. If everything started fine, you should be able to access your ARK node API at `https://node.yoursite.com/api`, behind SSL and with Cloudflare's DDoS protection.

### **Only Allow Cloudflare**

Your API is still reachable directly on port `4003`, which bypasses Cloudflare. Close that port, and only allow HTTPS from [Cloudflare's IP ranges](https://www.cloudflare.com/ips/):

```bash
sudo ufw delete allow 4003/tcp
for ip in $(curl -fsSL https://www.cloudflare.com/ips-v4) $(curl -fsSL https://www.cloudflare.com/ips-v6); do
    sudo ufw allow from "$ip" to any port 443 proto tcp
done
```

Cloudflare occasionally changes these ranges, so check them now and then.

### Conclusion

Your node is now very secure. With this setup, you can open your SSH port remotely using a secret knocking technique, sign in using cryptographic keys, and your public API is shielded by Cloudflare.
