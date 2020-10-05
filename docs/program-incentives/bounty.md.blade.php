---
title: Development and Security Bounty Program
---

# Development and Security Bounty Program

**Our primary focus at ARK has always been on development. Without an amazing product, nothing else ultimately matters. In an open-source project such as ARK, advancing the codebase to the next level requires help from the wider community. With our Development and Security Bounty Program anyone can participate and earn rewards for contributions in ARK.**

The ARK development bounty program has been updated. Previous years have taught us how to improve the program and make it fairer for participants, with revised tiers so everyone can predict their earnings. The revised program will emphasize quality over quantity.

### ARK’s GitHub is available at [https://github.com/ArkEcosystem](https://github.com/ArkEcosystem)

Payments will be made at the beginning of each month for the prior month and will be paid in ARK with USD valuation at the time of the payout.

## GitHub Development Bounty Program

We have decided to group PRs into tiers depending on their impact, code quality, test coverage, and complexity. This will bring more stability to our program and participants can anticipate how much their contributions will earn them.

***Since ARK often hires from the community, this program is also a way to show your enthusiasm, skills, ethics and could lead to a position as a full-time developer for ARK. Most of our current developers started with participation in our GitHub program.***

We are also going to be opening custom issues and projects for anyone to tackle with predefined higher awards (due to the complexity) that any developer who has the skills to complete it can take point on. Make sure to keep an eye on our GitHub repository issues if you want to participate. These issues will have pre-assigned Tier 0 tags with custom monetary awards.

The tiers serve as guidelines/frames and can vary based on the impact/size of the PR. Linting/code format PRs will be rejected as those will be automatically done by our ARK Ecosystem Bot.

All PRs that are code related need to be accompanied by tests or they will not be merged.

### $200 PRs — Tier 1

***Awarded for very large features, refactorings, improvements.***

Really large or heavily requested feature additions, possibly performance improvements if they really make a big difference (e.g. loading 100 wallets in 1 second instead of 20, but that also required more than changing 1 line of code). Examples of this include extending API functionalities, resolving structural issues that cause circular dependencies, or adding a new bigger feature to our codebase (an example would be settings page to the explorer, adding new identicons package to the desktop wallet or a new plugin in the Core).

### $100 PRs — Tier 2

***Awarded for large features, refactorings, improvements.***

Large features (that were most likely requested in an issue before) or large performance improvements. An example would be optimizing some parts of the Core for improved performance of a specific function, implementing a new feature in the desktop wallet or writing large documentation files that require a good understanding of the ARK code.

### $50 PRs — Tier 3

***Awarded for medium features, refactorings, improvements.***

These pull requests cover medium refactors or optimizations of the code or additions of small non-essential features. An example of this would be reducing complexity or improving the performance of existing code, improving the readability of the code or writing new documentation files, which bring added value to the ecosystem.

### $20 PRs — Tier 4

***Awarded for small features, refactorings, improvements.***

Regular small tier pull requests that fix small bugs, improve existing functionality or adds a new test. Examples of this include adding more test coverage for existing functionality or resolving small bugs that usually get reported by users.

*Typos, link changes, small documentation updates, dependency updates, styling/linting, mostly non-code related work don’t constitute a monetary reward contribution but will earn you an attribution spot in our monthly developer blog posts (if no other monetary PRs were done).*

### Monthly “Top Contributors” Bonus

***But that is not all! To bring some competition into our bounty program, we are introducing an additional rule that will reward the top 3 contributors each month:***

- ***20% BONUS: *#1 Monthly Contributor (USD sum of all merged PRs)*** - The number 1 contributor will receive a +20% bonus on their total USD sum (eg. if the biggest sum of individual contributions is $1,000 that total will be eligible for +20% bonus, for a total payout of $1,200 USD).

* ***10% BONUS: *#2 Monthly Contributor (USD sum of all merged PRs)*** - The number 2 contributor will receive a +10% bonus on their total USD sum (eg. the second biggest sum of individual contributions is $800, this will be eligible for +10% bonus for a total payout of $880 USD).

* ***5% BONUS: *#3 Monthly Contributor (USD sum of all merged PRs)*** - The number 3 contributor will receive a +5% bonus on their total USD sum (eg. the third biggest sum of individual contributions is $600, this will be eligible for +5% bonus for a total payout of $630 USD).

*Note: In case of a tie in sum value the person with a lesser number of tier-1 to tier-4 PRs wins (as that means less but bigger impact pull-requests). If there is a tie even with that and some person has some other non-valued PR’s that person will win. If by any chance the number of tier-1 to tier-4 PRs is tied (without other non-valued PRs or the same amount of them), the bonus percentages get added up and divided over the tied contributors (if two people tied for first place, we will add the first and second % bonuses (20%+10%) and divide them so each will get a 15% bonus).*

**This does not apply to Tier 0 bounties which are custom proposals with a set contract and monetary award at the completion of milestones and security vulnerabilities.*

### Custom — Tier 0

If you want to work on much bigger changes or custom projects that you don’t think fit any of the above tiers contact us at [info@ark.io](http://info@ark.io).

Some examples of what a custom tier 0 could cover — developing new modules for Core that bring in new functionalities (PoW module instead of DPoS), different voting systems, proxy voting, implementing AIPs, desktop wallet plugins, extended Explorer features, …

Some issues will also have labels with custom (usually higher) values that you can take on. Labels on those issues will have a defined monetary value, so if you see these available you can request to take point on resolving them. Upon completion and review, you will receive payment in ARK.

## Security Vulnerability Disclosure Program

No software is ever perfect. Even fully vetted production releases can often have awkward bugs or security vulnerabilities that manage to slip through the cracks. We take the security of the ARK network very seriously and want to do everything we can to encourage and incentivize responsible and timely reporting of any discovered vulnerabilities in our code. To do this, we provide a vulnerability reporting process that includes monetary rewards for bugs or errors in the [ARK Core](https://github.com/ArkEcosystem/core) that could potentially harm or exploit the ARK network.

Security vulnerability disclosures are weighed based on the impact to the network and assigned a tier which determines the range of payment provided for proper disclosure. Patches are not required to receive payment for a vulnerability disclosure but any recommendations on potential mitigations are appreciated and welcome.

*Note: All disclosures are examined on a case by case basis given the nature of the disclosed vulnerability and the impact on the network. Examples given are for reference only and do not indicate the potential for final determination.*

**Github Repository: [https://github.com/ArkEcosystem/core](https://github.com/ArkEcosystem/core)**.

## Security Vulnerability Classifications

Below you will find several examples that outline the current tier structure and potential vulnerabilities that might fit into each category.

This information is subject to change and current information will always be available at [https://ark.io/sv](https://ark.io/sv).

**Critical Vulnerabilities: $5,000 — $10,000**

Security vulnerabilities that have critical, usually irreversible or irreparable implications to the network or its infrastructure.

*Examples: making ARK out of thin air, spending someone else’s ARK without the need of their private keys, replaying the same transaction multiple times without the need of private keys, exposing private keys via public methods, taking control of the entire network, permanently forking the network or a way to permanently destroy the integrity of the ARK blockchain without requiring a malicious delegate.*

**Severe Vulnerabilities: $2,000 — $3,000**

Security vulnerabilities that cause severe problems to the networks for prolonged periods and usually don’t have irreparable implications.

*Examples: stopping the whole network for longer periods of time, bringing majority / all delegates down, get into the blockchain DB invalid data (transaction, blocks).*

**Moderate Vulnerabilities: $500 — $1,500**

Security vulnerabilities that can cause moderate, temporary problems, but don’t expose any private data or cause permanent harm.

*Examples*: *slow down block propagation or the network, stop the network for a shorter period of time, making replay attacks under some restricted circumstances.*

**Basic Vulnerabilities: $100 — $300**

Security vulnerabilities that usually have no impact on the whole blockchain infrastructure, but can still pose problems for some specific things.

*Examples*: *things that only affect a subset of nodes (e.g. hardware failures caused by an attack when the server satisfies the minimum requirements specified, inconveniences caused by a malicious delegate).*

***To report a possible security vulnerability, please include your name, preferred contact information, a full disclosure report, and a method to reproduce the issue being reported and email the information to [security@ark.io](mailto:security@ark.io)*** ***with the title “Security Vulnerability Report”.***

## Security Vulnerability Guidelines

To be eligible for compensation for reporting of a valid security vulnerability, researchers must meet the following criteria:

* In order to receive payment, a proper invoice and personal information must be provided.

* The Researcher must never have publicly disclosed the exploit or vulnerability.

* The Researcher must not maliciously initiate an exploit on ARK Public Network. If testing is required for a potential vulnerability or to reproduce it, please use [ARK Development Network](https://dexplorer.ark.io) or set up your own [local ARK-based chain](https://learn.ark.dev/core-getting-started/spinning-up-your-first-testnet).

* The Researcher must be able to completely reproduce and demonstrate the vulnerability or provide valid instructions so that our development team can do the same. This will allow us to properly test any patches prior to release.

* Before reporting a security vulnerability, the Researcher should review public branches and the latest commits to see if the team is currently aware of the vulnerability. If after review the Researcher believes the security vulnerability is still present, a report should be submitted.

*Disclaimer: Category of the severity of the disclosure and all monetary decisions are at the sole discretion of the ARK.io Team and are final. Exploits that make indirect use of already known issues may not be eligible for payment. Examples are for reference only and do not impact or predict potential classification or payment. Past evaluations of security vulnerabilities are not indicative of future evaluations. Security vulnerabilities are paid in ARK or BTC based on the daily average rate before the payout at the sole discretion of the ARK.io Team. Please direct any questions to [security@ark.io](mailto:security@ark.io) with the title “SV Program Help”.*

### This all looks awesome. How can I get started?

You can browse through a selection of our GitHub repositories at [https://github.com/ArkEcosystem](https://github.com/ArkEcosystem)

Please make sure to read our contributing guidelines and follow instructions there: [Contribution Guidelines](/docs/program-incentives/)

### Meet ARK Ecosystem GitHub Bot

![](https://cdn-images-1.medium.com/max/2000/1*-LjqtX_gYUP6Akzz-hcX7w.png)

[ARK Ecosystem Github Bot](https://github.com/arkecosystembot) will help you with bounties, inform you when merges occur, list your rewards and help with linting/formatting. Github Bot will be upgraded as we get input from the community.

The ARK GitHub Bot will also be tied into our new upcoming website. Which will visually highlight top earners, stats, number of accepted PR’s and much more.

## Want to chat with other developers and brainstorm on new exciting ideas or share your thoughts?

1. [Join ARK Slack](https://ark.io/slack)

Submitting PR (Pull-Request) is a tacit agreement of the ongoing terms. The decision of the monetary reward is the sole responsibility of the ARK team, and no appeals will be taken. We reserve the right to change any rules and rewards on monthly basis, changes will be updated on the first or second of the month on this page, so you will always know what to expect for the current month.*



