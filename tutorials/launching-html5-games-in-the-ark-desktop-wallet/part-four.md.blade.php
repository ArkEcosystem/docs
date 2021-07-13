---
title: Implementing Game Logic into your Plugin
excerpt: The most important part of a successful game is solid game logic. Read on as we describe the fundamental rules of Connect 4 and how we integrate them into the logic of our game.
number: 4
---

# Implementing Game Logic into your Plugin

Welcome once again to the fourth tutorial in our series explaining how to launch an HTML5 game in the Desktop Wallet by writing an ARK Core plugin and using **[Construct 3](https://editor.construct.net/)** for the client. In this part, we will implement turn-based game logic into our Connect 4 game by reading the smartbridge (also known as the vendorfield) messages of transactions sent to our generated game addresses to fill up the game board and keep track of whose turn it is.

## Implementing Game Logic

Let’s go through the rules of the game so we implement our logic correctly(_we are using the connect four game for example_):Starting connect four game board

![Starting connect four game board](https://miro.medium.com/proxy/0*RCafXgnGLTWMI1qv)

1. There are 7 columns that can each hold 6 discs.
2. Each player takes a turn to insert 1 disc into any of the columns that are not full.
3. The first to place 4 of their discs in an unbroken line, either vertically, horizontally or diagonally wins and the game ends.
4. If the board is full and nobody has placed 4 discs in a valid line, the game ends in a tie.

As there are 7 columns, our smartbridge message should be 1, 2, 3, 4, 5, 6 or 7 to represent each of the available columns. If player one sends a transaction with a smartbridge message of 3 then our board would be like this:

![Smartbridge message with value of 3, inserts disc into row number 3](https://miro.medium.com/max/547/1*LON0AME4QtVn5ID0KAI_qg.png)

If player two also sends a transaction with 3 as the smartbridge message, their disc will be stacked on top of the previous one as it is in the same column:

![Our board after the second move](https://miro.medium.com/max/547/1*uv-jm1NP_XzpqZNJGDyZ7A.png)

If a chosen column is full, or a player sends a transaction out of turn, or a non-participating wallet sends a transaction to the game address, the move will be considered invalid and ignored.

Now that we’ve mapped out our game logic, it’s time to code it up. As usual, all of our Core plugin code lives in **manager.ts** so let’s not waste any time and open it up to begin! Most of our work on our Core plugin today will be on the generateState function that we started in the previous part of the tutorial series. We’re going to extend it to process messages in the smartbridge field of transactions to update the state of our game board according to the rules we just described.

We’re going to start by finding the following block that we wrote last time:

```typescript
for (const transaction of transactions) {
    if (transaction.senderId !== address && transaction.senderId !== players[1] && transaction.amount === wager) {
        players[2] = transaction.senderId;
        break;
    }
}
```

Replace it with this:

```typescript
let transactionCounter = 0;
for (const transaction of transactions) {
    if (transaction.senderId !== address && transaction.senderId !== players[1] && transaction.amount === wager) {
        players[2] = transaction.senderId;
        break;
    }
    transactionCounter++;
}
```

We do this so that we count the number of transactions that it took for us to match a valid wager, so we can disregard those transactions when we actually generate our game board. The reason for this is to stop cheaters from creating a new game with a wager and a valid smartbridge value in the same transaction that would trigger a move on the board too early.

Next up, find the following line that we wrote in the last tutorial:

```typescript
this.gameStates[address] = { players, wager };
```

Replace this line with the following code block beneath it:

```typescript
const board: Array<Array<number>> = [];
let turn: number = 0;
let outcome: string | number = "ongoing";
```

So, we’re declaring some new variables: board, outcome and turn. The board variable will contain an array holding the state of each column on the board. The outcome variable will be used to store who has won the game, if it is still ongoing, or if it is tied, and turn determines whose turn it is; we’re initializing it to zero until we know we have 2 valid participants (and then player 2 always starts since they were the last to join the game).

Now add the following code block:

```typescript
if (players[2]) {
    turn = 2;
    for (let i = 0; i < 7; i++) {
        board.push([]);
    }
    // We'll add more here
}
this.gameStates[address] = { board, outcome, players, turn, wager };
```

This means the rest of our board generation logic will only execute if we have two valid players, which sets the initial turn to belong to player 2 and initializes 7 empty columns on our board array. The last line means that our game client will receive information about the board state, the game outcome, the participating players, whose turn it is and the wager amount.

Next, we will add the following code block:

```typescript
const moves = transactions.slice(transactionCounter + 1).filter(transaction => !!transaction.vendorField);for (const move of moves) {
    if (move.senderId === players[turn]) {
        const column = parseInt(move.vendorField) — 1;

        if (!isNaN(column) && column >= 0 && column <= 6) {
              if (board[column].length < 6) {
                outcome = this.makeMove(turn, board, column);
                turn = turn === 2 ? 1 : 2;
            }
        }
    }

    if (outcome !== "ongoing") {
        break;
    }
}
```

So, what does this block do? Remember our first code modification earlier, where we added a transaction counter. This starts by removing those early transactions from our array of moves so we only start validating moves that occurred after a valid opponent matched the game wager. We filter out any transactions that do not include a smartbridge message, since that is the mechanism we use to make a move on the board so any transactions without a message are invalid. Then we loop through all the remaining transactions, making sure the sender of the transaction matches the player whose turn it is.

Since JavaScript arrays begin from 0 rather than 1, we have to subtract 1 from the value of the smartbridge message. For instance, although the first column of our board is 1, and the last column is 7, they are represented internally in the array as columns 0 and 6 respectively. So we must check that the column value is a valid number within the range 0-6, and that the column is not already full, i.e. it has less than 6 discs in it. If we’re all good so far, our routine calls the _**makeMove**_ function that we’re about to write, which updates the outcome variable. We then rotate the player’s turn, so if player 2 took a move, it’s now player 1’s turn or vice versa.

Lastly, we check the value of the outcome variable. If the value is no longer ongoing then it means we either have a winner or a tie, so we should stop processing any further transactions on this game address as the game is already over.

And with that, our _**generateState**_ function is complete! The last thing to do before heading over to Construct 3 is to write our _**makeMove**_ function. This is game-specific and includes the logic to check if four discs are in a line:

```typescript
private makeMove(turn: number, board: Array<Array<number>>, column: number) {
    board[column].push(turn);
    let full = true;

    for (let i = 0; i < board.length; i++) {
        for (let j = 0; j < 6; j++) {
            const disc = board[i][j];
            if (disc) {
                let won = false;
                if (board[i][j + 1] === disc && board[i][j + 2] === disc && board[i][j + 3] === disc) {
                    board[i][j] = board[i][j + 1] = board[i][j + 2] = board[i][j + 3] = disc;
                    won = true;
                }

                if (board[i + 1] && board[i + 2] && board[i + 3] && board[i + 1][j] === disc && board[i + 2][j] === disc && board[i + 3][j] === disc) {
                    board[i][j] = board[i + 1][j] = board[i + 2][j] = board[i + 3][j] = disc;
                    won = true;
                }

                if (board[i + 1] && board[i + 2] && board[i + 3] && board[i + 1][j + 1] === disc && board[i + 2][j + 2] === disc && board[i + 3][j + 3] === disc) {
                    board[i][j] = board[i + 1][j + 1] = board[i + 2][j + 2] = board[i + 3][j + 3] = disc;
                    won = true;
                }

                if (board[i + 1] && board[i + 2] && board[i + 3] && board[i + 1][j — 1] === disc && board[i + 2][j — 2] === disc && board[i + 3][j — 3] === disc) {
                    board[i][j] = board[i + 1][j — 1] = board[i + 2][j — 2] = board[i + 3][j — 3] = disc;
                    won = true;
                }

                if (won) {
                    return disc;
                }
            } else {
                full = false;
            }
        }
    }

    if (full) {
        return "tie";
    }

    return "ongoing";
}
```

In a nutshell, this places our new disc in the board at the column the player has chosen, then checks all the columns for the various permutations that can trigger a win condition, i.e. a vertical, horizontal or diagonal line of 4 matching discs. If that occurs, it returns the number of the winning player (i.e. player 1 or 2). If not, it checks if there are still some free spots on the board. If not, the function returns a tie result. Otherwise, the game remains ongoing.

Once these steps have been completed, then we have officially finished with our game logic!

Now, save your work and run yarn build. It’s time to head over to Construct 3 to bring it all together.

## Working with Construct 3

Go to our _Event Sheet 1_ and find our previously created _On start of layout_ event. Right-click our existing event and _Add script_ as we’ll be writing some code here to allow our lobby iframes (from the previous chapter) to interact with our game. Specifically, we’ll include a link to watch an ongoing game.

```typescript
if (!window.addedEventListener) {
    window.addEventListener("message", event => {
        if (event.data) {
            runtime.callFunction("IPC", event.data);
        }
    });

    window.addedEventListener = true;
}
```

You’ll notice that our code calls a function IPC, or _inter-process communication_. We need to create this function ourselves, but it will be very simple. It will just listen for a message containing the game address, store it in a variable and move us into a new game layout. But wait! Before we make our function, we must add our new game layout. Right-click _Layouts_ in the _Project_ menu and choose _Add layout._ Opt to also create an event sheet when asked. Then return to our _Event sheet 1_ as before.

![Adding a new layout](https://miro.medium.com/max/441/0*fzt6XO4p4A7u04Ir)

At this point, it’s wise to rename our layouts and event sheets to avoid confusion. Right-click _Layout 1_ and rename it to _Lobby Layout_. Do the same for _Event Sheet 1_, calling it _Lobby Event Sheet_. Then rename _Layout 2_ to _Game Layout_ and _Event Sheet 2_ to _Game Event Sheet_.

Let’s create that function. Right-click an empty area of the event sheet and choose _Add function_. Call it IPC and leave everything else as it is. Right-click our new function and choose _Add parameter_. Call it __Message and set its type to String. Click OK. For now, we’ll leave our function empty and come back to it in a few minutes.

To add our link to watch an ongoing game, we’ll edit the existing code in our ParseLobby function. Scroll through our event to locate that function, then find the following code blocks:

```typescript
for (const game of existingGames) {
    const wager = game.game.wager / 100000000;
    html += "<div>Game between " + game.game.players[1] + " and " + game.game.players[2] + " for " + wager + runtime.globalVars.Symbol + "</div>";
}

for (const game of ourGames) {
    const wager = game.game.wager / 100000000;
    html += "<div>Game between " + (game.game.players[1] === runtime.globalVars.ValidatedAddress ? "you" : game.game.players[1]) + " and " + (game.game.players[2] === runtime.globalVars.ValidatedAddress ? "you" : game.game.players[2]) + " for " + wager + runtime.globalVars.Symbol + "</div>";
}
```

We’re going to replace them with code blocks that also include a link to watch our game, which will work by sending a message from the iframe to our game, containing the address of the game we want to watch.

```typescript
for (const game of existingGames) {
    const wager = game.game.wager / 100000000;
    html += "<div>Game between " + game.game.players[1] + " and " + game.game.players[2] + " for " + wager + runtime.globalVars.Symbol + " (<a href='#' onclick='parent.postMessage(\"" + game.address + "\", \"*\"); return false'>Watch</a>)</div>";
}

for (const game of ourGames) {
    const wager = game.game.wager / 100000000;
    html += "<div>Game between " + (game.game.players[1] === runtime.globalVars.ValidatedAddress ? "you" : game.game.players[1]) + " and " + (game.game.players[2] === runtime.globalVars.ValidatedAddress ? "you" : game.game.players[2]) + " for " + wager + runtime.globalVars.Symbol + " (<a href='#' onclick='parent.postMessage(\"" + game.address + "\", \"*\"); return false'>Watch</a>)</div>";
}
```

![Our revised function](https://miro.medium.com/max/1200/0*BsKgcg57HTmKRiFQ)

Now, about that empty IPC function. As this will be processed by the game layout rather than the lobby, we’re going to add a new global variable in the _Game Event Sheet_ instead. Switch to that, right-click the empty sheet and choose _Add global variable_. Call it GameAddress which should be a String. Add another global variable called TurnAddress which is also a String. Flip back to our _Lobby Event Sheet_ and, in the IPC function, add a couple of actions. The first will be _System &gt; Set Value_ and choose to set the GameAddress variable to the value Message. Our second action will be _System &gt; Go to layout_. Pick _Game Layout_ from the list, click Done and we are indeed done with our lobby!

![Our IPC function is very simple!](https://miro.medium.com/max/1200/0*f7ZsYVDry61ND4hJ)

All the remaining work will take place in the _Game Layout_ and _Game Event Sheet_. We’ll design our board and discs and add some text to indicate whose turn it is and the status of the game. To do this, head on over to our _Game Layout_.

Right-click our empty layout and choose _Insert new object_. We’ll be adding a _Sprite_ this time. Call it _Board_ and you’ll see the _Animations_ Editor open. Choose the _Fill_ tool and pick the color of your choice for the board and fill our sprite with that color. Close the _Animations Editor_ and resize our board to 480x480 pixels.

![Filling our board with blue](https://miro.medium.com/max/1200/0*5P6pLwv1n8TEZF4q)

Repeat the process, adding another _Sprite_. This time call it _Disc_ and draw a white circle using the _Ellipse_ tool. Call the animation name 0, and also set the _Speed_ and _Repeat Count_ to 0. Right-click the 0 in the _Animations_ panel and choose _Duplicate_. Call the duplicated animation 1. Duplicate it again and call it 2. Choose 1 and fill the circle with a red color. Choose 2 and fill it with a yellow color. These are our game discs: player 1 will be red, player 2 will be yellow.

![Three animations for our disc: white, red and yellow.](https://miro.medium.com/max/1200/0*omxrfGQX1XICX_CC)

Close the _Animations Editor_ and then click our new disc in the layout. Choose the _Instance variables_ option from the _Properties_ window and pick _Add new instance variable._ Call the name _Column_ with a type of Number. Add another instance variable and call it _Row_, again with a type of Number. Resize our disc to 60x60 and place it in the bottom left corner of our board. Copy and paste our disc object to build a grid of 7 columns and 6 rows. Click each disc and set the _Column_ and _Row_ instance variable values correctly, so the bottom left disc is Column 0, Row 0, the next disc up is Column 0, Row 1, and so on, with the bottom right disc being Column 6, Row 0 and the top right disc being Column 6, Row 5. Remember how JavaScript arrays start from 0!

![The selected disc is in Column 4, Row 2](https://miro.medium.com/max/1200/0*nti0ReP-9mXbr7Ss)

Almost done with the layout! We need to add a text box to indicate whose turn it is, or if the game is over. Let’s do that now. Right-click our layout and pick _Insert new object._ Add a _Text_ object and call it _StatusText_. Drop it somewhere above the discs and set the color to white so it’s readable on the blue background. Increase the width of the text box so it covers the entire width of our board. The very last thing to do is to add a _Mouse_ object so we can interact with mouse events: this is so we can send a game transaction with an encoded smartbridge message when the player clicks on a column to play.

We’re now done with our layout. Time to head over to the _Game Event Sheet_! Add a new empty function and call it ParseBoard. Then add a new event, _WebSocket &gt; On text message_ whose action is _JSON &gt; Parse_. The JSON string to parse is WebSocket.MessageText. Now, add a sub-event within the _Websocket_ -&gt; _On Text Message_ event. Choose _JSON_ and then _Has Key_. Enter "games" then press Done. Click _Add action_ for our newly created sub-event and drill down to _System &gt; Set value_. We want to set our JSON object to the value of _JSON.get("Games")_. Click Done. This is the same event that we also created in our lobby, but we also need it to fire while in the game too so our client updates when the game state changes. Add a further action to this sub-event: _Functions &gt; ParseBoard_ as this function will be responsible for updating the state of the board.

We also need to update the board as soon as the game layout opens, so let’s create another event. Go to _System &gt; On start of layout_. The action should be _Functions &gt; ParseBoard_.

Time to write our ParseBoard logic! We’re going to pick the game that we want by using the _**GameAddress**_ that we saved earlier and display whose turn it is. If the address of the player whose turn it is matches our own validated address, we will print "You" instead of the address. So, let’s go!

```typescript
const games = JSON.parse(runtime.globalVars.JSON);
const game = games[runtime.globalVars.GameAddress];
let text = "";
runtime.globalVars.TurnAddress = "";

if (game.outcome === "ongoing") {
    text = `Current turn: ${game.players[game.turn]} (${game.turn === 1 ? "Red" : "Yellow"})`;
    runtime.globalVars.TurnAddress = game.players[game.turn];
} else if (game.outcome === "tie") {
    text = "Game tied!";
} else {
    text = `Winner: ${game.players[game.outcome]}!`;
}

if (runtime.globalVars.ValidatedAddress) {
    text = text.replace(runtime.globalVars.ValidatedAddress, "You");
}

runtime.objects['StatusText'].getFirstInstance().text = text;
```

Hopefully, by now you can understand how this works. We extract our game from the list of games by using the _**GameAddress**_ variable, and then check if the game is ongoing. If so, we show the address of whose turn it is, and the color they play (remember, player 1 is always red and player 2 is always yellow). If the outcome is tied or there’s a winner, we’ll display that information instead. Also, if the address matches our _**ValidatedAddress**_, meaning it’s us, we replace that address with "You". We also store the address of the current player in our _**TurnAddress**_ variable if the game is not over, otherwise, the value is cleared.

Let’s now expand our _**ParseBoard**_ further to change the color of the discs to represent the current state of the board:

```typescript
const discs = runtime.objects['Disc'].getAllInstances();
for (const column in game.board) {
    let row = 0;
    for (const position of game.board[column]) {
        const disc = (discs.filter(disc => disc.instVars.Column === parseInt(column) &&             disc.instVars.Row === parseInt(row)))[0];
        disc.setAnimation(game.board[column][row].toString());
        row++;
    }
}
```

This iterates through all the columns in the board data received from the WebSocket and sets the color of the matching disc at each column and row.

Now what’s left is to allow the current player to send a transaction to the game address using the smartbridge value for the column we want to place our disc in. To do this, we’ll add another event. Choose _Mouse &gt; On object clicked_. We want to act when the left button is clicked on a _Disc_ object. But that by itself is not enough, we want to only execute this when it’s our turn and if the chosen column is not full. So right-click our new event and _Add another condition_. Choose _Disc &gt; Is Playing_ and enter "0". This means our action will only trigger if the disc is white, i.e. it has not already been played (otherwise it would be 1 for red or 2 for yellow). Finally, we only want to trigger this when it’s our turn, so _Add another condition_ again, and this time pick _System &gt; Compare variable_. Choose ValidatedAddress as the variable, and TurnAddress as the value.

Our action for this new event is _Browser &gt; Go to URL._ We want to use the ark URI scheme to send a transaction from our player’s wallet to the game address, with a nominal value of 1 arktoshi, with the smartbridge message of the column we’re placing our disc in. This can be achieved with the following URL in our Construct 3 action: "ark:" & GameAddress & "?amount=0.00000001&vendorField=" & (Disc.Column + 1) & "&wallet=" & ValidatedAddress

![Our completed Game Event Sheet](https://miro.medium.com/max/1200/0*_Rh4qsDdLrlwO5zu)

## Next Steps

Congratulations, you have now created a playable blockchain game! But you’ll have probably noticed that the winner doesn’t receive a prize, and if there’s a tie the players don’t get their wager back. That’s the focus of the next part in our tutorial series, where we look into how game prizes are calculated, awarded and paid out.

If you become stuck at any point make sure to consult our documents on our [Core Developer Docs](/docs/core/getting-started/development-setup/introduction). In addition, our team and developers are active on [Discord](https://discord.ark.io) so do not hesitate to reach out to us!
**Check out previous posts in this series for reference here:**

<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-one" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-two" />
<livewire:page-reference path="/tutorials/launching-html5-games-in-the-ark-desktop-wallet/part-three" />
