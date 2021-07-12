---
title: Getting Started
---

## PHP installation

PHP can be downloaded [here](https://www.php.net/downloads.php).

For further information on how to install PHP on your operating system :

[Windows guide](https://www.php.net/manual/en/install.windows.php)

[Unix guide](https://www.php.net/manual/en/install.unix.php)

[OSx guide](https://www.php.net/manual/en/install.macosx.php)

Alternatively you can use full solutions like [wamp for windows](http://www.wampserver.com/), [lamp](https://doc.ubuntu-fr.org/lamp) for unix or [mamp](https://www.mamp.info/en/) for OSx.

## Composer

> Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.

### Install Composer

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

<!-- markdownlint-disable MD029 -->
3. Next, move into the cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd php-crypto
```

<!-- markdownlint-disable MD029 -->
4. Install the dependencies with composer.
<!-- markdownlint-enable MD029 -->

```bash
composer install
```

<!-- markdownlint-disable MD029 -->
5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
phpunit
```
