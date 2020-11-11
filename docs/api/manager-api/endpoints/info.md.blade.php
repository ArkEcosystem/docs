---
title: Info
---

# Info

## Get core version

### Method

```bash
info.coreVersion
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
| result.currentVersion | string | Used core version. | Yes |
| result.latestVersion | string | Latest core version from NPM. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.coreVersion",
	"params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "currentVersion": "3.0.0-next.8",
        "latestVersion": "2.7.7"
    }
}
```

## Get core status

### Method

```bash
info.coreStatus
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.token | string | Token name. | No |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result.status | string | Core / rely process status. | Yes |
| result.syncing | boolean | Determine if node is currently syncing | No |

### Process statuses

- undefined
- online
- stopped
- stopping
- waiting restart
- launching
- errored
- one-launch-status

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.coreStatus",
	"params": { "token": "ark" }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "processStatus": "online",
        "syncing": false
    }
}
```
