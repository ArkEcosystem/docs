---
title: Implement Blockchain Protocol Handlers
---

# Implement Blockchain Protocol Handlers

The previous two classes [Builder](/docs/core/how-to-guides/how-to-write-custom-transactions-types/implement-transaction-builder) and [Transaction](/docs/core/how-to-guides/how-to-write-custom-transactions-types/implementing-transaction-structure), introduced a new transaction type, implemented the **serde** process, and created signed transaction payload. **Handler class is connected with the blockchain protocol, following its strict mechanics such as consensus rules, transaction and block processing.**

By inheriting default [TransactionHandler](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L8) behaviour we enforce existing GTI engine rules and provide options to implement additional transaction apply logic.


```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    public getConstructor(): Transactions.TransactionConstructor {
        return BusinessRegistrationTransaction;
    }
    // ...
}
```

<x-alert type="info">
_Apply logic consists of basic **validation and verification protocol** rules, for example, i.\) check if there are enough funds in the wallet, ii.\) check for duplicate transactions, iii.\) if the received transaction is on the correct network \(correct bridgechain\), and many, many more._
</x-alert>

We need to implement the following handler methods:

* [bootstrap](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L27)
* [throwIfCannotBeApplied](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L46)
* [emitEvents](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L65)
* [canEnterTransactionPool](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L69)
* [applyToSender](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L108)
* [revertForSender](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L118)
* [applyToRecipient](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L128)
* [revertForRecipient](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L135)
* [isActivated](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L23)

Each of the methods above has a special place in the blockchain protocol validation and verification process.

We will explain GTI **TransactionHandler** and the role it plays in our blockchain protocol in the following sections:

## STEP 1: Define Custom Transaction Dependencies

We must define the Transaction Type registration order if our custom transaction \(e.g.BusinessRegistrationTransaction \) depends on other transactions \(e.g. MultiSignature \)— in short, the MultiSignature transaction must be registered before ours. We define transaction dependencies by using the **dependencies\(\)** method call, where we return an array of dependent classes.


```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    public getConstructor(): Transactions.TransactionConstructor {
        return BusinessRegistrationTransaction;
    }

    public dependencies(): ReadonlyArray<Handlers.TransactionHandlerConstructor> {
        return [];
    }
    // ...
}
```

## STEP 2: Adding Attributes To Global State

Usually, we want to **add custom properties to our global state \(the walletManager class**\). These properties need to be quickly accessible \(memoization\) and searchable \(indexed\). We defined custom transaction fields and structure in here:

<livewire:page-reference path="/docs/core/how-to-guides/how-to-write-custom-transactions-types/implementing-transaction-structure" />

Usually, we want to **add custom properties to our global state \(the walletManager class**\). These properties need to be quickly accessible \(memoization\) and searchable \(indexed\) and are computed during the bootstrap process.

We will accomplish this with the **walletAttributes**\(\) method, where we define the keys for our wallet attributes. Keys can be set during runtime by calling **wallet.setAttribute\(key, value\)** method. **Make sure the keys you use are unique.**

The source-code below shows registering of a new wallet attribute with key=business. We set the attribute value during the **bootstrap\(\)** method call. When we are done with custom wallet attribute value changes, a reindex call is recommended on the **walletManager.reindex\(wallet\)**.


```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    // defining the wallet attribute key
    public walletAttributes(): ReadonlyArray<string> {
        return [
            "transactionWalletKeyName",
        ];
    }

    // reading and setting wallet attribute value for defined key above
    public async bootstrap(connection: Database.IConnection, walletManager: State.IWalletManager): Promise<void> {
        const reader: TransactionReader = await TransactionReader.create(connection, this.getConstructor());

        while (reader.hasNext()) {
            const transactions = await reader.read();

            for (const transaction of transactions) {
                const wallet: State.IWallet = walletManager.findByPublicKey(transaction.senderPublicKey);
                const asset: IBusinessData = {
                    name: transaction.asset.businessData.name,
                    website: transaction.asset.businessData.website,
                };

                wallet.setAttribute<IBusinessData>("transactionWalletKeyName", asset);
                walletManager.reindex(wallet);
            }
        }
    }
}
```

## STEP 3: Tapping Into the Transaction Bootstrap Process

Bootstrap process is run each time a core node is started. The process evaluates all of the transactions in the local database and applies them to the corresponding wallets. All of the amounts, votes, and other custom properties are calculated and applied to the global state — walletManager. Since our new custom transaction  BusinessRegistrationTransaction follows the same blockchain mechanics, we only need to [implement relevant \(see code snippet below\) apply methods](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L108-L141) defined by the TransactionHandler interface.


```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
  // ...

  public async applyToSender(transaction: Interfaces.ITransaction, walletManager: State.IWalletManager): Promise<void> {
    await super.applyToSender(transaction, walletManager);
    const sender: State.IWallet = walletManager.findByPublicKey(transaction.data.senderPublicKey);
    sender.setAttribute<IBusinessRegistrationAsset>("business", transaction.data.asset.businessRegistration);
    walletManager.reindex(sender);
  }

  public async revertForSender(transaction: Interfaces.ITransaction, walletManager: State.IWalletManager): Promise<void> {
    await super.revertForSender(transaction, walletManager);
    const sender: State.IWallet = walletManager.findByPublicKey(transaction.data.senderPublicKey);
    sender.forgetAttribute("business");
    walletManager.reindex(sender);
  }

  public async applyToRecipient(transaction: Interfaces.ITransaction, walletManager: State.IWalletManager): Promise<void> {
    return;
  }

  public async revertForRecipient(transaction: Interfaces.ITransaction, walletManager: State.IWalletManager): Promise<void> {
    return;
  }
}
```

## STEP 4: Implementing Transaction-Pool Validation

The Transaction Pool serves as a temporary layer where valid and verified transactions are stored locally until it is their turn to be included in the newly forged \(created\) blocks. Each new custom transaction type needs to be verified and accepted by the same strict limitation rules that are enforced for our core transactions. We need to implement [**canEnterTransactionPool**\(\)](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/handlers/BusinessRegistrationTransactionHandler.ts#L69) method \(see source-code snippet below\) to follow the rules and execution structure. The method is called from the core GTI Engine.

```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
  // ...
  public async canEnterTransactionPool(
    data: Interfaces.ITransactionData,
    pool: TransactionPool.IConnection,
    processor: TransactionPool.IProcessor,

  ): Promise<{ type: string, message: string } | null>  {

    if (containsBusinessRegistrationForSameNameInPool){
        return {
            type: "ERR_PENDING",
            message: `Business registration for "${name}" already in the pool`,
        }
    }
    return null;
  }
}
```

## STEP 5: Register The New Transaction Type Within Core GTI Engine

<x-alert type="success">
**You made it.** The final step awaits, and it is the easiest: registration of the newly implemented **BusinessRegistrationTransaction** type. To accomplish this, we need to get access to the core-transactions handler and call [**registerTransactionHandler**\(\) ](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/plugin.ts#L12)method \(see code below\).
</x-alert>


```typescript
async register(container: Container.IContainer, options) {
    container.resolvePlugin<Logger.ILogger>("logger").info("Registering custom transaction");
    // new custom transaction type registration
    Handlers.Registry.registerTransactionHandler(BusinessRegistrationTransactionHandler);
}
```

Your custom transaction type implementation is now **COMPLETE**.  Follow the next steps to add and load your plugin during the CORE node bootstrap process.
