---
title: Process
---

# Process

## Get Pm2 process list

### Method

```bash
process.list
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
| result.pid | number | Process ID. | Yes |
| result.name | number | Process name. | Yes |
| result.pm_id | number | Pm2 process ID. | Yes |
| result.status | string | Pm2 process status. | Yes |
| result.monit.memory | number | Used memory. (KB) | Yes |
| result.monit.cpu | number | Used processor. (%) | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "process.list",
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
            "pid": 57255,
            "name": "ark-core",
            "pm_id": 0,
            "monit": {
                "memory": 109600,
                "cpu": 0.5
            },
            "status": "online"
        }
    ]
}
```
