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

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "watcher.getEvents",
	"params": { "query": { "$limit": 100, "$offset": 0, "data": { "value": { "username": "genesis_9" } } } }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "total": 0,
        "limit": 100,
        "offset": 0,
        "data": []
    }
}
```
