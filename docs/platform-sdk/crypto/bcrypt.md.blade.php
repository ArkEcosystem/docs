---
title: bcrypt
---

# bcrypt

The `Bcrypt` class provides methods to extract the numerical value out of any currency representation by normalising the input and removing any locale specific rules like symbols and use of commas.

### Importing the Bcrypt class

```typescript
import { Bcrypt } from "@arkecosystem/platform-sdk-crypto";
```

### Hash a value

```typescript
Bcrypt.hash("password");
```

### Verify that a value matches the expected hash

```typescript
Bcrypt.verify(Bcrypt.hash("password"), "password");
```
