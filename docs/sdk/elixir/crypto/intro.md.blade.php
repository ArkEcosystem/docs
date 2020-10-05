---
title: Getting Started
---

# Crypto

## Install packages with `mix`

The package can be installed by adding arkecosystem\_crypto to your list of dependencies in mix.exs:

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
