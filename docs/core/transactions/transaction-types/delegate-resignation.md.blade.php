---
title: Transaction Types - Delegate Resignation
---

# Delegate Resignation

This transaction type enables delegates to block potential voters from voting for them if they choose to withdraw their status as delegates. A non-reversible transaction can be sent to the network to indicate that the delegate should no longer be included in any future forging rounds.

This transaction acts as a “kill command” for delegates who wish to resign or retire their delegate. Activating a delegate resignation will mean delegates will no longer be able to receive any new votes. Plus, for actively forging delegates, enabling delegate resignation will mean they permanently drop out of the top 51. This provides a clean and simple way to retire a delegate.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/core/blob/aef8a3848fdc91aa6f44248dd37643e0fe7926e7/packages/crypto/src/transactions/types/schemas.ts#L17-L45) \| [Delegate Resignation](https://github.com/ArkEcosystem/core/blob/master/packages/crypto/src/transactions/types/schemas.ts#L216) |

## Transaction Structure

### Signed JSON Payload

```javascript
{
    "version": 2,
    "network": 23,
    "type": 7,
    "nonce": "2",
    "senderPublicKey": "037a12518205254e6ebf25290d9786fd9821c43bb7319c9fc2499c8d472809dfaf",
    "fee": "2500000000",
    "amount": "0",
    "signature": "ad7a61a76433260ef9dc687311ab6c657f6c733dbf1a80c3514da823d43226235a70a94fa1a0b8cb2f4b3d0be5011945bfbe8c8fc5b5ca0e07f6c2a37e3cf11b",
    "id": "ee2a5253e28f66d5546b28bba96b4fa88973305e2e0d3b82afd5b3386ab0b6d4"
}
```

### Serialized Payload

```shell
ff02170100000007000200000000000000037a12518205254e6ebf25290d9786fd9821c43bb7319c9fc2499c8d472809dfaf00f902950000000000ad7a61a76433260ef9dc687311ab6c657f6c733dbf1a80c3514da823d43226235a70a94fa1a0b8cb2f4b3d0be5011945bfbe8c8fc5b5ca0e07f6c2a37e3cf11b
```

### Deserialized Hex Payload

| Key | Pos. | Size _\(bytes\)_ | Value  _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0700` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x037a12518205254e6ebf25290d9786fd9821c43bb7319c9fc2499c8d472809dfaf` |
| **Fee:** | **\[50\]** | **8** | `0x00f9029500000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Amount:** | **\[..\]** | **0** | Not Serialized |
| **Signature:** | **\[59\]** | **64** | `0xad7a61a76433260ef9dc687311ab6c657f6c733dbf1a80c3514da823d43226235a70a94fa1a0b8cb2f4b3d0be5011945bfbe8c8fc5b5ca0e07f6c2a37e3cf11b` |
