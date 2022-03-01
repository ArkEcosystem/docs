---
title: Settings & Security
---

<!-- Remove after prod updates in ark.dev & msq repos (settings.md.blade.php => /settings/...) -->

# Profile Settings & Security on MarketSquare

Updating and refreshing a MarketSquare Profile is a great way to introduce ourselves to the community, inform visitors on our skills and expertise, specify more details on the projects we've completed--or have in progress, and share Social Media links.

## Getting Started

Get started by selecting ‘**Settings**’ from the Profile drop-down menu.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-focus.png)

## The Profile Settings Page

This is the Profile settings page. It allows updating basic Profile information as well as the ability to delete an account.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-user-page.png)

---

### User Information

Update the account's username and email address.

- Username: used to sign into MarketSquare
- Email Address: used to receive notifications, updates, and announcements

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-user-information.png)

<x-alert type="info">
A username can only be changed once every 30 days
</x-alert>

---

### Timezone

Select a Timezone and update it by clicking the '**Update**' button.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-user-timezone.png)

---

### GDPR

Export all personal data with respect to the right of data portability.

A zip file will be sent via email to the associated MarketSquare account.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-user-gdpr.png)

---

### Account Deletion

Once an account is deleted, all of its resources and data will be permanently deleted. This includes **all** Projects created by this account. Before deleting an account, be sure to backup any important data or information.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-user-account-delete.png)

<x-alert type="warning">
Deleting an Account is **PERMANENT**. Make sure all important Profile or Project-related content is saved appropriately before proceeding as this action cannot be reversed
</x-alert>

---

To confirm deletion, enter your Username and click the ‘**Delete**’ button.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-user-account-delete-confirm.png)

## Security Settings

Managing a password or two-factor authentication (2FA) is simple with MarketSquare and can be done in Security Settings.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-focus.png)

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-page.png)

---

### Password

It is recommended to avoid reusing passwords, so be sure to use a unique password for MarketSquare.

Strong passwords consist of random words, upper and lowercase letters, numbers and special characters. Make a note of this password and keep it in a safe place.

**Password Requirements:**

- One lowercase character
- One uppercase character
- One number
- One special character
- 12 characters minimum

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-password.png)

<x-alert type="info">
If a password is lost in the future, it can be reset using the associated email address.
</x-alert>

---

### Two-Factor Authentication (2FA)

Two-Factor Authentication, or 2FA, is a second layer of security that can be used to further protect a MarketSquare account.

2FA enforces that a user has access to the same devices used during setup.

We take security very seriously and strongly recommend using 2FA.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-setup.png)

<x-alert type="info">
Enabling Two-Factor Authentication on MarketSquare provides an additional layer of security that makes it much harder for an account to be compromised
</x-alert>

---

#### Install a 2FA App

Get started by Installing a 2FA app onto your device.

MarketSquare 2FA is compatible with the following providers:

- **Authy**: [https://authy.com](https://authy.com/)
- **Google Authenticator**: [Google Play Store](https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en_US&gl=US) | [Apple App Store](https://apps.apple.com/us/app/google-authenticator/id388497605)

---

#### Scan QR Code

The 2FA app on your device should allow a new entry by scanning a QR code or manually entering a 2FA key.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-focus.png)

#### Enter One-Time Code

After scanning or entering a 2FA code into an enrolling device, enter the resulting 6-digit pin into the '2FA Verification Code' field on the Settings page, then click the '**Enable**' button.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-code-focus.png)

<x-alert type="success">
Congratulations! You have enabled Two-Factor Authentication on MarketSquare!
</x-alert>

---

#### Back Up 2FA

After 2FA is activated, we'll have the option to backup the list of single-use 2FA recovery codes.

If a device is lost or reset, each recovery code is used to login directly, bypassing 2FA.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-activated.png)

---

To view this list of 2FA recovery codes, click the '**Recovery Codes**' button, then enter your account password to confirm.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-recovery-confirm.png)

---

These codes are very important. Make a copy of them, label them, and keep them safe.

To generate a fresh list of codes, 2FA must be disabled, then subsequently set back up.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-codes.png)

Users should **not** rely on these codes as a normal means of logging in. Should a user find themselves using these codes often, they should consider improving their security practices.

<x-alert type="info">
Each 2FA recovery code is one-time-use.
</x-alert>

<x-alert type="warning">
If all recovery codes have been used **and** your 2FA device is inaccessible, you will be locked out of your account.
</x-alert>
