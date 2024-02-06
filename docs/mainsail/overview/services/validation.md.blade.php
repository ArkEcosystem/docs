---
title: Services - Validation
---

# Validation

More often than not you will have the need to validate some data that is passed to your plugin, like configuration or data that should be persisted where an invalid format could have serious consequences.

The default validator that ships with Core implements [@hapi/joi](https://github.com/hapijs/joi) under the hood to provide an easy to use syntax for building validation schemas.

## Usage

### Get an instance of the Validator

```typescript
const validator: Services.Validation.ValidationService = app
    .get<Contracts.Kernel.Validator>(Identifiers.Services.Validation.Service)
```

### Run the validator's rules against its data

```typescript
validator.validate({ username: "johndoe" }, Joi.object({ username: Joi.string() }));
```

### Determine if the data passes the validation rules

```typescript
validator.passes();
```

### Determine if the data fails the validation rules

```typescript
validator.fails();
```

### Get the failed validation rules

```typescript
validator.failed();
```

### Get all of the validation error messages

```typescript
validator.errors();
```

### Returns the data which was valid

```typescript
validator.valid();
```

### Returns the data which was invalid

```typescript
validator.invalid();
```

### Get the data under validation

```typescript
validator.attributes();
```
