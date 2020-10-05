---
title: Getting Started
---

# Crypto

## Install Composer

> Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage \(install/update\) them for you.

To install Composer on your system, follow [this guide](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) for Unix and OSx and [this guide](https://getcomposer.org/doc/00-intro.md#installation-windows) for Windows.

## Install package with Composer

```bash
composer require arkecosystem/crypto
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/php-crypto).
2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/php-crypto
   ```

3. Next, move into the cloned directory.

```bash
   cd php-crypto
   ```

4. Install the dependencies with composer.

```bash
   composer install
   ```

5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.

```bash
   phpunit
   ```
