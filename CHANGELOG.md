# Changelog
All notable changes to this project will be documented in this file.

## [1.0.0-alpha.17] - 2023-05-20

### Documentation

- Add missing contribution guideline
- Add basic usage sample into readme file

## [1.0.0-alpha.16] - 2023-05-20

### Documentation

- Change minimum version to php 8.1 on readme

### Miscellaneous Tasks

- Install pnpm as a peoject dev-dependency

## [1.0.0-alpha.15] - 2023-05-20

### Bug Fixes

- Solve an issue on `message` in `Payload` json
- Solve json decode of `PayloadStatus`

### Features

- Create a decorator for response factory
- Add new method to send response with jsend spec

### Miscellaneous Tasks

- Install slim/http as a dependency
- Install pnpm as a peoject dev-dependency

### Testing

- Create new tests for `Response` and improve old tests

## [1.0.0-alpha.14] - 2023-05-16

### Bug Fixes

- Solve some minor issues and update dependencies

## [1.0.0-alpha.13] - 2023-05-16

### Bug Fixes

- Solve some minor issues and update dependencies

## [1.0.0-alpha.12] - 2023-05-16

### Documentation

- Update packagist badges over readme file

### Miscellaneous Tasks

- Bump nekofar/dev-tools from ^3.0 to ^3.1
- Bump slim/psr7 from ^1.5 to ^1.6
- Bump slim/slim from ^4.8 to ^4.11
- Migrate phpunit configuration file

## [1.0.0-alpha.10] - 2023-04-27

### Miscellaneous Tasks

- Bump `php` version from `^7.4 || ^8.0` to `>=8.1`
- Bump `phpstan` from `^0.12` to `^1.0`
- Bump nekofar/dev-tools from ^1.2 to ^3.0
- Migrate phpunit configuration file

### Styling

- Update some coding styles issues

## [1.0.0-alpha.9] - 2023-04-26

### Documentation

- Update badge icons over readme file

### Miscellaneous Tasks

- Drop support for php version 7.3

## [1.0.0-alpha.7] - 2022-04-06

### Miscellaneous Tasks

- Update `config.allow-plugins` on the `composer` configs

### Refactor

- Change missed test classes to `final`

## [1.0.0-alpha.6] - 2022-03-20

### Miscellaneous Tasks

- Update `config.allow-plugins` on the `composer` configs
- Normalize the `composer` configuation

### Styling

- Remove blank line on `PayloadInterface`

## [1.0.0-alpha.5] - 2022-03-20

### Documentation

- Improve the dependabot configuration file

### Miscellaneous Tasks

- Bump actions/checkout from 2.3.5 to 2.4.0
- Bump softprops/action-gh-release from 0.1.14 to 1
- Bump actions/cache from 2.1.6 to 2.1.7
- Bump shivammathur/setup-php from 2.15.0 to 2.16.0
- Update github funding configs
- Solve github funding broken link issue
- Bump shivammathur/setup-php from 2.16.0 to 2.17.0
- Bump orhun/git-cliff-action from 1.1.5 to 1.1.6

## [1.0.0-alpha.4] - 2021-09-26

### Features

- Add new `fromResponse` method to create a new `Response` from another response.

### Refactor

- Replace `ResponseInterface` by psr interface

## [1.0.0-alpha.3] - 2021-09-26

### Features

- Can inject a psr compatible response instead of base response

## [1.0.0-alpha.2] - 2021-09-26

### Miscellaneous Tasks

- Ignore `git-cliff` and `infection` configs from export
- Ignore `phpcs` and `phpstan` configs from export

## [1.0.0-alpha.1] - 2021-09-26

### Refactor

- Update and cleanup comments

## [1.0.0-alpha.0] - 2021-09-26

### Documentation

- Add funding configuration file
- Add base readme file
- Add target branch to dependabot configuration file
- Add commit message scop to dependabot configuration file
- Improve the dependabot configuration file
- Add missing file top comments

### Features

- Add new `ResponseInterface` and a mixin `Response`
- Validate status names on `PayloadStatus`

### Miscellaneous Tasks

- Add dependabot configuration file
- Add phpstan configuration file
- Add phpunit configuration file
- Add php code sniffer configuration
- Change preferred package versions to dist
- Change minimum stability to dev and set prefer to stable
- Change dev master branch alias
- Add autoload psr 4 namespace
- Normalize the configuration file
- Ignore phar file over git
- Add squizlabs/php_codesniffer package ^3.6
- Add dealerdirect/phpcodesniffer-composer-installer package ^0.7.1
- Add escapestudios/symfony2-coding-standard package ^3.12
- Add phpcompatibility/php-compatibility package ^9.3
- Add phpstan/phpstan-strict-rules package ^0.12.11
- Add roave/security-advisories package dev-latest 94b1ad0
- Add slevomat/coding-standard package ^7.0
- Add `nekofar/dev-tools` ^1.0
- Replace required dev packages by `nekofar/dev-tools`
- Remove useless includes from phpstan config file
- Add configuration file for psalm
- Replace all phpcs rules by new ruleset
- Introduce jsend payload as a json serializable class
- Add non feature branches to configs
- Update `nekofar/dev-tools` from ^1.0 to ^1.1
- Upgrade `nekofar/dev-tools` from ^1.0 to ^1.2
- Add `slim/psr7:^1.5` package
- Add useful scripts to composer configuration
- Exclude `DisallowedMixedTypeHint` from the ruleset
- Ignore phpunit cache and coverage files
- Remove bootstrap from phpunit configuration
- Add the configuration file for `infection`
- Ignore the `infection` log file
- Replace `standard-version` by `git-cliff` for generate changelog

### Refactor

- Move payload up through namespace
- Add the `PayloadInterface` and implements
- Make `Payload` and `PayloadStatus` final
- Move `JsonSerializable` to the `PayloadInterface`
- Cleanup and improve codes by `phpcbf`

### Testing

- Add new test class for testing `Payload`
- Add new test class for testing `PayloadStatus`
- Add new test class for testing `Response`

<!-- generated by git-cliff -->
