---
title: How To Set Custom Branding?
---

# How To Set Custom Branding?

This document will explain the files that you might have to adjust to have the Explorer work with your custom chain and have it displayed in your own brand colors.

### Network Data

> [src/App.vue around ~L76](https://github.com/ArkEcosystem/explorer/blob/master/src/App.vue)

The Explorer fetches certain information from the network, which is done in this file. If your network has additional data that it requires later on, then you will need to extend it here to properly store it for later use. Generally you will not have to change this file as the Explorer already fetches the information a default bridgechain will need.

### Colors

In [`src/assets/css/_theme.css`](https://github.com/ArkEcosystem/explorer/blob/master/src/assets/css/_theme.css) you'll see the color codes that we use throughout the Explorer and the corresponding variable names. There are also some default colors in [`tailwind.config.js`](https://github.com/ArkEcosystem/explorer/blob/master/tailwind.config.js) that are used throughout the Explorer, although we are working on minimizing this. Keep in mind that we use SVG icons in a lot of places and that some of these come with styling, which means that you will have to edit the SVG file if you want to move away from the colors it uses. This is mostly the case when an SVG icon consists of more than a single color.

### Languages / Social Media

> [src/config/index.ts](https://github.com/ArkEcosystem/explorer/blob/master/src/config/index.ts)

This file defines the languages, branding name / url and social media links that are used for the Explorer. You should change this file to match your own branding information, like custom social media links. Note that the Explorer uses the SVGs defined in [`src/assets/svg/social`](https://github.com/ArkEcosystem/explorer/tree/master/src/assets/svg/social), which means you will have to add your own icons there if you use social media that we don't list on our own Explorer.

### Networks

You can find the networks in the [`network`](https://github.com/ArkEcosystem/explorer/tree/master/networks) folder, where you will have to adjust them to match your own network's values.

### Images

There are a couple images you'd want to have changed to match your own brand:

* [src/assets/images/logo.png](https://github.com/ArkEcosystem/explorer/tree/master/src/assets/images); ARK logo used in the Explorer
* [public/favicon.ico\|png](https://github.com/ArkEcosystem/explorer/tree/master/public); favicon, which is an ARK logo
* [ARKExplorer.png](https://github.com/ArkEcosystem/explorer/blob/master/ARKExplorer.png); this is the banner image for the README file in the repository

### Misc.

There is a deployment script in `scripts/deploy.sh` that pushes a local dist folder to a `gh-pages` branch when you run `yarn task:deploy`. This is hardcoded to point to the ARK Explorer repository on GitHub, so if you want to make use of this you will need to have it point to your own repository and set up GitHub Pages.
