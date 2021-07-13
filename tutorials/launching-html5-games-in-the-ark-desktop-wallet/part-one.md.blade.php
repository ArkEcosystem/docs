---
title: How to Import an ARK Wallet Address into your Application
excerpt: This article will guide you through the fundamentals of ARK address validation and the basics of how to import a wallet address. This is a must read before continuing with our other tutorials!
number: 1
---

# How to Import an ARK Wallet Address into your Application

## Importing A Wallet Address Into Your Game

In this first part of this series, we will look at how to import a wallet address by making sure it is valid so players don’t accidentally make a mistake by entering the wrong address and losing out on a potential prize. This will lay the groundwork for the next installments where we will write our game logic in our very own Core plugin.

We will be using the free plan of the [Construct 3 engine](https://editor.construct.net/) — a point and click game development environment — to create our simple HTML5 game, so head over there and start a new project.

![Does this look familiar to anyone? It&#x2019;s Minesweeper Flags&#x2026; ARK&#x2019;s first player-vs-player blockchain game!](https://miro.medium.com/max/1200/0*c7k-nWUCk7262u8x)

Unfortunately, at the time of writing, the ARK JavaScript SDK is not fully compatible with HTML5 games out of the box, so we will use an alternative called _bs58check_ to validate addresses. The steps to build our alternative are outlined below, but if you prefer to skip that, you can use a pre-bundled version which we’ll discuss in a second. If you’d like to build it yourself, make sure you’ve installed NodeJS and npm, then execute:

```bash
npm install -g browserify uglify-js
npm install bs58check
browserify --standalone bs58check -r bs58check | uglifyjs > bs58check.min.js
```

Next, we’ll import our _bs58check.min.js_ file into our Construct 3 project so the game can use it. This is really simple — just right click _**Scripts**_ in the top-right pane, choose _**Import Scripts**_ and drag and drop our _bs58check.min.js_ file into the window. Click _**Import**_ and you’re done!

![Import the bs58check.min.js script here](https://miro.medium.com/max/428/0*RIUB0REioSFfp9Ln)

## What Makes An ARK Wallet Address Valid?

Now we need to take a step back from the practical activities and focus on the theoretical side. What makes an address valid, and how can we separate an ARK Public Network address from an address on the ARK Development Network or another bridgechain?

Each address must be exactly 34 characters long and, in the case of the ARK Public Network, each address starts with an A; conversely, addresses on the ARK Development Network start with a D and bridgechains can use their own character. This first character is related to the _**network version**_ — remember this, we’ll be coming back to it in a second. The characters used in an address are known as base58, which is a group of 58 alphanumeric characters that are easily distinguished to minimize the risk of confusion, for example, 0 (zero) and O (uppercase o) look similar, so they are excluded; also, I (uppercase i) and l (lowercase L) are omitted from the character set for the same reason. Lastly, the address includes a checksum to make sure the rest of the address has been entered correctly with no typos.

So, remember how the first character of an ARK Public Network address is A and the ARK Development Network is D? That is derived from something called the _**network version**_, and each blockchain can have a different network version, which determines the first character of all the wallet addresses on that network. In case you’re curious — and you’ll need this later — the network version for the ARK Public Network is 23, and the network version for the ARK Development Network is 30.

Now you know that an address is valid if — and only if — it is exactly 34 characters long, starts with the correct character for the blockchain’s network version, only contains characters in the base58 group and has a valid checksum. Now to put this into our game!

## Adding An ARK Wallet Address To Your Game

Let’s begin by adding some objects to our layout. In our example we are going to add a text input box for a user to enter their address, a button to validate the entered address and a text display to tell us if the address is valid. Double click _**Layout 1**_ in the top-right pane, then right-click the blank canvas and choose _**Insert new object**_. Double click _**Text input**_ and drop it on the layout where you want it to appear. Repeat this to add _**Button**_ and _**Text**_ objects too. Feel free to customize the style of the objects however you like, and if you’re feeling creative, add some sprites and a background image to spice up your layout.

![Inserting objects into our layout](https://miro.medium.com/max/906/0*NaoukkOl9-HZPMGz)

We’re going to dive into the _**Event Sheet**_ now, and this is where all the magic happens. Construct 3 is event-driven, meaning it reacts to situations that occur during the lifecycle of the game. In our case, the event is when a user clicks our button. Double click _**Event Sheet**_ **1** and choose _**Add event**_. Double click on our _**Button**_ and choose the _**On clicked**_ event. It’ll be highlighted in yellow as it is a common event.

![Our new event is waiting for an action](https://miro.medium.com/max/1184/0*7FM-PFvcNrnqzFNK)

Now we need to tell it what to do when someone clicks the button. But what exactly do we want it to do? Addresses have to be 34 characters long, start with the right character for our network, only consist of base58 characters and pass the checksum test. Luckily the bs58check script we imported earlier handles most of that for us. We’ll use the ARK Public Network, so we know our network version is 23.

Let’s start by creating a variable to hold the network version. Right-click our event sheet and choose _**Add global variable**_. Call it networkVersion with an initial value of 23.

We will create a function to validate the address. Right-click anywhere in the event sheet and choose _**Add function**_. Call it validateAddress and set the return type to Number. Hit OK, then right-click our new function and _**Add parameter**_. Call it address which is a String. Now right click _**Add action**_ for our function and choose _**Add script**_. Now we can finally write some JavaScript!

```javascript
if (localVars.address.length === 34) {
    try {
        const networkVersion = bs58check.decode(localVars.address).readUInt8(0);
        if (networkVersion === runtime.globalVars.networkVersion) {
                runtime.setReturnValue(1);
        }
    } catch (error) {
        // the address is invalid
    }
}
```

Let’s break this down. By default, the function will return zero. If the address is 34 characters, it will execute _bs58check.decode_ which will throw an error and exit the function if the address contains invalid characters or the checksum fails. Otherwise, we check that the network version matches the ARK Public Network. If so, we return a value of 1. In simple terms, if the address passes our checks, the function returns 1, otherwise, it returns 0.

Now we’ll put our function to work! We want it to run whenever our button is clicked. Click _**Add**…_ next to our _**On clicked**_ event and _**Add sub-event**_. Scroll down to _**System**_ and _**Compare two values**_. Essentially, what we want to do is check if our function returns a 1 or not. So, our first value should be `Functions.validateAddress(TextInput.Text)` and our second value should be 1.

![Using our new function](https://miro.medium.com/max/755/0*XwonDwRsIKtj10xW)

Almost done! We just have to tell it what to do if the function passes and if it fails. Click _**Add action**_ for our comparison, double click our _**Text**_ object and choose _**Set text**_. Enter "Address is valid!" and choose OK. Now for the failure case: Click _**Add**…_ next to our new _**Set text**_ action and choose _**Add Else**_. Click _**Add action**_ for our Else case, double click our _**Text**_ object and choose _**Set text**_. Enter "Address is invalid" and choose OK.

![Our finished event sheet](https://miro.medium.com/max/1200/0*7K6k3qGZZiyyTqLQ)

We can now test our creation by clicking the triangle in the menu bar. Try entering a valid ARK Public Network address and click the button, then try an invalid one. Go back into the source code and change the networkVersion variable from 23 to 30 and try again with a Devnet address. All being well, you should now be able to tell if an address is valid on the ARK Public Network or the ARK Development Network!

## Next Steps

That’s it for part 1 of this tutorial series. In our next session, we’ll explore Construct a little more and learn how to connect to a peer to obtain its network version and use that rather than hard-coding the value so our game can be compatible with all bridgechains, and we’ll start our Core plugin for the main game logic.

If you become stuck at any point make sure to consult our documents on our [Core Developer Docs](/docs/core/getting-started/development-setup/introduction). In addition, our team and developers are active on [Discord](https://discord.ark.io) so do not hesitate to reach out to us!
