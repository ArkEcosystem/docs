---
title: Markets
---

# Markets

This is a CoinGecko Client for the Platform SDK. The implementation makes use of [CoinCap](/docs/platform-sdk/markets/coincap), [CoinGecko](/docs/platform-sdk/markets/coingecko) and [CryptoCompare](/docs/platform-sdk/markets/cryptocompare) and adheres to the contracts laid out in the [specification](/docs/platform-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/PayvoHQ/sdk/tree/master/packages/markets" />

## Installation

```bash
yarn add @ardenthq/sdk-markets
```

## Usage

### Initialize the market service instance

```typescript
import { MarketService } from "@ardenthq/sdk-markets";

MarketService.make("cryptocompare", new Request());
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

If you discover a security vulnerability within this package, please send an e-mail to [security@ardenthq.com](mailto:security@ardenthq.com). All security vulnerabilities will be promptly addressed.
