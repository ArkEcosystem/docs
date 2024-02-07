---
title: Security - Staying Up-to-Date
---

# Staying Up-to-Date

The first thing we're going to do is make sure we have the latest security updates for Ubuntu. Once everything installs, you will need to reboot to make sure all the upgrades applied adequately.

```bash
sudo apt-get update -y
sudo apt-get upgrade -y
```

```bash
sudo reboot
```

You may also consider having your server update itself automatically using a cronjob. A useful tool is [cron-apt](https://help.ubuntu.com/community/AutoWeeklyUpdateHowTo):

```bash
sudo apt-get install cron-apt
```
