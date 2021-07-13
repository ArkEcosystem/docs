---
title: Custom Transactions Guide - Defining the Structure
---

# Defining the Transaction Structure

We need to inherit (extend) base `Transaction` class to follow the GTI engine rules. The following steps are a walkthrough of how to develop a new Transaction structure class.

## **STEP 1: Define Your New Transaction Structure**

Your custom transaction fields must be defined inside the [BusinessRegistrationTransaction](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/transactions/BusinessRegistrationTransaction.ts) class. They follow the rules of the inherited Transaction class.

You can introduce any number of new fields and their respectful types. All new fields will be stored in the base transaction field called [transaction.assets](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/transactions/BusinessRegistrationTransaction.ts#L23). The source-code snippet below introduces custom fields with the help of an [IBusinessData](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/interfaces.ts#L1) interface.

```typescript
export interface IBusinessData {
    name: string;
    website: string;
}
```

The defined interface makes use of new custom transaction fields stricter and is part of the serde process.

<x-alert type="info">
Our Public API enables searching of transactions with new custom fields by design (no API changes needed)
</x-alert>

## STEP 2: Implementation Of The `serde` process

<x-alert type="info">
The use of the term **serde** throughout this document refers to the processes of **transaction** **serialization** and **deserialization**.
</x-alert>

We need to implement custom serde methods that will take care of the serde process for our newly introduced transaction fields. Abstract methods **serialize()** and **deserialize()** are defined by the base **Transaction** class, and are automatically called inside our custom class during the serde process.

The code snippet below is an excerpt example showing implementation of **serde** methods for a new **BusinessRegistration** transaction.

```typescript
export class BusinessRegistrationTransaction extends Transactions.Transaction {
    public serialize(): ByteBuffer {
        const { data } = this;

        const businessData = data.asset.businessData as IBusinessData;

        const nameBytes = Buffer.from(businessData.name, "utf8");
        const websiteBytes = Buffer.from(businessData.website, "utf8");

        const buffer = new ByteBuffer(nameBytes.length + websiteBytes.length + 2, true);

        buffer.writeUint8(nameBytes.length);
        buffer.append(nameBytes, "hex");

        buffer.writeUint8(websiteBytes.length);
        buffer.append(websiteBytes, "hex");

        return buffer;
    }

    public deserialize(buf: ByteBuffer): void {
        const { data } = this;
        const businessData = {} as IBusinessData;
        const nameLength = buf.readUint8();
        businessData.name = buf.readString(nameLength);

        const websiteLength = buf.readUint8();
        businessData.website = buf.readString(websiteLength);

        data.asset = {
            businessData,
        };
    }
}
```

## **STEP 3: Define Schema Validation For The New Transaction Fields**

Each custom transaction is accompanied by enforced schema validation. To achieve this we must extend base `TransactionSchema` and provide rules for the custom field validation. Schema is defined with **AJV** and we can access it by calling the [getSchema()](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/transactions/BusinessRegistrationTransaction.ts#L16)method inside your new transaction class, in our case the `BusinessRegistrationTransaction` class.

<x-alert type="danger">
When implementing new transaction types, **never allow plain strings** in the **transaction.asset,** but always restrict to something that excludes null bytes (\u0000).
</x-alert>

To forbid plain strings in the transaction.assets you can reuse some of already [defined schemas](https://github.com/ArkEcosystem/core/blob/master/packages/crypto/src/validation/schemas.ts), for example: `{ $ref: "hex" }` or `{ $ref: "alphanumeric" }` or `{ $ref: "publicKey" }`. If no schema fits your requirements refer to the null byte regex `{ type: "string", pattern: "^[^\u0000]+$"}` for the `transaction.asset` fields.

```typescript
public static getSchema(): Transactions.schemas.TransactionSchema {
    return schemas.extend(schemas.transactionBaseSchema, {
        $id: "businessData",
        required: ["asset", "typeGroup"],
        properties: {
            type: { transactionType: BUSINESS_REGISTRATION_TYPE },
            typeGroup: { const: 1001 },
            amount: { bignumber: { minimum: 0, maximum: 0 } },
            asset: {
                type: "object",
                required: ["businessData"],
                properties: {
                    businessData: {
                        type: "object",
                        required: ["name", "website"],
                        properties: {
                            name: {
                                $ref: "genericName",
                            },
                            website: {
                                $ref: "uri",
                            },
                        },
                    },
                },
            },
        },
    });
}
```

## **STEP 4: Define TypeGroup and Type**

The [typeGroup + type](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/src/transactions/BusinessRegistrationTransaction.ts#L7-L13) are used internally by Core to register a transaction. Non-core transactions have to define the typeGroup otherwise Core won’t be able to categorize them. **All transactions (from the release of core v2.6) will be signed with typeGroup and type.** By omitting the typeGroup value, core will fall back to typeGroup: 1, which is the default Core group. We define typeGroup + type in our BusinessRegistration class, like this:

```typescript
const BUSINESS_REGISTRATION_TYPE = 100;
const BUSINESS_REGISTRATION_TYPE_GROUP = 1001;

export class BusinessRegistrationTransaction extends Transactions.Transaction {
    public static typeGroup: number = BUSINESS_REGISTRATION_TYPE_GROUP;
    public static type: number = BUSINESS_REGISTRATION_TYPE;

    // ... other source-code
```
