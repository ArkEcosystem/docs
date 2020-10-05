---
title: Getting Started
---

## Elixir Installation

[Windows guide](https://elixir-lang.org/install.html#windows)

[Unix guide](https://elixir-lang.org/install.html#unix-and-unix-like)

[OSx guide](https://elixir-lang.org/install.html#macos)

## Hex and mix

> Hex is the package manager for the Erlang ecosystem, you can find it [here](https://hex.pm/).

> mix is a build tool that ships with Elixir that provides tasks for creating, compiling, testing your application, managing its dependencies and much more;

### Install `mix`

`mix` is already shipped with Elixir, so you can start using it as soon as Elixir is installed on your machine.

### Install packages with `mix`

The package can be installed by adding arkecosystem_crypto to your list of dependencies in mix.exs:

```elixir
def deps do
    {:arkecosystem_crypto, "~> 0.1.1"}
end
```

Once installed, you should run the following command to install the dependencies :

```bash
mix deps.get
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/elixir-crypto).

2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/elixir-crypto
   ```

3. Next, move into the cloned directory.

```bash
   cd elixir-crypto
   ```

4. Install the dependencies.

```bash
   mix deps.get
   ```

5. Dependencies are now installed, you can now run the tests to see if everything is running as it should.

```bash
   mix test
   ```
