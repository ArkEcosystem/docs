---
title: Security - Cloudflare DDoS Protection
---

# Cloudflare DDoS Protection

When running an ARK node, especially a Valdiator Node, you should consider your server's security as your main priority.

<x-alert type="warning">
During this guide, we will configure network and SSH parameters, which if improperly performed might permanently lock you out of your server. Ensure you fully understand each step before proceeding.
</x-alert>

## DDOS Protection With Cloudflare

In this section, we're going to setup Cloudflare and SSL for DDoS protection and security using Nginx as a reverse proxy.

### **Install Nginx**

```bash
sudo apt-get install nginx
```

### **Edit Nginx Config**

```bash
sudo nano /etc/nginx/sites-enabled/default
```

Paste in the following config, making sure you edit the `server_name` and `proxy_pass`. You may need to change `ssl_certificate` and `ssl_certificate_key` if you name your files something different.

`File: /etc/nginx/enabled-sites/default`

```bash
# HTTPS
server {
    listen 443 ssl;
    server_name node.yoursite.com;
    ssl_certificate /etc/nginx/ssl/ark.crt;
    ssl_certificate_key /etc/nginx/ssl/ark.key;
    ssl_verify_client off;
    ssl_protocols TLSv1 TLSv1.1 TLSv1.2;
    ssl_ciphers EECDH+CHACHA20:EECDH+AES128:RSA+AES128:EECDH+AES256:RSA+AES256:EECDH+3DES:RSA+3DES:!MD5;
    ssl_prefer_server_ciphers on;
    location / {
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-NginX-Proxy true;
        proxy_pass http://localhost:4001/;
        proxy_ssl_session_reuse off;
        proxy_set_header Host $http_host;
        proxy_cache_bypass $http_upgrade;
        proxy_redirect off;
    }
}
```

Press `CTRL+X` to exit the file, `Y` to save the file, and `ENTER` to write to the file and return to the command line.

### **Cloudflare / SSL Setup**

Login to your Cloudflare dashboard and click on the `DNS` button.

![](/storage/docs/docs/mainsail/assets/cloudflare_dns.png)

Then go to `Crypto`.

![](/storage/docs/docs/mainsail/assets/cloudflare_crypto.png)

Scroll down to `Origin Certificates` and click the `Create Certificate` button. Keep this window open after Cloudflare generates your two keys.

![](/storage/docs/docs/mainsail/assets/cloudflare_certificate.png)

Open Terminal on your ARK node server

We need to create a new folder and copy our keys to our server.

```bash
mkdir /etc/nginx/ssl
cd /etc/nginx/ssl
touch ark.crt ark.key
```

Copy the `PRIVATE KEY` to the file `ark.key` and the `CERTIFICATE` to `ark.crt`.

### **Start Nginx**

```bash
sudo service nginx start
```

If everything started fine, you should be able to access your ARK node APIs behind SSL. Giving you the bonus of Cloudflare DDOS protection.

Otherwise, if you get any errors run the following command to troubleshoot nginx.

```bash
sudo nginx -t -c /etc/nginx/nginx.conf
```

### Conclusion

Your node is now very secure. With this setup, you can open and close your SSH port remotely using a secret knocking technique as well as sign in using cryptographic keys.
