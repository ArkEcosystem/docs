---
title: Usage - Owner Setup
---

# Owner Account Setup

Because Nodem production environments do not include user accounts by default, you must first create an "Owner" account using the CLI commands outlined below.

## CLI Process

To create your initial "Owner" account, go to your Nodem installation directory and run `php artisan nodem:install`. The interactive CLI will then guide you through setting up the basics.

The first step will ask you if you are ready to start.

```bash
Are you ready to start? (yes/no) [yes]:
> yes
```

Responding `yes` will run the migrations to get your database tables in order, and seed required data such as user account permissions.

The CLI will then ask you to provide a username for your Owner account.

<x-alert type="warning">
This (owner) username cannot be changed once set and will be visible to others on your team, so make sure it's entered correctly before proceeding.
</x-alert>

```bash
Which username do you want to use for the owner account?
> nodem
```

After providing a username, the CLI will present you with instructions on how to finalize your owner account and direct you to visit a URL (based on your setup); this brings you to the registration page for Nodem. Here you will need to fill in the username you've chosen and the corresponding invitation code. After doing so, you will be logged in to Nodem and are ready to start using it by [adding servers](/docs/nodem/usage/servers) or [team member accounts.](/docs/nodem/usage/teams).

```bash
Here we go!
You can now open your browser to "http://nodem.test/register" and use this information to register your account:
=================================
invitation code: 3pyxsSlX108lTy9W
username:                   nodem
=================================
```

## Troubleshooting

If something goes wrong during the CLI setup, you may rerun the `php artisan nodem:install` command.

If your database does not contain additional data, the setup process will restart, allowing you to work from a clean slate.

If your database _does_ contain additional data _(e.g., you already signed up with your account but want to restart anyway)_, the CLI will provide a warning and offer a way to empty your database.

<x-alert type="danger">
Do **NOT** empty your database unless you're sure the data is unimportant. It will not be possible to restore this data once deleted!
</x-alert>
