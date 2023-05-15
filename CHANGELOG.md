# Changelog
All notable changes to this project will be documented in this file.

## [3.1.1] - 2023-05-15

### Miscellaneous Tasks

- Bump nekofar/dev-tools from ^3.0 to ^3.1

## [3.1.0] - 2023-05-15

### Features

- Create `assertBadRequest` method for http bad requests
- Create `assertGone` method for http gone status
- Create `assertInternalServerError` method for http internal errors
- Create `assertMethodNotAllowed` method for http method not allowed
- Create `assertNotImplemented` method for http not implemented

### Miscellaneous Tasks

- Update ergebnis/phpstan-rules requirement || ^2.0 (#73)

### Testing

- Update `phpunit` configuration file

## [3.0.1] - 2023-04-26

### Miscellaneous Tasks

- Migrate phpunit configuration file

## [3.0.0] - 2023-04-26

### Miscellaneous Tasks

- Bump `php` from `^8.0` to `>=8.1`
- Bump nekofar/dev-tools from ^2.0 to ^3.0
- Bump phpunit/phpunit from ^9.0 to ^10.0
- Bump illuminate/testing from ^9.0 to ^10.0

## [2.0.6] - 2023-01-31

### Documentation

- Update twitter badge due to depreciation

## [2.0.5] - 2023-01-01

### Documentation

- Update workflow badge icon address on readme

## [2.0.4] - 2023-01-01

### Bug Fixes

- Solve some minor issues and update dependencies

### Miscellaneous Tasks

- Update selective/test-traits requirement || ^3.0

## [2.0.3] - 2023-01-01

### Bug Fixes

- Solve some minor issues and dependency update

## [2.0.2] - 2022-04-28

### Documentation

- Update php version over readme file

## [2.0.1] - 2022-04-14

### Miscellaneous Tasks

- Update `git-cliff` configuration

## [2.0.0] - 2022-04-14

### Miscellaneous Tasks

- Update `config.allow-plugins` on the `composer` configs
- Remove support for php version `7.*`

## [1.1.15] - 2022-03-27

### Bug Fixes

- Replace `Response` from `Slim` by `ResponseInterface`

## [1.1.14] - 2022-03-19

### Documentation

- Improve the dependabot configuration file

### Miscellaneous Tasks

- Bump orhun/git-cliff-action from 1.1.5 to 1.1.6
- Bump shivammathur/setup-php from 2.16.0 to 2.17.1
- Bump actions/checkout from 2.4.0 to 3
- Change v3 to semver for `actions/checkout`

## [1.1.13] - 2021-12-16

### Miscellaneous Tasks

- Solve github funding broken link issue

## [1.1.12] - 2021-12-15

### Miscellaneous Tasks

- Bump actions/checkout from 2.3.4 to 2.3.5
- Bump actions/checkout from 2.3.5 to 2.4.0
- Bump shivammathur/setup-php from 2.15.0 to 2.16.0
- Bump actions/cache from 2.1.6 to 2.1.7
- Update github funding configs

## [1.1.11] - 2021-10-06

### Miscellaneous Tasks

- Update `illuminate/testing` requirements to ^8.63
- Update `slim/slim` requirements to ^4.9
- Update `slim/psr7` requirements to ^4.9

## [1.1.10] - 2021-10-01

### Miscellaneous Tasks

- Upgrade `nekofar/dev-tools` from ^1.2 to ^1.3

## [1.1.9] - 2021-10-01

### Miscellaneous Tasks

- Replace `phpunit` configuration with dist one

## [1.1.8] - 2021-09-26

### Documentation

- Add missing file comments

### Miscellaneous Tasks

- Ignore `git-cliff` and `infection` configs from export

## [1.1.7] - 2021-09-21

### Miscellaneous Tasks

- Update `nekofar/dev-tools` from ^1.0 to ^1.2

## [1.1.6] - 2021-09-21

### Miscellaneous Tasks

- Replace `standard-version` by `git-cliff` for generate changelog

## [1.1.5] - 2021-09-19

### Refactor

- Remove useless return on `assertOk`

### Testing

- Add new test for `flushHeaders` method
- Chain over `assertNoContent` method

## [1.1.4] - 2021-09-19

### Miscellaneous Tasks

- Add the configuration file for `infection`
- Ignore infection output logs file
- Ignore phpcs cache file
- Exclude function signature mutators
- Improve scripts and add infection

### Testing

- Cleanup and improve test response tests

## [1.1.3] - 2021-09-18

### Documentation

- Add downloads badge linked to packagist
- Add github actions to dependabot configuration file
- Add target branch to dependabot configuration file
- Add commit message scop to dependabot configuration file
- Improve the dependabot configuration file

## [1.1.2] - 2021-09-16

### Miscellaneous Tasks

- Replace required dev packages by `nekofar/dev-tools`
- Remove useless includes from phpstan config file

## [1.1.1] - 2021-09-15

### Miscellaneous Tasks

- Disable testdox on composer test script

### Refactor

- Solve an issue related to `assertJsonCount` method

### Testing

- Cleanup and simplify test case
- Cleanup and improve test response tests
- Add new tests for response status codes
- Add new tests and improve previous tests

## [1.1.0] - 2021-09-15

### Documentation

- Add some explanation description

### Features

- Add `assertJsonPath` to assert JSON response by path
- Add `assertExactJson` to assert that the response has the exact given JSON
- Add `assertSimilarJson` to assert that the response has the similar JSON as given
- Add `assertJsonFragment` to assert that the response contains the given JSON fragment
- Add `assertJsonCount` to assert that the response JSON has the expected count of items at the given key

### Miscellaneous Tasks

- Remove dms/phpunit-arraysubset-asserts package

### Refactor

- Add new `decodeResponseJson` method on test response for decoding json
- Some minor improvement in test response
- Split json response assertions into a trait
- Add new assertions for http responces

### Testing

- Assert value and type exists at the given path in the response

## [1.0.2] - 2021-09-14

### Miscellaneous Tasks

- Update selective/test-traits requirement || ^2.0

### Refactor

- Remove unused traits in tests

## [1.0.1] - 2021-09-14

### Bug Fixes

- Solve functionality issue of `assertJson`

### Documentation

- Update sample usage code
- Add new template for pull requests
- Add new dependabot configuration file

### Miscellaneous Tasks

- Add dms/phpunit-arraysubset-asserts package ^0.3.0
- Merge changes related to bugfix back to develop

### Testing

- Make sure given array is subset of response json

## [1.0.0] - 2021-09-08

### Documentation

- Add the root license file
- Add contributing guidelines
- Add the readme include badges
- Add github funding config file
- Improve root readme file
- Update with contributing and usage info

### Features

- Add traits and test case and response

### Miscellaneous Tasks

- Update composer default configs
- Add slim/slim package ^4.8
- Add slim/psr7 package ^1.4
- Add php-di/slim-bridge package ^3.1
- Add roave/security-advisories package dev-latest 05f521f
- Add selective/test-traits package ^1.1
- Add phpunit/phpunit package ^9.5
- Add phpunit configuration file
- Add the editorconfig file
- Add phpstan/phpstan package ^0.12.98
- Add phpstan/phpstan-strict-rules package ^0.12.11
- Add ergebnis/phpstan-rules package ^0.15.3
- Add thecodingmachine/phpstan-strict-rules package v0.12.1
- Add phpstan configuration file
- Add friendsofphp/php-cs-fixer package ^3.1
- Add phpcs configuration file
- Add useless files to the gitignore
- Add standard version configuration file
- Add git attributes file include export ignores
- Add required scripts to composer configs
- Add testdox to test unit script
- Add slim/psr7 package ^1.4
- Add slim/slim package ^4.8
- Add php-di/slim-bridge package ^3.1

### Refactor

- Remove use test case and use traits instead
- Move setting up server request factory to the app test trait

### Testing

- Setup app configs and setup test case
- Add some tests for test response
- Cleanup and optimize test case codes

<!-- generated by git-cliff -->
