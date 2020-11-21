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
| result | string | .env file content. | Yes |

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
    "result": "CORE_LOG_LEVEL=info\nCORE_LOG_LEVEL_FILE=info\n\nCORE_DB_HOST=localhost\nCORE_DB_PORT=5432\n\nCORE_P2P_HOST=0.0.0.0\nCORE_P2P_PORT=4000\n\nCORE_WEBHOOKS_HOST=0.0.0.0\nCORE_WEBHOOKS_PORT=4004\n\nCORE_MONITOR_HOST=0.0.0.0\nCORE_MONITOR_PORT=4005\n\nCORE_API_HOST=0.0.0.0\nCORE_API_PORT=4003\n"
}
```

## Update core .env configuration

### Method

```bash
configuration.updateEnv
```

### Parameters

| Name | Type | Description | Required |
| :--- | :---: | :--- | :---: |
| id | string / number | The identifier of the request. | Yes |
| jsonrpc | string | The protocol version. | Yes |
| method | string | The method name. | Yes |
| params | object | The parameters of the request. | Yes |
| params.content | string | .env file configuration content. | Yes |

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
	"params": { "content": "CORE_LOG_LEVEL=info\nCORE_LOG_LEVEL_FILE=info\n\nCORE_DB_HOST=localhost\nCORE_DB_PORT=5432\n\nCORE_P2P_HOST=0.0.0.0\nCORE_P2P_PORT=4000\n\nCORE_WEBHOOKS_HOST=0.0.0.0\nCORE_WEBHOOKS_PORT=4004\n\nCORE_MONITOR_HOST=0.0.0.0\nCORE_MONITOR_PORT=4005\n\nCORE_API_HOST=0.0.0.0\nCORE_API_PORT=4003\n"
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
| result | string | app.json file content. | Yes |

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
    "result:" "{...}"
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

