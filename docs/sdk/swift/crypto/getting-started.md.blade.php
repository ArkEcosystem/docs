---
title: Getting Started
---

## Requirements

   > iOS 8.0+ / macOS 10.10+
   Xcode 9.0+

## Swift installation

Swift is the alternative to Object-C by Apple. To get started, head over to the official [guide](https://swift.org/getting-started/).

Swift can be downloaded [here](https://swift.org/download/#using-downloads).

For further information on how to install Swift, go on the `Installation` section off the same page.

## CocoaPods

> [CocoaPods](https://cocoapods.org) is a dependency manager for Swift (and Objective-C) Cocoa Projects.

### Install CocoaPods

To install CocoaPods, head over  to the official [guide](https://guides.cocoapods.org/using/getting-started.html).

### Install package with CocoaPods

To integrate the ARK Swift Crypto in your project, add the following content to your `Podfile` :

```pod
'SwiftCrypto', :git => 'https://github.com/ARKEcosystem/swift-crypto.git', :tag => '1.0.1'
```

Afterward, install it by running `pod install`.

## Development

1. Fork the [package](https://github.com/ARKEcosystem/swift-crypto).

2. Clone your forked repository.

```bash
git clone https://github.com/<githubusername>/swift-crypto
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd swift-crypto/Crypto
```

<!-- markdownlint-disable MD029 -->
4. Install the dependencies.
<!-- markdownlint-enable MD029 -->

```bash
pod install
```

Installing the dependency (BitcoinKit) of this SDK will require a good bit of time. So after running `pod install` it might take up to 10 minutes to install the BitcoinKit dependency.
This is due to the crypto dependencies it relies on, like secp256k, that are compiled from scratch during the install.
Don't be alarmed when it looks like the installation got stuck. It's just the underlying dependencies taking their time.

You will also need to install [Swiftlint](https://github.com/realm/SwiftLint) as an additional step, as that is used to lint our code.
The easiest way to install this is by using Homebrew: `brew install swiftlint`.

<!-- markdownlint-disable MD029 -->
5. Dependencies are now installed, you can now run the tests to see if everything is running like it should be opening the `Crypto.xcworkspace` in Xcode.
<!-- markdownlint-enable MD029 -->
