---
title: Transaction Types - Transfer
---

# Transfer

The transfer transaction enables a user to broadcast a transaction to the network sending ARK tokens from one ARK wallet to another. This transaction type provides the utility of store-of-value and value transfer. It also contains a special data field of 255 bytes called the vendor field, allowing raw data, code or plain text to be stored on the blockchain. The vendor field is public and immutable, and is also utilized in ARK SmartBridge Technology.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/core/blob/aef8a3848fdc91aa6f44248dd37643e0fe7926e7/packages/crypto/src/transactions/types/schemas.ts#L17-L45) \| [Transfer](https://github.com/ArkEcosystem/core/blob/master/packages/crypto/src/transactions/types/schemas.ts#L59) |

## Schnorr \(v2 Transaction Default\)

### Schnorr Transaction Structure

```javascript
{
    "version": 2,
    "network": 23,
    "typeGroup": 1,
    "type": 0,
    "nonce": "0",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "10000000",
    "amount": "1",
    "expiration": 0,
    "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
    "signature": "e686282d4dd4603a082c90f78450eac0da05597c5ac054aa013f2fb224488e92a1e1b56237bf5ed6ec1319ab83a6e00ebf637ca90d846e4cb5d0e3502f6165de",
    "id": "b67281ac2fe44aa3be9787b5eac16aceec0d2741a68bff9af7eda09078479d8f"
}
```

#### Serialized Payload

```shell
ff02170100000000000000000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192809698000000000000010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f553662e686282d4dd4603a082c90f78450eac0da05597c5ac054aa013f2fb224488e92a1e1b56237bf5ed6ec1319ab83a6e00ebf637ca90d846e4cb5d0e3502f6165de
```

#### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0000` |
| **Nonce:** | **\[9\]** | **8** | `0x0100000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Amount:** | **\[59\]** | **8** | `0x0100000000000000` |
| **Expiration:** | **\[67\]** | **4** | `0x00000000` |
| **RecipientId:** | **\[71\]** | **21** | `0x170995750207ecaf0ccf251c1265b92ad84f553662` |
| **Signature:** | **\[92\]** | **64** | `0x686282d4dd4603a082c90f78450eac0da05597c5ac054aa013f2fb224488e92a1e1b56237bf5ed6ec1319ab83a6e00ebf637ca90d846e4cb5d0e3502f6165de` |

### Schnorr Transaction Structure with Second Signature

```javascript
{
    "version": 2,
    "network": 23,
    "typeGroup": 1,
    "type": 0,
    "nonce": "0",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "10000000",
    "amount": "1",
    "expiration": 0,
    "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
    "signature": "e686282d4dd4603a082c90f78450eac0da05597c5ac054aa013f2fb224488e92a1e1b56237bf5ed6ec1319ab83a6e00ebf637ca90d846e4cb5d0e3502f6165de",
    "secondSignature": "492a92d0b740da1b652f83ced82cda75ac9aad19a1d3a693165d7b775e083b2a9d4598d645ebd26fbf63526d9a610f77469217e4a76743060d438b7bbaa96ba3",
    "id": "105212031b5791ab7443cb2642dd3684c98ec6d549f709b7a1b8840a160f4d85"
}
```

#### Serialized Payload

```shell
ff02170100000000000000000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192809698000000000000010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f553662e686282d4dd4603a082c90f78450eac0da05597c5ac054aa013f2fb224488e92a1e1b56237bf5ed6ec1319ab83a6e00ebf637ca90d846e4cb5d0e3502f6165de492a92d0b740da1b652f83ced82cda75ac9aad19a1d3a693165d7b775e083b2a9d4598d645ebd26fbf63526d9a610f77469217e4a76743060d438b7bbaa96ba3
```

#### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0000` |
| **Nonce:** | **\[9\]** | **8** | `0x0100000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Amount:** | **\[59\]** | **8** | `0x0100000000000000` |
| **Expiration:** | **\[67\]** | **4** | `0x00000000` |
| **RecipientId:** | **\[71\]** | **21** | `0x170995750207ecaf0ccf251c1265b92ad84f553662` |
| **Signature:** | **\[92\]** | **64** | `0xe686282d4dd4603a082c90f78450eac0da05597c5ac054aa013f2fb224488e92a1e1b56237bf5ed6ec1319ab83a6e00ebf637ca90d846e4cb5d0e3502f6165de` |
| **Second Signature:** | **\[156\]** | **64** | `0x492a92d0b740da1b652f83ced82cda75ac9aad19a1d3a693165d7b775e083b2a9d4598d645ebd26fbf63526d9a610f77469217e4a76743060d438b7bbaa96ba3` |

### Schnorr Transaction Structure with VendorField

```javascript
{
    "version": 2,
    "network": 23,
    "typeGroup": 1,
    "type": 0,
    "nonce": "0",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "10000000",
    "amount": "1",
    "vendorFieldHex": "48656c6c6f20576f726c64",
    "vendorField": "Hello World",
    "expiration": 0,
    "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
    "signature": "2f325a0f08f02e764ff181f7f4539c84eb9a4ca610c67fbc909f9221aa5fd20f4230b6f64284fb0d46309fe9d32ac051d47f6fbd3df51e411ddefb83021620bc",
    "id": "bf3fd3a7f678e4db2d2d83ca3c9c7dbdf64a1b8d6e2326dda6f703801e4c31ed"
}
```

#### Serialized Payload

```shell
ff02170100000000000000000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed19280969800000000000b48656c6c6f20576f726c64010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f5536622f325a0f08f02e764ff181f7f4539c84eb9a4ca610c67fbc909f9221aa5fd20f4230b6f64284fb0d46309fe9d32ac051d47f6fbd3df51e411ddefb83021620bc
```

#### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0000` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x0b` |
| **VendorField:** | **\[59\]** | **19** | `0x48656c6c6f20576f726c64` |
| **Amount:** | **\[78\]** | **8** | `0x0100000000000000` |
| **Expiration:** | **\[86\]** | **4** | `0x00000000` |
| **RecipientId:** | **\[90\]** | **21** | `0x170995750207ecaf0ccf251c1265b92ad84f553662` |
| **Signature:** | **\[111\]** | **64** | `0x2f325a0f08f02e764ff181f7f4539c84eb9a4ca610c67fbc909f9221aa5fd20f4230b6f64284fb0d46309fe9d32ac051d47f6fbd3df51e411ddefb83021620bc` |

### Schnorr Transaction Structure with Second Signature and VendorField

```javascript
{
    "version": 2,
    "network": 23,
    "typeGroup": 1,
    "type": 0,
    "nonce": "0",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "10000000",
    "amount": "1",
    "vendorFieldHex": "48656c6c6f20576f726c64",
    "vendorField": "Hello World",
    "expiration": 0,
    "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
    "signature": "2f325a0f08f02e764ff181f7f4539c84eb9a4ca610c67fbc909f9221aa5fd20f4230b6f64284fb0d46309fe9d32ac051d47f6fbd3df51e411ddefb83021620bc",
    "secondSignature": "85414319fd7d5f738a81f514a63efa2a881e08d885cb6317ab83d70cb80ce0f0f2e11945c2eaa1327237c2c7fb40d5a3c8a78529c7b8791fd9865e4ee69ac537",
    "id": "d2da9a037f7692ea70805c071d495059d29591417f655b01e48ed206f7acf8e9"
}
```

#### Serialized Payload

```shell
ff02170100000000000000000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed19280969800000000000b48656c6c6f20576f726c64010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f5536622f325a0f08f02e764ff181f7f4539c84eb9a4ca610c67fbc909f9221aa5fd20f4230b6f64284fb0d46309fe9d32ac051d47f6fbd3df51e411ddefb83021620bc85414319fd7d5f738a81f514a63efa2a881e08d885cb6317ab83d70cb80ce0f0f2e11945c2eaa1327237c2c7fb40d5a3c8a78529c7b8791fd9865e4ee69ac537
```

#### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0000` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x0b` |
| **VendorField:** | **\[59\]** | **19** | `0x48656c6c6f20576f726c64` |
| **Amount:** | **\[78\]** | **8** | `0x0100000000000000` |
| **Expiration:** | **\[86\]** | **4** | `0x00000000` |
| **RecipientId:** | **\[90\]** | **21** | `0x170995750207ecaf0ccf251c1265b92ad84f553662` |
| **Signature:** | **\[111\]** | **64** | `0x2f325a0f08f02e764ff181f7f4539c84eb9a4ca610c67fbc909f9221aa5fd20f4230b6f64284fb0d46309fe9d32ac051d47f6fbd3df51e411ddefb83021620bc` |
| **Signature:** | **\[175\]** | **64** | `0x85414319fd7d5f738a81f514a63efa2a881e08d885cb6317ab83d70cb80ce0f0f2e11945c2eaa1327237c2c7fb40d5a3c8a78529c7b8791fd9865e4ee69ac53711` |

## Ecdsa

### Ecdsa Transaction Structure

```javascript
{
    "version": 2,
    "network": 23,
    "typeGroup": 1,
    "type": 0,
    "nonce": "0",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "10000000",
    "amount": "1",
    "expiration": 0,
    "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
    "signature": "304402200570f30cc7436fc9ff63e1531773b1624db31d0869858811a8c4a8aa4edc787e02200a9949bbbff31022af031e2c612068b495024629d40cd6c6c7b34f2004dde5a1",
    "id": "279a025498ad683b4671cb3650b28cbb0d56dbad0638cd941d8cd5c6b4e4dd12"
}
```

#### Serialized Payload

```shell
ff02170100000000000000000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192809698000000000000010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f553662304402200570f30cc7436fc9ff63e1531773b1624db31d0869858811a8c4a8aa4edc787e02200a9949bbbff31022af031e2c612068b495024629d40cd6c6c7b34f2004dde5a1
```

#### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0000` |
| **Nonce:** | **\[9\]** | **8** | `0x0000000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Amount:** | **\[59\]** | **8** | `0x0100000000000000` |
| **Expiration:** | **\[67\]** | **4** | `0x00000000` |
| **RecipientId:** | **\[71\]** | **21** | `0x170995750207ecaf0ccf251c1265b92ad84f553662` |
| **Signature:** | **\[92\]** | **70** | `0x304402200570f30cc7436fc9ff63e1531773b1624db31d0869858811a8c4a8aa4edc787e02200a9949bbbff31022af031e2c612068b495024629d40cd6c6c7b34f2004dde5a1` |

### Ecdsa Transaction Structure with Second Signature

```javascript
{
    "version": 2,
    "network": 23,
    "typeGroup": 1,
    "type": 0,
    "nonce": "0",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "10000000",
    "amount": "1",
    "expiration": 0,
    "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
    "signature": "304402200570f30cc7436fc9ff63e1531773b1624db31d0869858811a8c4a8aa4edc787e02200a9949bbbff31022af031e2c612068b495024629d40cd6c6c7b34f2004dde5a1",
    "secondSignature": "304402204c0a6545fcae59afdcb4b68f50387cff513e90a58d1227c7f77ab12312470d2f02203adf470d33e46f1aff5a0ddb42e126055dc9449f85bb4a8d9f7bb1627394b69e",
    "id": "a4aa90632d0aaeedb7d1e272be2d1e7605791165c5252d474646d6e0146f3845"
}
```

#### Serialized Payload

```shell
ff02170100000000000000000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192809698000000000000010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f553662304402200570f30cc7436fc9ff63e1531773b1624db31d0869858811a8c4a8aa4edc787e02200a9949bbbff31022af031e2c612068b495024629d40cd6c6c7b34f2004dde5a1304402204c0a6545fcae59afdcb4b68f50387cff513e90a58d1227c7f77ab12312470d2f02203adf470d33e46f1aff5a0ddb42e126055dc9449f85bb4a8d9f7bb1627394b69e
```

#### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0000` |
| **Nonce:** | **\[9\]** | **8** | `0x0000000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Amount:** | **\[59\]** | **8** | `0x0100000000000000` |
| **Expiration:** | **\[67\]** | **4** | `0x00000000` |
| **RecipientId:** | **\[71\]** | **21** | `0x170995750207ecaf0ccf251c1265b92ad84f553662` |
| **Signature:** | **\[92\]** | **70** | `0x304402200570f30cc7436fc9ff63e1531773b1624db31d0869858811a8c4a8aa4edc787e02200a9949bbbff31022af031e2c612068b495024629d40cd6c6c7b34f2004dde5a1` |
| **Second Signature:** | **\[162\]** | **70** | `0x304402204c0a6545fcae59afdcb4b68f50387cff513e90a58d1227c7f77ab12312470d2f02203adf470d33e46f1aff5a0ddb42e126055dc9449f85bb4a8d9f7bb1627394b69e` |

### Ecdsa Transaction Structure With VendorField

```javascript
{
    "version": 2,
    "network": 23,
    "typeGroup": 1,
    "type": 0,
    "nonce": "0",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "10000000",
    "amount": "1",
    "vendorFieldHex": "48656c6c6f20576f726c64",
    "vendorField": "Hello World",
    "expiration": 0,
    "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
    "signature": "304402201ad3dd5a5e05ca81973c32473d244932b0f10b47f3db9539b414f5d35c8c97ef02206193066ce28b590bbeca94505e72194b86a45cde83045a50942e8ca9af90c128",
    "id": "62633aa0c51f8dc28be93390d1015c02f470ed2e2a5bb75f0477ee3ffbb9fd2e"
}
```

#### Serialized Payload

```shell
ff02170100000000000000000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed19280969800000000000b48656c6c6f20576f726c64010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f553662304402201ad3dd5a5e05ca81973c32473d244932b0f10b47f3db9539b414f5d35c8c97ef02206193066ce28b590bbeca94505e72194b86a45cde83045a50942e8ca9af90c128
```

#### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0000` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x0b` |
| **VendorField:** | **\[59\]** | **19** | `0x48656c6c6f20576f726c64` |
| **Amount:** | **\[78\]** | **8** | `0x0100000000000000` |
| **Expiration:** | **\[86\]** | **4** | `0x00000000` |
| **RecipientId:** | **\[90\]** | **21** | `0x170995750207ecaf0ccf251c1265b92ad84f553662` |
| **Signature:** | **\[111\]** | **70** | `0x304402201ad3dd5a5e05ca81973c32473d244932b0f10b47f3db9539b414f5d35c8c97ef02206193066ce28b590bbeca94505e72194b86a45cde83045a50942e8ca9af90c128` |

### Ecdsa Transaction Structure With Second Signature and VendorField

```javascript
{
    "version": 2,
    "network": 23,
    "typeGroup": 1,
    "type": 0,
    "nonce": "0",
    "senderPublicKey": "034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192",
    "fee": "10000000",
    "amount": "1",
    "vendorFieldHex": "48656c6c6f20576f726c64",
    "vendorField": "Hello World",
    "expiration": 0,
    "recipientId": "AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC",
    "signature": "304402201ad3dd5a5e05ca81973c32473d244932b0f10b47f3db9539b414f5d35c8c97ef02206193066ce28b590bbeca94505e72194b86a45cde83045a50942e8ca9af90c128",
    "secondSignature": "304402206ac723312f100d2712326ea33f929184b64d5da0fcb7f7f4cb594726b2488bd8022046995d2d3fcfcf681f6f95126897858ad367626dc46c4d56afcac7268f16e3df",
    "id": "668593985ec0b65f1f01d87b860ee99f6eaeb3a1f98d6bec17610a5940e29656"
}
```

#### Serialized Payload

```shell
ff02170100000000000000000000000000034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed19280969800000000000b48656c6c6f20576f726c64010000000000000000000000170995750207ecaf0ccf251c1265b92ad84f553662304402201ad3dd5a5e05ca81973c32473d244932b0f10b47f3db9539b414f5d35c8c97ef02206193066ce28b590bbeca94505e72194b86a45cde83045a50942e8ca9af90c128304402206ac723312f100d2712326ea33f929184b64d5da0fcb7f7f4cb594726b2488bd8022046995d2d3fcfcf681f6f95126897858ad367626dc46c4d56afcac7268f16e3df
```

#### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0000` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x0b` |
| **VendorField:** | **\[59\]** | **19** | `0x48656c6c6f20576f726c64` |
| **Amount:** | **\[78\]** | **8** | `0x0100000000000000` |
| **Expiration:** | **\[86\]** | **4** | `0x00000000` |
| **RecipientId:** | **\[90\]** | **21** | `0x170995750207ecaf0ccf251c1265b92ad84f553662` |
| **Signature:** | **\[111\]** | **70** | `0x304402201ad3dd5a5e05ca81973c32473d244932b0f10b47f3db9539b414f5d35c8c97ef02206193066ce28b590bbeca94505e72194b86a45cde83045a50942e8ca9af90c128` |
| **Second Signature:** | **\[181\]** | **70** | `0x304402206ac723312f100d2712326ea33f929184b64d5da0fcb7f7f4cb594726b2488bd8022046995d2d3fcfcf681f6f95126897858ad367626dc46c4d56afcac7268f16e3df` |
