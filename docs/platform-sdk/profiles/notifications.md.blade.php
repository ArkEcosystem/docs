---
title: Notifications
---

# Notifications

<x-alert type="info">
These methods are accessible through `profile.notifications()` which exposes a `NotificationRepository` instance.
</x-alert>

### Get a list of all notifications with key and value

```typescript
profile.notifications().all();
```

### Get a list of all notification keys

```typescript
profile.notifications().keys();
```

### Get a list of all notification values

```typescript
profile.notifications().values();
```

### Create a new notification for the given data

```typescript
profile.notifications().push({
	icon: "warning",
	name: "Ledger Update Available",
	body: "...",
	action: "Read Changelog",
});
```

### Forget the notification for the given ID

```typescript
profile.notifications().forget("uuid");
```

### Forget all notifications (Use with caution!)

```typescript
profile.notifications().flush();
```

### Get all read notifications

```typescript
profile.notifications().read();
```

### Get all unread notifications

```typescript
profile.notifications().unread();
```

### Mark the for the given ID as read

```typescript
profile.notifications().markAsRead("uuid");
```
