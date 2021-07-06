---
title: Transaction Types - HTLC
---

# Hashed Time-Locked Contracts

A Hashed Time-Lock Contract \(HTLC\) is a set of transaction types that permits a designated party \(the "sender/seller"\) to **LOCK** funds by disclosing the preimage \(secret\) of a hash. It also permits a second party \(the "recipient/buyer"\) to **CLAIM** the funds, or after a timeout is reached enter a **REFUND** situation.

For a detailed explanation of how HTLC transaction works, please read our blog post here:

<livewire:embed-link url="https://blog.ark.io/ark-core-series-hash-time-locked-contracts-6611a23fcba3" caption="Explaining the mechanics of HTLC transactions" />

## HTLC Lock

The purpose of this transaction is to lock funds of the sender and made them possible for retrieval by the recipient, if he knows the shared secret.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP102](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-102.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/core/blob/aef8a3848fdc91aa6f44248dd37643e0fe7926e7/packages/crypto/src/transactions/types/schemas.ts#L17-L45) \| [HTLC Schemas](https://github.com/ArkEcosystem/core/blob/develop/packages/crypto/src/transactions/types/schemas.ts#L243-L318) |

### Transaction Structure

#### Signed JSON Payload

```javascript
{
    "version": 2,
    "network": 23,
    "type": 8,
    "nonce": "2",
    "senderPublicKey": "020d272fab67c179a9e4df4d006344d3ca47fb531b4246b483373940f0603a9216",
    "fee": "10000000",
    "amount": "1",
    "recipientId": "ATNGUiu6sYRb7MXtdcVc7KjoyM6TdfuoC1",
    "asset": {
        "lock": {
            "secretHash": "09b9a28393efd02fcd76a21b0f0f55ba2aad8f3640ff8cae86de033a9cfbd78c",
            "expiration": {
                "type": 1,
                "value": 78740307
            }
        }
    },
    "signature": "11b1c06b4e5ba7c196f6f36fca2540275173a472e61581e949cd24a7cf5ee98af6a74f3c919f9b82a2e65b51b737bdf22f7a08ffcf52b88dc4a16d6ac5c10bfe",
    "id": "f84efeab77224af8959301a7185597a7cfbfbc9a4d99cb021af62f3714feb9d3"
}
```

#### Serialized Payload

```shell
ff02170100000008000200000000000000020d272fab67c179a9e4df4d006344d3ca47fb531b4246b483373940f0603a9216809698000000000000010000000000000009b9a28393efd02fcd76a21b0f0f55ba2aad8f3640ff8cae86de033a9cfbd78c01537bb104177f2a95c7076ea278776d8fcecc5b18e588976da611b1c06b4e5ba7c196f6f36fca2540275173a472e61581e949cd24a7cf5ee98af6a74f3c919f9b82a2e65b51b737bdf22f7a08ffcf52b88dc4a16d6ac5c10bfe
```

#### Deserialized Hex Payload

| Key | Pos. | Size   _\(bytes\)_ | Value   _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0800` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x020d272fab67c179a9e4df4d006344d3ca47fb531b4246b483373940f0603a9216` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Amount:** | **\[59\]** | **8** | `0x0100000000000000` |
| **Secret Hash:** | **\[67\]** | **32** | `0x09b9a28393efd02fcd76a21b0f0f55ba2aad8f3640ff8cae86de033a9cfbd78c` |
| **Expiration Type:** | **\[99\]** | **1** | `0x01` |
| **Expiration Value:** | **\[100\]** | **4** | `0x537bb104` |
| **Recipient:** | **\[104\]** | **21** | `0x177f2a95c7076ea278776d8fcecc5b18e588976da6` |
| **Signature:** | **\[125\]** | **64** | `0x11b1c06b4e5ba7c196f6f36fca2540275173a472e61581e949cd24a7cf5ee98af6a74f3c919f9b82a2e65b51b737bdf22f7a08ffcf52b88dc4a16d6ac5c10bfe` |

## HTLC Claim

The purpose of this transaction is for the recipient to CLAIM funds from the sender - if he knows the shared secret.

### Transaction Structure

#### Signed JSON Payload

```javascript
{
    "version": 2,
    "network": 23,
    "type": 9,
    "nonce": "3",
    "senderPublicKey": "039d974aa6feff6a19fde69a8a8b25b991798e98252765a887118ba61218f473a2",
    "fee": "0",
    "amount": "0",
    "asset": {
        "claim": {
            "lockTransactionId": "f84efeab77224af8959301a7185597a7cfbfbc9a4d99cb021af62f3714feb9d3",
            "unlockSecret": "f5ea877a311ced90cf4524cb489e972f"
        }
    },
    "signature": "c2b9f3655174c13686dde428cf18d5d18f465712985a7086b04860457e8d2db64443083bdf69fdc5b94dcd2c4c722606cf0e058ffae98d8f9f069177c5c189ab",
    "id": "d8acf49eba509e94494f454a86add1fab8b2130f223c9cc25e8e92745a584813"
}
```

#### Serialized Payload

```shell
ff02170100000009000300000000000000039d974aa6feff6a19fde69a8a8b25b991798e98252765a887118ba61218f473a2000000000000000000f84efeab77224af8959301a7185597a7cfbfbc9a4d99cb021af62f3714feb9d36635656138373761333131636564393063663435323463623438396539373266c2b9f3655174c13686dde428cf18d5d18f465712985a7086b04860457e8d2db64443083bdf69fdc5b94dcd2c4c722606cf0e058ffae98d8f9f069177c5c189ab
```

#### Deserialized Hex Payload

| Key | Pos. | Size   _\(bytes\)_ | Value   _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **TypeGroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0900` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x039d974aa6feff6a19fde69a8a8b25b991798e98252765a887118ba61218f473a2` |
| **Fee:** | **\[50\]** | **8** | `0x0000000000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Lock Id:** | **\[59\]** | **32** | `0xf84efeab77224af8959301a7185597a7cfbfbc9a4d99cb021af62f3714feb9d3` |
| **Unlock Secret:** | **\[91\]** | **32** | `0x6635656138373761333131636564393063663435323463623438396539373266` |
| **Signature:** | **\[123\]** | **64** | `0xc2b9f3655174c13686dde428cf18d5d18f465712985a7086b04860457e8d2db64443083bdf69fdc5b94dcd2c4c722606cf0e058ffae98d8f9f069177c5c189ab` |

## HTLC Refund

The purpose of this transaction is for the sender to receive back his locked funds, in the case of recipient not claiming them.

### Transaction Structure

#### Signed JSON Payload

```javascript
{
    "version": 2,
    "network": 23,
    "type": 10,
    "nonce": "3",
    "senderPublicKey": "037fc2e14f626586722a4f9e00dca2efbc4ac409c1ca63bc4309f56184265f95d5",
    "fee": "0",
    "amount": "0",
    "asset": {
        "refund": {
            "lockTransactionId": "c62bd36c162dd0116a08bf8a75cd6d1f83b8f5f1e17e89c8231ebb7af595f64d"
        }
    },
    "signature": "ae272f4650ee1d46260b8f62e7e956af33cd25587318fed056aec8e9d518e2394d0fd3166d8cd8506abfc303c644041a4bab35daf7c8aaa77f916ef09dc90336",
    "id": "4d9ee7f8b27999d4ce7acf6afee08e3da67bc1fca258f2bd17e426933a846602"
}
```

#### Serialized Payload

```shell
ff0217010000000a000300000000000000037fc2e14f626586722a4f9e00dca2efbc4ac409c1ca63bc4309f56184265f95d5000000000000000000c62bd36c162dd0116a08bf8a75cd6d1f83b8f5f1e17e89c8231ebb7af595f64dae272f4650ee1d46260b8f62e7e956af33cd25587318fed056aec8e9d518e2394d0fd3166d8cd8506abfc303c644041a4bab35daf7c8aaa77f916ef09dc90336
```

#### Deserialized Hex Payload

| Key | Pos. | Size   _\(bytes\)_ | Value   _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **Typegroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0a00` |
| **Nonce:** | **\[9\]** | **8** | `0x0300000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x037fc2e14f626586722a4f9e00dca2efbc4ac409c1ca63bc4309f56184265f95d5` |
| **Fee:** | **\[50\]** | **8** | `0x0000000000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Lock Id:** | **\[59\]** | **32** | `0xc62bd36c162dd0116a08bf8a75cd6d1f83b8f5f1e17e89c8231ebb7af595f64d` |
| **Signature:** | **\[91\]** | **64** | `0xae272f4650ee1d46260b8f62e7e956af33cd25587318fed056aec8e9d518e2394d0fd3166d8cd8506abfc303c644041a4bab35daf7c8aaa77f916ef09dc90336` |
