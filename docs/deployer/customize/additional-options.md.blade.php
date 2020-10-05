---
title: Additional Options
---

# Additional Options

In this step, we have the option to specify the Git remote origin and put a license to the codebase. This is an optional step and can be modified or added at a later date.

## Git Remote Origin

Is where you put the git origin of your repository where Core will reside and where all changes will be pushed. Essentially, this means that the deployment process will attempt to connect to a location on GitHub you specify and push your custom bridgechain code onto it. Also, when future peers try to download your modified Core, they will do it from this location. If you do not have this configured, you will have to manually provide Core code to peers in some other way, so it is advised to have this step pre-configured by handling the GitHub tasks that are necessary to utilize this function. More details on that procedure are found in the pre-requirements section at the top of this documentation.

## Specify License

Can specify your own license name that will be put in the license file of the Core repository \(and Explorer if applicable\). It usually follows this format: _Copyright \[year\] \(c\) \[Project Name\] \[email\]_. Push-Button Blockchain is released under MIT standards.
