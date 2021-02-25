---
title: Making your Game Work with a Betting System
excerpt: Games can be more exciting and competitive when there's a wager at stake! Learn how to implement a betting system within your game in this step-by-step guide.
number: 3
---

# Making your Game Work with a Betting System

Welcome to the third tutorial in our series of launching an HTML5 game in the ARK Desktop Wallet! This series is aimed at developers of all skill levels. The goal of this series is to be able to convert an HTML5 game to work as a fully functioning plugin within the ARK Desktop Wallet.

In the earlier parts \([**Part One** ](/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-one)and [**Part Two**\)](/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-two), we set up a basic game client using [**Construct 3**](https://editor.construct.net/) which communicates with our own ARK Core plugin to validate addresses and send and receive transactions on the blockchain.

Now it’s time to make the game work with betting and create a lobby to start games and see existing ones! Let’s not get ahead of ourselves though, the actual game logic comes in the next part of this series as we’re still laying the foundations to interact with the network and the blockchain. The good news though, is that the code we’ve written in these earlier parts can be reused in future projects, so you’ll have a solid base to interact between your future game clients and ARK Core without redoing all of the work over and over again.

Like last time, we’re going to mostly focus on our ARK Core plugin, then extend our Construct 3 project to interact with it. By the end of this tutorial we will be able to:

1. Keep track of all generated game addresses, writing them to disk for persistence so our bets and games are not lost when we restart Core.
2. Record the wager and make sure the partner pays the right amount.
3. Transmit the game list to the client.
4. Filter games based on their state, i.e. whether they are awaiting a partner, have been completed, or one of the participants is our own validated address to distinguish our own games.

So, let’s not waste any more time — open up **manager.ts** in your favorite text editor and we will get to work!

## **Keeping track of all generated game addresses for persistence**

In our [**last tutorial**](/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-two), we already managed to generate a new ARK address to receive transactions. You might have noticed, that generated addresses were only kept in memory and would be lost whenever Core restarts, with no way to recover the generated passphrase to later transfer the wagers that were sent to the address. To fix this, we’re going to make this data persist by storing our list of game addresses and passphrases as a single object on disk.

There are various possibilities. For example, you might want to use a database, whether PostgreSQL, MySQL, SQLite3 or others, but we are going to keep things simple and use an already made library called [FluiDB](https://www.npmjs.com/package/fluidb). We can just create a new FluiDB object to hold our game addresses and it will automatically and transparently load and save the data to disk for persistence without worrying about writing messy SQL queries or inventing our own data structure.

Let’s import FluiDB into our project by running the following command on our server to install the library:

```bash
lerna add fluidb --dev
```

Now we import the dependency into our plugin by adding the following lines to the top of our **manager.ts** file:

```typescript
import delay from "delay";
import FluiDB from "fluidb";

// Replace our previous implementation with FluiDB. Find:
private addresses = {};

// Replace it with:
private addresses = new FluiDB(`${process.env.CORE_PATH_DATA}/generated-addresses`);
private gameStates = {};
```

And we’re done! This will now automatically store all of our generated addresses and passphrases in a file called **generated-addresses.json** in our Core data folder, and will transparently load them back into our addresses object whenever Core restarts. This has also imported another package, delay, and declared another variable, **gameStates**, in anticipation of our next section.

## **Recording the wager and making sure our partner matches it**

Next up, we need to check all of our generated game address wallets for any incoming transactions to record any wagers and who each participant is. There are two approaches that we’ll take for this. Firstly, whenever our plugin loads, we’ll iterate through the existing generated game addresses to initially create the state of our existing games. Secondly, we’ll add an event listener to listen for new incoming transactions, so we can update the state of existing games and add new ones as and when they’re made.

For simplicity, we are going to create a function that will iterate through all transactions for a given wallet to generate its state. By state, we mean the addresses of the participants and wager amounts, as well as turn-based data such as the state of the board, although we won’t get to the turn-based goodies until the next part of this series. Then, on startup, we will call this function for each of the addresses we’ve loaded from our FluiDB object, and every time one of our addresses receives a new transaction we’ll regenerate the state for that address to make sure it is in sync with what the blockchain has stored.

Find our line here where we declare our start function:

```typescript
public start(options: any) {

// Make it asynchronous by adding the async keyword, so it looks like this:
public async start(options: any) {
```

Then find:

```typescript
const networkData = JSON.stringify({ networkVersion: config.get("network.pubKeyHash") });
```

Change this to:

```typescript
const networkData = JSON.stringify({
    networkVersion: config.get("network.pubKeyHash"),
    symbol: config.get("network.client.symbol")
});

//On the next line, add the following block of code:
for (const address of Object.keys(this.addresses)) {
    this.generateState(address);
}
```

This will go through all our generated addresses and call our yet-to-be-written **generateState** function to generate their game state when our plugin first loads.

Next, find where we listen for incoming transactions, which we wrote in our last tutorial:

```typescript
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

First, in the top line, change transaction to async transaction so our function is asynchronous. Then, see the `for (const websocket of server.clients)`line? Immediately before that line, add this to regenerate the state of any game address that receives a new transaction as soon as it is written to the blockchain database:

```typescript
while (!(await app.resolvePlugin(“database”).transactionsBusinessRepository.findById(transaction.id))) {
    await delay(100);
}

await this.generateState(transaction.recipientId);
```

Now it’s time to write this elusive **generateState** function. Find our block of code where we wrote the **generateAddress** function, and immediately below that block, we’ll write our new **generateState** code:

```typescript
private async generateState(address: string) {
    const database = app.resolvePlugin("database");
    const publicKey = Identities.PublicKey.fromPassphrase(this.addresses[address]);        const transactions: any[] = await Promise.all(
        (await database.transactionsBusinessRepository.search({
            limit: 0,
            walletAddress: address,
            publicKey
        })).rows.map(async transaction => ({
            amount: transaction.amount,
            recipientId: transaction.recipientId,
            senderId: Identities.Address.fromPublicKey(transaction.senderPublicKey, app.getConfig().get("network.pubKeyHash")),
            timestamp: (await database.blocksBusinessRepository.findById(transaction.blockId)).timestamp,
            vendorField: transaction.vendorField ? transaction.vendorField.toString().trim().toUpperCase() : null
        })
    ));

    transactions.sort((a: any, b: any) => (a.timestamp > b.timestamp) ? 1 : ((b.timestamp > a.timestamp) ? -1 : 0));        const players = { 1: null, 2: null };
    let wager = 0;
    for (const transaction of transactions) {
        if (transaction.senderId !== address && transaction.amount >= 10000000) {
            players[1] = transaction.senderId;
            wager = transaction.amount;
            break;
        }
    }

    if (!players[1]) {
        return;
    }

    for (const transaction of transactions) {
        if (transaction.senderId !== address && transaction.senderId !== players[1] && transaction.amount === wager) {
            players[2] = transaction.senderId;
            break;
        }
    }

    this.gameStates[address] = { players, wager };
}
```


That was a lot of work in a short amount of time, so let us break down what we just did. We are passing a generated game address into this function, and we convert the associated passphrase to a public key which we need to search for all incoming and outgoing transactions from the wallet address. We retrieve the amount, recipient wallet, sender wallet, timestamp and smartbridge message of each transaction, and sort them in chronological order. Then we iterate through the transactions from oldest to newest, to find the first incoming transaction worth at least 1 ARK; the amount becomes the wager, and the player’s address is allocated as player 1. If no matching address is found, the game is not valid, so we abort. Otherwise, we re-iterate through the transactions to find another player who has matched the wager. This address becomes player 2. We then add the player addresses and wagers to our **gameStates** object.

## **Transmitting the game list to the client**

If you made it this far, well done! We’ve completed the logic to create a lobby and handle betting. The next step is to send our data over the WebSocket to our client. We’ll do this as soon as a client connects and whenever the state of any game changes, so our client will show the most up to date details. This only takes a few lines of code.

Find:

```typescript
websocket.send(networkData);
```

Immediately after it, add:

```typescript
websocket.send(JSON.stringify({ games: JSON.stringify(this.gameStates) })); // This will send all our game states to the client as soon as it connects.

// Lastly, find:
for (const websocket of server.clients) {
    // @ts-ignore
    if (websocket.readyState === WebSocket.OPEN && websocket.address === transaction.recipientId) {
        websocket.send(JSON.stringify({ transaction }));
    }
}
```

And replace it with:

```typescript
const state = JSON.stringify({ games: JSON.stringify(this.gameStates) });
for (const websocket of server.clients) {
    if (websocket.readyState === WebSocket.OPEN) {
        websocket.send(state);

        // @ts-ignore
        if (websocket.address === transaction.recipientId) {
            websocket.send(JSON.stringify({ transaction }));
        }
    }
}
```

This will resend our game states to all connected clients if any of the states change, to keep the client in sync.

We have now finished our work with Core for this part of the tutorial! Execute _yarn build_ to build the latest version of our plugin and then restart Core.

## **Filtering games based on their state**

Our final step is to tie it all together in Construct 3 and be able to filter games to separate new games from existing ones, and to show which games we are participating in ourselves. We’ll do all of this in Construct 3, so fire up the game editor and we can begin.

Hop over to the Layout Editor for _Layout 1_ and add 3 new _iframe_ objects. Call them NewIframe, ExistingIframe and OurIframe. The first frame will list the new games that are awaiting an opponent, the second will list all games with matched wagers, and the third will list the games that our address is involved in. For each added _iframe_ object, set the ID to match the name and erase the default URL values.

Head to our _Event Sheet 1_ and right-click a blank area of our event sheet and choose _Add global variable_. Call it “JSON” which should be a String. Repeat this but call our next global variable “ValidatedAddress”. Do it one more time, but call our new variable “Symbol”.

![The global variables should look like this at the top of the event sheet](https://miro.medium.com/max/705/0*abA--Qm-XcAQITkC)

Now, add another sub-event within the _Websocket_ -&gt; _On Text Message_ event to parse the lobby data. Choose _JSON_ and then _Has Key_. Enter “games” then press Done. Click _Add action_ for our newly created sub-event and drill down to _System &gt; Set value_. We want to set our JSON object to the value of _JSON.get\(“Games”\)_. Click Done.

We’ll add another sub-event for _Websocket_ -&gt; _On Text Message_ too, to save the network token symbol. Again, choose _JSON &gt; Has Key_. Enter “symbol”, choose Done, click _Add Action_ and choose _System &gt; Set value_. Set _Symbol_ to the value of _JSON.get\(“Symbol”\)_.

Next we’re going to create a function to parse our lobby data. Right-click a blank area and choose _Add function_. Call it ParseLobby. Go back to our sub-event for “games” and choose _Add action_, then _Functions &gt; ParseLobby_. Then find our earlier event where we set our text to _“Address is valid!”_ and add another action to it. Choose _System &gt; Set value_ and set the _ValidatedAddress_ variable to the value of _TextInput.Text_. Now choose _Add action_, then _Functions &gt; ParseLobby._

![Our modified events](https://miro.medium.com/max/706/0*TXvptldK-KOg5A3F)

Find our ParseLobby function and choose _Add action_. Pick _Add Script_. Now we’re going to enter our code to parse the lobby list and populate our iframes:

```typescript
const games = JSON.parse(runtime.globalVars.JSON);
const newGames = [];
const existingGames = [];
const ourGames = [];

for (const address of Object.keys(games)) {
    const game = games[address];

    if (game.players[2]) {
        existingGames.push({ address, game });

        if (game.players[1] === runtime.globalVars.ValidatedAddress || game.players[2] === runtime.globalVars.ValidatedAddress)
            ourGames.push({ address, game });
        }
    } else {
        newGames.push({ address, game });
    }
}

let html = "";

for (const game of newGames) {
    const wager = (game.game.wager / 100000000);
    html += "<div>New game by " + game.game.players[1] + " for " + wager + runtime.globalVars.Symbol + " (<a href='ark:" + game.address + "&amount=" + wager + "'>Join</a>)</div>";
}

document.getElementById("NewIframe").contentWindow.document.body.innerHTML = html;
html = "";

for (const game of existingGames) {
    const wager = game.game.wager / 100000000;
    html += "<div>Game between " + game.game.players[1] + " and " + game.game.players[2] + " for " + wager + runtime.globalVars.Symbol + "</div>";
}

document.getElementById("ExistingIframe").contentWindow.document.body.innerHTML = html;
html = "";

for (const game of ourGames) {
    const wager = game.game.wager / 100000000;
    html += "<div>Game between " + (game.game.players[1] === runtime.globalVars.ValidatedAddress ? "you" : game.game.players[1]) + " and " + (game.game.players[2] === runtime.globalVars.ValidatedAddress ? "you" : game.game.players[2]) + " for " + wager + runtime.globalVars.Symbol + "</div>";
}
document.getElementById("OurIframe").contentWindow.document.body.innerHTML = html;
```

What does this do, you might ask? It’ll go through all our games, and if there are two players then it’s an existing game — otherwise, it’s a new game and a link to automatically send a transaction to join the game will be shown, using the ark: URI scheme we described in the **last tutorial**. If the address matches our own, it’ll add the game to the third column for easy identification. Of course, you can play around with the HTML code and add styles to the div elements inside our iframes to make it really pop!

Give it a try — run our Construct project, start some new games and send some transactions to join the games. You should see the lists populate with the addresses and wagers, and will change and update automatically as the transactions are forged in blocks and stored on the blockchain.

## Next Steps

Congratulations on reaching the end of the third tutorial! Today we’ve learned how to parse the blockchain to create a lobby and match wagers, with the data automatically updating in the client without manually refreshing. In the next tutorial, we will play with the smartbridge field — also known as the vendor field — to implement turn-based game logic to make our game playable.

If you become stuck at any point make sure to consult our documents on our [Core Developer Docs](/docs/core/how-to-guides/setting-up-your-development-environment/intro). In addition, our team and developers are active on [Discord](https://discord.ark.io) so do not hesitate to reach out to us!
