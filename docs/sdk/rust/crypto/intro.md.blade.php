---
title: Getting Started
---

# Crypto

## Install package with Cargo

Add the following to your `Cargo.toml`:

```text
[dependencies]
arkecosystem-crypto = {git = "https://github.com/ARKEcosystem/rust-crypto", branch = "master" }
```

You can now run `cargo build`, and Cargo will fetch the new dependencies and all of their dependencies.s

## Development

1. Fork the [package](https://github.com/ARKEcosystem/rust-crypto).
2. Clone your forked repository.

```bash
git clone https://github.com/<githubusername>/rust-crypto
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd rust-crypto
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
