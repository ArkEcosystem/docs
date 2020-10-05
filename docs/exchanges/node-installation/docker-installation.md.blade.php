---
title: Run a relay node using Docker
---

# Docker Installation

ARK Nodes execute many query intensive operations. The most cost-effective approach for running a high-performance node is choosing SSD over HDD. Increasing the total RAM improves cache performance.

## Prerequisites to be installed:
<livewire:embed-link url="https://docs.docker.com/install" caption="Docker Community Edition" />
<livewire:embed-link url="https://docs.docker.com/compose/install" caption="Docker Compose" />

## Install Docker Community Edition

On a fresh OS installation, follow these steps:

### Install Docker CE - Ubuntu / Debian

* Preferably use latest stable OS version!
* Uninstall old versions:

```bash
sudo apt-get remove docker docker-engine docker.io containerd runc
```

1. Install prerequisites:

```bash
sudo apt-get update && sudo apt-get install -y apt-transport-https ca-certificates curl gnupg2 software-properties-common
```

1. Add Docker's official GPG key:

```bash
curl -fsSL https://download.docker.com/linux/$(grep "^ID=" /etc/os-release | cut -d\= -f2)/gpg | sudo apt-key add -
```

1. Add Docker's official repository:

```bash
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/$(grep "^ID=" /etc/os-release | cut -d\= -f2) $(lsb_release -cs) stable"
```

1. Install Docker CE:

```bash
sudo apt-get update && sudo apt-get install -y docker-ce docker-ce-cli containerd.io
```

1. Make Docker usage as a `non-root` user possible:

```bash
sudo usermod -aG docker ${USER}
```

> You'll have to logout and login again or just open another session in order to activate the last step.

### Install Docker CE - CentOS

* Preferably use latest stable OS version!
* Uninstall old versions:

```bash
sudo yum remove docker docker-client docker-client-latest docker-common docker-latest docker-latest-logrotate docker-logrotate docker-engine
```

1. Install prerequisites:

```bash
sudo yum install -y yum-utils device-mapper-persistent-data lvm2
```

1. Add Docker's official repository:

```bash
sudo yum-config-manager --add-repo  https://download.docker.com/linux/centos/docker-ce.repo
```

1. Install Docker CE:

```bash
sudo yum install docker-ce docker-ce-cli containerd.io
```

1. Start Docker CE:

```bash
sudo systemctl start docker && sudo systemctl enable docker
```

1. Make Docker usage as a `non-root` user possible:

```bash
sudo usermod -aG docker ${USER}
```

> You'll have to logout and login again or just open another session in order to activate the last step.

## Install Docker Compose

### Docker Compose Install \(Ubuntu / Debian / CentOS Latest Stable Releases\)

```bash
 sudo curl -sL "https://github.com/docker/compose/releases/download/`curl -fsSLI -o /dev/null -w %{url_effective} https://github.com/docker/compose/releases/latest | sed 's#.*tag/##g' && echo`/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose && sudo chmod +x /usr/local/bin/docker-compose
```

## Using Official ARK Core Docker Image

### Getting the Needed Files

```bash
mkdir mainnet &&
cd mainnet &&
curl -sOJ https://raw.githubusercontent.com/ARKEcosystem/core/master/docker/production/mainnet/docker-compose.yml &&
curl -sOJ https://raw.githubusercontent.com/ARKEcosystem/core/master/docker/production/mainnet/mainnet.env
```

### Running the Node

> For normal Node operation, make sure TCP port 4001 is accessible from outside.

* If you prefer ARK Core settings other than defaults, please make your changes prior running the Core `(file=mainnet.env)`

## Starting the Relay

```bash
docker-compose up -d
```

> If you prefer to use custom DB Name, DB User and DB Password simply adjust variables `POSTGRES_PASSWORD`, `POSTGRES_USER`, `POSTGRES_DB` `(file=docker-compose.yml)` and `CORE_DB_PASSWORD`, `CORE_DB_USERNAME` and `CORE_DB_DATABASE` `(file=mainnet.env)` correspondingly.

* **In case you want to use a remote PostgreSQL server simply adjust variable `CORE_DB_HOST` in your `mainnet.env` and run only Core container:**

```bash
docker-compose up -d core
```

## Troubleshooting

* Make sure your containers are up and running:

```bash
docker ps -a --format "table @{{.Names}}\t@{{.Status}}"
```

> You should see something similar to:

```bash
NAMES               STATUS
core-mainnet        Up 4 minutes
postgres-mainnet    Up 4 minutes
```

* If some of the containers status is not `Up`, check docker logs:

```bash
docker logs core-mainnet
```

```bash
docker logs postgres-mainnet
```

## Maintenance

### Monitoring Relay Logs:

```bash
docker logs --tail 50 core-mainnet -f
```

## Update

### Docker Live Updates Are Now Possible With [CLI](/docs/core/command-line-interface-cli/getting-started)

* As a preliminary step, installation of development tools is necessary \(only needed once, when doing initial update\):

```bash
docker exec -it core-mainnet sudo apk add make gcc g++ git python
```

* We are all set! Run the update and follow instructions:

```bash
docker exec -it core-mainnet ark update
```

> Updates and all changes made to the containers are kept even on container or host restart.

### Update is also possible by destroying and running Core container from scratch, so it downloads the latest image.

> Make sure you destroy only Core container in order to keep your database and avoid syncing the blockchain from zero block. The commands example below does it.

```bash
cd mainnet
docker stop core-mainnet
docker rm core-mainnet
docker rmi $(docker images -q)
docker-compose up -d core
```

### FAQ

#### How Do I Start With Empty DB?

Just execute the following code:

```bash
docker-compose down -v
docker-compose up -d
```

#### How Do I Start Everything from Scratch?

Just stop and trash all containers and images:

```bash
docker stop $(docker ps -aq)
docker rm $(docker ps -aq)
docker rmi $(docker images -q)
docker volume prune -f
docker network prune -f
```
