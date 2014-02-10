# Contributing

We are more than happy to accept external contributions to the project in the form of feedback, bug reports and even better - pull requests :) At this time we are primarily focusing on improving the user-experience and stability of Penny4NASA for our first release. Please keep this in mind if submitting feature requests, which we're happy to consider for future versions.

## Issue submission

In order for us to help you please check that you've completed the following steps:

* Made sure you're in a supported environment (Chrome, Firefox, Safari)
* Check the issues queue to ensure that the bug hasn't been reported before
* Included as much information about the bug as possible, including any screenshots, what OS/browser and version you're on, etc.

[Submit your issue](https://github.com/SpaceAdvocates/penny4nasa/issues/new)

## Quick Start

- Clone the repo and submodules `git clone --recursive git@github.com:SpaceAdvocates/penny4nasa`
- Install node tools for development `npm install`
- Install bower packages for production `bower install`
- Run grunt to watch for changes `grunt serve`
- Start hacking :)

You can keep the various repos up to date by running `git pull --rebase upstream master` in each.

## Style Guide

This project uses single-quotes, two space indentation, multiple var statements and whitespace around arguments. Use a single space after keywords like `function`. Ex:

```
function () { ... }
function foo() { ... }
```

Please ensure any pull requests follow this closely. If you notice existing code which doesn't follow these practices, feel free to shout and we will address this.

## Pull Request Guidelines

* Please check to make sure that there aren't existing pull requests attempting to address the issue mentioned. We also recommend checking for issues related to the issue on the tracker, as a team member may be working on the issue in a branch or fork.
* Non-trivial changes should be discussed in an issue first
* Develop in a topic branch, not master
* Lint the code by running `grunt`
* Add relevant tests to cover the change
* Make sure test-suite passes: `npm test`
* Squash your commits
* Write a convincing description of your PR and why we should land it