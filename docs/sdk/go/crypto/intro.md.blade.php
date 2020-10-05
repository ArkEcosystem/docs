---
title: Getting Started
---

# Crypto

## Install package with `get`

> Get downloads the packages named by the import paths, along with their dependencies. It then installs the named packages, like 'go install'.

```bash
go get github.com/ARKEcosystem/go-crypto/crypto
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/go-crypto).
2. Clone forked repository.

```bash
   git clone https://github.com/<githubusername>/go-crypto
   ```

3. Next, move into the cloned directory.

```bash
   cd go-crypto
   ```

4. Install the dependencies.

```bash
   # -t Will Also Fetch Dependencies Related to Tests
   go get -t ./...
   ```

5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.

```bash
   go test ./...
   ```
