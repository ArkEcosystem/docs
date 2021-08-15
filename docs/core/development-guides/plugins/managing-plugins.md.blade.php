---
title: Plugins Guide - Managing Plugins
---

# Managing Plugins

Core itself is composed of multiple plugins that once stitched together provide the full system needed to interact with the ARK blockchain but any developer can create their own plugins and publish them.

## Publishment

The first step to make your plugin available to the world after completing development is to publish it to the npm registry. We recommend to use `yarn` for this, check the [official step-by-step guide](https://yarnpkg.com/lang/en/docs/publishing-a-package/) by the yarn team.

## Integration

Once your plugin is published it will be available to everyone via `ark plugin:install`. Let's use the official, but optional, package `@arkecosystem/core-vote-report` as an example of how to install and configure a plugin.

### Installation

First we will need to install the package using `yarn plugin:install`.

**From NPM**:

```shell
ark plugin:install @arkecosystem/core-vote-report --network={NETWORK}
```

**From repository**:

```shell
ark plugin:install git@github.com:ArkEcosystem/core-vote-report.git --network={NETWORK}
```

Give it a minute to download and install the plugin with corresponding dependencies, once finished you can continue configuration.

### Configuration

Now that the plugin is downloaded and installed, we can go ahead and register it in our `~/.config/ark-core/{NETWORK}/app.json` file. Open the file in your editor of choice, append the following contents and save the changes.

```javascript
{
    // some plugins...
    "@arkecosystem/core-vote-report": {},
}
```

Now run `ark relay:restart` and visit `http://ip:4006/` and you should see a vote report, that's it.
