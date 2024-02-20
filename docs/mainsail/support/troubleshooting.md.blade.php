---
title: Support - Troubleshooting
---

# Troubleshooting

Most of the issues you will encounter are related to `pm2` not properly responding so the first thing you can try is to kill your pm2 daemon and refresh it.

```bash
pm2 kill && pm2 cleardump && pm2 reset
```

If this doesn't help, read the known issues below and see if any of those solve your issues.

## Process Fails to Start After Update

If the processes fail to start or restart after an update it is most likely an issue with pm2. Running `pm2 update` should usually resolve the issue.

If this doesn't resolve the issue you should run `pm2 delete all && mainsail core:start && pm2 logs`.

## Process Has Entered an Unknown State

If you are receiving a message to the effect of `The "..." process has entered an unknown state.` your pm2 instance is not responding properly. This is usually resolved by a simple `pm2 update`, if that doesn't help try `pm2 kill` to destroy the pm2 daemon so it gets restarted the next time an application tries to access it.
