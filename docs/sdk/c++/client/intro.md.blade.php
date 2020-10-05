---
title: Getting Started
---

# Client

## Development

1. Fork the [package](https://github.com/ARKEcosystem/cpp-client).
2. Clone the newly forked repository.

```bash
   git clone https://github.com/<githubusername>/cpp-client
   ```

3. Next, we move into the cloned directory.

```bash
   cd cpp-client
   ```

4. Build the package using CMake.

```bash
   mkdir build && cd build
   cmake -DUNIT_TEST=ON ..
   cmake --build .
   ```

5. Now we can run the tests to see if everything is running as it should.

```bash
   ./test/ark_cpp_client_tests
   ```

### ESP32 \(PlatformIO\)

```bash
pio run -e esp32 -d test/ -t upload
```
