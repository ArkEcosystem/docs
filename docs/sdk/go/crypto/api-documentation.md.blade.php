---
title: API Documentation
---

# API Documentation

## crypto.configuration

### `SetNetwork()`

```go
func SetNetwork(network *Network)
```

Set what network you want to use in the crypto library

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*Network | network | Yes | Testnet, Devnet, Mainnet |

### `GetNetwork()`

```go
func GetNetwork() *Network
```

Get settings for a selected network, default network is devnet

#### Return Value

`*Network`

### `GetFee()`

```go
func GetFee(transactionType byte) FlexToshi
```

Get a fee for a given transaction type

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| byte | transactionType | Yes | Transaction type for which we wish to get a fee |

#### Return Value

`FlexToshi`

### `SetFee()`

```go
func SetFee(transactionType byte, value FlexToshi)
```

Set a fee

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| byte | transactionType | Yes | Transaction\_type for which we wish to set a fee |
| FlexToshi | value | Yes | Fee for a given transaction type |

## crypto.address

### `AddressFromPassphrase()`

```go
func AddressFromPassphrase(passphrase string) (string, error)
```

Derive the address from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`(string, error)`

### `AddressToBytes()`

```go
func AddressToBytes(address string) ([]byte, error)
```

Derive the given address to its bytes representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | address | Yes | address |

#### Return Value

`([]byte, error)`

### `validate()`

```go
func ValidateAddress(address string) (bool, error)
```

Validate the given address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | address | Yes | Address |

#### Return Value

`(bool, error)`

## crypto.private\_key

### `PrivateKeyFromPassphrase()`

```go
func PrivateKeyFromPassphrase(passphrase string) (*PrivateKey, error)
```

Derive the private key for the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`*PrivateKey, error`

### `PrivateKeyFromHex()`

```go
func PrivateKeyFromHex(privateKeyHex string) (*PrivateKey, error)
```

Create a private key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | privateKeyHex | Yes | Private key |

#### Return Value

`*PrivateKey, error`

### `PrivateKeyFromBytes()`

```go
func PrivateKeyFromBytes(bytes []byte) *PrivateKey
```

Create a private key instance from a bytes string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[\]byte | bytes | Yes | Bytes string |

#### Return Value

`*PrivateKey`

### `ToHex()`

```go
func (privateKey *PrivateKey) ToHex() string
```

Convert a private key instance to a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*PrivateKey | bytes | Yes | Private key |

#### Return Value

`string`

### `ToAddress()`

```go
func (privateKey *PrivateKey) ToAddress() string
```

Create a private key instance to a address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*PrivateKey | bytes | Yes | Private key |

#### Return Value

`string`

### `ToWif()`

```go
func (privateKey *PrivateKey) ToWif() string
```

Create a private key instance to a WIF string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*PrivateKey | bytes | Yes | Private key |

#### Return Value

`string`

### `Sign()`

```go
func (privateKey *PrivateKey) Sign(hash []byte) ([]byte, error)
```

Sign the private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[\]byte | hash | Yes | Private key |

#### Return Value

`[]byte, error`

### `Verify()`

```go
func (publicKey *PublicKey) Verify(signature []byte, data []byte) (bool, error)
```

Verify the private key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[\]byte | signature | Yes | Signature |
| \[\]byte | data | Yes | Private key |

#### Return Value

`bool, error`

## crypto.public\_key

### `PublicKeyFromPassphrase()`

```go
func PublicKeyFromPassphrase(passphrase string) (*PublicKey, error)
```

Derive the public from the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

#### Return Value

`*PublicKey, error`

### `PublicKeyFromHex()`

```go
func PublicKeyFromHex(publicKeyHex string) (*PublicKey, error)
```

Create a public key instance from a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | publicKeyHex | Yes | Hex string |

#### Return Value

`*PublicKey, error`

### `PublicKeyFromBytes()`

```go
func PublicKeyFromBytes(bytes []byte) (*PublicKey, error)
```

Create a public key instance from a bytes string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[\]byte | bytes | Yes | Bytes string |

#### Return Value

`*PublicKey, error`

### `ToHex()`

```go
func (publicKey *PublicKey) ToHex() string
```

Convert a public key instance to a hex string.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*PublicKey | publicKey | Yes | Public key |

#### Return Value

`string`

### `ToAddress()`

```go
func (publicKey *PublicKey) ToAddress() string
```

Convert a public key instance to a valid address.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*PublicKey | publicKey | Yes | Public key |

#### Return Value

`string`

## crypto.builder

### `buildSignedTransaction()`

```go
func buildSignedTransaction(transaction *Transaction, passphrase string, secondPassphrase string) *Transaction
```

Builds a transaction for a signed transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*Transaction | transaction | Yes | Transaction |
| string | passphrase | Yes | Passphrase |
| string | secondPassphrase | Yes | Second passphrase |

#### Return Value

`*Transaction`

### `BuildTransfer()`

```go
func BuildTransfer(recipient string, amount FlexToshi, vendorField string, passphrase string, secondPassphrase string) *Transaction
```

Builds a transaction for a transfer.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | recipient | Yes | Recipient identifier |
| FlexToshi | amount | Yes | Transaction amount |
| string | vendorField | Yes | Transaction vendorfield |
| string | passphrase | Yes | Passphrase |
| string | secondPassphrase | Yes | Second passphrase |

#### Return Value

`*Transaction`

### `BuildSecondSignatureRegistration()`

```go
func BuildSecondSignatureRegistration(passphrase string, secondPassphrase string) *Transaction
```

Builds a transaction for a second signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |
| string | secondPassphrase | Yes | Second passphrase |

#### Return Value

`*Transaction`

### `BuildDelegateRegistration()`

```go
func BuildDelegateRegistration(username string, passphrase string, secondPassphrase string) *Transaction
```

Builds a transaction for a delegate registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | username | Yes | Delegate username |
| string | passphrase | Yes | Passphrase |
| string | secondPassphrase | Yes | Second passphrase |

#### Return Value

`*Transaction`

### `BuildVote()`

```go
func BuildVote(vote, passphrase string, secondPassphrase string) *Transaction
```

Builds a transaction for a vote registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| ? | vote | Yes | Vote |
| string | passphrase | Yes | Passphrase |
| string | secondPassphrase | Yes | Second passphrase |

#### Return Value

`*Transaction`

### `BuildMultiSignatureRegistration()`

```go
func BuildMultiSignatureRegistration(min byte, lifetime byte, keysgroup []string, passphrase string, secondPassphrase string) *Transaction
```

Builds a transaction for a multi signature registration.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| byte | min | Yes | Transaction minimum required signatures |
| byte | lifetime | Yes | Transaction lifetime |
| \[\]string | keysgroup | Yes | Transaction keysgroup |
| string | passphrase | Yes | Passphrase |
| string | secondPassphrase | Yes | Second passphrase |

#### Return Value

`*Transaction`

## crypto.serializer

### `SerializeTransaction()`

```go
func SerializeTransaction(transaction *Transaction) []byte
```

Handle the serialization of "transaction" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`[]byte`

### `serializeHeader()`

```go
func serializeHeader(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "headers" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeVendorField()`

```go
func serializeVendorField(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of the vendorfield.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeTypeSpecific()`

```go
func serializeTypeSpecific(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the deserialization of "type" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeSignatures()`

```go
func serializeSignatures(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the deserialization of "signature" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

## crypto.deserializer

### `DeserializeTransaction()`

```go
func DeserializeTransaction(serialized string) *Transaction
```

Handle the deserialization of "transaction" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | serialized | Yes | Serialized |

#### Return Value

`*Transaction`

### `deserializeHeader()`

```go
func deserializeHeader(bytes []byte, transaction *Transaction) (int, *Transaction)
```

Handle the deserialization of "headers" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeTypeSpecific()`

```go
func deserializeTypeSpecific(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization for a given type of transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeVersionOne()`

```go
func deserializeVersionOne(bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization for a version one transaction.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeTransfer()`

```go
func deserializeTransfer(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "transfer" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeSecondSignatureRegistration()`

```go
func deserializeSecondSignatureRegistration(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "second signature registration" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeDelegateRegistration()`

```go
func deserializeDelegateRegistration(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "delegate registration" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeVote()`

```go
func deserializeVote(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "vote" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeMultiSignatureRegistration()`

```go
func deserializeMultiSignatureRegistration(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "multi signature registration" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeIpfs()`

```go
func deserializeIpfs(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "ipfs" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeTimelockTransfer()`

```go
func deserializeTimelockTransfer(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "timelock transfer" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeMultiPayment()`

```go
func deserializeMultiPayment(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "multi payments" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `deserializeDelegateResignation()`

```go
func deserializeDelegateResignation(assetOffset int, bytes []byte, transaction *Transaction) *Transaction
```

Handle the deserialization of "delegate resignation" data

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | assetOffset | Yes | Offset |
| \[\]byte | bytes | Yes | ... |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*Transaction`

### `serializeTransfer()`

```go
func serializeTransfer(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeSecondSignatureRegistration()`

```go
func serializeSecondSignatureRegistration(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "second signature registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeDelegateRegistration()`

```go
func serializeDelegateRegistration(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "delegate registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeVote()`

```go
func serializeVote(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "vote" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeMultiSignatureRegistration()`

```go
func serializeMultiSignatureRegistration(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "multi signature registration" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeIpfs()`

```go
func serializeIpfs(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "ipfs" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeTimelockTransfer()`

```go
func serializeTimelockTransfer(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "timelock transfer" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeMultiPayment()`

```go
func serializeMultiPayment(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "multi payment" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

### `serializeDelegateResignation()`

```go
func serializeDelegateResignation(buffer *bytes.Buffer, transaction *Transaction) *bytes.Buffer
```

Handle the serialization of "delegate resignation" data.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*bytes.Buffer | buffer | Yes | Buffer |
| \*Transaction | transaction | Yes | Transaction |

#### Return Value

`*bytes.Buffer`

## crypto.transaction

### `GetId()`

```go
func (transaction *Transaction) GetId() string
```

Convert the byte representation to a unique identifier.

#### Return Value

`string`

### `Sign()`

```go
func (transaction *Transaction) Sign(passphrase string)
```

Sign the transaction using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Passphrase |

### `SecondSign()`

```go
func (transaction *Transaction) SecondSign(passphrase string)
```

Sign the transaction using the given second passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | passphrase | Yes | Second passphrase |

### `Verify()`

```go
func (transaction *Transaction) Verify() (bool, error)
```

Verify the transaction.

#### Return Value

`bool, error`

### `SecondVerify()`

```go
func (transaction *Transaction) SecondVerify(secondPublicKey *PublicKey) (bool, error)
```

Verify the transaction with a second public key.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*PublicKey | secondPublicKey | Yes | Second public key |

#### Return Value

`(bool, error)`

### `ParseSignatures()`

```go
func (transaction *Transaction) ParseSignatures(startOffset int) *Transaction
```

Parse the signature, second signature and multi signatures.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| int | startOffset | Yes | Offset |

#### Return Value

`*Transaction`

### `ToMap()`

```go
func (transaction *Transaction) ToMap() map[string]interface{}
```

Convert the transaction to its map representation.

#### Return Value

`map[string]interface{}`

### `ToJson()`

```go
func (transaction *Transaction) ToJson() (string, error)
```

Convert the transaction to its JSON representation.

#### Return Value

`string, error`

### `ToBytes()`

```go
func (transaction *Transaction) ToBytes(skipSignature, skipSecondSignature bool) []byte
```

Convert the transaction to its byte representation.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| bool | skipSignature | No | Skip first signature |
| bool | skipSecondSignature | No | Skip second signature |

#### Return Value

`[]byte`

### `Serialize()`

```go
func (transaction *Transaction) Serialize() []byte
```

Perform AIP11 compliant serialization

#### Return Value

`[]byte`

## crypto.message

### `SignMessage()`

```go
func SignMessage(message string, passphrase string) (*Message, error)
```

Sign a message using the given passphrase.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| string | message | Yes | Message |
| string | passphrase | Yes | Passphrase |

#### Return Value

`*Message, error`

### `Verify()`

```go
func (message *Message) Verify() (bool, error)
```

Verify the message content.

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*Message | message | Yes | Message |

#### Return Value

`bool, error`

### `ToMap()`

```go
func (message *Message) ToMap() map[string]interface{}
```

Convert the message to its map representation

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*Message | message | Yes | Message |

#### Return Value

`map[string]interface{}`

### `ToJson()`

```go
func (message *Message) ToJson() (string, error)
```

Convert the message to its JSON representation

#### Parameters

| Type | Name | Required | Description |
| :--- | :--- | :--- | :--- |
| \*Message | message | Yes | Message |

#### Return Value

`string`

## crypto.slot

### `GetTime()`

```go
func GetTime() int32
```

Get the time diff between now and network start.

#### Return Value

`int32`

### `GetEpoch()`

```go
func GetEpoch() uint32
```

Get the network start epoch.

#### Return Value

`uint32`
