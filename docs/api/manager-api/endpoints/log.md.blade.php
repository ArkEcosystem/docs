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
| params.name | string | PM2 process name. (ark-core) | No |
| params.useErrorLog | boolean | Use error log instead out log. (false) | No |
| params.dateFrom | number | Date from as unix timestamp. | No |
| params.dateTo | number | Date to as unix timestamp. | No |
| params.logLevel | string | Log level. | No |
| params.contains | string | Search term. | No |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | array | Result. | Yes |
| result.timestamp | number | Unix timestamp. | Yes |
| result.content | string | Log content. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "log.log",
	"params": {
	    "name": "ark-core",
	    "useErrorLog": false,
	    "dateFrom": 1605657600,
	    "dateTo": 1705657600,
	    "logLevel": "info",
	    "contains": "search term"
    }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": [
        {
            "timestamp": 1605705110,
            "level": "INFO",
            "content": "Connecting to database: ark_testnet"
        },
        {
            "timestamp": 1605705110,
            "level": "DEBUG",
            "content": "Connection established."
        }
    ]
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

