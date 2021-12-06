---
title: Version Control
---

# Version Control

## Branches

### Introduction

These guidelines outline what things should be kept in mind while developing new projects and how to structure the branches to guarantee a streamlined workflow.

### Applications & Packages (Deployable / Non-Deployable)

#### Master

The `master` branch should be looked at as the `stable` branch. This branch should only contain code that passes all tests and has been previously tested on the `develop` branch by multiple developers.

#### Develop

The `develop` branch should be looked at as the `beta` branch. It is periodically merged into `master` after thorough testing. **All pull-requests must be sent to this branch.**

## Commits

### Introduction

These guidelines are based on [Angular's commit convention](https://github.com/conventional-changelog/conventional-changelog/tree/master/packages/conventional-changelog-angular) and should be followed as closely as possible, or your pull-request is subject to rejection.

#### TL;DR

Messages must be matched by the following regex:

#### Examples

Appears under "Features" header, `crypto` subheader:

```text
feat(crypto): add arkHistoryListing option
```

Appears under "Bug Fixes" header, `crypto` subheader, with a link to issue #28:

```text
fix(crypto): stop breaking history listing when no history in cache.

Closes #28
```

Appears under "Performance Improvements" header, and under "Breaking Changes" with the breaking change explanation:

```text
perf(crypto): remove arkHistoryListing option

BREAKING CHANGE: The ARK history listing option is removed in favor of new ARK history subpage.
```

The following commit and commit `7d1bbd2` do not appear in the changelog if they are under the same release. If not, the revert commit appears under the "Reverts" header.

```text
revert: feat(crypto): add 'arkHistoryListing ' option

This reverts commit 7d1bbd2654a317a13331b17617d973392f415f02.
```

### Full Message Format

A commit message consists of a **header**, **body** and **footer**. The header has a **type**, **scope** and **subject**:

The **header** is mandatory and the **scope** of the header is optional.

### Revert

If the commit reverts a previous commit, it should begin with `revert:`, followed by the header of the reverted commit. In the body, it should say: `This reverts commit <hash>.`, where the hash is the SHA of the commit being reverted.

### Type

If the prefix is `feat`, `fix` or `perf`, it will appear in the changelog. However, if there is any BREAKING CHANGE, the commit will always appear in the changelog.

Other prefixes are up to your discretion. Suggested prefixes are `docs`, `chore`, `style`, `refactor`, and `test` for non-changelog related tasks.

All available types:

* ***feat:*** adding a new feature (will appear in the changelog)
* ***fix:*** bugfixes (will appear in the changelog)
* ***perf:*** A code change that improves performance (will appear in the changelog)
* ***refactor:*** A code change that neither fixes a bug nor adds a feature
* ***chore:*** small task-related things that don’t fix bugs, e.g. rewording a translation
* **docs:** documentation only changes
* ***refactor:*** changing existing code without it being a bugfix or introducing a new feature
* ***test:*** test related, e.g. adding missing coverage or fixing failing ones
* ***Style:*** Changes that do not affect the meaning of the code (white-space, formatting, missing semi-colons, etc)
* ***build:*** Changes that affect the build system or external dependencies (example scope: npm)
* ***ci:*** Changes to our CI configuration files and scripts (example scope: GitHub)

### Scope

The scope could be anything specifying the place of the commit change. For example `core`, `profile`, `crypto`, `database` etc...

### Subject

The subject contains a succinct description of the change:

* use the imperative, present tense: "change" not "changed" nor "changes"
* don't capitalize the first letter
* no dot (.) at the end

### Body

Just as in the **subject**, use the imperative, present tense: "change" not "changed" nor "changes". The body should include the motivation for the change and contrast this with previous behavior.

The footer should contain any information about **Breaking Changes** and is also the place to reference GitHub issues that this commit **Closes**.

**Breaking Changes** should start with the word `BREAKING CHANGE:` with a space or two newlines. The rest of the commit message is then used for this.
