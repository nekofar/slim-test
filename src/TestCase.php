<?php

declare(strict_types=1);

namespace Nekofar\Slim\Test;

use Nekofar\Slim\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Base test case for Slim application tests.
 */
abstract class TestCase extends BaseTestCase
{
    use AppTestTrait;
}
