---
title: Code Reviews
---

# Code Reviews

## Introduction

Code Reviews are important and need to be done frequently so they should be as fast and easy as possible to make for a smooth process. This document will outline a few things to keep in mind both for the author and reviewer which have to work together to make things work.

## Keep Pull-Requests below 500 lines of changes (Cause of potential rejection)

Large Pull-Requests are practically asking for bugs to slip through because of the sheer amount of changes that have to be kept in mind and how it affects all the working parts of the application. Another downside of large Pull-Requests is that they are difficult to revert later on because there will be a lot of conflicts which means you need to go through the whole review process again with new code.

**The reviewer is allowed, and encouraged, to reject Pull-Requests that (subjectively) are too large to reduce the cognitive load required to easily review the Pull-Request.**

## Keep Pull-Requests focused on a single issue (Link to a project-management task)

It's easy to get sidetracked in a Pull-Request and patch 2 other issues here, do a refactor there and then solve the actual issue. This makes reviewing difficult because now the reviewer has to not only review the changes of the actual task but also keep in mind how the other patches and refactors are affecting the system. Instead, you should create tasks on our project-management tool and submit separate Pull-Requests to resolve those issues, no matter how small. Having unrelated changes in a Pull-Request can also yield in falsely passing or failing tests for the actual changes needed for a specific task. Additionally, having more than 1 task in a single PR means *all* the tasks it covers are unmerged until all tasks are implemented properly.

**This is another common reason to reject a Pull-Request and ask to submit multiple smaller Pull-Requests that are easier to review and revert.**

## Create cards with detailed information for TODOs and issues that are encountered during the work on the Pull-Request

Creating tasks for issues unrelated to the task you are working on relates to the previous point. You should always aim for small Pull-Requests that are easy to review and revert. Any changes that are unrelated to the specific task you are working on should go into a task on our project-management tool.

**Provide as much detail as you can about the issue or potential refactor so that another developer can pick up the task at any time and work on it.**

## Do a manual sanity check before requesting a review (UI/UX according to designs)

Before starting to work on a task you should make sure that you have all necessary information to make sure you don't miss any implementation details. This is especially important for UI/UX implementations because it should be implemented exactly as the designs which means you need the latest version available. There's a bit of leeway with backend implementations because you'll have to adapt to the system and code you are working with but the functionality should still be as close as possible to the description in the task.

**If you feel like something in the designs doesn't make sense you should contact the designer and/or lead developer to discuss those concerns before starting the implementation.**

After opening your PR it's also encouraged to quickly glance over the diff to check for any obvious issues such as obsolete comments, commented code, etc. Make sure to do a final comparison of your implementation against the design (applies to UI/UX only) to ensure the reviewer will not spot any obvious issues immediately after checking your PR.

## Make static analysis, formatting and tests pass before requesting a review

All our repositories have CI setups to ensure that coding standards are followed and potential bugs detected before they make it into production. These run with GitHub Actions & Workflows. Before reviewing a Pull-Request you should request from the Author that all checks are green. This will help to build a habit of having everything green before handing over a Pull-Request for reviewing and will also make the review process easier because you will hopefully run into less unexpected issues that should be covered by tests before you start reviewing.

**This is one of the most important points. Don't let it slip just because you quickly want to merge something to move on to another task and fix tests in another Pull-Request.**

## Take regular breaks on complex or large breaking changes

Large Pull-Requests can be difficult to digest depending on what they are changing. A large Frontend Pull-Requests is most likely easier to digest than a large Backend Pull-Requests which changes multiple critical parts of a project. It needs more attention, more testing and fresh eyes on it. When reviewing Pull-Requests like that you should take regular breaks to avoid to review the whole Pull-Request in a single sitting which could easily lead to overlooking things. Also don't hesitate to ask one of your peers for a fresh pair of eyes if you feel like you're missing something.

**Make a routine out of taking breaks on larger Pull-Requests or review them in pairs. This will help you to stay focused on specific issues you are looking for and might reveal more issues with a second pair of eyes.**

## Establish a project-specific checklist

Each project has unique needs and those need to be accommodated for with a project-specific checklist. This checklist should consist of things that are important to check on each Pull-Request. This checklist should be created in collaboration by all people that work any given project to gather as many things as possible and then boil it down to the most essential points.

**Having a checklist will ensure that testing is consistent and at the same time it will become less likely for hazardous defects to slip through.**

## Leave comments about notable changes (You, the author)

Before requesting a review you should make sure to describe all notable changes in details. This is especially important for critical parts of a system so that another developer can come back later and reference the information if there are any issues that arise from them. Don't forget to include a step-by-step explanation on how to test your change if it requires a specific scenario.

**This information is not for yourself, you already know what you changed. This information should provide as detailed as possible information for the reviewer to make their job as fast and easy as possible.**

## Leave detailed reproduction steps when you encounter an issue (You, the reviewer)

When reviewing a Pull-Request and running into issues it can be tempting to just say "Tried X, expected Y but got Y" and have the author look into the issue. Without enough information this will waste time and money. Provide as much as information as you can about your environment, what you did before trying X, what parameters you used while trying X and if output Y or Z would make more sense. Always question and confirm if the expected output is correct before reporting an issue because you will save the author a lot of time if you can already report that the expected outcome should be something else, which would mean the code is producing invalid output.

**This is as essential to a fast and easy code review as is receiving detailed testing instructions and information about notable changes. Work closely together with the author to keep the feedback loop going for a smooth code review.**

## Request detailed documentation before merging

Documentation is what makes or breaks the developer experience. You should request documentation for any changes that will affect developers and/or end-users. There is no change too small to documentation. This also serves as an important tool to ease the onboarding of new hires.

**Git commits are not valid documentation. They are great for developers but only as long as you know what exactly you are looking for. The average developer and/or user won't even consider looking at the commit history so make sure to document important changes on our official documentation.**

## Request regression tests if the issue has been previously resolved

[Regression testing](https://en.wikipedia.org/wiki/Regression_testing) is one of the most powerful tools a developer has at hand to ensure bugs don't return after they have been fixed. If you patch a security vulnerability or a bug that affects critical functionality of the system you are working you need to provide a test for the new behavior and a regression test for the previous behavior to ensure it can't happen anymore.

**This is essential to avoid patching the same issues over and over again. A good regression test will start failing as soon as you are reintroducing the previous issue.**
