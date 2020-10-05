---
title: Endpoints
---

# Endpoints

The ElasticSearch integration comes with a HTTP server that allows you to perform granular searches with a variety of arguments.

## Endpoint

```
POST /
```

## Query Parameters

The search endpoint supports over 30 parameters that can be directly passed to ElasticSearch. Take a look at the [search](https://www.elastic.co/guide/en/elasticsearch/client/javascript-api/current/api-reference.html#_search) documentation of the official ElasticSearch client for JavaScript to see what each argument is used for.

## Response

```javascript
{
  "meta": {
    "count": 1
  },
  "data": [
    {
      "id": "17184958558311101492",
      "version": 0,
      "timestamp": 0,
      "height": 1,
      "reward": "0",
      "previousBlock": "0",
      "numberOfTransactions": 153,
      "totalAmount": "12500000000000000",
      "totalFee": "0",
      "payloadLength": 35960,
      "payloadHash": "d9acd04bde4234a81addb8482333b4ac906bed7be5a9970ce8ada428bd083192",
      "generatorPublicKey": "03b47f6b6719c76bad46a302d9cff7be9b1c2b2a20602a0d880f139b5b8901f068",
      "blockSignature": "304402202fe5de5697fa25d3d3c0cb24617ac02ddfb1c915ee9194a89f8392f948c6076402200d07c5244642fe36afa53fb2d048735f1adfa623e8fa4760487e5f72e17d253b"
    }
  ]
}
```
