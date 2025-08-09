# Development

This document describes the process for setting up and developing the solution locally.

## Getting started

You will need a compatible `PHP` installation. We recommend the latest `PHP` version but the minimum supported `>=7.1`.

### Installing the dependencies

This project uses [Composer](https://getcomposer.org/) for dependency management. To install the required dependencies, you can use the provided Makefile

```bash
make install
```

Composer will install all dependencies in the `vendor` folder. You can use the dependencies directly from there.

### Testing the solution

The solution consists of both unit tests. To run the unit tests, you can use the provided Makefile

```bash
make test
```

### Maintaining Coding Guidelines

We apply linting based on the `phpcbf` ([PHP Code Beautifier & Fixer](https://phpqa.io/projects/phpcbf.html)). You can run the lint via the provided Makefile

```bash
make lint
```

Before raising a PR, please ensure you have formatted all code as follows:

```bash
make fmt
```
