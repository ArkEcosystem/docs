---
title: Custom Transactions Guide - Implementing the Handlers
---

# Implement Blockchain Protocol Handlers

The previous two classes [Builder](/docs/core/development-guides/custom-transactions/implementing-the-builder) and [Transaction](/docs/core/development-guides/custom-transactions/defining-the-structure), introduced a new transaction type, implemented the **serde** process, and created signed transaction payload. **Handler class is connected with the blockchain protocol, following its strict mechanics such as consensus rules, transaction and block processing.**

By inheriting default `TransactionHandler` behavior we enforce existing GTI engine rules and provide options to implement additional transaction apply logic.

We will also make use of dependency injection to query the pool and the forged transactions (more details about that later).

```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    @Container.inject(Container.Identifiers.TransactionPoolQuery)
    private readonly poolQuery!: Contracts.TransactionPool.Query;

    @Container.inject(Container.Identifiers.TransactionHistoryService)
    private readonly transactionHistoryService!: Contracts.Shared.TransactionHistoryService;

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

* `bootstrap`
* `throwIfCannotBeApplied`
* `emitEvents`
* `throwIfCannotEnterPool`
* `applyToSender`
* `revertForSender`
* `applyToRecipient`
* `revertForRecipient`
* `isActivated`

You can have a look at the full implementation in the [custom transaction github repository](https://github.com/learn-ark/dapp-custom-transaction-example/blob/develop/src/handlers/BusinessRegistrationTransactionHandler.ts).

Each of the methods above has a special place in the blockchain protocol validation and verification process.

We will explain GTI **TransactionHandler** and the role it plays in our blockchain protocol in the following sections.

## STEP 1: Define Custom Transaction Dependencies

We must define the Transaction Type registration order if our custom transaction \(e.g.BusinessRegistrationTransaction \) depends on other transactions \(e.g. MultiSignature \)— in short, the MultiSignature transaction must be registered before ours. We define transaction dependencies by using the **dependencies\(\)** method call, where we return an array of dependent classes.

```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    // ...

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

<livewire:page-reference path="/docs/core/development-guides/custom-transactions/defining-the-structure" />

Usually, we want to **add custom properties to our global state \(the walletManager class**\). These properties need to be quickly accessible \(memoization\) and searchable \(indexed\) and are computed during the bootstrap process.

We will accomplish this with the **walletAttributes**\(\) method, where we define the keys for our wallet attributes. Keys can be set during runtime by calling **wallet.setAttribute\(key, value\)** method. **Make sure the keys you use are unique.**

```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    // ...

    // defining the wallet attribute key
    public walletAttributes(): ReadonlyArray<string> {
        return [
            "business",
        ];
    }
```

## STEP 3: Tapping Into the Transaction Bootstrap Process

Bootstrap process is run each time a core node is started. The process evaluates all of the transactions in the local database and applies them to the corresponding wallets. All of the amounts, votes, and other custom properties are calculated and applied to the global state — walletManager.

The source-code below shows implementing our `bootstrap` method to set our custom `business` attribute from existing custom transactions in database. When we are done with custom wallet attribute value changes, a index call is recommended on the **walletManager.index\(wallet\)**.

Also note that we use `this.transactionHistoryService` from the injected transaction history service to read forged business registration transactions from database.

```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    // ...

    // defining the wallet attribute key
    public walletAttributes(): ReadonlyArray<string> {
        return [
            "business",
        ];
    }

    // reading and setting wallet attribute value for defined key above
    public async bootstrap(): Promise<void> {
        const criteria = {
            typeGroup: this.getConstructor().typeGroup,
            type: this.getConstructor().type,
        };

        for await (const transaction of this.transactionHistoryService.streamByCriteria(criteria)) {
            const wallet: Contracts.State.Wallet = this.walletRepository.findByPublicKey(transaction.senderPublicKey);
            const asset = {
                businessAsset: transaction.asset.businessRegistration,
            };

            wallet.setAttribute("business", asset);
            this.walletRepository.index(wallet);
        }
    }
}
```

### STEP 4: Implement apply and revert methods

While `bootstrap` method is run on startup, built from transactions in database, apply and revert methods are used as we receive new transactions (new blocks received or new transactions yet to be forged).

Here we only need to implement `applyToSender` and `revertForSender` as we just want to set/remove the `business` attribute from the sender's wallet.

```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    // ...

    public async applyToSender(transaction: Interfaces.ITransaction): Promise<void> {
        await super.applyToSender(transaction);

        Utils.assert.defined<string>(transaction.data.senderPublicKey);

        const sender: Contracts.State.Wallet = this.walletRepository.findByPublicKey(transaction.data.senderPublicKey);

        sender.setAttribute("business", {
            businessAsset: transaction.data.asset.businessRegistration,
        });

        this.walletRepository.index(sender);
    }

    public async revertForSender(transaction: Interfaces.ITransaction): Promise<void> {
        await super.revertForSender(transaction);

        Utils.assert.defined<string>(transaction.data.senderPublicKey);

        const sender: Contracts.State.Wallet = this.walletRepository.findByPublicKey(transaction.data.senderPublicKey);

        sender.forgetAttribute("business");

        this.walletRepository.index(sender);
    }

    public async applyToRecipient(
        transaction: Interfaces.ITransaction,
        // tslint:disable-next-line: no-empty
    ): Promise<void> {}

    public async revertForRecipient(
        transaction: Interfaces.ITransaction,
        // tslint:disable-next-line:no-empty
    ): Promise<void> {}
}
```

## STEP 5: Implementing Transaction-Pool Validation

The Transaction Pool serves as a temporary layer where valid and verified transactions are stored locally until it is their turn to be included in the newly forged \(created\) blocks. Each new custom transaction type needs to be verified and accepted by the same strict limitation rules that are enforced for our core transactions. We need to implement `throwIfCannotEnterPool` method \(see source-code snippet below\) to follow the rules and execution structure. The method is called from the core GTI Engine.

Note that we use `this.poolQuery` from the injected transaction pool query service.

```typescript
export class BusinessRegistrationTransactionHandler extends Handlers.TransactionHandler {
    // ...
    public async throwIfCannotEnterPool(transaction: Interfaces.ITransaction): Promise<void> {
        const hasSender: boolean = this.poolQuery
            .getAllBySender(transaction.data.senderPublicKey)
            .whereKind(transaction)
            .has();

        if (hasSender) {
            throw new Contracts.TransactionPool.PoolError(`Business registration already in the pool`, "ERR_PENDING");
        }
    }
}
```

## STEP 5: Register The New Transaction Type Within Core GTI Engine

<x-alert type="success">
**You made it.** The final step awaits, and it is the easiest: registration of the newly implemented **BusinessRegistrationTransaction** type. To accomplish this, we just need to bind the `TransactionHandler` identifier to our custom transaction handler in our service provider declaration (see code below).
</x-alert>

```typescript
export class ServiceProvider extends Providers.ServiceProvider {
    public async register(): Promise<void> {
        const logger: Contracts.Kernel.Logger = this.app.get(Container.Identifiers.LogService);
        logger.info(`Loading plugin: ${plugin.name} with version ${plugin.version}.`);

        this.app.bind(Container.Identifiers.TransactionHandler).to(BusinessRegistrationTransactionHandler);
    }
}
```

Your custom transaction type implementation is now **COMPLETE**.  Follow the next steps to add and load your plugin during the CORE node bootstrap process.
