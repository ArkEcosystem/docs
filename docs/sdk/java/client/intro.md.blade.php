---
title: Getting Started
---

# Client

## Install Package via Gradle or Maven

Follow instructions for **Gradle** or **Maven** on how to add project to your source control.

### Gradle

Add this to your **build.gradle** file:

```java
implementation 'org.arkecosystem:client:1.2.9'
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
   <artifactId>client</artifactId>
   <version>1.2.9</version>
</dependency>
```

Execute the following command:

```bash
mvn install
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/java-client).
2. Clone forked repository.

```bash
git clone https://github.com/<githubusername>/java-client
```

<!-- markdownlint-disable MD029 -->
3. Next, move into the fresh cloned directory.
<!-- markdownlint-enable MD029 -->

```bash
cd java-client
```

<!-- markdownlint-disable MD029 -->
4. Dependencies are now installed, you can now run the tests to see if everything is running as it should.
<!-- markdownlint-enable MD029 -->

**With Maven**:

```bash
mvn test
```

**With Gradle**:

```bash
gradle test
```
