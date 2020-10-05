---
title: Getting Started
---

# Crypto

## Install Package via Gradle or Maven

Follow instructions for **Gradle** or **Maven** on how to add project to your source control.

### Gradle

Add this to your **build.gradle** file:

```java
implementation 'org.arkecosystem:crypto:1.2.9'
```

Execute the following command:

```bash
gradle build
```

### Maven

Add this to **pom.xml** file:

```markup
<dependency>
  <groupId>org.arkecosystem</groupId>
  <artifactId>crypto</artifactId>
  <version>1.2.9</version>
</dependency>
```

Execute the following command:

```bash
mvn install
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/java-crypto).
2. Clone forked repository.

```bash
   git clone https://github.com/<githubusername>/java-crypto
   ```

3. Next, move into the fresh cloned directory.

```bash
   cd java-crypto
   ```

4. Dependencies are now installed, you can now run the tests to see if everything is running as it should.

With Maven

```bash
   mvn test
```

With Gradle

```bash
   gradle test
```
