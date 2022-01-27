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
| result.currentVersion | string | Used core version. | No |
| result.installedVersion | string | Installed core version. | Yes |
| result.latestVersion | string | Latest core version from NPM. | Yes |
| result.manager | object | Core-manager versions. | Yes |
| result.manager.currentVersion | string | Used core-manager version. | Yes |
| result.manager.installedVersion | string | Installed core-manager version. | Yes |
| result.manager.latestVersion | string | Latest core-manager version from NPM. | Yes |

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
        "currentVersion": "4.0.0-next.0",
        "installedVersion": "4.0.0-next.0",
        "latestVersion": "4.0.0-next.0",
        "manager": {
            "currentVersion": "3.0.2",
            "installedVersion": "3.0.2",
            "latestVersion": "3.0.2"
        }
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

## Get system resources

### Method

```bash
info.resources
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
| result.cpu | object | CPU information. | Yes |
| result.cpu.total | number | Total CPU resources (%). | Yes |
| result.cpu.used | number | Used CPU resources (%). | Yes |
| result.cpu.available | number | Available CPU resources (%). | Yes |
| result.ram | object | RAM information. | Yes |
| result.ram.total | number | Total memory (KB). | Yes |
| result.ram.used | number | Used memory (KB). | Yes |
| result.ram.available | number | Available memory (KB). | Yes |
| result.disk | object | Disk information. | Yes |
| result.disk.filesystem | string | Filesystem identification. | Yes |
| result.disk.total | number | Total disk space (KB). | Yes |
| result.disk.used | number | Used disk space (KB). | Yes |
| result.disk.available | number | Available disk space (KB). | Yes |
| result.disk.mountpoint | string | Mountpoint. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "info.resources",
    "params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "cpu": {
            "total": 100,
            "used": 12.37319548903266,
            "available": 87.62680451096733
        },
        "ram": {
            "total": 16777216,
            "used": 16711196,
            "available": 66020
        },
        "disk": {
            "filesystem": "/dev/disk1s2",
            "total": 488245288,
            "used": 334654912,
            "available": 153590376,
            "mountpoint": "/System/Volumes/Data"
        }
    }
}
```

## Get database size

### Method

```bash
info.databaseSize
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
| params.token | string | Token name. | No |

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
| params.token | string | Token name. | No |

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
| params.token | string | Token name. | No |

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
