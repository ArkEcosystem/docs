---
title: Getting Started
---

# Client

## Install package with `pip`

```bash
pip install arkecosystem-client
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/python-client).
2. Clone your forked repository.

```bash
git clone https://github.com/<githubusername>/python-client
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the fresh cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd python-client
```

<!-- markdownlint-disable MD029 -->
4. The next step would be to create something like a [virtual environment](https://virtualenv.pypa.io/en/latest/) to ensure no name clashes occur.
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

<!-- markdownlint-disable MD029 -->
7. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
pytest
```
