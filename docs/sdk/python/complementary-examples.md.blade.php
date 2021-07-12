---
title: Complementary Examples
---

# Complementary Examples

## Prerequisites

Before we get started we need to make sure that all of the required dependencies are installed. These dependencies are the Crypto SDK and Client SDK. You can head on over to their documentations to read more about them but for now we are only concerned with installing them to get up and running.

Open your project and execute the following commands to install both SDKs. Make sure that those complete without any errors. If you encounter any errors, please open an issue with as much information as you can provide so that our developers can have a look and get to the bottom of the issue.

```bash
pip install arkecosystem-crypto
pip install arkecosystem-client
```

Now that we're setup and ready to go we'll look into some examples for the most common tasks you'll encounter when wanting to interact with the ARK Blockchain.

## Creating and Broadcasting a Transfer

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.transfer import Transfer

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = Transfer(
    recipientId='YOUR_RECIPIENT_ADDRESS',
    amount=200000000,
    vendorField="Hello World"
)
transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

<x-alert type="info">
The vendorField is optional and limited to a length of 255 characters. It can be a good idea to add a vendor field to your transactions if you want to be able to easily track them in the future.
</x-alert>

## Creating and Broadcasting a Second Signature

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.second_signature_registration import SecondSignatureRegistration

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = SecondSignatureRegistration('this is a top secret second passphrase')

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

## Creating and Broadcasting a Delegate Registration

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.delegate_registration import DelegateRegistration

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = DelegateRegistration('johndoe')

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

## Creating and Broadcasting a Vote

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.vote import Vote

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = Vote('+0296893488d335ff818391da7c450cfeb7821a4eb535b15b95808ea733915fbfb1')

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

<x-alert type="info">
Note the **plus** prefix for the public key that is passed to the **Vote** constructor. This prefix denotes that this is a transaction to remove a vote from the given delegate.
</x-alert>

## Creating and Broadcasting an Unvote

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.vote import Vote

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = Vote('-0296893488d335ff818391da7c450cfeb7821a4eb535b15b95808ea733915fbfb1')

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

<x-alert type="info">
Note the **minus** prefix for the public key that is passed to the **Vote** constructor. This prefix denotes that this is a transaction to remove a vote from the given delegate.
</x-alert>

## Creating and Broadcasting a Multi Signature

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.multi_signature_registration import MultiSignatureRegistration

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = MultiSignatureRegistration()
transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)

transaction.set_sender_public_key('YOUR_SENDER_WALLET_PUBLIC_KEY')
transaction.set_min(2)
transaction.set_public_keys([
    'participant_1_pk',
    'participant_2_pk'
])
transaction.multi_sign('participant_1_passphrase', 0)
transaction.multi_sign('participant_2_passphrase', 1)

transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

## Creating and Broadcasting a IPFS

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.ipfs import IPFS

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = IPFS('QmYSK2JyM3RyDyB52caZCTKFR3HKniEcMnNJYdk8DQ6KKB')

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

## Creating and Broadcasting a Multi Payment

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.multi_payment import MultiPayment

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = MultiPayment()

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.add_payment(1, 'D6Z26L69gdk9qYmTv5uzk3uGepigtHY4ax')
transaction.add_payment(2, 'DNjuJEDQkhrJ7cA9FZ2iVXt5anYiM8Jtc9')
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

## Creating and Broadcasting a Delegate Resignation

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.delegate_resignation import DelegateResignation

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = DelegateResignation()

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

<x-alert type="info">
A delegate resignation has to be sent from the delegate wallet itself to verify its identity.
</x-alert>

## Creating and Broadcasting a HTLC Lock

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.htlc_lock import HtlcLock
import hashlib

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Secret hash is sha256 of the sha256 hash of the original message
secret_hash = hashlib.sha256(hashlib.sha256('hello'.encode('utf-8')).hexdigest().encode('utf-8')).hexdigest()

# Step 2: Create the transaction
transaction = HtlcLock(
    recipient_id='YOUR_RECIPIENT_ADDRESS',
    secret_hash=secret_hash,
    expiration_type=1,
    expiration_value=1504193605
)

transaction.set_amount(5)
transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

## Creating and Broadcasting a HTLC Claim

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.htlc_claim import HtlcClaim
import hashlib

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Unlock secret is the sha256 hash of the original message
unlock_secret = hashlib.sha256('hello'.encode('utf-8')).hexdigest()

# Step 2: Create the transaction
transaction = HtlcClaim('LOCK_TRANSACTION_ID', unlock_secret)

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```

<x-alert type="info">
The **unlockSecret** has to be a SHA256 hash of the plain text secret that you shared with the person that is allowed to claim the transaction.
</x-alert>

## Creating and Broadcasting a HTLC Refund

```python
from client import ArkClient
from client.exceptions import ArkHTTPException
from crypto.constants import TRANSACTION_TYPE_GROUP
from crypto.configuration.network import set_network
from crypto.networks.devnet import Devnet
from crypto.transactions.builder.htlc_refund import HtlcRefund

# Set your network
set_network(Devnet)

# Configure our API client
client = ArkClient('https://dexplorer.ark.io/api')

# Step 1: Retrieve the incremental nonce of the sender wallet
senderWallet = client.wallets.get('YOUR_SENDER_WALLET_ADDRESS')
nonce = int(senderWallet['data']['nonce']) + 1

# Step 2: Create the transaction
transaction = HtlcRefund(
    lock_transaction_id='LOCK_TRANSACTION_ID'
)

transaction.set_type_group(TRANSACTION_TYPE_GROUP.CORE)
transaction.set_nonce(nonce)
transaction.schnorr_sign('this is a top secret passphrase')

# Step 3: Broadcast the transaction
try:
    broadcastResponse = client.transactions.create([transaction.to_dict()])
except ArkHTTPException as exception:
    print(exception.response.json())

# Step 4: Log the response
print(broadcastResponse)
```
