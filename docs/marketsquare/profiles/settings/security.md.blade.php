---
title: Settings - Security
---

# Security Settings

The Security page lets you change your MarketSquare password or manage your two-factor authentication (2FA) settings.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-page.png)

## Getting Started

You can find this page by selecting ‘**Settings**’ from the Profile drop-down menu.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-focus.png)

---

Next, select the **'Security'** sidebar tab.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-focus.png)

## Password

It's strongly recommended to avoid reusing passwords, be sure to use something unique for your MarketSquare account.

Strong passwords consist of random words, upper and lowercase letters, numbers, and special characters. Make a note of this password and keep it in a safe place.

**Password Requirements:**

- One lowercase character
- One uppercase character
- One number
- One special character
- 12 characters minimum

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-password.png)

<x-alert type="info">
If your password is ever lost or forgotten, it can be reset using your account's email address.
</x-alert>

## Two-Factor Authentication (2FA)

Two-Factor Authentication, or 2FA, is a second layer of security that can be used to further protect your MarketSquare account.

2FA enforces that a user has access to the same devices used during setup.

We take security very seriously and strongly recommend using 2FA.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-setup.png)

<x-alert type="info">
Enabling Two-Factor Authentication on MarketSquare provides an extra layer of security that makes it much harder for your account to be compromised.
</x-alert>

### 2FA Setup

Open or install any compatible 2FA app.

MarketSquare 2FA is tested to work with the following:

- **Authy**: [https://authy.com](https://authy.com/)
- **Google Authenticator**: [Google Play Store](https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en_US&gl=US) | [Apple App Store](https://apps.apple.com/us/app/google-authenticator/id388497605)

---

#### Scan QR Code

The 2FA app on your device should allow a new entry by scanning a QR code or manually entering a 2FA key.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-focus.png)

---

#### Enter One-Time Code

After scanning or entering a 2FA code into your enrolling device, enter the 6-digit pin into the '2FA Verification Code' field on the Settings page, then click the '**Enable**' button.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-code-focus.png)

<x-alert type="success">
Congratulations! You enabled Two-Factor Authentication for your MarketSquare profile!
</x-alert>

### Back Up 2FA

After 2FA is activated, you'll have the option to back up the list of single-use 2FA recovery codes.

If a device is lost or reset, each recovery code is used to log in directly, bypassing 2FA. Each code may be used only once.

<x-alert type="danger">
If all recovery codes have been used **and** your 2FA device is inaccessible, you will be locked out of your account.
</x-alert>

---

To view this list, click the '**Recovery Codes**' button.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-activated.png)

---

Next, enter your account password and click **'Confirm'**.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-recovery-confirm.png)

---

You'll now have the option to download your recovery codes.

These codes are **very important**. Make a copy of them, label them, and keep them safe.

<x-alert type="warning">
You should **not** rely on these codes as a normal way to log in.
</x-alert>

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-codes.png)

<x-alert type="info">
To generate a fresh list of codes, 2FA must be disabled, then subsequently set back up.
</x-alert>

### Disabling 2FA

You can also disable 2FA. Your recovery codes will also no longer work. You can re-enable 2FA whenever you'd like.

To turn off 2FA, click the **'Disable'** button.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-activated.png)

---

You'll then be asked to enter your account's password.

Enter your password and click **'Confirm'** when you're ready to proceed.

![](/storage/docs/docs/marketsquare/assets/profiles/profiles-settings-security-2fa-disable.png)

<x-alert type="warning">
Your 2FA recovery codes will also no longer work.
</x-alert>
