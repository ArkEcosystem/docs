---
title: Complementary Examples
---

# Complementary Examples

## Prerequisites

Before we get started we need to make sure that all of the required dependencies are installed. These dependencies are the [Crypto SDK](/docs/sdk/java/crypto/api-documentation) and [Client SDK](/docs/sdk/java/client/api-documentation). You can head on over to their documentations to read more about them but for now we are only concerned with installing them to get up and running.

Open your project and include the following dependencies for both SDKs. If you encounter any errors, please [open an issue](https://github.com/ArkEcosystem/core/issues/new) with as much information as you can provide so that our developers can have a look and get to the bottom of the issue.

### Gradle

```java
implementation 'org.arkecosystem:crypto:1.2.9'
```

```java
implementation 'org.arkecosystem:client:1.2.9'
```

### Maven

```markup
<dependency>
  <groupId>org.arkecosystem</groupId>
  <artifactId>crypto</artifactId>
  <version>1.2.9</version>
</dependency>
```

```markup
<dependency>
  <groupId>org.arkecosystem</groupId>
  <artifactId>client</artifactId>
  <version>1.2.9</version>
</dependency>
```

## Complementary Examples

### Transfer - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.TransferBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class Transfer {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());

        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type","application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new TransferBuilder()
                .recipient("Address of Recipient")
                .amount(10^8)
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;

        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }
}
```

<x-alert type="info">
The vendorField is optional and limited to a length of 255 characters. It can be a good idea to add a vendor field to your transactions if you want to be able to easily track them in the future.
</x-alert>

### Second Signature - Creating and Broadcasting

```java
package transactions;

import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.SecondSignatureRegistrationBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class SecondSignature {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());

        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce").toString());
        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new SecondSignatureRegistrationBuilder()
                .nonce(nonce)
                .signature("this is a top secret second passphrase")
                .sign("this is a top secret passphrase")
                .transaction;

        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);
    }
}
```

### Delegate Registration - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.DelegateRegistrationBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class DelegateRegistration {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());
        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new DelegateRegistrationBuilder()
                .username("johndoe")
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;

        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }
}
```

### Vote - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.VoteBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;

public class Vote {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());
        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new VoteBuilder()
                .addVotes(Arrays.asList("+public_key_of_a_delegate_wallet"))
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;

        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }

}
```

<x-alert type="info">
Note the **plus** prefix for the public key that is passed to the **votes** function. This prefix denotes that this is a transaction to remove a vote from the given delegate.
</x-alert>

### Unvote - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.VoteBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;

public class Vote {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());
        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new VoteBuilder()
                .addVotes(Arrays.asList("-public_key_of_a_delegate_wallet"))
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;

        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }

}
```

<x-alert type="info">
Note the **minus** prefix for the public key that is passed to the **votes** function. This prefix denotes that this is a transaction to add a vote to the given delegate.
</x-alert>

### IPFS - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.IpfsBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class Ipfs {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());
        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new IpfsBuilder()
                .ipfsAsset("QmR45FmbVVrixReBwJkhEKde2qwHYaQzGxu4ZoDeswuF9c")
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;

        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }
}
```

### Multi Payment - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.MultiPaymentBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class MultiPayment {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());

        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type","application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new MultiPaymentBuilder()
                .addPayment("Address of Recipient Wallet 1", 10^8)
                .addPayment("Address of Recipient Wallet 2", 10^8)
                .addPayment("Address of Recipient Wallet 3", 10^8)
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;

        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);
    }
}
```

### Delegate Resignation - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.DelegateResignationBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class DelegateResignation {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());
        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new DelegateResignationBuilder()
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;

        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }
}
```

<x-alert type="info">
A delegate resignation has to be sent from the delegate wallet itself to verify its identity.
</x-alert>

### HTLC Lock - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.enums.HtlcLockExpirationType;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.HtlcLockBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class HtlcLock {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());
        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new HtlcLockBuilder()
                .secretHash("0f128d401958b1b30ad0d10406f47f9489321017b4614e6cb993fc63913c5454")
                .expirationType(HtlcLockExpirationType.BLOCK_HEIGHT, 43671000)
                .amount(10^8)
                .recipientId("Address of Recipient")
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;


        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }
}
```

### HTLC Claim - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.HtlcClaimBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class HtlcClaim {

    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());
        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new HtlcClaimBuilder()
                .htlcClaimAsset("943c220691e711c39c79d437ce185748a0018940e1a4144293af9d05627d2eb4",
                        "c27f1ce845d8c29eebc9006be932b604fd06755521b1a8b0be4204c65377151a")
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;


        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }
}
```

<x-alert type="info">
The **unlockSecret** has to be a SHA256 hash of the plain text secret that you shared with the person that is allowed to claim the transaction.
</x-alert>

### HTLC Refund - Creating and Broadcasting

```java
import com.google.gson.internal.LinkedTreeMap;
import org.arkecosystem.client.Connection;
import org.arkecosystem.crypto.configuration.Network;
import org.arkecosystem.crypto.networks.Devnet;
import org.arkecosystem.crypto.transactions.builder.HtlcRefundBuilder;
import org.arkecosystem.crypto.transactions.types.Transaction;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class HtlcRefund {
    public static void main(String[] args) throws IOException {
        // Set the network
        Network.set(new Devnet());
        // Make configurations and connect to the node
        HashMap<String, Object> configurations = new HashMap<>();
        configurations.put("host", "https://dexplorer.ark.io/api/");
        configurations.put("content-type", "application/json");
        Connection connection = new Connection(configurations);

        // Retrieve the sequential nonce
        long nonce = Long.parseLong(((LinkedTreeMap<String, Object>) connection.api()
                .wallets
                .show("YOUR_SENDER_WALLET_ADDRESS")
                .get("data"))
                .get("nonce")
                .toString());

        // Increment it by one
        nonce++;

        // Create the transaction
        Transaction actual = new HtlcRefundBuilder()
                .htlcRefundAsset("2fad9edeafbdbaa7253e2a56e0aa077957da613497883923a053fca5f6fae8d6")
                .nonce(nonce)
                .sign("this is a top secret passphrase")
                .transaction;


        // Add transaction to payload
        ArrayList<HashMap> payload = new ArrayList<>();
        payload.add(actual.toHashMap());

        // Broadcast the transaction
        LinkedTreeMap<String, Object> broadcastResponse = connection.api().transactions.create(payload);

        // Log the response
        System.out.println(broadcastResponse);

    }
}
```
