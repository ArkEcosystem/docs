---
title: Getting Started
---

# Client

### Install package with `pip`

```bash
pip install arkecosystem-client
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/python-client).
2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/python-client
   ```

3. Next, move into the fresh cloned directory.

```bash
   cd python-client
   ```

4. The next step would be to create something like a [virtual environment](https://virtualenv.pypa.io/en/latest/) to ensure no name clashes occur.
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
   pip install \
           requests \
           backoff \
           flake8 \
           flake8-import-order \
           flake8-print \
           flake8-quotes \
           pytest \
           pytest-responses \
           pytest-mock \
           pytest-cov
   ```

7. Dependencies are now installed, you can now run the tests to see if everything is running as it should.

```bash
   pytest
   ```
