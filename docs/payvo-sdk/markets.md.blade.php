---
title: Markets
---

# Markets

This is a CoinGecko Client for the Platform SDK. The implementation makes use of [CoinCap](/docs/payvo-sdk/markets/coincap), [CoinGecko](/docs/payvo-sdk/markets/coingecko) and [CryptoCompare](/docs/payvo-sdk/markets/cryptocompare) and adheres to the contracts laid out in the [specification](/docs/payvo-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/PayvoHQ/sdk/tree/master/packages/sdk-markets" />

## Installation

```bash
yarn add @payvo/sdk-markets
```

## Usage

### Initialize the market service instance

```typescript
import { MarketService } from "@payvo/sdk-markets";
import { PriceTracker } from "@payvo/sdk-cryptocompare";

MarketService.make(new PriceTracker(), new Request());
```

### Verify if the given currency exists on the service

```typescript
await marketService.verifyToken("ark");
```

### Get information about the given currency

```typescript
await marketService.marketData("ark");
```

### Get the historical price for the today

```typescript
await marketService.historicalPriceForDay("ark", "btc");
```

### Get the historical price for the last 7 days

```typescript
await marketService.historicalPriceForWeek("ark", "btc");
```

### Get the historical price for the last 30 days

```typescript
await marketService.historicalPriceForMonth("ark", "btc");
```

### Get the historical price for the last 120 days

```typescript
await marketService.historicalPriceForQuarter("ark", "btc");
```

### Get the historical price for the last 365 days

```typescript
await marketService.historicalPriceForYear("ark", "btc");
```

### Get the historical volume for the today

```typescript
await marketService.historicalVolumeForDay("ark", "btc");
```

### Get the historical volume for the last 7 days

```typescript
await marketService.historicalVolumeForWeek("ark", "btc");
```

### Get the historical volume for the last 30 days

```typescript
await marketService.historicalVolumeForMonth("ark", "btc");
```

### Get the historical volume for the last 120 days

```typescript
await marketService.historicalVolumeForQuarter("ark", "btc");
```

### Get the historical volume for the last 365 days

```typescript
await marketService.historicalVolumeForYear("ark", "btc");
```

### Get the average price for today

```typescript
await marketService.dailyAverage("ark", "btc", Date.now());
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ark.io](mailto:security@ark.io). All security vulnerabilities will be promptly addressed.
