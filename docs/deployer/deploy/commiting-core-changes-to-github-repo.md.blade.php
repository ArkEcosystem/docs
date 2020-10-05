---
title: Committing Core Changes to GitHub Repo
---

# Committing Core Changes to GitHub Repo

Now that your genesis node is running, you may have made changes to some Core configuration files on your server. If so, it is advisable to push those changes to your GitHub repository before building your network. If you haven't made any changes, disregard this step.

1. Change directories using:

```bash
cd ~/core-bridgechain/
```

1. To view which files have been changed and need to be updated on Github type:

```bash
git status
```

1. Before we continue, let’s make sure there were no new changes made between us installing and us forking the core repository. To do this, execute:

```bash
git pull
```

1. Add files to the staging area by executing:

```bash
git add
```

1. Commit the changes with the command:

```bash
git commit -m "chore: new network config"
```

You can rename `new network config` to some other specific task label. This is just a reference for other GitHub contributors. 6. Once the changes have been committed, we then need to push them to our repository. Do this by executing:

```bash
git push
```

1. Enter your GitHub username and password credentials.

Your changes have now been successfully pushed to your GitHub repository.
