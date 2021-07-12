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

## Create snapshot

### Method

```bash
snapshots.create
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.codec | string | Snapshot codec (default, json). | No |
| params.skipCompression | boolean | Skip data compression (false). | No |
| params.start | boolean | First block included in snapshot. | No |
| params.end | boolean | Last block included in snapshot. | No |

Given start and end height may be changed to match nearest round start.

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | object | Result. | Yes |

An empty result means that snapshot creation process has started successfully. It does not guarantee that snapshot process will complete successfully.

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "snapshots.create",
    "params": { "codec": "json", "skipCompression": true, "start": 1, "end": 200 }
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

## Restore snapshot

### Method

```bash
snapshots.restore
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.name | string | Snapshot name. | Yes |
| params.truncate | boolean | Truncate database (false). | No |
| params.verify | boolean | Verify data on restore (false). | No |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | object | Result. | Yes |

Empty result means that snapshot restore process is started successfully. It does not guarantee that snapshot process will complete successfully.

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "snapshots.restore",
    "params": { "blocks": "1-9793", "truncate": true, "verify": true }
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

## Delete snapshot

### Method

```bash
snapshots.delete
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.name | string | Snapshot name. | Yes |

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
    "method": "snapshots.delete",
    "params": { "name": "1-9742" }
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
