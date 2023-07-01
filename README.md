# Slim Test Helper

[![Packagist Version][icon-packagist]][link-packagist]
[![PHP from Packagist][icon-php-version]][link-packagist]
[![Packagist Downloads][icon-downloads]][link-packagist]
[![Tests Status][icon-workflow]][link-workflow]
[![Coverage Status][icon-coverage]][link-coverage]
[![License][icon-license]][link-license]
[![Twitter: nekofar][icon-twitter]][link-twitter]
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
