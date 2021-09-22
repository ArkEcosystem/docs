---
title: Custom Transactions - Implementing the Builder
---

# Implementing the Transaction Builder

Builder class handles versioning, serde process, milestones, dynamic-fee logic and _all cryptography related items_ (sign, multisign, second-sign, sign with and without WIF, sequential [nonce](/docs/core/transactions/nonce) logic). The following code-snippet shows the actual [implementation of the Builder](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/builders/BusinessRegistrationBuilder.ts#L4) class for the BusinessRegistration Transaction.

<x-alert type="success">
Builder is something you will reuse in your **client applications** for creating new transaction payloads.
</x-alert>

```typescript
import { Interfaces, Transactions, Utils } from "@arkecosystem/crypto";
import { BusinessRegistrationTransaction } from "../transactions";

export class BusinessRegistrationBuilder extends Transactions.TransactionBuilder<BusinessRegistrationBuilder> {
    constructor() {
        super();
        this.data.type = BusinessRegistrationTransaction.type;
        this.data.typeGroup = BusinessRegistrationTransaction.typeGroup;
        this.data.version = 2;
        this.data.fee = Utils.BigNumber.make("5000000000");
        this.data.amount = Utils.BigNumber.ZERO;
        this.data.asset = { businessData: {} };
    }

    public businessData(name: string, website: string): BusinessRegistrationBuilder {
        this.data.asset.businessData = {
            name,
            website,
        };

        return this;
    }

    public getStruct(): Interfaces.ITransactionData {
        const struct: Interfaces.ITransactionData = super.getStruct();
        struct.amount = this.data.amount;
        struct.asset = this.data.asset;
        return struct;
    }

    protected instance(): BusinessRegistrationBuilder {
        return this;
    }
}
```

Now that we have implemented our builder class, we can use it to build new custom transaction payloads. The [code snippet](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/__tests__/test.test.ts#L13-L17) below shows us how to use the TransactionBuilder to create signed and serialized transaction payloads.

<x-alert type="danger">
When using Transaction Builder on the client side (your mobile/web app) make sure to register your TransactionType inside the **@arkecosystem/crypto** package with the following code:

**`Transactions.TransactionRegistry.registerTransactionType(YOUR_TRANSACTION_CLASS);`**

Check the code-snippet below, line 8.
</x-alert>

```typescript
import { Transactions } from "@arkecosystem/crypto";
import { BusinessRegistrationBuilder } from "../src/builders"; // adapt to your directory structure
import { BusinessRegistrationTransaction } from "../src/transactions"; // adapt to your directory structure

// Register your custom transaction (do it only once) to the crypto library,
// This is important when using builder on the client side.

Transactions.TransactionRegistry.registerTransactionType(BusinessRegistrationTransaction);

const builder = new BusinessRegistrationBuilder();
const actual = builder
    .nonce("3")
    .fee("100")
    .businessAsset("google","www.google.com")
    .sign("clay harbor enemy utility margin pretty hub comic piece aerobic umbrella acquire");
console.log(actual.build().toJson());
```

Next step is to implement transaction handlers that enforce blockchain protocol validation and verification steps.
