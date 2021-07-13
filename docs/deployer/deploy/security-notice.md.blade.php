---
title: Security Notice
---

# Security Notice

Now that you have deployed your network, distributed tokens and set up live forging delegates, it’s important to destroy your genesis node for security purposes by deleting the VPS or wiping the Core installation on the genesis node server in question. It’s imperative that nobody get access to your genesis delegate passphrases.

**There are two things to keep in mind before you do this.**

1. Be sure your network is healthy enough to survive without the genesis node. This means all genesis delegates have been replaced with reliable live forging delegates, and genesis delegates are no longer in the forging list.
2. If genesis delegates were still in the forging list when the **Block Reward Start Height** was met (in Basic bridgechain configuration this is about one week after genesis block), the genesis delegates would have started collecting block rewards. You may wish to send those funds to a new address before destroying genesis delegate passphrases, unless you wish to burn those tokens.
3. Ensure that your bridgechain is always up to date with the latest Core release. Releases include important security patches that are essential to keep your bridgechain secure!

Backing up the genesis wallet passphrases offline is up to you. You may need to prove you founded the chain in the future or something similar by signing a transaction.

**Additional Security Note:** Do not run two different live forging delegate nodes with the same delegate address loaded and both forger processes running at any time!
