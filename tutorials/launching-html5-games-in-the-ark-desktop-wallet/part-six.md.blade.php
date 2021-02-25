---
title: Launching your Game as a Wallet Plugin
excerpt: Congratulations! We're now ready to launch our game as an ARK Desktop Wallet plugin and put our our skills to the test against other players. Learn how within this article.
number: 6
---

# Launching your Game as a Wallet Plugin

Welcome to the final part of our tutorial series looking into launching an HTML5 game in the Desktop Wallet with ARK Core and [**Construct 3**](https://editor.construct.net/). We’ve come a long way from our first tutorial. At this point, we have built an entire blockchain game including a lobby, wagers, all the game logic and paying out prizes or refunding wagers.

What’s left is to set our game to run as a plugin inside the ARK Desktop Wallet. This will entail exporting our game as HTML5 and setting up a basic plugin to load our game inside the wallet. This plugin is not the Core plugin we already made since that is already finished and runs on our server. Instead, we will be making a Desktop Wallet plugin which will appear in the Plugin Manager within the ARK Desktop Wallet. Once we accomplish this, our game will be displayed to an entirely new audience who can download, install and play our game!

## Optimizing your Game to run as a Plugin in the ARK Desktop Wallet

First, we’ll need to export our completed game as an HTML5 page and upload everything to an internet-accessible HTTP server. To do this, we choose _Project &gt; Export_ from the Construct 3 menu.

![Exporting our game](https://miro.medium.com/max/485/0*SbybSBdtBwwulwUf)

We are then presented with a series of different platforms we can export our game to, such as HTML5, to Facebook, for Android, iOS, or the Windows Store. Who knows, maybe one day there will be an ability to export directly to the ARK Plugin Manager, but for now choose _Web \(HTML5\)_ and then click _Next_.

![We want to export to Web \(HTML5\)](https://miro.medium.com/max/833/0*MpkWI5GO5n95AD2-)

This will show us another dialog box to pick our export options. We want to make sure to deduplicate images, recompress images and use the Simple minification mode. This saves space and reduces bloat in our game. Then click _Next_, and the export process will begin. This can take a few minutes, so grab your favorite beverage and take a well-earned break!

![Our chosen export options](https://miro.medium.com/max/789/0*TJX3v-mzySXHmQ2T)

When it’s done, you will be presented with a link to download your completed game as a ZIP archive. Extract it and upload its contents to your internet-accessible server. For the purpose of this tutorial, it was uploaded to [https://www.arkfun.io/connect-4/](https://www.arkfun.io/connect-4/).

Now that our game is online, it’s time to make the Desktop Wallet plugin. For this, [follow the steps in the Desktop Wallet Documentation ](/docs/desktop-wallet/developer-guides/developing-your-first-plugin) to set up a skeleton Desktop Wallet plugin. When you’ve done that, we’ll make the necessary modifications so it runs our game.

First up, we’re going to edit our _**package.json**_ file to change some permissions. This is because some features of the Desktop Wallet require authorization from the end-user to use, for security reasons. The boilerplate package.json file from the skeleton project looks like this:

```typescript
"version": "0.0.1",
    "description": "Testing my first plugin on Ark Desktop Wallet",
    "main": "src/index.js",
    "desktop-wallet": {
        "title": "My First Plugin",
        "permissions": [
            "COMPONENTS",
            "ROUTES",
            "MENU_ITEMS"
        ]
    }
}
```

We need to add a WEBFRAME permission to this list so that we can open external web pages inside our plugin. Add it on a new line immediately after MENU\_ITEMS, like so:

```typescript
"permissions": [
    "COMPONENTS",
    "ROUTES",
    "MENU_ITEMS",
    "WEBFRAME"
]
```

We’re also going to add a couple of new sections to our package.json file which will make our plugin appear in the _Gaming_ category of the ARK Desktop Wallet, with some keywords to help people find our game:

```typescript
"desktop-wallet": {
    "categories": [
        "gaming"
    ]
},
"keywords": [
    "@arkecosystem",
    "desktop-wallet",
    "plugin",
    "game",
    "games",
    "gaming",
    "connect 4",
    "multiplayer",
    "pvp"
]
```

Notice the first three keywords are in bold. That’s because those are **required** for our plugin to appear in the Plugin Manager once we publish it. Any extra keywords will be used in the search engine within the Plugin Manager to help others to find your plugin. Also remember to change the name, version, title and description to match the details for your plugin, and when you’re done you can save and close the file. Now open _**my-first-plugin.js**_ that is part of the skeleton Desktop Wallet plugin. Replace its entire contents with \(replace _&lt;your url&gt;_ where your game will be hosted\):

```javascript
module.exports = {
    template: '<div class="flex flex-1 bg-theme-feature rounded-lg overflow-y-auto"><WebFrame class="w-full rounded-lg" src="<your url>" /></div>'
}
```

You probably already have a good idea of what this does already. It renders a WebFrame component \(remember that WEBFRAME permission from earlier?\) inside a _&lt;div&gt;_ element that is styled using internal ARK Desktop Wallet classes to make the component appear full-sized with rounded edges so it fits in with the overall aesthetic style of the ARK Desktop Wallet. We also set the source of the _WebFrame_ to the location where we uploaded our HTML5 game, as that is what we will render in our WebFrame component.

Save our file, and, drumroll please, we’ve made all the necessary changes! If you restart the ARK Desktop Wallet and enable our plugin from the Plugin Manager, as described in the ARK Learning Hub article earlier, you should see our game launch from inside the wallet.

![Our game running inside the ARK Desktop Wallet](https://miro.medium.com/max/1200/0*vDJTXh6yq-uVMFIV)

All that is left is to publish our game for others to find and play it! This will require a free account at the NPM registry. If you already have one, great, if not, [go sign up now](https://www.npmjs.com/signup). Then, from a command prompt inside the folder where you made the Desktop Wallet plugin, enter npm login and supply your login credentials for your NPM account. Run `npm publish --access public` and you should see various bits of text flying up the screen. When it’s finished, your work is done, and your completed plugin is now available worldwide in the Plugin Manager inside the [ARK Desktop Wallet](https://ark.io/wallet).

![Our finished game is available inside the ARK Desktop Wallet](https://miro.medium.com/max/1200/0*nA9W1XcEfMnZ5ZXu)

## Next Steps

Congratulations, your game is now available in the ARK Desktop Wallet! We hope that you have found this series helpful. This is a great way for developers to add blockchain functionality to their games, earn additional revenue, and introduce their game to a new audience!

If you become stuck at any point make sure to consult our documents on our [Core Developer Docs](/docs/core/how-to-guides/setting-up-your-development-environment/intro). In addition, our team and developers are active on [Discord](https://discord.ark.io) so do not hesitate to reach out to us!

**Check out previous posts in this series for reference here:**

<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-one" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-two" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-three" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-four" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-five" />
