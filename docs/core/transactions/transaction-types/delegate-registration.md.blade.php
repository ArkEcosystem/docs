---
title: Delegate Registration Transaction Specifications
---

# Delegate Registration

A user or organization can register their address to become a delegate and secure the network. Upon accumulating sufficient vote weight, the delegate will begin forging transactions and receiving block rewards. The delegate assigns a custom name to their address to differentiate it from other delegates.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/core/blob/master/packages/crypto/src/transactions/types/schemas.ts#L16) \| [Delegate Registration](https://github.com/ArkEcosystem/core/blob/master/packages/crypto/src/transactions/types/schemas.ts#L96) |

## Transaction Structure

### Signed JSON Payload

```javascript
{
    "version": 2,
    "network": 23,
    "type": 2,
    "nonce": "2",
    "senderPublicKey": "02a574b8995542631976691a7f73b59e4700cd84badb831331ab18ae2113a184ba",
    "fee": "2500000000",
    "amount": "0",
    "asset": {
        "delegate": {
            "username": "02a574b8995542631976"
        }
    },
    "signature": "f2cf8acf6ccb71fa0e848ca185a93e6ff44e0dd266b08c4bc0dfc7984499acd759f6067ace6bb00eae404eafa6af3548f5d35f8727f4ddeba69b6d925c604338",
    "id": "9b232e31c6385a2c730f5bec3c0220da6a184320e6c38bd7b6fd5a18b8501472"
}
```

### Serialized Payload

```
ff0217010000000200020000000000000002a574b8995542631976691a7f73b59e4700cd84badb831331ab18ae2113a184ba00f902950000000000143032613537346238393935353432363331393736f2cf8acf6ccb71fa0e848ca185a93e6ff44e0dd266b08c4bc0dfc7984499acd759f6067ace6bb00eae404eafa6af3548f5d35f8727f4ddeba69b6d925c604338
```

### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0200` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x02a574b8995542631976691a7f73b59e4700cd84badb831331ab18ae2113a184ba` |
| **Fee:** | **\[50\]** | **8** | `0x00f9029500000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Username Length:** | **\[59\]** | **1** | `0x14` |
| **Username:** | **\[60\]** | **20** | `0x3032613537346238393935353432363331393736` |
| **Signature:** | **\[80\]** | **64** | `0xf2cf8acf6ccb71fa0e848ca185a93e6ff44e0dd266b08c4bc0dfc7984499acd759f6067ace6bb00eae404eafa6af3548f5d35f8727f4ddeba69b6d925c604338` |

##
