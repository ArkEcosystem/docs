---
title: Modify API response
---

# Preface

In some cases users wants to alter existing HTTP API responses, by removing excess fields, changing content or modify result in any other way.

In this chapter we will go trough process step by step and describe how to remove `explorer` property from the `/node/configuration` route accessible on `GET` method.

```json
{
    "data": {
        "symbol": "TѦ",
        "explorer": "http://texplorer.ark.io",
        "version": 23,
    }
}
```

**Desired response**

```json
{
    "data": {
        "symbol": "TѦ",
        "version": 23,
    }
}
```

# Process

## Get route

First we need get existing route object that we want to modify. Be aware there can be two `Server` instances accessible via `Identifiers.HTTP` or `Identifiers.HTTPS` symbols. Each `Server` instance expose `getRoute` method which is used for obtaining `ServerRoute`.

```ts
const route = this.app.get<Server>(Identifiers.HTTP).getRoute("GET", "/api/node/configuration");
```

## Keep original handler

Save the reference to existing handler. Use `bind()` function to bind original object which method belongs to, otherwise you will lose `this` reference if one is used inside the handler.

```ts
const originalHandler = route.settings.handler.bind(route.settings.bind);
```

## Create new handler

Replace route handler with new wrapper function. New function will call original handler and set desired property to `undefined`. JSON standard defined that undefined properties are not included in stringified response, which will result as removed field in response body. Finally return modified response.

```ts
route.settings.handler = async (request: Hapi.Request, h: Hapi.ResponseToolkit) => {
        const response = await originalHandler(arguments);
        response.data.explorer = undefined;
        return response;
    };
```

# API

## Methods

### Server.getRoute(method: `string`, path: `string`) : `ServerRoute` | `undefined`

**Parameters**

method - HTTP method eg. "GET", "POST"
path -  route path eg. "/api/node/configuration"

**Response**

Returns `ServerRoute` object or `undefined`.

## Complete code sample

```ts
// Import
import Hapi from "@hapi/hapi";

// Modify route
const route = this.app.get<Server>(Identifiers.HTTP).getRoute("GET", "/api/node/configuration");
if (route) {
    const originalHandler = route.settings.handler.bind(route.settings.bind);
    route.settings.handler = async (request: Hapi.Request, h: Hapi.ResponseToolkit) => {
        const response = await originalHandler(arguments);
        response.data.explorer = undefined;
        return response;
    };
}
```

## Additional reading

- [Hapi official documentation](https://hapi.dev/)
