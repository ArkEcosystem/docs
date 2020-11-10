---
title: How To Deploy Blockchain Explorer With Docker?
---

# How To Deploy Blockchain Explorer With Docker?

ARK Explorer images will be available at [Docker Hub](https://hub.docker.com/r/arkecosystem/explorer).

## Deployment

> Before continuing with this guide: You will need access to the database of a core instance. The credentials can be specified in the `.env` file under `EXPLORER_DB_*`.

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

EXPLORER_NODEJS=/usr/local/bin/node
```

### Run ARK Explorer - official ARK Explorer image at [Docker Hub](https://hub.docker.com/r/arkecosystem/explorer)

To be added after release.

### Build and run ARK Explorer - build yourself a local image

```bash
cd docker
docker-compose -f docker-compose-build.yml up -d
```

After successful build you should see: `Creating ark-explorer ... done`

> Initial container startup would take about 2-3 minutes untill all dependencies install and setup is done. You can monitor logs by executing:

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

### Zero Downtime Updates

To be added ...
