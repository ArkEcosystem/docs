---
title: Transaction Types - Username Registration
---

# Username Registration

A user or organization can register the username to their address. Single wallet can contain only one username. Username can be used to identify the wallet in the network. Username is unique to the address and other wallets cannot use the same username until it is free again. Username transaction can be called multiple time to set or update the username.

## Username schema

Transaction can register **username** with the follwing properties:

- minimum length of 1 character
- maximum length of 20 characters
- only lowercase letters, numbers and underscores are allowed
- cannot start or end with underscore
- cannot contain two or more consecutive underscores

Check out the [Username Registration Transaction - Schema](https://github.com/ArkEcosystem/mainsail/blob/f831da020d0dd13c441bd2c84b597f9df89a5672/packages/crypto-transaction-username-registration/source/validation/schemas.ts#L4-L7) for implementation.
