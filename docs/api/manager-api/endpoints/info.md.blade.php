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
| result | object | Result. | Yes |
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
| result | object | Result. | Yes |
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

## Get blockchain height

### Method

```bash
info.blockchainHeight
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
| result | object | Result. | Yes |
| result.height | number | Node height. | Yes |
| result.randomNodeHeight | number | Random node height. | No |
| result.randomNodeIp | string | Random node ip. | No |


### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.blockchainHeight",
	"params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "height": 766,
        "randomNodeHeight": 765,
        "randomNodeIp": "127.0.0.1"
    }
}
```

## Get disk space

### Method

```bash
info.diskSpace
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.showAllDisks | boolean | Show data for all available disks. | Yes |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | object / array | Result. | Yes |
| result.filesystem | string | Filesystem label. | Yes |
| result.size | number | Full filesystem size (KB). | Yes |
| result.used | number | Used filesystem size (KB). | Yes |
| result.available | number | Available filesystem size (KB). | Yes |
| result.capacity | number | Used filesystem size (%). | Yes |
| result.mountpoint | string | Mountpoint. | Yes |


### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.diskSpace",
	"params": { "showAllDisks": true }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": [
        {
            "filesystem": "/dev/disk1s1",
            "size": 499963174912,
            "used": 11290525696,
            "available": 19293650944,
            "capacity": 0.37,
            "mountpoint": "/"
        },
        {
            "filesystem": "devfs",
            "size": 194560,
            "used": 194560,
            "available": 0,
            "capacity": 1,
            "mountpoint": "/dev"
        }
    ]
}
```

## Get disk space

### Method

```bash
info.diskSpace
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
| result | object | Result. | Yes |
| result.size | number | Database size (KB). | Yes |


### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.databaseSize",
	"params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "size": 100000
    }
}
```

## Get next forging slot

### Method

```bash
info.nextForgingSlot
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
| result | object | Result. | Yes |
| result.remainingTime | number | Remaining time till next slot. (ms). | Yes |


### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.nextForgingSlot",
	"params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "remainingTime": 7000
    }
}
```
