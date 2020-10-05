---
title: Second Signature Registration Transaction Specifications
---

# Second Signature Registration

This transaction type enables a user to add an extra layer of security to their address by creating a second passphrase, using mnemonic code for generating deterministic keys via BIP-39 to produce an additional 12 words. Once a second signature has been registered to a wallet, the owner of the wallet will then be required to input their primary and secondary passphrase when sending a transaction to the network.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/core/blob/master/packages/crypto/src/transactions/types/schemas.ts#L16) \| [Second Signature](https://github.com/ArkEcosystem/core/blob/master/packages/crypto/src/transactions/types/schemas.ts#L59) |

## Transaction Structure

### Signed JSON Payload

```javascript
{
    "version": 2,
    "network": 23,
    "type": 1,
    "nonce": "2",
    "senderPublicKey": "02e0c063777427ac196af3c426fd648231ebc4ea06fff5edb1652b98f9c8420c69",
    "fee": "500000000",
    "amount": "0",
    "asset": {
        "signature": {
            "publicKey": "02877e4f35c76abaeb152b128670db0a7ae10b3999afcd28a42938b653fbf87ae9"
        }
    },
    "signature": "adb983dd28827860f69c6a98b2f9db88a9e084cc7fe3a691463377c3225b02fee24547b516d1cf05f2f77b65a9c36069f6540605c01694008e2a5cb4fc88f62f",
    "id": "4c2cd8c4281a34a60505f260d067e5c678d3c57510bfbcda24c5e0da5f46bd5e"
}
```

### Serialized Payload

```
ff0217010000000100020000000000000002e0c063777427ac196af3c426fd648231ebc4ea06fff5edb1652b98f9c8420c690065cd1d000000000002877e4f35c76abaeb152b128670db0a7ae10b3999afcd28a42938b653fbf87ae9adb983dd28827860f69c6a98b2f9db88a9e084cc7fe3a691463377c3225b02fee24547b516d1cf05f2f77b65a9c36069f6540605c01694008e2a5cb4fc88f62f
```

### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0100` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x02e0c063777427ac196af3c426fd648231ebc4ea06fff5edb1652b98f9c8420c69` |
| **Fee:** | **\[50\]** | **8** | `0x0065cd1d00000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Second PublicKey:** | **\[59\]** | **8** | `0x02877e4f35c76abaeb152b128670db0a7ae10b3999afcd28a42938b653fbf87ae9` |
| **Signature:** | **\[67\]** | **64** | `0xadb983dd28827860f69c6a98b2f9db88a9e084cc7fe3a691463377c3225b02fee24547b516d1cf05f2f77b65a9c36069f6540605c01694008e2a5cb4fc88f62f` |

##
