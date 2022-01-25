---
title: Usage - Server Management
---

# Server Management

After [setting up your owner account](/docs/nodem/usage/owner), you can log in and begin [adding team members](/docs/nodem/usage/teams) or server instances. Any ARK Core-based server configured with the `core-manager` plugin may be added to Nodem.

This page will serve as your guide to managing servers using the Nodem Dashboard and will provide important information along the way.

Owner accounts and Team Admins may:

* [add](#adding-servers) servers,
* [edit](#editing-servers) servers,
* [export](#exporting-servers) servers,
* [import](#importing-servers) servers, or
* [remove](#removing-servers) servers.

Additionally, all team members can:

* view existing servers and their details,
* view server [statistics](#server-statistics), and
* view and download [server logs](#server-logs).

Various [server actions](#server-actions) are also permitted based on the member's access role.

<x-alert type="warning">
**Don't Forget!** Before managing your Core Server with Nodem, it must first have the `core-manager` plugin [installed and configured.](/docs/nodem/getting-started/core)
</x-alert>

## Adding Servers

### 1) Click 'Add Server'

Get started adding a server to Nodem by clicking the '**Add Server**' button.

![](/storage/docs/docs/nodem/assets/usage/servers-add-button.png)

### 2) Enter the Details

Next, Nodem will ask you to provide details about your Core Server.

![](/storage/docs/docs/nodem/assets/usage/servers-add-details.png)

* **Server Provider** - Your Core Server's host
* **Server Name** - A memorable name for this server
  * Visible from the Nodem Dashboard
  * Can be changed later by Team Admins
* **Host** - The Host address or IP of your Core Server instance
* **Process Type** - The type of server you're adding
  * **Separate** - Either a Relay or a Forger
  * **Combined** - A Relay **and** a Forger
* **Access** - Your Core Server's access credentials
  * **Account** - A Username and Password
  * **Access Key** - Found in your Core Server's `app.json` file
* **BIP38 Encryption** - Whether your Forger uses [BIP-38 Encryption](/docs/core/deployment/forger#content-getting-started)

<x-alert type="info">
Server hosts listed in the dropdown UI are provided for your at-a-glance reference. Nodem uses an RPC interface to communicate with your server's Manager API, which supports all hosting providers.
</x-alert>

### 3) Confirm Details

When you have entered all of your Core Server's details, click the '**+ Add**' button.

If your Core instance is a Forger and uses [BIP-38 Encryption](/docs/core/deployment/forger#content-getting-started), you'll additionally be prompted to enter your encryption password.

![](/storage/docs/docs/nodem/assets/usage/servers-add-details-bip38.png)

After successfully entering and confirming your Core Server's details, you should now see it in the Nodem dashboard 🎉

![](/storage/docs/docs/nodem/assets/usage/servers-dashboard.png)

## Editing Servers

Owner accounts and Team Admins may need to update the details of a server at some point. Any parameter may be edited, whether it be a server's dashboard name, host address, server type, or access credentials.

### 1) Click 'Edit'

From the server's details page, click the '**Edit**' button.

![](/storage/docs/docs/nodem/assets/usage/servers-edit-button.png)

### 2) Update the Details

Next, enter the details you wish to change. Click the '**Update**' button when you're finished. The changes should go into effect immediately.

![](/storage/docs/docs/nodem/assets/usage/servers-edit-details.png)

## Exporting Servers

Exporting allows Owner accounts and Team admins to back up a Nodem deployment's server configuration easily. This is good to have as common practice should your Nodem instance go down unexpectedly or if a migration is needed.

### 1) Click 'Export'

From the Nodem dashboard, click the '**Export**' button.

![](/storage/docs/docs/nodem/assets/usage/servers-export-button.png)

### 2) Download the JSON File

When you're ready to proceed, click the '**Download .json**' button.

![](/storage/docs/docs/nodem/assets/usage/servers-export.png)

You'll then be provided with a JSON file similar to the example shown below.

```json
[
  {
    "provider": "digitalocean",
    "name": "Server 1",
    "host": "http://***.***.***.***:4005",
    "process_type": "separate",
    "uses_bip38_encryption": true,
    "auth": {
      "username": "**********",
      "password": "**********"
    }
  },
  {
    "provider": "ovh",
    "name": "Server 2",
    "host": "http://***.***.***.***:4005",
    "process_type": "separate",
    "uses_bip38_encryption": true,
    "auth": {
      "access_key": "**********"
    }
  },
  {
    "provider": "aws",
    "name": "Server 3",
    "host": "http://***.***.***.***:4005",
    "process_type": "separate",
    "uses_bip38_encryption": true,
    "auth": {
      "access_key": "**********"
    }
  },
  {
    "provider": "azure",
    "name": "Server 4",
    "host": "http://***.***.***.***:4005",
    "process_type": "separate",
    "uses_bip38_encryption": true,
    "auth": {
      "access_key": "**********"
    }
  }
]
```

## Importing Servers

Exporting allows Owner accounts and Team Admins to restore [exported](#exporting-servers) server configurations. This is useful in the event that your Nodem instance needs to be replaced or migrated.

### 1) Click 'Import'

From the Nodem dashboard, click the '**Import**' button.

![](/storage/docs/docs/nodem/assets/usage/servers-import-button.png)

### 2) Upload the JSON File

Next, upload your [exported](#exporting-servers) `.json` configuration file.

![](/storage/docs/docs/nodem/assets/usage/servers-import-1.png)

### 3) Select Servers

Next, you'll be asked to select which servers you'd like to import from your configuration file.

Select your desired servers, then click the '**Continue**' button.

![](/storage/docs/docs/nodem/assets/usage/servers-import-2.png)

If the process is successful, you'll be shown a list of your newly-imported servers. At this time, you can now proceed to your Nodem dashboard.

![](/storage/docs/docs/nodem/assets/usage/servers-import-1
e.png)

## Removing Servers

Owner accounts and Team Admins may remove a server directly from a server's details page. While this action is permanent, the server itself will remain unaffected and can be re-added at any time.

### 1) Click 'Remove'

From your server's details page, click the '**Remove**' icon.

![](/storage/docs/docs/nodem/assets/usage/servers-remove-button.png)

### 2) Confirm the Removal

If you're sure you wish to remove the selected server, enter the server's name and click the '**Remove**' button to confirm your decision.

![](/storage/docs/docs/nodem/assets/usage/servers-remove-confirm.png)

Afterward, the server will no longer be visible from the Nodem dashboard.

## Server Actions

Server actions are a quick way for Owners, Admins, and Maintainers to perform common server tasks directly from Nodem. Below are the available actions, as well as what Roles are permitted to perform a particular action.

Each action may be performed on a particular server's Relay, Forger, or both instances.

To get started, click the '**Action**' icon next to your desired server.

![](/storage/docs/docs/nodem/assets/usage/servers-actions.png)

**Available Actions**:

* **Start**
* **Restart**
* **Stop**
* **Delete**
* **Edit**
* **Update**

**Action Permissions**:

* **Readonly**
  * _Not_ permitted to perform server actions
* **Maintainer**
  * Permitted to start, restart, stop, delete, and update servers
* **Admin**
  * All 'Maintainer' privileges
  * Permitted to edit servers

## Server Statistics

A server's statistics page provides an excellent overview of its performance and is updated hourly.

![](/storage/docs/docs/nodem/assets/usage/servers-performance.png)

## Server Logs

Logs are visible from a server's details page and allows your team to view its activity, including actions performed within Nodem by individual team members.

<x-alert type="warning">
Note: The logging feature must be enabled in your server's `core-manager` plugin configuration. Visit Nodem's [Core Configuration](/docs/nodem/getting-started/core) docs for more details.
</x-alert>

<x-alert type="info">
Actions performed directly from your server do not include user information as Nodem has no way to recognize this activity
</x-alert>

### Downloading Logs

From a server's details page under either 'Relay' or 'Forger,' click the '**Download**' icon.

![](/storage/docs/docs/nodem/assets/usage/servers-logs-download-button.png)

You can then select from a range of dates, times, and log types, after which you can click the '**Download**' button to save your server's logs.

![](/storage/docs/docs/nodem/assets/usage/servers-logs-download.png)
