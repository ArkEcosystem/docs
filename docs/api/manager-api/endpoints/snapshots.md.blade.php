---
title: Snapshots
---

# Snapshots

## Get snapshots list

### Method

```bash
snapshots.list
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
| result.name | string | Snapshot name. | Yes |
| result.size | string | Snapshot size (KB). | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "snapshots.list",
	"params": { }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": [
        {
            "name": "1-102",
            "size": 69
        },
        {
            "name": "1-51",
            "size": 55
        },
        {
            "name": "1-52",
            "size": 38
        }
    ]
}
```
