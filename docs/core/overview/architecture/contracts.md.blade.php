---
title: Architecture - Contracts
---

# Contracts

Contracts inside of Core are collections of interfaces, also referred to as implementation contracts, that define what methods a class has to implement. These contracts ensure that any alternative implementations of services are compliant with what Core expects internally.

Core ships a default implementation for every contract that is defined, the logger comes with a [pino](https://github.com/pinojs/pino) implementation, caching comes with an in-memory implementation and validation comes with a [joi](https://github.com/hapijs/joi) implementation.

## When To Use Contracts

An important thing to keep in mind is that interfaces should be used with caution and for a reason. If you only have a single implementation of a class and don't have the need for an alternative implementation anytime soon, you shouldn't create an interface but instead defer that until there is a need for it.

Interfaces are implementation contracts that make it easier to work with IoC containers, but if there are no alternative implementations you should simply bind the concrete to the container instead of creating an interface that serves purely as a container binding or informational struct.
