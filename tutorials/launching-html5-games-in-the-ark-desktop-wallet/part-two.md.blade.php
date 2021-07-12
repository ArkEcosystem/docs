---
title: Creating the Backend for your Plugin
excerpt: We will now begin to create the backend for our plugin. This article will walk you through how to set up a Websocket server and configuring our plugin to generate ARK addresses and to listen to incoming transactions.
number: 2
---

# Creating the Backend for your Plugin

Welcome to the second tutorial in our series of launching an HTML5 game in the ARK Desktop Wallet! This series is aimed at developers of all skill levels. The goal of this series is to be able to convert an HTML5 game to work as a fully functioning plugin within the ARK Desktop Wallet. The first set of tutorials will explain how to interact with the ARK blockchain in a standalone HTML5 environment before finally jumping over into the ARK Desktop Wallet.

We left off **[last time](/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-one)** with a self-contained [Construct 3](https://editor.construct.net/) app that lets us make sure a supplied address is valid on the ARK Public Network. Now it’s time to evolve this to work with any ARK-powered network of our choice and start building the back-end of our game.

For the rest of this tutorial series, we’re going to focus on building the back-end of our game and using Connect 4, a turn-based blockchain game as our ongoing example and template. We will let a player host a game by deciding their wager, and once a challenger matches it, the game will begin. We’ll use a standard 7 x 6 board and each player will take their turn to pick a column and insert their disc from 1 to 7. If a player lines up 4 discs either vertically, horizontally or diagonally, they’ll win the prize; if the game ends in a tie, both players receive their entry fee back. For simplicity, we will utilize ARK’s Smartbridge field to pick our chosen column on the board from 1 to 7. If you would like to take a more advanced approach, you can consider making [custom transactions with GTI](/docs/core/development-guides/custom-transactions/authoring-transaction-types) on your own bridgechain to make this game truly decentralized.

While this all may seem daunting at first, we will be making this as simple as possible. All of these tasks will be broken down into manageable sections over the next few tutorials. In this following section, we will look at how to send and receive transactions within the game.

<x-alert type="info">
**WAIT:** Before we go any further, check the ARK Core Documentation to understand how to [create your first Core module](/docs/core/development-guides/dapps/authoring-core-dapps). Follow the guide and use the starter module template project. It will be the base for the rest of the tutorial.
</x-alert>

Now that you’re set up with your skeleton module, let’s list our objectives for what we want our Core plugin to do by the end of this tutorial. We’re going to:

1. Set up a WebSocket server so our Construct 3 app and Core plugin can talk to each other;
2. Send the network version (which we talked about in the last tutorial) whenever the app connects to the server, so it knows the address format to validate;
3. Generate a new ARK address to receive transactions;
4. Listen for incoming transactions sent to that address.

Let’s devote some time to each of the sections above. All of our code will be written to **defaults.ts** and **manager.ts** so open these in your favorite text editor and let's begin!

## **Setting up a WebSocket server**

First, we want to set up a WebSocket server. We will use WebSockets because they allow for easy bidirectional communication between our plugin and Construct 3 app. WebSockets communicate with a host and a port, and to begin we will define these in **defaults.ts**. Replace the contents of that file with the following:

```typescript
export const defaults = {
    enabled: true,
    host: "0.0.0.0",
    port: 10000
};
```

We use host 0.0.0.0 which means we’ll accept connections to any of the IP addresses on our server, and we’ll listen on port number 10000. Save that file and close it, as all our remaining changes will be made to **manager.ts**.

To do this we first import the _ws_ dependency by adding the following line to the top of our file:

```typescript
import * as WebSocket from "ws";
```

Now we want to start our WebSocket server when our plugin starts. You might have already spotted the start method in **manager.ts** which is where we’ll start our server:

```typescript
public start(options: any) {
    this.logger.info("Initialization of dApp");
}
```

Let’s change this to start our WebSocket server and print a more descriptive message:

```typescript
public start(options: any) {
    try {
        const server = new WebSocket.Server({ host: options.host, port: options.port });
        this.logger.info(`Connect 4 WebSocket server listening on ws://${options.host}:${options.port}`);

    } catch (error) {
        this.logger.error(`Connect 4 WebSocket server could not start: ${error.message}`);
    }
}
```

What does this do? It starts a WebSocket server using the host and port values we earlier defined in **defaults.ts** and prints a message in our logs to confirm that the server started successfully, or, if it failed, it will explain what went wrong.

## **Sending the network version**

We want to send the network version to any client that accesses our WebSocket as soon as they connect. To do this we listen for a connection event from the WebSocket server, which fires when a new connection is established, and then we send the network version to the new connection. Add the following code after the this.logger.info line:

```typescript
const config = app.getConfig();
const networkData = JSON.stringify({ networkVersion: config.get("network.pubKeyHash") });

server.on("connection", websocket => {
    websocket.send(networkData);
});
```

At this point, you can run yarn set up to build our plugin, restart your Core relay, and check the logs. You should see something like this:

```bash
1|ark-relay | [2020-02-17 19:00:00.000] INFO : Connect 4 WebSocket server listening on ws://0.0.0.0:10000
```

We can check that the WebSocket is working by heading over to [http://www.websocket.org/echo.html](http://www.websocket.org/echo.html) and entering _**ws://X.X.X.X:10000**_ (where X.X.X.X is the IP address of your server running our Core plugin) and clicking Connect. If you followed the steps above, you should see the network version appear in the Log box:

![Our plugin running a WebSocket server on the ARK Development Network](https://miro.medium.com/max/705/0*TtMquq7DWEZMUEUM)

## **Generating a new ARK address to receive transactions**

We need our plugin to generate a new address to receive wagers and process the Smartbridge messages to update our game state. To do this, our Construct 3 app will send a message **{action: "new"}** to the server which will trigger this action. Our Core plugin needs to listen for this message and act upon it, so we’ll add the following code immediately after the **websocket.send(networkData)** line above:

```typescript
websocket.on("message", message => {
    try {
        const data = JSON.parse(message.toString());
        if (data.action === "new") {
            const { address, passphrase } = this.generateAddress();
            this.addresses[address] = passphrase;
            // @ts-ignore
            websocket.address = address;
            websocket.send(JSON.stringify({ address }));
        }
    } catch (error) {
        this.logger.error(error.stack);
    }
});
```

You’ll see we use a new method, **generateAddress**, so we have to write the code for that too. Paste this below the end of our start method and before the stop method:

```typescript
private generateAddress() {
    const passphrase = generateMnemonic();
    const address = Identities.Address.fromPassphrase(passphrase);

    return { address, passphrase };
}
```

We’ll also need to add a couple of imports to the top of our code to access these new methods:

```typescript
import { generateMnemonic } from "bip39";
import { Identities } from "@arkecosystem/crypto";

// Lastly we add a new addresses private variable immediately above // the private readonly logger line:
private addresses = {};
```

This is quite a lot of code so let’s break it down. We’re listening for any incoming messages over the WebSocket that contain **{action: "new"}** signaling that our Construct 3 app wants to generate a new address for a new game. This calls upon our new **generateAddress** method to internally produce a new wallet passphrase and convert it to an address. It is now stored in the addresses object which keeps track of all addresses created during this session than will be used to listen for incoming transactions.

## **Listen for incoming transactions**

The final part of our Core plugin for this part of the tutorial will listen for incoming transactions. If the receiving address matches one of the addresses generated earlier, we’ll send its data back to our Construct 3 app via the WebSocket.

This chunk of code will go immediately above the second catch line in our start method:

```typescript
const emitter = app.resolvePlugin("event-emitter");
emitter.on(ApplicationEvents.TransactionApplied, transaction => {
    if (this.addresses[transaction.recipientId]) {
        for (const websocket of server.clients) {
            // @ts-ignore
            if (websocket.readyState === WebSocket.OPEN && websocket.address === transaction.recipientId) {
                websocket.send(JSON.stringify({ transaction }));
            }
        }
    }
});
```

To finish, we just need one final import at the top of the code for the **ApplicationEvents** we used:

```typescript
import { ApplicationEvents } from "@arkecosystem/core-event-emitter";
```

At this point, we are done with our Core plugin for this part of the tutorial! Compile it with yarn setup, restart Core and head over to Construct 3 where we’ll interact with our WebSocket. Open the project we created in the last tutorial, switch to _Layout 1_, right-click and _Insert New Object_. Add a _WebSocket_. Repeat the process, adding a _Browser_ object, a _JSON_ object, and another _Button_ which will be used to trigger the address generation process.

Flip to our _Event Sheet 1_ and add a new event. Drill down to _System_ and then _On start of layout_. We want to add an action for the _WebSocket_ to _Connect._ Enter the URL in the format **wss://X.X.X.X:10000/** where X.X.X.X is your Core IP. Note this requires an HTTPS connection, so you may need to use a free service such as _CloudFlare_ or use your own SSL certificate with a reverse proxy such as _Nginx_.

Add another event, this time listening for the _Websocket_ -&gt; _On Text Message_ event. For the corresponding action, choose _JSON_ -&gt; _Parse_. Enter **WebSocket.MessageText** for the JSON string.

Now we want to add a few sub-events within the _Websocket_ -&gt; _On Text Message_ event to process the WebSocket data we receive. Choose _JSON_ and then _Has Key_. Enter "transaction" then add a new action. This will be fired when we receive a new transaction. For now, to prove it works, we’re just going to display the transaction data in an alert box in the browser. Choose _Browser_ then _Alert_. Enter **JSON.GetAsBeautifiedString("transaction")**.

Add another sub-event and choose _JSON_ and then _Has Key_. Enter "**networkVersion**" this time. This will be used to set the network version so our app validates addresses properly depending on the network of the peer we’re connected to. Our corresponding action should be _System_ -&gt; _Set Value_. Make sure the _Variable_ is **networkVersion** and set the value to **JSON.Get("networkVersion")**.

Now we should check for a newly generated address, show it to the user and allow the user to send a transaction via the Desktop Wallet. In order to proceed, we must add another sub-event. It’s _JSON_ -&gt; _Has Key_, again. Enter "address" and add a new _Browser_ action. Choose _Alert_ and enter Click "OK" to send a transaction to **JSON.Get("address")**. Add another action for this event, this time for _Browser -&gt; Go to URL._ For the URL we enter "**ark:**" & **JSON.Get("address")** which will automatically open the Desktop Wallet and pre-fill a transaction to be sent to the newly generated address.

Finally, we’re going to wire up our new _Button_ to trigger this address generation action. Add an event, choosing _Button2_ (as it’s our second button) then _On clicked_. We’re going to add an action to send a message over the WebSocket to trigger the address creation process, so choose _WebSocket_ then _Send Text._ The text we’ll send is "**{""action"": ""new""}**"**.**

Now we’re done! Our event sheet should look similar to the following:

![Our extended event sheet](https://miro.medium.com/max/705/0*0Lxt6jHuI5HmgvQn)

If you’re running the Core plugin on the ARK Development Network, you should find that it only accepts Devnet addresses now. By clicking the newly added button, you should receive a message giving you a newly generated address, which then opens the ARK Desktop Wallet to automatically send a transaction to that address:

![Our newly generated address&#x2026;](https://miro.medium.com/max/465/0*umTrZYS9nldv0yO_)

![&#x2026; automatically pre-filled in the Desktop Wallet](https://miro.medium.com/max/460/0*snO3Md_KgOSxMsIN)

Now if we send a transaction to that address, our Construct 3 app automatically receives it and shows us the data:

![Our app receives the transaction as soon as it is forged!](https://miro.medium.com/max/487/0*Zbk6e7OsdmgE8fmH)

Congratulations on reaching the end of the tutorial! It might not seem like much, but we’ve achieved a lot! We’ve set up our bare-bones Core plugin, made a WebSocket server and now we know how to generate new addresses, send and receive transactions between our app and the network and dynamically validate addresses based on the network of the peer.

## Next Steps

That’s it for Part 2 of this tutorial series. In our next session, we will make the game work with a betting system and create a lobby to start games and see existing ones!

If you become stuck at any point make sure to consult our documents on our [Core Developer Docs](/docs/core/getting-started/development-setup/introduction). In addition, our team and developers are active on [Discord](https://discord.ark.io) so do not hesitate to reach out to us!

## Missed the previous part?

<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-one" />
