---
title: Getting Started
---

# Client

## Install package with CocoaPods

To integrate the ARK Swift Client in your project, add the following content to your `Podfile` :

```
'SwiftClient', :git => 'https://github.com/ARKEcosystem/swift-client.git', :tag => '1.0.1'
```

Afterward, install it by running `pod install`.

## Development

1. Fork the [package](https://github.com/ARKEcosystem/swift-client).
2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/swift-client
   ```

3. Next, move into the fresh cloned directory.

```bash
   cd swift-client/Client
   ```

4. Install the dependencies.

   For this you will first need to install [Carthage](https://github.com/Carthage/Carthage), which can be done quickly with Homebrew: `brew install carthage`

```bash
   carthage update
   ```

You will also need to install Swiftlint as an additional step, as that is used to lint our code. The easiest way to install this is by using Homebrew: brew install swiftlint.

Dependencies are now installed, you can now run the tests to see if everything is running like it should by opening the Client.xcodeproj in Xcode.

### Additional Information

By default, the requests are performed with [Alamofire](https://github.com/Alamofire/Alamofire), and the response is given to the callback function as `[String: Any]`. The functions that are responsible for this can be found in `Utils.swift`. You can easily override this default functionality by defining your own `handleApiGet` and `handleApiPost` functions and passing them to the endpoint object \(e.g. `Blocks`. An example of how this is done can be found by looking at the tests, e.g. those of [Blocks](https://github.com/ARKEcosystem/swift-client/blob/master/Client/ClientTests/Api/Endpoints/BlocksTest.swift), as a mocked api handler is used for them.
