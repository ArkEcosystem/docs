---
title: Plugin
---

# Process

## Get plugins list

### Method

```bash
plugin.list
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
| result.name | number | Plugin name. | Yes |
| result.version | number | Plugin version. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "plugin.list",
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
            "version": "3.0.0,
            "name": "@arkecosystem/core-manager"
        }
    ]
}
```
