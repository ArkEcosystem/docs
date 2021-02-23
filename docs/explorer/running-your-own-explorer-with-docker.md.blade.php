---
title: How To Deploy Blockchain Explorer With Docker?
---

# How To Deploy Blockchain Explorer With Docker?

ARK Explorer images are now available at [Docker Hub](https://hub.docker.com/r/arkecosystem/explorer).

## Prerequisites

Prerequisites to be installed:

* [Docker Engine](https://docs.docker.com/install)
* [Docker Compose](https://docs.docker.com/compose/install)

## Deployment

> Before continuing with this guide: You will need access to the database of a Core instance. The credentials can be specified in the `.env` file under `EXPLORER_DB_*`.

### Clone source and prepare Environment

```bash
git clone https://github.com/ArkEcosystem/explorer.ark.io.git explorer
cd explorer
cp .env.prod .env
```

Open the `.env` file and edit the following variables. *You should leave all other variables at their defaults.*

```ini
APP_NAME="Your Explorer Title"
APP_URL=http://your-domain.com

EXPLORER_NETWORK=production
EXPLORER_DB_HOST=YOUR_CORE_DATABASE_IP_ADDRESS
EXPLORER_DB_PORT=YOUR_CORE_DATABASE_PORT
EXPLORER_DB_DATABASE=YOUR_CORE_DATABASE
EXPLORER_DB_USERNAME=YOUR_CORE_DATABASE_USERNAME
EXPLORER_DB_PASSWORD=YOUR_CORE_DATABASE_PASSWORD

```

### Run ARK Explorer - official ARK Explorer image

```bash
cd docker
docker-compose up -d
```

This will pull latest Explorer image from [Docker Hub](https://hub.docker.com/r/arkecosystem/explorer)  and run `ark-explorer` container.

### Build and run ARK Explorer - build yourself a local image

```bash
cd docker
docker-compose -f docker-compose-build.yml up -d
```

After successful build you should see: `Creating ark-explorer ... done`

### Make sure Explorer is UP 

> Initial container startup would take about 2-3 minutes until all dependencies install and setup is done. You can monitor logs by executing:

```bash
docker logs --tail 50 -f ark-explorer
```

A successful startup would produce similar log entries:

```
INFO success: nginx entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
INFO success: php-fpm entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
INFO success: redis entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
INFO success: horizon entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
INFO success: short-schedule entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
```

### Accessing Explorer

After successful container startup Explorer should be accessible at http://localhost:8898 or http://YOUR_HOST_IP:8898

### Start from scratch

```bash
bash purge_all.sh
```

## Production Deployment and Zero Downtime Updates

* Blue/Green Deployment approach 

  - Reverse proxy server [Traefik](https://hub.docker.com/_/traefik) with native Let's Encrypt SSL supports including automated certificate requests and renewal.
  - Explorer easily deployed and updated with no downtime.

> Before continuing with this guide: You will need access to the database of a Core instance. The credentials can be specified in the `.env` file under `EXPLORER_DB_*`.

### Prepare Environment 

_NOTE: We need Explorer source locally as it gets mounted in the container as a volume!

The next step is similar to deployment scenarios above. The only difference is that we should stick to specific local folders naming convention in order to have flawless deployment and further updates. 
 
>Clone source for initial deployment - a local folder `explorer-green` is used:

```bash
cd ~
git clone https://github.com/ArkEcosystem/explorer.ark.io.git explorer-green
cd ~/explorer-green
cp .env.prod .env
```

>Open the `.env` file and edit the following variables: 

```ini
APP_NAME="Your Explorer Title"
APP_URL=http://your-domain.com

EXPLORER_NETWORK=production
EXPLORER_DB_HOST=YOUR_CORE_DATABASE_IP_ADDRESS
EXPLORER_DB_PORT=YOUR_CORE_DATABASE_PORT
EXPLORER_DB_DATABASE=YOUR_CORE_DATABASE
EXPLORER_DB_USERNAME=YOUR_CORE_DATABASE_USERNAME
EXPLORER_DB_PASSWORD=YOUR_CORE_DATABASE_PASSWORD

```
>*Create a DNS `A` record that points to your Explorer instance Public IP address (example: `explorer.your-domain.com`)*


>Open the `docker/production/prod.env` file and edit the following variables:

```ini
ACME_EMAIL=postmaster@your-domain.com
DOMAIN=explorer.your-domain.com

```
 
### Initial deploy

```bash
cd docker/production 
bash deploy-prod.sh
```

That will pull and run two containers:
  - `traefik_traefik_1` - the reverse proxy forwarding HTTP/HTTPS requests to the domain you added as `A` DNS record (also `docker/production/prod.env` file `DOMAIN` variable) to the internal Explorer container. 
  - `green_explorer_1` - the internal Explorer container which upon startup will trigger the reverse proxy to make an SSL certificate request to Let's Encrypt and install it after receiving it. Explorer setup will start inside the container in parallel which may take up to 2-3 minutes, so be patient and wait for the script to finish.

You should be now able to access your Explorer instance at https://explorer.your-domain.com (HTTP gets redirected to HTTPS).

### Zero Downtime Updates

_NOTE: In order to have a flawless update process, all consequent updates require cloning the source in a new location following the naming convention `explorer-blue` or `explorer-green`.

>Assuming we have cloned the source into `explorer-green` during our initial deploy, our first update would expect to be cloned into `explorer-blue`. We'll also copy all our ENV settings from initial deployment folder instead of adding them from scratch:

```bash
cd ~
git clone https://github.com/ArkEcosystem/explorer.ark.io.git explorer-blue
cd ~/explorer-blue
cp -f ~/explorer-green/.env ~/explorer-blue/.env
cp -f ~/explorer-green/docker/production/prod.env ~/explorer-blue/docker/production/prod.env
bash deploy-prod.sh
```

This will pull and run a new Explorer container `blue_explorer_1` which will follow similar deployment process as the initial deployment one. After successful deployment, the script will remove your old Explorer container `green_explorer_1` and notify you it is now safe to remove your previous source folder `~/explorer-green`. During the update process you shouldn't experience any Explorer downtime as the reverse proxy should handle the proper distribution of the traffic.

_NOTE: From that point on you should perform updates the same way, just preserving the local source folder naming. So for example your next update would assume you clone the source into `~/explorer-green` folder. Example:

```bash
cd ~
rm -rf ~/explorer-green
git clone https://github.com/ArkEcosystem/explorer.ark.io.git explorer-green
cd ~/explorer-green
cp -f ~/explorer-blue/.env ~/explorer-green/.env
cp -f ~/explorer-blue/docker/production/prod.env ~/explorer-green/docker/production/prod.env
bash deploy-prod.sh
```


