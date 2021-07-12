---
title: Installation
---

# Installation

Python can be downloaded [here](https://www.python.org/downloads/).

For further information on how to install Python on your operating system :

[Windows guide](https://docs.python.org/3/using/windows.html)

[Unix guide](https://docs.python.org/3/using/unix.html)

[OSx guide](https://docs.python.org/3/using/mac.html)

On OSx you can also install Python through `HomeBrew`, which would also install pip along, to do so, you need to [install HomeBrew](https://brew.sh/) and then run the following command : `brew install python3`

## Install `pip`

> pip is the standard package manager for Python. It allows you to install and manage additional packages that are not part of the Python standard library.

**On Windows :**

* Download [get-pip.py](https://bootstrap.pypa.io/get-pip.py)
* Open your terminal (`powershell`, `cmd`, ...) and navigate to the folder containing `get-pip.py`
* Run the following command : `python get-pip.py`
* Pip is now installed

**On Unix :**

_Debian / Ubuntu_:

```bash
sudo apt install python3-pip
```

_CentOS / Rhel_:

```bash
sudo yum install epel-release
sudo yum install python-pip
```

_Fedora_:

```bash
sudo dnf install python3
```

_Arch Linux_:

```bash
sudo pacman -S python-pip
```

_openSUSE_:

```bash
sudo zypper install python3-pip
```

**On macOS**:

Download `get-pip.py` and then run it

```bash
curl https://bootstrap.pypa.io/get-pip.py -o get-pip.py
python get-pip.py
```

_With Brew_:

```bash
brew install python3
```

> You can verify that`pip` was installed properly by running the following command in your terminal : `pip -V` which should returns the version of the installed `pip` program.
