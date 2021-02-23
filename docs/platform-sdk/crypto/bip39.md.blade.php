---
title: BIP39
---

# BIP39

The `BIP39` class provides methods to extract the numerical value out of any currency representation by normalizing the input and removing any locale specific rules like symbols and use of commas.

### Importing the BIP39 class

```typescript
import { BIP39 } from "@arkecosystem/platform-sdk-crypto";
```

### Generate a mnemonic

```typescript
BIP39.generate();
```

### Validate a mnemonic

```typescript
BIP39.validate('scout mushroom doctor prepare identify obvious soccer stage sudden already brass december million wish flower');
```

### Turn a mnemonic into a seed

```typescript
BIP39.toSeed('scout mushroom doctor prepare identify obvious soccer stage sudden already brass december million wish flower');
```

### Normalize a passphrase

```typescript
BIP39.normalize("조건 열흘 무슨 인쇄 송편 올가을 질서 청년 추천 개인 균형 많이 여대생 회관 불안");
```
