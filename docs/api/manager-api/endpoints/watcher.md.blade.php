---
title: Watcher
---

# Watcher

## Query event data

### Method

```bash
watcher.getEvents
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.query | object | Query. | Yes |
| params.query.$limit | number | Data limit. | No |
| params.query.$offset | number | Data offset. | No |
| params.query.$order | object | Data offset. | No |
| params.query.event | string | Event name. | No |
| params.query.data | object | Query nested event data. | No |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | object | Result. | Yes |
| result.total | number | Total number of entries matching given query. | Yes |
| result.limit | number | Data limit. | Yes |
| result.offset | number | Data offset. | Yes |
| result.data | array | Query response data. | Yes |
| result.data.id | number | Query response data id. | Yes |
| result.data.event | string | Query response data event name. | Yes |
| result.data.data | object | Query response data event data. | Yes |
| result.data.timestamp | string | Query response data timestamp (YYYY-MM-DD hh:mm:ss). | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "watcher.getEvents",
    "params": {
        "query": {
            "$limit": 100,
            "$offset": 0,
            "$order": { "id": "DESC" },
            "event": { "$like": "database%" },
            "data": { "query": { "$eq": "COMMIT" } }
        }
    }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "total": 1,
        "limit": 100,
        "offset": 0,
        "data": [
            {
                "id": 4251,
                "event": "database.query.log",
                "data": {
                    "query": "COMMIT"
                },
                "timestamp": "2021-05-17 14:20:08"
            }
        ]
    }
}
```

### Supported query parameters

| Name | Type |
| :--- | :---: |
| $eq | equal |
| $ne | not equal |
| $lt | less than |
| $lte | less than or equal |
| $gt | greater than |
| $gte | greater than or equal |
| $like | like |

### Query example

```javascript
"data": {
    name: { $like: "starts_with_string%" }
}
```
