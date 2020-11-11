---
title: Log
---

# Log

## Get Pm2 process log

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
| params.name | string | Pm2 process name. | Yes |
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
