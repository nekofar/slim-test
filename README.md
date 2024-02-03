# Slim Test Helper

[![Packagist Version][icon-packagist]][link-packagist]
[![PHP from Packagist][icon-php-version]][link-packagist]
[![Packagist Downloads][icon-downloads]][link-packagist]
[![Tests Status][icon-workflow]][link-workflow]
[![Coverage Status][icon-coverage]][link-coverage]
[![License][icon-license]][link-license]
[![X (formerly Twitter) Follow](https://img.shields.io/badge/follow-%40nekofar-ffffff?logo=x&style=flat)](https://x.com/nekofar)
[![Farcaster (Warpcast) Follow](https://img.shields.io/badge/follow-%40nekofar-855DCD.svg?logo=data:image/svg%2bxml;base64,PHN2ZyB3aWR0aD0iMzIzIiBoZWlnaHQ9IjI5NyIgdmlld0JveD0iMCAwIDMyMyAyOTciIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik01NS41ODY3IDAuNzMzMzM3SDI2My40MTNWMjk2LjI2N0gyMzIuOTA3VjE2MC44OTNIMjMyLjYwN0MyMjkuMjM2IDEyMy40NzkgMTk3Ljc5MiA5NC4xNiAxNTkuNSA5NC4xNkMxMjEuMjA4IDk0LjE2IDg5Ljc2NDIgMTIzLjQ3OSA4Ni4zOTI2IDE2MC44OTNIODYuMDkzM1YyOTYuMjY3SDU1LjU4NjdWMC43MzMzMzdaIiBmaWxsPSJ3aGl0ZSIvPgo8cGF0aCBkPSJNMC4yOTMzMzUgNDIuNjhMMTIuNjg2NyA4NC42MjY3SDIzLjE3MzNWMjU0LjMyQzE3LjkwODIgMjU0LjMyIDEzLjY0IDI1OC41ODggMTMuNjQgMjYzLjg1M1YyNzUuMjkzSDExLjczMzNDNi40NjgyMiAyNzUuMjkzIDIuMiAyNzkuNTYyIDIuMiAyODQuODI3VjI5Ni4yNjdIMTA4Ljk3M1YyODQuODI3QzEwOC45NzMgMjc5LjU2MiAxMDQuNzA1IDI3NS4yOTMgOTkuNDQgMjc1LjI5M0g5Ny41MzMzVjI2My44NTNDOTcuNTMzMyAyNTguNTg4IDkzLjI2NTEgMjU0LjMyIDg4IDI1NC4zMkg3Ni41NlY0Mi42OEgwLjI5MzMzNVoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0yMzQuODEzIDI1NC4zMkMyMjkuNTQ4IDI1NC4zMiAyMjUuMjggMjU4LjU4OCAyMjUuMjggMjYzLjg1M1YyNzUuMjkzSDIyMy4zNzNDMjE4LjEwOCAyNzUuMjkzIDIxMy44NCAyNzkuNTYyIDIxMy44NCAyODQuODI3VjI5Ni4yNjdIMzIwLjYxM1YyODQuODI3QzMyMC42MTMgMjc5LjU2MiAzMTYuMzQ1IDI3NS4yOTMgMzExLjA4IDI3NS4yOTNIMzA5LjE3M1YyNjMuODUzQzMwOS4xNzMgMjU4LjU4OCAzMDQuOTA1IDI1NC4zMiAyOTkuNjQgMjU0LjMyVjg0LjYyNjdIMzEwLjEyN0wzMjIuNTIgNDIuNjhIMjQ2LjI1M1YyNTQuMzJIMjM0LjgxM1oiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=&style=flat)](https://warpcast.com/nekofar)
[![Donate](https://img.shields.io/badge/donate-nekofar.crypto-a2b9bc?logo=ko-fi&logoColor=white)](https://ud.me/nekofar.crypto)

> Slim Framework test helper built on top of the PHPUnit test framework

This library inspired by the [Illuminate Testing](https://github.com/illuminate/testing) component.

## Installation

To get started, install the package using composer:

```bash
composer require nekofar/slim-test --dev
```

Requires Slim Framework 4 and PHP 8.0 or newer.

## Usage

```php
use Nekofar\Slim\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase 
{
    use AppTestTrait;
    
    protected function setUp(): void
    {
        $app = require __DIR__ . '/../config/bootstrap.php';
        
        $this->setUpApp($app);
    }
    
    public function testHomePage(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Welcome');
    }
}
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

---
[icon-packagist]: https://img.shields.io/packagist/v/nekofar/slim-test.svg
[icon-php-version]: https://img.shields.io/packagist/php-v/nekofar/slim-test.svg
[icon-twitter]: https://img.shields.io/badge/follow-%40nekofar-1DA1F2?logo=twitter&style=flat
[icon-coverage]: https://codecov.io/gh/nekofar/slim-test/graph/badge.svg
[icon-license]: https://img.shields.io/github/license/nekofar/slim-test.svg
[icon-workflow]: https://img.shields.io/github/actions/workflow/status/nekofar/slim-test/tests.yml
[icon-downloads]: https://img.shields.io/packagist/dt/nekofar/slim-test

[link-packagist]: https://packagist.org/packages/nekofar/slim-test
[link-twitter]: https://twitter.com/nekofar
[link-coverage]: https://codecov.io/gh/nekofar/slim-test
[link-license]: https://github.com/nekofar/slim-test/blob/master/LICENSE.md
[link-workflow]: https://github.com/nekofar/slim-test/actions/workflows/tests.yml
