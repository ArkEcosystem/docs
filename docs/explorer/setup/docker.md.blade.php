---
title: Setup - Docker
---

# Docker Setup

![](/storage/docs/docs/explorer/assets/setup/docker-setup.png)

***The following guide will provide all the details necessary to set up an instance of Explorer for Docker. Ideally, developers should have experience working with containerization platforms such as Docker, AWS Fargate and Microsoft Azure. Take note that you can easily access ARK Explorer images via [Docker Hub](https://hub.docker.com/r/arkecosystem/explorer).***

<x-alert type="info">
Explorer 4.0 requires *two separate databases*, namely a **Core database** that serves data to the Explorer, and another for local storage of additional data (such as forging statistics, for instance).
</x-alert>

## Requirements

In order to successfully carry out an installation of Explorer using Docker, you will need to download and install the following before proceeding further:

- [Docker Engine](https://docs.docker.com/install)
- [Docker Compose](https://docs.docker.com/compose/install)

<x-alert type="warning" title="Attention">
The minimum supported version of Docker is **20.10.x.**
</x-alert>

## Setup

Follow the steps provided below in order to set up Explorer 4.0 with Docker. Ensure that you have all your credentials readily available as you will need these when configuring your environment.

---

### Acquire Files

**Clone the Repository** - To begin, enter the following command to clone the Explorer repository and wait for it to copy all the necessary files onto your system.

```bash
git clone https://github.com/ArkEcosystem/explorer.git
```

---

### Prepare the Application

**Generate the Environment** - Run the following command to create a copy of the default environment variables for Explorer. This will generate a `.env` file containing some of the necessary data you will require for your Docker instance. Naturally you will need to configure some parameters in accordance with your unique setup, but we will cover this in [Adjust Environment Variables.](https://docs.ihost.org/docs/explorer/setup/docker/#adjust-environment-variables)

```bash
cp .env.example .env
```

---

### Adjust Environment Variables

**Configure the Environment** - Navigate to your `.env` file and edit the following variables accordingly.

```ini
APP_NAME=<your-explorer-title>
APP_URL=http://<your-domain>

EXPLORER_NETWORK=production
EXPLORER_DB_HOST=<your-core-database-ip-address>
EXPLORER_DB_PORT=<your-core-database-port>
EXPLORER_DB_DATABASE=<your-core-database-name>
EXPLORER_DB_USERNAME=<your-core-database-username>
EXPLORER_DB_PASSWORD=<your-core-database-password>
```

<x-alert type="info">
You should leave all other parameters at their default values. Adjusting any of these without the requisite knowledge will lead to a failed installation or issues with your Docker instance. Furthermore, when making use of a database that runs on the **Docker host** (such as a local machine or server), you may use the `EXPLORER_DB_HOST=host.docker.internal` parameter to proxy calls from the Docker container to the host.
</x-alert>

---

### Run ARK Explorer (Official ARK Explorer Image)

The following command will pull the latest Explorer image from [Docker Hub](https://hub.docker.com/r/arkecosystem/explorer) and run the `ark-explorer` container.

```bash
cd docker
docker-compose up -d
```

---

### Build and Run ARK Explorer (Build Yourself a Local Image)

Should you wish to build yourself a local image of Explorer 4.0, run the following commands.

```bash
cd docker
docker-compose -f docker-compose-build.yml up -d
```

<x-alert type="success">
If your build is successful, `Creating ark-explorer ... done` will appear.
</x-alert>

---

### Make Sure Explorer is 'Up'

The initial container startup should take two to three minutes for all the dependencies to install and setup to complete. Following this, you can monitor logs by executing the following command.

```bash
docker logs --tail 50 -f ark-explorer
```

A successful startup will produce similar log entries to those detailed below.

```bash
INFO success: nginx entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
INFO success: php-fpm entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
INFO success: redis entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
INFO success: horizon entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
INFO success: short-schedule entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
```

---

### Access Explorer

After successfully carrying out a container startup, you can access Explorer via `http://localhost:8898` or `http://<your-host-ip>:8898`.

<x-alert type="hint">
If you want to start from scratch, run `bash purge_all.sh`.
</x-alert>

## Production Deployment and Zero Downtime Updates

If you wish to use Docker for production purposes and update your Explorer instance without any downtime, follow the guide below that outlines how to proceed.

### Blue/Green Deployment Approach

By making use of [Traefik](https://hub.docker.com/_/traefik), a reverse proxy server with native [Let's Encrypt](https://letsencrypt.org/) SSL support, (including automated certificate requests and renewal), you can easily deploy Explorer and run updates without having to sacrifice any uptime. Using the **Blue/Green Deployment Approach** maximizes efficiency and allows you to manage your Explorer instance much more easily.

---

### Prepare Explorer

<x-alert type="info">
It is necessary to have the Explorer repository available locally since it is mounted in the container as a volume.
</x-alert>

**Clone Repository for Initial Deployment** - Using this approach, you will clone the repository as per normal but use a local folder titled `explorer-green` this time around. Try to stick to the naming conventions contained within this guide as it will ensure the deployment process occurs without any errors.

```bash
git clone https://github.com/ArkEcosystem/explorer.ark.io.git explorer-green
```

---

**Generate the Environment** - `cd` into your `explorer-green` folder and run the command to create a copy of the default environment variables for Explorer. Once again, this will generate a `.env` file containing some of the necessary data you will require for your Explorer instance.

```bash
cd ~/explorer-green
cp .env.prod .env
```

---

**Configure the Environment** - Open the `.env` file and edit the parameters as follows.

```ini
APP_NAME=<your-explorer-title>
APP_URL=https://<your-domain>

EXPLORER_NETWORK=production
EXPLORER_DB_HOST=<your-core-database-ip-address>
EXPLORER_DB_PORT=<your-core-database-port>
EXPLORER_DB_DATABASE=<your-core-database-name>
EXPLORER_DB_USERNAME=<your-core-database-username>
EXPLORER_DB_PASSWORD=<your-core-database-password>
```

You will also need to create a DNS `A` record that points to your Explorer instance's public IP address (For example, `explorer.your-domain.com`).

<x-alert type="warning" title="Attention">
For **Cloudflare** users, in order to ensure a successful SSL certificate request procedure, please disable host protection/proxy during initial deployment. You may re-enable it once your Explorer instance is up and running.
</x-alert>

---

### Prepare Docker

**Adjust Docker Environment** - Open the `docker/production/prod.env` file and edit the following variables.

```ini
ACME_EMAIL=postmaster@your-domain.com
DOMAIN=explorer.your-domain.com
```

---

**Deploy Containers** - `cd` into your `docker/production` folder and run the subsequent command to deploy your instance of Explorer.

```bash
cd docker/production 
bash deploy-prod.sh
```

This will pull and run two containers:

<dl style="line-height: 1.75rem;">
  <dt style="padding-bottom: 4px"><code><strong>traefik_traefik_1</strong></code></dt>
  <dd style="padding-bottom: 24px">This is the reverse proxy that forwards <code>http/https</code> requests to the domain you added as a DNS record designated <code>A</code> (as well as the <code>DOMAIN</code> parameter in your <code>docker/production/prod.env</code> file) to the internal Explorer container.</dd>

  <dt style="padding-bottom: 4px"><code><strong>green_explorer_1</strong></code></dt>
  <dd style="padding-bottom: 24px">This is the internal Explorer container that will trigger the reverse proxy to create an SSL certificate request to 'Let's Encrypt' and install it upon receiving it. The Explorer setup will then commence within the container. Please note that this may take around 2-3 minutes to complete, so please wait for the script to fully execute before proceeding further.</dd>
</dl>

If successful, you can access your instance of Explorer via [https://explorer.your-domain.com](https://explorer.your-domain.com) **(Note that http gets redirected to https)**.

### Zero Downtime Updates

<x-alert type="info">
In order to ensure the update process occur without errors, all subsequent updates require cloning the repo into a new location following the naming convention `explorer-blue` or `explorer-green`.
</x-alert>

**Clone Repository for Update** - Since you cloned the repo into `explorer-green` during your initial deployment, you will clone your first update into `explorer-blue`. In addition, you will also copy all of your `.env` settings (that is, both your `.env` file *and* the `docker/production/prod.env` file) from the initial deployment folder instead of adding them from scratch. Run the commands as follows.

```bash
cd ~
git clone https://github.com/ArkEcosystem/explorer.ark.io.git explorer-blue
cd ~/explorer-blue
cp -f ~/explorer-green/.env ~/explorer-blue/.env
cp -f ~/explorer-green/docker/production/prod.env ~/explorer-blue/docker/production/prod.env
```

---

**Deploy Containers** - Run the following command to pull and run a new Explorer container called `blue_explorer_1` which will follow a similar deployment process as the initial deployment

```bash
bash deploy-prod.sh
```

<x-alert type="success">
After successful deployment, the script will remove your old Explorer container (namely `green_explorer_1`) and notify you that it is now safe to remove your previous source folder `~/explorer-green`. Consequently, during the update process, you should not experience any Explorer downtime as the reverse proxy should handle the proper distribution of the traffic.
</x-alert>

---

### Subsequent Updates

You should carry out any further updates using the approach outlined above - remember to preserve the local source folder naming conventions as described earlier in this guide. Logically speaking, your next update will require you to clone the repo into the `~/explorer-green` folder.

```bash
cd ~
rm -rf ~/explorer-green
git clone https://github.com/ArkEcosystem/explorer.ark.io.git explorer-green
cd ~/explorer-green
cp -f ~/explorer-blue/.env ~/explorer-green/.env
cp -f ~/explorer-blue/docker/production/prod.env ~/explorer-green/docker/production/prod.env
bash deploy-prod.sh
```
