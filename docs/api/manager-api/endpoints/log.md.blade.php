---
title: Log
---

# Log

## Search process log

### Method

```bash
log.search
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.dateFrom | number | Date from as unix timestamp (s). | No |
| params.dateTo | number | Date to as unix timestamp (s). | No |
| params.levels | string[] | Log levels. | No |
| params.processes | string[] | Process names. | No |
| params.searchTerm | string | Search term. | No |
| params.limit | string | Max number of results. | No |
| params.offset | string | Offset results. | No |
| params.order | string | Order results (DESC). | No |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | array | Result. | Yes |
| result.id | string | Log id. | Yes |
| result.process | string | Process name. | Yes |
| result.level | string | Log level. | Yes |
| result.content | string | Log content. | Yes |
| result.timestamp | number | Unix timestamp (s). | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "log.log",
    "params": {
        "dateFrom": 1605657600,
        "dateTo": 1705657600,
        "levels": ["info"],
        "processes": ["core"],
        "searchTerm": "search term",
        "limit": 10,
        "offset": 0,
        "order": "ASC",
    }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        total: 2000,
        limit: 10,
        offset: 0
        data: [
            {
                "id": 1,
                "process": "core",
                "level": "info",
                "content": "Connecting to database: ark_testnet",
                "timestamp": 1605705110,
            },
            {
                "id": 2,
                "level": "debug",
                "content": "Connection established.",
                "timestamp": 1605705110,
            }
        ]
    }
}
```

## Generate log archive

### Method

```bash
log.download
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.dateFrom | number | Date from as unix timestamp (s). | Yes |
| params.dateTo | number | Date to as unix timestamp (s). | Yes |
| params.levels | string[] | Log levels. | No |
| params.processes | string[] | Process names. | No |

### Result

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| result | string | Generated file name. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "log.log",
    "params": {
        "dateFrom": 1605657600,
        "dateTo": 1705657600,
        "levels": ["info", "debug"],
        "processes": ["core"]
    }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": "2020-12-14_17-38-00.log.gz"
}
```

## Get archived logs

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
            "name": "2020-12-14_17-38-00.log.gz",
            "size": 2,
            "downloadLink": "http://127.0.0.1:4003/log/archived/2020-12-14_17-38-00.log.gz"
        },
        {
            "name": "2020-12-15_12-38-12.log.gz",
            "size": 2766,
            "downloadLink": "http://127.0.0.1:4003/log/archived/2020-12-15_12-38-12.log.gz"
        }
    ]
}
```
