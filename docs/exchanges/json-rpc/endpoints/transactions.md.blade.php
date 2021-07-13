---
title: Transactions
---

# Transactions

## Get a Transaction

### Method

```bash
transaction.info
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.id | string | The identifier of the transaction to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.info",
  "params": {
    "id": "49a4cc2b931e75da4676c5b06649543d3ea30f1097e944549e2ab3d67bc91e6a"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "id": "49a4cc2b931e75da4676c5b06649543d3ea30f1097e944549e2ab3d67bc91e6a",
    "blockId": "1957735382338577043",
    "type": 0,
    "amount": 1000000000,
    "fee": 10000000,
    "sender": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo",
    "recipient": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo",
    "signature": "304502210084484fc57bd1c0af1e6bf2fc79e1d5c210b29d7651e3482cc764d2160bbd887a0220776362194a30f4c04365061344dd4b4ac2cc6f5efc479afcda07d26be9621e04",
    "confirmations": 1,
    "timestamp": {
      "epoch": 50271515,
      "unix": 1540372715,
      "human": "2018-10-24T09:18:35Z"
    }
  }
}
```

### Error Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "error": {
    "code": "unique-error-code",
    "message": "descriptive-error-message",
    "data": "detailed-error-information"
  }
}
```

## Broadcast Transactions

> In order to broadcast transactions via the JSON-RPC they also need to be created through it. If you are looking to just broadcast any transactions you should take a look at [Transactions](/docs/api/public-rest-api/endpoints/transactions) for the public API.

### Method

```bash
transactions.broadcast
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.transactions | array | The list of transactions to be broadcast. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.broadcast",
  "params": {
    "id": "49a4cc2b931e75da4676c5b06649543d3ea30f1097e944549e2ab3d67bc91e6a"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "id": "49a4cc2b931e75da4676c5b06649543d3ea30f1097e944549e2ab3d67bc91e6a",
    "signature": "304502210084484fc57bd1c0af1e6bf2fc79e1d5c210b29d7651e3482cc764d2160bbd887a0220776362194a30f4c04365061344dd4b4ac2cc6f5efc479afcda07d26be9621e04",
    "timestamp": 50271515,
    "type": 0,
    "fee": 10000000,
    "senderPublicKey": "03287bfebba4c7881a0509717e71b34b63f31e40021c321f89ae04f84be6d6ac37",
    "amount": 1000000000,
    "recipientId": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo"
  }
}
```

### Error Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "error": {
    "code": "unique-error-code",
    "message": "descriptive-error-message",
    "data": "detailed-error-information"
  }
}
```

## Create a Transaction

### Method

```bash
transactions.create
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.recipientId | string | The address of the recipient. | Yes |
| params.amount | string | The amount to be send. | Yes |
| params.passphrase | string | The passphrase of the sender. | Yes |
| params.vendorField | string | Optional field with custom content. | No |
| params.fee | string | Transaction Fee. If not set the average fee is read from the network. | No |

<x-alert type="info">
Parameter **params.fee** is optional. If the parameter is not set, transaction is created by using the current public network average fee.
</x-alert>

<x-alert type="danger">
Make sure to check the network [for average fee values](/docs/api/public-rest-api/endpoints/node#retrieve-the-fee-statistics), before signing and sending a transaction. This is to handle edge case of them being higher than the current static ones.
</x-alert>

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.create",
  "params": {
    "passphrase": "this is a top secret passphrase",
    "amount": 1000000000,
    "recipientId": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "id": "58f4f8ed866d2c6a42fc2b48d49fc5c949af6768b55d307376aaac61f930d8b6",
    "signature": "304402201ace9afcaf9d0ec64a31fd98c589767c76b5360d5b22dfe3cde2dfffdfef61dc022026d276a6140e6abbd80775541479cc71cf52590895bd24c0c577a9c57ecae581",
    "timestamp": 50686854,
    "type": 0,
    "fee": 10000000,
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "amount": 1000000000,
    "recipientId": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo"
  }
}
```

### Error Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "error": {
    "code": "unique-error-code",
    "message": "descriptive-error-message",
    "data": "detailed-error-information"
  }
}
```

## Create a Transaction from a BIP38

### Method

```bash
transactions.list
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.recipientId | string | The address of the recipient. | Yes |
| params.amount | string | The amount to be send. | Yes |
| params.bip38 | string | The bip38 of the sender. | Yes |
| params.userId | string | The identifier of the sender. | Yes |
| params.vendorField | string | Optional field with custom content. | No |
| params.fee | string | Transaction Fee. If not set the average fee is read from the network. | No |

<x-alert type="info">
Parameter **params.fee** is optional. If the parameter is not set, transaction is created by using the current public network average fee.
</x-alert>

<x-alert type="danger">
Make sure to check the network [for average fee values](/docs/api/public-rest-api/endpoints/node#retrieve-the-fee-statistics), before signing and sending a transaction. This is to handle edge case of them being higher than the current static ones.
</x-alert>

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.bip38.create",
  "params": {
    "bip38": "this is a top secret passphrase",
    "userId": "123",
    "amount": 1000000000,
    "recipientId": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "id": "729d8f1974bd1eb517619fe9a4c45c3e769f49bbe1b682237ef3f049038c5421",
    "signature": "304402207a4877d3515b2dc3c2d8bc337b767cea62718e80d4b9ba02d8f2f873c82e2987022067951e8aa731fed8223b650419c29ef7e71460807920604ea23d3c2872328217",
    "timestamp": 50686826,
    "type": 0,
    "fee": 10000000,
    "senderPublicKey": "022cf1c9de60c22c0b5a138b6545777cb2edaf82fe3906faa345580352000f84b6",
    "amount": 1000000000,
    "recipientId": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo"
  }
}
```

### Error Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "error": {
    "code": "unique-error-code",
    "message": "descriptive-error-message",
    "data": "detailed-error-information"
  }
}
```
