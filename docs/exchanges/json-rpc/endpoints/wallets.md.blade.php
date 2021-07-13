---
title: Wallets
---

# Wallets

## Get a Wallet

### Method

```bash
wallets.info
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.address | string | The address of the wallet to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "wallets.info",
  "params": {
    "address": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "address": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo",
    "publicKey": "03287bfebba4c7881a0509717e71b34b63f31e40021c321f89ae04f84be6d6ac37",
    "secondPublicKey": null,
    "balance": 245100000000000,
    "isDelegate": true
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

## Get a Wallets Transactions

### Method

```bash
wallets.transactions
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.address | string | The address of the transactions to be retrieved. | Yes |
| params.offset | int | The offset of transactions to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "wallets.transactions",
  "params": {
    "address": "ANBkoGqWeTSiaEVgVzSKZd3jS7UWzv9PSo"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "count": 153,
    "data": [
      {
        "id": "db1aa687737858cc9199bfa336f9b1c035915c30aaee60b1e0f8afadfdb946bd",
        "blockId": "17184958558311101492",
        "type": 0,
        "amount": 245098000000000,
        "fee": 0,
        "sender": "APnhwwyTbMiykJwYbGhYjNgtHiVJDSEhSn",
        "recipient": "AHXtmB84sTZ9Zd35h9Y1vfFvPE2Xzqj8ri",
        "signature": "304402205fcb0677e06bde7aac3dc776665615f4b93ef8c3ed0fddecef9900e74fcb00f302206958a0c9868ea1b1f3d151bdfa92da1ce24de0b1fcd91933e64fb7971e92f48d",
        "confirmations": 3,
        "timestamp": {
          "epoch": 0,
          "unix": 1490101200,
          "human": "2017-03-21T13:00:00Z"
        }
      }
    ]
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

## Create a Wallet

### Method

```bash
wallets.create
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.passphrase | string | The passphrase of the wallet to be created. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "wallets.create",
  "params": {
    "passphrase": "this is a top secret passphrase"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "publicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "address": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC"
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

## Get a BIP38 Wallet

### Method

```bash
wallets.bip38.info
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.userId | string | The identifier of the wallet to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "wallets.bip38.info",
  "params": {
    "userId": "123"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "wif": "6PYTWME2aAJTx2NcRyS33zYrS79Hk7KiNbHZmGQWUYJYKWGZn4N36AdUMf"
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

## Create a BIP38 Wallet

### Method

```bash
wallets.bip38.create
```

### Body Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.bip38 | string | The bip38 of the wallet to be retrieved. | Yes |
| params.userId | string | The identifier of the wallet to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "wallets.bip38.create",
  "params": {
    "userId": "123",
    "bip38": "this is a top secret passphrase"
  }
}
```

### Response

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "result": {
    "publicKey": "022cf1c9de60c22c0b5a138b6545777cb2edaf82fe3906faa345580352000f84b6",
    "address": "AL4z4quXFVPR4ybDHeJ67HfSEmFrguQ6e5",
    "wif": "6PYTWME2aAJTx2NcRyS33zYrS79Hk7KiNbHZmGQWUYJYKWGZn4N36AdUMf"
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
