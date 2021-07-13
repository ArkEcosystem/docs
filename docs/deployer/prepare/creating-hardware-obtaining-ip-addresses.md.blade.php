---
title: Creating Hardware and Obtaining IP Addresses
---

# Creating Hardware and Obtaining IP Addresses

After choosing the server design that's right for you, it's time to set servers up and obtain IP addresses. Knowing the IP address of your network's genesis node is required, and the Deployer will also optionally ask for IPs for your Mainnet and Devnet initial peers. Let's select a service provider and create hardware.

With each provider, the setup process for creating dedicated hardware or a new VPS is going to be different. If choosing one of the listed providers, we have created quick links below to get started:

* [Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-create-your-first-digitalocean-droplet) _(Recommended for VPS ease of use)_
* [Linode](https://www.linode.com/docs/getting-started/#provision-your-linode)
* [Amazon Web Services](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html)
* [Vultr](https://www.vultr.com/)
* [Microsoft Azure](https://docs.microsoft.com/en-us/azure/virtual-machines/linux/overview)
* [OVH](https://docs.ovh.com/gb/en/cloud-web/getting-started-with-cloud-web/)

Now that you have chosen your service provider, you can create the required genesis node server and the initial peer servers for your Mainnet, Devnet and Testnet networks. With the creation of each server, an IP address will be provided. This information can usually be found somewhere in your provider’s dashboard, or it's sent to your email for each server initialization. It’s important to now assign each server a role within your network.

* Allocate a server for genesis node bridgechain deployment and record the IP address.
* Record the IP address of each server that you designated as a peer for **Devnet.**
* Record the IP address of each server that you designated as a peer for **Mainnet.**

You will be asked for this information by the ARK Deployer.

> **Final Note:** Your three networks (Mainnet, Devnet, and Testnet) obviously need servers to function. Your genesis node can handle all _genesis delegates_, as they will all be virtually hosted on the genesis node, forging transactions until you, your organization, or the public launch independent _live delegate nodes_. However, you'll need a certain number of independent peers (relay nodes) for each network.

If using for example Digital Ocean VPS services, you'll need:

* The genesis node to get **Testnet** running

  (Total: ~$40/mo).

* The genesis node (~$40/mo) and 5 relay nodes (~$100/mo) to get **Devnet** running

  (Total: ~$140/mo).

* The genesis node (~$40/mo) and 20 relay nodes (~$400/mo) to get **Mainnet** running

  (Total: ~$440/mo).

You can technically scale back the number of these initial nodes you launched as your network grows, but you are advised to keep at least some of these nodes up for the foreseeable future. They are used by brand new nodes to acquire the initial state of the network and provide a way to join it using the `peers.json` file which contains a list of the initial seed peers for Devnet and Mainnet. Future delegates who run your network might or might not update that file.
