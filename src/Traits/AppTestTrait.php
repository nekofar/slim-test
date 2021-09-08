<?php

declare(strict_types=1);

namespace Nekofar\Slim\Test\Traits;

use Psr\Http\Message\ServerRequestFactoryInterface;
use Selective\TestTrait\Traits\ArrayTestTrait;
use Selective\TestTrait\Traits\ContainerTestTrait;
use Selective\TestTrait\Traits\HttpJsonTestTrait;
use Selective\TestTrait\Traits\HttpTestTrait;
use Selective\TestTrait\Traits\MockTestTrait;
use Selective\TestTrait\Traits\RouteTestTrait;
use Slim\App;
use Slim\Psr7\Factory\ServerRequestFactory;

/**
 * Trait AppTestTrait.
 */
trait AppTestTrait
{
    use ArrayTestTrait;
    use ContainerTestTrait;
    use HttpTestTrait;
    use HttpJsonTestTrait;
    use HttpHeadersTestTrait;
    use HttpMethodsTestTrait;
    use MockTestTrait;
    use RouteTestTrait;

    /**
     * @var App
     */
    protected $app;

    final protected function setUpApp(App $app): void
    {
        $this->app = $app;

        $this->setUpContainer($this->app->getContainer());

        // Set the server request factory
        $this->setContainerValue(ServerRequestFactoryInterface::class, function (): ServerRequestFactory {
            return new ServerRequestFactory();
        });
    }
}
