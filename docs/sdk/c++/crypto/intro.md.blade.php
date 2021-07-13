---
title: Getting Started
---

# Crypto

## Development

1. Fork the [package](https://github.com/ARKEcosystem/cpp-crypto).
2. Clone the newly forked repository.

```bash
git clone https://github.com/<githubusername>/cpp-crypto
```

<!-- markdownlint-disable MD029 -->
3. Next, we move into the cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd cpp-crypto
```

<!-- markdownlint-disable MD029 -->
4. Build the package using CMake.
<!-- markdownlint-enable MD029 -->

```bash
mkdir build && cd build
cmake -DUNIT_TEST=ON ..
cmake --build .
```

<!-- markdownlint-disable MD029 -->
5. Now we can run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
./test/ark_cpp_crypto_tests
```

### ESP32 (PlatformIO)

```bash
pio run -e esp32_tests -d test/ -t upload
```
