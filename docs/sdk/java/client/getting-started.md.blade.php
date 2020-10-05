---
title: Getting Started
---

## Java installation

Java can be downloaded [here](https://www.oracle.com/technetwork/java/javase/downloads/index.html).

[Windows guide](https://docs.oracle.com/javase/10/install/installation-jdk-and-jre-microsoft-windows-platforms.htm#JSJIG-GUID-A7E27B90-A28D-4237-9383-A58B416071CA)

[Unix guide](https://docs.oracle.com/javase/10/install/installation-jdk-and-jre-linux-platforms.htm#JSJIG-GUID-737A84E4-2EFF-4D38-8E60-3E29D1B884B8)

[OSx guide](https://docs.oracle.com/javase/10/install/installation-jdk-and-jre-macos.htm#JSJIG-GUID-2FE451B0-9572-4E38-A1A5-568B77B146DE)

Alternatively you can install [OpenJDK](https://openjdk.java.net/), Recently licensing on Oracle's hosted Java installation changed, so we recommend using OpenJDK.

## Gradle

> Gradle is an open-source build automation tool that is designed to be flexible enough to build almost any type of software.

### Install Gradle

To install Gradle on your operating system, follow [this guide](https://gradle.org/install/).

[More detailed guide on Gradle](https://docs.gradle.org/current/userguide/getting_started.html).

```bash
compile group: 'org.arkecosystem.client', name: 'client', version: '0.1.2'
```

## Maven

> Maven is a build automation tool used primarily for Java projects.

### Install Maven

To install Maven on your operating system, follow [this guide](https://maven.apache.org/install.html).

[More detailed guide on Maven](https://maven.apache.org/guides/getting-started/maven-in-five-minutes.html).

Once installed, you can edit the `pom.xml` file of the project and add the following values :

```xml
<dependency>
  <groupId>org.arkecosystem</groupId>
  <artifactId>client</artifactId>
  <version>0.1.2</version>
</dependency>
```

## Development

1. Fork the [package](https://github.com/ARKEcosystem/java-client).

2. Clone your forked repository.

```bash
   git clone https://github.com/<githubusername>/java-client
   ```

3. Next, move into the fresh cloned directory.

```bash
   cd java-client
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
