---
title: Getting Started
---

# Crypto

## Install package with `pip`

```bash
pip install arkecosystem-crypto
```

## Development

1. Fork the [package](https://github.com/ArkEcosystem/python-crypto).
2. Clone your forked repository.

```bash
git clone https://github.com/<githubusername>/python-crypto
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd python-crypto
```

<!-- markdownlint-disable MD029 -->
4. The next step would be to create something like a [virtual environment](https://virtualenv.pypa.io/en/latest/) and install the dependencies of this package inside it.
<!-- markdownlint-enable MD029 -->
<!-- markdownlint-disable MD029 -->
5. Create and enter the virtual environment
<!-- markdownlint-enable MD029 -->

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

<!-- markdownlint-disable MD029 -->
6. Once inside the virtualenv, you can proceed to install the dependencies. These are listed inside the setup.py file.
<!-- markdownlint-enable MD029 -->

```bash
pip install flake8 flake8-import-order flake8-print flake8-quotes pytest pytest-cov
```

<!-- markdownlint-disable MD029 -->
7. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
pytest
```
