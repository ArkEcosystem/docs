---
title: Getting Started
---

## .NET installation

<x-alert type="danger">
WARNING! This package is deprecated and is no longer maintained and supported.
</x-alert>

.NET framework can be downloaded [here](https://dotnet.microsoft.com/download).

For further information on how to install .NET on your operating system :

[Windows guide](https://dotnet.microsoft.com/learn/dotnet/hello-world-tutorial/intro?initial-os=windows)

[Unix guide](https://dotnet.microsoft.com/learn/dotnet/hello-world-tutorial/intro?initial-os=linux)

[OSx guide](https://dotnet.microsoft.com/learn/dotnet/hello-world-tutorial/intro?initial-os=macos)

## NuGet

> NuGet is the package manager for .NET. The NuGet client tools provide the ability to produce and consume packages. The NuGet Gallery is the central package repository used by all package authors and consumers.

### Package Manager

```bash
Install-Package ARKEcosystem.Client -Version 0.2.1
```

### .NET CLI

```bash
dotnet add package ARKEcosystem.Client --version 0.2.1
```

### PackageReference

For projects that support PackageReference, copy this XML node into the project file to reference the package.

```xml
<PackageReference Include="ArkEcosystem.Client" Version="0.2.1" />
```

### Paket CLI

```bash
paket add ARKEcosystem.Client --version 0.2.1
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/dotnet-client).

2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/dotnet-client
   ```

3. Next, move into the fresh cloned directory.

```bash
   cd dotnet-client
   ```
