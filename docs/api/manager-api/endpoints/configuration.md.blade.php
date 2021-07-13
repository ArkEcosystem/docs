---
title: Configuration
---

# Configuration

## Get core .env configuration

### Method

```bash
configuration.getEnv
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
| result | object | Object containing .env variables. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "configuration.getEnv",
    "params": { }
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result": {
        "CORE_LOG_LEVEL": "info",
        "CORE_LOG_LEVEL_FILE": "info",
        "CORE_DB_HOST": "localhost",
        "CORE_DB_PORT": 5432,
        "CORE_P2P_HOST": "0.0.0.0",
        "CORE_P2P_PORT": 4000,
        "CORE_WEBHOOKS_HOST": "0.0.0.0",
        "CORE_WEBHOOKS_PORT": 4004,
        "CORE_MONITOR_HOST": "0.0.0.0",
        "CORE_MONITOR_PORT": 4005,
        "CORE_API_HOST": "0.0.0.0",
        "CORE_API_PORT": 4003
    }
}
```

## Set core .env configuration

### Method

```bash
configuration.setEnv
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | Object containing .env variables. | Yes |

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
    "method": "configuration.updateEnv",
    "params": {
        "CORE_LOG_LEVEL": "info",
        "CORE_LOG_LEVEL_FILE": "info",
        "CORE_DB_HOST": "localhost",
        "CORE_DB_PORT": 5432,
        "CORE_P2P_HOST": "0.0.0.0",
        "CORE_P2P_PORT": 4000,
        "CORE_WEBHOOKS_HOST": "0.0.0.0",
        "CORE_WEBHOOKS_PORT": 4004,
        "CORE_MONITOR_HOST": "0.0.0.0",
        "CORE_MONITOR_PORT": 4005,
        "CORE_API_HOST": "0.0.0.0",
        "CORE_API_PORT": 4003
    }
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

## Get core plugins configuration

### Method

```bash
configuration.getPlugins
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
| result | object | App.json object. | Yes |

### Request

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "method": "configuration.getPlugins",
    "params": {}
}
```

### Response

```javascript
{
    "id": "unique-request-id",
    "jsonrpc": "2.0",
    "result:" "{
        app.json object
    }"
}
```

## Set core plugins configuration

### Method

```bash
configuration.setPlugins
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | App.json object. | Yes |

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
    "method": "configuration.updatePlugins",
    "params": {
        app.json object
    }
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
