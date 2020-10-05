---
title: Transactions
---

# Transactions

## Sign a transaction with a passphrase

### Method

```bash
transactions.sign
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the transaction. | Yes |
| params.transaction | object | The transaction to be signed. | Yes |
| params.passphrase | string | The passphrase used to sign the transaction. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.sign",
  "params": {
    "transaction": {
      "timestamp": 69019121,
      "version": 1,
      "type": 0,
      "fee": "10000000",
      "amount": "1",
      "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
      "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
      "expiration": 0
    },
    "passphrase": "this is a top secret passphrase",
    "network": "testnet"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "transaction": "30440220267925d3051b7fe5605d70c8ced74a0a04993a183ea4d99552cfeeba4a9301cf022018a76da1f5e4ad2b0bf94e4e52bbc192345dc2b6548a743d2e04aae22ad09fd6"
  }
}
```

## Sign a transaction with a second passphrase

### Method

```bash
transactions.secondSign
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the transaction. | Yes |
| params.transaction | object | The transaction to be signed. | Yes |
| params.passphrase | string | The passphrase used to second sign the transaction. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.secondSign",
  "params": {
    "transaction": {
      "timestamp": 69019143,
      "version": 1,
      "type": 0,
      "fee": "10000000",
      "amount": "1",
      "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
      "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
      "expiration": 0
    },
    "passphrase": "this is a top secret passphrase",
    "network": "testnet"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "transaction": "30440220151ece051b08aaaa579632e6738488adb98b7561ddeb2e474d865b54f7fe40020220060b475bd38290c80af4f7bc91e5da32206c28e2de1337a72b4d5ee9a9bd7e15"
  }
}
```

## Sign a transaction with multiple passphrases

### Method

```bash
transactions.multiSign
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the transaction. | Yes |
| params.transaction | object | The transaction to be signed. | Yes |
| params.passphrase | string | The passphrase used to multi sign the transaction. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.multiSign",
  "params": {
    "transaction": {
      "timestamp": 69019174,
      "version": 1,
      "type": 0,
      "fee": "10000000",
      "amount": "1",
      "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
      "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
      "expiration": 0
    },
    "passphrase": "this is a top secret passphrase",
    "network": "testnet"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "transaction": "00344de030c3822cf47e0cabaafdfad3c9fe6444c3847e71077498304a74f38ec62a1ad837e33cad4771ab55c63f8ed71013ecfdd8d35d499fbb0f7bd09856b543"
  }
}
```

## Serialize a transaction with AIP11

### Method

```bash
transactions.serialize
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the transaction. | Yes |
| params.transaction | object | The transaction to be serialized with AIP11. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.serialize",
  "params": {
    "transaction": {
      "id": "9e2d027afac076ae5dc085d4dd5ff0233c73549cdbc333d2d73013b0b0933574",
      "signature": "304402205f3aa9754abad3bfb693e6d2a012f406ef638d2b556f394ea9a240fdb827ba9d0220263bfbe1ce57026686f9b394652e5e8b0a5d8b6639b477eee3c31e98428fbf47",
      "timestamp": 69019210,
      "version": 1,
      "type": 0,
      "fee": "10000000",
      "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
      "amount": "1",
      "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
      "expiration": 0
    },
    "network": "testnet"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "transaction": "ff0117004a261d04034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192809698000000000000010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f553662304402205f3aa9754abad3bfb693e6d2a012f406ef638d2b556f394ea9a240fdb827ba9d0220263bfbe1ce57026686f9b394652e5e8b0a5d8b6639b477eee3c31e98428fbf47"
  }
}
```

## Deserialize a transaction with AIP11

### Method

```bash
transactions.deserialize
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the transaction. | Yes |
| params.transaction | string | The transaction to be deserialized with AIP11. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.deserialize",
  "params": {
    "transaction": "ff0117005b271d04034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192809698000000000000010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f55366230450221008a5e3c5c276fc5e10b72c47e971f735efd19fb90b597fb45cb3558f04de455ab02206f8554596ca1326edbabd18fc620881e548f72d3d3eadaadcb4cc6739e8c6329",
    "network": "testnet"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "transaction": {
      "version": 1,
      "network": 23,
      "type": 0,
      "timestamp": 69019483,
      "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
      "fee": "10000000",
      "amount": "1",
      "expiration": 0,
      "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
      "signature": "30450221008a5e3c5c276fc5e10b72c47e971f735efd19fb90b597fb45cb3558f04de455ab02206f8554596ca1326edbabd18fc620881e548f72d3d3eadaadcb4cc6739e8c6329"
    }
  }
}
```

## Verify a transaction

### Method

```bash
transactions.verify
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the transaction. | Yes |
| params.transaction | object | The transaction to be verified. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.verify",
  "params": {
    "transaction": {
      "id": "a93b48f448323760c1dec0edde058ecb3812a3bf64f37aa54047bea9086a8de1",
      "signature": "3045022100a4cd1f560b2dd11cbbdb40fa5cf2fe0337530df47dc0b98c83bf2b6120d7125f0220229c78d0e2b871f48d747e6228f18995a003ba33679fa5fe688d5d9f412cdcdf",
      "timestamp": 69019518,
      "version": 1,
      "type": 0,
      "fee": "10000000",
      "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
      "amount": "1",
      "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
      "expiration": 0
    },
    "network": "testnet"
  }
}
```

### Response

```javascript
{"id": "unique-request-id",
```

## Verify the hash of a transaction

### Method

```bash
transactions.verifyHash
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the transaction. | Yes |
| params.transaction | object | The transaction of which the hash will be verified. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.verifyHash",
  "params": {
    "transaction": {
      "id": "e61bc7e6fe98269092f49158a7150ef823d289b31bb0fcccdc1824608428be82",
      "signature": "3044022000d44d04bf26d1d15cf535f7c142e313ba65f4a2baf23d43441a1509dedf38c002200c41ee2d6a626aaec9ab492562d55207195f51ad7184341bd9b116c66ff0aba5",
      "timestamp": 69019546,
      "version": 1,
      "type": 0,
      "fee": "10000000",
      "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
      "amount": "1",
      "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
      "expiration": 0
    },
    "network": "testnet"
  }
}
```

### Response

```javascript
{"id": "unique-request-id",
```

## Verify the second signature of a transaction

### Method

```bash
transactions.verifySecondSignature
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the transaction. | Yes |
| params.transaction | object | The transaction of which the second signature will be verified. | Yes |
| params.publicKey | string | The public key of the wallet which signed the transaction. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "id": "unique-request-id",
  "method": "transactions.verifySecondSignature",
  "params": {
    "transaction": {
      "id": "175bb2a0424ca4251fa75021b68c8cf9c4fddd84edba13314e67a5a28184e6e7",
      "signature": "3045022100a4c1cc5e9f3e07ab5b8b15fbe8bf39eb9b74288417fe8feb72c6e8fd7ce90526022054dd40def161e21e0178b54bcbffdedbd17f1d10082e05ad439858612b0e9807",
      "secondSignature": "3045022100f0cb111d75e7b368417373790742e7ddd35617037158f2bde8331aade77db37002202fe752e0b670ff665ecdfb212d92b810b919940e24701fc4393ff1d00dc53c57",
      "timestamp": 69019580,
      "version": 1,
      "type": 0,
      "fee": "10000000",
      "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
      "amount": "1",
      "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
      "expiration": 0
    },
    "publicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "network": "testnet"
  }
}
```

### Response

```javascript
{"id": "unique-request-id",
```
