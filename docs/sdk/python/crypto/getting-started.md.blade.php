---
title: Getting Started
---

## Python installation

Python can be downloaded [here](https://www.python.org/downloads/).

For further information on how to install Python on your operating system :

[Windows guide](https://docs.python.org/3/using/windows.html)

[Unix guide](https://docs.python.org/3/using/unix.html)

[OSx guide](https://docs.python.org/3/using/mac.html)

On OSx you can also install Python through `HomeBrew`, which would also install pip along, to do so, you need to
[install HomeBrew](https://brew.sh/) and then run the following command : `brew install python3`

## pip

> pip is the standard package manager for Python. It allows you to install and manage additional packages that are not
> part of the Python standard library.

### Install `pip`

**On Windows :**

* Download [get-pip.py](https://bootstrap.pypa.io/get-pip.py)
* Open your terminal (`powershell`, `cmd`, ...) and navigate to the folder containing `get-pip.py`
* Run the following command : `python get-pip.py`
* Pip is now installed

**On Unix :**

*Debian / Ubuntu*:

```bash
sudo apt install python3-pip
```

*CentOS / Rhel*:

```bash
sudo yum install epel-release
sudo yum install python-pip
```

*Fedora*:

```bash
sudo dnf install python3
```

*Arch Linux*:

```bash
sudo pacman -S python-pip
```

*openSUSE*:

```bash
sudo zypper install python3-pip
```

**On macOS**:

Download `get-pip.py` and then run it

```bash
curl https://bootstrap.pypa.io/get-pip.py -o get-pip.py
python get-pip.py
```

*With Brew*:

```bash
brew install python3
```

> You can verify that`pip` was installed properly by running the following command in your terminal : `pip -V` which
> should returns the version of the installed `pip` program.

### Install package with `pip`

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
pip install flake8 flake8-import-order flake8-print flake8-quotes pytest pytest-cov base58 binary-helpers coincurve
```

<!-- markdownlint-disable MD029 -->
7. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

```bash
pytest
```
