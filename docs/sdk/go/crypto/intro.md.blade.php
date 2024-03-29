---
title: Getting Started
---

# Crypto

## Install package with `get`

> Get downloads the packages named by the import paths, along with their dependencies. It then installs the named packages, like 'go install'.

```bash
go get github.com/ArkEcosystem/go-crypto/crypto
```

## Development

1. Fork the [package](https://github.com/ArkEcosystem/go-crypto).
2. Clone forked repository.

```bash
git clone https://github.com/<githubusername>/go-crypto
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd go-crypto
```

<!-- markdownlint-disable MD029 -->
4. Install the dependencies.
<!-- markdownlint-enable MD029 -->

```bash
# -t Will Also Fetch Dependencies Related to Tests
go get -t ./...
```

<!-- markdownlint-disable MD029 -->
5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
go test ./...
```
