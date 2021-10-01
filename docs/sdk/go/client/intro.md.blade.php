---
title: Getting Started
---

# Client

## Install package with `get`

```bash
go get github.com/ArkEcosystem/go-client/client
```

## Development

1. Fork the [package](https://github.com/ArkEcosystem/go-client)
2. Clone forked repository.

```bash
git clone https://github.com/<githubusername>/go-client
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the fresh cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd go-client
```

<!-- markdownlint-disable MD029 -->
4. Install the dependencies.
<!-- markdownlint-enable MD029 -->

```bash
# -t Also Fetches Dependencies Related to Tests
go get -t ./...
```

<!-- markdownlint-disable MD029 -->
5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
go test ./...
```
