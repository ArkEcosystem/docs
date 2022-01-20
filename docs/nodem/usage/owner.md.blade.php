---
title: Usage - Owner Setup
---

# Owner Account Setup

When using Nodem in a production environment, it will be installed without any user accounts. In order to start using it, you will need to manually create the first account; this will be designated as the "Owner". This is made easy through means of a CLI command.

## CLI Process

To start the process of adding your first user, make sure to navigate to your Nodem installation directory and run `php artisan nodem:install` . You'll be presented with an interactive CLI to setup the basics.

The first step will ask you if you are ready to start.

```bash
Are you ready to start? (yes/no) [yes]:
> yes
```

Responding `yes` will run the migrations to get your database tables in order and seed required data such as user account permissions.

This will be followed by a question to fill in a username for your owner account. Be precise, as this account will not be able to get a different username afterwards. You can pick any username you like, but note that it will be visible to others in your team too if you decide to invite other people down the line.

```bash
Which username do you want to use for the owner account?
> nodem
```

After filling in your username, the CLI will present you with instructions on how to finalize the user account. You will be asked to visit a URL (based on your setup), which brings you to the registration page for Nodem. Here you will need to fill in the username you've chosen and the corresponding invitation code. After doing so, you will be logged in to Nodem and are ready to start using it by [adding servers](/docs/nodem/usage/servers) or [team member accounts.](/docs/nodem/usage/teams).

```bash
Here we go!
You can now open your browser to "http://nodem.test/register" and use this information to register your account:
=================================
invitation code: 3pyxsSlX108lTy9W
username:                   nodem
=================================
```

## Troubleshooting

In the event something went wrong with the CLI setup, you can rerun the `php artisan nodem:install` command if there was no further data stored in the database yet. This will restart the process, giving you a clean slate to work from again.

If there was additional data found in the database (e.g. you already signed up with your account but want to restart anyway), running the command will give you a warning and a way to empty your database. ONLY do this if you are completely sure all data in the database can be removed, as it will not be possible to restore this!