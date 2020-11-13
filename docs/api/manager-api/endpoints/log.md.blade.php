---
title: Log
---

# Log

## Get PM2 process log

### Method

```bash
log.log
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.name | string | PM2 process name. | Yes |
| params.fromLine | number | Return data from line. | No |
| params.range | number | Return data lines in range. | No |
| params.showError | boolean | Show error log. | No |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | object | Result. | Yes |
| result.totalLines | number | Total number of lines in log file. | Yes |
| result.lines | string | Partial log file content. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "log.log",
	"params": { "name": "ark-core", "fromLine": 1, "range": 10, "showError": false }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "totalLines": 21535,
        "lines":"..."
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

