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

3. Next, we move into the cloned directory.

```bash
   cd cpp-crypto
   ```

4. Build the package using CMake.

```bash
   mkdir build && cd build
   cmake -DUNIT_TEST=ON ..
   cmake --build .
   ```

5. Now we can run the tests to see if everything is running as it should.

```bash
    ./test/ark_cpp_crypto_tests
   ```

### ESP32 \(PlatformIO\)

```bash
pio run -e esp32_tests -d test/ -t upload
```
