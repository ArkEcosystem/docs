---
title: Getting Started - Nodem Requirements
---

# Nodem Requirements

Developers running Nodem should be familiar with the following:

* [PHP 8](https://www.php.net/releases/8.0/en.php)
* [Composer](https://getcomposer.org)
* [Valet](https://laravel.com/docs/5.7/valet) or [Homestead](https://laravel.com/docs/5.7/homestead) (_for development_)
* [PostgreSQL](http://www.postgresql.org) or [MySQL](www.mysql.com)

<x-alert type="info">
Review the Nodem Technology Stack **[here.](/docs/nodem/overview/stack)**   
</x-alert>

## Other requirements

The application relies on the `cmd` function that is used to run a `ping` command on the terminal and extract the server response time, this function should work in most cases but there are some considerations to take in mind:

* The `ping` command may not work in Windows-based servers
* Some servers may not have permission to run the PHP `cmd` function.
