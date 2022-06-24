---
title: News
---

# News

This is a Blockfolio Integration for the Payvo SDK. The implementation adheres to the contracts laid out in the [specification](/docs/platform-sdk/specification).

## Repository

<livewire:embed-link url="https://github.com/PayvoHQ/sdk/tree/master/packages/news" />

## Installation

```bash
yarn add @ardenthq/sdk-news
```

## Usage

### TBD

```typescript
import { FeedService } from "@ardenthq/sdk-news";

const feed: FeedService = new FeedService();

feed.parse("https://www.nasa.gov/rss/dyn/breaking_news.rss");
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to [security@ardenthq.com](mailto:security@ardenthq.com). All security vulnerabilities will be promptly addressed.
