---
title: How to Deploy a Blockchain Explorer
---

# How to Deploy a Blockchain Explorer

<x-alert type="info">
The following archived information only serves as a reference to the prior VueJS implementation of the Explorer which now resides [here.](https://github.com/ArkEcosystemArchive/explorer)
</x-alert>

At ARK.io, we have a [mainnet](https://explorer.ark.io) and [devnet](https://dexplorer.ark.io) Explorer running to show the current state of the network and what is happening on it. In addition, there is are official mirrors for the mainnet Explorer too, which you can find on different services such as [GitHub pages](https://arkecosystem.github.io/explorer/) and [Netlify](https://ark-explorer.netlify.com/#/).

To run your own Explorer, or an additional mirror of the ARK Explorer, there are a couple of ways to achieve this:

## Run Explorer on GitHub Pages

Our [Explorer mirror](https://arkecosystem.github.io/explorer/) runs on GitHub pages and is simply said a branch that contains the `dist` directory that is generated when you build the Explorer. To run the Explorer on your own GitHub pages website, you can do one of the following:

### GitHub with Root Repository

Your root repository for GitHub pages is one named `username.github.io`, for example [arkecosystem.github.io](https://github.com/ArkEcosystem/arkecosystem.github.io) (repo). After you've built the Explorer by running `yarn build`, you can push the contents of the `dist` folder to your root repository and it will be served on `username.github.io`. That's it!

### GitHub with Variable Repository

When you don't use a root repository for GitHub pages (e.g. because it's already in use), you can still have it hosted in a sub-directory of your GitHub pages website. If you for example create a repository called `my-explorer`, it will become available on `username.github.io/my-explorer`. If you would then build the Explorer by running `yarn build --base https://username.github.io/my-explorer/` and push the contents of the generated `dist` files to your repository `my-explorer`, it will be served on your GitHub pages website. The additional `--base` parameter is needed to point the Explorer to the correct url, as it will use the root domain by default.

## Run Explorer on Netlify

The Explorer is also compatible with [Netlify](https://www.netlify.com). In order to run it on there, you will need to:

- Link your Explorer repository
- Choose the `master` branch
- Set `yarn build:mainnet` or (`devnet`, depending on what you need) as build command
- Set `dist` as publish directory
- Deploy, and your Explorer will become visible on your netlify URL

## Run Explorer as an Express Server

You can run the Explorer as an express server. This makes it a little more light-weight but not needing to have services such as apache or nginx.

```bash
EXPLORER_HOST="127.0.0.1" EXPLORER_PORT="4200" node express-server.js
```

## Run Explorer as an ARK Core Plugin

If you run an ARK relay, you can also run an Explorer as a core plugin. For this you will need to follow the following steps:

1. Install the core-explorer package: `yarn global add @arkecosystem/core-explorer`
2. To enable the plugin, add `'@arkecosystem/core-explorer': {}` to the end of your `~/.config/ark-core/<mainnet|devnet|testnet>/plugins.js` file. After this you will need to point the plugin to a directory where it can find the built Explorer files. For this you need to edit your `~/.config/ark-core/<mainnet|devnet|testnet>/.env` file and add a `CORE_EXPLORER_PATH` variable followed by the path to your Explorer files. This means that you need to build the Explorer first, and send the `dist` folder over to your server and use its location for the `CORE_EXPLORER_PATH` variable (for example `CORE_EXPLORER_PATH=/home/ark/explorer/dist/`).
3. Restart the relay and your Explorer will become available on your node's ip on port 4200. This will be indicated by a message similar to `Explorer is listening on http://0.0.0.0:4200.` in your logs. For further customizations, the `.env` variables `CORE_EXPLORER_HOST` and `CORE_EXPLORER_PORT` can be set (e.g. to change the port).

## General Website Hosting Notes

You can also run an Explorer on any other server (e.g. at a website hosting company), as long as a service like `nginx` or `apache` is installed. The instructions on how to get it up and running will differ per service, but in general it comes down to having the contents of the `dist` folder being served on your website. This could be as easy as having it put inside a `www` or `html` folder, to having to specify configurations with `nginx` or another service. Keep in mind that if you run the Explorer from a sub-directory, that you will need to build with the `--base` parameter. You can find more information on this in the README document in the [Explorer repository](https://github.com/ArkEcosystem/explorer).
