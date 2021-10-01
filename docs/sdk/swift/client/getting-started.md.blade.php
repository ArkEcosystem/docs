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

To integrate the ARK Swift Client in your project, add the following content to your `Podfile` :

```pod
'SwiftClient', :git => 'https://github.com/ArkEcosystem/swift-client.git', :tag => '1.0.1'
```

Afterward, install it by running `pod install`.

## Development

1. Fork the [package](https://github.com/ArkEcosystem/swift-client).

2. Clone your forked repository.

```bash
git clone https://github.com/<githubusername>/swift-client
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the fresh cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd swift-client/Client
```

<!-- markdownlint-disable MD029 -->
4. Install the dependencies.
<!-- markdownlint-enable MD029 -->

For this you will first need to install [Carthage](https://github.com/Carthage/Carthage), which can be done quickly with Homebrew: `brew install carthage`

```bash
carthage update
```

You will also need to install Swiftlint as an additional step, as that is used to lint our code. The easiest way to install this is by using Homebrew: brew install swiftlint.

Dependencies are now installed, you can now run the tests to see if everything is running like it should by opening the Client.xcodeproj in Xcode.

### Additional Information

By default, the requests are performed with [Alamofire](https://github.com/Alamofire/Alamofire), and the response is given to the callback function as `[String: Any]`.
The functions that are responsible for this can be found in `Utils.swift`.
You can easily override this default functionality by defining your own `handleApiGet` and `handleApiPost` functions and passing them to the endpoint object (e.g. `Blocks`.
An example of how this is done can be found by looking at the tests, e.g. those of [Blocks](https://github.com/ArkEcosystem/swift-client/blob/master/Client/ClientTests/Api/Endpoints/BlocksTest.swift), as a mocked api handler is used for them.
