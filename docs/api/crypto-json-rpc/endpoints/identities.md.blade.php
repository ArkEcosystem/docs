---
title: Identities
---

# Identities

## Generate an address from a passphrase

### Method

```bash
identities.address.fromPassphrase
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the address to be retrieved. | Yes |
| params.passphrase | string | The passphrase of address to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.address.fromPassphrase",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "passphrase": "this is a top secret passphrase"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "address": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC"
  }
}
```

## Generate an address from a public key

### Method

```bash
identities.address.fromPublicKey
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the address to be retrieved. | Yes |
| params.publicKey | string | The public key of address to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.address.fromPublicKey",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "publicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "address": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC"
  }
}
```

## Generate an address from a private key

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the address to be retrieved. | Yes |
| params.privateKey | string | The private key of address to be retrieved. | Yes |

### Method

```bash
identities.address.fromPrivateKey
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the address to be retrieved. | Yes |
| params.passphrase | string | The passphrase of address to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.address.fromPrivateKey",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "privateKey": "d8839c2432bfd0a67ef10a804ba991eabba19f154a3d707917681d45822a5712"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "address": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC"
  }
}
```

## Generate an address from a multi signature asset

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the address to be retrieved. | Yes |
| params.passphrase | string | The passphrase of address to be retrieved. | Yes |

### Method

```bash
identities.address.fromMultiSignatureAsset
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the address to be retrieved. | Yes |
| params.multiSignatureAsset | string | The multi signature asset of address to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.address.fromMultiSignatureAsset",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "multiSignatureAsset": {
      "min": 3,
      "publicKeys": [
        "0205d9bbe71c343ac9a6a83a4344fd404c3534fc7349827097d0835d160bc2b896",
        "03df0a1eb42d99b5de395cead145ba1ec2ea837be308c7ce3a4e8018b7efc7fdb8",
        "03860d76b1df09659ac282cea3da5bd84fc45729f348a4a8e5f802186be72dc17f"
      ]
    }
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "address": "AH3Ca9QE9u9jKKTdUaLjAQqcqK4ZmSkVqp"
  }
}
```

## Generate a public key from a passphrase

### Method

```bash
identities.publicKey.fromPassphrase
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the public key to be retrieved. | Yes |
| params.passphrase | string | The passphrase of public key to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.publicKey.fromPassphrase",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "passphrase": "this is a top secret passphrase"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "publicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192"
  }
}
```

## Generate a public key from a multi signature asset

### Method

```bash
identities.publicKey.fromMultiSignatureAsset
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the public key to be retrieved. | Yes |
| params.multiSignatureAsset | string | The multi signature asset of public key to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.publicKey.fromMultiSignatureAsset",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "multiSignatureAsset": {
      "min": 3,
      "publicKeys": [
        "0205d9bbe71c343ac9a6a83a4344fd404c3534fc7349827097d0835d160bc2b896",
        "03df0a1eb42d99b5de395cead145ba1ec2ea837be308c7ce3a4e8018b7efc7fdb8",
        "03860d76b1df09659ac282cea3da5bd84fc45729f348a4a8e5f802186be72dc17f"
      ]
    }
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "publicKey": "022952bc0ab373a15153b8b6cee2513e298eb7f3ffe6bc50fc850fd24e8ab6c66a"
  }
}
```

## Generate a public key from a WIF

### Method

```bash
identities.publicKey.fromWIF
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the public key to be retrieved. | Yes |
| params.wif | string | The WIF of public key to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.publicKey.fromWIF",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "wif": "Ue7A6vSx7ewATPp2dA6UbJ8F39DbZwaHTqhD1MrhzmJqRJmvfZ6C"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "publicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192"
  }
}
```

## Generate a private key from a passphrase

### Method

```bash
identities.privateKey.fromPassphrase
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the private key to be retrieved. | Yes |
| params.passphrase | string | The passphrase of private key to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.privateKey.fromPassphrase",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "passphrase": "this is a top secret passphrase"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "privateKey": "d8839c2432bfd0a67ef10a804ba991eabba19f154a3d707917681d45822a5712"
  }
}
```

## Generate a private key from a WIF

### Method

```bash
identities.privateKey.fromWIF
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the private key to be retrieved. | Yes |
| params.wif | string | The WIF of private key to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.privateKey.fromWIF",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "wif": "Ue7A6vSx7ewATPp2dA6UbJ8F39DbZwaHTqhD1MrhzmJqRJmvfZ6C"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "privateKey": "d8839c2432bfd0a67ef10a804ba991eabba19f154a3d707917681d45822a5712"
  }
}
```

## Generate a WIF from a passphrase

### Method

```bash
identities.wif.fromPassphrase
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| jsonrpc | string | The protocol version. | Yes |
| id | string | The identifier of the request. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.network | string | The network of the WIF to be retrieved. | Yes |
| params.passphrase | string | The passphrase of WIF to be retrieved. | Yes |

### Request

```javascript
{
  "jsonrpc": "2.0",
  "method": "identities.wif.fromPassphrase",
  "id": "unique-request-id",
  "params": {
    "network": "testnet",
    "passphrase": "this is a top secret passphrase"
  }
}
```

### Response

```javascript
{
  "id": "unique-request-id",
  "jsonrpc": "2.0",
  "result": {
    "wif": "Ue7A6vSx7ewATPp2dA6UbJ8F39DbZwaHTqhD1MrhzmJqRJmvfZ6C"
  }
}
```
