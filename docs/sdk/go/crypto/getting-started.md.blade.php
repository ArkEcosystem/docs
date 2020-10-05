---
title: Getting Started
---

## Go installation

Go can be downloaded [here](https://golang.org/dl/).

For further information on how to install Go on your operating system, follow [this guide](https://golang.org/doc/install).

### Go Get

> Get downloads the packages named by the import paths, along with their dependencies. It then installs the named packages, like 'go install'.

### Install package with `get`

```bash
go get github.com/ARKEcosystem/go-crypto/crypto
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/go-crypto).

2. Clone your forked repository.

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
