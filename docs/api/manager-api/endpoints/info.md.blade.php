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
        "latestVersion": "3.0.0-next.8"
    }
}
```

## Update core

### Method

```bash
info.coreUpdate
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

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.coreUpdate",
	"params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {}
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

## Get last forged block

### Method

```bash
info.lastForgedBlock
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

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.lastForgedBlock",
	"params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "serialized": "0000000068b3da0653040000e4a912ff56bd69a80000000000000000000000000000000000000000000000000000000000000000e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b85503807f9abe33fb390546bb5dcab075dd1136d0b98c54420c8c463c4ed3545161b23045022100eee1e9bea6895793cc1ce1811c8c9b327fb050d229834f20f10fc3d2e0551ac402204d0cc4e557cdc16d002c71e2dddaac7ec6c3f356e677985da1a74becea3e0acc",
        "verification": {
            "errors": [],
            "containsMultiSignatures": false,
            "verified": true
        },
        "transactions": [],
        "data": {
            "id": "963100951063532680",
            "idHex": "0d5d9f3656fb9488",
            "blockSignature": "3045022100eee1e9bea6895793cc1ce1811c8c9b327fb050d229834f20f10fc3d2e0551ac402204d0cc4e557cdc16d002c71e2dddaac7ec6c3f356e677985da1a74becea3e0acc",
            "generatorPublicKey": "03807f9abe33fb390546bb5dcab075dd1136d0b98c54420c8c463c4ed3545161b2",
            "payloadHash": "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855",
            "payloadLength": 0,
            "reward": "0",
            "totalFee": "0",
            "totalAmount": "0",
            "numberOfTransactions": 0,
            "previousBlock": "16476721599592884648",
            "previousBlockHex": "e4a912ff56bd69a8",
            "height": 1107,
            "timestamp": 114996072,
            "version": 0
        }
    }
}
```

## Get current delegate

### Method

```bash
info.currentDelegate
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
| result.rank | number | Delegate rank. | Yes |
| result.username | string | Delegate username. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
	"jsonrpc": "2.0",
	"method": "info.currentDelegate",
	"params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "rank": 9,
        "username": "genesis_30"
    }
}
```
