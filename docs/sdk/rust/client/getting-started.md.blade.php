---
title: Getting Started
---
## Rust installation

Rust can be installed using `rustup` as described [here](https://www.rust-lang.org/tools/install).

Other installation methods are available [here](https://forge.rust-lang.org/other-installation-methods.html).

## Cargo

> Cargo is the Rust package manager. Cargo downloads your Rust package’s dependencies, compiles your packages, makes distributable packages, and uploads them to crates.io, the Rust community’s package registry.

### Install Cargo

Cargo is shipped by default with `rustup`. Alternatively, you can [build Cargo from source](https://github.com/rust-lang/cargo#compiling-from-source).

### Install package with Cargo

Add the following to your `Cargo.toml`:

```ini
[dependencies]
arkecosystem-client = {git = "https://github.com/ArkEcosystem/rust-client", branch = "master" }
```

You can now run `cargo build`, and Cargo will fetch the new dependencies and all of their dependencies.

## Development

1. Fork the [package](https://github.com/ArkEcosystem/rust-client).

2. Clone your forked repository.

```bash
git clone https://github.com/<githubusername>/rust-client
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the fresh cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd rust-client
```

<!-- markdownlint-disable MD029 -->
4. Install the dependencies.
<!-- markdownlint-enable MD029 -->

```bash
cargo build
```

<!-- markdownlint-disable MD029 -->
5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
cargo test
```
