---
title: Transaction Types - MultiPayment
---

# MultiPayment Transaction

This type is designed to reduce the payload on the blockchain by enabling multiple payments to be combined and broadcast to the network as a single transaction. This benefits the end user and delegates by lowering transaction fees per payment and reducing congestion. Initially and depending on testing, the ARK Core will allow at least 64 payments to be combined within a single transaction for APN/Mainnet. Eventually, the number of payments per transaction will be able to scale as needed.

| References |  |
| :--- | :--- |
| ARK Improvement Proposals | [AIP11](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-11.md), [AIP29](https://github.com/ArkEcosystem/AIPs/blob/master/AIPS/aip-29.md) |
| API Endpoints | [Link](/docs/api/public-rest-api/endpoints/transactions) |
| AJV Schema | [Base](https://github.com/ArkEcosystem/core/blob/aef8a3848fdc91aa6f44248dd37643e0fe7926e7/packages/crypto/src/transactions/types/schemas.ts#L17-L45) \| [MultiPayment Transaction](https://github.com/ArkEcosystem/core/blob/master/packages/crypto/src/transactions/types/schemas.ts#L208) |

## Transaction Structure

### Signed Json Payload

```javascript
{
    "version": 2,
    "network": 23,
    "type": 6,
    "nonce": "2",
    "senderPublicKey": "02a53371b23f991740f968e3d96de42a67b4242e267cad8050ae4b68bf9ac20af2",
    "fee": "10000000",
    "amount": "0",
    "asset": {
        "payments": [
            { "amount": "1", "recipientId": "AJkSjZPqRFksw6CDyCrAqPqpRzTJ9y2JVg" },
            { "amount": "1", "recipientId": "AdmKdL2yUHa2wEq1QajidRMD5KAQ92HY1p" },
            { "amount": "1", "recipientId": "AQUBtovaVuwDuHSrjLZRbPzhuDGMp7iUje" },
            { "amount": "1", "recipientId": "AQBCwmStjJAhc665FD81swaot6NMKDmWSe" },
            { "amount": "1", "recipientId": "AZUet7svbkQ54EhkXjtHFQuz1G8Hg3k29o" },
            { "amount": "1", "recipientId": "AZy7zpA7d61Zxy51nhrVUEK52LX9dxNhwE" },
            { "amount": "1", "recipientId": "AJi63aGakFJo4aYcH5U5s3HUzmx5B31tqA" },
            { "amount": "1", "recipientId": "ARbzRpB4uQsMwjXqohA1bURVNrURHWcbRB" },
            { "amount": "1", "recipientId": "AFqBJKjoGiMBiaUA5ZvuaoHCtsAtVaYfiQ" },
            { "amount": "1", "recipientId": "AZ9W5GCvLjYn86uS4gVvLF3dUeff7Sm7kZ" },
            { "amount": "1", "recipientId": "ALetETJv5kUDaXxGyqgfbvCAq7Xd4LkNcR" },
            { "amount": "1", "recipientId": "AHNAYaC9SoWBtyiHYs8BoY6dkrFc8e1r6t" },
            { "amount": "1", "recipientId": "APHZ1wBFg2CtYSxUEoVztzrPXpjZWB7Ed3" },
            { "amount": "1", "recipientId": "ASYHnawx4LYnS3qgEshPXg1ovAMgqPvMyd" },
            { "amount": "1", "recipientId": "AJ3rQcLRmfu8myq3Riob1P1PhwoTmx1uGM" },
            { "amount": "1", "recipientId": "AdaRMae1p4XuyniQSwEF7KJMTzTDjLEtrA" },
            ......................................................................
            ......................................................................
            ......................................................................
            { "amount": "1", "recipientId": "APwfcZa61hT4CNptRWjykv8J8UNG26WKZk" },
            { "amount": "1", "recipientId": "AGyANoQJRETkdiADXMrB8EkBxYCVCiVxq4" },
            { "amount": "1", "recipientId": "AQ21SC3vq3iYf4CyQhAPuX4p9LHPhRaKUY" },
            { "amount": "1", "recipientId": "AUBKVPGUzLrHz4nh2o9wms9kf44KtiQBzF" },
            { "amount": "1", "recipientId": "AKFPFgGiv26n4LcTzCJ1FhHytgk86qZ5fk" },
            { "amount": "1", "recipientId": "AVdv6aogUAf93MnWLhjze3971P4yMqcBMY" },
            { "amount": "1", "recipientId": "AWkg5GAdQ34NApvGE4kj2t3cQw5MupuemH" },
            { "amount": "1", "recipientId": "AUwDWzNS6rvtvGuX9mp313vpSsNASMxgJc" }
        ]
    },
    "signature": "a5ad9228b3f6717d471411ac733629d561c19a945dbe956261f707c303c9327e12a87c48e429dc9f8ee7cfa026798aacaed59a27d650bfc2095291f816955f05",
    "id": "b5e1c95a33ff1c70a96a91c2f190268189778f28f5330b0afd49aebb74da30c4"
}
```

### Serialized Payload

```shell
ff0217010000000600020000000000000002a53371b23f991740f968e3d96de42a67b4242e267cad8050ae4b68bf9ac20af28096980000000000008900000001000000000000001720a32a4fd007065355e791cffd598bb0c6fa52bc010000000000000017f13809c4c5fb2b3967a9b40efc70843f7db462ad0100000000000000175f60e0594115b71d5b136cf929c8504082ac199d0100000000000000175c2aaead4ce542788406c54e1ae31f1afdb7f081010000000000000017c2308975254751ead4df705fc76aa84116c5e34e010000000000000017c792d1958bb950596d0e7cd0bef32506200968480100000000000000172031100e628422b8409810fdb438e874765846ba0100000000000000176bd2c24bded5fdfd7888a28b3c6990503699b5e8010000000000000017009ffbb10efc47ad00a0a29cc2ef6e6c83d8c6ec010000000000000017be9147febbfe462cdbfda8575c18dabe85db4f5b010000000000000017358634b58d88abf4aef3a6fe264b4ad18b74e98b01000000000000001711745fc47a9c58c4e6f5a74eb59411ac102c6a880100000000000000175265ceb5d6102474ea7d0f401d6e6b9f13864a050100000000000000177617b5f3b82f153e388b4b200abd8636fff73dd501000000000000001718f5df4fe3108277bfa4e39071fead9d59b35b8f010000000000000017ef283e95c3fdf0e2df9ba8321407c5621f9868760100000000000000176af453a17439c9c258c25c707aa9fc1f3b59d9b40100000000000000177e94f3954665ebd80ced3d434c67cd4351966f2b0100000000000000178b8ee88e27291e33ce5403ea9b159235887dcfa9010000000000000017232a71b6b2586d5b02b6a72db08759066ba2a92b01000000000000001728c4b220f14f3745f3fff6d3c066ba2353393eb6010000000000000017ac67d5bfbef4a7ed8149727b93a01e903d84ee0c0100000000000000173a537bef2ed296a54adc354967efe3a5e52cdfb80100000000000000172c939e4633bd96ccc1d1509dbe794299603aad9901000000000000001753ef9af027797e4827d708d9ed47c511f4ea5524010000000000000017e103c02fc06140aeac275f8e579f3397d041f817010000000000000017a37d6366d765f5e446fc18ddcc3da3fa300cf6bb010000000000000017e1671fea563be042824751a3465a7dbbc4827942010000000000000017f4d63847bf07a9faad83bd69fed408b3b734dce8010000000000000017888e092eba4cbd5eab9e10646661f5a440915f9d0100000000000000175677152f9d640b175894c8da0b9f30bad3801aff010000000000000017d34bb692e52d515398d00fd57ce2c8bfd3480554010000000000000017cfafad73ebddc38d53317c80cdbf6d343c331d620100000000000000177dbca0c01f96de655cf41eb53e1b8d5e2ffa2607010000000000000017f354c71350a110a7b45b5095ed0a4601bf4bbf9d0100000000000000170ca0fbbfb8e3f615ec4eedaef6281d4d60a8f2b20100000000000000172f885faaf6a3fcc38b1f35c652bf72f0fd7ac60301000000000000001724e14548f3874b9413a28f258c2b73d35ec2b2f9010000000000000017e3f48b5211d1f21034bc15908259901ecf972be8010000000000000017ccbb32ea36fad927cb2c46cbc63930db6cda829d010000000000000017670c4b3896983f37a0d113eb6afc329c39232aa4010000000000000017f17faa6a2a251d2ac73033ea1868387542b798fa010000000000000017aa0f2cf081d9609a44dde12e0c805ebb0880c857010000000000000017a794717598f2f4379bc787be2d5730e19cef6bc50100000000000000179d5d3507b35431cd3ec3ab6dad8663a64c41772e010000000000000017d0fbd6baf73fa195989ea418aa04c90c873f8ec5010000000000000017004c2fbebda958eb1173f9f8eab22a171e0cafba010000000000000017ca7739477089657a1dd6061411cfeafec50f6d28010000000000000017568598ea898f21b665b681425f91666b910da328010000000000000017f38358caf39c93d2d1b4db950606dc703378554c01000000000000001786f5b6951d2c9578a790612f6f3c59b387105180010000000000000017342bf4e8884754b6867903ef9c5e27c03ac036e50100000000000000173278d0a270000126e0dd97e6c0641755b145babe010000000000000017dfd16cf066ffced2c1cfbb10e3ca2a9fb584578a010000000000000017d3275bfaeba7b49d2ef55673bbb3c1fb08b08d9f01000000000000001794e65c65d7abcf07f67b67a23793682f43efeb420100000000000000171bb531fb6335c6a8926a3c00eeba5fe0511856dd0100000000000000170721c33e5b98f0227b2cb8fc64b83dd510317b0b010000000000000017fb73dfa44b21e88e72c234b8c80ed9c634aae35901000000000000001753acc3249244171686f3e7162204b941ebc7261801000000000000001712d4ebc3c271406ce007e3c6f3347b14e447c13601000000000000001718af9ce5f8c983184c9650b021a645bcfebf3cfb01000000000000001740173e1b8672e92982e53c98b53c680748c725b5010000000000000017435483bed11c1b57f692d1c46389b2c5cb3157f2010000000000000017029022a47dc76855101fff5eb0243e3083af78e7010000000000000017c411af7a4a5062066dd5872ddc5373bfea2b8861010000000000000017fbb29777b4d2a728cddab9bd67c957a7b1558994010000000000000017c119f3b087e7fc3038cafea35b127ce40a797a1a010000000000000017fbf6e96524f5e752a5e4c888b21d41de9d3c52620100000000000000172515f06be5786f8be1381c55be104d90ad627112010000000000000017548c6e2d4016a41e378fda3c8873886543fa70ab0100000000000000174bfe676769da8da1f93192e079c482ecc5bc174f010000000000000017afb206cdfb25578ce365d27304470c49e4125fed01000000000000001747f3ffafa5426a110cd350443e9fe9d0f174e3b40100000000000000176eb489b953096524e44f36c85c73144bd532d402010000000000000017871de62afc7f1d49e1ee7c42b0404ba142fc7ea6010000000000000017fec42984da0e01d4a7bac024a5e475c063ac9c460100000000000000177a09a9b82ed74e61fbbcfbe7aec3cbba7cafa12e010000000000000017e20bb0016cd9f294dad34a8bb561fd11e637244a0100000000000000173aae39ea7d1f75a6e9e2227f609c4d14970c852d010000000000000017eae871ae15c3257628161ab7e32ffbb2482c78a9010000000000000017bbe0df02533620dfc8a6a5033a7345e0a34be0cb01000000000000001715b7d1c17acc078e851a177a1d367a9d3dd68d23010000000000000017bb7e23ad26914f168656213867fae480dda65c470100000000000000175af6c2e27b91e61f8e2aeeb97b1eccf227a3bebd0100000000000000171df95978e737f2fb09b8c84e14965ea93340d18601000000000000001751dffdd691c32b7eb725cadb1d079f307f95f664010000000000000017f874b060408bf32f69abd7075ef1996d73f60be00100000000000000173271a8fa8423a3deed5f428c246c570b55698437010000000000000017403b9325626c8cdef7d72607b81293c2d470a97b010000000000000017742a8590b18189f9a48ea5d6130ca261c0a4c22401000000000000001700a167a5d6b0f9ce2412c1b5df562b6d864a711001000000000000001734b2366cee1ec416e66388d3af5fd9b139a5603b0100000000000000171c5ee9ef8a8fe1f9f9b342e1eb7a386f6b8994f50100000000000000179f5b37aa9925ad7e998c3bd4b5ddbe31e9f58e8d0100000000000000177e783dc832674a0ee644cdfb29e9232f68ee505d01000000000000001780824545d87e1eb691b2171e4bb493607724e55001000000000000001719f9077cac3d96ecdca2f51f4c98407aac43868d010000000000000017dd108e250a81bda83e4613b71455753786ee746e0100000000000000177493b7565f8636184e83c6932fc92a5d5a296bd7010000000000000017718e2ae0facdbf29671853177560c5005a9f0e79010000000000000017eaae33738759c292d482eab208a0a0bf435c85af010000000000000017c49bcbe3455ba122f872e690c74fc0ec9210414f01000000000000001724c7652304c41c93aead26419604de7f5b8de442010000000000000017aab09efda1232d347381be809e1c8dfc3c0744fc0100000000000000175d31e11438d5ef1140d6296f05f7a03b6c6630100100000000000000170e21668e2123e42e03272fa24e46137242a6ff65010000000000000017ad0087f23f59dd30f586de1442cbb8b986d50fd4010000000000000017d80204238e3e94f99bfe2e44a20671ace2deb55c0100000000000000170688a4b5d8b90c9ce1703d5bfe660ddb6f1d9dc00100000000000000179d317d97a1c29ce4d134c4101673d68d8ec8b56a0100000000000000179ff7c1007941f86c2ba2a33dc420dd30dbad52d7010000000000000017acb8100b3d329598a4f0881df2ca7921a9da659d0100000000000000177a9a7b964ee2e823fcb237b352a4b3769c69e9d7010000000000000017e98855e1023a60dbe3fec3e139e496fad176ac160100000000000000178c8116b26ea08128470bd157e94214a9ef8b234801000000000000001782c5e34f55def2baa9c795064759ebeca7d71eb3010000000000000017a5304a50845a14eb3d056738c8de3c30ee49dd1901000000000000001785ffad6012d89b11b510fe32dbf85ca448249050010000000000000017ce1e89721c1df2d1b4165a622bf1288fa764a6e301000000000000001745e561944786f513c5ad3d31c3c3c88e3aa4dcc8010000000000000017a799ee7a9fc25df86361192ffbee64a8d52386ad0100000000000000177ed2ae936601fc2f079279afe249f510df5efc9101000000000000001729cab77105a600d1843c56b34c877d1b1bddd8bd01000000000000001725e40ab73be8507a874986d35bd3737463ea113f0100000000000000176b1c4f8024768772d2383d87af7d8990f732413c010000000000000017f5bc3b8ab8a28f0700df6f3602f231dc434bdcbc010000000000000017a818773d8d77e6fc74970dd488c033965669d39b01000000000000001704eb876ab3b7e2f136889dadeddc0219b47dac8a010000000000000017599b1ef53e7c4fbe6c682afda54ebdc87049391f0100000000000000170d1aaa9441c60a0e51212a5b84892aa9759cf6d20100000000000000175a6d54a6ee7e6225a4325a5e05d59b452e279d9b0100000000000000178810a6294399c640e23d42c372494e9159b1ace0010000000000000017261c52971d5e1024a7c0ececf5197f01005fe9bc01000000000000001798107a6ceb0fcf15a7b05208c29564f34eeafc98010000000000000017a44fcf637c830148b941e977ac155d2bc2f016e7010000000000000017905df747e8999695f92c58cbaac4324b11345e73a5ad9228b3f6717d471411ac733629d561c19a945dbe956261f707c303c9327e12a87c48e429dc9f8ee7cfa026798aacaed59a27d650bfc2095291f816955f05
```

### Deserialized Hex Payload

| Key | Pos. | Size  _\(bytes\)_ | Value   _\(hex\)_ |
| :--- | :---: | :---: | :--- |
| **Header:** | **\[0\]** | **1** | `0xff` |
| **Version:** | **\[1\]** | **1** | `0x02` |
| **Network:** | **\[2\]** | **1** | `0x17` |
| **TypeGroup:** | **\[3\]** | **4** | `0x01000000` |
| **Type:** | **\[7\]** | **2** | `0x0600` |
| **Nonce:** | **\[9\]** | **8** | `0x0200000000000000` |
| **SenderPublicKey:** | **\[17\]** | **33** | `0x02a53371b23f991740f968e3d96de42a67b4242e267cad8050ae4b68bf9ac20af2` |
| **Fee:** | **\[50\]** | **8** | `0x8096980000000000` |
| **VendorField Length:** | **\[58\]** | **1** | `0x00` |
| **Number of Payments:** | **\[59\]** | **2** | `0x89000000` |
| **Amount 1:** | **\[61\]** | **8** | `0x0100000000000000` |
| **Recipient 1:** | **\[69\]** | **21** | `0x1720a32a4fd007065355e791cffd598bb0c6fa52bc` |
| **............** | **....** | **..** | `..................` |
| **Amount 137:** | **\[4008\]** | **1** | `0x0100000000000000` |
| **Recipient 137:** | **\[4009\]** | **21** | `0x17905df747e8999695f92c58cbaac4324b11345e73` |
| **Signature:** | **\[4030\]** | **64** | `0xa5ad9228b3f6717d471411ac733629d561c19a945dbe956261f707c303c9327e12a87c48e429dc9f8ee7cfa026798aacaed59a27d650bfc2095291f816955f05` |
