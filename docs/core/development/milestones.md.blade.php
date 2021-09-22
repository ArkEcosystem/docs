---
title: Development - Implementing Milestones
---

# Implementing Milestones

Milestones are objects that dictate how ARK Core behaves after certain heights are reached. Lets have a look at the mainnet milestones to understand this better.

```javascript
[
    {
        "height": 1,
        "reward": 0,
        "activeDelegates": 51,
        "blocktime": 8,
        "block": {
            "version": 0,
            "maxTransactions": 50,
            "maxPayload": 2097152,
            "acceptExpiredTransactionTimestamps": true
        },
        "epoch": "2017-03-21T13:00:00.000Z",
        "fees": {
            "staticFees": {
                "transfer": 10000000,
                "secondSignature": 500000000,
                "delegateRegistration": 2500000000,
                "vote": 100000000,
                "multiSignature": 500000000,
                "ipfs": 500000000,
                "multiPayment": 10000000,
                "delegateResignation": 2500000000,
                "htlcLock": 10000000,
                "htlcClaim": 0,
                "htlcRefund": 0
            }
        },
        "vendorFieldLength": 64
    },
    {
        "height": 75600,
        "reward": 200000000
    },
    {
        "height": 6600000,
        "block": {
            "maxTransactions": 150,
            "maxPayload": 6300000
        }
    },
    {
        "height": 8128000,
        "vendorFieldLength": 255
    },
    {
        "height": 8204000,
        "block": {
            "idFullSha256": true
        }
    }
]
```

The first milestone starts at height 1, which is the genesis block which gets generated when you create a new network configuration.

```javascript
{
    "height": 1,
    "reward": 0, // Each forged block yields 0 rewards for the forger
    "activeDelegates": 51, // 51 delegates can forge at any given time
    "blocktime": 8, // Time in which a block is expected to be forged
    "block": {
        "version": 0,
        "maxTransactions": 50, // Maximum of transactions allowed to be forged per block
        "maxPayload": 2097152, // Maximum size of a block in bytes
        "acceptExpiredTransactionTimestamps": true
    },
    "epoch": "2017-03-21T13:00:00.000Z", // Start time of the network
    "fees": {
        "staticFees": {
            "transfer": 10000000, // Fee for type 0
            "secondSignature": 500000000, // Fee for type 1
            "delegateRegistration": 2500000000, // Fee for type 2
            "vote": 100000000, // Fee for type 3
            "multiSignature": 500000000, // Fee for type 4
            "ipfs": 500000000, // Fee for type 5
            "multiPayment": 10000000, // Fee for type 6
            "delegateResignation": 2500000000, // Fee for type 7
            "htlcLock": 10000000, // Fee for type 8
            "htlcClaim": 0, // Fee for type 9
            "htlcRefund": 0 // Fee for type 10
        }
    },
    "vendorFieldLength": 64 // Maximum length of the vendor field for type 0 transactions
}
```

This first milestone serves as the base for all future milestones. Lets take a look at what below milestones do.

```javascript
[
    {
        // From height 75600 onwards we will reward 2 ARK for every forged block
        "height": 75600,
        "reward": 200000000
    },
    {
        // From height 6600000 onwards we will allow 150 transactions
        // to be forged per block with a maximum size of 6300000 bytes
        "height": 6600000,
        "block": {
            "maxTransactions": 150,
            "maxPayload": 6300000
        }
    },
    {
        // From height 8128000 onwards we will allow the vendor field
        // for type 0 transactions to be 255 characters long
        "height": 8128000,
        "vendorFieldLength": 255
    },
    {
        // From height 8204000 onwards we will require that
        // all block IDs are SHA256 strings instead of numerical IDs
        "height": 8204000,
        "block": {
            "idFullSha256": true
        }
    }
]
```

> Each future milestone will be merged with its predecessors to ensure all values necessary are present.

## Working With Milestones

Sometimes you might have the need to get a milestone for a specific height or need all of them to perform some statistical calculations. The `@arkecosystem/crypto` package makes this easy through its configuration manager that manages the state of the configuration and related milestones.

### Getting All Milestones

```typescript
import { Managers } from "@arkecosystem/config";

const milestones: object[] = Managers.configManagers.getMilestones();
```

### Getting The Milestone For A Given Height

```typescript
import { Managers } from "@arkecosystem/config";

const milestone: object = Managers.configManagers.getMilestone(75600);
```

### Determining If A Given Height Is A Milestone

```typescript
import { Managers } from "@arkecosystem/config";

const isNewMilestone: boolean = Managers.configManagers.isNewMilestone(75600);
```
