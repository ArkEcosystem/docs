---
title: Troubleshooting
---

# Troubleshooting

## Accounts

### "I Can't Sign In!"

If this is the first time you're signing in to your Nodem **production** instance, you'll need to set up an owner account via CLI.

<x-alert type="info">
Refer to the [Owner Account Setup](/docs/nodem/usage/owner) page for additional information and guidance.
</x-alert>

If you're using a Nodem **development** instance, use the default sign-in credentials:

* username: `nodem`
* password: `password`

### "I Can't Sign Up!"

Before you can sign up for your team's Nodem deployment, you must first obtain a username and invitation code from your team's Owner or a team Admin.

If you already received this information, make sure that you're entering it exactly as received. If you're still unable to sign up, check with your team's Owner or an Admin that the details are correct.

<x-alert type="info">
Refer to the [Team Sign Up](/docs/nodem/usage/teams#signing-up) section for additional information and guidance.
</x-alert>

## Servers

### "My Server Isn't Being Added or Imported!"

Nodem will test a server's connection before allowing it to be added or imported. Make sure that:

* your server is running
* that the Manager API is [installed](/docs/nodem/getting-started/core#installation) and [properly configured](/docs/nodem/getting-started/core#configuration), and
* that you have entered your server's [details](/docs/nodem/usage/servers#2-enter-the-details) correctly.

Nodem also prevents duplicated servers. Check that the server you're attempting to add or import hasn't already been added.

<x-alert type="info">
Visit the [Server Import Errors](/docs/nodem/usage/servers#import-errors) section for additional information and guidance.
</x-alert>

### "My Server's Logs Are Missing!"

Before Nodem can access and provide logging features, you must first extend the functionality to your server's Manager API.

<x-alert type="info">
Refer to the [Server Logging](/docs/nodem/getting-started/core#logging) section to ensure that process logging has been configured correctly.
</x-alert>

---

If you find a bug or issue while installing or using Nodem, you can create an issue or contribute a fix by opening a pull request in Nodem's official open-source repo on GitHub.

<livewire:embed-link url="https://github.com/ArkEcosystem/nodem4979caac887a" caption="Official Nodem Repo" />
