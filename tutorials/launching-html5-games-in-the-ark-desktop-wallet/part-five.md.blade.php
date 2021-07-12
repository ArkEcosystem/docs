---
title: Determining how Prizes Work
excerpt: We've now successfully built a game, but what about the prizes? Learn how to implement prize logic into your game by following this guide.
number: 5
---

# Determining how Prizes Work

We have now arrived at the penultimate part of our series exploring how to launch HTML5 games in the Desktop Wallet using an ARK Core plugin and **[Construct 3](https://editor.construct.net/)**. If you’ve been following all the previous parts of this series, you will have successfully built a fully working blockchain game from scratch using smartbridge messages to make moves with an integrated lobby to make bets and match wagers.

While our game is fully functional, we haven’t yet implemented any prize logic aside from the initial wager matching. That is to say, winners, don’t get paid a prize and bets are not refunded in the case of a tie. However, that will be the subject of today’s tutorial.

<x-alert type=info>
If this is your first time joining us, make sure to check out **[Part One](/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-one)** of our tutorial series.
</x-alert>

This tutorial is entirely based on the ARK Core plugin, so we will not be making any changes to our Construct 3 project at all this time. To get started, open up **manager.ts** in your text editor of choice!

## Implementing Prize Logic

Before we start, we have to import Transactions from ARK’s crypto library. To do this, find:

```typescript
import { Identities } from "@arkecosystem/crypto";
```

Replace it with:

```typescript
import { Identities, Transactions } from "@arkecosystem/crypto";

// Now, we’ll examine the relevant part of our existing generateState function to see what happens when a game is won or tied:

if (outcome !== "ongoing") {
    break;
}
```

Let’s remember that in the event of a tie, the outcome variable value will be "tie" and if someone has won, the value of the outcome variable will be either 1 or 2, depending on if the winner was player 1 or player 2. Otherwise, the value will be "ongoing".

From this code snippet, we can see at the moment, if the value of the outcome variable is not "ongoing" (i.e. the game was won or tied) then our loop ends, but nothing else happens. Let’s go ahead and revise this code now to include logic to pay our players. Since the code only ever executes if the game has been won or tied, we should check if it was in fact tied. If so, we return the wager to both players. If not, it means a player has won the game so should receive the whole prize, which is the sum of both wagers:

```typescript
if (outcome !== "ongoing") {
    if (outcome === "tie") {
        this.pay(address, players, wager);
    } else {
        this.pay(address, players[outcome], wager * 2);
    }
    break;
}
```

Of course, we must still write our pay function. In the event of a tie, the players' object (which contains the addresses of both players) is sent to our function. When a game is won outright, just the address of the winner is sent to our function as a string. This means that our pay function will know which scenario is happening by checking if the data passed to it is an object of addresses (tie) or a single address string (win).

ARK Core 2.6 introduced a wide variety of useful features that we can take advantage of here. The first is _sequential nonces_. Simply put, each transaction from a sending wallet must have a nonce value that is unique and strictly one greater than the nonce value of the most recent transaction sent from the wallet. We can use this to check the nonce value of our game wallet — if the value is zero, it means we’ve not paid anybody yet, so we should do so. If the nonce value is not 0, we’ve already paid out for this game. This prevents a case where players are paid multiple times (e.g. when you restart your plugin and the game state is regenerated).

The second feature is _multipayments_. This means, in the event of a tie, we can pay both players in a single transaction. This helps to limit network congestion and since there is only one transaction, it means there is only one nonce.

Putting this together, our logic for the pay function is as follows:

1. If the wallet’s nonce is non-zero, we’ve already paid, so we should exit our routine.
2. We fetch the passphrase for the game wallet and its public key.
3. If the data supplied to the function is a single string, we generate a standard transfer transaction for the amount specified, less the transaction fee, and send it to the address in the string.
4. If the data supplied is an object containing multiple addresses, we generate a multipayment transaction for both of the players, with the amount specified, less the transaction fee.
5. Once our transaction has been generated, we sign it and broadcast it to the network.

We can accomplish this in the following way:

```typescript
private pay(sender: string, recipient: string | object, amount: number) {
    const wallet = app.resolvePlugin("database").walletManager.findById(sender);
    if (wallet.nonce.toString() !== "0") {
        return;
    }

    const passphrase = this.addresses[sender];
    const publicKey = Identities.PublicKey.fromPassphrase(passphrase);
    const fee = "1000000";
    const payAmount = (amount — parseInt(fee)).toString();
    let transaction;

    if (typeof recipient === "string") {
        transaction = Transactions.BuilderFactory.transfer().nonce("1").senderPublicKey(publicKey).recipientId(recipient).fee(fee).amount(payAmount).vendorField("You won the game, congratulations!");
    } else {
        transaction = Transactions.BuilderFactory.multiPayment().nonce("1").senderPublicKey(publicKey).fee(fee).vendorField("The game was tied. Here is your wager!");
        transaction.addPayment(recipient[1], payAmount);
        transaction.addPayment(recipient[2], payAmount);
    }

    const signedTransaction = transaction.sign(passphrase).build();
    app.resolvePlugin("p2p").getMonitor().broadcastTransactions([signedTransaction]);
}
```

Run yarn build to compile our plugin, then restart ARK Core and enjoy!

## Next Steps

Congratulations, our blockchain game can now calculate, award and pay out prizes or refund entry fees in the event of a tie. Our standalone game is now complete! In the final part of our tutorial series, we will set up our game as a plugin inside of the ARK Desktop Wallet.

If you become stuck at any point make sure to consult our documents on our [Core Developer Docs](/docs/core/getting-started/development-setup/introduction). In addition, our team and developers are active on [Discord](https://discord.ark.io) so do not hesitate to reach out to us!

**Check out previous posts in this series for reference here:**

<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-one" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-two" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-three" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-four" />
