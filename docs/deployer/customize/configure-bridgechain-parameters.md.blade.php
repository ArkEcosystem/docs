---
title: Configure Bridgechain Parameters
---

# Configure Bridgechain Parameters

Now that we've covered the basics, let's dig deeper into the parameters you need to set in this second step.

## Number of Forgers

Is the number of special nodes that are responsible for the creation of blocks. Where Bitcoin has miners that are responsible for adding transactions and creating new coins, ARK has _forging delegates_ instead, with its public network utilizing 51 of them. If you declare a larger _number of forgers_, your network will become more decentralized. However, a larger number of forgers also comes with longer block propagation and confirmation times. You will need to strike your own balance for decentralization and performance based on your needs. We also recommend using a prime number to avoid the rare case of a multi-way deadlock between forks \(ARK is discussing increasing its public network's forger count to 53\). Lastly, we recommend keeping the number of forgers under 200 unless you are an advanced user. Some recommended pairs might be something like:

* 21 forgers @ 5 seconds.
* 53 forgers @ 8 seconds.
* 101 forgers @ 12 seconds.
* 199 forgers @ 18 seconds.

[Check here](https://www.google.com/search?q=all+prime+numbers+between+1+and+200) for a list of all prime numbers up to 200.

## Blocktime \(seconds\)

Is a constant in seconds that tells us how much time passes between the creation of each block. This correlates with the number of forgers on the network. The higher number of forgers you choose, the bigger propagation time it will need. If you choose a number that is too low, it will make your network highly unstable and prone to forking. Higher blocktimes make your network more stable, and as a rule of thumb we recommend that you use ARK's parameters as a base \(51 forgers at 8 second block times\). Another note to mention is that shorter block times mean that there will be more blocks to sync for future nodes that join the network and need to create a copy of the ledger \(shorter block times = longer sync times\). We also recommend a whole number for convenience purposes. Be advised, you should test any network under 5 seconds thoroughly.

## Number of Transactions Per Block

Is the maximum amount of transactions that can enter a single block before becoming full. This correlates with performance, so the higher the number, the higher the propagation and confirmation time needed for blocks on the network. We suggest to keep it under 300, and based on your custom forger count and block times, testing is key. The ARK mainnet currently operates at 150 transactions per block, but this can be upgraded as needed. _Number of Transactions per Block_ essentially determines at what point pending transactions will need to wait and remain in the unconfirmed pool until the next block.

## Total Premine

Is the amount of coins generated during the creation of the _genesis block,_ and the number of the initial supply of coins that will circulate on your network. This number is entirely up to you and your economic design. The total premine could be billions of coins or zero coins. ARK's premine was 125 million coins that were then distributed accordingly.

## Forging Rewards

Are an optional feature of your network. This depends on if you want to have a deflationary or inflationary token supply, and as such you can enable or disable rewards with a simple toggle. The primary purpose of forging rewards is to incentivize forging nodes to stay operational. If you disable forging rewards, you will need to be sure to provide an incentive for forging nodes to operate by having them collect transaction fees for example. You could even provide some off-chain incentive such as private incentive agreements with node operators, depending on the nature of your chain.

### Forging Reward Per Block

This is the number of coins that are created and awarded to the forger who injects a new block into the ledger. The forging reward combines with _Block Time_ to determine the inflation rate of the token. For example, the ARK Public Network's forging reward is 2 ARK per block. With the ARK Mainnet's block times at 8 seconds, this has the capability to add 7,884,000 new tokens to the supply each year. A fixed reward per block results in a declining inflation rate in terms of percentage each year, based on the premine quantity and years in operation. The forging reward also convolves with _Number of Forgers_ to determine the income of each forger per day/week/month/year. This number should be high enough to compensate nodes appropriately, but not so high that it exposes the downsides of inflation.

### Forging Reward Start Height

Is the block number at which you want to start rewarding forgers. With this variable you can postpone the rewards for forgers. Blocks before the _Forging Reward Start Height_ won't have any rewards. This is a useful feature when you want to postpone rewards until the network's genesis delegates have been fully replaced. You can easily calculate on when rewards will start by multiplying _Block Time_ with the block height you specify here. To start rewards immediately, enter 1. The ARK Public Network started block rewards at height 75600. At 8 second block times, this means rewards started on the ARK Mainnet after approximately one week.

## VendorField Length

Is the maximum around of characters permitted in the vendorField with each transaction. The vendorField can be used to send a custom message to the recipient of a transaction. It is recommended to set the vendorField length between **64 to 255** unless a specific use case requires an increased length.
