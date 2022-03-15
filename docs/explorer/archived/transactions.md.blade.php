---
title: How to Add New Transaction Types
---

# How to Add New Transaction Types

<x-alert type="info">
The following archived information only serves as a reference to the prior VueJS implementation of the Explorer which now resides [here.](https://github.com/ArkEcosystemArchive/explorer)
</x-alert>

By default the ARK Explorer will work with new transaction types by treating them like transfers (type 0). This may not be the correct way to fully utilize the properties your new transaction type has, so lets take a look at the components that are involved.

## Transaction Enums

> [src/enums.ts](https://github.com/ArkEcosystem/explorer/blob/master/src/enums.ts)

The first thing you will want to adjust are the `enum` options that are currently available. It's a good practice to not rely on magic numbers when checking transaction types, so instead it's advised to add your new transaction type in here so you can use it throughout the Explorer by referring to the enum value. It's preferred if you add a new type for your custom transactions, and not add it to the existing `core` and `magistrate` enums.

## Transaction Selection Dropdown

> [src/components/SelectionType.vue](https://github.com/ArkEcosystem/explorer/blob/master/src/components/SelectionType.vue)

This component shows the dropdown options that are for example shown on the homepage, letting you filter transactions on a certain type. To make it possible to sort on your custom type, you will have to extend the array in this component with the required information.

## i18n

> [src/locales/\*.ts](https://github.com/ArkEcosystem/explorer/tree/master/src/locales)

All texts used throughout the Explorer, are stored in language files. This means that when you are adding new texts for your custom transaction types, you should be adding them to this file and referring to it throughout the Explorer components.

## Interfaces

> [src/interfaces.ts](https://github.com/ArkEcosystem/explorer/blob/master/src/interfaces.ts)

Within this file you will find certain interfaces and their definitions. This include a generic transaction interface. Depending on the changes you made to your new transaction type, it might be necessary to extend this interface to match the new / changed properties. This is not needed if the new transaction type only has its properties contained in the `asset` property, as that is not covered in the interface definition.

## TransactionService

> [src/services/transaction.ts](https://github.com/ArkEcosystem/explorer/blob/develop/src/services/transaction.ts)

In this file you will find the communication being done with the API. In case your transaction types end up adding new endpoints (e.g. like a `lock` endpoint for timelocks), you will have to add a function to this file to fetch that kind of data.

## LinkWallet

> [src/components/Links/LinkWallet.vue](https://github.com/ArkEcosystem/explorer/blob/master/src/components/links/LinkWallet.vue)

This component handles linking to wallets in the Explorer and can set specific properties based on a transaction type, such as:

* A simple link to an address, which will be shortened depending on the screen size
* Specific indications for a special transaction, such as listing `delegate registration` instead of the sender wallet
* Certain preprocessing of a transaction to show more information, for example a multipayment that includes the total amount of recipients

In short, you will want to look into this component when your new transaction type should show up in tables as more than a simple sender / receiver pair.

## Tables

> [src/components/tables/\*.vue](https://github.com/ArkEcosystem/explorer/blob/master/src/components/tables)

The Explorer consists mostly of tables that show information fetches from the blockchain. These tables have specific column that fit a general transaction, but if you require different columns to show properties of your new transaction type (e.g. `businesses` or `timelock`), you will want to add a new table component in this directory to properly show it. The simplest way would be to take a look at how the other tables are constructed here, and create your own version with the columns you need.

Please note that there are desktop and mobile versions of the tables, where the desktop one is a traditional table with rows, while the mobile version consists of larger 'rows' (more like blocks) with the transaction data.

After you have added a new table, you will have to include it on a page in order to have it show up on the Explorer. You can find existing pages in `src/pages/*` where you can add your new table to an existing page or create a new page if needed.

## Transaction Details

> [src/components/transaction/Details.vue](https://github.com/ArkEcosystem/explorer/blob/master/src/components/transaction/Details.vue)

This file handles showing the details of a transaction after you clicked on one. Depending on what your new transaction type offers, you will have to extend this file to show the required information. Keep in mind that you should make use of your `enums` to handle `if/else` statements to handle the cases in which the details have to show specific properties of your new transaction type.

## TransactionAmount

> [src/components/utils/TransactionAmount.vue](https://github.com/ArkEcosystem/explorer/blob/master/src/components/utils/TransactionAmount.vue)

This component is used whenever we have a transaction `amount` to show in the Explorer. Normally speaking this is simply the `amount` property of the transaction that you show, but you can overwrite this behavior depending on the type of transaction. To give an example: a multipayment has an amount of `0`, as the actual amounts are stored in the asset. For this type, the `TransactionAmount` will therefore loop over the transactions inside the multipayment, sum the amounts, and show that instead of `0`.

In addition the transaction amounts get a color based on whether they are incoming (green), outgoing (red) or if they are neither (gray). You can adjust the checks for this to cater to special cases that your transaction type might have.

## Wallet Details

> [src/components/wallet/Details.vue](https://github.com/ArkEcosystem/explorer/blob/master/src/components/wallet/Details.vue)

This file contains information about how a wallet gets shown on the Explorer, which might be requiring changes depending on your transaction type. For example, timelocks introduced the concept of `locked balances`, which are shown on the wallet detail screen in the Explorer. Another, simpler, example would be the icons that are shown next to a wallet address when it has a certain property like a 2nd passphrase that's enabled or it being a multisignature address.

## Wallet Transaction

> [src/components/wallet/Transactions.vue](https://github.com/ArkEcosystem/explorer/blob/master/src/components/wallet/Transactions.vue)

This is a wrapper around the transaction table itself, which you might be interested in in case you want to have a custom tab in addition to the existing ones (e.g. sent / received / locked), depending on your transaction requirements.

## Pages

> [src/pages/\*.vue](https://github.com/ArkEcosystem/explorer/tree/master/src/pages)

Generally speaking, these files make up the pages you see on the Explorer. You can decide to extend existing ones or create new pages, depending on what your new transaction type requires.

## Migrations

> [src/services/migration.ts](https://github.com/ArkEcosystem/explorer/blob/master/src/services/migration.ts)

This file houses the migrations we run in the production version of the Explorer. What this means is that whenever we make a change that touches user-stored information (for example renaming a key:value pair), we add a migration here to make sure that people that have the old (and now obsolete) information stored, don't run into errors but instead have it migrated to the new format. These migrations are not needed when you are still developing your Explorer and it's not released to the public yet, but it's good to know about its existence in advance.
