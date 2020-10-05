---
title: Getting Started
---

# Crypto

### Install package with `pip`

```bash
pip install arkecosystem-crypto
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/python-crypto).
2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/python-crypto
   ```

3. Next, move into the cloned directory.

```bash
   cd python-crypto
   ```

4. The next step would be to create something like a [virtual environment](https://virtualenv.pypa.io/en/latest/) and install the dependencies of this package inside it.
5. Create and enter the virtual environment

```bash
    # With virtualenv (on Unix and OSx)
    mkdir my-amazing-ark-project
    cd my-amazing-ark-project
    virtualenv virtualEnvName
    source venv/bin/activate

    # With virtualenv (on Windows)
    mkdir my-amazing-ark-project
    cd my-amazing-ark-project
    virtualenv virtualEnvName
    .\venv\Scripts\activate.bat
   ```

6. Once inside the virtualenv, you can proceed to install the dependencies. These are listed inside the setup.py file.

```bash
   pip install flake8 flake8-import-order flake8-print flake8-quotes pytest pytest-cov
   ```

7. Dependencies are now installed, you can now run the tests to see if everything is running as it should.

```bash
   pytest
   ```
