---
title: Develop & Test a Custom Transaction
excerpt: Developing custom transactions may appear to be daunting on the face of things. Though, by following this guide we will walk you through how you can easily develop & test a custom transaction within your local environment.
number: 2
---

# Develop & Test a Custom Transaction

Welcome everyone to the second part in our series of tutorials based on the ARK Messenger Proof-of-Concept (PoC). During **[Part One](/tutorials/ark-messenger-tutorial/part-one)**, we set up a development environment and deployed our own custom bridgechain. This series was created in-part with documentation provided by Delegate **[Lemii](https://github.com/Lemii)** as part of his **[ARK Messenger](https://arkmessenger.io/)** Proof-of-Concept, funded by the **[ARK Grants Program](https://ark.io/grants)**.

One of the main goals for this series is to successfully demonstrate the different ways developers can work with ARK Core. In this part of the series, we will learn to develop and test a custom transaction for our bridgechain. In addition, we will also be developing the _**client,**_ which is the front-end application users will use to interact with the messaging service.

## Getting Started

Before we get started with developing and testing our custom transactions, we need to outline the technical specifications for the application. This is important because it is very difficult to make changes once these parameters have been established. Let’s take a look at ARK Messenger’s technical specifications as an example.

ARK Messenger implements a custom _**Message Transaction**_. This is a transaction that will hold the encrypted message that is being sent by the user. The transaction should follow these rules:

* Set transfer amount to 0, and apply a low static fee (currently 0.01).
* Be able to store a relatively large amount of message data (1024 bytes).
* Must have a unique type and type group (101, 1001).

These were considerations made prior to developing the custom transaction. In addition to outlining your technical specifications, you may want to familiarize yourself with how custom transactions work on ARK. The article listed below will give you a solid base in understanding how smart/custom transactions work on the ARK Core Blockchain Framework.

[Understand And Write Custom Transactions TypesThe GTI engine was initially designed to assist our developers to make implementations of new transaction types easier
Core Developer Documentation](/docs/core/development/transactions/intro)

## Creating a Custom Transaction

Creating a custom transaction is a straightforward process. We will be using ARK Messenger’s custom transaction — _**Message Transaction**_ as our template.

The custom _**Message Transaction**_ is based on the _**Business Registration Transaction**_ from the [guide above](https://blog.ark.io/an-introduction-to-blockchain-application-development-part-2-2-909b4984bae). For reference, you can find the code [here](https://github.com/learn-ark/dapp-custom-transaction-example).

In order to create our custom transaction, we will be going over the transaction class, the transaction handler, and the transaction builder below. Please use the files below while working on each one:

* [Message Transaction File](https://github.com/ArkEcosystem/poc-ark-messenger-core/blob/master/plugins/message-transaction/src/transactions/MessageTransaction.ts)
* [Message Transaction Handler File](https://github.com/ArkEcosystem/poc-ark-messenger-core/blob/master/plugins/message-transaction/src/handlers/MessageTransactionHandler.ts)
* [Message Builder File](https://github.com/ArkEcosystem/poc-ark-messenger-core/blob/master/plugins/message-transaction/src/builders/MessageTransactionBuilder.ts)

### **Message Transaction (Creating our Custom Transaction)**

At the very top, we define our custom type and type group:

```typescript
const MESSAGE_TYPE = 101;
const MESSAGE_TYPE_GROUP = 1001;
```

Just below that, we define our transaction schema:

```typescript
public static getSchema(): Transactions.schemas.TransactionSchema {
    return schemas.extend(schemas.transactionBaseSchema, {…}
}
```

One difference you will notice, unlike the _Business Registration Transaction_, we included the _**recipientId**_ field in our schema. This is because this field is used as the ‘channel id’ for our purposes. Apart from that, we define the rest of the transaction and our _message_ object that will be used for message data.

Below the schema, we define our static fee of 0.01. The value we use is 1000000 because the ARK SDK does not work with floating-point numbers and the number of decimal places is 8.

As for the _**serde**_ (serializer/Deserializer) functionality; it mostly works the same as the _**Business Registration Transaction**,_ with the exception of two important things:

* The _**writeUint8**_ buffer function is limited to a size, 256 bytes. Since we want to process message data of 1024 bytes maximum, we must use the _**writeUint16**_ variant instead.
* Because we want to use the _**recipientId**_ in the transaction, we must include it in _**serde**_ process as well:

Serializer:

```typescript
const { addressBuffer, addressError } = Identities.Address.toBuffer(data.recipientId);
options.addressError = addressError;
buffer.append(addressBuffer);
```

Deserializer:

```typescript
data.recipientId = Identities.Address.fromBuffer(buf.readBytes(21).toBuffer());
```

### **Message Transaction Handler**

Next, we will work on the Message Transaction handler. Since the _**Message Transaction**_ is relatively simple, we can omit most of the logic from the _Business Registration Transaction_ handler.

Using _throwIfCannotBeApplied_ we explicitly check if the message data is valid:

```typescript
const { data }: Interfaces.ITransaction = transaction;
const { message }: { message: string } = data.asset.messageData;

if (!message) {
    throw new MessageTransactionAssetError();
}

await super.throwIfCannotBeApplied(transaction, wallet, databaseWalletManager);
```

At _**applyToSender**_ and _**revertForSender**_ we perform the default apply and revert actions. The methods _**applyToRecipient**_ and _**revertForRecipient**_ are not utilized because none of the recipient’s attributes are mutated by processing the _**Message Transaction**_.

Apart from that, we let the base _**TransactionHandler**…_ "handle" the rest

### **Message Transaction Builder**

The builder that is present in this file will be used in the ARK Messenger Client to create _**Message Transactions**_ whenever a user submits a message.

First, we initialize the _data_ object with the class `constructor()` method:

```typescript
constructor() {
    super();

    this.data.type = MessageTransaction.type;
    this.data.typeGroup = MessageTransaction.typeGroup;
    this.data.version = 2;
    this.data.fee = Utils.BigNumber.make("1000000");
    this.data.amount = Utils.BigNumber.ZERO;
    this.data.asset = { messageData: {} };
    this.data.recipientId = undefined;
};
```

Next up, we create a method that we can use to add message data to the transaction:

```typescript
public messageData(message: string): MessageTransactionBuilder {
    this.data.asset.messageData = {
        message,
    };
};
```

Finally, we need to add the non-standard fields to the transaction data object for when it is called with `getStruct()`:

```typescript
public getStruct(): Interfaces.ITransactionData {
    const struct: Interfaces.ITransactionData = super.getStruct();
    struct.amount = this.data.amount;
    struct.asset = this.data.asset;
    struct.recipientId = this.data.recipientId;

    return struct;
};
```

## Testing the Custom Transaction Builder

There are a number of ways to test your custom transaction. One of the best options is to create a test file with Jest. This tester is also used for other ARK packages, so this is a nice synergy.

At the top, we import all the required packages:

```typescript
import "jest-extended";
import { Managers, Transactions } from "@arkecosystem/crypto";
import { MessageTransactionBuilder } from "../src/builders";
import { MessageTransaction } from "../src/transactions";
```

Next, we need to make some adjustments with the config manager to be able to actually create the transaction. First, we select the _**testnet**_ network preset and set the _**height**_ to 2. This will enable the AIP11 milestone.

```typescript
Managers.configManager.setFromPreset("testnet");
Managers.configManager.setHeight(2);
```

Now we include our new custom transaction to the _transaction registry:_

```typescript
Transactions.TransactionRegistry.registerTransactionType(MessageTransaction);
```

The configuration is now complete. What’s left is to create a test that verifies that the transaction can be built and verified:

```typescript
describe("Test builder", () => {
      it("should verify correctly", () => {
         const builder = new MessageTransactionBuilder();
         const tx = builder
            .messageData("SomeMessage")
            .nonce("3")
            .recipientId("AYeceuGa7tTsyG6jgq7X6qKdoXt9iJJKN6").sign("clay harbor enemy utility margin pretty hub comic piece  aerobic umbrella acquire");
            expect(tx.build().verified).toBeTrue();
            expect(tx.verify()).toBeTrue();
      });
});
```

Lastly, we will verify these transactions on the network.

## Testing the Custom Transaction on the Network

When the builder test has been passed, we can continue with the custom transaction integration for the bridgechain. First, we need to include the custom transaction as a plugin in the bridgechain.

Information on how to create a plugin can be found here: [How to Write a Core Plugin](https://docs.ark.io/tutorials/core/plugins/how-to-write-a-core-plugin.html)

You can view our _**Message Transaction**_ plugin file here: [plugin.js](http://link/).

To integrate the _**Message Transaction**_ plugin in the bridgechain, we simply have to include it at the bottom of the _plugins.js_ file found in _./packages/core/bin/config/{network}/plugins.js_

```typescript
module.exports = {
    …,
    "message-transaction": {},
};
```

Now, when we run _**yarn setup**_ to install the bridgechain, it will automatically install the custom transaction as well and include it as a plugin on startup.

When the bridgechain is running (locally), we can verify that the custom transaction is integrated correctly by checking the following API endpoint: [http://127.0.0.1:11003/api/transactions/types](http://127.0.0.1:11003/api/transactions/types)

If our custom transaction is present in the list of available transaction types, we can try and post an actual transaction to the blockchain to see if it processes correctly. This can be done in many ways, but the preferred way is utilizing simple scripts.

The test is complete when the transaction is broadcast and processed by the network. We have now successfully implemented our custom _**Message Transaction**_! The next step is to develop the chat client that the user will interact with.

## Using the custom transaction in the client

As mentioned earlier, the client has been created with ReactJS and is written in TypeScript. The full codebase can be viewed [here](https://github.com/ArkEcosystem/poc-ark-messenger).

To make use of the custom transaction in our chat client, we first have to include some of the files in our project. The parts that we need are the _Message Transaction_ and _Message Transaction Builder_. We can simply copy-paste these from before, and place them in the [/src/ folder](https://github.com/ArkEcosystem/poc-ark-messenger/tree/master/src/custom-transactions/message-transaction). Since the _Message Transaction Handler_ is only used for the Core, this can be omitted.

Now, we can simply import the Message Transaction Builder anywhere in our app to make use of it. In the ARK Messenger client, it is being imported in a separate utils file, as you can see [here](https://github.com/ArkEcosystem/poc-ark-messenger/blob/master/src/utils/transactions.ts).

```typescript
import { encryptMessage, fetchRemoteNonce, broadcastTransaction } from "./index";
import { Transactions } from "@arkecosystem/crypto";
import { ITransactionData, IPostTransactionResponse } from "../interfaces";
import { MessageTransaction } from "../custom-transactions/message-transaction/transactions";
import { MessageTransactionBuilder } from "../custom-transactions/message-transaction/builders";
```

It’s required to register the new transaction type in the Transaction Registry:

```typescript
Transactions.TransactionRegistry.registerTransactionType(MessageTransaction);
```

We’re using a custom network version defined in an environment variable. We store this in a const variable that will be passed on to the transaction builder:

```typescript
const NETWORK = Number(process.env.REACT_APP_NETWORK);
```

Finally, we can call the builder in our custom transaction functions that will be used for the chat functionality:

```typescript
const createMessageTransaction = async (
    recipientId: string,
    encryptedMessage: string,
    passphrase: string,
    senderId: string
): Promise<ITransactionData> => {

    const nonce = await fetchRemoteNonce(senderId);
    const tx = new MessageTransactionBuilder()
        .network(NETWORK)
        .recipientId(recipientId)
        .messageData(encryptedMessage)
        .nonce(nonce)
        .sign(passphrase);

    return tx.getStruct();
};

export const sendMessage = async (
    recipientId: string,
    text: string,
    channelPassphrase: string,
    userPassphrase: string,
    userAddress: string
): Promise<IPostTransactionResponse | void> => {
    const encryptedMessage = encryptMessage(text, channelPassphrase);

    try {
        const tx = await createMessageTransaction(
            recipientId,
            encryptedMessage,
            userPassphrase,
            userAddress
        );

        return broadcastTransaction(tx);
    } catch (err) {
        console.error(err);
    }
};
```

Alternatives to this approach are:

* Upload the custom transaction as a module to NPM.
* Make use of Git [Submodules](https://git-scm.com/book/en/v2/Git-Tools-Submodules).

## Next Steps

In our next and final tutorial, we will be deploying a bridgechain and launching the client application. In addition, we will be highlighting all of the examples pertaining to how developers can work with the ARK Core. With future updates and improvements, ARK Core will continue to be one of the simplest and most flexible ways to build blockchain solutions.

If you become stuck at any point make sure to consult our documents on our [Core Developer Docs](/docs/core/installation/intro). In addition, our team and developers are active on [Discord](https://discord.ark.io) so do not hesitate to reach out to us!
