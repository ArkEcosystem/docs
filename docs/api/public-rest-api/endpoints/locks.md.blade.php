---
title: Locks
---

# Transactions

HTLC - Hash Time-Locked Contracts transactions enable two parties to exchange tokens safely and securely at the protocol level, removing the need to trust an individual who could potentially be a bad actor and withdraw from a prior agreement once they have received their tokens.
Locked funds can be transfer to another party using claim transactions, or refunded to the sender after the HTLC transaction's expiration.

## Endpoints

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/locks/all.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/locks/show.json" />

<livewire:endpoint spec="api/public-rest-api/endpoints/specs/locks/unlocked.json" />
