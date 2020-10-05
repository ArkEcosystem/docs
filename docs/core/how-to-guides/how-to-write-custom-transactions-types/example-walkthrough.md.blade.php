---
title: Running The Example
---

# Running The Example

This example dApp enables a new transaction type on the ARK Core blockchain. New transaction types follows existing blockchain protocol. You can fork or view full example code here:

<livewire:embed-link url="https://github.com/learn-ark/dapp-custom-transaction-example/" caption="Custom Transaction Example Source Code" />

## Example Goal:

**Storyline:**
To develop and register  a new business identity on the Core blockchain \(with custom fields like name and website\) we need to implement the supporting business logic in the form of a dApp enabling new transaction type called **BusinessRegistration**.

**TransactionType name**: BusinessRegistration

**Custom Fields**:

* name: string
* website: string \| uri

When a custom transactions is registered it is fully compatible with existing [API \(api/transactions/\)](/docs/api/public-rest-api/endpoints/transactions) endpoints.

The same logic was used to build our `core-magistrate` transactions. You can check the source code here:

* [core-magistrate-transactions](https://github.com/ArkEcosystem/core/tree/develop/packages/core-magistrate-transactions)
* [core-magistrate-crypto](https://github.com/ArkEcosystem/core/tree/develop/packages/core-magistrate-crypto)

<x-alert type="success">
One of the **best practices** we encountered was splitting of the custom transaction logic into two separate packages: **crypto** and **transactions**.

This makes it easier to include in light-client application, where only payload generation is needed \(the core-magistrate-crypto part\), and the core protocol validation still remains in the main package \(the core-magistrate-transaction package\) on the core node.
</x-alert>

## STEP 1: Load And Run The Custom Transactions dApp

We assume that you already have local development environment setup. If not head over here:

<livewire:page-reference path="/docs/core/how-to-guides/setting-up-your-development-environment/intro" />

After successful setup of local development environment we need to add the plugin handle/name to the corresponding files. We need to add the handle **"@arkecosystem/custom-transactions"** to the two files for each network configuration. The files are:

* **plugins.js** in `core/packages/core/bin/config/network-name/plugins.js`
* **app.js** in `core/packages/core/bin/config/network-name/app.js`

The How To Steps are explained in here:

<livewire:page-reference path="/docs/core/how-to-guides/how-to-write-custom-transactions-types/loading-the-dapp-within-core" />

## STEP 2: Setup Development Docker Database

Setup docker database config and run Postgres DB via Docker. Follow the steps from here: [Core Docker Setup](/docs/core/how-to-guides/setting-up-your-development-environment/docker)

## STEP 3: Start Local Testnet Blockchain

Start local blockchain with testnet running on your developer computer. Follow steps defined in here: [Spinning Up Your First Testnet](docs/core/how-to-guides/setting-up-your-development-environment/spinning-up-your-first-testnet#step-2-testnet-network-boot)

## STEP 4: Send New Custom Transaction To The Local Node

Send your new transaction type payload to the local blockchain node with the following `curl` command:


```bash
curl --request POST \
  --url http://127.0.0.1:4003/api/v2/transactions \
  --header 'content-type: application/json' \
  --data '      {
                "transactions":
                [
                        {
                                "version": 2,
                                "network": 23,
                                "typeGroup": 1001,
                                "type": 100,
                                "nonce": "3",
                                "senderPublicKey":
                                 "03287bfebba4c7881a0509717e71b34b63f31e40021c321f89ae04f84be6d6ac37",
                                "fee": "5000000000",
                                "amount": "0",
                                "asset":
                                        { "businessData": { "name": "google", "website": "www.google.com" } },
                                "signature":
                                 "809dac6e3077d6ae2083b353b6020badc37195c286079d466bb1d6670ed4e9628a5b5d0a621801e2763aae5add41905036ed8d21609ed9ddde9f941bd066833c",
                                "id":
                                 "b567325019edeef0ce5a1134af0b642a54ed2a8266a406e1a999f5d590eb5c3c" }
                ]
        }'
```


You should receive a response similar to this:


```javascript
{
    "data": {
        "accept": ["b567325019edeef0ce5a1134af0b642a54ed2a8266a406e1a999f5d590eb5c3c"],
        "broadcast": ["b567325019edeef0ce5a1134af0b642a54ed2a8266a406e1a999f5d590eb5c3c"],
        "excess": [],
        "invalid": []
    }
}
```

This means that transactions was accepted into the pool and broadcasted to the rest of the network. If you want to create more transaction payloads, just [use the BusinessTransactionBuilder to create and sign the payload data](https://github.com/learn-ark/dapp-custom-transaction-example/blob/master/__tests__/test.test.ts).
