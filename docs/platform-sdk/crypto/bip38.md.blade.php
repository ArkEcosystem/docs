---
title: BIP38
---

# BIP38

The `BIP38` class provides methods to extract the numerical value out of any currency representation by normalising the input and removing any locale specific rules like symbols and use of commas.

### Importing the BIP38 class

```typescript
import { BIP38 } from "@arkecosystem/platform-sdk-crypto";
```

### Encrypt a buffer with the given mnemonic

```typescript
BIP38.encrypt(someBuffer, "password");
```

### Decrypt a string with the given mnemonic

```typescript
BIP38.decrypt(BIP38.encrypt(someBuffer, "password"), "password");
```

### Decrypt a string with the given mnemonic

```typescript
BIP38.verify(BIP38.encrypt("message", "password"));
```
