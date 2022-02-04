---
title: Ledger Development
---

# Ledger Development

The Payvo SDK provides all the boilerplate and structures you need to integrate your blockchain into Payvo products. In this section, we will provide guidance on what you need to know for Ledger hardware wallet testing and integration.

## Ledger Communication

Ledger hardware wallets send and receive messages using [APDU](https://wikipedia.org/wiki/Smart_card_application_protocol_data_unit); a device communication encoding scheme initially designed for [smart cards](https://wikipedia.org/wiki/Smart_card). Ledger devices use this protocol to wrap transaction and message signing requests and responses along with other payload information.

<x-alert type="success">
Visit our Ledger-Transport's [apdu](https://github.com/ArkEcosystem/ledger-transport/blob/master/src/apdu.ts) code page to see a breakdown of the additional flags used to wrap ARK signing requests.
</x-alert>

## The Ledger Service

The Ledger Service is responsible for all interactions with a Ledger Hardware Wallet. This includes derivation and signing of transactions and is limited to 1 device at a time.

## Service Implementation

If we take the [ledger contract](https://github.com/PayvoHQ/sdk/blob/master/packages/sdk/source/ledger.contract.ts) and implement it to network's SDK package; we can use `[sdk-ark](https://github.com/PayvoHQ/sdk/blob/master/packages/ark/source/ledger.service.test.ts)` as an example.

## Testing

All code should include thorough tests that check not only for proper functionality but for cases where improper calls should be detected and handled appropriately. This is particularly important for Ledger hardware wallets where untrusted input could result in an invalid state where an attacker may execute malicious or otherwise undesired calls. Be sure to also familiarize yourself with Ledger's [App Security Guidelines](https://developers.ledger.com/docs/nano-app/secure-app).

An example of testing the Ledger service can be seen [here](https://github.com/PayvoHQ/sdk/blob/master/packages/ark/source/ledger.service.test.ts), but we'll outline what you should keep in mind when writing these tests.

<x-alert type="warning">
Ensure that unsupported methods throw a `NotImplemented` exception.
</x-alert>

### Test Fixtures

The Payvo SDK uses LedgerHQ's `[hw-transport-mocker](https://github.com/LedgerHQ/ledgerjs/tree/master/packages/hw-transport-mocker)` package to emulate and replay device communication sessions to facilitate testing without the need for a live device. i.e., these replay sessions are what constitute Ledger test fixtures.

<x-alert type="success">
Check out the `sdk-ark` [ledger fixtures](https://github.com/PayvoHQ/sdk/blob/master/packages/ark/test/fixtures/ledger.ts) to see what this communication replay looks like.
</x-alert>

### Fixtures

As you can see in the example below, there are `record`, `payload`, and `result` objects. If you look closely, you'll see that the `payload` is just a serialized ARK transaction and the `result` is a Schnorr signature.

So what's the `record` about? How does _that_ work?

Remember that Ledger devices use APDU payloads for communication. What you're looking at here is a series of hex-encoded calls and responses; i.e., the message _to_ a device (`=>`) and the response _from_ a device (`<=`).

The payloads are split up like this because APDU commands have a size limit of 260 (since this is hex, you'll notice 520 characters), we can't send the entire instruction in one go. So after sending a max-sized payload (`=>`) the Ledger will respond (`<=`) with the code `9000` meaning the payload was received successfully. This process continues until the entire instruction has been received, at which point a Ledger device would proceed with executing the request.

```typescript
transaction: {
    record: `
        => e0040050ff058000002c8000006f800000000000000000000000ff0217010000000400020000000000000003b593aa66b53525c5399b4af5a4f583dede1c2a46176c6796a7284ee9c0a1167f0094357700000000000210037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f6899425
        <= 9000
        => e0040150ff3cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639
        <= 9000
        => e0040150ff01037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150004495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0171d86f3f6552b237dd81272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b02d44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba
        <= 9000
        => e0040150ff7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f034495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0471d86f3f6552b237dd81272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b05d44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f064495d593cfb8be3293e2473acf504870d2dcf7
        <= 9000
        => e0040150ff1dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0771d86f3f6552b237dd81272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b08d44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f094495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0a71d86f3f6552b237dd81272a7b0d
        <= 9000
        => e0040150ffa7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b0bd44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f0c4495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0d4495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0e71d86f3f6552b237dd
        <= 9000
        => e00481507881272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b0fd44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f
        <= 4f6f3fc62e2c9b5672f878c8e5034332bd300b2216820747a4344154ef62210977e3fc6654efcb6ea97bad2ce7ecebeb2f6c6e85f04a55861414dbf360fa76339000
    `,
    payload:
        "ff0217010000000400020000000000000003b593aa66b53525c5399b4af5a4f583dede1c2a46176c6796a7284ee9c0a1167f0094357700000000000210037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff663901037eaa8cb236c40a08fcb9d6220743ee6ae1b5c40e8a77a38f286516c3ff6639010301fd417566397113ba8c55de2f093a572744ed1829b37b56a129058000ef7bce0209d3c0f68994253cee24b23df3266ba1f0ca2f0666cd69a46544d63001cdf150004495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0171d86f3f6552b237dd81272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b02d44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f034495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0471d86f3f6552b237dd81272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b05d44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f064495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0771d86f3f6552b237dd81272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b08d44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f094495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0a71d86f3f6552b237dd81272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b0bd44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f0c4495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0d4495d593cfb8be3293e2473acf504870d2dcf71dbee7620270e136ed63c5eef259099d225f7866178968f0c3581509d92d902914674c8f86b99eb55aaa97586e0e71d86f3f6552b237dd81272a7b0da7718c4d26682255223dcf1928174082ce72b07218162938c674afe741119650135338eb3da159e0626ddab6b7851882e08b0fd44d9bde77c9ea02d3516ab3263a77f4f9fbb90c30b47eba7a8bb87325edeb78dd69f914f28426e6ff661c4bc001f253130f4e7eb092a9131c8ca69dbfaff32f",
    result: "4f6f3fc62e2c9b5672f878c8e5034332bd300b2216820747a4344154ef62210977e3fc6654efcb6ea97bad2ce7ecebeb2f6c6e85f04a55861414dbf360fa7633",
}
```

#### Payload Construction

You'll also notice the first request doesn't start with the `payload`/transaction but rather an APDU payload header.

Let's take a closer look at how this header is constructed:

* `APDU[0]` - **CLA**: The APDU Class of Instructions.
  * This may vary by network, but in most cases `e0` is used.
* `APDU[1]` - **INS**: The Instruction Type - _(what kind of request)_
  * For ARK:
    * `0x02` - INS_GET_PUBLIC_KEY
    * `0x06` - INS_GET_VERSION
    * `0x04` - INS_SIGN_TRANSACTION
    * `0x08` - INS_SIGN_MESSAGE
* `APDU[2]` - **P1**: Parameter 1 - _(this will vary by context)_
  * **App / PublicKey Context** - User Approval
    * `0x00` - **P1_NON_CONFIRM**: Do NOT request user approval
    * `0x01` - **P1_CONFIRM**: Request user approval
  * **Signing Context** - Payload Chunk Segment
    * `0x80` - **P1_SINGLE**: First and only segment
    * `0x00` - **P1_FIRST**: First of many segments
    * `0x01` - **P1_MORE**: Subsequent of many segments
    * `0x81` - **P1_LAST**: Final segment
* `APDU[3]` - **P2**: Parameter 2 - _(this will also vary by context)_
  * **App / PublicKey Context** - User Approval
    * `0x00` - **P2_NO_CHAINCODE**: Don't use a ChainCode
    * `0x01` - **P2_CHAINCODE**: Use a Chaincode
  * **Signing Context** - Signing Algorithm
    * `0x50` - **P2_SCHNORR_LEG**: *Only legacy Schnorr is currently supported
* `APDU[4]` - **Message Length**: The Length of the actual messaged being encoded in this payload. In this case, `0xff` or 255

#### Breaking Down Our Example

So now that we see how the headers are constructed, let's break down this first segment's header:

**`e0040050ff058000002c8000006f800000000000000000000000`**

* `0xe0` - The Class
* `0x04` - This is a Transaction Signing instruction!
* `0x00` - This is the first of many segments!
* `0x50` - The resulting signature should use the legacy Schnorr algorithm
* `0xff` - 255. This payload uses the max available space

And finally, just before the message payload itself, we have the the signing path information. This will only exist the first payload.

* `0x058000002c8000006f800000000000000000000000` - Encoded BIP-44 Signing Path
  * `0x05` - The Path Length
  * `0x8000002c8000006f800000000000000000000000` - The packed 32-bit encoded signing path (from: `"44'/111'/0'/0/0"`)

---

Next, you'll see the subsequent payload headers begin with the following:

* `e0040150ff...`
* `e0040150ff...`
* `e0040150ff...`
* `e0040150ff...`
* `e0040150ff...`
* `e004815078...`

Notice how the 2nd through 6th payload are all prepended with `e0040150ff...`. Looking back at how these payloads are constructed and remembering what we learned from the first segment's header, we can quickly spot that APDU[2] (`P2`) is the only difference. It's `0x01`, meaning it's neither the first nor last payload in this series of messages. We can also see that these segments are maxed out at `0xff`/ 255.

Now take a look at that 7th and final header, `e004815078...`. Jumping straight to the `P2` value, we find `0x81`, meaning this is the final payload segment in the series. Note that the message length here is `0x78` or 120 in length. To tell Ledger that we're done sending messages, we'll add the value `9000` to the end of this final segment.

<!-- Visit the [Core Transfer](https://ark.dev/docs/core/transactions/types/transfer) page to see the structure of a serialized ARK transaction. You can further examine the ARK Ledger Transport's [test fixtures](https://github.com/ArkEcosystem/ledger-transport/blob/c7d67ed0a52929699d45cf828747de57cacd650b/__tests__/__fixtures__/transport-fixtures.ts) and [APDU constants](https://github.com/ArkEcosystem/ledger-transport/blob/c7d67ed0a52929699d45cf828747de57cacd650b/src/apdu.ts#L5-#L66) to get an idea of how serialized transactions should be wrapped. -->
