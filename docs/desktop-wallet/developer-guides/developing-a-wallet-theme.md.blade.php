---
title: How to Develop a Custom Theme Plugin?
---

# **How to Develop a Custom Theme Plugin?**

This tutorial walks you through everything you need to know to create a beautiful custom theme plugin in around one hour.  We’ll show you how to build, customize and submit your very own color theme for approval as a plugin for the ARK Desktop Wallet Plugin Manager. All you’ll need is a little bit of creativity and around one hour to spare.

It’s time to get creative. This guide will consist of 3 key sections that we’ll need complete:

1. _**Setting up a GitHub account and forking the theme template.**_
2. _**Customizing parameters and preparing a configuration file.**_
3. _**Publish the finished theme plugin on NPM.**_

This guide will be written for complete beginners, so those who are familiar with some of the tools and services here will probably have their own way of doing things and using different editors, etc, but for the purpose of making it novice-friendly, we’ll be using most of the services that are provided out of the box.

You will also need to install the [_**Desktop Wallet**_](https://ark.io/wallet) if you haven’t already.

### STEP 1: Setting up a GitHub and NPM account, and forking the theme template for the plugin

* First, we need to sign-up with GitHub to create an account \(in case you don’t have one already\). To sign-up, visit [**https://github.com/join**](https://github.com/join).
* We will also need an NPM account \(in case you don’t have one already\). Simply visit [**https://www.npmjs.com/signup**](https://www.npmjs.com/signup) and register.
* The next step is to use the template we have prepared to get you started. In order to do it go to this link [**https://github.com/ark-ecosystem-desktop-plugins/theme-template**](https://github.com/ark-ecosystem-desktop-plugins/theme-template) and press the ‘_**Use this template**_’ button.

<livewire:embed-link url="https://github.com/learn-ark/desktop-wallet-plugin-theme-template" caption="Desktop Wallet Theme Plugin Template Project" />

In the next step you can name the repository \(can be some catchy name like ocean-breeze-theme, for this example, we’ll stick with the original name theme-template\), leave it as a public repository and press create a repository from the template.

This will create a copy of this premade template under your GitHub account where you can modify and play with it \(and where you will submit changes for the theme you will customize\). **We will work on our new repository in all the next steps.**

### STEP 2: Customizing package parameters and preparing a configuration file

The next step is to start customizing parameters for our theme. There are 3 files that are of interest:

* _**package.json**_ \(has all of the necessary information that is needed in order for it to be published on NPM and become discoverable in the Plugin Manager\).
* _**src/index.js**_ \(plugin index file where we define some of the plugin parameters, in our case, we’ll only change the theme name\).
* _**src/styles/light.css**_ \(where all of the color parameters are defined, which are used throughout the wallet\).

So let us start with the _package.json_ file, we’ll be editing this file directly on GitHub \(for convenience\), you can edit this locally \(copy/paste\) in an editor of choice and paste it back after you are done in the GitHub editor, or use one of the other methods if you are already well versed with using Git \(push, pull, ..\).

#### Edit Package.json file

Edit package.json from your Github account. What you will need to update are the following parameters. There is no need to update any other values than those which are marked below \(you can leave the others as default\).

`“name”: “`**`@arkecosystem/desktop-wallet-theme-template`**`”,` — name of the package on NPM here we need to replace **@arkecosystem** with your NPM username \(what you chose when registering on NPM\) followed by the package name \(eg. pink-wallet-template\) so in our case, this would become:
`“name”: “`**`@boldninja/pink-wallet-template`**`”,`

`“description”: “`_**`Desktop Wallet Theme Template`**_`”,` — a short description of the plugin, in our case this can be just something generic like what color tone you are using eg. `“description”: “`_**`Pinkish ARK Desktop Wallet theme`**_`”,`

`“author”: “`**`Author Name`**`”,` — name of the author of the plugin, this will be displayed inside the wallet as the publisher, so it can be your name, your nickname, username, … eg. `“author”: “`**`Boldninja`**`”,`
If other people are working on a plugin then you can add them under “_contributors_”, as well as write your name there as well.

`“title”: “`**`Theme Template`**`”,` — name of the plugin that will be displayed inside the Plugin Manager. Since we are doing a pink theme we’ll just name it Pinky Theme eg. `“title”: “`**`Pinky Theme`**`”`

`“logo”: “`[**`https://raw.githubusercontent.com/ark-ecosystem-desktop-plugins/theme-template/master/logo.png`**](https://raw.githubusercontent.com/ark-ecosystem-desktop-plugins/theme-template/master/logo.png)`",` — is the thumbnail that will appear inside Plugin Manager for your theme. If you are going to be doing a custom logo, it should link directly to your custom image where it needs to be named **logo.png and be 140x140px in size**. If you are not going to be designing your own logo for your plugin then you can delete this logo line \(or leave it unchanged, but we recommend deleting it so you can see how it looks without in the file below\).

`“images”: [ “`**`https://imagelink.com/1.jpg`**`", “`**`https://imagelink.com/2.jpg`**`" ],` — you can include previews of the plugin inside the images block. Images need to be in .jpg or .png format, for optimal visual presentation sized at 640x550px. Up to 5 images will be included in the preview. This is an optional feature and if you don’t wish to include a preview just delete the images block.

`“bugs”: { “url”: “`[**`https://github.com/ark-ecosystem-desktop-plugins/theme template/issues`**](https://github.com/ark-ecosystem-desktop-plugins/theme-template/issues)`" },` —this is a link where people can report issues with your plugin. This can be just linked to your GitHub repository of theme, eg. in our case `“bugs”: { “url”: “`[**`https://github.com/boldninja/theme-template/issues`**](https://github.com/boldninja/theme-template/issues)`" },`

`“homepage”: “`[**`https://github.com/ark-ecosystem-desktop-plugins/theme-template#readme`**](https://github.com/ark-ecosystem-desktop-plugins/theme-template#readme)`",` — the website for your plugin. We are just going to link it to our GitHub repository `“homepage”: “`[**`https://github.com/boldninja/theme-template`**](https://github.com/boldninja/theme-template)`",`

`“url”: “`_**`git+`**_[_**`https://github.com/ark-ecosystem-desktop-plugins/theme-template.git`**_](https://github.com/ark-ecosystem-desktop-plugins/theme-template.git)`"` — under repository, we have a direct Git link to your plugin \(in our case GitHub\) so we replace it the same way as the previous option with our homepage by appending .git at the end `“url”: “`_**`git+https://github.com/boldninja/theme-template.git`**_`"`

These are the changes we need to do to the _package.json_ file. This is how our file looks after the changes we made \(changed parts marked, you can also click on the “_Preview changes_” tab to see what you changed and if you missed something\):

Now we need to commit the changes we have done. To do so, we can simply press click “Commit changes” with the first option selected \(Commit directly to the master branch\) button below:

Changes will now be reflected and we can move onto editing the next file.

#### Edit Index.js File

Next in line is _index.js_ under _src/index.js_, we repeat the same steps as above. Click on the file and then the edit icon to bring it into editor mode. Here we only need to change the plugin name \(which we’ll also have to change inside the CSS file\) which will show under the settings menu inside our wallet.

We have to change`‘plugin-light-mode’` to what we want to be displayed in the Desktop Wallet \(note that we need to preserve the first part “plugin-” and only change the part after eg.`‘plugin-pinky-mode’` \)

<x-alert type="info">
_P.S. you can also change the light.css filename to something else, but in that case, you will also need to rename the actual filename of .css under src/styles/&lt;newname&gt;.css_ Once you have chosen a name, commit the changes.
</x-alert>

#### Edit Light.css File

The last part of the configuration is the most fun part — playing with colors and actually changing what we want.

Now we open _light.css_ under _src/styles/light.css_ \(click on the file and the edit icon to bring it into editor mode\). At first, this might seem overwhelming, but these are just color codes in hex or rgba format for different elements inside the desktop wallet. This is pretty self-explanatory on its own but don’t worry, in order for us to see what gets changed we’ll be using the Desktop Wallet for this part as well. First, let's not forget that we need to change the class name that we changed in index.js \(which is the first line in this CSS file\).

As you can see we edited `.theme-plugin-light-mode` to what we defined in _index.js,_ so we changed it to reflect those changes. In our case, it becomes `.theme-plugin-pinky-mode` so the index.js file knows what class to read \(if we don’t change it here changes won’t come into effect once we publish the plugin\). After this is done, let's fire up the ARK Desktop Wallet.

Once you start the ARK Desktop Wallet click on the _**Toggle Developers Tools**_ option under the _**View**_ **menu.**

This will open a menu on the right. Now click on the _**Elements**_ tab. Under elements, click to expand the _**body**_ and click on the _**div**_ element. Now under _**Styles**_ on the right, enter in the search _**.theme-light**_ \(you will need to have the default theme currently enabled in order to see this. If you have dark mode enabled, please switch to default by disabling the dark theme under settings\). This will bring up all of the elements of our theme that we can change and see changes right in the wallet \(you can click normally on elements in the wallet on the right so you can get all of the colors right and see where they are changing\).

Now we can start playing by clicking on the elements on the right \(eg. click on the square color of `--theme-page` property\) to bring up the color editor \(hex or rgba\) and your changes will be reflected instantly once you change color.

You can now change this for all of the elements and see it live on the left eg changing the`--theme-feature` property, as you can see, changes the background of the wallet.

Now you only need to copy those rgba or hex colors back to the _light.css file_ that we have opened on GitHub \(keeping the same property names, you must not rename any of the attributes apart from the hex or rgba values\). You can select the whole section inside the wallet and copy over to _light.css_ or just adapt the hex/rgba colors one by one. Once you are done, don’t forget to commit your changes to GitHub and when you are happy with your final product move onto step 3 below.

### STEP 3: Publish the finished theme plugin on NPM <

The last part of this guide is now to publish a plugin on the NPM. To do so we will need NodeJS installed \(you can download it from [**https://nodejs.org/en/**](https://nodejs.org/en/) for your OS \(“recommended for most users” version\). Once installed open command line/terminal.

_Windows: press_ _`win+R`_ _write_ _`cmd`_ _and press_ _`enter`._

_Linux: press`Ctrl-Alt+T`_ _to start the terminal._

_Mac: open search and write_ _`terminal`and click on it to start it._

Next, we need to login to the NPM \(with our account that we created in the first step\) write:
`npm login`

You will be prompted to write your username, password, and email \(email is visible to the public\).

Now that we are logged in we will make a local copy of the template we did by cloning it \(you will need to install [Git](https://git-scm.com/downloads) otherwise it will not recognize git commands\). We will run this command, where you will replace the GitHub link with your own template path:
`git clone` [`https://github.com/<username>/<repository-name>.git`](https://github.com/%3Cusername%3E/%3Crepository-name%3E.git)
``So in my case, the command would be:
[`https://github.com/boldninja/theme-template.git`](https://github.com/boldninja/theme-template.git)

_Alternatively, you could download your repo contents as a zip, instead of_ _`git clone`._

After you are done we need to move into the folder by writing:
`cd theme-template`

The final part is publishing the plugin to NPM:
`npm publish --access=public`

Now it will take some time to publish it to the NPM and if there are no errors then it should be complete. Your template will be published on NPM and should be visible by going to [`https://www.npmjs.com/package/@<your-username>/<your-package-name>`](https://www.npmjs.com/package/@%3Cyour-username%3E/%3Cyour-package-name%3E).

_Some additional information_. If you are going to be publishing updated versions of your plugin, all you need to do is modify your .css file \(new colors, etc…\), commit your changes and finally, you will need to open _package.json_ and under `version`, increase the number eg. from 0.0.1 to 0.0.2 \(if you don’t update this in _package.json,_ NPM will offer to bump the version for you\). After you have done this, repeat the final part from the NPM publishing \(`git clone` and `npm publish` commands\).

Once you have done this, your updated package will be ready. But remember, if you run into any kind of trouble developing this or get stuck at any step, don’t hesitate to join [our Slack](http://ark.io/slack) and ask for some assistance in the \#help channel.

## **Developing Your Own Plugin**

But don’t stop there… now that you’ve mastered the art of developing a theme plugin for the ARK Desktop Wallet, why not get going with a different type of plugin? If you have an idea for a game, a helpful tool or even something to improve the ecosystem then get building. With the new and intuitive Plugin Manager, soon your plugin could be discovered and enjoyed by everyone. How cool is that?

Take a look at a more comprehensive guide on how to develop more robust plugins here:

<livewire:page-reference path="/docs/desktop-wallet/developer-guides/developing-your-first-plugin" />

Plus, check out what others have been building by browsing the Plugin Manager in the [**ARK Desktop Wallet**](https://ark.io/wallet)**.** Get inspiration and start bringing your idea to life. We can’t wait to see what you come up with!
