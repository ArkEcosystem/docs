---
title: Log
---

# Log

## Search PM2 process log

### Method

```bash
log.search
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.dateFrom | number | Date from as unix timestamp (s). | No |
| params.dateTo | number | Date to as unix timestamp (s). | No |
| params.process | string | Process name. | No |
| params.level | string | Log level. | No |
| params.searchTerm | string | Search term. | No |
| params.limit | string | Max number of results. | No |
| params.offset | string | Offset results. | No |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | array | Result. | Yes |
| result.id | string | Log id. | Yes |
| result.process | string | Process name. | Yes |
| result.level | string | Log level. | Yes |
| result.content | string | Log content. | Yes |
| result.timestamp | number | Unix timestamp (s). | Yes |


### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "log.log",
	"params": {
	    "dateFrom": 1605657600,
	    "dateTo": 1705657600,
	    "level": "info",
	    "process": "core",
	    "searchTerm": "search term",
	    "limit": 10,
	    "offset": 0,
    }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        total: 2000,
        limit: 10,
        offset: 0
        data: [
            {
                "id": 1,
                "process": "core",
                "level": "info",
                "content": "Connecting to database: ark_testnet",
                "timestamp": 1605705110,
            },
            {
                "id": 2,
                "level": "debug",
                "content": "Connection established.",
                "timestamp": 1605705110,
            }
        ]
    }
}
```

## Get PM2 archived logs

### Method

```bash
log.archived
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | array | Result. | Yes |
| result.name | string | Log file name. | Yes |
| result.size | number | Log file size (KB). | Yes |
| result.downloadLink | string | Download link. Get file via standard HTTP GET request. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "log.archived",
	"params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": [
        {
            "name": "ark-core-error.log",
            "size": 2,
            "downloadLink": "/log/archived/ark-core-error.log"
        },
        {
            "name": "ark-core-out.log",
            "size": 2766,
            "downloadLink": "/log/archived/ark-core-out.log"
        },
        {
            "name": "ark-forger-error.log",
            "size": 2,
            "downloadLink": "/log/archived/ark-forger-error.log"
        },
        {
            "name": "ark-forger-out.log",
            "size": 1124,
            "downloadLink": "/log/archived/ark-forger-out.log"
        }
    ]
}
```

