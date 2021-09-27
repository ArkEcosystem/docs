---
title: Getting Started
---
## Ruby installation

Ruby can be downloaded [here](https://www.ruby-lang.org/en/downloads/).

For further information on how to install Ruby on your operating system, read [here](https://www.ruby-lang.org/en/documentation/installation/).

Alternatively you can use [RubyInstaller](https://rubyinstaller.org/) on Windows and [rbenv](https://github.com/rbenv/rbenv) and [rvm](https://rvm.io/) on Unix & OSx.

## Gem

> Gem is a command-line tool interfacing with RubyGems, the package manager for the Ruby Programming language that provides a standard format for distributing Ruby programs and libraries (in a self-contained format called a "gem").

### Install Gem

To download and install Gem, follow the instructions [here](https://rubygems.org/pages/download).

### Install package with Gem

Add this line to your application's Gemfile and then execute the command `bundle` in your terminal

```bash
gem 'arkecosystem-crypto'
```

Alternatively, install it from the command line.

```bash
gem install arkecosystem-crypto
```

## Development

1. Fork the [package](https://github.com/ArkEcosystem/ruby-crypto).

2. Clone your forked repository.

```bash
git clone https://github.com/<githubusername>/ruby-crypto
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the fresh cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd ruby-crypto
```

<!-- markdownlint-disable MD029 -->
4. Install your dependencies with `Bundle`.
<!-- markdownlint-enable MD029 -->

```bash
bundle install
```

<!-- markdownlint-disable MD029 -->
5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
# TODO: see how it's done in ruby, lot of ways it seems.
```
