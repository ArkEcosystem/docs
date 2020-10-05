---
title: Getting Started
---

# Client

### Install package with Cargo

Add the following to your `Cargo.toml`:

```
[dependencies]
arkecosystem-client = {git = "https://github.com/ARKEcosystem/rust-client", branch = "master" }
```

You can now run `cargo build`, and Cargo will fetch the new dependencies and all of their dependencies.

## Development

1. Fork the [package](https://github.com/ARKEcosystem/rust-client).
2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/rust-client
   ```

3. Next, move into the fresh cloned directory.

```bash
   cd rust-client
   ```

4. Install the dependencies.

```bash
   cargo build
   ```

5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.

```bash
   cargo test
   ```
