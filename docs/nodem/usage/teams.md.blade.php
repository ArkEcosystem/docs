---
title: Usage - Adding Accounts
---

# Adding Team Member Accounts

After [setting up your owner account](/docs/nodem/usage/owner), you can log in and begin [adding server instances](/docs/nodem/usage/servers) or team member accounts. Team member accounts are added using a basic create-and-share scheme--i.e., you, the owner, create new accounts and share a code that others use to sign up and gain access to your Nodem deployment.

## Inviting Users / Creating Accounts

Inviting users is a straightforward process outlined below.

1) Get started by clicking on your profile's avatar, then select **'team'** from the dropdown menu.

![](/storage/docs/docs/nodem/assets/usage/teams-menu-select.png)

2) Click the **'Invite'** button on the Team Management Dashboard.

![](/storage/docs/docs/nodem/assets/usage/teams-invite-button.png)

3) Fill in the details of the person you want to invite.

![](/storage/docs/docs/nodem/assets/usage/teams-invite-details.png)

* **Username** - This will be used by your new team member at sign-up and to sign-in to Nodem
  * It visible in the Team Management Dashboard
  * It cannot be changed. If a new username is desired, the team member account must be removed, and a new account must be created
  * Team Members may be removed, and 'Roles' may be reassigned by those with the appropriate permissions (i.e., Admins)
* **Roles** - Assignable permissions that decide which actions may be performed by a team member
  * **Readonly**
    * Permitted to view servers and team members
    * Permitted to change their password or configure 2FA
    * May _not_ perform basic server actions (e.g., start, stop, restart, etc.)
    * May _not_ add, edit, or remove servers.
    * May _not_ add, edit, or remove team members
  * **Maintainer**
    * All 'Readonly' permissions
    * Permitted to perform basic server actions (e.g., start, stop, restart, etc.)
    * Permitted to add, edit, or remove servers.
  * **Admin**
    * All 'Maintainer' permissions
    * Permitted to perform all server actions
    * Permitted to add, edit, or remove team members, including the reassignment of roles

4) Click 'Generate' to create your new member's invitation code.

![](/storage/docs/docs/nodem/assets/usage/teams-invite-generate.png)

5) Share this invitation code with your new member who will use it at sign-up.

![](/storage/docs/docs/nodem/assets/usage/teams-invite-code.png)
