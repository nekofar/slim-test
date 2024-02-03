# Changelog

All notable changes to this project will be documented in this file.

## [3.2.5] - 2024-02-03

### Documentation

- Update badges on project readme file

## [3.2.4] - 2023-07-01

### Documentation

- Update crypto funding address over configs
- Add funding to the composer configs
- Add crypto donate badge to the project readme

## [3.2.3] - 2023-05-31

### Refactor

- Add missing typehints for methods and properties
- Use `property_exists` instead of `null` check for defaultHeaders

## [3.2.2] - 2023-05-31

### Refactor

- Add mixed typehints directly instead doc-blocks

## [3.2.1] - 2023-05-29

### Refactor

- Add the test case class to warp traits
- Solve some of type hint issues over traits

### Documentation

- Update the pull request template

## [3.2.0] - 2023-05-18

### Features

- Create `withBasicAuth` to set the request authentication credentials

## [3.1.0] - 2023-05-15

### Features

- Create `assertBadRequest` method for http bad requests
- Create `assertGone` method for http gone status
- Create `assertInternalServerError` method for http internal errors
- Create `assertMethodNotAllowed` method for http method not allowed
- Create `assertNotImplemented` method for http not implemented

### Testing

- Update `phpunit` configuration file

### Miscellaneous Tasks

- Change `open-pull-requests-limit` from 10 to 20

## [3.0.1] - 2023-04-26

### Miscellaneous Tasks

- Change php version from 8.0 to 8.1 on `static` workflow
- Migrate phpunit configuration file

## [3.0.0] - 2023-04-26

### Miscellaneous Tasks

- Add php version 8.2 to the `tests` workflow
- Remove `php` version 8.0 from workflows

## [2.0.6] - 2023-01-31

### Documentation

- Update twitter badge due to depreciation

## [2.0.5] - 2023-01-01

### Documentation

- Update workflow badge icon address on readme

## [2.0.4] - 2023-01-01

### Bug Fixes

- Solve some minor issues and update dependencies

## [2.0.3] - 2023-01-01

### Bug Fixes

- Solve some minor issues and dependency update

## [2.0.2] - 2022-04-28

### Documentation

- Update php version over readme file

## [2.0.1] - 2022-04-14

### Miscellaneous Tasks

- Update `git-cliff` configuration

## [2.0.0-alpha.3] - 2022-04-14

### Miscellaneous Tasks

- Remove php version `8.2` from tests workflow matrix

## [2.0.0-alpha.2] - 2022-04-14

### Miscellaneous Tasks

- Update php version from `7.4` to `8.0` on static workflow

## [2.0.0-alpha.1] - 2022-04-14

### Miscellaneous Tasks

- Remove php version `7.*` from tests workflow matrix
- Update php version from `7.4` to `8.0` on static workflow

## [2.0.0-alpha.0] - 2022-04-14

### Miscellaneous Tasks

- Update `config.allow-plugins` on the `composer` configs

## [1.1.15] - 2022-03-27

### Bug Fixes

- Replace `Response` from `Slim` by `ResponseInterface`

### Miscellaneous Tasks

- Update `tests` and `static` workflows triggers
- Add php version 8.1 to `tests` workflow matrix

## [1.1.14] - 2022-03-19

### Documentation

- Improve the dependabot configuration file

### Miscellaneous Tasks

- Change v3 to semver for `actions/checkout`
- Update `dependabot` prefixes on configuration

## [1.1.13] - 2021-12-16

### Miscellaneous Tasks

- Solve github funding broken link issue

## [1.1.12] - 2021-12-15

### Miscellaneous Tasks

- Remove headlines of changelog from release notes
- Mark pre-releases tags on release workflow
- Improve and cleanup release bodies
- Add cache action for caching composer packages
- Update github funding configs

## [1.1.11] - 2021-10-06

### Miscellaneous Tasks

- Change workflow actions versions to fixed versions

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

- Add new workflow for create releases

## [1.1.6] - 2021-09-21

### Miscellaneous Tasks

- Replace `standard-version` by `git-cliff` for generate changelog

## [1.1.5] - 2021-09-19

### Testing

- Add new test for `flushHeaders` method
- Chain over `assertNoContent` method

### Refactor

- Remove useless return on `assertOk`

## [1.1.4] - 2021-09-19

### Testing

- Cleanup and improve test response tests

### Miscellaneous Tasks

- Add the configuration file for `infection`
- Ignore infection output logs file
- Ignore phpcs cache file
- Exclude function signature mutators
- Improve scripts and add infection

## [1.1.3] - 2021-09-18

### Documentation

- Add downloads badge linked to packagist
- Add github actions to dependabot configuration file
- Add target branch to dependabot configuration file
- Add commit message scop to dependabot configuration file
- Improve the dependabot configuration file

## [1.1.2] - 2021-09-16

### Miscellaneous Tasks

- Remove useless includes from phpstan config file

## [1.1.1] - 2021-09-15

### Testing

- Cleanup and simplify test case
- Cleanup and improve test response tests
- Add new tests for response status codes
- Add new tests and improve previous tests

### Refactor

- Solve an issue related to `assertJsonCount` method

### Miscellaneous Tasks

- Disable testdox on composer test script

## [1.1.0] - 2021-09-15

### Features

- Add `assertJsonPath` to assert JSON response by path
- Add `assertExactJson` to assert that the response has the exact given JSON
- Add `assertSimilarJson` to assert that the response has the similar JSON as given
- Add `assertJsonFragment` to assert that the response contains the given JSON fragment
- Add `assertJsonCount` to assert that the response JSON has the expected count of items at the given key

### Testing

- Assert value and type exists at the given path in the response

### Refactor

- Add new `decodeResponseJson` method on test response for decoding json
- Some minor improvement in test response
- Split json response assertions into a trait
- Add new assertions for http responces

### Documentation

- Add some explanation description

### Miscellaneous Tasks

- 1.1.0

## [1.0.2] - 2021-09-14

### Refactor

- Remove unused traits in tests

## [1.0.1] - 2021-09-14

### Bug Fixes

- Solve functionality issue of `assertJson`

### Testing

- Make sure given array is subset of response json

### Documentation

- Update sample usage code
- Add new template for pull requests
- Add new dependabot configuration file

### Miscellaneous Tasks

- Merge changes related to bugfix back to develop
- 1.0.1

## [1.0.0] - 2021-09-08

### Documentation

- Update with contributing and usage info

## [1.0.0-beta.3] - 2021-09-08

### Testing

- Cleanup and optimize test case codes

### Refactor

- Move setting up server request factory to the app test trait

### Miscellaneous Tasks

- Add coverage clover output for phpunit

### Revert

- Add php-di/slim-bridge package ^3.1

## [1.0.0-beta.1] - 2021-09-07

### Documentation

- Improve root readme file

## [1.0.0-beta.0] - 2021-09-07

### Features

- Add traits and test case and response

### Testing

- Setup app configs and setup test case
- Add some tests for test response

### Refactor

- Remove use test case and use traits instead

### Documentation

- Add the root license file
- Add contributing guidelines
- Add the readme include badges
- Add github funding config file

### Miscellaneous Tasks

- Update composer default configs
- Add phpunit configuration file
- Add the editorconfig file
- Add phpstan configuration file
- Add phpcs configuration file
- Add useless files to the gitignore
- Add standard version configuration file
- Add static analysis and tests workflow
- Add git attributes file include export ignores
- Change php version on static workflow
- Add required scripts to composer configs
- Add testdox to test unit script
- Replace pest by phpunit for tests

<!-- generated by git-cliff -->
